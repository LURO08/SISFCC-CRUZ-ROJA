<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfNotProperRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user) {
            $role = $user->roles->pluck('name')->first();
            switch ($role) {
                case 'admin':
                    return redirect('/admin');
                case 'doctor':
                    return redirect('/doctor');
                case 'cajero':
                    return redirect('/cajero');
                case 'farmacia':
                    return redirect('/farmacia');
            }
        }

        return $next($request);
    }
}
