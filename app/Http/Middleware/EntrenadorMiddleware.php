<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EntrenadorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        // Comprobar si el usuario está autenticado y tiene un perfil entrenador
        if ($user && $user->perfil && $user->perfil->tipoUsuario == 'entrenador') {
            return $next($request);
        }

        // Redireccionar o mostrar un error si el usuario no cumple con los criterios
        //return redirect('ruta-donde-redireccionar')->with('error', 'Acceso no permitido.');
        return response()->json(['message'=>'No tienes perfil de entrenador',401]);
    }
}
