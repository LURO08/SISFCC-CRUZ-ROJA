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
use App\Models\Personal;
use App\Models\MedicamentoSurtido;
use App\Models\InventarioMedico;
use App\Models\CobrosServicios;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CajeroController extends Controller
{
    public function index()
    {
        // Filtrar recetas relacionadas con transacciones cuyo destino sea 'caja'
        $recetas = RecetaMedica::whereHas('transaccions', function ($query) {
            $query->where('destino', 'caja');
        })->get();

        // Procesar recetas: tratamiento y materiales
        $recetas->each(function ($receta) {
            if (!empty($receta->tratamiento)) {
                $receta->tratamiento = array_map(
                    fn($medicamento) => str_replace(['-', ','], '', trim($medicamento)),
                    explode("\n", $receta->tratamiento)
                );
            }

            if (!empty($receta->material)) {
                $receta->material = array_map(function ($linea) {
                    preg_match('/^(.*?)(?:[-,]?\s*Cantidad:\s*(\d+))?$/i', $linea, $matches);
                    return [
                        'nombre' => trim($matches[1] ?? ''),
                        'cantidad' => isset($matches[2]) ? (int)$matches[2] : null,
                    ];
                }, explode("\n", $receta->material));
            }
        });

        // Obtener y combinar cobros normales y de servicios
        $cobrosNormales = Cobros::all();
        $cobrosServicios = CobrosServicios::with('paciente')->get(); // Incluye datos del paciente
        $cobros = $cobrosNormales->merge($cobrosServicios)->sortByDesc('fecha')->values();

        // Procesar servicios de los cobros
        $cobros->each(function ($cobro) {
            if (!empty($cobro->servicios)) {
                $cobro->servicios = array_map(function ($linea) {
                    preg_match('/^(.*?)-?\s*Costo:\s*\$(\d+(\.\d{2})?)$/i', $linea, $matches);
                    return [
                        'nombre' => preg_replace('/[^\w\sáéíóúÁÉÍÓÚñÑ\.,-]/u', '', trim($matches[1] ?? '')),
                        'costo' => isset($matches[2]) ? (float)$matches[2] : null,
                    ];
                }, array_map('trim', explode("\n", $cobro->servicios)));
            }
        });

        // Configurar la paginación manualmente
        $perPage = 3;
        $page = request()->get('page', 1);
        $offset = ($page - 1) * $perPage;
        $itemsPaginados = $cobros->slice($offset, $perPage)->values();
        $paginador = new LengthAwarePaginator(
            $itemsPaginados,
            $cobros->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        // Cargar datos adicionales
        $facturas = SolicitudFactura::all();
        $productos = Medicamentos::all();
        $pacientes = Pacientes::all();
        $servicios = Servicio::all();
        $recetasSurtidas = MedicamentoSurtido::orderBy('receta_id')->get();
        $inventarioMedico = InventarioMedico::all();
        $fechasDisponibles = CobrosServicios::selectRaw('DATE(created_at) as fecha')
            ->distinct()
            ->orderBy('fecha', 'desc')
            ->pluck('fecha');

        date_default_timezone_set('America/Mexico_City');

        // Retornar la vista con los datos procesados
        return view('cajero.index', compact(
            'recetas',
            'productos',
            'servicios',
            'facturas',
            'pacientes',
            'cobros',
            'recetasSurtidas',
            'inventarioMedico',
            'fechasDisponibles',
            'paginador'
        ));
    }

    public function indexlistaCobros()
    {

        // Filtrar recetas relacionadas con transacciones cuyo destino sea 'caja'
        $recetas = RecetaMedica::whereHas('transaccions', function ($query) {
            $query->where('destino', 'caja');
        })->get();

        // Procesar recetas: tratamiento y materiales
        $recetas->each(function ($receta) {
            if (!empty($receta->tratamiento)) {
                $receta->tratamiento = array_map(
                    fn($medicamento) => str_replace(['-', ','], '', trim($medicamento)),
                    explode("\n", $receta->tratamiento)
                );
            }

            if (!empty($receta->material)) {
                $receta->material = array_map(function ($linea) {
                    preg_match('/^(.*?)(?:[-,]?\s*Cantidad:\s*(\d+))?$/i', $linea, $matches);
                    return [
                        'nombre' => trim($matches[1] ?? ''),
                        'cantidad' => isset($matches[2]) ? (int)$matches[2] : null,
                    ];
                }, explode("\n", $receta->material));
            }
        });

        // Obtener y combinar cobros normales y de servicios
        $cobrosNormales = Cobros::all();
        $cobrosServicios = CobrosServicios::with('paciente')->get(); // Incluye datos del paciente
        $cobros = $cobrosNormales->merge($cobrosServicios)->sortByDesc('fecha')->values();

        // Procesar servicios de los cobros
        $cobros->each(function ($cobro) {
            if (!empty($cobro->servicios)) {
                $cobro->servicios = array_map(function ($linea) {
                    preg_match('/^(.*?)-?\s*Costo:\s*\$(\d+(\.\d{2})?)$/i', $linea, $matches);
                    return [
                        'nombre' => preg_replace('/[^\w\sáéíóúÁÉÍÓÚñÑ\.,-]/u', '', trim($matches[1] ?? '')),
                        'costo' => isset($matches[2]) ? (float)$matches[2] : null,
                    ];
                }, array_map('trim', explode("\n", $cobro->servicios)));
            }
        });

        // Configurar la paginación manualmente
        $perPage = 3;
        $page = request()->get('page', 1);
        $offset = ($page - 1) * $perPage;
        $itemsPaginados = $cobros->slice($offset, $perPage)->values();
        $paginador = new LengthAwarePaginator(
            $itemsPaginados,
            $cobros->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        // Cargar datos adicionales
        $facturas = SolicitudFactura::all();
        $productos = Medicamentos::all();
        $pacientes = Pacientes::all();
        $servicios = Servicio::all();
        $recetasSurtidas = MedicamentoSurtido::orderBy('receta_id')->get();
        $inventarioMedico = InventarioMedico::all();
        $fechasDisponibles = CobrosServicios::selectRaw('DATE(created_at) as fecha')
            ->distinct()
            ->orderBy('fecha', 'desc')
            ->pluck('fecha');

        date_default_timezone_set('America/Mexico_City');

        // Retornar la vista con los datos procesados
        return view('cajero.listacobros.index', compact(
            'recetas',
            'productos',
            'servicios',
            'facturas',
            'pacientes',
            'cobros',
            'recetasSurtidas',
            'inventarioMedico',
            'fechasDisponibles',
            'paginador'
        ));
    }

    public function RegistroCobro()
    {

        if (session()->has('pdf_generated')) {
            return redirect()->route('cajero.index')->with('success', 'Se creo correctamente la receta.');
        }

        $medicamentos = Medicamentos::all();
        $pacientes = Pacientes::all();
        $servicios = Servicio::all();
        $inventarioMedico = InventarioMedico::all();

        date_default_timezone_set('America/Mexico_City');

         // Datos fijos para las facturas

        return view('cajero.cobros.index',compact('inventarioMedico','medicamentos','servicios','pacientes'));
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

    public function storeNuevoCobro(Request $request)
    {
        date_default_timezone_set('America/Mexico_City');

        // Validar los datos de la solicitud
        $request->validate([
            'idPaciente' => 'nullable|exists:pacientes,id',
            'pacienteNombre' => 'nullable|string|max:255',
            'edad' => 'nullable|integer|min:0|max:150',
            'sexo' => 'nullable|string|max:10',
            'tipo_sangre' => 'nullable|string|max:5',
            'servicios' => 'nullable',
            'medicamentos' => 'nullable',
            'montoTotal' => 'nullable|numeric|between:0,99999999.99',
        ]);

                 // Buscar si ya existe un cobro similar basado en paciente, servicios y medicamentos
        $cobroExistente = CobrosServicios::where('paciente_id', $request->idPaciente)
                 ->where('servicios', $request->servicios)
                 ->where('medicamentos', $request->medicamentos)
                 ->where('monto', $request->montoTotal)
                 ->whereBetween('created_at', [
                     Carbon::now()->subMinutes(5), // Cobros registrados en los últimos 5 minutos
                     Carbon::now()
                 ])
        ->first();

        if ($cobroExistente) {
            session()->flash('pdf_generated', true);
            return $this->generarPDF($cobroExistente);
        }

        // Verificar si hay servicios o medicamentos antes de guardar el cobro
        if (empty($request->servicios) && empty($request->medicamentos)) {
            return redirect()->back()->with(
                'error', 'No se puede registrar un cobro sin al menos un servicio o medicamento.');
        }

        $paciente = null;
        $listamedicamentos = [];
        $servicios = [];
        $nombre = null;
        $apellidoPaterno = null;
        $apellidoMaterno = null;


        // Si se proporciona un ID de paciente, buscarlo en la base de datos
        if ($request->idPaciente) {
            $paciente = Pacientes::find($request->idPaciente);
        }

        if (!empty($request->pacienteNombre)) {

            // Separar el nombre completo del request eliminando espacios extras
            $nombreCompleto = preg_split('/\s+/', trim($request->pacienteNombre));

            // Verificar si se recibieron menos de dos palabras
            if (count($nombreCompleto) < 3) {
                // Asignar valores predeterminados desde el request si no hay suficientes partes
                $nombre = $request->nombre ?? $nombreCompleto[0] ?? ''; // Usar el nombre del request o la única palabra disponible
                $apellidoPaterno = $request->apellidoPaterno ?? '';
                $apellidoMaterno = $request->apellidoMaterno ?? '';
            } else {
                // Si hay al menos dos palabras, procesar normalmente
                $apellidoMaterno = array_pop($nombreCompleto) ?? $request->apellidoMaterno;
                $apellidoPaterno = array_pop($nombreCompleto) ?? $request->apellidoPaterno;
                $nombre = implode(' ', $nombreCompleto) ?? $request->nombre;
            }
        }

        // Si el paciente existe, verificar diferencias y actualizarlas si es necesario
        if ($paciente) {
            $hayCambios = false;
            // Verificar si los datos han cambiado
            if (
                $paciente->nombre !== $nombre ||
                $paciente->apellidopaterno !== $apellidoPaterno ||
                $paciente->apellidomaterno !== $apellidoMaterno ||
                $paciente->edad !== $request->edad ||
                $paciente->sexo !== $request->sexo ||
                $paciente->tipo_sangre !== $request->tipo_sangre
            ) {
                $hayCambios = true;

                // Actualizar los datos del paciente
                $paciente->update([
                    'nombre' => $nombre,
                    'apellidopaterno' => $apellidoPaterno,
                    'apellidomaterno' => $apellidoMaterno,
                    'edad' => $request->edad ?? $paciente->edad,
                    'sexo' => $request->sexo ?? $paciente->sexo,
                    'tipo_sangre' => $request->tipo_sangre ?? $paciente->tipo_sangre,
                ]);
            }

        } else {
            // Si el paciente no existe, crearlo solo si hay datos suficientes
            if ($nombre && $apellidoPaterno && $apellidoMaterno && $request->edad && $request->sexo && $request->tipo_sangre) {
                $paciente = Pacientes::create([
                    'nombre' => $nombre,
                    'apellidopaterno' => $apellidoPaterno,
                    'apellidomaterno' => $apellidoMaterno,
                    'edad' => $request->edad,
                    'sexo' => $request->sexo,
                    'tipo_sangre' => $request->tipo_sangre,
                ]);
            }
        }

        $userid = auth()->user()->id;
        $personal = Personal::where('user_id', $userid)->first();
        if (!$personal) {
            return redirect()->back()->with('error', 'No se encontró el personal asociado al usuario.');
        }
        // Crear un nuevo cobro
        $cobro = new CobrosServicios();
        $cobro->paciente_id = $paciente ? $paciente->id : null;
        $cobro->personal_id = $personal->id;
        $cobro->servicios = $request->servicios;
        $cobro->medicamentos = $request->medicamentos;
        $cobro->monto = $request->montoTotal;
        $cobro->facturación = $request->facturacion ?? 0; // Manejo opcional
        $cobro->save();

        session()->flash('pdf_generated', true);

        return $this->generarPDF($cobro);
    }

    private function generarPDF($cobro)
    {
        $listamedicamentos = [];
        $servicios = [];
        // Procesar medicamentos
        if (!empty($cobro->medicamentos)) {
            // Dividir los medicamentos en líneas
            $medicamentos = explode("\n", $cobro->medicamentos);

            // Limpiar cada línea y procesar
            $listamedicamentos = array_map(function ($linea) {
                // Limpiar la línea eliminando espacios adicionales
                $linea = trim($linea);

                // Verificar si cumple con el formato esperado
                if (preg_match('/^(.*?)-?\s*Costo:\s*\$(\d+(\.\d{2})?)\s*-\s*Cantidad:\s*(\d+)$/i', $linea, $matches)) {
                    return [
                        'nombre' => trim($matches[1] ?? ''), // Extraer el nombre del medicamento
                        'costo' => isset($matches[2]) ? (float)$matches[2] : null, // Extraer el costo como float
                        'cantidad' => isset($matches[4]) ? (int)$matches[4] : null, // Extraer la cantidad como int
                    ];
                }

                // Si el formato no es válido, devolver una línea vacía o personalizada
                return [
                    'nombre' => $linea, // Guardar la línea como está
                    'costo' => null,
                    'cantidad' => null,
                ];
            }, $medicamentos);

            // Filtrar los medicamentos válidos (opcional, si no quieres líneas vacías)
            $listamedicamentos = array_filter($listamedicamentos, function ($medicamento) {
                return !empty($medicamento['nombre']);
            });
        }

        // Procesar servicios
        if (!empty($cobro->servicios)) {
            $servicios = explode("\n", $cobro->servicios);
            $servicios = array_map('trim', $servicios);

            $servicios = array_map(function ($linea) {
                preg_match('/^(.*?)-?\s*Costo:\s*\$(\d+(\.\d{2})?)$/i', $linea, $matches);

                $nombre = trim($matches[1] ?? '');
                $nombreSinIconos = preg_replace('/[^\w\sáéíóúÁÉÍÓÚñÑ\.,-]/u', '', $nombre);

                return [
                    'nombre' => $nombreSinIconos,
                    'costo' => isset($matches[2]) ? (float)$matches[2] : null,
                ];
            }, $servicios);
        }
        $listaServicios = Servicio::all();

        $altura_total = $this->calcularAlturaPDF(count($servicios), count($listamedicamentos));
        $pdf = Pdf::loadView('pdf.cobro_recibo', compact('listaServicios', 'cobro', 'servicios', 'listamedicamentos'))
            ->setPaper([0, 0, 238, $altura_total], 'portrait');

        return $pdf->stream('recibo-cobro-' . $cobro->id . '.pdf');
    }

    private function calcularAlturaPDF($cantidadServicios, $cantidadMedicamentos)
    {
        $alto_fila = 30;
        $alto_encabezado = 84;
        $alto_parrafo = 50;
        $alto_margen_superior = 50;
        $alto_margen_inferior = 40;

        $altura_total = $alto_encabezado + ($cantidadServicios * $alto_fila) + ($cantidadMedicamentos * $alto_fila) + $alto_parrafo + $alto_margen_superior + $alto_margen_inferior;
        $altura_minima = 350;

        return max($altura_total, $altura_minima);
    }

    public function GenerarTicketCobroServicios($id){

        $listamedicamentos = [];
        $servicios = [];

        $cobro = CobrosServicios::find($id);

        // Procesar medicamentos
        if (!empty($cobro->medicamentos)) {
            // Dividir los medicamentos en líneas
            $medicamentos = explode("\n", $cobro->medicamentos);

            // Limpiar cada línea y procesar
            $listamedicamentos = array_map(function ($linea) {
                // Limpiar la línea eliminando espacios adicionales
                $linea = trim($linea);

                // Verificar si cumple con el formato esperado
                if (preg_match('/^(.*?)-?\s*Costo:\s*\$(\d+(\.\d{2})?)\s*-\s*Cantidad:\s*(\d+)$/i', $linea, $matches)) {
                    return [
                        'nombre' => trim($matches[1] ?? ''), // Extraer el nombre del medicamento
                        'costo' => isset($matches[2]) ? (float)$matches[2] : null, // Extraer el costo como float
                        'cantidad' => isset($matches[4]) ? (int)$matches[4] : null, // Extraer la cantidad como int
                    ];
                }

                // Si el formato no es válido, devolver una línea vacía o personalizada
                return [
                    'nombre' => $linea, // Guardar la línea como está
                    'costo' => null,
                    'cantidad' => null,
                ];
            }, $medicamentos);

            // Filtrar los medicamentos válidos (opcional, si no quieres líneas vacías)
            $listamedicamentos = array_filter($listamedicamentos, function ($medicamento) {
                return !empty($medicamento['nombre']);
            });
        }

        // Procesar servicios
        if (!empty($cobro->servicios)) {
            $servicios = explode("\n", $cobro->servicios);
            $servicios = array_map('trim', $servicios);

            $servicios = array_map(function ($linea) {
                preg_match('/^(.*?)-?\s*Costo:\s*\$(\d+(\.\d{2})?)$/i', $linea, $matches);

                $nombre = trim($matches[1] ?? '');
                $nombreSinIconos = preg_replace('/[^\w\sáéíóúÁÉÍÓÚñÑ\.,-]/u', '', $nombre);

                return [
                    'nombre' => $nombreSinIconos,
                    'costo' => isset($matches[2]) ? (float)$matches[2] : null,
                ];
            }, $servicios);
        }

        // Generar el PDF
        $listaServicios = Servicio::all();
        $altura_total_mm = 0;
        $alto_fila = 30;
        $alto_encabezado = 84;
        $alto_parrafo = 50;
        $alto_margen_superior = 50;
        $alto_margen_inferior = 40;
        $altura_total = $alto_encabezado + (count($servicios) * $alto_fila) + (count($listamedicamentos) * $alto_fila) + $alto_parrafo + $alto_margen_superior + $alto_margen_inferior;
        $altura_minima = 350;
        $altura_total = $altura_total + 30;

        if ($altura_total <= 300) {
            $altura_total_mm = $altura_minima;
        }else{
            $altura_total_mm = $altura_total;
        }


        $pdf = Pdf::loadView('pdf.cobro_recibo', compact('listaServicios', 'cobro', 'servicios', 'listamedicamentos'))
        ->setPaper([0, 0, 238, $altura_total_mm], 'portrait');

        // Devolver el PDF como respuesta
        return $pdf->stream('recibo-cobro-' . $cobro->id . '.pdf');
    }

    public function EditarCobro($id){

        $medicamentos = Medicamentos::all();
        $pacientes = Pacientes::all();
        $servicios = Servicio::all();
        $inventarioMedico = InventarioMedico::all();
        $cobro = CobrosServicios::find($id);

        date_default_timezone_set('America/Mexico_City');

         // Datos fijos para las facturas

        return view('cajero.cobros.EditarCobros.index',compact('cobro','inventarioMedico','medicamentos','servicios','pacientes'));
    }

    public function UpdateNuevoCobro(Request $request, $id)
    {
        // Validar los datos de la solicitud
        $request->validate([
            'idPaciente' => 'nullable|exists:pacientes,id',
            'nombre' => 'nullable|string|max:255',
            'edad' => 'nullable|integer|min:0|max:150',
            'sexo' => 'nullable|string|max:10',
            'tipo_sangre' => 'nullable|string|max:5',
            'servicios' => 'nullable',
            'medicamentos' => 'nullable',
            'montoTotal' => 'nullable|numeric|between:0,99999999.99',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
        ]);

        $paciente = null;
        $listamedicamentos = [];
        $servicios = [];

        // Buscar el cobro existente
        $cobro = CobrosServicios::find($id);

        if (!$cobro) {
            return response()->json(['error' => 'El cobro no existe.'], 404);
        }

        // Si se proporciona un ID de paciente, buscarlo en la base de datos
        if ($request->idPaciente) {
            $paciente = Pacientes::find($request->idPaciente);
        }

        // Actualizar datos del paciente si es necesario
        if ($paciente) {
            $hayCambios = false;

            if (
                $paciente->nombre !== $request->nombre ||
                $paciente->edad !== $request->edad ||
                $paciente->sexo !== $request->sexo ||
                $paciente->tipo_sangre !== $request->tipo_sangre
            ) {
                $hayCambios = true;

                // Actualizar los datos del paciente
                $paciente->update([
                    'nombre' => $request->nombre ?? $paciente->nombre,
                    'edad' => $request->edad ?? $paciente->edad,
                    'sexo' => $request->sexo ?? $paciente->sexo,
                    'tipo_sangre' => $request->tipo_sangre ?? $paciente->tipo_sangre,
                ]);
            }
        } else {
            // Crear un nuevo paciente si no existe y hay datos suficientes
            if ($request->nombre && $request->edad && $request->sexo && $request->tipo_sangre) {
                $paciente = Pacientes::create([
                    'nombre' => $request->nombre,
                    'edad' => $request->edad,
                    'sexo' => $request->sexo,
                    'tipo_sangre' => $request->tipo_sangre,
                ]);
            }
        }

        // Verificar si hay servicios o monto antes de actualizar el cobro
        if (is_null($request->servicios) && is_null($request->montoTotal)) {
            return response()->json([
                'error' => 'No se puede registrar un cobro sin servicios o monto.',
            ], 400);
        }

        // Actualizar el cobro
        $cobro->update([
            'paciente_id' => $paciente ? $paciente->id : null,
            'servicios' => $request->servicios,
            'medicamentos' => $request->medicamentos,
            'monto' => $request->montoTotal,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'facturación' => $request->facturacion ?? $cobro->facturación,
        ]);

        // Procesar medicamentos
        if (!empty($request->medicamentos)) {
            $medicamentos = explode("\n", $request->medicamentos);

            $listamedicamentos = array_map(function ($linea) {
                $linea = trim($linea);

                if (preg_match('/^(.*?)-?\s*Costo:\s*\$(\d+(\.\d{2})?)\s*-\s*Cantidad:\s*(\d+)$/i', $linea, $matches)) {
                    return [
                        'nombre' => trim($matches[1] ?? ''),
                        'costo' => isset($matches[2]) ? (float)$matches[2] : null,
                        'cantidad' => isset($matches[4]) ? (int)$matches[4] : null,
                    ];
                }

                return [
                    'nombre' => $linea,
                    'costo' => null,
                    'cantidad' => null,
                ];
            }, $medicamentos);

            $listamedicamentos = array_filter($listamedicamentos, function ($medicamento) {
                return !empty($medicamento['nombre']);
            });
        }

        // Procesar servicios
        if (!empty($request->servicios)) {
            $servicios = explode("\n", $request->servicios);
            $servicios = array_map('trim', $servicios);

            $servicios = array_map(function ($linea) {
                preg_match('/^(.*?)-?\s*Costo:\s*\$(\d+(\.\d{2})?)$/i', $linea, $matches);

                $nombre = trim($matches[1] ?? '');
                $nombreSinIconos = preg_replace('/[^\w\sáéíóúÁÉÍÓÚñÑ\.,-]/u', '', $nombre);

                return [
                    'nombre' => $nombreSinIconos,
                    'costo' => isset($matches[2]) ? (float)$matches[2] : null,
                ];
            }, $servicios);
        }

        // Generar el PDF
        $listaServicios = Servicio::all();
        $altura_total_mm = 0;
        $alto_fila = 30;
        $alto_encabezado = 84;
        $alto_parrafo = 50;
        $alto_margen_superior = 50;
        $alto_margen_inferior = 40;
        $altura_total = $alto_encabezado + (count($servicios) * $alto_fila) + (count($listamedicamentos) * $alto_fila) + $alto_parrafo + $alto_margen_superior + $alto_margen_inferior;
        $altura_minima = 350;
        $altura_total += 30;

        if ($altura_total <= 300) {
            $altura_total_mm = $altura_minima;
        } else {
            $altura_total_mm = $altura_total;
        }

        $pdf = Pdf::loadView('pdf.cobro_recibo', compact('listaServicios', 'cobro', 'servicios', 'listamedicamentos'))
            ->setPaper([0, 0, 238, $altura_total_mm], 'portrait');

        return $pdf->stream('recibo-cobro-' . $cobro->id . '.pdf');
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

        $altura_total_mm = 0;
        $alto_fila = 40;
        $alto_encabezado = 84;
        $alto_parrafo = 50;
        $alto_margen_superior = 50;
        $alto_margen_inferior = 40;
        $cantidad_filas = count($medicamentos);
        $altura_total = $alto_encabezado + ($cantidad_filas * $alto_fila) + $alto_parrafo + $alto_margen_superior + $alto_margen_inferior;
        $altura_minima = 300;
        $altura_total = $altura_total + 30;
        if($altura_total <= 300){
            $altura_total = 300;
        }
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
        $matutino = CobrosServicios::whereDate('created_at', $fecha)
            ->whereTime('created_at', '>=', '07:00:00')
            ->whereTime('created_at', '<=', '13:00:00')
            ->get();

        $vespertino = CobrosServicios::whereDate('created_at', $fecha)
            ->whereTime('created_at', '>=', '13:00:00')
            ->whereTime('created_at', '<=', '19:00:00')
            ->get();

        $nocturno = CobrosServicios::whereDate('created_at', $fecha)
            ->where(function ($query) {
                $query->whereTime('created_at', '>=', '19:00:00')
                    ->orWhereTime('created_at', '<', '07:00:00');
            })
            ->get();

        // Procesar servicios en cada turno
        $procesarServicios = function ($cobros) {
            $cobros->each(function ($cobro) {

                if (!empty($cobro->servicios)) {
                    $cobro->servicios = array_map(function ($linea) {
                        preg_match('/^(.*?)-?\s*Costo:\s*\$(\d+(\.\d{2})?)$/i', $linea, $matches);
                        return [
                            'nombre' => preg_replace('/[^\w\sáéíóúÁÉÍÓÚñÑ\.,-]/u', '', trim($matches[1] ?? '')),
                            'costo' => isset($matches[2]) ? (float)$matches[2] : null,
                        ];
                    }, array_map('trim', explode("\n", $cobro->servicios)));
                }

                if (!empty($cobro->medicamentos)) {
                    $cobro->medicamentos = array_map(function ($linea) {
                        preg_match('/^(.*?)-?\s*Costo:\s*\$(\d+(\.\d{2})?)\s*-\s*Cantidad:\s*(\d+)$/i', $linea, $matches);
                        return [
                            'nombre' => preg_replace('/[^\w\sáéíóúÁÉÍÓÚñÑ\.,-]/u', '', trim($matches[1] ?? '')),
                            'costo' => isset($matches[2]) ? (float)$matches[2] : null,
                        ];
                    }, array_map('trim', explode("\n", $cobro->medicamentos)));
                }

            });
        };

        $procesarServicios($matutino);
        $procesarServicios($vespertino);
        $procesarServicios($nocturno);


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
