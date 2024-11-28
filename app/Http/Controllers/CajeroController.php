<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecetaMedica;
use App\Models\Medicamentos;
use App\Models\Servicio;
use App\Models\Factura;
use App\Models\SolicitudFactura;
use App\Models\Cobros;
use App\Models\Pacientes;
use App\Models\MedicamentoSurtido;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;

class CajeroController extends Controller
{
    public function index(){

        $recetas = RecetaMedica::whereHas('transaccions', function($query) {
            $query->where('destino', 'caja');
        })->get();
        $cobros = Cobros::all();
        $facturas = SolicitudFactura::all();
        $productos = Medicamentos::all();
        $pacientes = Pacientes::all();
        $servicios = Servicio::all();
        $recetasSurtidas = MedicamentoSurtido::orderBy('receta_id')->get();

        $fechasDisponibles = Cobros::selectRaw('DATE(created_at) as fecha')
        ->distinct()
        ->orderBy('fecha', 'desc')
        ->pluck('fecha');

        date_default_timezone_set('America/Mexico_City');

         // Datos fijos para las facturas

        return view('cajero.index',compact('fechasDisponibles','recetas','productos','servicios','facturas','pacientes','cobros','recetasSurtidas'));
    }

    public function storeCobro(Request $request)
    {
        date_default_timezone_set('America/Mexico_City');
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'receta_id' => 'required|exists:receta_medicas,id',
            'nombre' => 'required',
            'servicio' => 'required',
            'monto' => 'required|numeric|between:0,99999999.99',
            'fecha' => 'required|date',
        ]);

        $factura = $request->has('facturacion');

        $cobro = new Cobros();
        $cobro->paciente_id = $request->paciente_id;
        $cobro->receta_id = $request->receta_id;
        $cobro->nombre = $request->nombre;
        $cobro->servicio = $request->servicio;
        $cobro->monto = $request->monto;
        $cobro->fecha = $request->fecha;
        $cobro->facturación = $factura;
        $cobro->save();


        // Actualizar receta como cobrada
        $receta = RecetaMedica::find($request->receta_id);
        if ($receta) {
            $receta->cobrada = true;
            $receta->save();
        }

        // Si se solicita facturación, crear la solicitud de factura
        if ($factura) {
            $this->storeSolicitudFactura(new Request([
                'cobro_id' => $cobro->id,
                'nombre' => $request->nombreCliente,
                'rfc' => $request->rfcCliente,
                'direccion' => $request->direccionCliente,
                'telefono' => $request->telefono,
                'correo' => $request->emailCliente,
                'monto' => $request->monto,
            ]));
        }

        // Generar PDF de cobro (Ticket) con formato reducido
        $medicamentos = MedicamentoSurtido::where('receta_id', $request->receta_id)->get();
        $paciente = Pacientes::findOrFail($request->paciente_id);
        $totalServicio = $request->costo2;
        $MedicamentosTotal = $request->MedicamentosTotal;

        $path = public_path('tickets/recibo-cobro-' . $cobro->id . '.pdf');

        $cobro = Cobros::findOrFail($cobro->id);
        $cobro->rutaticket = $path;
        $cobro->save();

        // Verificar y crear el directorio si no existe
        if (!File::exists(public_path('tickets'))) {
            File::makeDirectory(public_path('tickets'), 0755, true);
        }

        $alto_fila = 40; // px (por ejemplo, la altura de cada fila de la tabla)
        $alto_encabezado = 100; // px (encabezado + pie de página)
        $alto_parrafo = 50; // px (por párrafo adicional)

        $alto_margen_superior = 50; // px (margen superior)
        $alto_margen_inferior = 40; // px (margen inferior)

        // Calcula la cantidad de filas (suponiendo que cada medicamento es una fila)
        $cantidad_filas = count($medicamentos); // Total de medicamentos

        // Calcular la altura total estimada (en px)
        $altura_total = $alto_encabezado + ($cantidad_filas * $alto_fila) + $alto_parrafo + $alto_margen_superior + $alto_margen_inferior;

        // Convertir a milímetros (1px ≈ 0.264583 mm)
        $altura_total_mm = $altura_total; // Convertir px a mm

        // Validar que la altura mínima sea suficiente para el contenido
        $altura_minima = 530; // px (altura mínima en px)
        if ($altura_total < $altura_minima) {
            $altura_total = $altura_minima;
        }
        // Generar el PDF con los datos y el diseño de la vista
        $pdf = Pdf::loadView('pdf.recibo-cobro', compact('receta', 'medicamentos', 'cobro', 'paciente', 'totalServicio', 'MedicamentosTotal'))
            ->setPaper([0, 0, 227, $altura_total_mm], 'portrait'); // Configuración de tamaño para el ticket

        // Guardar el PDF en la ruta especificada
        $pdf->save($path);

        // Retornar el PDF para verlo en el navegador
        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="recibo-cobro-' . $cobro->id . '.pdf"'
        ]);


        return redirect()->route('cajero.index')->with('success', 'Cobro realizado exitosamente');
    }


    public function updateCobro(Request $request, $id)
    {
        $request->validate([
            'monto' => 'required|numeric|between:0,99999999.99',
            'fecha' => 'required|date',
            'estado' => 'required|string|max:255',
        ]);

        $cobro = Cobro::findOrFail($id);
        $cobro->update($request->all());

        return response()->json(['message' => 'Cobro actualizado exitosamente']);
    }


    // Métodos para SolicitudFactura
    public function storeSolicitudFactura(Request $request)
    {
        $cobro = Cobros::find($request->cobro_id);

        date_default_timezone_set('America/Mexico_City');
        $request->validate([
            'cobro_id' =>'required|numeric',
            'nombre' => 'required|string|max:255',
            'rfc' => 'required|string|max:13',
            'direccion' => 'required|string',
            'telefono' => 'nullable|string|max:15',
            'correo' => 'required|email|max:255',
        ]);

        $solicitudFactura = new SolicitudFactura();
        $solicitudFactura->cobro_id = $request->cobro_id;
        $solicitudFactura->nombre = $request->nombre;
        $solicitudFactura->rfc = $request->rfc;
        $solicitudFactura->direccion = $request->direccion;
        $solicitudFactura->telefono = $request->telefono;
        $solicitudFactura->correo = $request->correo;
        $solicitudFactura->monto = $cobro->monto;
        $solicitudFactura->save();

        $cobro->facturación = 1;
        $cobro->save();


        return redirect()->route('cajero.index')->with('success', 'Solicitud de factura creada exitosamente');
    }

    public function updateSolicitudFactura(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'rfc' => 'required|string|max:13',
            'direccion' => 'required|string',
            'telefono' => 'nullable|string|max:15',
            'correo' => 'required|email|max:255',
            'monto' => 'required|numeric|between:0,99999999.99',
            'concepto' => 'required|string|max:255',
            'estatus' => 'required|in:pendiente,procesada,enviada',
        ]);

        $solicitudFactura = SolicitudFactura::findOrFail($id);
        $solicitudFactura->update($request->all());

        return response()->json(['message' => 'Solicitud de factura actualizada exitosamente']);
    }

    public function DescargarPdf($cobroId)
    {
     // Define la ruta donde se guardará el PDF
     $filename = "recibo-cobro-$cobroId.pdf";
     $filePath = public_path("tickets/{$filename}");

     // Verifica si el archivo ya existe en el almacenamiento
     if (file_exists($filePath)) {
         // Retorna el archivo existente para descarga
         return response()->download($filePath, $filename, [
             'Content-Type' => 'application/pdf',
             'Content-Disposition' => 'inline; filename="' . $filename . '"'
         ]);
    }


    // // Obtener los datos necesarios utilizando el $cobroId
    // $cobro = Cobros::findOrFail($cobroId);
    // $medicamentos = $cobro->medicamentos;
    // $paciente = $cobro->paciente;

    // // Suponiendo que tienes métodos para calcular el total de medicamentos y el costo del servicio

    // $totalServicio = $receta->servicio->costo ?? 0; // Ajusta el acceso a 'costo' según tu relación
    // $totalCobro = $cobro->monto;

    // // Alturas de las secciones en px
    // $alto_encabezado = 50;
    // $alto_fila = 20;
    // $alto_parrafo = 30;
    // $alto_margen_superior = 20;
    // $alto_margen_inferior = 20;

    // // Calcular la cantidad de filas y altura total
    // $cantidad_filas = 2;
    // $altura_total = $alto_encabezado + ($cantidad_filas * $alto_fila) + $alto_parrafo + $alto_margen_superior + $alto_margen_inferior;
    // $altura_minima = 300;
    // $altura_total = max($altura_total, $altura_minima);
    // $altura_total_mm = $altura_total * 0.264583;

    // // Generar el PDF con los datos y el diseño de la vista
    // $pdf = Pdf::loadView('pdf.recibo-cobro', compact('receta', 'medicamentos', 'paciente', 'totalServicio', 'totalMedicamentos', 'totalCobro'))
    //     ->setPaper([0, 0, 227, $altura_total_mm], 'portrait');

    // // Guarda el PDF en la ubicación especificada
    // Storage::put("public/pdf/{$filename}", $pdf->output());

    // // Descarga el PDF recién generado
    // return response()->download($filePath, $filename, [
    //     'Content-Type' => 'application/pdf',
    //     'Content-Disposition' => 'inline; filename="' . $filename . '"'
    // ]);
}

    public function DescargarFactura($facturaid)
    {
        // Define la ruta donde se guardará el PDF
        $filename = "factura-$facturaid.pdf";
        $filePath = public_path("facturas/{$filename}");

        // Verifica si el archivo ya existe en el almacenamiento
        if (file_exists($filePath)) {
            // Retorna el archivo existente para descarga
            return response()->download($filePath, $filename, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $filename . '"'
            ]);
        }
    }

    public function generarReporteDiario(Request $request)
{
    $fecha = $request->input('fecha');

    // Validar que la fecha no sea nula
    if (!$fecha) {
        return redirect()->back()->withErrors(['fecha' => 'Debe seleccionar una fecha válida.']);
    }

    // Filtrar registros por turnos
    $matutino = Cobros::whereDate('created_at', $fecha)
        ->whereTime('created_at', '>=', '07:00:00')
        ->whereTime('created_at', '<=', '13:00:00')
        ->get();

    $vespertino = Cobros::whereDate('created_at', $fecha)
        ->whereTime('created_at', '>=', '13:00:00')
        ->whereTime('created_at', '<=', '19:00:00')
        ->get();

    $nocturno = Cobros::whereDate('created_at', $fecha)
        ->where(function ($query) {
            $query->whereTime('created_at', '>=', '19:00:00')
                  ->orWhereTime('created_at', '<', '07:00:00');
        })
        ->get();

    // Generar el PDF con los datos y el diseño de la vista
    $pdf = Pdf::loadView('pdf.reporte-diario', compact('fecha', 'matutino', 'vespertino', 'nocturno'));

    // Define la ruta donde se guardará el PDF
    $directoryPath = public_path('reportesDiarios');
    $filename = "reporte-diario-{$fecha}.pdf";
    $filePath = $directoryPath . '/' . $filename;

    // Crear la carpeta si no existe
    if (!file_exists($directoryPath)) {
        mkdir($directoryPath, 0777, true);
    }

    // Guardar el PDF en la ruta especificada
    $pdf->save($filePath);

    // Retornar el archivo para que se visualice en otra página
    return response()->file($filePath, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . $filename . '"'
    ]);
}


}
