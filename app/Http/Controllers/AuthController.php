<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. Recogemos lo que escribiste en el formulario
        $usuario_digitado = $request->usuario;
        $password_digitada = $request->password;

        // 2. Buscamos en la base de datos
        $user = Usuario::where('strNombreUsuario', $usuario_digitado)->first();
        
        $existe_en_bd = $user ? 'SÍ EXISTE' : 'NO EXISTE';
        $hash_db = $user ? $user->strPwd : 'Ninguno';
        $pass_coincide = ($user && Hash::check($password_digitada, $user->strPwd)) ? 'SÍ' : 'NO';

        // 3. 🚨 LA BOMBA: Detenemos el proceso y te mostramos el reporte en rojo
        return response()->json([
            'error' => "REPORTE DE HACKER: Usuario: [$usuario_digitado] | ¿Existe en BD?: $existe_en_bd | Hash DB: $hash_db | ¿Pass Correcta?: $pass_coincide"
        ], 401);
    }

    public function logout()
    {
        Auth::guard('api')->logout();
        return redirect('/')->withCookie(cookie()->forget('jwt_token'));
    }
}