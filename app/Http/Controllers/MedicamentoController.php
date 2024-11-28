<?php

namespace App\Http\Controllers;

use App\Models\Medicamentos;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MedicamentoController extends Controller
{
    public function index()
    {
        $medicamentos = Medicamentos::paginate(3);
        $todosLosMedicamentos = Medicamentos::all()->map(function($medicamento) {
            $medicamento->imagen_url = $medicamento->imagen ? asset( $medicamento->imagen) : null;
            return $medicamento;
        });

        return view('farmacia.productos.index', compact('medicamentos','todosLosMedicamentos'));
    }

    public function store(Request $request)
{
    // Validación de los datos del formulario, incluyendo la validación de la imagen
    $request->validate([
        'nombre' => 'required',
        'descripcion' => 'required',
        'dosis' => 'required|integer',
        'medida' => 'required',
        'cantidad' => 'required|integer',
        'caducidad' => 'required',
        'precio' => 'required',
        'rutaimg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen
    ]);

    // Procesamiento de la imagen
    if ($request->hasFile('rutaimg')) {
        $nombreImagen = time() . '_' . $request->file('rutaimg')->getClientOriginalName();
        $rutaImagen = 'images/medicamentos/' . $nombreImagen;
        $request->file('rutaimg')->move(public_path('images/medicamentos'), $nombreImagen);
    }

    date_default_timezone_set('America/Mexico_City');

    // Creación del producto en la base de datos
    Medicamentos::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'dosis' => $request->dosis,
        'medida' => $request->medida,
        'cantidad' => $request->cantidad,
        'caducidad' => $request->caducidad,
        'precio' => $request->precio,
        'imagen' => $rutaImagen,
    ]);

    return redirect()->back()->with('success', 'Medicamento creado con éxito.');
}


public function update(Request $request, $id)
{
    $medicamento = Medicamentos::findOrFail($id);

    // Validar los datos
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'cantidad' => 'required|integer',
        'dosis' => 'required|string|max:255',
        'caducidad' => 'required|date', // Cambié 'required' a 'required|date' para validar que sea una fecha
        'medida' => 'required|string|in:g,mg,ml',
        'precio' => 'required|numeric',
        'rutaimg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar que sea una imagen
    ]);

    date_default_timezone_set('America/Mexico_City');

    // Variable para la ruta de la imagen
    $rutaImagen = $medicamento->imagen; // Mantiene la ruta de la imagen anterior por si no se sube una nueva

    // Si hay un nuevo archivo de imagen, subirlo y actualizar la ruta
    if ($request->hasFile('rutaimg')) {
        $imageName = time().'_'.$request->file('rutaimg')->getClientOriginalName();
        $rutaImagen = 'images/medicamentos/' . $imageName;
        $request->file('rutaimg')->move(public_path('images/medicamentos'), $imageName);

        // Elimina la imagen anterior si existe
        if ($medicamento->imagen && file_exists(public_path($medicamento->imagen))) {
            unlink(public_path($medicamento->imagen));
        }
    }

    // Actualizar los demás campos
    $medicamento->nombre = $request->input('nombre');
    $medicamento->descripcion = $request->input('descripcion');
    $medicamento->cantidad = $request->input('cantidad');
    $medicamento->dosis = $request->input('dosis');
    $medicamento->caducidad = $request->input('caducidad');
    $medicamento->medida = $request->input('medida');
    $medicamento->precio = $request->input('precio');
    $medicamento->imagen = $rutaImagen; // Solo se actualiza si hay una nueva imagen

    // Guardar los cambios
    $medicamento->save();

    return redirect()->back()->with('success', 'Medicamentos actualizado con éxito.');

}



    public function destroy($id)
    {

        $medicamentos = Medicamentos::findOrFail($id);

        // Verifica que el producto se ha encontrado correctamente
        if (!$medicamentos) {
            logger()->error('Medicamento no encontrado: ' . $medicamentos->id);
            return redirect()->back()->with('error', 'Medicamento no encontrado.');
        }

        try {
            // Elimina la imagen del servidor si existe
            if ($medicamentos->imagen && file_exists(public_path($medicamentos->imagen))) {
                unlink(public_path($medicamentos->imagen));
                logger()->info('Imagen del Medicamento eliminada: ' . $medicamentos->imagen);
            }

            // Elimina el producto
            $medicamentos->delete();
            return redirect()->back()->with('success', 'Medicamento eliminado con éxito.');
        } catch (\Exception $e) {
            // Captura cualquier excepción y muestra un mensaje de error
            logger()->error('Error al eliminar el producto: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al eliminar el producto: ' . $e->getMessage());
        }
    }





}
