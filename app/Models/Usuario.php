<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

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

    // Laravel leerá strPwd como password
    public function getAuthPassword()
    {
        return $this->strPwd;
    }

    // JWT identifica al usuario con su ID
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    // Claims extra del token (puede quedar vacío)
    public function getJWTCustomClaims()
    {
        return [];
    }
}
