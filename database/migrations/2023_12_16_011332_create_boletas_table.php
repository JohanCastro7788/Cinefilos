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
        Schema::create('boletas', function (Blueprint $table) {
            $table->id('boleta_id');
            $table->unsignedBigInteger('funcion_id');
            $table->foreign('funcion_id')
                ->references('funcion_id')
                ->on('funcions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('nro_silla');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boletas');
    }
};
