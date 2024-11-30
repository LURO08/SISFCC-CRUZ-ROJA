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

        /* Css Menu de opciones Aside*/
        aside {
            width: 16%;
            background-color: #f4f4f4;
            padding: 20px;
            height: 100vh;
            box-sizing: border-box;
            border-right: 2px solid #6c757d;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: width 0.3s ease;
            position: relative;
        }

        .toggle {
            text-align: center;
            width: 100%;
            justify-content: center;
            font-size: 30px;
        }

        #menu {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #menu li {
            margin-bottom: 10px;
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

        @media (max-width: 768px) {
            aside {
                width: 60px;
                padding: 10px;
            }

            #menu .btn .text {
                display: none;
                /* Ocultar el menú principal en móviles */
            }

            .btn {
                padding: 10px 5px;
                /* Ajustar tamaño del botón en móviles */
            }

            aside:hover {
                width: 200px;
            }

            aside:hover #menu .btn .text {
                display: block;
            }
        }

        .collapsed {
            display: none;
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

        .recipesContent {
            display: none;
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


        /* Panel central */
        #panelCentral {
            text-align: center;
            font-size: 2rem;
            font-style: italic;
            /* Estilo en cursiva */
            font-weight: bold;
            /* Negrita */
            color: #007bff;
            /* Color azul */
            margin: 20px 0;
            /* Espaciado uniforme */
            padding: 20px;
            /* Espaciado interno */
            border-radius: 8px;
            /* Esquinas redondeadas */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Sombra sutil */
            display: flex;
            /* Activar flexbox para centrar contenido */
            flex-direction: column;
            /* Organizar contenido en columna */
            align-items: center;
            /* Centrar contenido horizontalmente */
        }

        #panelCentral h1 {
            margin: 20px 0 0;
            /* Espacio en la parte superior, sin margen en la parte inferior */
            text-shadow: 1px 2px 2px rgba(0, 0, 0, 0.2);
            /* Sombra de texto más sutil */
            letter-spacing: 1px;
            /* Espaciado entre letras */
            font-weight: 800;
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

        /* Estilo de los modales */
        .modal,
        .modalRecetasGeneradas,
        .modaladdReceta,
        .modaleditReceta,
        .modalAddPaciente,
        .modalViewReceta,
        .modalViewExpediente,
        .modalViewPatientRecord {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 999;
            justify-content: center;
            align-items: center;
        }

        .modal:target,
        .modalRecetasGeneradas:target,
        .modaladdReceta:target,
        .modalAddPaciente:target,
        .modaleditReceta:target,
        .modalViewReceta:target,
        .modalViewExpediente:target,
        .modalViewPatientRecord:target {
            display: flex;
        }

        .modal .modal-content,
        .modalAddPaciente .modal-content,
        .modalViewReceta .modal-content,
        .modalViewExpediente .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 500px;
            position: relative;
        }

        /* Encabezado del modal */
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #dee2e6;
            margin-bottom: 5px;
            background-color: #007bff;
            color: #fff;
            border-radius: 10px;
        }

        .modal-title {
            font-size: 1.25rem;
            margin: 0;
            padding: 5px;
        }

        /* Botón de cerrar del modal */
        .close {
            font-size: 1.5rem;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            margin-right: 10px;
        }

        .close:hover {
            color: #dcdcdc;
        }

        /* Contenido del modal */
        .modal .modal-body,
        .modalAddPaciente .modal-body,
        .modaleditReceta .modal-body {
            padding: 20px;
            max-height: 85vh;
            overflow-y: auto;

        }

        .modalViewPatientRecord .modal-body {
            padding: 20px;
            max-height: 75vh;
            max-width: 40%;
            overflow-y: auto;
            overflow-X: auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .modal .form-group input,
        .modaladdReceta .form-group input,
        .modalAddPaciente .form-group input,
        .modaleditReceta .form-group input {
            width: 100%;
        }

        .modal .form-group select,
        .modalAddPaciente .form-group select {
            width: 100%;
        }

        .modal .text-center {
            text-align: center;
        }


        .modal-footer {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }

        .modal-footer button {
            margin: 10px;
        }

        /* Modal específico para agregar pacientes */
        .modaladdReceta .modal-body {
            padding: 20px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modaladdReceta .modal-content,
        .modaleditReceta .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
            justify-content: center;
        }

        .modalViewPatientRecord .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 100%;
            max-width: 750px;
            justify-content: center;

        }

        .modaladdReceta .modal-body input,
        .modaladdReceta .modal-body textarea {
            border: 1px solid #8c8989;
            border-radius: 4px;
            width: 100%;
        }

        .modaladdReceta .form-group label {
            margin-right: 10px;
        }

        .modaladdReceta .form-group p {
            margin-left: 10px;
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



    </style>
</head>

<body>
    <aside id="aside">
        <div class="toggle" onclick="toggleMenu()">
            <span class="icon" id="icon">←</span> <!-- Icono del menú (hamburguesa) -->
        </div>
        <ul id="menu" class="collapsed">
            <li>
                <a class="btn" href="/doctor" id="home">
                    <span class="icon">🏠</span>
                    <span class="text" style="font-weight: bold;">Home</span>
                </a>
            </li>
            <li>
                <a class="btn" href="#" id="recipes" onclick="recetas()">
                    <span class="icon">🍽️</span>
                    <span class="text">Ver Recetas</span>
                </a>
            </li>
            <li>
                <a href="#addPatientModal" class="btn">
                    <span class="icon">👥</span>
                    <span class="text">Nuevo Paciente</span>
                </a>
            </li>
            <li>
                <a href="#recipeModal" class="btn">
                    <span class="icon">➕</span>
                    <span class="text">Añadir Consulta</span>
                </a>
            </li>
        </ul>
    </aside>

    @if (session('success'))
        <div class="notification alert alert-success alert-dismissible fade show" role="alert"
            style="position: fixed; top: 20px; right: 20px; width: 300px; z-index: 1050;
            background-color: #4CAF50; color: white; border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); padding: 20px; padding-top: 30px; text-align: center;">
            <a type="button" class="btn-close" href=""
            style="position: absolute; top: 10px; right: 10px; font-size: 22px; color: white;
            text-decoration: none; opacity: 0.8;">
                &times;</a>
            <strong>Éxito!</strong> {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="notification alert alert-error alert-dismissible fade show" role="alert"
            style="position: fixed; top: 20px; right: 20px; width: 300px; z-index: 1050; background-color: #e92c2c; color: white; border-radius: 4px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); padding: 15px;">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                style="opacity: 0.8;"></button>
        </div>
    @endif

    <div class="content">
        <div id="panelCentral">
            <svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <!-- Cuadrado superior -->
                <rect x="35" y="10" width="30" height="30" fill="red" stroke="white" stroke-width="4" />
                <!-- Cuadrados laterales -->
                <rect x="10" y="35" width="30" height="30" fill="red" stroke="white" stroke-width="4" />
                <rect x="60" y="35" width="30" height="30" fill="red" stroke="white" stroke-width="4" />
                <!-- Cuadrado inferior -->
                <rect x="35" y="60" width="30" height="30" fill="red" stroke="white" stroke-width="4" />
                <!-- Cuadrado central alargado horizontal -->
                <rect x="30" y="37" width="40" height="26" fill="red" />
                <!-- Cuadrado central alargado vertical -->
                <rect x="37" y="30" width="26" height="40" fill="red" />
            </svg>
            <h1 style="margin: 0; text-align: center;">SISTEMA DE CONSULTORIO MÉDICO</h1>
        </div>

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
                            @foreach ($recetas as $receta)
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
                                                    <a href="#editRecipeModal-{{ $receta->id }}"
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

                                <!-- Modal para Editar Receta -->
                                <div id="editRecipeModal-{{ $receta->id }}" class="modaleditReceta">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Editar Receta</h5>
                                            <a href="#" class="close" onclick="closeModal()">&times;</a>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('doctor.receta.update', $receta->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <div style="display: flex; justify-content: space-between;">
                                                    <div style="flex: 1; margin-right: 20px;">
                                                        <div class="form-group">
                                                            <label for="paciente"
                                                                style="display: block; margin-bottom: 0.5rem;">Paciente</label>
                                                            <input type="text" readonly
                                                                value="{{ $receta->paciente->nombre }} {{ $receta->paciente->apellidopaterno }} {{ $receta->paciente->apellidomaterno }}">
                                                        </div>
                                                        <div style="margin-bottom: 1rem;">
                                                            <label for="tratamiento"
                                                                style="display: block; margin-bottom: 0.5rem;">Tratamiento</label>
                                                            <textarea id="tratamiento" name="tratamiento" rows="4" required placeholder="Escribe el tratamiento aquí..."
                                                                style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc; resize: vertical;">{{ $receta->tratamiento }}</textarea>
                                                        </div>

                                                        <div style="margin-bottom: 1rem;">
                                                            <label for="diagnostico"
                                                                style="display: block; margin-bottom: 0.5rem;">Diagnóstico</label>
                                                            <textarea id="diagnostico" name="diagnostico" rows="4" required placeholder="Escribe el diagnóstico aquí..."
                                                                style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc; resize: vertical;">{{ $receta->diagnostico }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div style="flex: 1;">
                                                        <div style="display: flex; flex-wrap: wrap;">
                                                            <!-- Presión Arterial -->
                                                            <div class="form-group"
                                                                style="margin-bottom: 1rem; flex-basis: 100%;">
                                                                <label for="presion_arterial"
                                                                    style="display: block; margin-bottom: 0.5rem;">T/A</label>
                                                                <div style="display: flex; align-items: center;">
                                                                    <input type="text" id="presion_arterial"
                                                                        name="presion_arterial" placeholder="120/80"
                                                                        style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;"
                                                                        value="{{ $receta->presion_arterial }}">
                                                                    <p style="margin-left: 0.5rem;">mmHg</p>
                                                                </div>
                                                            </div>

                                                            <!-- Temperatura -->
                                                            <div class="form-group"
                                                                style="margin-bottom: 1rem; flex-basis: 100%;">
                                                                <label for="temperatura"
                                                                    style="display: block; margin-bottom: 0.5rem;">Temp</label>
                                                                <div style="display: flex; align-items: center;">
                                                                    <input type="number" id="temperatura"
                                                                        name="temperatura" placeholder="36.6"
                                                                        style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;"
                                                                        step="0.1"
                                                                        value="{{ $receta->temperatura }}">
                                                                    <p style="margin-left: 0.5rem;">°C</p>
                                                                </div>
                                                            </div>

                                                            <!-- Talla -->
                                                            <div class="form-group"
                                                                style="margin-bottom: 1rem; flex-basis: 100%;">
                                                                <label for="talla"
                                                                    style="display: block; margin-bottom: 0.5rem;">Talla</label>
                                                                <div style="display: flex; align-items: center;">
                                                                    <input type="number" id="talla"
                                                                        name="talla" placeholder="170"
                                                                        style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;"
                                                                        value="{{ $receta->talla }}">
                                                                    <p style="margin-left: 0.5rem;">cm</p>
                                                                </div>
                                                            </div>

                                                            <!-- Peso -->
                                                            <div class="form-group"
                                                                style="margin-bottom: 1rem; flex-basis: 100%;">
                                                                <label for="peso"
                                                                    style="display: block; margin-bottom: 0.5rem;">Peso</label>
                                                                <div style="display: flex; align-items: center;">
                                                                    <input type="number" id="peso"
                                                                        name="peso" placeholder="70"
                                                                        style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;"
                                                                        value="{{ $receta->peso }}">
                                                                    <p style="margin-left: 0.5rem;">Kg</p>
                                                                </div>
                                                            </div>

                                                            <!-- Frecuencia Cardiaca -->
                                                            <div class="form-group"
                                                                style="margin-bottom: 1rem; flex-basis: 100%;">
                                                                <label for="frecuencia_cardiaca"
                                                                    style="display: block; margin-bottom: 0.5rem;">FC</label>
                                                                <div style="display: flex; align-items: center;">
                                                                    <input type="number" id="frecuencia_cardiaca"
                                                                        name="frecuencia_cardiaca" placeholder="75"
                                                                        style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;"
                                                                        value="{{ $receta->frecuencia_cardiaca }}">
                                                                    <p style="margin-left: 0.5rem;">X'</p>
                                                                </div>
                                                            </div>

                                                            <!-- Frecuencia Respiratoria -->
                                                            <div class="form-group"
                                                                style="margin-bottom: 1rem; flex-basis: 100%;">
                                                                <label for="frecuencia_respiratoria"
                                                                    style="display: block; margin-bottom: 0.5rem;">FR</label>
                                                                <div style="display: flex; align-items: center;">
                                                                    <input type="number" id="frecuencia_respiratoria"
                                                                        name="frecuencia_respiratoria"
                                                                        placeholder="20"
                                                                        style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;"
                                                                        value="{{ $receta->frecuencia_respiratoria }}">
                                                                    <p style="margin-left: 0.5rem;">X'</p>
                                                                </div>
                                                            </div>

                                                            <!-- Saturación de Oxígeno -->
                                                            <div class="form-group"
                                                                style="margin-bottom: 1rem; flex-basis: 100%;">
                                                                <label for="saturacion_oxigeno"
                                                                    style="display: block; margin-bottom: 0.5rem;">SPO2</label>
                                                                <div style="display: flex; align-items: center;">
                                                                    <input type="number" id="saturacion_oxigeno"
                                                                        name="saturacion_oxigeno" placeholder="98"
                                                                        style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;"
                                                                        value="{{ $receta->saturacion_oxigeno }}">
                                                                    <p style="margin-left: 0.5rem;">%</p>
                                                                </div>
                                                            </div>

                                                            <!-- Alergias -->
                                                            <div class="form-group"
                                                                style="margin-bottom: 1rem; flex-basis: 100%;">
                                                                <label for="alergia"
                                                                    style="display: block; margin-bottom: 0.5rem;">Alergia</label>
                                                                <input type="text" id="alergia" name="alergia"
                                                                    placeholder="Especificar alergias"
                                                                    style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;"
                                                                    value="{{ $receta->alergia }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                    <a href="#" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancelar</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div id="viewPatientRecordModal-{{ $receta->id }}" class="modalViewPatientRecord">
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
            </div>
        </div>
    </div>

    <!-- Modal para Crear Receta -->
    <div id="recipeModal" class="modaladdReceta">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva Receta</h5>
                <a href="#" class="close" onclick="closeModal()">&times;</a>
            </div>
            <div class="modal-body">
                <div class="search-container">
                    <label for="searchPatient">Buscar Paciente</label>
                    <input type="text" id="searchPatient" placeholder="Buscar paciente por nombre..."
                        oninput="searchPatient()">
                    <div id="searchResults" class="search-results"></div>
                </div>
                <form action="{{ route('doctor.receta.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="display: flex; justify-content: space-between;">
                        <div style="flex: 1; margin-right: 20px;">
                            <div class="form-group" id="contSeleccionado" style="display: none;">
                                <input type="text" id="selectedPatient" name="selectedPatient" readonly>
                                <input type="hidden" id="selectedPatientId" name="selectedPatientId">
                            </div>
                            <div style="margin-bottom: 1rem;">
                                <label for="tratamiento"
                                    style="display: block; margin-bottom: 0.5rem;">Tratamiento</label>
                                <textarea id="tratamiento" name="tratamiento" rows="4" required placeholder="Escribe el tratamiento aquí..."
                                    style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc; resize: vertical;"></textarea>
                            </div>

                            <div style="margin-bottom: 1rem;">
                                <label for="diagnostico"
                                    style="display: block; margin-bottom: 0.5rem;">Diagnóstico</label>
                                <textarea id="diagnostico" name="diagnostico" rows="4" required placeholder="Escribe el diagnóstico aquí..."
                                    style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc; resize: vertical;"></textarea>
                            </div>
                        </div>
                        <div style="flex: 1;">
                            <div style="display: flex; flex-wrap: wrap;">
                                <!-- Presión Arterial -->
                                <div class="form-group" style="margin-bottom: 1rem; flex-basis: 100%;">
                                    <label for="presion_arterial"
                                        style="display: block; margin-bottom: 0.5rem;">T/A</label>
                                    <div style="display: flex; align-items: center;">
                                        <input type="text" id="presion_arterial" name="presion_arterial"
                                            placeholder="120/80"
                                            style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;">
                                        <p style="margin-left: 0.5rem;">mmHg</p>
                                    </div>
                                </div>

                                <!-- Temperatura -->
                                <div class="form-group" style="margin-bottom: 1rem; flex-basis: 100%;">
                                    <label for="temperatura"
                                        style="display: block; margin-bottom: 0.5rem;">Temp</label>
                                    <div style="display: flex; align-items: center;">
                                        <input type="number" id="temperatura" name="temperatura" placeholder="36.6"
                                            style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc";
                                            step="0.1">
                                        <p style="margin-left: 0.5rem;">°C</p>
                                    </div>
                                </div>

                                <!-- Talla -->
                                <div class="form-group" style="margin-bottom: 1rem; flex-basis: 100%;">
                                    <label for="talla" style="display: block; margin-bottom: 0.5rem;">Talla</label>
                                    <div style="display: flex; align-items: center;">
                                        <input type="number" id="talla" name="talla" placeholder="170"
                                            style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;">
                                        <p style="margin-left: 0.5rem;">cm</p>
                                    </div>
                                </div>

                                <!-- Peso -->
                                <div class="form-group" style="margin-bottom: 1rem; flex-basis: 100%;">
                                    <label for="peso" style="display: block; margin-bottom: 0.5rem;">Peso</label>
                                    <div style="display: flex; align-items: center;">
                                        <input type="number" id="peso" name="peso" placeholder="70"
                                            style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;">
                                        <p style="margin-left: 0.5rem;">Kg</p>
                                    </div>
                                </div>

                                <!-- Frecuencia Cardiaca -->
                                <div class="form-group" style="margin-bottom: 1rem; flex-basis: 100%;">
                                    <label for="frecuencia_cardiaca"
                                        style="display: block; margin-bottom: 0.5rem;">FC</label>
                                    <div style="display: flex; align-items: center;">
                                        <input type="number" id="frecuencia_cardiaca" name="frecuencia_cardiaca"
                                            placeholder="75"
                                            style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;">
                                        <p style="margin-left: 0.5rem;">X'</p>
                                    </div>
                                </div>

                                <!-- Frecuencia Respiratoria -->
                                <div class="form-group" style="margin-bottom: 1rem; flex-basis: 100%;">
                                    <label for="frecuencia_respiratoria"
                                        style="display: block; margin-bottom: 0.5rem;">FR</label>
                                    <div style="display: flex; align-items: center;">
                                        <input type="number" id="frecuencia_respiratoria"
                                            name="frecuencia_respiratoria" placeholder="20"
                                            style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;">
                                        <p style="margin-left: 0.5rem;">X'</p>
                                    </div>
                                </div>

                                <!-- Saturación de Oxígeno -->
                                <div class="form-group" style="margin-bottom: 1rem; flex-basis: 100%;">
                                    <label for="saturacion_oxigeno"
                                        style="display: block; margin-bottom: 0.5rem;">SPO2</label>
                                    <div style="display: flex; align-items: center;">
                                        <input type="number" id="saturacion_oxigeno" name="saturacion_oxigeno"
                                            placeholder="98"
                                            style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;">
                                        <p style="margin-left: 0.5rem;">%</p>
                                    </div>
                                </div>

                                <!-- Alergias -->
                                <div class="form-group" style="margin-bottom: 1rem; flex-basis: 100%;">
                                    <label for="alergia"
                                        style="display: block; margin-bottom: 0.5rem;">Alergia</label>
                                    <input type="text" id="alergia" name="alergia"
                                        placeholder="Especificar alergias"
                                        style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;">
                                </div>

                                <div class="form-group"
                                    style="display: flex; justify-content: center; align-content: center; width: 100%;">
                                    <label for="farmacia">Enviar a Farmacia (opcional):</label>
                                    <input type="checkbox" name="enviar_farmacia" value="1"
                                        style="width: 10%; height: 100%;">
                                </div>

                                <!-- Caja de Cobro siempre será obligatorio pero oculto -->
                                <input type="hidden" name="enviar_caja" value="1">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Patient Modal -->
    <div id="addPatientModal" class="modalAddPaciente">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Nuevo Paciente</h5>
                <a href="#" class="close">&times;</a>
            </div>
            <div class="modal-body">
                <form action="{{ route('doctor.pacientes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Columna para los detalles del paciente -->
                    <div class="form-group">
                        <label for="nombre">Nombre</label><br>
                        <input type="text" name="nombre" class="form-control" id="nombre"
                            placeholder="Ingrese el nombre del Paciente" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidopaterno">Apellido Paterno</label><br>
                        <input type="text" name="apellidopaterno" class="form-control" id="apellidopaterno"
                            placeholder="Ingrese el apellido paterno" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidomaterno">Apellido Materno</label><br>
                        <input type="text" name="apellidomaterno" class="form-control" id="apellidomaterno"
                            placeholder="Ingrese el apellido materno" required>
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad</label><br>
                        <input type="number" name="edad" class="form-control" id="edad"
                            placeholder="Ingrese la edad" required>
                    </div>
                    <div class="form-group">
                        <label for="sexo">Sexo</label><br>
                        <select name="sexo" class="form-control" id="sexo" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipo_sangre">Tipo de Sangre</label><br>
                        <select name="tipo_sangre" id="tipo_sangre" class="form-control" required>
                            <option value="">Seleccione el tipo de sangre</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                        <small id="tipo_sangreHelp" class="form-text text-muted">Seleccione el tipo de sangre
                            del paciente.</small>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const pacientes = @json($pacientes);
        document.getElementById("menu").style.display = 'block';
        document.getElementById("menu2").style.display = 'none';
        document.getElementById("recipesTable").style.display = 'none';


        function searchPatient() {
            const searchQuery = document.getElementById('searchPatient').value.toLowerCase();
            const searchResults = document.getElementById('searchResults');
            searchResults.innerHTML = '';

            if (searchQuery === '') return;

            const filteredPacientes = pacientes.filter(paciente =>
                paciente.nombre.toLowerCase().includes(searchQuery) ||
                paciente.apellidopaterno.toLowerCase().includes(searchQuery) ||
                (paciente.apellidomaterno && paciente.apellidomaterno.toLowerCase().includes(searchQuery))
            );

            filteredPacientes.forEach(paciente => {
                const div = document.createElement('div');
                div.textContent = `${paciente.nombre} ${paciente.apellidopaterno} ${paciente.apellidomaterno || ''}`
                    .trim();
                div.setAttribute('data-id', paciente.id);
                div.onclick = () => selectPatient(paciente.id, div.textContent);
                searchResults.appendChild(div);
            });

            if (filteredPacientes.length === 0) {
                searchResults.innerHTML = '<div>No se encontraron pacientes</div>';
            }
        }

        function selectPatient(patientId, patientName) {
            document.getElementById('selectedPatient').value = patientName;
            document.getElementById('selectedPatientId').value = patientId;
            document.getElementById('searchResults').innerHTML = '';
            document.getElementById('searchPatient').value = patientName;
            document.getElementById('contSeleccionado').style.display = 'block';
        }

        function toggleMenu() {
            const menu = document.querySelector("#menu");
            const aside = document.querySelector("#aside");
            const icon = document.querySelector("#icon");

            const isCollapsed = menu.classList.toggle("collapsed"); // Alterna la clase y almacena el estado colapsado

            // Configuración para el estado colapsado o expandido
            if (isCollapsed) {
                aside.style.width = '7%'; // Ancho del menú colapsado
                menu.querySelectorAll(".text").forEach(item => item.style.display = "none"); // Ocultar el texto
                icon.innerHTML = "→"; // Cambiar el icono al estado colapsado
                icon.setAttribute("aria-expanded", "false"); // Accesibilidad
            } else {
                aside.style.width = '16%'; // Ancho del menú expandido
                menu.querySelectorAll(".text").forEach(item => item.style.display = "block"); // Mostrar el texto
                icon.innerHTML = "←"; // Cambiar el icono al estado expandido
                icon.setAttribute("aria-expanded", "true"); // Accesibilidad
            }

            // Transiciones para un efecto suave en el cambio de tamaño
            aside.style.transition = "width 0.3s ease";
        }

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

        function recetas() {
            const central = document.getElementById('panelCentral');
            const tabla = document.querySelector(".recipesContent");
            const ContenedorRecetas = document.getElementById('recipesTable');
            central.style.display = 'none';
            ContenedorRecetas.style.display = 'block';
            tabla.style.display = 'block';
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
