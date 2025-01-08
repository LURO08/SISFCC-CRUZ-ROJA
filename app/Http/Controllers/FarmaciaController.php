<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecetaMedica;
use App\Models\Medicamentos;
use Carbon\Carbon;
use App\Models\Proveedor;
use App\Models\MedicamentoSurtido;
use App\Models\donaciones;
use App\Models\PedidoProveedor;
use App\Mail\NotificacionEmail;
use Illuminate\Support\Facades\Mail;

class FarmaciaController extends Controller
{
    public function index(){
        $recetas = RecetaMedica::whereHas('transaccions', function($query) {
            $query->where('destino', 'farmacia');
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

        });

        date_default_timezone_set('America/Mexico_City');
          // Obtener la fecha actual
        $hoy = date('Y-m-d');  // Fecha actual en formato Y-m-d
        $fechaLimite = date('Y-m-d', strtotime('+30 days'));  // Fecha límite a 30 días

        $medicamentos = Medicamentos::where('caducidad', '<=', $fechaLimite)
        ->get();

        $medicamentosCantidad = Medicamentos::select('nombre', 'cantidad')
        ->where('cantidad', '<=', 20)
        ->get();

        $productos = Medicamentos::all();
        $proveedores = Proveedor::all();
        $donaciones = Donaciones::all();
        $proveedores = Proveedor::all();
        $PedidoProveedor = PedidoProveedor::all();
        $recetasSurtidas = MedicamentoSurtido::orderBy('receta_id')->get();
        $recetasMedicas = RecetaMedica::with('medicamentosSurtidos.medicamento')->get();



        return view('farmacia.index', compact('PedidoProveedor','proveedores','donaciones','recetasMedicas','recetas','medicamentos','productos','proveedores', 'medicamentosCantidad','recetasSurtidas'));
    }

    public function surtirReceta(Request $request)
    {
            $paciente_id = $request->paciente_id;
            $receta_id = $request->receta_id;
            $medicamentos = [];
            date_default_timezone_set('America/Mexico_City');

            // Iterar sobre el request para procesar cada medicamento
            foreach ($request->all() as $key => $value) {
                // Omitir el token y los campos fijos
                if ($key === '_token' || $key === 'paciente_id' || $key === 'receta_id') {
                    continue;
                }

                // Detectar si es un medicamento_id
                if (strpos($key, 'medicamento_id') !== false) {
                    // Extraer el número del medicamento (ej: 1, 2, etc.)
                    $medicamento_num = str_replace('medicamento_id', '', $key);
                    // Obtener los valores del medicamento y la cantidad correspondientes
                    $medicamento_id = $value;
                    $cantidad = $request->input('cantidad' . $medicamento_num);

                    $medicamentoInventario = Medicamentos::find($medicamento_id);
                    if ($medicamentoInventario->cantidad >= $cantidad) {
                        // Crear el registro del medicamento
                        $medicamento = [
                            'paciente_id' => $paciente_id,
                            'receta_id' => $receta_id,
                            'medicamento_id' => $medicamento_id,
                            'cantidad' => $cantidad
                        ];

                        MedicamentoSurtido::create($medicamento);

                        $medicamentos[] = $medicamento; // Guardar en el array para luego retornarlo o usarlo

                        if ($medicamentoInventario) {
                            $medicamentoInventario->cantidad -= $cantidad; // Restar la cantidad surtida
                            $medicamentoInventario->save(); // Guardar el cambio en el inventario
                        }
                    }else{
                        return redirect()->route('farmacia.index')->with('error', 'Medicamentos Insuficientes');
                    }
                }
            }

            $receta = RecetaMedica::find($receta_id);
            if ($receta) {
                $receta->surtida = true; // Suponiendo que el campo se llama 'surtido'
                $receta->save();
            }


        return redirect()->route('farmacia.index')->with('success', 'Receta Surtida actualizada exitosamente.');
    }


    public function verificarStock(Request $request)
    {
            // Validar que el medicamento_id esté presente en la solicitud
            $request->validate([
                'medicamento_id' => 'required|exists:medicamentos,id',
            ]);

            // Obtener el ID del medicamento desde la solicitud
            $medicamento_id = $request->input('medicamento_id');

            // Buscar el medicamento en el inventario
            $medicamento = Medicamentos::find($medicamento_id);

            if ($medicamento) {
                // Retornar el stock disponible en formato JSON
                return response()->json([
                    'success' => true,
                    'stock' => $medicamento->stock, // Suponiendo que el campo 'stock' contiene la cantidad disponible
                ]);
            } else {
                // En caso de que no se encuentre el medicamento, retornar un error
                return response()->json([
                    'success' => false,
                    'message' => 'Medicamento no encontrado.',
                ], 404);
            }
    }

    public function donaciones (Request $request)
    {
            $ultimoPedido = Donaciones::latest('donacion_id')->first();
            $donacionId = $ultimoPedido ? $ultimoPedido->id + 1 : 1;
            $nombreDonante = $request->nombreDonante;
            $fechaDonacion = $request->fechaDonacion;
            $medicamentos = [];

            date_default_timezone_set('America/Mexico_City');
            // Iterar sobre el request para procesar cada medicamento
            foreach ($request->all() as $key => $value) {
                // Omitir el token y los campos fijos
                if ($key === '_token' || $key === 'nombreDonante' || $key === 'fechaDonacion') {
                    continue;
                }

                // Detectar si es un medicamento_id
                if (strpos($key, 'medicamento_id') !== false) {
                    // Extraer el número del medicamento (ej: 1, 2, etc.)
                    $medicamento_num = str_replace('medicamento_id', '', $key);
                    // Obtener los valores del medicamento y la cantidad correspondientes
                    $medicamento_id = $value;
                    $cantidad = $request->input('cantidad' . $medicamento_num);

                    $medicamentoInventario = Medicamentos::find($medicamento_id);
                        // Crear el registro del medicamento
                        $medicamento = [
                            'donacion_id' =>$donacionId,
                            'nombredonante' => $nombreDonante,
                            'fecha_donacion' => $fechaDonacion,
                            'medicamento_id' => $medicamento_id,
                            'medicamento_cantidad' => $cantidad
                        ];

                        Donaciones::create($medicamento);

                        $medicamentos[] = $medicamento; // Guardar en el array para luego retornarlo o usarlo

                        if ($medicamentoInventario) {
                            $medicamentoInventario->cantidad += $cantidad; // suna la cantidad surtida
                            $medicamentoInventario->save(); // Guardar el cambio en el inventario
                        }
                }
            }


        return redirect()->route('farmacia.index')->with('success', 'Receta Surtida actualizada exitosamente.');
    }


    public function PedidosAProveedor(Request $request)
{
    $request->validate([
        'proveedor_id' => 'required|exists:proveedores,id', // proveedor debe existir
        'medicamento_id*' => 'required|array|min:1',         // al menos un medicamento
        'medicamento_id*.*' => 'required|exists:medicamentos,id', // cada medicamento debe existir en la tabla medicamentos
        'cantidad*' => 'required|array|min:1',               // se necesita al menos una cantidad
        'cantidad*.*' => 'required|integer|min:1',           // cada cantidad debe ser un número entero positivo
    ]);

    $ultimoPedido = PedidoProveedor::latest('pedido_id')->first();
    $pedidoId = $ultimoPedido ? $ultimoPedido->id + 1 : 1;
    $medicamentos_all = Medicamentos::all();

    $proveedor_id = $request->proveedor_id;
    $proveedor = Proveedor::find($proveedor_id);
    $medicamentos = [];
    date_default_timezone_set('America/Mexico_City');

    // Iterar sobre el request para procesar cada medicamento
    foreach ($request->all() as $key => $value) {
        // Omitir el token y los campos fijos
        if ($key === '_token' || $key === 'proveedor_id' || $key === 'pedido_id') {
            continue;
        }

        // Detectar si es un medicamento_id
        if (strpos($key, 'medicamento_id') !== false) {
            // Extraer el número del medicamento (ej: 1, 2, etc.)
            $medicamento_num = str_replace('medicamento_id', '', $key);
            // Obtener los valores del medicamento y la cantidad correspondientes
            $medicamento_id = $value;
            $cantidad = $request->input('cantidad' . $medicamento_num);

            // Crear el registro del medicamento
            $medicamento = [
                'pedido_id' => $pedidoId,
                'id_proveedor' => $proveedor_id,
                'medicamento_id' => $medicamento_id,
                'medicamento_cantidad' => $cantidad
            ];

            PedidoProveedor::create($medicamento);
            $medicamentos[] = $medicamento; // Guardar en el array para luego retornarlo o usarlo
        }
    }

    // Verificar si hay medicamentos antes de continuar
    if (empty($medicamentos)) {
        return redirect()->route('farmacia.index')->with('error', 'No se  a Proveedor Realizado exitosamente.');
    }

    $data = [
        'nombre' => $proveedor->nombre,
        'mensaje' => 'Se ha realizado un nuevo pedido a proveedor.',
        'pedido_id' => $pedidoId,
        'proveedor_id' => $proveedor_id,
        'medicamentos' => $medicamentos,
        'medicamentosAll' => $medicamentos_all
    ];

    Mail::to($proveedor->correo)->send(new NotificacionEmail($data));

    return redirect()->route('farmacia.index')->with('success', 'Pedido a Proveedor Realizado exitosamente.');
}






    }
