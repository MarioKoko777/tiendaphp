<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pedidos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('usuario_id')->constrained()->onDelete('cascade');
        $table->string('provincia', 100);
        $table->string('localidad', 100);
        $table->string('direccion', 255);
        $table->decimal('coste', 10, 2);
        $table->string('estado', 20)->default('pendiente');
        $table->date('fecha');
        $table->time('hora');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
