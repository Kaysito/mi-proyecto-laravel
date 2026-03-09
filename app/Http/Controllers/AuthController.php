<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // 👈 Importante para verificar contraseñas
use App\Models\Usuario;              // 👈 Importamos tu modelo

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1️⃣ Validar que escriban algo
        $request->validate([
            'usuario'  => 'required|string',
            'password' => 'required|string'
        ], [
            'usuario.required'  => 'El campo usuario es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.'
        ]);

        // 2️⃣ Buscar exactamente ese usuario en TU tabla
        $user = Usuario::where('strNombreUsuario', $request->usuario)->first();

        // 3️⃣ EL CANDADO MANUAL: Si no existe el usuario, o el Hash no cuadra ¡AFUERA!
        if (!$user) {
            return response()->json(['error' => 'El usuario no existe.'], 401);
        }

        if (!Hash::check($request->password, $user->strPwd)) {
            return response()->json(['error' => 'La contraseña es incorrecta.'], 401);
        }

        // 4️⃣ Verificar si el usuario está inactivo
        if (!$user->idEstadoUsuario) {
            return response()->json(['error' => 'Tu usuario está inactivo.'], 403);
        }

        // 5️⃣ Generar el Token JWT porque superó todas las pruebas
        $token = Auth::guard('api')->login($user);

        return response()->json([
            'token' => $token,
            'redirect' => '/admin/home'
        ]);
    }

    public function logout()
    {
        Auth::guard('api')->logout();
        return redirect('/')->withCookie(cookie()->forget('jwt_token'));
    }
}