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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('estado');
            $table->date('fecha_entregado')->nullable();
            $table->integer('id_hora_entrega');
            $table->date('fecha_entrega');
            $table->unsignedBigInteger('direccion_id');
            $table->unsignedBigInteger('administrador_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('direccion_id')->references('id')->on('user_direccions')->onDelete('cascade');
            $table->integer('id_pago');
            $table->foreign('administrador_id')->references('id')->on('administradors')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
