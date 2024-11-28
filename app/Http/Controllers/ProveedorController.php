<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Muestra una lista de todos los proveedores.
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('farmacia.proveedores.index', compact('proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombreProveedor' => 'required|string|max:255',
            'apellidopaternoProveedor' => 'required|string|max:255',
            'apellidomaternoProveedor' => 'required|string|max:255',
            'correoProveedor' => 'required|string|max:255',
            'telefonoProveedor' => 'required|string|max:15',
        ]);

        Proveedor::create([
            'nombre' => $request->nombreProveedor,
            'apellidopaterno' =>  $request->apellidopaternoProveedor,
            'apellidomaterno' =>  $request->apellidomaternoProveedor,
            'correo' =>  $request->correoProveedor,
            'telefono' =>  $request->telefonoProveedor,
        ]);

        return redirect()->route('farmacia.index')
                         ->with('success', 'Proveedor creado exitosamente.');
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'nombreProveedor' => 'required|string|max:255',
            'apellidopaternoProveedor' => 'required|string|max:255',
            'apellidomaternoProveedor' => 'required|string|max:255',
            'correoProveedor' => 'required|string|max:255',
            'direccionProveedor' => 'required|string|max:255',
            'telefonoProveedor' => 'required|string|max:15',
        ]);

        $proveedor->update([
            'nombre' => $request->nombreProveedor,
            'apellidopaterno' =>  $request->apellidopaternoProveedor,
            'apellidomaterno' =>  $request->apellidomaternoProveedor,
            'correo' =>  $request->correoProveedor,
            'direccion' =>  $request->direccionProveedor,
            'telefono' =>  $request->telefonoProveedor,
        ]);

        return redirect()->route('farmacia.index')
                         ->with('success', 'Proveedor actualizado exitosamente.');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor eliminado exitosamente.');
    }
}
