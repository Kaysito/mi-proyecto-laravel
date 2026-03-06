<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1️⃣ Validación de campos
        $request->validate([
            'usuario'  => 'required|string',
            'password' => 'required|string'
        ], [
            'usuario.required'  => 'El campo usuario es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.'
        ]);

        // 2️⃣ Credenciales adaptadas a la BD solicitada
        $credentials = [
            'strNombreUsuario' => $request->usuario,
            'password' => $request->password
        ];

        // 3️⃣ Intentar autenticación con JWT
        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return response()->json([
                'error' => 'El usuario no existe o la contraseña es incorrecta.'
            ], 401);
        }

        // 4️⃣ Obtener usuario autenticado
        $user = Auth::guard('api')->user();

        // 5️⃣ Verificar estado del usuario
        if (!$user->idEstadoUsuario) {
            Auth::guard('api')->logout();

            return response()->json([
                'error' => 'Tu usuario está inactivo. Contacta al administrador.'
            ], 403);
        }

        // 6️⃣ Respuesta exitosa para Fetch API
        return response()->json([
            'token' => $token,
            'usuario' => [
                'id' => $user->id,
                'nombre' => $user->strNombreUsuario,
                'correo' => $user->strCorreo,
                'perfil' => $user->idPerfil
            ],
            'redirect' => '/admin/home'
        ]);
    }

    public function logout()
    {
        // 7️⃣ Cerrar sesión JWT
        Auth::guard('api')->logout();

        // eliminar cookie del frontend
        return redirect('/')
            ->withCookie(cookie()->forget('jwt_token'));
    }
}
