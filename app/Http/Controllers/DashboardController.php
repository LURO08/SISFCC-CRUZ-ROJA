<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Verificar el rol del usuario
        $role = auth()->user()->roles->pluck('name')->first();

        // Redirigir según el rol del usuario
        switch ($role) {
            case 'doctor':
                return redirect()->route('doctor.index');
            case 'admin':
                return redirect()->route('admin.index');
            case 'cajero':
                return redirect()->route('cajero.index');
            case 'farmacia':
                return redirect()->route('farmacia.index');
            default:
                return redirect()->route('dashboard')->with('error', 'No tienes permisos para acceder a esta página.');
        }
}

}
