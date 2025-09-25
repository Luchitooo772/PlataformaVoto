<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        // Aquí puedes pasar información del usuario si quieres
        $usuario = auth()->user(); // ejemplo si usas autenticación
        return view('perfil', compact('usuario'));
    }
}
