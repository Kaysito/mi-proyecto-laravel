<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Otorga poderes de Login
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
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

    // Ocultar la contraseña por seguridad
    protected $hidden = [
        'strPwd',
    ];

    // ¡EL TRUCO MAGICO! Le decimos a Laravel que lea strPwd como contraseña
    public function getAuthPassword()
    {
        return $this->strPwd;
    }
}