<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes y Recetas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .btn {
            display: flex;
            align-items: center;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, padding 0.3s;
            justify-content: center;
        }

        .btn:hover {
            background-color: #0056b3;
            /* Color de fondo al pasar el ratón */
        }

        .collapse-btn {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: transparent;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #007bff;
            transition: color 0.3s;
        }

        .collapse-btn:hover {
            color: #0056b3;
        }

        /* Estilo del contenido principal */
        .content {
            flex: 1;
            /* Toma el resto del espacio disponible */
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            /* Activar flexbox */
            justify-content: center;
            /* Centrar horizontalmente */
            align-items: center;
            /* Centrar verticalmente */
        }

        .recipesContent h2 {
            margin: 20px 0 0;
            /* Espacio en la parte superior, sin margen en la parte inferior */
            text-shadow: 1px 2px 2px rgba(0, 0, 0, 0.2);
            /* Sombra de texto más sutil */
            letter-spacing: 1px;
            /* Espaciado entre letras */
            font-weight: 800;
            font-size: 2rem;
            color: #007bff;
            /* Color azul */
            text-align: center;
        }

        .recipesContent {
            overflow-y: auto;
            overflow-x: auto;
            height: 90vh;
            margin-top: 0;
        }

        /* Estilo de la tabla de recetas */
        .recipesContent .table {
            width: 100%;
            /* Mayor separación inferior */
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            /* Sombra más pronunciada */
            border-collapse: collapse;
            overflow-y: auto;
            overflow-x: auto;
            /* Unificar bordes */
        }

        .recipesContent .table th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .recipesContent .table td {
            text-align: center;
            padding: 10px;
            border: 1px solid #bebebe;
        }


        .recipesContent .table tr:hover {
            background-color: #c1dae6;
        }


        /* Estilo de la tabla de registros de pacientes */
        .modalViewPatientRecord table {
            width: 100%;
            margin-bottom: 30px;
            /* Mayor separación inferior */
            background-color: #f7f9fc;
            /* Color de fondo diferente */
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            /* Sombra más pronunciada */
            border-collapse: collapse;
            /* Unificar bordes */
        }

        .modalViewPatientRecord table th,
        .modalViewPatientRecord table td {
            border: 1px solid #ccc;
            /* Bordes más claros */
            padding: 15px;
            text-align: center;
        }

        .modalViewPatientRecord table th {
            background-color: #28a745;
            /* Color verde para encabezados */
            color: white;
            font-weight: bold;
            /* Negrita en encabezados */
        }

        .modalViewPatientRecord table tr:hover {
            background-color: #d4edda;
            /* Color diferente al pasar el mouse */
        }

        .modalViewPatientRecord table tr:nth-child(even) {
            background-color: #f1f1f1;
            /* Color para filas pares */
        }

        /* Opcional: estilos para botones dentro de las tablas */
        .recipesContent table button,
        .modalViewPatientRecord table button {
            background-color: #007bff;
            /* Color de fondo de los botones de recetas */
            color: white;
            /* Color del texto de los botones */
            border: none;
            padding: 8px 12px;
            /* Espaciado interno de los botones */
            border-radius: 5px;
            /* Bordes redondeados de los botones */
            cursor: pointer;
            transition: background-color 0.3s ease;
            /* Transición suave */
        }

        .recipesContent table button:hover {
            background-color: #0056b3;
            /* Color de fondo al pasar el mouse */
        }

        .modalViewPatientRecord table button {
            background-color: #28a745;
            /* Color de fondo de los botones de pacientes */
        }

        .modalViewPatientRecord table button:hover {
            background-color: #218838;
            /* Color de fondo al pasar el mouse */
        }

        .patientDetails {
            width: 100%;
            /* Ancho completo */
            border-radius: 8px;
            /* Bordes redondeados */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            /* Sombra */
            background-color: #fff;
            /* Color de fondo blanco */
            margin-bottom: 20px;
            /* Margen inferior */
        }

        .detailHeader {
            display: flex;
            /* Usar flexbox para la cabecera */
            background-color: #007bff;
            /* Color de fondo de la cabecera */
            color: white;
            /* Color del texto */
            font-weight: bold;
            /* Negrita para la cabecera */
            border-top-left-radius: 8px;
            /* Bordes redondeados */
            border-top-right-radius: 8px;
            /* Bordes redondeados */
        }

        .detailRow {
            display: flex;
            /* Usar flexbox para las filas */
            border-bottom: 1px solid #ddd;
            /* Línea divisoria entre filas */
            padding: 0.5rem 0;
            /* Espaciado vertical en las filas */
        }

        .detailField {
            flex: 1;
            /* Las celdas se distribuyen equitativamente */
            padding: 0.5rem;
            /* Espaciado interno */
            text-align: left;
            /* Alinear texto a la izquierda */
        }

        .detailValue {
            flex: 2;
            /* Las celdas se distribuyen equitativamente */
            padding: 0.5rem;
            /* Espaciado interno */
            text-align: left;
            /* Alinear texto a la izquierda */
        }


        .detailHeader .detailField,
        .detailHeader .detailValue {
            padding: 0.7rem;
            /* Espaciado para la cabecera */
        }

        .menu-toogle {
            justify-content: flex-end;
            text-align: center;
        }

        /* Ajuste de iconos y texto */
        .icon {
            margin-right: 10px;
            /* Espaciado entre icono y texto */
            justify-content: flex-end;
            text-align: center;
            padding-left: 5px;
        }

        /* Estilos específicos para el menú colapsado */
        #menu2 {
            display: flex;
            /* Para que los iconos se alineen horizontalmente */
            gap: 15px;
            /* Espacio entre iconos */
            justify-content: center;
        }

        .menu-toggle {
            display: flex;
            justify-content: right;
            text-align: right;
        }

        /* Botones */
        .btn-create-recipe,
        .btn-view-recipes {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .btn-create-recipe:hover,
        .btn-view-recipes:hover {
            background-color: #0056b3;
        }

        /* Estilo de las tablas */
        .modalViewPatientRecord table {

            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .modalViewPatientRecord table th,
        .modalViewPatientRecord table td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }

        .modalViewPatientRecord table th {
            background-color: #f32929;
            color: white;
        }

        .modalViewPatientRecord table tr:hover {
            background-color: #f1f1f1;
        }

        /* Estilo de botones en la tabla */
        .btn-view-recipe,
        .btn-edit-recipe,
        .btn-delete-recipe {
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
            transition: background-color 0.3s;
        }

        .btn-view-recipe:hover,
        .btn-edit-recipe:hover,
        .btn-delete-recipe:hover {
            background-color: #0056b3;
        }

        /* Estilo del contenedor de búsqueda */
        .search-container {
            margin-bottom: 15px;
        }

        #searchPatient {
            width: 100%;
            /* Ancho fijo para el input de búsqueda */
        }

        /* Resultados de búsqueda */
        .search-results {
            margin-top: 10px;
            max-height: 150px;
            overflow-y: auto;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fff;
        }

        .search-results div {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
        }

        .search-results div:last-child {
            border-bottom: none;
        }

        .search-results div:hover {
            background-color: #f1f1f1;
        }

        /* Estilos de botones primarios y secundarios */
        .btn-primary,
        .btn-secondary {
            padding: 10px 20px;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-primary:hover,
        .btn-secondary:hover {
            opacity: 0.8;
        }

        .notification {
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .recetasList {
            width: 100%;
            /* Ancho completo */
            border-radius: 8px;
            /* Bordes redondeados */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            /* Sombra */
            background-color: #fff;
            /* Color de fondo blanco */
            overflow: hidden;
            /* Ocultar contenido que sobresale */
            margin-bottom: 20px;
            /* Margen inferior */
        }

        .recetaHeader {
            display: flex;
            /* Usar flexbox para la cabecera */
            background-color: #007bff;
            /* Color de fondo de la cabecera */
            color: white;
            /* Color del texto */
        }

        .recetasBody {
            border-top: 1px solid #ccc;
            /* Línea divisoria */
        }

        .recetaRow {
            display: flex;
            /* Usar flexbox para las filas */
            border-bottom: 1px solid #ccc;
            /* Línea divisoria entre filas */
            padding: 0.5rem 0;
            /* Espaciado vertical en las filas */
        }

        .recetaCell {
            flex: 1;
            /* Las celdas se distribuyen equitativamente */
            padding: 0.5rem;
            /* Espaciado interno */
            text-align: left;
            /* Alinear texto a la izquierda */
        }

        .recetaRow:hover {
            background-color: #91bae586;
            /* Color de fondo al pasar el mouse */
        }

        .recetaHeader .recetaCell {
            font-weight: bold;
            /* Negrita para la cabecera */
            padding: 0.7rem;
            /* Espaciado para la cabecera */
        }

        .modalViewPatientRecord .modal-content {
            border-radius: 10px;
            max-width: 750px;
            justify-content: center;

        }

        .modalViewPatientRecord .modal-body {
            padding: 10px;

        }




    </style>


    <link rel="stylesheet" href="{{ asset('css/component/modal.css') }}">

</head>

<body>
    @include('doctor.consulta.menu_nav')

    <div class="content">
        <!-- Tabla de Recetas Generadas -->
        <div id="recipesTable">
            <div class="recipesContent">
                <h2 class="table-title">RECETAS GENERADAS</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th rowspan="2">Folio</th>
                                <th colspan="3">Paciente</th>
                                <th colspan="3">Doctor</th>
                                <th rowspan="2">Acciones</th>
                            </tr>
                            <tr>
                                <th>Paciente</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Doctor</th>
                                <th>Apellido Paterno</th>
                                <th>Cédula Profesional</th>
                            </tr>
                        </thead>
                        <tbody id="recipesList">
                            @foreach ($recetasPaginadas as $receta)
                                <tr>
                                    <td>{{ $receta->id }}</td>
                                    <td>{{ $receta->paciente->nombre }}</td>
                                    <td>{{ $receta->paciente->apellidopaterno }}</td>
                                    <td>{{ $receta->paciente->apellidomaterno }}</td>
                                    <td>{{ $receta->doctor->personal->Nombre }}</td>
                                    <td>{{ $receta->doctor->personal->apellido_paterno }}</td>
                                    <td>{{ $receta->doctor->cedulaProfesional }}</td>
                                    <td>
                                        <div style="display: flex; flex-direction: column; gap: 0.2rem;">
                                            <!-- Botones para acciones -->
                                            <div style="display: flex; gap: 1rem;">
                                                <div style="flex: 1;">
                                                    <a href="{{route('doctor.receta.editar', $receta->id)}}"
                                                        style="display: flex; align-items: center; justify-content: center; width: 100%; background-color: #4CAF50; color: white; padding: 0.5rem; border-radius: 4px; border: none; cursor: pointer;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500"
                                                            fill="white" width="24" height="24">
                                                            <path
                                                                d="M165.2 471.08l-124.69 33.29a10 10 0 0 1-12.29-12.29l33.29-124.69L335.79 94.88l103.68 103.68zm-86.83-35.5l85.28-22.78-62.5-62.5-22.78 85.28zm139.58-43.53l-95.04-95.04-14.64 14.64 95.04 95.04 14.64-14.64zm103.67-60.15l103.67-103.68-46.29-46.29-103.67 103.67zm56.58-160.25l-28.29 28.29 46.29 46.29 28.29-28.29zm35.5-35.5l-14.64 14.64-28.29-28.29 14.64-14.64a20.05 20.05 0 0 1 28.29 0l0 0a20.05 20.05 0 0 1 0 28.29z" />
                                                        </svg>
                                                        <span style="padding-left: 5px;">Editar</span>
                                                    </a>


                                                </div>
                                                <div style="flex: 1;">
                                                    <form action="{{ route('doctor.receta.destroy', $receta->id) }}"
                                                        method="POST" style="margin: 0;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-delete"
                                                            style="display: flex; align-items: center; justify-content: center; width: 100%; background-color: #f44336; color: white; padding: 0.5rem; border-radius: 4px; border: none; cursor: pointer;">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 24 24" fill="white" width="24"
                                                                height="24" style="margin-right: 8px;">
                                                                <path d="M3 6h18v2H3zm2 2h14l-1 12H6zM6 8h12l1 10H5z" />
                                                            </svg>
                                                            Eliminar
                                                        </button>

                                                    </form>
                                                </div>
                                            </div>
                                            <div style="display: flex; gap: 1rem;">
                                                <div style="flex: 1;">
                                                    <a href="{{ route('receta.descargar', $receta->id) }} " target="_blank"
                                                        style="display: flex; align-items: center; justify-content: center; background-color: #2196F3; color: white; padding: 0.5rem; border-radius: 4px; text-decoration: none;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="white" width="24" height="24"
                                                            style="margin-right: 8px;">
                                                            <path d="M18 15l-6 6-6-6h4V3h4v12h4zM3 19h18v2H3z" />
                                                        </svg>
                                                        Receta
                                                    </a>
                                                </div>


                                                <div style="flex: 1;">
                                                    <a href="#viewPatientRecordModal-{{ $receta->id }}"
                                                        class="btn btn-file"
                                                        style="display: flex; align-items: center; justify-content: center; background-color: #ff9800; color: white; padding: 0.5rem; border-radius: 4px; text-decoration: none;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="white" width="24" height="24"
                                                            style="margin-right: 8px;">
                                                            <path
                                                                d="M6 2c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6H6zm10 18H8v-2h8v2zm0-4H8v-2h8v2zm0-4H8V8h8v2z" />
                                                        </svg>
                                                        Expediente
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <div id="viewPatientRecordModal-{{ $receta->id }}" class="modal modalViewPatientRecord">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Expediente de Paciente:
                                                {{ $receta->paciente->nombre }}
                                                {{ $receta->paciente->apellidopaterno }}
                                                {{ $receta->paciente->apellidomaterno }}</h5>
                                            <a href="#" class="close" onclick="closeModal()">&times;</a>
                                        </div>
                                        <div class="modal-body"
                                            style="max-height: 70vh; max-width: 100%; overflow-y: auto; overflow-x: auto;">
                                            <h6>Información del Paciente</h6>
                                            <div class="patientDetails">
                                                <div class="detailHeader">
                                                    <div class="detailField">Campo</div>
                                                    <div class="detailValue">Detalles</div>
                                                </div>
                                                <div class="detailRow">
                                                    <div class="detailField">ID</div>
                                                    <div class="detailValue">{{ $receta->paciente->id }}</div>
                                                </div>
                                                <div class="detailRow">
                                                    <div class="detailField">Nombre</div>
                                                    <div class="detailValue">{{ $receta->paciente->nombre }}</div>
                                                </div>
                                                <div class="detailRow">
                                                    <div class="detailField">Apellido Paterno</div>
                                                    <div class="detailValue">{{ $receta->paciente->apellidopaterno }}
                                                    </div>
                                                </div>
                                                <div class="detailRow">
                                                    <div class="detailField">Apellido Materno</div>
                                                    <div class="detailValue">{{ $receta->paciente->apellidomaterno }}
                                                    </div>
                                                </div>
                                                <div class="detailRow">
                                                    <div class="detailField">Género</div>
                                                    <div class="detailValue">{{ $receta->paciente->sexo }}</div>
                                                </div>
                                            </div>


                                            <h6>Historial de Tratamientos y Diagnósticos</h6>
                                            <div class="recetasList">
                                                <div class="recetaHeader">
                                                    <div class="recetaCell">Fecha</div>
                                                    <div class="recetaCell">Hora</div>
                                                    <div class="recetaCell">Diagnóstico</div>
                                                    <div class="recetaCell">Tratamiento</div>
                                                    <div class="recetaCell">Acciones</div>
                                                </div>
                                                <div class="recetasBody">
                                                    @foreach ($ExpedienteMedico as $Expediente)
                                                        @if ($Expediente->paciente_id === $receta->paciente->id)
                                                            <div class="recetaRow">
                                                                <div class="recetaCell">
                                                                    {{ $Expediente->created_at->format('d/m/Y') }}
                                                                </div>
                                                                <div class="recetaCell">
                                                                    {{ $Expediente->created_at->format('h:i:s A') }}
                                                                </div>
                                                                <div class="recetaCell">{{ $Expediente->diagnostico }}
                                                                </div>
                                                                <div class="recetaCell">{{ $Expediente->tratamiento }}
                                                                </div>
                                                                <div class="recetaCell">
                                                                    <button class="btn btn-info btn-sm"
                                                                        onclick="toggleRecetaDetails({{ $receta->id }})">
                                                                        Ver detalles
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <!-- Detalles de la Receta -->
                                                            <div id="recetaDetails-{{ $receta->id }}"
                                                                class="recetaDetails" style="display: none;">
                                                                <div class="detailRow">
                                                                    <div class="detailField">Temperatura</div>
                                                                    <div class="detailValue">
                                                                        {{ $receta->temperatura ?? 'N/A' }}</div>
                                                                </div>
                                                                <div class="detailRow">
                                                                    <div class="detailField">Presión Arterial</div>
                                                                    <div class="detailValue">
                                                                        {{ $receta->presion_arterial ?? 'N/A' }}</div>
                                                                </div>
                                                                <div class="detailRow">
                                                                    <div class="detailField">Temperatura (°C)</div>
                                                                    <div class="detailValue">
                                                                        {{ $receta->temperatura ?? 'N/A' }}</div>
                                                                </div>
                                                                <div class="detailRow">
                                                                    <div class="detailField">Talla (cm)</div>
                                                                    <div class="detailValue">
                                                                        {{ $receta->talla ?? 'N/A' }}</div>
                                                                </div>
                                                                <div class="detailRow">
                                                                    <div class="detailField">Peso (kg)</div>
                                                                    <div class="detailValue">
                                                                        {{ $receta->peso ?? 'N/A' }}</div>
                                                                </div>
                                                                <div class="detailRow">
                                                                    <div class="detailField">Frecuencia Cardiaca (lpm)
                                                                    </div>
                                                                    <div class="detailValue">
                                                                        {{ $receta->frecuencia_cardiaca ?? 'N/A' }}
                                                                    </div>
                                                                </div>
                                                                <div class="detailRow">
                                                                    <div class="detailField">Frecuencia Respiratoria
                                                                        (rpm)
                                                                    </div>
                                                                    <div class="detailValue">
                                                                        {{ $receta->frecuencia_respiratoria ?? 'N/A' }}
                                                                    </div>
                                                                </div>
                                                                <div class="detailRow">
                                                                    <div class="detailField">Saturación de Oxígeno (%)
                                                                    </div>
                                                                    <div class="detailValue">
                                                                        {{ $receta->saturacion_oxigeno ?? 'N/A' }}
                                                                    </div>
                                                                </div>
                                                                <div class="detailRow">
                                                                    <div class="detailField">Alergias</div>
                                                                    <div class="detailValue">
                                                                        {{ $receta->alergia ?? 'N/A' }}</div>
                                                                </div>
                                                                <div class="detailRow">
                                                                    <div class="detailField">DATOS DEL MEDICO</div>
                                                                </div>
                                                                <div class="detailRow">
                                                                    <div class="detailField">Apellido Paterno</div>
                                                                    <div class="detailValue">
                                                                        {{ $receta->doctor->personal->apellido_paterno ?? 'N/A' }}
                                                                    </div>
                                                                </div>
                                                                <div class="detailRow">
                                                                    <div class="detailField">Apellido Materno</div>
                                                                    <div class="detailValue">
                                                                        {{ $receta->doctor->personal->apellido_materno ?? 'N/A' }}
                                                                    </div>
                                                                </div>
                                                                <div class="detailRow">
                                                                    <div class="detailField">Nombre</div>
                                                                    <div class="detailValue">
                                                                        {{ $receta->doctor->personal->Nombre ?? 'N/A' }}</div>
                                                                </div>
                                                                <div class="detailRow">
                                                                    <div class="detailField">Cedula Profesional</div>
                                                                    <div class="detailValue">
                                                                        {{ $receta->doctor->cedulaProfesional ?? 'N/A' }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination-wrapper" style="width: 90%; margin: 0 auto;">
                        {{ $recetasPaginadas->links() }}
                    </div>

            </div>
        </div>
    </div>

    <script>
        function closeModal() {
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                modal.style.display = 'none';
            });
        }

        function closeModal2(selector) {
            const modals = document.querySelectorAll(selector);
            modals.forEach(modal => {
                modal.style.display = 'none';
            });
        }

        function openModal(selector) {
            const modals = document.querySelectorAll(selector);
            if (modals.length > 0) {
                modals.forEach(modal => {
                    modal.style.display = 'block'; // Mostrar todos los modales que coincidan con el selector.
                });
            } else {
                console.error(`No se encontraron modales con el selector '${selector}'`);
            }
        }

        function toggleRecetaDetails(recetaId) {
            var details = document.getElementById('recetaDetails-' + recetaId);
            if (details.style.display === 'none') {
                details.style.display = 'block';
            } else {
                details.style.display = 'none';
            }
        }

        function cerrarModal() {
            $('#modalNuevoProveedor').modal('hide');
        }
    </script>

</body>

</html>
