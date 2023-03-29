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
        Schema::create('administradores', function (Blueprint $table) {
            $table->id('id_administrador');
            $table->string('usuario')->unique();
            $table->string('nombre');
            $table->string('contrasea');
            $table->integer('superadmin')->default(0);
            $table->integer('productos')->default(0);
            $table->integer('pedidos')->default(0);
            $table->integer('almacen')->default(0);
            $table->integer('reparto')->default(0);
            $table->integer('activo')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administradores');
    }
};
