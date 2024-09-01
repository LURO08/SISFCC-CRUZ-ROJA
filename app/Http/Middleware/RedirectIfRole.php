<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfRole
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            $role = $user->roles->pluck('name')->first();

            switch ($role) {
                case 'admin':
                    return redirect('/admin');
                case 'doctor':
                    return redirect('/doctor');
                // Agrega más casos según tus roles
            }
        }

        return $next($request);
    }
}

