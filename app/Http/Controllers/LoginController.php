<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    public function handle($request, $next)
    {
        if (Auth::check()) {
            return redirect()->route('inicio');
        }

        return $next($request);
    }
    //Función para registro
    public function register(Request $request)
    { //Validamos los datos del registro
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $userRole = Role::findOrCreate('usuario');
        $user->assignRole($userRole);

        $user->save();

        Auth::login($user);
        return redirect(route("inicio"));

    }
    //Función para autenticar
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        if (Auth::attempt($credentials)) {
            // La autenticación fue exitosa
            return redirect()->intended('inicio');
        } else {
            // La autenticación falló
            if (!User::where('email', $email)->exists()) {
                $errors['email'] = 'El correo es incorrecto';
            } elseif (!Auth::attempt(['password' => $password])) {
                $errors['password'] = 'La contraseña es incorrecta';
            }

            return redirect()->back()->withInput()->withErrors($errors);
        }
    }
    //Función para cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('inicio.sesion'));
    }
}