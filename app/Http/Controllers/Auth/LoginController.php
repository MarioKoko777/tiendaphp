<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Intentar iniciar sesión
        if (Auth::attempt($credentials)) {
            // Verificar el rol del usuario
            if (Auth::user()->rol === 'admin') {
                return redirect()->route('admin.index')->with('success', '¡Bienvenido, administrador!');
            } else {
                return redirect()->route('tienda.index')->with('success', '¡Bienvenido de nuevo!');
            }
        }

        // Mensaje de error si las credenciales son incorrectas
        return redirect()->back()->withErrors(['email' => 'Credenciales incorrectas. Inténtalo de nuevo.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Has cerrado sesión correctamente.');
    }
}