<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentos;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documentos::all(); // Obtener todos los documentos
        return view('admin.ticketNotas.index', compact('documentos')); // Retorna la vista con los documentos
    }

    public function store(Request $request)
    {

        $request->validate([
            'fecha' => 'required|date',
            'tipo_documento' => 'required',
            'motivo' => 'required|string',
            'documento' => 'nullable|image|mimes:jpg,png,gif|max:2048'
        ]);

        // Subir archivo si existe
        $path = null;
        if ($request->hasFile('documento')) {
            $nombreImagen = time() . '_' . $request->file('documento')->getClientOriginalName();
            $rutaImagen = 'images/documento/' . $nombreImagen;
            $request->file('documento')->move(public_path('images/documento'), $nombreImagen);
        } else {
            $rutaImagen = 'images/documento/default.png'; // Imagen por defecto si no se proporciona una
        }

        Documentos::create([
            'fecha' => $request->input('fecha'),
            'tipodocumento' => $request->input('tipo_documento'),
            'motivo' => $request->input('motivo'),
            'rutaimg' => $rutaImagen
        ]);

        return redirect()->route('admin.index')->with('success', 'Documento registrado correctamente.');
    }

    public function destroy($id)
    {
        $documento = Documentos::findOrFail($id);
        // Eliminar el registro
        $documento->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.index')->with('success', 'Documento eliminado con éxito.');
    }


}
