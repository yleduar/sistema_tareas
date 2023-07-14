<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdministradorSistemaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** se valida el perfil sea de los administradores */
        $perfil_id = Auth::user()->perfil_id;

        if ( ! in_array($perfil_id, array(1))){
            return redirect('/')->with(['general_messege'=>true, 'mensaje'=>'No tiene permisos para realizar esta acción', 'clase'=>'danger']);
        }

        return $next($request);
    }
}
