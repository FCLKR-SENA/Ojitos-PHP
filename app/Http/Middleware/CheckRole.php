<?php

namespace App\Http\Middleware;

use Closure;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
        public function handle(Request $request, Closure $next, ...$roles)
    {
        // Verificar si el usuario tiene al menos uno de los roles proporcionados
        if (!$request->user() || !$request->user()->hasAnyRole($roles)) {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }

        return $next($request);
    }

}
