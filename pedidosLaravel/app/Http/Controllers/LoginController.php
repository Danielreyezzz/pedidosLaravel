<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function registro(Request $request)
    {

        $rules = [
            'nombre' => 'required',
            'usuario' => 'required|string|email|min:3|max:255|regex:/(.+)@(.+)\.(.+)/i',
            'contrasea' => 'required|min:4',
        ];
        $messages = [
            'nombre.required' => 'Debes agregar tu nombre',
            'usuario.min' => 'El email no debe tener menos de 3 caracteres',
            'usuario.required' => 'Debe agregar el email',
            'usuario.regex' => 'El formato del email no es correcto',
            'contrasea.required' => 'Debe agregar una contraseña',
            'contrasea.min' => 'La contraseña no puede tener menos de 4 caracteres'
        ];
        $this->validate($request, $rules, $messages);

        $administradors = new Administrador();
        $administradors->nombre = $request->nombre;
        $administradors->usuario = $request->usuario;
        $administradors->contrasea = Hash::make($request->contrasea);
        $administradors->save();


        Auth::login($administradors);



        return redirect(route('welcome'));
    }
    public function contra(Request $request)
    {
        $old = $request->oldpassword;

        if (Hash::check($old, auth()->user()->password)) {
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->password)
            ]);
            return back()->with('mensaje', 'Contraseña cambiada correctamente');
        } else {
            return back()->withErrors(['msg' => 'Las contraseñas no coinciden']);
        }
    }
    public function login(Request $request)
    {

        $rules = [
            'usuario' => 'required|string|email|min:3|max:255|regex:/(.+)@(.+)\.(.+)/i',
            'contrasea' => 'required|min:4',
        ];
        $messages = [
            'name.required' => 'Debes agregar tu nombre',
            'usuario.min' => 'El email no debe tener menos de 3 caracteres',
            'usuario.required' => 'Debe agregar el email',
            'usuari.regex' => 'El formato del email no es correcto',
            'contrasea.required' => 'Debe agregar una contraseña',
            'contrasea.min' => 'La contraseña no puede tener menos de 4 caracteres'
        ];
        $this->validate($request, $rules, $messages);

        $credentials = [
            "usuario" => $request->usuario,
            "contrasea" => $request->contrasea,
        ];

        $remember = true;

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('welcome'));
        } else {
            return back()->withErrors(['msg' => 'Credenciales incorrectas']);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
