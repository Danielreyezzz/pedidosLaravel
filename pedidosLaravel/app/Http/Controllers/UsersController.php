<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
<<<<<<< HEAD
    public function getData()
    {
        $users = User::all();
        return view('panelusuario', @compact('users'));
    }
=======
  public function datos (Request $request){

    $request->validate([

        'email'=>'required|string|email|min:0|max:255\regex:/(.*)@(.*)\.(es|com|org)/i',
        'password'=>'password|min:4',
        
    ]);
  }  
>>>>>>> 295e18e2a93e105288feb5ed8a282177d49250ce
}
