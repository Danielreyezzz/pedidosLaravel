<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getData()
    {
        //$users = Productos::with('promoempresas','promo_temp_products');
        //return view('panelusuario', @compact('users'));
    }
  public function datos (Request $request){

    $request->validate([

        'email'=>'required|string|email|min:0|max:255\regex:/(.*)@(.*)\.(es|com|org)/i',
        'password'=>'password|min:4',

    ]);
  }
}
