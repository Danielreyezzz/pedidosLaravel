<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getData()
    {
        $users = User::all();
        return view('panelusuario', @compact('users'));
    }
}
