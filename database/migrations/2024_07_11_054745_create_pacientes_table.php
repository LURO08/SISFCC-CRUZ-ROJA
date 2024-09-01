<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidopaterno');
            $table->string('apellidomaterno');
            $table->date('fecha_nacimiento');
            $table->integer('edad');
            $table->string('sexo');
            $table->string('tipo_sangre');
            $table->string('imagen')->nullable(); // Campo para la imagen del paciente
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};