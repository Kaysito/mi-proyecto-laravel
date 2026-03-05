<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB; // <-- ¡Esta es la línea clave que faltaba!

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return '✅ ¡Éxito! Conectado a la base de datos MySQL: ' . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return '❌ Error de conexión: ' . $e->getMessage();
    }
});