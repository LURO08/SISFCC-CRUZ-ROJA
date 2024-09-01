<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect('/admin');
        } elseif ($user->hasRole('doctor')) {
            return redirect('/doctor');
        } elseif ($user->hasRole('cajero')) {
            return redirect('/cajero');
        } elseif ($user->hasRole('farmacia')) {
            return redirect('/farmacia');
        }
    }
}

