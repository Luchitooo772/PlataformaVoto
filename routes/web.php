<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VotacionController;


Route::get('/', function () {
    return view('home');
});

Route::get('/inicio', function () {
    // Simula datos de usuario. Más adelante los traerás de la base de datos.
    $usuario = [
        'nombre' => 'Juan Pérez',
        'email' => 'juan@example.com'
    ];
    return view('inicio', compact('usuario'));
});

Route::get('/votar', [VotacionController::class, 'index'])->middleware('auth');
Route::post('/votar', [VotacionController::class, 'store'])->middleware('auth');
