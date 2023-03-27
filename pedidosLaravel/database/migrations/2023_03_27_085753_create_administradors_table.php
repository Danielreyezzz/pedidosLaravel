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
        Schema::create('administradors', function (Blueprint $table) {
            $table->id();
            $table->string('usuario');
            $table->string('nombre');
            $table->string('contrasea');
            $table->integer('superadmin');
            $table->integer('productos');
            $table->integer('pedidos');
            $table->integer('almacen');
            $table->integer('reparto');
            $table->integer('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administradors');
    }
};
