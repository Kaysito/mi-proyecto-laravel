<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('strNombreUsuario');
            
            // Llave foránea hacia perfiles usando UUID
            $table->foreignUuid('idPerfil')->constrained('perfiles')->onDelete('cascade');
            
            $table->string('strPwd');
            $table->boolean('idEstadoUsuario')->default(true); // 1 = Activo, 0 = Inactivo
            $table->string('strCorreo')->unique();
            $table->string('strNumeroCelular')->nullable();
            
            // Requerimiento: apartado para subir imagen
            $table->string('strImagenUsuario')->nullable(); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
