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
        Schema::create('funcions', function (Blueprint $table) {
            $table->id('funcion_id');
            $table->unsignedBigInteger('pelicula_id');
            $table->foreign('pelicula_id')
                ->references('pelicula_id')
                ->on('peliculas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('sala_id');
            $table->foreign('sala_id')
                ->references('sala_id')
                ->on('salas')
                ->onUpdate('cascade')
                ->onUpdate('cascade');
            $table->timestamp('fecha_hora_func');
            $table->integer('valor_func');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcions');
    }
};
