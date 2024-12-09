<?php

namespace App\Http\Controllers;

use App\Models\InventarioEquipoComputos;
use App\Models\InventarioMedico;
use App\Models\InventarioOficina;
use App\Models\InventarioVehiculos;
use App\Models\InventarioEquiposlimpieza;
use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $category = $request->input('category');
        $vehicularItems = [];
        $medicoItems = [];
        $oficinaItems = [];
        $computoItems = [];
        $limpiezaItems = [];



        if ($category) {
            switch ($category) {
                case 'vehicular':
                    $vehicularItems = InventarioVehiculos::all();
                    break;
                case 'medico':
                    $medicoItems = InventarioMedico::all();
                    break;
                case 'oficina':
                    $oficinaItems = InventarioOficina::all();
                    break;
                case 'computo':
                    $computoItems = InventarioEquipoComputos::all();
                    break;
                case 'limpieza':
                        $limpiezaItems = InventarioEquiposlimpieza::all();
                        break;
            }
        }

        return view('almacen.index', compact('vehicularItems', 'medicoItems', 'oficinaItems', 'computoItems', 'category', 'limpiezaItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeVehicular(Request $request)
    {
       $inventario = $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'placa' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'año' => 'required|integer',
            'cantidad' => 'required|integer|min:1',
            'estado' => 'required|string|max:255',
            'rutaimg' => 'nullable|image|max:2048', // Validación para imagen
        ]);

        if ($request->hasFile('rutaimg') && $request->file('rutaimg')->isValid()) {
            $file = $request->file('rutaimg');
            $nombreImagen = time() . '_' . $request->modelo . $request->año . '.' . $file->getClientOriginalExtension();
            $rutaImagen = 'images/inventario/vehicular/' . $nombreImagen;
            $file->move(public_path('images/inventario/vehicular/'), $nombreImagen);
            $inventario['rutaimg'] = $rutaImagen;
        }

        $vehiculo = InventarioVehiculos::create($inventario);

        return redirect()->route('almacenista.index', ['category' => 'vehicular'])->with('success', 'Vehiculo creado correctamente.');
    }

    public function storeMedico(Request $request)
    {

       // Validar los datos del formulario
        $inventario = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tipo' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
            'fecha_caducidad' => 'required|date|after:today',
            'rutaimg' => 'nullable|image|max:2048', // Validación para imagen
        ]);

        if ($request->hasFile('rutaimg') && $request->file('rutaimg')->isValid()) {
            $file = $request->file('rutaimg');
            $nombreImagen = time() . '_' .  $request->nombre . '.' . $file->getClientOriginalExtension();
            $rutaImagen = 'images/inventario/vehicular/' . $nombreImagen;
            $file->move(public_path('images/inventario/vehicular/'), $nombreImagen);
            $inventario['rutaimg'] = $rutaImagen;
        }


        // Crear un nuevo registro en la tabla de inventario_medicos
        $inventarioMedico = InventarioMedico::create($inventario);

        return redirect()->route('almacenista.index', ['category' => 'medico'])
                         ->with('success', 'Material de oficina creado correctamente.');
    }

    public function storeOficina(Request $request)
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
            'estado' => 'required|string|max:255',
            'rutaimg' => 'nullable|image|max:2048', // Hace que la imagen sea opcional
        ]);

        // Verificar si se ha subido una imagen
        // Procesamiento de la imagen
    if ($request->hasFile('rutaimg')) {
        $nombreImagen = time() . '_' . $request->nombre . '.' . $request->file('rutaimg')->getClientOriginalExtension();
        $rutaImagen = 'images/inventario/oficina/' . $nombreImagen;
        $request->file('rutaimg')->move(public_path('images/inventario/oficina/'), $nombreImagen);

        $validatedData['rutaimg'] = $rutaImagen;
    }

        // Crear un nuevo registro en la tabla inventario_oficinas
        InventarioOficina::create($validatedData);

        // Redirigir con un mensaje de éxito
        return redirect()->route('almacenista.index', ['category' => 'oficina'])
                         ->with('success', 'Material de oficina creado correctamente.');
    }


    public function storeEquipoComputo(Request $request)
    {
       // Validar los datos de entrada
       $inventario = $request->validate([
            'nombre' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'numero_serie' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
            'estado' => 'required|string|max:255',
            'rutaimg' => 'nullable|image|max:2048', // Validación para imagen
        ]);

        if ($request->hasFile('rutaimg')) {
            $nombreImagen = time() . '_' . $request->nombre. $request->file('rutaimg')->getClientOriginalExtension();
            $rutaImagen = 'images/inventario/computo/' . $nombreImagen;
            $request->file('rutaimg')->move(public_path('images/inventario/computo/'), $nombreImagen);

            $inventario['rutaimg'] = $rutaImagen;
        }

        // Crear un nuevo registro en el modelo InventarioEquipoComputo
        $computo = InventarioEquipoComputos::create($inventario);

        // Redirigir a la vista con un mensaje de éxito
        return redirect()->route('almacenista.index', ['category' => 'computo'])
                        ->with('success', 'Material de cómputo creado correctamente.');
    }

    public function storeLimpieza(Request $request)
    {

            // Validar los datos de entrada
        $inventario = $request->validate([
                'articulo' => 'required|string|max:255',
                'marca' => 'required|string|max:255',
                'tipo' => 'required|string|max:255',
                'presentacion' => 'required|string|max:255',
                'cantidad' => 'required|integer|min:1',
                'rutaimg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para imagen
         ]);

         if ($request->hasFile('rutaimg')) {
            $nombreImagen = time() . '_' . $request->articulo. $request->file('rutaimg')->getClientOriginalExtension();
            $rutaImagen = 'images/inventario/limpieza/' . $nombreImagen;
            $request->file('rutaimg')->move(public_path('images/inventario/limpieza/'), $nombreImagen);

            $inventario['rutaimg'] = $rutaImagen;
        }

            // Crear un nuevo registro en el modelo InventarioLimpieza
        InventarioEquiposlimpieza::create($inventario);

            // Redirigir a la vista con un mensaje de éxito
        return redirect()->route('almacenista.index', ['category' => 'limpieza'])
            ->with('success', 'Material de limpieza creado correctamente.');
    }




    /**
     * Display the specified resource.
     */
    public function show(Emergencias $emergencias)
    {
        //
    }

   public function updateVehicular(Request $request, $id)
{
    // Validar los datos de entrada
    $data = $request->validate([
        'marca' => 'required|string|max:255',
        'modelo' => 'required|string|max:255',
        'placa' => 'required|string|max:255',
        'año' => 'required|integer',
        'cantidad' => 'required|integer|min:1',
        'estado' => 'required|string|max:255',
        'rutaimg' => 'nullable|image|max:2048',
    ]);

    // Buscar el vehículo por ID y actualizarlo
    $vehiculo = InventarioVehiculos::findOrFail($id);

    if ($request->hasFile('rutaimg')) {
        // Eliminar la imagen anterior
        if ($vehiculo->rutaimg && file_exists(public_path($vehiculo->rutaimg))) {
            unlink(public_path($vehiculo->rutaimg));
        }

        // Obtener el archivo de la imagen y generar un nombre único
        $file = $request->file('rutaimg');
        $nombreImagen = time() . '_' . $request->modelo . $request->año . '.' . $file->getClientOriginalExtension();

        // Ruta donde se almacenará la nueva imagen
        $rutaImagen = 'images/inventario/vehicular/' . $nombreImagen;

        // Mover el archivo a la carpeta correspondiente
        $file->move(public_path('images/inventario/vehicular/'), $nombreImagen);

        // Asignar la nueva ruta de la imagen a los datos de actualización
        $data['rutaimg'] = $rutaImagen;
    }

    $vehiculo->update($data);

    return redirect()->route('almacenista.index', ['category' => 'vehicular'])
                     ->with('success', 'Vehículo actualizado correctamente.');
}

public function updateMedico(Request $request, $id)
{
    // Validar los datos de entrada
    $data = $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'tipo' => 'required|string|max:255',
        'cantidad' => 'required|integer|min:1',
        'fecha_caducidad' => 'required|date|after:today',
       'rutaimg' => 'nullable|image|max:2048',
    ]);

    // Buscar el inventario médico por ID y actualizarlo
    $medico = InventarioMedico::findOrFail($id);

    if ($request->hasFile('rutaimg')) {
        // Eliminar la imagen anterior
        if ($vehiculo->rutaimg && file_exists(public_path($vehiculo->rutaimg))) {
            unlink(public_path($vehiculo->rutaimg));
        }

        // Obtener el archivo de la imagen y generar un nombre único
        $file = $request->file('rutaimg');
        $nombreImagen = time() . '_' . $request->nombre . '.' . $file->getClientOriginalExtension();

        // Ruta donde se almacenará la nueva imagen
        $rutaImagen = 'images/inventario/medico/' . $nombreImagen;

        // Mover el archivo a la carpeta correspondiente
        $file->move(public_path('images/inventario/medico/'), $nombreImagen);

        // Asignar la nueva ruta de la imagen a los datos de actualización
        $data['rutaimg'] = $rutaImagen;
    }

    $medico->update($data);

    return redirect()->route('almacenista.index', ['category' => 'medico'])
                     ->with('success', 'Inventario médico actualizado correctamente.');
}

public function updateOficina(Request $request, $id)
{
    // Validar los datos de entrada
    $data = $request->validate([
        'nombre' => 'required|string|max:255',
        'tipo' => 'required|string|max:255',
        'cantidad' => 'required|integer|min:1',
        'estado' => 'required|string|max:255',
        'rutaimg' => 'nullable|image|max:2048',
    ]);

    // Buscar el inventario de oficina por ID y actualizarlo
    $oficina = InventarioOficina::findOrFail($id);

    if ($request->hasFile('rutaimg')) {
        // Eliminar la imagen anterior
        if ($oficina->rutaimg && file_exists(public_path($oficina->rutaimg))) {
            unlink(public_path($oficina->rutaimg));
        }

        // Obtener el archivo de la imagen y generar un nombre único
        $file = $request->file('rutaimg');
        $nombreImagen = time() . '_' . $request->nombre . '.' . $file->getClientOriginalExtension();

        // Ruta donde se almacenará la nueva imagen
        $rutaImagen = 'images/inventario/oficina/' . $nombreImagen;

        // Mover el archivo a la carpeta correspondiente
        $file->move(public_path('images/inventario/oficina/'), $nombreImagen);

        // Asignar la nueva ruta de la imagen a los datos de actualización
        $data['rutaimg'] = $rutaImagen;
    }

    $oficina->update($data);

    return redirect()->route('almacenista.index', ['category' => 'oficina'])
                     ->with('success', 'Inventario de oficina actualizado correctamente.');
}

public function updateComputo(Request $request, $id)
{
    // Validar los datos de entrada
    $data = $request->validate([
        'nombre' => 'required|string|max:255',
        'marca' => 'required|string|max:255',
        'modelo' => 'required|string|max:255',
        'tipo' => 'required|string|max:255',
        'numero_serie' => 'required|string|max:255',
        'cantidad' => 'required|integer|min:1',
        'estado' => 'required|string|max:255',
        'rutaimg' => 'nullable|image|max:2048',
    ]);

    // Buscar el equipo de cómputo por ID y actualizarlo
    $computo = InventarioEquipoComputos::findOrFail($id);


    if ($request->hasFile('rutaimg')) {
        // Eliminar la imagen anterior
        if ($computo->rutaimg && file_exists(public_path($computo->rutaimg))) {
            unlink(public_path($computo->rutaimg));
        }

        // Obtener el archivo de la imagen y generar un nombre único
        $file = $request->file('rutaimg');
        $nombreImagen = time() . '_' . $request->nombre . '.' . $file->getClientOriginalExtension();

        // Ruta donde se almacenará la nueva imagen
        $rutaImagen = 'images/inventario/computo/' . $nombreImagen;

        // Mover el archivo a la carpeta correspondiente
        $file->move(public_path('images/inventario/computo/'), $nombreImagen);

        // Asignar la nueva ruta de la imagen a los datos de actualización
        $data['rutaimg'] = $rutaImagen;
    }

    $computo->update($data);

    return redirect()->route('almacenista.index', ['category' => 'computo'])
                     ->with('success', 'Inventario de equipo de cómputo actualizado correctamente.');
}

public function updateLimpieza(Request $request, $id)
{
    // Validar los datos de entrada
    $validatedData = $request->validate([
        'articulo' => 'required|string|max:255',
        'marca' => 'required|string|max:255',
        'tipo' => 'required|string|max:255',
        'presentacion' => 'required|string|max:255',
        'cantidad' => 'required|integer|min:1',
        'rutaimg' => 'nullable|image|max:2048', // Validación para imagen
    ]);

    // Buscar el registro en el modelo InventarioLimpieza por ID
    $inventario = InventarioEquiposlimpieza::findOrFail($id);


    if ($request->hasFile('rutaimg')) {
        // Eliminar la imagen anterior
        if ($inventario->rutaimg && file_exists(public_path($inventario->rutaimg))) {
            unlink(public_path($inventario->rutaimg));
        }

        // Obtener el archivo de la imagen y generar un nombre único
        $file = $request->file('rutaimg');
        $nombreImagen = time() . '_' . $request->articulo . '.' . $file->getClientOriginalExtension();

        // Ruta donde se almacenará la nueva imagen
        $rutaImagen = 'images/inventario/limpieza/' . $nombreImagen;

        // Mover el archivo a la carpeta correspondiente
        $file->move(public_path('images/inventario/limpieza/'), $nombreImagen);

        // Asignar la nueva ruta de la imagen a los datos de actualización
        $validatedData['rutaimg'] = $rutaImagen;
    }
    // Actualizar el registro con los datos validados
    $inventario->update($validatedData);

    // Redirigir a la vista con un mensaje de éxito
    return redirect()->route('almacenista.index', ['category' => 'limpieza'])
        ->with('success', 'Material de limpieza actualizado correctamente.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroyVehicular($id)
    {
        $vehiculo = InventarioVehiculos::findOrFail($id);
        $vehiculo->delete();

        return redirect()->route('almacenista.index',['category' => 'vehicular'])->with('success', 'Vehículo eliminado correctamente.');
    }

    /**
     * Remove the specified medical resource from storage.
     */
    public function destroyMedico($id)
    {
        $medico = InventarioMedico::findOrFail($id);
        $medico->delete();

        return redirect()->route('almacenista.index',['category' => 'medico'])->with('success', 'Inventario médico eliminado correctamente.');
    }

    /**
     * Remove the specified office resource from storage.
     */
    public function destroyOficina($id)
    {
        $oficina = InventarioOficina::findOrFail($id);
        $oficina->delete();

        return redirect()->route('almacenista.index',['category' => 'oficina'])->with('success', 'Inventario de oficina eliminado correctamente.');
    }

    public function destroyLimpieza($id)
    {
        // Buscar el registro en el modelo InventarioLimpieza por ID
        $inventario = InventarioEquiposlimpieza::findOrFail($id);

        // Eliminar el registro
        $inventario->delete();

        // Redirigir a la vista con un mensaje de éxito
        return redirect()->route('almacenista.index', ['category' => 'limpieza'])
            ->with('success', 'Material de limpieza eliminado correctamente.');
    }

    public function destroyComputo($id)
    {
        $computo = InventarioEquipoComputos::findOrFail($id);
        $computo->delete();

        return redirect()->route('almacenista.index',['category' => 'computo'])->with('success', 'Inventario de equipo de cómputo eliminado correctamente.');
    }

    public function generateVehicularPDF()
    {
        $vehiculos = InventarioVehiculos::all();
        $pdf = Pdf::loadView('reportes.vehicular', compact('vehiculos'));
        return $pdf->stream('inventario_vehicular.pdf');
    }


    public function generateMedicoPDF()
    {
        $materialesMedicos = InventarioMedico::all();
        $pdf = Pdf::loadView('reportes.medico', compact('materialesMedicos'));
        return $pdf->stream('inventario_medico.pdf');
    }

    public function generateOficinaPDF()
    {
        $materialesOficina = InventarioOficina::all();
        $pdf = Pdf::loadView('reportes.oficina', compact('materialesOficina'));
        return $pdf->stream('inventario_oficina.pdf');
    }

    public function generateComputoPDF()
    {
        $equiposComputo = InventarioEquipoComputos::all();
        $pdf = Pdf::loadView('reportes.computo', compact('equiposComputo'));
        return $pdf->stream('inventario_computo.pdf');
    }

    public function generateLimpiezaPDF()
    {
        $materialesLimpieza = InventarioEquiposlimpieza::all();
        $pdf = Pdf::loadView('reportes.limpieza', compact('materialesLimpieza'));
        return $pdf->stream('inventario_limpieza.pdf');
    }
}
