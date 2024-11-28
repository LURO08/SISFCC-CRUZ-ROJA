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
            $table->integer('edad');
            $table->string('sexo');
            $table->string('tipo_sangre');
            $table->timestamps();
        });

        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('dosis');
            $table->string('medida')->nullable();
            $table->integer('cantidad');
            $table->date('caducidad');
            $table->decimal('precio', 8, 2);
            $table->string('imagen')->nullable();
            $table->timestamps();
        });

        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidopaterno');
            $table->string('apellidomaterno');
            $table->string('telefono', 15);
            $table->string('correo');
            $table->timestamps();
        });

        Schema::create('receta_medicas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id')->nullable()->index();
            $table->unsignedBigInteger('doctor_id')->nullable()->index();
            $table->string('nombre_paciente', 100);
            $table->string('presion_arterial', 50)->nullable();
            $table->float('temperatura')->nullable();
            $table->float('talla')->nullable();
            $table->float('peso')->nullable();
            $table->string('alergia', 255)->nullable();
            $table->integer('frecuencia_cardiaca')->nullable();
            $table->integer('frecuencia_respiratoria')->nullable();
            $table->float('saturacion_oxigeno')->nullable();
            $table->text('diagnostico');
            $table->text('tratamiento');
            $table->boolean('surtida')->default(false);  // Agregar la columna booleana con un valor por defecto
            $table->boolean('cobrada')->default(false);  // Agregar la columna booleana con un valor por defecto
            $table->timestamps();
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');

            $table->foreign('doctor_id')->references('id')->on('doctores')->onDelete('cascade');
        });

        Schema::create('expediente_medicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id')->nullable()->index();
            $table->unsignedBigInteger('doctor_id')->nullable()->index();
            $table->text('diagnostico');
            $table->text('tratamiento');
            $table->unsignedBigInteger('receta_id')->nullable()->index();
            $table->timestamps();

            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctores')->onDelete('cascade');
            $table->foreign('receta_id')->references('id')->on('receta_medicas')->onDelete('cascade');
        });


        Schema::create('transaccions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receta_medica_id')->nullable()->index();
            $table->string('destino'); // 'farmacia' o 'caja'
            $table->timestamps();

            $table->foreign('receta_medica_id')->references('id')->on('receta_medicas')->onDelete('cascade');
        });

        Schema::create('medicamentossurtidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receta_id')->nullable()->index();
            $table->unsignedBigInteger('medicamento_id')->nullable()->index();
            $table->integer('cantidad')->nullable();
            $table->unsignedBigInteger('paciente_id')->nullable()->index();
            $table->timestamps();

            $table->foreign('medicamento_id')->references('id')->on('medicamentos')->onDelete('cascade');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('receta_id')->references('id')->on('receta_medicas')->onDelete('cascade');
        });


        Schema::create('pedidos_proveedor', function (Blueprint $table) {
            $table->id();
            $table->integer('pedido_id');
            $table->unsignedBigInteger('id_proveedor')->nullable()->index();
            $table->unsignedBigInteger('medicamento_id')->nullable()->index();
            $table->integer('medicamento_cantidad')->nullable();
            $table->timestamps();

            $table->foreign('id_proveedor')->references('id')->on('proveedores')->onDelete('cascade');
            $table->foreign('medicamento_id')->references('id')->on('medicamentos')->onDelete('cascade');
        });


        Schema::create('donaciones', function (Blueprint $table) {
            $table->id();
            $table->integer('donacion_id');
            $table->string('nombredonante');
            $table->dateTime('fecha_donacion')->nullable();
            $table->unsignedBigInteger('medicamento_id')->nullable()->index();
            $table->integer('medicamento_cantidad')->nullable();
            $table->timestamps();
        });

        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('icono');
            $table->decimal('costo', 8, 2)->nullable();
            $table->text('descripcion');
            $table->timestamps();
        });


        Schema::create('cobros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receta_id')->nullable()->index();
            $table->unsignedBigInteger('paciente_id')->nullable()->index();
            $table->string('nombre');
            $table->unsignedBigInteger('servicio')->nullable()->index();
            $table->decimal('monto', 10, 2);
            $table->date('fecha');
            $table->boolean('facturación')->default(false);
            $table->string('rutaticket')->nullable();
            $table->timestamps();

            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreign('receta_id')->references('id')->on('receta_medicas');
            $table->foreign('servicio')->references('id')->on('servicios')->onDelete('cascade');
        });

        Schema::create('solicitudes_factura', function (Blueprint $table) {
            $table->bigIncrements('id'); // ID único para cada solicitud
            $table->unsignedBigInteger('cobro_id')->nullable()->index();
            $table->string('nombre', 255); // Nombre completo de la persona
            $table->string('rfc', 13); // RFC del solicitante
            $table->text('direccion'); // Dirección fiscal
            $table->string('telefono', 15)->nullable(); // Teléfono de contacto (opcional)
            $table->string('correo', 255); // Correo electrónico para la factura
            $table->decimal('monto', 10, 2); // Monto de la factura
            $table->enum('estatus', ['pendiente', 'procesada', 'lista'])->default('pendiente'); // Estado de la solicitud
            $table->string('rutafactura')->nullable();
            $table->timestamps(); // Campos created_at y updated_at

            $table->foreign('cobro_id')->references('id')->on('cobros')->onDelete('cascade');
        });








    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receta_medicas');
        Schema::dropIfExists('pacientes');
        Schema::dropIfExists('medicamentos');
        Schema::dropIfExists('proveedores');
        Schema::dropIfExists('expediente_medicos');
        Schema::dropIfExists('transaccions');
        Schema::dropIfExists('medicamentossurtidos');
        Schema::dropIfExists('pedidos_proveedor');
        Schema::dropIfExists('donaciones');
        Schema::dropIfExists('medicamentos_donados');
        Schema::dropIfExists('servicios');
        Schema::dropIfExists('facturas');
        Schema::dropIfExists('cobros');

    }
};
