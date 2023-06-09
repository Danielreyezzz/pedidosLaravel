<?php

namespace App\Http\Middleware;


use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Closure;

class VerificarAutenticacion
{
    public function handle($request, Closure $next)
    {
        session_start();
        if (((isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == 'SI')) && ($_SESSION['reparto'] == 1 || $_SESSION['admin'] == 1 )) {
            return $next($request);
        }
        return redirect('login');
    }
}
