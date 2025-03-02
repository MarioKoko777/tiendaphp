<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear el usuario
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'user', // Rol por defecto
        ]);

        if ($usuario) {
            // Iniciar sesión automáticamente después del registro
            Auth::login($usuario);

            // Mensaje de éxito
            return redirect('/')->with('success', '¡Registro exitoso! Bienvenido a nuestra tienda.');
        } else {
            // Mensaje de error
            return redirect()->back()->with('error', 'Hubo un problema al registrar tu cuenta. Inténtalo de nuevo.');
        }
    }
}