<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmaciaController extends Controller
{
    public function index(){
      // Verificar el rol del usuario
      $role = auth()->user()->roles->pluck('name')->first();

      // Redirigir según el rol del usuario
      switch ($role) {
          case 'farmacia':
              return view('farmacia.index');
          case 'doctor':
              return redirect()->route('doctor.index');
          case 'cajero':
              return redirect()->route('cajero.index');
          case 'admin':
              return redirect()->route('admin.index');
          default:
              return redirect()->route('dashboard')->with('error', 'No tienes permisos para acceder a esta página.');
      }
    }
}
