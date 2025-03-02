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
    Schema::create('productos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
        $table->string('nombre', 100);
        $table->text('descripcion')->nullable();
        $table->decimal('precio', 10, 2);
        $table->integer('stock');
        $table->string('oferta', 2)->nullable();
        $table->date('fecha')->nullable();
        $table->string('imagen', 255)->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
