<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nombre' => 'Ludmila',
            'email' => 'lud@example.com',
            'foto_face' => null, // se puede subir la foto después
            'password' => bcrypt('12345678'), // solo para pruebas
        ]);
    }
}
