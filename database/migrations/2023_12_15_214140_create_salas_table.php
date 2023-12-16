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
        Schema::create('salas', function (Blueprint $table) {
            $table->id('sala_id');
            $table->integer('consecutivo');
            $table->enum('tipo_sala', ['2d', '3d']);
            $table->unsignedBigInteger('teatro_id');
            $table->foreign('teatro_id')
                ->references('teatro_id')
                ->on('teatros')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salas');
    }
};
