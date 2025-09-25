<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VotacionController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\AuthController;


// Página de inicio principal
Route::get('/', function () {
    return view('home');
});

// Página de inicio con mensaje opcional
Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/inicio', function () {
    $usuario = (object) [
        'nombre' => 'Ludmila',
        'email' => 'lud@example.com', // <- Agregado
        'ha_votado' => false
    ];
    return view('inicio', compact('usuario'));
});

Route::get('/login-facial', [AuthController::class, 'facialInstructions'])->name('login.facial');


Route::get('/login-facial', [AuthController::class, 'facialInstructions'])->name('login.facial');

// Ruta para procesar el voto
Route::get('/votar', [VotacionController::class, 'index']); // Mostrar formulario
Route::post('/votar', [VotacionController::class, 'store']); // Procesar voto

// Perfil del usuario
Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('perfil')->middleware('auth');

// Cerrar sesión
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');




