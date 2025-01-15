<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->text('diagnostico')->nullable();
            $table->text('tratamiento')->nullable();
            $table->text('material')->nullable();
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
            $table->string('icono')->nullable();
            $table->decimal('costo', 8, 2)->nullable();
            $table->text('descripcion');
            $table->timestamps();
        });

        Schema::create('cobros_servicios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id')->nullable()->index();
            $table->unsignedBigInteger('receta_id')->nullable()->index();
            $table->unsignedBigInteger('personal_id')->nullable()->index();

            $table->text('servicios')->nullable();
            $table->text('medicamentos')->nullable();
            $table->text('material')->nullable();
            $table->decimal('monto', 10, 2);
            $table->boolean('facturación')->default(false);
            $table->string('rutaticket')->nullable();
            $table->timestamps();

            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreign('receta_id')->references('id')->on('receta_medicas')->onDelete('cascade');
            $table->foreign('personal_id')->references('id')->on('personal')->onDelete('cascade');
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

        //Almacenista

        Schema::create('inventario_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->string('tipo');
            $table->string('placa')->unique();
            $table->integer('año');
            $table->string('cantidad');
            $table->string('estado');
            $table->string('rutaimg')->nullable();
            $table->timestamps();
        });

        Schema::create('inventario_oficinas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipo');  // Ejemplo: muebles, papelería, equipo de computo, etc.
            $table->integer('cantidad');
            $table->string('estado');  // Ejemplo: nuevo, usado, en reparación, etc.
            $table->string('rutaimg')->nullable();
            $table->timestamps();
        });

        Schema::create('inventario_medicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable(); // Descripción detallada del material
            $table->string('tipo');
            $table->integer('cantidad');
            $table->integer('precio');
            $table->date('fecha_caducidad');
            $table->string('rutaimg')->nullable();
            $table->timestamps();
        });

        Schema::create('inventario_equipo_computos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('marca');
            $table->string('modelo');
            $table->string('tipo');
            $table->string('numero_serie')->unique();  // Número de serie único
            $table->integer('cantidad')->default(1);
            $table->string('estado');  // Ejemplo: en uso, en reparación, disponible, etc.
            $table->string('rutaimg')->nullable();
            $table->timestamps();
        });

        Schema::create('equipos_limpieza', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('articulo'); // Nombre del equipo de limpieza
            $table->string('marca'); // Marca
            $table->string('tipo');// Modelo, puede ser opcional
            $table->string('presentacion');
            $table->integer('cantidad'); // Cantidad
            $table->string('rutaimg')->nullable();
            $table->timestamps(); // created_at y updated_at
        });

        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('tipodocumento');
            $table->string('motivo');
            $table->string('rutaimg');
            $table->timestamps();
        });

        Schema::create('ambulance_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ambulance_id')->nullable()->index();
            $table->datetime('start_time');
            $table->datetime('end_time')->nullable();
            $table->enum('status', ['En servicio', 'Finalizado'])->default('En servicio');
            $table->timestamps();

            $table->foreign('ambulance_id')->references('id')->on('inventario_vehiculos')->onDelete('cascade');
        });


        //Emergency Phase
        //Fase 1
        Schema::create('emergency_phase1', function (Blueprint $table) {
            $table->id();
            $table->time('hora_llamada')->nullable();
            $table->time('hora_despacho')->nullable();
            $table->time('hora_arribo')->nullable();
            $table->time('hora_traslado')->nullable();
            $table->time('hora_hospital')->nullable();
            $table->time('hora_disponible')->nullable();
            $table->string('motivo_atencion')->nullable();
            $table->string('direccion_accidente')->nullable();
            $table->string('entre_calles_accidente')->nullable();
            $table->string('colonia_accidente')->nullable();
            $table->string('municipio_accidente')->nullable();
            $table->string('lugar_ocurrencia')->nullable();
            $table->string('otro_lugar')->nullable();
            $table->timestamps();
        });
        //Fase 2
        Schema::create('emergency_phase2', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folio');
            $table->unsignedBigInteger('ambulance_id')->nullable();
            $table->unsignedBigInteger('chofer_id')->nullable();
            $table->unsignedBigInteger('paramedico_id')->nullable();
            $table->unsignedBigInteger('helicoptero_id')->nullable();
            $table->timestamps();
            // Claves foráneas
            $table->foreign('folio')->references('id')->on('emergency_phase1')->onDelete('cascade');
            $table->foreign('ambulance_id')->references('id')->on('inventario_vehiculos')->onDelete('set null');
            $table->foreign('chofer_id')->references('id')->on('personal')->onDelete('set null');
            $table->foreign('paramedico_id')->references('id')->on('personal')->onDelete('set null');
            $table->foreign('helicoptero_id')->references('id')->on('inventario_vehiculos')->onDelete('set null');
        });
        //Fase 3
        Schema::create('emergency_phase3', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folio')->nullable();
            $table->string('nombre')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->integer('edad')->nullable();
            $table->integer('meses')->nullable();
            $table->enum('sexo', ['masculino', 'femenino', 'otro'])->nullable();
            $table->string('tipo_sangre')->nullable();
            $table->string('domicilio')->nullable();
            $table->string('colonia')->nullable();
            $table->string('alcaldia')->nullable();
            $table->string('telefono')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('derechohabiente')->nullable();
            $table->string('compania_seguro')->nullable();
            $table->timestamps();

            $table->foreign('folio')->references('id')->on('emergency_phase1')->onDelete('cascade');
        });
        //Fase 4
        Schema::create('emergency_phase4', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folio');
            $table->string('agente_causal')->nullable();
            $table->string('especificar')->nullable();
            $table->string('lesionescausadas')->nullable();
            $table->string('tipo_accidente')->nullable();
            $table->string('atropelladopor')->nullable();
            $table->string('colision')->nullable();
            $table->string('contraobjeto')->nullable();
            $table->string('impacto')->nullable();
            $table->integer('hundimiento')->nullable();
            $table->string('parabrisas')->nullable();
            $table->string('volante')->nullable();
            $table->string('bolsaaire')->nullable();
            $table->string('cinturon')->nullable();
            $table->string('dentrovehiculo')->nullable();
            $table->timestamps();

            $table->foreign('folio')->references('id')->on('emergency_phase1')->onDelete('cascade');
        });
        //Fase 5
        Schema::create('emergency_phase5', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folio');
            $table->string('agente_causal')->nullable();
            $table->string('especificar')->nullable();
            $table->string('lesionescausadas')->nullable();
            $table->string('tipo_accidente')->nullable();
            $table->string('atropelladopor')->nullable();
            $table->string('colision')->nullable();
            $table->string('contraobjeto')->nullable();
            $table->string('impacto')->nullable();
            $table->integer('hundimiento')->nullable();
            $table->string('parabrisas')->nullable();
            $table->string('volante')->nullable();
            $table->string('bolsaaire')->nullable();
            $table->string('cinturon')->nullable();
            $table->string('dentrovehiculo')->nullable();

            // Nueva información de fase 5
            $table->string('origen_probable')->nullable();
            $table->string('especificarOrigen')->nullable();
            $table->string('primeravez')->nullable();
            $table->string('subsecuente')->nullable();
            $table->timestamps();

            $table->foreign('folio')->references('id')->on('emergency_phase1')->onDelete('cascade');
        });
        //Fase 6
        Schema::create('emergency_phase6', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folio');
            // Datos de la madre
            $table->string('gesta')->nullable();
            $table->string('cesareas')->nullable();
            $table->string('para')->nullable();
            $table->string('aborto')->nullable();
            $table->string('semanas')->nullable();
            $table->date('fechaParto')->nullable();
            $table->string('membranas')->nullable();
            $table->date('fum')->nullable();
            $table->time('horaContracciones')->nullable();
            $table->string('frecuencia')->nullable();
            $table->string('duracion')->nullable();

            // Datos post-parto
            $table->time('horanacimiento')->nullable();
            $table->string('lugar_post_parto')->nullable();
            $table->string('placenta_expulsada')->nullable();

            // Datos del recién nacido
            $table->string('estado_producto')->nullable();
            $table->string('genero_producto')->nullable();
            $table->unsignedTinyInteger('apgar1')->nullable();
            $table->unsignedTinyInteger('apgar5')->nullable();
            $table->timestamps();
            $table->foreign('folio')->references('id')->on('emergency_phase1')->onDelete('cascade');
        });
        //Fase 7
        Schema::create('emergency_phase7', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folio');
            $table->string('nivel_conciencia')->nullable();
            $table->string('viaaerea')->nullable();
            $table->string('reflejo_deglutacion')->nullable();
            $table->string('ventilacion_observacion')->nullable();
            $table->string('ventilacion_auscultacion')->nullable();
            $table->json('ventilacion_hemitorax')->nullable();
            $table->json('ventilacion_sitio')->nullable();
            $table->string('circulacion_pulsos')->nullable();
            $table->json('circulacion_calidad')->nullable();
            $table->string('circulacion_piel')->nullable();
            $table->string('circulacion_caracteristicas')->nullable();
            $table->timestamps();

            // Llave foránea
            $table->foreign('folio')->references('id')->on('emergency_phase1')->onDelete('cascade');
        });
        //Fase 8
        Schema::create('emergency_phase8', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folio');
            $table->json('exploracion_fisica')->nullable();  // Descripción de la exploración física
            $table->enum('valor', ['1', '2','3','4','5'])->nullable(); // valor de pupilas
            $table->time('hora_es')->nullable();
            $table->decimal('fr', 5, 2)->nullable();
            $table->decimal('fc', 5, 2)->nullable();
            $table->decimal('tas', 5, 2)->nullable();
            $table->decimal('tad', 5, 2)->nullable();
            $table->decimal('spo2', 5, 2)->nullable();
            $table->decimal('temp', 5, 2)->nullable();
            $table->decimal('glasgow', 5, 2)->nullable();
            $table->decimal('trauma_score', 5, 2)->nullable();
            $table->decimal('ekg', 5, 2)->nullable();
            $table->string('atendido')->nullable();
            $table->string('alergias')->nullable();
            $table->string('medicamentos')->nullable();
            $table->string('antecedentes')->nullable();
            $table->string('ultima_comida')->nullable();
            $table->text('eventos_previos')->nullable();
            $table->string('condicion')->nullable();
            $table->string('estabilidad')->nullable();
            $table->string('prioridad')->nullable();
            $table->timestamps();
            $table->foreign('folio')->references('id')->on('emergency_phase1')->onDelete('cascade');
        });
        //Fase 8_Zonas
        Schema::create('emergency_phase8_zonas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folio');
            $table->unsignedBigInteger('id_phase')->nullable();
            $table->string('zona')->nullable();
            $table->string('coordinate')->nullable();// Coordenadas
            $table->binary('capturas')->nullable();
            $table->timestamps();

            $table->foreign('folio')->references('id')->on('emergency_phase1')->onDelete('cascade');
            $table->foreign('id_phase')->references('id')->on('emergency_phase8')->onDelete('cascade');
        });
        //Fase 9
        Schema::create('Emergency_Phase9', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folio');
            $table->string('via_aerea')->nullable(); // Guardar los valores seleccionados de Vía Aérea
            $table->string('control_cervical')->nullable(); // Guardar el valor seleccionado de Control Cervical
            // Asistencia Ventilatoria
            $table->string('asistencia_ventilatoria')->nullable();
            $table->string('FREC')->nullable();
            $table->string('volumen')->nullable();
            $table->string('heperventilacion')->nullable();
            $table->string('descompresión_pleural_con_agua')->nullable();
            // Oxigenoterapia
            $table->json('oxigenoterapia')->nullable();
            $table->string('litros')->nullable();
            // Procedimientos adicionales
            $table->json('hemitorax')->nullable();

            // Control de Hemorragias
            $table->string('control_hemorragias')->nullable();

            // Vías Venosas
            $table->json('vias_venosas')->nullable();

             // Sitio de Aplicación
            $table->string('sitio_aplicacion')->nullable();

             // Tipos de Soluciones
            $table->json('tipo_soluciones')->nullable();
            $table->json('soluciones')->nullable(); // Para detalles adicionales como especificaciones, cantidad, etc.
            // Registro de Medicamentos y Terapia Eléctrica
            $table->json('medicamentos_terapia')->nullable();

            // RCP y Procedimientos
            $table->json('rcp_procedimientos')->nullable();


            $table->timestamps();

            $table->foreign('folio')->references('id')->on('emergency_phase1')->onDelete('cascade');
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
