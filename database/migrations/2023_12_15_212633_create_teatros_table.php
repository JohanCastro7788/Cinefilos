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
        Schema::create('teatros', function (Blueprint $table) {
            $table->id('teatro_id');
            $table->unsignedBigInteger('cod_ciudad');
            $table->foreign('cod_ciudad')
                ->references('cod_ciudad')
                ->on('ciudads')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('teatro_nombre');
            $table->string('direccion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teatros');
    }
};
