<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user(); // accede al usuario autenticado

        if ($user) {
            // Verificar el rol del usuario
            if ($user->hasRole('administrador')) {
                // Permitir acceso a las rutas del administrador
                // if ($request->routeIs('dashboard.index') ||
                //     $request->routeIs('roles.*') ||
                //     $request->routeIs('permisos.*') ||
                //     $request->routeIs('userspermisos.*') ||
                //     $request->routeIs('doctor.*')) {
                return $next($request);
                // } else {
                //     return redirect()->route('dashboard.index');
                // }
            } elseif ($user->hasRole('paciente')) {
                // Permitir acceso a las rutas del paciente
                if ($request->routeIs('solicitudcita.*')) {
                    return $next($request);
                } else {
                    return redirect()->route('solicitudcita.index');
                }
            } elseif ($user->hasRole('doctor')) {
                // Permitir acceso a las rutas del doctor
                if ($request->routeIs('doctorcitapendiente.*') ||
                    $request->routeIs('doctorcitaatendido.*')) {
                    return $next($request);
                } else {
                    return redirect()->route('doctorcitapendiente.index');
                }
            }
        }

        // Redireccionar a la página de inicio si el usuario no está autenticado
        return redirect('/');
    }
}
