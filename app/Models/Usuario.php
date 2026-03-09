<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class Usuario extends Authenticatable implements JWTSubject
{
    use HasUuids, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'strNombreUsuario',
        'idPerfil',
        'strPwd',
        'idEstadoUsuario',
        'strCorreo',
        'strNumeroCelular',
        'strImagenUsuario',
    ];

    protected $hidden = [
        'strPwd',
    ];

    /*
    |--------------------------------------------------------------------------
    | BLINDAJE DE AUTENTICACIÓN (Sobrescribiendo a Laravel)
    |--------------------------------------------------------------------------
    */

    // 1️⃣ Le devuelve a Laravel el valor del hash almacenado
    public function getAuthPassword()
    {
        return $this->strPwd;
    }

    // 2️⃣ ¡EL ESCUDO! Le dice a Laravel el nombre real de la columna en la BD
    public function getAuthPasswordName()
    {
        return 'strPwd';
    }

    /*
    |--------------------------------------------------------------------------
    | JWT Methods
    |--------------------------------------------------------------------------
    */

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        // Optimizamos el Token inyectando el perfil y el nombre 
        // para que no tengas que consultar la BD tantas veces en el frontend
        return [
            'perfil' => $this->idPerfil,
            'nombre' => $this->strNombreUsuario
        ];
    }
}