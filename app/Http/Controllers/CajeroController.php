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
use App\Models\InventarioMedico;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;

class CajeroController extends Controller
{
    public function index(){

        $recetas = RecetaMedica::whereHas('transaccions', function($query) {
            $query->where('destino', 'caja');
        })->get();

        $recetas->each(function($receta) {
            if (!empty($receta->tratamiento)) {
                $tratamiento = explode("\n", $receta->tratamiento); // Divide la cadena por saltos de línea
                $tratamiento = array_map('trim', $tratamiento); // Elimina espacios extra
                $tratamiento = array_map(function($medicamento) {
                    return str_replace(['-', ','], '', $medicamento); // Elimina guiones y comas
                }, $tratamiento);
                $receta->tratamiento = $tratamiento; // Asigna el tratamiento procesado
            }

            if (!empty($receta->material)) {
                $material = explode("\n", $receta->material); // Divide la cadena por saltos de línea
                $material = array_map('trim', $material); // Elimina espacios extra

                // Procesa cada línea para separar nombre y cantidad
                $material = array_map(function($linea) {
                    // Busca el nombre y la cantidad en la línea
                    preg_match('/^(.*?)(?:[-,]?\s*Cantidad:\s*(\d+))?$/i', $linea, $matches);

                    return [
                        'nombre' => trim($matches[1] ?? ''), // Nombre del material
                        'cantidad' => isset($matches[2]) ? (int)$matches[2] : null // Cantidad, si existe

                    ];
                }, $material);

                $receta->material = $material; // Asigna el material procesado
            }

        });

        $cobros = Cobros::all();
        $cobrosPaginados = Cobros::paginate(1);
        $facturas = SolicitudFactura::all();
        $productos = Medicamentos::all();
        $pacientes = Pacientes::all();
        $servicios = Servicio::all();
        $recetasSurtidas = MedicamentoSurtido::orderBy('receta_id')->get();
        $inventarioMedico = InventarioMedico::all();
        $fechasDisponibles = Cobros::selectRaw('DATE(created_at) as fecha')
        ->distinct()
        ->orderBy('fecha', 'desc')
        ->pluck('fecha');

        date_default_timezone_set('America/Mexico_City');

         // Datos fijos para las facturas

        return view('cajero.index',compact('inventarioMedico','fechasDisponibles','recetas','productos','servicios','facturas','pacientes','cobros','recetasSurtidas'));
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

        // Verificar si ya existe un cobro para la misma receta
        $cobroExistente = Cobros::where('paciente_id', $request->paciente_id)
            ->where('receta_id', $request->receta_id)
            ->first();

        if ($cobroExistente) {
            // Generar y devolver el PDF si el cobro ya está registrado
            return $this->generarReciboPDF($cobroExistente->id, $request->paciente_id);
        }

        $factura = $request->has('facturacion');

        // Crear nuevo cobro
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

        // Generar y devolver el PDF del cobro
        return $this->generarReciboPDF($cobro->id, $request->paciente_id);
    }

    public function generarReciboPDF($idCobro)
    {
        $cobro = Cobros::findOrFail($idCobro);
        $medicamentos = MedicamentoSurtido::where('receta_id', $cobro->receta_id)->get();
        $inventarioMedico = InventarioMedico::all();
        $paciente = Pacientes::findOrFail($cobro->paciente_id );
        $receta = RecetaMedica::findOrFail($cobro->receta_id);
        $totalServicio = $cobro->Servicio->costo;

        $path = public_path('tickets/recibo-cobro-' . $cobro->id . '.pdf');

        // Procesar el material de la receta
        if (!empty($receta->material)) {
            $material = explode("\n", $receta->material);
            $material = array_map('trim', $material);

            $material = array_map(function($linea) {
                preg_match('/^(.*?)(?:[-,]?\s*Cantidad:\s*(\d+))?$/i', $linea, $matches);
                return [
                    'nombre' => trim($matches[1] ?? ''),
                    'cantidad' => isset($matches[2]) ? (int)$matches[2] : null
                ];
            }, $material);

            $receta->material = $material;
        }

        if (!File::exists(public_path('tickets'))) {
            File::makeDirectory(public_path('tickets'), 0755, true);
        }

        $alto_fila = 40;
        $alto_encabezado = 84;
        $alto_parrafo = 50;
        $alto_margen_superior = 50;
        $alto_margen_inferior = 40;
        $cantidad_filas = count($medicamentos);
        $altura_total = $alto_encabezado + ($cantidad_filas * $alto_fila) + $alto_parrafo + $alto_margen_superior + $alto_margen_inferior;
        $altura_minima = 30;
        $altura_total = $altura_total + $altura_minima;
        $altura_total_mm = $altura_total;

        $pdf = Pdf::loadView('pdf.recibo-cobro', compact('receta', 'medicamentos', 'cobro', 'paciente', 'inventarioMedico','totalServicio'))
            ->setPaper([0, 0, 227, $altura_total_mm], 'portrait');

        $pdf->save($path);

        // Actualizar la ruta del ticket en el cobro
        $cobro->rutaticket = $path;
        $cobro->save();

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="recibo-cobro-' . $cobro->id . '.pdf"'
        ]);
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

        // Obtener los datos necesarios utilizando el $cobroId
        $cobro = Cobros::findOrFail($cobroId);
        $receta = $cobro->receta; // Asume que la relación receta está definida en el modelo Cobros
        $paciente = $cobro->paciente; // Asume que la relación paciente está definida en el modelo Cobros
        $medicamentos = MedicamentoSurtido::where('receta_id', $receta->id)->get();

        // Lógica adicional para procesar materiales si no está procesada
        if (!empty($receta->material)) {
            $material = explode("\n", $receta->material); // Divide la cadena por saltos de línea
            $material = array_map('trim', $material); // Elimina espacios extra

            // Procesa cada línea para separar nombre y cantidad
            $material = array_map(function ($linea) {
                // Busca el nombre y la cantidad en la línea
                preg_match('/^(.*?)(?:[-,]?\s*Cantidad:\s*(\d+))?$/i', $linea, $matches);

                return [
                    'nombre' => trim($matches[1] ?? ''), // Nombre del material
                    'cantidad' => isset($matches[2]) ? (int)$matches[2] : null // Cantidad, si existe
                ];
            }, $material);

            // Asigna el material procesado a la receta
            $receta->material = $material;
        }

        // Calcula los totales
        $totalServicio = $cobro->monto; // Si el monto del servicio está en el cobro
        $MedicamentosTotal = $medicamentos->sum('costo'); // Ajusta según tu modelo
        $inventarioMedico = InventarioMedico::all(); // Inventario relacionado

        // Alturas de las secciones en px
        $alto_encabezado = 50; // px
        $alto_fila = 20; // px
        $alto_parrafo = 30; // px
        $alto_margen_superior = 20; // px
        $alto_margen_inferior = 20; // px

        // Calcular la cantidad de filas y altura total
        $cantidad_filas = max(1, count($medicamentos)); // Asegura al menos una fila
        $altura_total = $alto_encabezado + ($cantidad_filas * $alto_fila) + $alto_parrafo + $alto_margen_superior + $alto_margen_inferior;
        $altura_minima = 300; // px
        $altura_total = max($altura_total, $altura_minima);
        $altura_total_mm = $altura_total * 0.264583; // Convertir px a mm

        // Generar el PDF con los datos y el diseño de la vista
        $pdf = Pdf::loadView('pdf.recibo-cobro', compact(
            'receta',
            'medicamentos',
            'cobro',
            'paciente',
            'totalServicio',
            'MedicamentosTotal',
            'inventarioMedico'
        ))->setPaper([0, 0, 227, $altura_total_mm], 'portrait');

        // Crear el directorio si no existe
        if (!File::exists(public_path('tickets'))) {
            File::makeDirectory(public_path('tickets'), 0755, true);
        }

        // Guarda el PDF en la ubicación especificada
        $pdf->save($filePath);

        // Retorna el archivo recién generado para descarga
        return response()->download($filePath, $filename, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);
    }


public function DescargarFactura($id)
{
    // Busca la solicitud con el ID proporcionado
    $solicitud = SolicitudFactura::findOrFail($id);

    // Verifica si la ruta de la factura está disponible
    $rutaFactura = storage_path('app/public/' . $solicitud->rutafactura);

    // Verifica si el archivo existe
    if (file_exists($rutaFactura)) {
        // Obtiene el nombre del archivo desde la ruta
        $filename = basename($solicitud->rutafactura);

        // Retorna el archivo para descarga
        return response()->download($rutaFactura, $filename, [
            'Content-Type' => 'application/pdf', // Cambiar si es otro tipo de archivo
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);
    }

    // Si el archivo no existe, retorna un error
    return response()->json(['error' => 'Factura no encontrada o no disponible.'], 404);
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
