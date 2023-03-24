<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function registro(Request $request){


        $request->validate([
            'name'=>'required',
            'email'=>'required|string|email|min:0|max:255',
            'password'=>'required|min:4',

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();


        Auth::login($user);



        return redirect(route('welcome'));
    }
    public function contra(Request $request){
        $old = $request->oldpassword;

        if (Hash::check($old, auth()->user()->password)){
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        return back()->with('mensaje', 'Contraseña cambiada correctamente');
        }else{
            return back()->withErrors(['msg' => 'Las contraseñas no coinciden']);
        }
    }
    public function login(Request $request){
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        $remember = false;

        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('welcome'));
        }else{
            return back()->withErrors(['msg' => 'Credenciales incorrectas']);
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
