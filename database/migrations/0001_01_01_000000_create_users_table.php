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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });

        Schema::create('personal', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->integer('Edad');
            $table->string('Sexo');
            $table->date('FechaNacimiento');
            $table->string('Departamento');
            $table->string('Cargo');
            $table->string('Turno');
            $table->string('Telefono');
            $table->string('Direccion');
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });



        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('doctores', function (Blueprint $table) {
            $table->id()->primary();

            $table->unsignedBigInteger('personalid')->nullable()->index();
            $table->string('cedulaProfesional');
            $table->string('rutafirma')->nullable();  // Campo de firma opcional
            $table->timestamps();
            $table->foreign('personalid')->references('id')->on('personal')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctores');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
