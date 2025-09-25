<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // nombre completo
            $table->string('email')->unique();
            $table->string('foto_face')->nullable(); // para la foto de reconocimiento facial
            $table->string('password')->nullable(); // opcional por si quieres contraseña
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

