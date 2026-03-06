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

        $credentials = [
            'strNombreUsuario' => $request->usuario, 
            'password' => $request->password
        ];

        // 2. Intentar iniciar sesión generando el Token JWT
        // Usamos guard('api') que configuramos previamente para JWT
        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return response()->json([
                'error' => 'El usuario no existe o la contraseña es incorrecta.'
            ]);
        }

        // 3. Verificar si el usuario está ACTIVO (idEstadoUsuario)
        $user = Auth::guard('api')->user();
        if (!$user->idEstadoUsuario) {
            Auth::guard('api')->logout();
            return response()->json([
                'error' => 'Tu estado es inactivo. Contacta al administrador.'
            ]);
        }

        // 4. Todo correcto: Devolver el Token al Fetch API
        return response()->json([
            'token' => $token,
            'redirect' => '/admin/home'
        ]);
    }

    public function logout(Request $request)
    {
        // Destruimos la cookie que contiene el JWT para cerrar sesión
        return redirect('/')->withCookie(cookie()->forget('jwt_token'));
    }
}