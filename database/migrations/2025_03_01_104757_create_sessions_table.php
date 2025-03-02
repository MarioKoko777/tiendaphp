<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Identificador único de la sesión
            $table->foreignId('user_id')->nullable()->index(); // ID del usuario (si está autenticado)
            $table->string('ip_address', 45)->nullable(); // Dirección IP del usuario
            $table->text('user_agent')->nullable(); // Agente de usuario (navegador, dispositivo)
            $table->text('payload'); // Datos de la sesión (en formato serializado)
            $table->integer('last_activity')->index(); // Timestamp de la última actividad
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
