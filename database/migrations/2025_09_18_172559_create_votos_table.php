<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('votos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_candidato');
            $table->string('partido_candidato');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('votos');
    }
};
