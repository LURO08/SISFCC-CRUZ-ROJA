<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'document' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $path = $request->file('document')->store('documents', 'public');

        return response()->json(['message' => 'Documento subido con éxito', 'path' => $path]);
    }
}
