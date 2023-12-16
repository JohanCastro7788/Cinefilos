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
        Schema::create('sillas', function (Blueprint $table) {
            $table->id('silla_id');
            $table->string('concecutivo');
            $table->foreign('sala_id')
            ->references('sala_id')
            ->on('salas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->enum('tipo_silla', ['vip', 'general']);
            $table->string('columna');
            $table->integer('numero');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sillas');
    }
};
