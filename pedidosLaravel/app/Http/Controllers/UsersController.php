<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
  public function datos (Request $request){

    $request->validate([

        'email'=>'required|string|email|min:0|max:255\regex:/(.*)@(.*)\.(es|com|org)/i',
        'password'=>'password|min:4',
        
    ]);
  }  
}
