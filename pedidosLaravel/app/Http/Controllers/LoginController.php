<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function registro(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|string|email|min:3|max:255|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required|min:4',
        ];
        $messages = [
            'name.required' => 'Debes agregar tu nombre',
            'email.min' => 'El email no debe tener menos de 3 caracteres',
            'email.required' => 'Debe agregar el email',
            'email.regex' => 'El formato del email no es correcto',
            'password.required' => 'Debe agregar una contraseña',
            'password.min' => 'La contraseña no puede tener menos de 4 caracteres'
        ];
        $this->validate($request, $rules, $messages);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();


        Auth::login($user);



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
            'email' => 'required|string|email|min:3|max:255|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required|min:4',
        ];
        $messages = [
            'name.required' => 'Debes agregar tu nombre',
            'email.min' => 'El email no debe tener menos de 3 caracteres',
            'email.required' => 'Debe agregar el email',
            'email.regex' => 'El formato del email no es correcto',
            'password.required' => 'Debe agregar una contraseña',
            'password.min' => 'La contraseña no puede tener menos de 4 caracteres'
        ];
        $this->validate($request, $rules, $messages);

        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
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
