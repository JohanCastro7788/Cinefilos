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
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id('detalle_id');
            $table->unsignedBigInteger('compra_id');
            $table->foreign('compra_id')
                ->references('compra_id')
                ->on('compras')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->enum('tipo_silleteria', ['vip', 'general']);
            $table->integer('valor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_compras');
    }
};
