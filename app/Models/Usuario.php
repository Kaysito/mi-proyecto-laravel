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

    // Laravel usará strPwd como contraseña
    public function getAuthPassword()
    {
        return $this->strPwd;
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
        return [];
    }
}
