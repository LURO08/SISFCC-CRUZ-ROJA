<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if ($user) {
            $userRole = $user->roles->pluck('name')->first();

            // Verifica si el rol del usuario está en la lista de roles permitidos
            if (in_array($userRole, $roles)) {
                return $next($request); // Continuar con la solicitud si el rol es permitido
            }

            // Redirige basado en el rol del usuario
            switch ($userRole) {
                case 'admin':
                    return redirect('/admin');
                case 'farmacia':
                    return redirect('/farmacia');
                case 'cajero':
                    return redirect('/cajero');
                case 'doctor':
                    return redirect('/doctor');

            }
        }

        // Si no hay usuario autenticado, redirige a la página de inicio de sesión
        return redirect('login');
    }
}
