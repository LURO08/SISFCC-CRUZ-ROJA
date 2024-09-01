<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
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

        return $next($request);
    }
}
