<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // 👈 Importante para verificar contraseñas
use App\Models\Usuario;              // 👈 Importamos tu modelo directamente

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1️⃣ Validación de campos vacíos
        $request->validate([
            'usuario'  => 'required|string',
            'password' => 'required|string'
        ], [
            'usuario.required'  => 'El campo usuario es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.'
        ]);

        // 2️⃣ Buscar al usuario directamente en la base de datos
        $user = Usuario::where('strNombreUsuario', $request->usuario)->first();

        // 3️⃣ ¡EL BLINDAJE! Verificamos manualmente que exista y que el Hash coincida
        if (!$user || !Hash::check($request->password, $user->strPwd)) {
            return response()->json([
                'error' => 'El usuario no existe o la contraseña es incorrecta.'
            ], 401);
        }

        // 4️⃣ Verificar estado del usuario
        if (!$user->idEstadoUsuario) {
            return response()->json([
                'error' => 'Tu usuario está inactivo. Contacta al administrador.'
            ], 403);
        }

        // 5️⃣ Generar el Token JWT usando el usuario verificado
        $token = Auth::guard('api')->login($user);

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

        // Eliminar cookie del frontend
        return redirect('/')
            ->withCookie(cookie()->forget('jwt_token'));
    }
}