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
        Schema::create('pedidos_estados', function (Blueprint $table) {
            $table->id('id_estado');
            $table->integer('id_pedido');
            $table->integer('estado');
            $table->string('observacion');
            $table->date('fecha');
            $table->time('hora');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos_estados');
    }
};
