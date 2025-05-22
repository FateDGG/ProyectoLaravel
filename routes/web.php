<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\LecturaController;
use App\Http\Controllers\RiegoController; 

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');

Route::get('/contact_process', function () {
    return view('contact_process');
})->name('contact_process');

Route::get('/catalogo', function () {
    return view('catalogo');
})->name('catalogo');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/main', function () {
    return view('main');
})->name('main');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/suegra', function () {
    return view('suegra');
})->name('suegra');

Route::get('/corona', function () {
    return view('corona');
})->name('corona');

Route::get('/palo', function () {
    return view('palo');
})->name('palo');

Route::get('/aloe', function () {
    return view('aloe');
})->name('aloe');

Route::get('/coleo', function () {
    return view('coleo');
})->name('coleo');

Route::get('/croton', function () {
    return view('croton');
})->name('croton');

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');

// Estas rutas ahora son redundantes si la lógica de 'show' funciona correctamente
// Route::get('/aloeOpcion', function () {
//     return view('aloeOpcion');
// })->name('aloeOpcion');
//
// Route::get('/coleoOpcion', function () {
//     return view('coleoOpcion');
// })->name('coleoOpcion');
//
// /*Route::get('/coronaOpcion', function () {
//     return view('coronaOpcion');
// })->name('coronaOpcion');*/
//
// Route::get('/crotonOpcion', function () {
//     return view('crotonOpcion');
// })->name('crotonOpcion');
//
// Route::get('/suegraOpcion', function () {
//     return view('suegraOpcion');
// })->name('suegraOpcion');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::put('/perfil', [PerfilController::class, 'update'])->name('perfil.update');

Route::middleware(['auth'])->group(function () {
    Route::get('/dispositivos', [DispositivoController::class, 'index'])->name('dispositivos.index');
    Route::get('/dispositivos/data', [DispositivoController::class, 'getDispositivos'])->name('dispositivos.data');
    Route::post('/dispositivos', [DispositivoController::class, 'store'])->name('dispositivos.store');
    Route::get('/dispositivos/create', [DispositivoController::class, 'create'])->name('dispositivos.create');
    Route::get('/dispositivos/{id}', [DispositivoController::class, 'show'])->name('dispositivos.show');
    Route::delete('/dispositivos/{dispositivo}', [DispositivoController::class, 'destroy'])->middleware('auth');
    Route::get('/dispositivos/{id}/promedios', [LecturaController::class, 'promedios']);
});

// Esta ruta ahora es redundante si la lógica de 'show' funciona correctamente
// Route::get('/dispositivos/{id}/detalles', [DispositivoController::class, 'mostrarDetalles'])->name('dispositivos.detalles');

Route::post('/dispositivos/regar', [RiegoController::class, 'recordRiego']);