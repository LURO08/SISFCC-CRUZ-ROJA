<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('farmacia.productos.index', compact('productos'));
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
        'precio' => 'required|numeric',
        'rutaimg' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen
    ]);

    // Procesamiento de la imagen
    if ($request->hasFile('rutaimg')) {
        $nombreImagen = time() . '_' . $request->file('rutaimg')->getClientOriginalName();
        $rutaImagen = 'images/productos/' . $nombreImagen;
        $request->file('rutaimg')->move(public_path('images/productos'), $nombreImagen);
    } else {
        $rutaImagen = 'images/productos/default.png'; // Imagen por defecto si no se proporciona una
    }

    // Creación del producto en la base de datos
    Producto::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'dosis' => $request->dosis,
        'medida' => $request->medida,
        'cantidad' => $request->cantidad,
        'precio' => $request->precio,
        'imagen' => $rutaImagen,
    ]);

    return redirect()->route('farmacia.product.index')->with('success', 'Producto creado con éxito.');
}


public function update(Request $request, $id)
{
    $producto = Producto::findOrFail($id);

    // Validar los datos
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'cantidad' => 'required|integer',
        'dosis' => 'required|string|max:255',
        'medida' => 'required|string|in:g,mg,ml',
        'precio' => 'required|numeric',
        'rutaimg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar que sea una imagen
    ]);

    // Si hay un nuevo archivo de imagen, subirlo y actualizar la ruta
    if ($request->hasFile('rutaimg')) {
        $imageName = time().'_'.$request->file('rutaimg')->getClientOriginalName();
        $request->file('rutaimg')->move(public_path('images/productos'), $imageName);

        // Elimina la imagen anterior si existe
        if ($producto->imagen && file_exists(public_path($producto->imagen))) {
            unlink(public_path($producto->imagen));
        }

        // Actualiza la ruta de la imagen en la base de datos
        $producto->imagen = 'images/productos/' . $imageName;
    }

    // Actualizar los demás campos
    $producto->nombre = $request->input('nombre');
    $producto->descripcion = $request->input('descripcion');
    $producto->cantidad = $request->input('cantidad');
    $producto->dosis = $request->input('dosis');
    $producto->medida = $request->input('medida');
    $producto->precio = $request->input('precio');

    // Guardar los cambios
    $producto->save();

    return redirect()->route('farmacia.product.index')->with('success', 'Producto actualizado correctamente');
}


    public function destroy(Producto $producto)
    {
        // Mensaje de depuración: Producto recibido
        logger()->info('Intentando eliminar el producto: ' . $producto->id);

        // Verifica que el producto se ha encontrado correctamente
        if (!$producto) {
            logger()->error('Producto no encontrado: ' . $producto->id);
            return redirect()->route('farmacia.product.index')->with('error', 'Producto no encontrado.');
        }

        try {
            // Mensaje de depuración: Intentando eliminar el producto
            logger()->info('Intentando eliminar el producto de la base de datos: ' . $producto->id);

            // Elimina la imagen del servidor si existe
            if ($producto->imagen && file_exists(public_path($producto->imagen))) {
                unlink(public_path($producto->imagen));
                logger()->info('Imagen del producto eliminada: ' . $producto->imagen);
            }

            // Elimina el producto
            $producto->delete();

            // Mensaje de depuración: Producto eliminado
            logger()->info('Producto eliminado correctamente: ' . $producto->id);

            // Redirige a la lista de productos con un mensaje de éxito
            return redirect()->route('farmacia.product.index')->with('success', 'Producto eliminado con éxito.');
        } catch (\Exception $e) {
            // Captura cualquier excepción y muestra un mensaje de error
            logger()->error('Error al eliminar el producto: ' . $e->getMessage());
            return redirect()->route('farmacia.product.index')->with('error', 'Error al eliminar el producto: ' . $e->getMessage());
        }
    }





}
