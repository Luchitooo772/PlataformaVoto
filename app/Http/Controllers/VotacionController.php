<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;
use App\Models\Voto;
use Illuminate\Support\Facades\Auth;

class VotacionController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        if ($usuario->ha_votado) {
            return redirect('/inicio')->with('msg', 'Ya has votado.');
        }

        $candidatos = Candidato::all();
        return view('votar', compact('candidatos'));
    }

    public function store(Request $request)
    {
        $request->validate(['candidato' => 'required|exists:candidatos,id']);

        Voto::create(['candidato_id' => $request->candidato]);

        $usuario = Auth::user();
        $usuario->ha_votado = true;
        $usuario->save();

        return redirect('/inicio')->with('msg', 'Voto registrado con éxito.');
    }
}
