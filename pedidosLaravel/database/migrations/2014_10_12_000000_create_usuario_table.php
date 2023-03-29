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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('nick');
            $table->string('email')->unique();
           
            $table->string('passwrd');
            
            $table->date('fecha_nacimiento');
            $table->string('avatar');
            $table->date('fecha_alta');
            $table->integer('activo');
            $table->integer('intentos');
            $table->double('control');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
