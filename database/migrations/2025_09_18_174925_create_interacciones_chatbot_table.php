<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('interacciones_chatbot', function (Blueprint $table) {
            $table->id('id_interaccion');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->text('pregunta_usuario');
            $table->text('respuesta_chatbot');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('interacciones_chatbot');
    }
};