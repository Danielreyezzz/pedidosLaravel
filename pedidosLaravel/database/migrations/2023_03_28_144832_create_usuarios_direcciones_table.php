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
        Schema::create('usuarios_direcciones', function (Blueprint $table) {
            $table->id('id_direccion');
            $table->integer('id_usuario');
            $table->string('nombre_direccion');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('cp');
            $table->string('provincia');
            $table->string('poblacion');
            $table->string('telefono');
            $table->string('detalle');
            $table->integer('principal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios_direcciones');
    }
};
