<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Mostrar el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.create');
    }

    // Procesar el inicio de sesión
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            return redirect()->route('cursos.show');
        }

        // Si la autenticación falla, redirigir con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();  // Cierra la sesión
        $request->session()->invalidate();  // Invalida la sesión
        $request->session()->regenerateToken();  // Regenera el token CSRF
        return redirect('/');  // Redirige a la página de inicio
    }
}
