<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
    // public function handle(Request $request, Closure $next, string ...$guards): Response
    // {
    //     $guards = empty($guards) ? [null] : $guards;

    //     foreach ($guards as $guard) {
    //         if (Auth::guard($guard)->check()) {
    //             $user = Auth::user();

    //             // Redireccionar según el rol del usuario
    //             if ($user->hasRole('paciente')) {
    //                 return redirect()->route('solicitudcita.index'); // Redirigir al paciente
    //             } elseif ($user->hasRole('doctor')) {
    //                 return redirect()->route('doctorcitapendiente.index'); // Redirigir al doctor
    //             } elseif ($user->hasRole('administrador')) {
    //                 return redirect()->route('dashboard.index'); // Redirigir al administrador
    //             }

    //             // Redireccionar por defecto si no se encuentra un rol específico
    //             return redirect(RouteServiceProvider::HOME);
    //         }
    //     }

    //     return $next($request);
    // }
}
