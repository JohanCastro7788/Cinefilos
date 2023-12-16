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
        Schema::create('ciudads', function (Blueprint $table) {
            $table->id('cod_ciudad');
            $table->unsignedBigInteger('cod_departamento');
            $table->foreign('cod_departamento')
                ->references('cod_departamento')
                ->on('departamentos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('nombre_ciu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciudads');
    }
};
