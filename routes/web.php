<?php

use Illuminate\Support\Facades\Route;

// Pantalla de Login (Falsa por ahora)
Route::get('/', function () {
    return view('login');
})->name('login');

// Simulación de entrar al sistema (Redirige directo sin validar)
Route::post('/login', function () {
    return redirect()->route('usuarios.index');
})->name('login.post');

// --- GRUPO DE RUTAS DEL SISTEMA ---
// Todas estas usarán la plantilla maestra (Layout)
Route::prefix('admin')->group(function () {
    
    // Menú: Seguridad
    Route::get('/perfil', function () { return view('modules.blank', ['title' => 'Perfil', 'breadcrumb' => 'Seguridad > Perfil']); })->name('perfil.index');
    Route::get('/modulo', function () { return view('modules.blank', ['title' => 'Módulo', 'breadcrumb' => 'Seguridad > Módulo']); })->name('modulo.index');
    Route::get('/permisos', function () { return view('modules.blank', ['title' => 'Permisos-Perfil', 'breadcrumb' => 'Seguridad > Permisos-Perfil']); })->name('permisos.index');
    
    // Usaremos "Usuarios" como nuestra plantilla base para ver cómo se verá el CRUD
    Route::get('/usuarios', function () { return view('modules.usuarios', ['title' => 'Usuarios', 'breadcrumb' => 'Seguridad > Usuarios']); })->name('usuarios.index');

    // Menú: Principal 1
    Route::get('/principal-1-1', function () { return view('modules.blank', ['title' => 'Principal 1.1', 'breadcrumb' => 'Principal 1 > Principal 1.1']); })->name('p1.1.index');
    Route::get('/principal-1-2', function () { return view('modules.blank', ['title' => 'Principal 1.2', 'breadcrumb' => 'Principal 1 > Principal 1.2']); })->name('p1.2.index');

    // Menú: Principal 2
    Route::get('/principal-2-1', function () { return view('modules.blank', ['title' => 'Principal 2.1', 'breadcrumb' => 'Principal 2 > Principal 2.1']); })->name('p2.1.index');
    Route::get('/principal-2-2', function () { return view('modules.blank', ['title' => 'Principal 2.2', 'breadcrumb' => 'Principal 2 > Principal 2.2']); })->name('p2.2.index');
});