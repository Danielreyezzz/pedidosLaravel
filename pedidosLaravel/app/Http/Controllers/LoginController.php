<?php

namespace App\Http\Controllers;

use App\Models\Administradores;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

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

        $administrador = new Administradores();
        $administrador->nombre = $request->nombre;
        $administrador->usuario = $request->usuario;
        $administrador->contrasea = Hash::make($request->contrasea);
        $administrador->save();


        Auth::login($administrador);



        return redirect(route('welcome'));
    }
    public function contra(Request $request)
    {
        $old = $request->oldpassword;

        if (Hash::check($old, auth()->user()->password)) {
            Administradores::whereId(auth()->user()->id)->update([
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
            'usuario' => 'required|min:3|max:255|regex:/(.+)@(.+)\.(.+)/i',
            'contrasea' => 'required|min:4',
        ];
        $messages = [
            'usuario.min' => 'El email no debe tener menos de 3 caracteres',
            'usuario.required' => 'Debe agregar el email',
            'usuario.regex' => 'El formato del email no es correcto',
            'contrasea.required' => 'Debe agregar una contraseña',
            'contrasea.min' => 'La contraseña no puede tener menos de 4 caracteres'
        ];
        $this->validate($request, $rules, $messages);


        $administradores = DB::table('administradores')->get();

        $remember = 0;
        $_SESSION["autenticado"]= "NO";

        foreach($administradores as $administrador){
            if($administrador->usuario == $request->usuario && password_verify($request->contrasea, $administrador->contrasea)){
                $remember += 1;
                session_start();
                $_SESSION["autenticado"]= "SI";
                $_SESSION["nombre"]= $request->nombre;
                $_SESSION["email"]= $request->usuario;
        }
    }
        if($remember > 0){
        $request->session()->regenerate();
            return redirect()->intended(route('welcome'));
        }else {
            return back()->withErrors(['msg' => 'Credenciales incorrectas']);
        }


       /* if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('welcome'));
        } else {
            return back()->withErrors(['msg' => 'Credenciales incorrectas']);
        }*/
    }
    public function logout(Request $request)
    {
        session_start();
        $_SESSION["autenticado"]= "NO";
        session_destroy();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
