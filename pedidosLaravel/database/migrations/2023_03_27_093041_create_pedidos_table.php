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
            $table->id('id_pedido');
            $table->integer('id_usuario');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('estado');
            $table->date('fecha_entregado')->nullable();
            $table->integer('id_hora_entrega');
            $table->date('fecha_entrega');
            $table->integer('id_direccion');
            $table->integer('id_pago');
            $table->integer('id_repartidor');
            
           
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
