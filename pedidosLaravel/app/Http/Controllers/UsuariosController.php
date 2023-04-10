<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administradores;

class UsuariosController extends Controller
{
    public function getData()
    {
        $administradores = Administradores::where('usuario', '=', $_SESSION["email"])->get();
        return view('panelusuario', @compact('administradores'));
    }
}
