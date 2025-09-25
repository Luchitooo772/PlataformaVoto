<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voto;
use App\Models\Candidato;

class VotacionController extends Controller
{
    public function index()
    {
        $usuario = (object) [
            'nombre' => 'Ludmila',
            'ha_votado' => false
        ];

        $candidatos = Candidato::all();
        return view('votar', compact('usuario', 'candidatos'));
    }

    public function store(Request $request)
    {
        // Validar que se haya seleccionado un candidato válido
        $request->validate([
            'candidato' => 'required|exists:candidatos,id'
        ]);

        // Obtener el candidato
        $candidato = Candidato::find($request->candidato);

        // Guardar el voto con nombre y partido
        Voto::create([
            'nombre_candidato' => $candidato->nombre,
            'partido_candidato' => $candidato->partido,
        ]);

        // Redirigir con mensaje de éxito
        return redirect('/inicio')->with('msg', 'Voto registrado con éxito.');
    }
}
