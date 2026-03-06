<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validar que los campos no vengan vacíos
        $request->validate([
            'usuario'  => 'required|string',
            'password' => 'required|string'
        ], [
            'usuario.required' => 'El campo usuario es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.'
        ]);

        // 2. Intentar iniciar sesión buscando por "strNombreUsuario"
        // Auth::attempt encripta automáticamente la contraseña escrita y la compara con la BD
        if (Auth::attempt(['strNombreUsuario' => $request->usuario, 'password' => $request->password], $request->boolean('remember'))) {
            
            // 3. Verificar si el usuario está ACTIVO
            if (!Auth::user()->idEstadoUsuario) {
                Auth::logout();
                return back()->with('error', 'Tu cuenta está inactiva. Contacta al administrador.');
            }

            // 4. Regenerar sesión (Medida de seguridad)
            $request->session()->regenerate();
            
            // Redirigir al Dashboard
            return redirect()->intended('/admin/home')->with('success', '¡Bienvenido al sistema!');
        }

        // Si falla, regresarlo a la pantalla de login con un error
        return back()->withErrors([
            'usuario' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('usuario');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}