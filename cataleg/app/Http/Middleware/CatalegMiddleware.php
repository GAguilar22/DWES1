<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CatalegMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*El middleware funciona per a fer comprovacions sobre l'usuari
        Podem redirigir a l'usuari depenent del que intenti fer
        Ex: Si intenta modificar algo sense estar loguejat el podem redirigir a la pàgina del login
        Les rutes hem de modificarles desde el web.php 
        */
       
        return $next($request);
    }
}
