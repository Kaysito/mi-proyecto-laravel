<?php

use Illuminate\Support\Facades\Route;

// Pantalla de Login (Falsa por ahora)
Route::get('/', function () {
    return view('login');
})->name('login');

// Simulación de entrar al sistema (Redirige al Dashboard)
Route::post('/login', function () {
    return redirect()->route('home');
})->name('login.post');

// --- GRUPO DE RUTAS DEL SISTEMA ---
// Todas estas usarán la plantilla maestra (Layout)
Route::prefix('admin')->group(function () {
    
    // NUEVA RUTA: Dashboard / Home
    Route::get('/home', function () { 
        return view('home'); 
    })->name('home');

    // Menú: Seguridad (Ya conectadas a sus vistas reales)
    Route::get('/perfil', function () { 
        return view('modules.perfil', ['title' => 'Perfil']); 
    })->name('perfil.index');

    Route::get('/modulo', function () { 
        return view('modules.modulo', ['title' => 'Módulo']); 
    })->name('modulo.index');

    Route::get('/permisos', function () { 
        return view('modules.permisos', ['title' => 'Permisos-Perfil']); 
    })->name('permisos.index');
    
    Route::get('/usuarios', function () { 
        return view('modules.usuarios', ['title' => 'Usuarios']); 
    })->name('usuarios.index');

    // Menú: Principal 1 (Siguen usando la plantilla estática/blank)
    Route::get('/principal-1-1', function () { 
        return view('modules.blank', ['title' => 'Principal 1.1', 'breadcrumb' => 'Principal 1 > Principal 1.1']); 
    })->name('p1.1.index');
    
    Route::get('/principal-1-2', function () { 
        return view('modules.blank', ['title' => 'Principal 1.2', 'breadcrumb' => 'Principal 1 > Principal 1.2']); 
    })->name('p1.2.index');

    // Menú: Principal 2 (Siguen usando la plantilla estática/blank)
    Route::get('/principal-2-1', function () { 
        return view('modules.blank', ['title' => 'Principal 2.1', 'breadcrumb' => 'Principal 2 > Principal 2.1']); 
    })->name('p2.1.index');
    
    Route::get('/principal-2-2', function () { 
        return view('modules.blank', ['title' => 'Principal 2.2', 'breadcrumb' => 'Principal 2 > Principal 2.2']); 
    })->name('p2.2.index');
});