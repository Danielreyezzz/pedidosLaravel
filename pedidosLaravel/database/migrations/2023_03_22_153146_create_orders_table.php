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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('provincia');
            $table->string('localidad');
            $table->string('direccion');
            $table->integer('codigo_postal');
            $table->boolean('entregado');
            $table->string('comentario');
            $table->date('hora_entrega');
            $table->integer('bultos');
            $table->string('peso');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
