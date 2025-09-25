<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidato;

class CandidatosSeeder extends Seeder
{
    public function run(): void
    {
        Candidato::create([
            'nombre' => 'Juan Pérez',
            'partido' => 'Partido Ficticio',
            'foto' => null, // puedes poner la ruta de una imagen si quieres
        ]);

        Candidato::create([
            'nombre' => 'María López',
            'partido' => 'Partido Ejemplo',
            'foto' => null,
        ]);

        Candidato::create([
            'nombre' => 'Carlos García',
            'partido' => 'Partido Innovador',
            'foto' => null,
        ]);
    }
}
