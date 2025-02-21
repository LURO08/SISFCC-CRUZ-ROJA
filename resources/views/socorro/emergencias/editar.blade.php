<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'socorros') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles
</head>
<style>
    .principal {
        margin: 0;
        font-family: Arial, sans-serif;
        display: flex;
        /* Flexbox para la disposición */
        height: 100vh;
        /* Altura de la ventana */
    }

    main {
        display: flex;
        justify-content: center;
        width: auto;
        height: 100%;
    }

    .aside-menu {
        width: 20%;
        /* Ocupa el 20% del ancho */
        background-color: #880e4f;
        /* Color de fondo */
        padding-top: 20px;
        /* Espaciado interno */
        border-right: 2px solid #6c757d;
        /* Línea divisoria */
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        /* Sombra sutil */
        height: 100vh;
        /* Altura de 100% de la ventana */
        overflow-y: auto;
        /* Desplazamiento vertical si es necesario */
    }

    .aside-menu ul {
        list-style-type: none;
        padding: 0;

    }

    .aside-menu li {
        margin-bottom: 10px;
        /* Espacio entre los elementos de la lista */
    }

    .aside-menu a {
        color: white;

        /* Color del texto */
        text-decoration: none;
        /* Sin subrayado */
        padding: 10px;
        /* Espacio alrededor del enlace */
        display: block;
        /* Para que toda el área sea clickeable */
        transition: background-color 0.3s;
        /* Transición suave */
    }

    .aside-menu a:hover {
        background-color: #7b1fa2;
        /* Color de fondo al pasar el mouse */
    }

    .content {
        width: 100%;
        height: 100%;
        padding-top: 10px;
        padding-left: 10px;
        background-color: #ffffff;
    }

    h1 {
        text-align: center;
        color: #007bff;

        /* Centra el texto del encabezado */
    }

    /* Ocultar secciones inicialmente */
    .section {
        display: none;
    }

    /* Mostrar la sección activa */
    .section.active {
        display: block;
    }

    .modal {
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

    .modal:target {
        display: flex;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        width: 100%;
        max-width: 600px;
        position: relative;
        justify-content: space-between;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #dee2e6;
        margin-bottom: 15px;

        color: #fff;
    }

    .modal-title {
        font-size: 1.25rem;
        margin: 0;
    }

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

    .modal-body {
        padding: 20px;
    }

    .modal-dialog {
        width: 500px;

    }

    .modal-dialog .modal-title {
        padding-left: 5px;
    }


    .btn-primary {
        padding: 10px 20px;
        border-radius: 5px;
        color: #fff;
        text-decoration: none;
        cursor: pointer;

    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }


    .btn-primary:hover,
    {
    opacity: 0.8;
    }

    /* Estilos para los botones */
    .btn-edit {
        background-color: #007bff;
        /* Color verde */
        border-color: #007bff;
        color: #fff;
        padding: 10px 12px;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-right: 5px;
    }

    .btn-edit:hover {
        background-color: #2763a4;
        /* Verde más oscuro al pasar el ratón */
    }

    /* General */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        /* Fondo gris claro */
    }

    .modal-body {
        padding: 20px;
    }

    .form-group select {
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 10px;
        width: 100%;
        margin-top: 8px;
    }

    /* Modal content */
    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 12px;
        width: 80%;
        max-width: 600px;
        max-height: 90%;
        position: relative;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    /* Modal body */
    .modal-body {
        padding: 10px;
    }
    /* Additional styling for modal content if needed */
    .modal-content form {
        display: flex;
        flex-direction: column;
    }

    .modal-content form div {
        margin-bottom: 5px;
    }

    .modal-content form .block {
        width: calc(100% - 20px);
        /* Full width with padding adjustment */
    }

    .modal-content .btn {
        align-self: flex-end;
    }

    .btn-footer {
        background-color: #007bff;
        color: #fff;
        margin-right: 10px;
    }

    /* Estilo del área de la imagen y las marcas */
    #human-body {
        display: block;
        margin: auto;
        position: relative;
    }

    #mark-zone {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .absolute {
        position: absolute;
    }

    /* Estilo general para los botones */
    .btn-footer,
    button {
        padding: 12px 24px;
        /* Tamaño más grande de botones */
        font-size: 1rem;
        /* Tamaño de fuente más grande */
        font-weight: 600;
        /* Negrita */
        text-transform: uppercase;
        /* Texto en mayúsculas */
        border-radius: 8px;
        /* Bordes redondeados */
        transition: all 0.3s ease;
        /* Transición suave */
        cursor: pointer;
        border: none;
        /* Eliminar borde */
    }

    /* Botón Siguiente */
    #nextPhase9 {
        background-color: #3b82f6;
        /* Azul claro */
        color: white;
    }

    #nextPhase9:hover {
        background-color: #2563eb;
        /* Azul más oscuro en hover */
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
        /* Sombra al pasar el mouse */
    }

    /* Botón Atrás */
    #prevPhase9 {
        background-color: #60a5fa;
        /* Azul intermedio */
        color: white;
    }

    #prevPhase9:hover {
        background-color: #3b82f6;
        /* Azul más oscuro en hover */
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
        /* Sombra al pasar el mouse */
    }

    /* Estilo para los botones de selección (Radio, Checkbox) */
    input[type="radio"],
    input[type="checkbox"] {
        accent-color: #3b82f6;
        /* Color azul para radio y checkbox */
    }

    /* Fondo para la sección de botones */
    .flex.justify-center {
        display: flex;
        justify-content: center;
        gap: 16px;
        margin-top: 20px;
    }

    /* Cambiar apariencia de los campos de texto */
    input[type="text"],
    input[type="time"],
    select,
    .form-control {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        /* Bordes redondeados */
        border: 2px solid #d1d5db;
        /* Borde gris claro */
        background-color: #f9fafb;
        /* Fondo claro */
        transition: border 0.3s ease, background-color 0.3s ease;
    }

    /* Efecto en campos de texto al enfocarse */
    input[type="text"]:focus,
    input[type="time"]:focus,
    select:focus,
    .form-control:focus {
        border-color: #3b82f6;
        /* Borde azul al hacer foco */
        background-color: #e0f7ff;
        /* Fondo azul claro al hacer foco */
    }

    /* Estilo para los encabezados */
    h5,
    h6 {
        color: #1e293b;
        /* Color oscuro para texto de encabezados */
        font-weight: 600;
        margin-bottom: 10px;
    }

    /* Estilo para los contenedores de las secciones */
    .mb-4 {
        margin-bottom: 20px;
    }

    .flex.flex-col.space-y-2 label {
        display: flex;
        align-items: center;
        font-size: 0.95rem;
        padding: 5px;
        color: #374151;
        /* Color gris oscuro */
    }

    /* Estilo para la tabla */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 12px;
        border: 1px solid #d1d5db;
        text-align: center;
    }

    thead {
        background-color: #f3f4f6;
        /* Fondo claro para el encabezado de la tabla */
    }

    tbody tr:nth-child(even) {
        background-color: #f9fafb;
        /* Alternar color de fondo en filas */
    }

    tbody tr:hover {
        background-color: #e0f7ff;
        /* Resaltar fila al pasar el mouse */
    }

    /* Estilo para los botones de la tabla */
    button[type="button"] {
        padding: 10px 20px;
        background-color: #3b82f6;
        /* Azul claro */
        color: white;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    button[type="button"]:hover {
        background-color: #2563eb;
        /* Azul más oscuro */
        box-shadow: 0 4px 10px rgba(59, 130, 246, 0.4);
        /* Sombra al pasar el mouse */
    }

    /* Estilo para los campos de selección */
    select {
        padding: 10px;
        border-radius: 8px;
        border: 2px solid #d1d5db;
        background-color: #f9fafb;
        width: 100%;
        font-size: 1rem;
    }

    /* Estilo para los campos de texto con etiquetas */
    label {
        font-weight: 600;
        margin-bottom: 5px;
        color: #1e293b;
    }

    /* Efecto de foco en los campos de texto */
    input[type="text"]:focus,
    input[type="number"]:focus,
    select:focus,
    textarea:focus {
        border-color: #3b82f6;
    }

    h6 {
        font-size: 18px;
        border-bottom: 1px solid;
        text-align: center;

    }
    #bodyCanvas {
                    display: block;
                    margin: auto;
                }

                .border {
                    border: 1px solid #ccc;
                    border-radius: 5px;
                }

                ul {
                    padding-left: 0;
                }

                li {
                    margin-bottom: 4px;
                }
</style>


<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @include('socorro.menu_nav')

            <div>
                <form action="{{ route('emergencia.update', $phase1->id) }}" method="POST"
                    class=" bg-gray-100 rounded-lg shadow-md " id="formulario"
                    style="width: 100%; max-width: 90%; min-width: 80%; margin: 0 auto; margin-bottom:10px; margin-top: 10px; padding: 10px;">
                    @csrf
                    @method('PUT')
                    <h1 class="text-4xl font-extrabold text-center text-blue-600 mt-6 mb-4 leading-tight tracking-wide">
                        EDITAR SOCORRO
                    </h1>
                        {{-- Botonera --}}
                        <div class="flex flex-wrap justify-center gap-4">

                            <div id="buttons-container" class="flex gap-2" style=" margin: 0 auto; height: 20%; max-width: 100%;">

                                <div style="min-width: 10%; max-width: 20%; display: flex; justify-content: center; align-items: center; margin-bottom: 10px;">
                                    <a href="{{ route('socorros.index') }}"
                                        class="btn-nav bg-blue-600 hover:bg-blue-700 text-white font-semibold  rounded-lg flex flex-col items-center justify-center gap-2 shadow-lg transition-transform transform hover:scale-90"
                                        style="width: 100%; height:90%; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 text-white transform -rotate-180" viewBox="4 3 10 10">
                                            <path fill-rule="evenodd" d="M8 3.293a.5.5 0 0 1 .854-.353l4.5 4.5a.5.5 0 0 1 0 .707l-4.5 4.5a.5.5 0 1 1-.707-.707L11.293 8 8.146 4.854A.5.5 0 0 1 8 3.293z"/>
                                            <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
                                        </svg>
                                        <span>Regresar</span>
                                    </a>
                                </div>



                            <div>
                                <!-- Primera fila -->
                                <button type="button" class="btn-nav bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6
                                rounded-lg flex items-center justify-center gap-3 shadow-lg transition-transform transform hover:scale-90"
                               style="width: 100%; height: 50%; margin: 0 auto; margin-bottom: 5px;"
                                    data-target="phase1">
                                    DATOS SERVICIO
                                </button>
                                <button type="button" class="btn-nav bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6
                                 rounded-lg flex items-center justify-center gap-3 shadow-lg transition-transform transform hover:scale-90"
                                style="width: 100%; height: 50%; margin: 0 auto; margin-bottom: 5px;"
                                    data-target="phase2">
                                    CONTROL / PACIENTE
                                </button>


                            </div>
                            <div>
                                <button type="button" class="btn-nav bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6
                                rounded-lg flex items-center justify-center gap-3 shadow-lg transition-transform transform hover:scale-90"
                               style="width: 100%; height: 50%; margin: 0 auto; margin-bottom: 5px;"
                                    data-target="phase4">
                                    CAUSAS TRAUMÁTICA / CLINICA
                                </button>
                                <button type="button" class="btn-nav bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6
                                rounded-lg flex items-center justify-center gap-3 shadow-lg transition-transform transform hover:scale-90"
                               style="width: 100%; height: 50%; margin: 0 auto; margin-bottom: 5px;"
                                    data-target="phase6">
                                    PARTO
                                </button>

                            </div>
                            <div>
                                <button type="button" class="btn-nav bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6
                                rounded-lg flex items-center justify-center gap-3 shadow-lg transition-transform transform hover:scale-90"
                               style="width: 100%; height: 50%; margin: 0 auto; margin-bottom: 5px;"
                                    data-target="phase7">
                                    EVALUACIÓN INICIAL
                                </button>
                                <button type="button" class="btn-nav bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6
                                rounded-lg flex items-center justify-center gap-3 shadow-lg transition-transform transform hover:scale-90"
                               style="width: 100%; height: 50%; margin: 0 auto; margin-bottom: 5px;"
                                    data-target="phase8">
                                    EVALUACIÓN SECUNDARIA
                                </button>
                            </div>

                            <div>


                                <button type="button" class="btn-nav bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6
                                rounded-lg flex items-center justify-center gap-3 shadow-lg transition-transform transform hover:scale-90"
                               style="width: 100%; height: 50%; margin: 0 auto; margin-bottom: 5px;"
                                    data-target="phase9">
                                    TRATAMIENTO
                                </button>
                            </div>
                        </div>

                        <div style=" margin-top: 30px; margin: 0 auto;">
                            <!-- Fase 1: Información de Ambulancia -->
                            <div class="phase rounded-lg" id="phase1">
                                <!-- Encabezado -->
                                <h2 class="text-2xl font-extrabold text-center text-blue-600 mb-4">Datos del
                                    Servicio</h2>
                                <div class="max-h-[55vh] " style="width: 100%; display: flex; padding: 10px;">

                                    <div style="padding: 0 10px;">
                                        <!-- Cronometría -->
                                        <div class="mb-6">
                                            <h6 class="text-lg font-semibold text-gray-700 mb-2">Cronometría</h6>
                                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                                <div class="form-group">
                                                    <label for="hora_llamada"
                                                        class="form-label text-sm font-medium text-gray-600">Hora de
                                                        Llamada</label>
                                                    <input type="time" name="hora_llamada" id="hora_llamada"
                                                        class="form-control border-gray-300 rounded-lg" value="{{ $phase1->hora_llamada ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="hora_despacho"
                                                        class="form-label text-sm font-medium text-gray-600">Hora de
                                                        Despacho</label>
                                                    <input type="time" name="hora_despacho" id="hora_despacho"
                                                        class="form-control border-gray-300 rounded-lg"
                                                        value="{{ $phase1->hora_despacho ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="hora_arribo"
                                                        class="form-label text-sm font-medium text-gray-600">Hora de
                                                        Arribo</label>
                                                    <input type="time" name="hora_arribo" id="hora_arribo"
                                                        class="form-control border-gray-300 rounded-lg"
                                                        value="{{ $phase1->hora_arribo ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="hora_traslado"
                                                        class="form-label text-sm font-medium text-gray-600">Hora de
                                                        Traslado</label>
                                                    <input type="time" name="hora_traslado" id="hora_traslado"
                                                        class="form-control border-gray-300 rounded-lg"
                                                        value="{{ $phase1->hora_traslado ?? '' }}">

                                                </div>
                                                <div class="form-group">
                                                    <label for="hora_hospital"
                                                        class="form-label text-sm font-medium text-gray-600">Hora en
                                                        Hospital</label>
                                                    <input type="time" name="hora_hospital" id="hora_hospital"
                                                        class="form-control border-gray-300 rounded-lg"
                                                        value="{{ $phase1->hora_hospital ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="hora_disponible"
                                                        class="form-label text-sm font-medium text-gray-600">Hora
                                                        Disponible</label>
                                                    <input type="time" name="hora_disponible" id="hora_disponible"
                                                        class="form-control border-gray-300 rounded-lg"
                                                        value="{{ $phase1->hora_disponible ?? '' }}">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Motivo de la atención -->
                                        <div class="form-group mb-4">
                                            <label for="motivo_atencion"
                                                class="form-label text-sm font-medium text-gray-600">Motivo de la
                                                Atención</label>
                                            <select name="motivo_atencion" id="motivo_atencion"
                                                class="form-select border-gray-300 rounded-lg">
                                                <option value="" disabled selected>Seleccionar</option>
                                                <option value="1"
                                                {{ ($phase1->motivo_atencion ?? '') == '1' ? 'selected' : '' }}>Enfermedad</option>
                                                <option value="2"
                                                {{ ($phase1->motivo_atencion ?? '') == '2' ? 'selected' : '' }}>Traumatismo</option>
                                                <option value="3"
                                                {{ ($phase1->motivo_atencion ?? '') == '3' ? 'selected' : '' }}>Ginecoobstétrico</option>
                                                <option value="4"
                                                {{ ($phase1->motivo_atencion ?? '') == '4' ? 'selected' : '' }}>Traslado</option>
                                                <option value="5"
                                                {{ ($phase1->motivo_atencion ?? '') == '5' ? 'selected' : '' }}>Servicio Especial</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>

                                        <div class="mb-6">
                                            <h6 class="text-lg font-semibold text-gray-700 mb-2">Detalles del Servicio
                                            </h6>


                                            <!-- Ubicación -->
                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                <div class="form-group">
                                                    <label for="direccion_accidente"
                                                        class="form-label text-sm font-medium text-gray-600">Ubicación
                                                        del
                                                        Servicio</label>
                                                    <input type="text" name="direccion_accidente"
                                                        id="direccion_accidente"
                                                        class="form-control border-gray-300 rounded-lg"
                                                        placeholder="Dirección" value="{{ $phase1->direccion_accidente ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="entre_calles_accidente"
                                                        class="form-label text-sm font-medium text-gray-600">Entre Qué
                                                        Calles</label>
                                                    <input type="text" name="entre_calles_accidente"
                                                        id="entre_calles_accidente"
                                                        class="form-control border-gray-300 rounded-lg"
                                                        placeholder="Calles cercanas" value="{{ $phase1->entre_calles_accidente ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="colonia_accidente"
                                                        class="form-label text-sm font-medium text-gray-600">Colonia</label>
                                                    <input type="text" name="colonia_accidente"
                                                        id="colonia_accidente"
                                                        class="form-control border-gray-300 rounded-lg"
                                                        placeholder="Colonia" value="{{ $phase1->colonia_accidente ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="municipio_accidente"
                                                        class="form-label text-sm font-medium text-gray-600">Municipio</label>
                                                    <input type="text" name="municipio_accidente"
                                                        id="municipio_accidente"
                                                        class="form-control border-gray-300 rounded-lg"
                                                        placeholder="Municipio" value="{{ $phase1->municipio_accidente ?? '' }}">
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Lugar de ocurrencia -->
                                        <div class="form-group mb-6" style="display: flex;">
                                            <div>
                                                <label for="lugar_ocurrencia"
                                                class="form-label text-sm font-medium text-gray-600">Lugar de
                                                Ocurrencia</label>
                                                <select name="lugar_ocurrencia" id="lugar_ocurrencia"
                                                    class="form-select border-gray-300 rounded-lg">
                                                    <option value="viapublica"
                                                    {{ ($phase1->lugar_ocurrencia ?? '') == 'viapublica' ? 'selected' : '' }}>Vía Pública</option>
                                                    <option value="casa"
                                                    {{ ($phase1->lugar_ocurrencia ?? '') == 'casa' ? 'selected' : '' }}>Casa</option>
                                                    <option value="trabajo"
                                                    {{ ($phase1->lugar_ocurrencia ?? '') == 'trabajo' ? 'selected' : '' }}>Trabajo</option>
                                                    <option value="escuela"
                                                    {{ ($phase1->lugar_ocurrencia ?? '') == 'escuela' ? 'selected' : '' }}>Escuela</option>
                                                    <option value="transportepublico"
                                                    {{ ($phase1->lugar_ocurrencia ?? '') == 'transportepublico' ? 'selected' : '' }}>Transporte Público</option>
                                                    <option value="otro"
                                                    {{ ($phase1->lugar_ocurrencia ?? '') == 'otro' ? 'selected' : ''  }}>Otro</option>
                                                </select>
                                            </div>
                                            <div id="otro_lugar" style="display: none;">
                                                <label for="labelotro_lugar"
                                                class="form-label text-sm font-medium text-gray-600">Otro Lugar</label>
                                                <input style=" margin-left: 5px;" type="text"
                                                name="otro_lugar" id="otro_lugar_input"
                                                class="form-control border-gray-300 rounded-lg"
                                                placeholder="Especificar lugar" value="{{ $phase1->otro_lugar ?? '' }}" >
                                            </div>
                                        </div>
                                    </div>




                                </div>
                            </div>

                            <!-- Fase 2: Control y Fase 3: Accidente -->
                            <div class="phase" id="phase2"
                                style="display:none; ">
                                <h5 class="text-2xl font-extrabold text-center text-blue-600 mb-4">Control y Paciente
                                </h5>
                                <div style="height: 60vh; max-height: 60vh; overflow-y: auto;">
                                    <h6 class="font-extrabold text-center m-1">Control</h6>

                                    <div style="display: flex; width: 100%; min-width: 100%; gap: 20px;">
                                        <!-- Primera columna -->
                                        <div style="flex: 1;">
                                            <!-- Selección de Ambulancia -->
                                            <div class="form-group">
                                                <label for="ambulance_id" class="form-label">Selecciona una
                                                    Ambulancia</label>
                                                <select name="ambulance_id" id="ambulance_id" class="form-select">
                                                    <option value="" disabled selected>Seleccionar</option>
                                                    @foreach ($ambulanceServices as $service)
                                                        @if (strtolower(trim($service->status)) === 'en servicio' && $service->ambulancia)
                                                            <option value="{{ $service->ambulancia->id }}"
                                                                {{ ($phase2->ambulance_id ?? '') === $service->ambulancia->id ? 'selected' : '' }}>
                                                                {{ $service->ambulancia->marca }}
                                                                ({{ $service->ambulancia->placa }})
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Selección de Chofer -->
                                            <div class="form-group">
                                                <label for="chofer_id" class="form-label">Selecciona un Chofer</label>
                                                <select name="chofer_id" id="chofer_id" class="form-select">
                                                    <option value="" disabled selected>Seleccionar</option>
                                                    @if (!empty($personal))
                                                        @foreach ($personal as $person)
                                                            @if (strtolower(trim($person->Cargo)) === 'chofer')
                                                                <option value="{{ $person->id }}"
                                                                    {{ ($phase2->chofer_id  ?? '') === $person->id ? 'selected' : '' }}>
                                                                    {{ $person->Nombre }} {{ $person->apellido_paterno }}
                                                                    {{ $person->apellido_materno }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option value="" disabled>No hay choferes disponibles
                                                        </option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Segunda columna -->
                                        <div style="flex: 1;">
                                            <!-- Selección de Paramédico -->
                                            <div class="form-group">
                                                <label for="paramedico_id" class="form-label">Selecciona un
                                                    Paramédico</label>
                                                <select name="paramedico_id" id="paramedico_id" class="form-select">
                                                    <option value="" disabled selected>Seleccionar</option>
                                                    @foreach ($personal as $person)
                                                        @if (strtolower(trim($person->Cargo)) === 'paramédico')
                                                            <option value="{{ $person->id }}"
                                                                {{ ($phase2->paramedico_id  ?? '') === $person->id ? 'selected' : '' }}>
                                                                {{ $person->Nombre }} {{ $person->apellido_paterno }}
                                                                {{ $person->apellido_materno }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Selección de Helicóptero -->
                                            <div class="form-group">
                                                <label for="helicoptero_id" class="form-label">Selecciona un Helicóptero
                                                    (Opcional)</label>
                                                <select name="helicoptero_id" id="helicoptero_id" class="form-select">
                                                    <option value="" disabled selected>Seleccionar</option>
                                                    @foreach ($helicopteros as $helicoptero)
                                                        @if (strtolower(trim($helicoptero->tipo)) === 'helicoptero')
                                                            <option value="{{ $helicoptero->id }}"
                                                                {{ ($phase2->helicoptero_id   ?? '') === $helicoptero->id ? 'selected' : '' }}>
                                                                {{ $helicoptero->marca }} ({{ $helicoptero->placa }})
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <h6 class="font-extrabold text-center m-1">Datos del Paciente</h6>
                                        <div style="display: flex;">
                                            <div>
                                                <div class="form-group mb-3">
                                                    <label for="nombre" class="form-label">Nombre</label>
                                                    <input type="text" name="nombre" id="nombre"
                                                        class="form-control" placeholder="Nombre del paciente"
                                                        value="{{$phase3->nombre ?? ''}}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="apellidopaterno" class="form-label">Apellido
                                                        Paterno</label>
                                                    <input type="text" name="apellido_paterno" id="apellidopaterno"
                                                        class="form-control" placeholder="Apellido paterno"
                                                        value="{{$phase3->apellido_paterno ?? ''}}">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="apellidomaterno" class="form-label">Apellido
                                                        Materno</label>
                                                    <input type="text" name="apellido_materno" id="apellidomaterno"
                                                        class="form-control" placeholder="Apellido materno"
                                                        value="{{$phase3->apellido_materno ?? ''}}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="edad" class="form-label">Edad</label>
                                                    <input type="number" name="edad" id="edad"
                                                        class="form-control" placeholder="Edad del paciente"
                                                        value="{{$phase3->edad ?? ''}}">
                                                </div>

                                                <div class="form-group mb-3" id="meses-container" style="display: none;">
                                                    <label for="meses" class="form-label">Meses</label>
                                                    <input type="number" name="meses" id="meses"
                                                        class="form-control" placeholder="Meses del paciente"
                                                        min="1" max="11"
                                                        value="{{$phase3->meses ?? ''}}">
                                                </div>
                                            </div>

                                            <div style="display: flex;">
                                                <div style="padding: 0 10px;">

                                                    <div class="form-group mb-3">
                                                        <label for="sexo" class="form-label">Sexo</label>
                                                        <select name="sexo" id="sexo" class="form-select">
                                                            <option value=""selected disable>Seleccione una opción</option>
                                                            <option value="masculino"
                                                            {{ ($phase3->sexo ?? '') === 'masculino' ? 'selected' : '' }}>Masculino</option>
                                                            <option value="femenino"
                                                            {{ ($phase3->sexo ?? '') === 'femenino' ? 'selected' : '' }}>Femenino</option>
                                                            <option value="otro"
                                                            {{ ($phase3->sexo ?? '') === 'otro' ? 'selected' : '' }}>Otro</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="tipo_sangre" class="form-label">Tipo de Sangre</label>
                                                        <select name="tipo_sangre" id="tipo_sangre" class="form-control">
                                                            <option value="" disabled selected>Seleccione un tipo de
                                                                sangre</option>
                                                            <option value="A+"
                                                            {{ ($phase3->tipo_sangre ?? '') === 'A+' ? 'selected' : '' }}>A+</option>
                                                            <option value="A-"
                                                            {{ ($phase3->tipo_sangre ?? '') === 'A-' ? 'selected' : '' }}>A-</option>
                                                            <option value="B+"
                                                            {{ ($phase3->tipo_sangre ?? '') === 'B+' ? 'selected' : '' }}>B+</option>
                                                            <option value="B-"
                                                            {{ ($phase3->tipo_sangre ?? '') === 'B-' ? 'selected' : '' }}>B-</option>
                                                            <option value="AB+"
                                                            {{ ($phase3->tipo_sangre ?? '') === 'AB+' ? 'selected' : '' }}>AB+</option>
                                                            <option value="AB-"
                                                            {{ ($phase3->tipo_sangre ?? '') === 'AB-' ? 'selected' : '' }}>AB-</option>
                                                            <option value="O+"
                                                            {{ ($phase3->tipo_sangre ?? '') === 'O+' ? 'selected' : '' }}>O+</option>
                                                            <option value="O-"
                                                            {{ ($phase3->tipo_sangre ?? '') === 'O-' ? 'selected' : '' }}>O-</option>
                                                        </select>
                                                    </div>


                                                    <div class="form-group mb-3">
                                                        <label for="domicilio" class="form-label">Domicilio</label>
                                                        <input type="text" name="domicilio" id="domicilio"
                                                            class="form-control" placeholder="Domicilio del paciente"
                                                            value="{{$phase3->domicilio ?? ''}}">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="colonia" class="form-label">Colonia /
                                                            Comunidad</label>
                                                        <input type="text" name="colonia" id="colonia"
                                                            class="form-control" placeholder="Colonia del paciente"
                                                            value="{{$phase3->colonia ?? ''}}">
                                                    </div>
                                                </div>

                                                <div style="padding: 0 10px;">

                                                    <div class="form-group mb-3">
                                                        <label for="alcaldia" class="form-label">Alcaldia /
                                                            Municipio</label>
                                                        <input type="text" name="alcaldia" id="alcaldia"
                                                            class="form-control" placeholder="Alcaldia del paciente"
                                                            value="{{$phase3->alcaldia ?? ''}}">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="telefono" class="form-label">Teléfono</label>
                                                        <input type="text" name="telefono" id="telefono"
                                                            class="form-control" placeholder="Teléfono de contacto"
                                                            value="{{$phase3->telefono ?? ''}}">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="ocupacion" class="form-label">Ocupación</label>
                                                        <input type="text" name="ocupacion" id="ocupacion"
                                                            class="form-control" placeholder="Ocupación del paciente"
                                                            value="{{$phase3->ocupacion ?? ''}}">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="derechohabiente"
                                                            class="form-label">Derechohabiente</label>
                                                        <input type="text" name="derechohabiente" id="derechohabiente"
                                                            class="form-control"
                                                            placeholder="Institución de derechohabiencia"
                                                            value="{{$phase3->derechohabiente ?? ''}}">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="companiaseguro" class="form-label">Compañia seguro
                                                            gastos
                                                            medicos</label>
                                                        <input type="text" name="compania_seguro" id="companiaseguro"
                                                            class="form-control"
                                                            placeholder="Compañia de seguro de gastos medicos del paciente"
                                                            value="{{$phase3->compania_seguro ?? ''}}">
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <!-- Fase 3: Información de Ubicación y Motivo -->
                            <div class="phase" id="phase4"
                                style="display:none;  ">
                                <h6 class="text-2xl font-extrabold text-center text-blue-600 mb-4"> Causas Traumática /
                                    Clinica </h6>

                                <div style="height: 60vh; max-height: 60vh; overflow-y: auto;">
                                    <div style=" display: flex;">
                                        <div style="padding: 0 10px; display: flex;">
                                            <div style="padding: 0 10px;">
                                                <h6 class="font-extrabold text-center m-1"> Causas Traumática</h6>
                                                <div class="form-group">
                                                    <label for="agente_causal" class="form-label">Agente Causal</label>
                                                    <select name="agente_causal" id="agente_causal" class="form-select">
                                                        <option value="" disabled selected>Selecciona una opción
                                                        </option>
                                                        <option value="1"
                                                        {{ ($phase5->agente_causal ?? '') === '1' ? 'selected' : '' }}>1. Arma</option>
                                                        <option value="2"
                                                        {{ ($phase5->agente_causal ?? '') === '2' ? 'selected' : '' }}>2. Juguete</option>
                                                        <option value="3"
                                                        {{ ($phase5->agente_causal ?? '') === '3' ? 'selected' : '' }}>3. Automotor</option>
                                                        <option value="4"
                                                        {{ ($phase5->agente_causal ?? '') === '4' ? 'selected' : '' }}>4. Bicicleta / Scooter</option>
                                                        <option value="5"
                                                        {{ ($phase5->agente_causal ?? '') === '5' ? 'selected' : '' }}>5. Producto Biológico / Químico</option>
                                                        <option value="6"
                                                        {{ ($phase5->agente_causal ?? '') === '6' ? 'selected' : '' }}>6. Maquinaria</option>
                                                        <option value="7"
                                                        {{ ($phase5->agente_causal ?? '') === '7' ? 'selected' : '' }}>7. Herramienta</option>
                                                        <option value="8"
                                                        {{ ($phase5->agente_causal ?? '') === '8' ? 'selected' : '' }}>8. Fuego</option>
                                                        <option value="9"
                                                        {{ ($phase5->agente_causal ?? '') === '9' ? 'selected' : '' }}>9. Sustancia / Objeto Caliente</option>
                                                        <option value="10"
                                                        {{ ($phase5->agente_causal ?? '') === '10' ? 'selected' : '' }}>10. Sustancia Tóxica</option>
                                                        <option value="11"
                                                        {{ ($phase5->agente_causal ?? '') === '11' ? 'selected' : '' }}>11. Electricidad</option>
                                                        <option value="12"
                                                        {{ ($phase5->agente_causal ?? '') === '12' ? 'selected' : '' }}>12. Explosión</option>
                                                        <option value="13"
                                                        {{ ($phase5->agente_causal ?? '') === '13' ? 'selected' : '' }}>13. Ser Humano</option>
                                                        <option value="14"
                                                        {{ ($phase5->agente_causal ?? '') === '14' ? 'selected' : '' }}>14. Animal</option>
                                                        <option value="15"
                                                        {{ ($phase5->agente_causal ?? '') === '15' ? 'selected' : '' }}>15. Otro</option>
                                                    </select>
                                                </div>

                                                <div class="form-group mt-3" id="especificar_otro"
                                                    style="display: none;">
                                                    <label for="especificar" class="form-label">Especifique</label>
                                                    <input type="text" name="especificar" id="especificar"
                                                        class="form-control" placeholder="Especifique el agente causal"
                                                        value="{{$phase5->especificar ?? '' }}">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="lesionescausadas" class="form-label">Lesiones causadas
                                                        por</label>
                                                    <input type="text" name="lesionescausadas" id="lesionescausadas"
                                                        class="form-control" placeholder="Lesiones causadas por"
                                                        value="{{$phase5->lesionescausadas ?? ''}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="tipo_accidente" class="form-label">Tipo de
                                                        Accidente</label>
                                                    <select id="tipo_accidente" name="tipo_accidente"
                                                        class="form-control" onchange="mostrarDetallesAccidente()">
                                                        <option value="" selected>Seleccione el tipo de
                                                            accidente</option>
                                                        <option value="automovilistico"
                                                        {{ ($phase5->tipo_accidente ?? '') === 'automovilistico' ? 'selected' : '' }}>Automovilístico</option>
                                                        <option value="atropellado"
                                                        {{ ($phase5->tipo_accidente ?? '') === 'atropellado' ? 'selected' : '' }}
                                                        >Atropellado</option>
                                                    </select>
                                                </div>

                                                <div id="accidente_atropellado_1" style="display: none;">
                                                    <div class="form-group">
                                                        <label for="atropelladopor" class="form-label">Atropellado
                                                            por</label>
                                                        <select id="atropelladopor" name="atropelladopor"
                                                            class="form-control" onchange="mostrarDetallesAccidente()">
                                                            <option value="">Seleccione el tipo de accidente</option>
                                                            <option value="motocicleta"
                                                            {{($phase5->atropelladopor ?? '') === 'motocicleta' ? 'selected' : '' }}>Motocicleta</option>
                                                            <option value="automotor"
                                                            {{($phase5->atropelladopor ?? '') === 'automotor' ? 'selected' : '' }}>AutoMotor</option>
                                                            <option value="bicicleta"
                                                            {{($phase5->atropelladopor ?? '') === 'bicicleta' ? 'selected' : '' }}>Bicicleta</option>
                                                            <option value="maquinaria"
                                                            {{($phase5->atropelladopor ?? '') === 'maquinaria' ? 'selected' : '' }}>Maquinaria</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="padding: 0 10px;">
                                            <h6>Causa Clinica</h6>
                                            <div class="form-group">
                                                <label for="origen_probable" class="form-label">Origen
                                                    Probable</label>
                                                <select id="origen_probable" name="origen_probable" class="form-control">
                                                    <option value="">Seleccione el origen probable</option>
                                                    <option value="neurologica"
                                                    {{ ($phase5->origen_probable ?? '') === 'neurologica' ? 'selected' : '' }}>Neurológica</option>
                                                    <option value="cardiovascular"
                                                    {{ ($phase5->origen_probable ?? '') === 'cardiovascular' ? 'selected' : '' }}>Cardiovascular</option>
                                                    <option value="respiratorio"
                                                    {{ ($phase5->origen_probable ?? '') === 'respiratorio' ? 'selected' : '' }}>Respiratorio</option>
                                                    <option value="metabolico"
                                                    {{ ($phase5->origen_probable ?? '') === 'metabolico' ? 'selected' : '' }}>Metabólico</option>
                                                    <option value="digestiva"
                                                    {{ ($phase5->origen_probable ?? '') === 'digestiva' ? 'selected' : '' }}>Digestiva</option>
                                                    <option value="urogenital"
                                                    {{ ($phase5->origen_probable ?? '') === 'urogenital' ? 'selected' : '' }}>Urogenital</option>
                                                    <option value="gineco_obstetrica"+
                                                    {{ ($phase5->origen_probable ?? '') === 'gineco_obstetrica' ? 'selected' : '' }}>Gineco-Obstetrica</option>
                                                    <option value="Cognitivo_emocional"
                                                    {{ ($phase5->origen_probable ?? '') === 'Cognitivo_emocional' ? 'selected' : '' }}>Cognitivo / Emocional
                                                    </option>

                                                    <option value="musculo_esqueletico"
                                                    {{ ($phase5->origen_probable ?? '') === 'musculo_esqueletico' ? 'selected' : '' }}>Músculo Esquelético
                                                    </option>
                                                    <option value="infecciosa"
                                                    {{ ($phase5->origen_probable ?? '') === 'infecciosa' ? 'selected' : '' }}>Infecciosa</option>
                                                    <option value="oncologico"
                                                    {{ ($phase5->origen_probable ?? '') === 'oncologico' ? 'selected' : '' }}>Oncológico</option>
                                                    <option value="otro"
                                                    {{ ($phase5->origen_probable ?? '') === 'otro' ? 'selected' : '' }}>Otro</option>
                                                </select>
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="especificarOrigen" class="form-label">Especifique</label>
                                                <input type="text" name="especificarOrigen" id="especificarOrigen"
                                                    class="form-control" placeholder="Especifique el origen probable"
                                                    value="{{ ($phase5->especificarOrigen ?? '')}}" >
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="primeravez" class="form-label">1° Vez</label>
                                                <input type="text" name="primeravez" id="primeravez"
                                                    class="form-control" placeholder="1° Vez"
                                                    value="{{$phase5->primeravez ?? ''}}">
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="subsecuente" class="form-label">Subsecuente</label>
                                                <input type="text" name="subsecuente" id="subsecuente"
                                                    class="form-control" placeholder="Subsecuente"
                                                   value="{{$phase5->subsecuente ?? ''}}" >
                                            </div>
                                        </div>
                                    </div>


                                    <div id="accidente_automovilistico_2"
                                        style="
                                    display: none;
                                    margin: 0 auto;
                                    width: 90%;
                                    max-width: 800px;
                                    ">
                                        <h6 class="font-bold" style="margin: 0 auto;">
                                            Detalles accidente Automovilístico
                                        </h6>
                                        <br>
                                        <div class="form-group" id="select_automovilistico">
                                            <label for="colision" class="form-label">Accidente Automovilístico</label>
                                            <select id="colision" name="colision" class="form-control"
                                                style="width: 100%; max-width: 500px; margin: 0 auto;">
                                                <option value="colision"
                                                {{($phase5->colision ?? '') === 'colision' ? 'selected' : ''}}>Colisión</option>
                                                <option value="moto"
                                                {{($phase5->colision ?? '') === 'moto' ? 'selected'  : ''}}>Motocicleta</option>
                                                <option value="automotor"
                                                {{($phase5->colision ?? '') === 'automotor' ? 'selected'  : ''}}>Automotor</option>
                                                <option value="bicicleta"
                                                {{($phase5->colision ?? '') === 'bicicleta' ? 'selected'  : ''}}>Bicicleta</option>
                                                <option value="maquinaria"
                                                {{($phase5->colision ?? '') === 'maquinaria' ? 'selected'  : ''}}>Maquinaria</option>
                                            </select>
                                        </div>
                                        <br>
                                        <h6 class="font-bold">Sobre la Colisión</h6>
                                        <div
                                            style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; width: 100%; margin: 0 auto;">
                                            <div style="flex: 1; min-width: 300px; max-width: 400px; padding: 10px;">
                                                <div class="form-group">
                                                    <label for="contraobjeto" class="form-label">Contra Objeto</label>
                                                    <select name="contraobjeto" id="contraobjeto" class="form-select">
                                                        <option value="" disabled selected>Selecciona una opción
                                                        </option>
                                                        <option value="fijo"
                                                        {{($phase5->contraobjeto ?? '') === 'fijo' ? 'selected'  : ''}}>Fijo</option>
                                                        <option value="en movimiento"
                                                        {{($phase5->contraobjeto ?? '') === 'en movimiento' ? 'selected'  : ''}}>En Movimiento</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="impacto" class="form-label">Impacto</label>
                                                    <select name="impacto" id="impacto" class="form-select">
                                                        <option value="" disabled selected>Selecciona una opción
                                                        </option>
                                                        <option value="frontal"
                                                        {{($phase5->impacto ?? '') === 'frontal' ? 'selected'  : ''}}>Frontal</option>
                                                        <option value="lateral"
                                                        {{($phase5->impacto ?? '') === 'lateral' ? 'selected'  : ''}}>Lateral</option>
                                                        <option value="posterior"
                                                        {{($phase5->impacto ?? '') === 'posterior' ? 'selected'  : ''}}>Posterior</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="hundimiento" class="form-label">Hundimiento</label>
                                                    <div
                                                        style="display: flex; align-items: center; justify-content: center;">
                                                        <input type="number" name="hundimiento" id="hundimiento"
                                                            class="form-control" placeholder="Hundimiento"
                                                            style="max-width: 90%;"
                                                            value="{{$phase5->hundimiento ?? ''}}">
                                                        <span
                                                            style="margin-left: 8px; font-weight: bold; font-size: 1rem;">CMS</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="parabrisas" class="form-label">Parabrisas</label>
                                                    <select name="parabrisas" id="parabrisas" class="form-select">
                                                        <option value="" disabled selected>Selecciona una opción
                                                        </option>
                                                        <option value="integro"
                                                        {{($phase5->parabrisas ?? '') === 'integro' ? 'selected'  : ''}}>Integro</option>
                                                        <option value="rotodoblado"
                                                        {{($phase5->parabrisas ?? '') === 'rotodoblado' ? 'selected'  : ''}}>Roto Doblado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div style="flex: 1; min-width: 300px; max-width: 400px; padding: 10px;">
                                                <div class="form-group">
                                                    <label for="bolsaaire" class="form-label">Bolsa De Aire</label>
                                                    <select name="bolsaaire" id="bolsaaire" class="form-select">
                                                        <option value="" disabled selected>Selecciona una opción
                                                        </option>
                                                        <option value="si"
                                                        {{($phase5->bolsaaire ?? '') === 'si' ? 'selected'  : ''}}>Si</option>
                                                        <option value="no"
                                                        {{($phase5->bolsaaire ?? '') === 'no' ? 'selected'  : ''}}>No</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="dentrovehiculo" class="form-label">Dentro del
                                                        Vehículo</label>
                                                    <select name="dentrovehiculo" id="dentrovehiculo"
                                                        class="form-select">
                                                        <option value="" disabled selected>Selecciona una opción
                                                        </option>
                                                        <option value="si"
                                                        {{($phase5->dentrovehiculo ?? '') === 'si' ? 'selected'  : ''}}>Si</option>
                                                        <option value="no"
                                                        {{($phase5->dentrovehiculo ?? '') === 'no' ? 'selected'  : ''}}>No</option>
                                                        <option value="eyectado"
                                                        {{($phase5->dentrovehiculo ?? '') === 'eyectado' ? 'selected'  : ''}}>Eyectado</option>
                                                        <option value="prensado"
                                                        {{($phase5->dentrovehiculo ?? '') === 'prensado' ? 'selected'  : ''}}>Prensado</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cinturon" class="form-label">Cinturón de Seguridad</label>
                                                    <select name="cinturon" id="cinturon" class="form-select">
                                                        <option value="" disabled selected>Selecciona una opción
                                                        </option>
                                                        <option value="colocado"
                                                        {{($phase5->cinturon ?? '') === 'colocado' ? 'selected'  : ''}}>Colocado</option>
                                                        <option value="nocolocado"
                                                        {{($phase5->cinturon ?? '') === 'nocolocado' ? 'selected'  : ''}}>No Colocado</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="volante" class="form-label">Volante</label>
                                                    <select name="volante" id="volante" class="form-select">
                                                        <option value="" disabled selected>Selecciona una opción
                                                        </option>
                                                        <option value="integro"
                                                        {{($phase5->volante ?? '') === 'integro' ? 'selected'  : ''}}>Integro</option>
                                                        <option value="doblado"
                                                        {{($phase5->volante ?? '') === 'doblado' ? 'selected'  : ''}}>Doblado</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                            </div>

                            <!-- Fase 6: Parto -->
                            <div class="phase" id="phase6" style="display: none;">
                                <h6 class="text-2xl font-extrabold text-center text-blue-600 mb-4">Parto</h6>
                                <div style="max-height: 60vh; overflow-y: auto; display: flex;">
                                    <div>


                                        <h5 style="text-align: center;">Datos de la Madre</h5>
                                        <div class="form-group mt-3">
                                            <label for="gesta" class="form-label">Gesta</label>
                                            <input type="text" name="gesta" id="gesta" class="form-control"
                                                placeholder="Especifique la Gesta" value="{{$phase6->gesta ?? ''}}">
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="cesareas" class="form-label">Cesáreas</label>
                                            <input type="text" name="cesareas" id="cesareas"
                                                class="form-control" placeholder="Número de cesáreas"
                                                value="{{$phase6->cesareas ?? ''}}">
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="para" class="form-label">Para</label>
                                            <input type="text" name="para" id="para" class="form-control"
                                                placeholder="Número de partos"
                                                value="{{$phase6->para ?? ''}}">
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="aborto" class="form-label">Aborto</label>
                                            <input type="text" name="aborto" id="aborto" class="form-control"
                                                placeholder="Número de abortos"
                                                value="{{$phase6->aborto ?? ''}}">
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="semanas" class="form-label">Semanas de Gestación</label>
                                            <input type="text" name="semanas" id="semanas" class="form-control"
                                                placeholder="Semanas de gestación"
                                                value="{{$phase6->semanas ?? ''}}">
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="fechaParto" class="form-label">Fecha Probable de
                                                Parto</label>
                                            <input type="date" name="fechaParto" id="fechaParto"
                                                class="form-control"
                                                value="{{$phase6->fechaParto ?? ''}}">
                                        </div>
                                    </div>
                                    <div style="padding: 10px;">
                                        <div class="form-group mt-3">
                                            <label for="membranas" class="form-label">Membranas</label>
                                            <input type="text" name="membranas" id="membranas"
                                                class="form-control" placeholder="Estado de las membranas"
                                                value="{{$phase6->membranas ?? ''}}">
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="fum" class="form-label">F.U.M. (Fecha de Última
                                                Menstruación)</label>
                                            <input type="date" name="fum" id="fum"
                                                class="form-control"
                                                value="{{$phase6->fum ?? ''}}">
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="horaContracciones" class="form-label">Hora de Inicio de
                                                Contracciones</label>
                                            <input type="time" name="horaContracciones" id="horaContracciones"
                                                class="form-control"
                                                value="{{$phase6->horaContracciones ?? ''}}">
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="frecuencia" class="form-label">Frecuencia</label>
                                            <input type="text" name="frecuencia" id="frecuencia"
                                                class="form-control" placeholder="Frecuencia de contracciones"
                                                value="{{$phase6->frecuencia ?? ''}}">
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="duracion" class="form-label">Duración</label>
                                            <input type="text" name="duracion" id="duracion"
                                                class="form-control" placeholder="Duración de contracciones"
                                                value="{{$phase6->duracion ?? ''}}">
                                        </div>

                                        <h5 style="text-align: center;">Datos Post-Parto</h5>

                                        <div class="form-group mt-3">
                                            <label for="horanacimiento" class="form-label">Hora de
                                                Nacimeinto</label>
                                            <input type="time" name="horanacimiento" id="horanacimiento"
                                                class="form-control" placeholder="Ingrese la hora de Nacimiento"
                                                value="{{$phase6->horanacimiento ?? ''}}">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group mt-3">
                                            <label for="lugar_post-parto" class="form-label">Lugar</label>
                                            <input type="text" name="lugar_post_parto" id="lugar_post_parto"
                                                class="form-control" placeholder="Ingrese el lugar"
                                                value="{{$phase6->lugar_post_parto ?? ''}}">
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="placenta_expulsada"
                                                class="form-label">placenta_expulsada</label>
                                            <input type="text" name="placenta_expulsada" id="placenta_expulsada"
                                                class="form-control" placeholder="placenta_expulsada"
                                                value="{{$phase6->placenta_expulsada ?? ''}}">
                                        </div>

                                        <h5 style="text-align: center;">Datos del Recien Nacido</h5>

                                        <div class="form-group mb-3">
                                            <label for="estado_producto" class="form-label">Sexo</label>
                                            <select name="estado_producto" id="estado_producto" class="form-select">
                                                <option value="vivo"
                                                {{($phase6->estado_producto ?? '') === 'vivo' ? 'selected'  : ''}}>Vivo</option>
                                                <option value="muerto"
                                                {{($phase6->estado_producto ?? '') === 'muerto' ? 'selected'  : ''}}>Muerto</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="genero_producto" class="form-label">Genero</label>
                                            <select name="genero_producto" id="genero_producto" class="form-select">
                                                <option value="masculino"
                                                {{($phase6->genero_producto ?? '') === 'masculino' ? 'selected'  : ''}}>Masculino</option>
                                                <option value="femenino"
                                                {{($phase6->genero_producto ?? '') === 'femenino' ? 'selected'  : ''}}>Femenino</option>
                                            </select>
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="apgar1" class="form-label">APGAR (1 Minuto)</label>
                                            <input type="number" name="apgar1" id="apgar1" class="form-control"
                                                placeholder="Puntaje (0-10)" min="0" max="10"
                                                value="{{$phase6->apgar1 ?? ''}}">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="apgar5" class="form-label">APGAR (5 Minutos)</label>
                                            <input type="number" name="apgar5" id="apgar5" class="form-control"
                                                placeholder="Puntaje (0-10)" min="0" max="10"
                                                value="{{$phase6->apgar5 ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fase 7: Evaluación Inicial -->
                            <div class="phase" id="phase7" style="display: none;">
                                <h6 class="text-2xl font-extrabold text-center text-blue-600 mb-4"> Evaluación Inicial
                                </h6>
                                <div style="max-height: 60vh; overflow-y: auto; display: flex;">

                                    <div style="padding: 0 10px;">
                                        <div class="form-group">
                                            <label for="nivel_conciencia" class="form-label">Nivel de
                                                Conciencia</label>
                                            <select id="nivel_conciencia" name="nivel_conciencia"
                                                class="form-control">
                                                <option value="">Seleccione el Nivel de Conciencia</option>
                                                <option value="alerta"
                                                {{($phase7->nivel_conciencia ?? '') === 'alerta' ? 'selected'  : ''}}  >Alerta</option>
                                                <option value="respuesta_estimuloverbal"
                                                {{($phase7->nivel_conciencia ?? '') === 'respuesta_estimuloverbal' ? 'selected'  : ''}}
                                                >Respuesta a Estímulo Verbal</option>
                                                <option value="respuesta_estimulodoloroso"
                                                {{($phase7->nivel_conciencia ?? '') === 'respuesta_estimulodoloroso' ? 'selected'  : ''}}>Respuesta a Estímulo
                                                    Doloroso
                                                </option>
                                                <option value="inconciente"
                                                {{($phase7->nivel_conciencia ?? '') === 'inconciente' ? 'selected'  : ''}}>Inconsciente</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="viaaerea" class="form-label">Vía Aérea</label>
                                            <select id="viaaerea" name="viaaerea" class="form-control">
                                                <option value="">Seleccione la Vía Aérea</option>
                                                <option value="permeable"
                                                {{($phase7->viaaerea ?? '') === 'permeable' ? 'selected'  : ''}}>Permeable</option>
                                                <option value="comprometida"
                                                {{($phase7->viaaerea ?? '') === 'comprometida' ? 'selected'  : ''}}>Comprometida</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="reflejo_deglutacion" class="form-label">Reflejo de
                                                Deglución</label>
                                            <select id="reflejo_deglutacion" name="reflejo_deglutacion"
                                                class="form-control">
                                                <option value="">Seleccione el Reflejo de Deglución</option>
                                                <option value="ausente"
                                                {{($phase7->reflejo_deglutacion ?? '') === 'ausente' ? 'selected'  : ''}}>Ausente</option>
                                                <option value="presente"
                                                {{($phase7->reflejo_deglutacion ?? '') === 'presente' ? 'selected'  : ''}}>Presente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div  style="padding: 0 10px;">
                                        <h5 class="font-bold" style="text-align: center;">Ventilación</h5>

                                        <div class="form-group">
                                            <label for="ventilacion_observacion"
                                                class="form-label">Observación</label>
                                            <select id="ventilacion_observacion" name="ventilacion_observacion"
                                                class="form-control">
                                                <option value="">Seleccione la Observación</option>
                                                <option value="automatismo_regular"
                                                {{($phase7->ventilacion_observacion ?? '') === 'automatismo_regular' ? 'selected'  : ''}}>Automatismo Regular</option>
                                                <option value="automatismo_irregular"
                                                {{($phase7->ventilacion_observacion ?? '') === 'automatismo_irregular' ? 'selected'  : ''}}>Automatismo Irregular
                                                </option>
                                                <option value="ventilacion_rapida"
                                                {{($phase7->ventilacion_observacion ?? '') === 'ventilacion_rapida' ? 'selected'  : ''}}>Ventilación Rápida</option>
                                                <option value="ventilacion_superficial"
                                                {{($phase7->ventilacion_observacion ?? '') === 'ventilacion_superficial' ? 'selected'  : ''}}>Ventilación Superficial
                                                </option>
                                                <option value="apnea"
                                                {{($phase7->ventilacion_observacion ?? '') === 'apnea' ? 'selected'  : ''}}>Apnea</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="ventilacion_auscultacion"
                                                class="form-label">Auscultación</label>
                                            <select id="ventilacion_auscultacion" name="ventilacion_auscultacion"
                                                class="form-control">
                                                <option value="">Seleccione la Auscultación</option>
                                                <option value="ruidos_normales"
                                                {{($phase7->ventilacion_auscultacion ?? '') === 'ruidos_normales' ? 'selected'  : ''}}>Ruidos Respiratorios Normales
                                                </option>
                                                <option value="ruidos_disminuidos"
                                                {{($phase7->ventilacion_auscultacion ?? '') === 'ruidos_disminuidos' ? 'selected'  : ''}}>Ruidos Respiratorios Disminuidos
                                                </option>
                                                <option value="ruidos_ausentes"
                                                {{($phase7->ventilacion_auscultacion ?? '') === 'ruidos_ausentes' ? 'selected'  : ''}}>Ruidos Respiratorios Ausentes
                                                </option>
                                                <option value="estertores_sibilancias"
                                                {{($phase7->ventilacion_auscultacion ?? '') === 'estertores_sibilancias' ? 'selected'  : ''}}>Estertores Sibilancias</option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Hemitorax</label>
                                            <div class="flex space-x-4">
                                                <label class="flex items-center space-x-2">
                                                    <input type="checkbox" name="ventilacion_hemitorax[]" value="derecho"
                                                        {{ in_array('derecho', $ventilacion_hemitorax ?? []) ? 'checked' : '' }}>
                                                    <span>Derecho</span>
                                                </label>
                                                <label class="flex items-center space-x-2">
                                                    <input type="checkbox" name="ventilacion_hemitorax[]" value="izquierdo"
                                                        {{ in_array('izquierdo', $ventilacion_hemitorax ?? []) ? 'checked' : '' }}>
                                                    <span>Izquierdo</span>
                                                </label>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="form-label">Sitio</label>
                                            <div class="flex space-x-4">
                                                <label class="flex items-center space-x-2">
                                                    <input type="checkbox" name="ventilacion_sitio[]" value="apical"
                                                        {{ in_array('apical', $ventilacion_sitio ?? []) ? 'checked' : '' }}>
                                                    <span>Apical</span>
                                                </label>
                                                <label class="flex items-center space-x-2">
                                                    <input type="checkbox" name="ventilacion_sitio[]" value="base"
                                                        {{ in_array('base', $ventilacion_sitio ?? []) ? 'checked' : '' }}>
                                                    <span>Base</span>
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div  style="padding: 0 10px;">

                                        <h5 class="font-bold" style="text-align: center;">Circulación</h5>

                                        <div class="form-group">
                                            <label for="circulacion_pulsos" class="form-label">Presencia de
                                                Pulsos</label>
                                            <select id="circulacion_pulsos" name="circulacion_pulsos"
                                                class="form-control">
                                                <option value="">Seleccione la Presencia de Pulsos</option>
                                                <option value="carotideo"
                                                {{($phase7->circulacion_pulsos ?? '') === 'carotideo' ? 'selected'  : ''}}>Carotídeo</option>
                                                <option value="radial"
                                                {{($phase7->circulacion_pulsos ?? '') === 'radial' ? 'selected'  : ''}}>Radial</option>
                                                <option value="paro_cardiaco"
                                                {{($phase7->circulacion_pulsos ?? '') === 'paro_cardiaco' ? 'selected'  : ''}}>Paro Cardiorespiratorio</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Calidad</label>
                                            <div class="grid grid-cols-2 gap-4">
                                                <!-- Grupo 1: Normal, Rápido, Lento -->
                                                <div>
                                                    <label class="flex items-center space-x-2">
                                                        <input type="radio" name="circulacion_calidad[velocidad]" value="normal"
                                                            {{ in_array('normal', $circulacion_calidad ?? []) ? 'checked' : '' }}>
                                                        <span>Normal</span>
                                                    </label>
                                                    <label class="flex items-center space-x-2">
                                                        <input type="radio" name="circulacion_calidad[velocidad]" value="rapido"
                                                            {{ in_array('rapido', $circulacion_calidad ?? []) ? 'checked' : '' }}>
                                                        <span>Rápido</span>
                                                    </label>
                                                    <label class="flex items-center space-x-2">
                                                        <input type="radio" name="circulacion_calidad[velocidad]" value="lento"
                                                            {{ in_array('lento', $circulacion_calidad ?? []) ? 'checked' : '' }}>
                                                        <span>Lento</span>
                                                    </label>
                                                </div>
                                                <!-- Grupo 2: Rítmico, Arrítmico -->
                                                <div>
                                                    <label class="flex items-center space-x-2">
                                                        <input type="radio" name="circulacion_calidad[ritmica]" value="ritmico"
                                                            {{ in_array('ritmico', $circulacion_calidad ?? []) ? 'checked' : '' }}>
                                                        <span>Rítmico</span>
                                                    </label>
                                                    <label class="flex items-center space-x-2">
                                                        <input type="radio" name="circulacion_calidad[ritmica]" value="arritmico"
                                                            {{ in_array('arritmico', $circulacion_calidad ?? []) ? 'checked' : '' }}>
                                                        <span>Arrítmico</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="circulacion_piel" class="form-label">Piel</label>
                                            <select id="circulacion_piel" name="circulacion_piel"
                                                class="form-control">
                                                <option value="">Seleccione el Estado de la Piel</option>
                                                <option value="normal"
                                                {{($phase7->circulacion_piel ?? '') === 'normal' ? 'selected'  : ''}}>Normal</option>
                                                <option value="palida"
                                                {{($phase7->circulacion_piel ?? '') === 'palida' ? 'selected'  : ''}}>Pálida</option>
                                                <option value="cianotica"
                                                {{($phase7->circulacion_piel ?? '') === 'cianotica' ? 'selected'  : ''}}>Cianótica</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="circulacion_caracteristicas"
                                                class="form-label">Características</label>
                                            <select id="circulacion_caracteristicas"
                                                name="circulacion_caracteristicas" class="form-control">
                                                <option value="">Seleccione las Características</option>
                                                <option value="normal"
                                                {{($phase7->circulacion_caracteristicas ?? '') === 'normal' ? 'selected'  : ''}}>Normal</option>
                                                <option value="caliente"
                                                {{($phase7->circulacion_caracteristicas ?? '') === 'caliente' ? 'selected'  : ''}}>Caliente</option>
                                                <option value="fria"
                                                {{($phase7->circulacion_caracteristicas ?? '') === 'fria' ? 'selected'  : ''}}>Fría</option>
                                                <option value="diaforesis"
                                                {{($phase7->circulacion_caracteristicas ?? '') === 'diaforesis' ? 'selected'  : ''}}>Diaforesis</option>
                                            </select>
                                        </div>
                                    </div>



                                </div>
                            </div>

                            <!-- Fase 8: Evaluación Secundaria -->
                            <div class="phase" id="phase8" style="display:none;">
                                <h6 class="text-2xl font-extrabold text-center text-blue-600 mb-4">Evaluación Secundaria</h6>

                                <div style="max-height: 60vh; overflow-y: auto;">
                                    <div style=" display: flex;">
                                        <!-- Exploración Física -->
                                       <div style="padding: 0 10px;" >
                                           <h6 class="font-extrabold text-center">Exploración Física</h5>
                                           <div style="max-height: 30vh; overflow-y: auto; ">
                                               <table class="table-auto border-collapse border border-gray-500 w-full">
                                                   <thead>
                                                       <tr>
                                                           <th class="border border-gray-500 px-2 py-1">N°
                                                           </th>
                                                           <th class="border border-gray-500 px-2 py-1">Marcar
                                                           </th>
                                                           <th class="border border-gray-500 px-2 py-1">
                                                               Descripción</th>
                                                           <th class="border border-gray-500 px-2 py-1">
                                                               Abreviatura</th>
                                                       </tr>
                                                   </thead>
                                                   <tbody>
                                                       <tr>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               1</td>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               <input type="checkbox" id="deformidades"
                                                                   name="exploracion_fisica[]" value="deformidades"
                                                                   {{ in_array('deformidades', (array) $exploracionFisica) ? 'checked' : '' }}>
                                                            </td>
                                                           <td class="border border-gray-500 px-2 py-1">
                                                               Deformidades</td>
                                                           <td class="border border-gray-500 px-2 py-1">D
                                                           </td>
                                                        </tr>
                                                        <tr>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               2</td>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               <input type="checkbox" id="contusiones"
                                                                   name="exploracion_fisica[]" value="contusiones"
                                                                   {{ in_array('contusiones', (array) $exploracionFisica) ? 'checked' : '' }}>
                                                           </td>
                                                           <td class="border border-gray-500 px-2 py-1">
                                                               Contusiones</td>
                                                           <td class="border border-gray-500 px-2 py-1">CD
                                                           </td>
                                                        </tr>
                                                        <tr>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               3</td>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               <input type="checkbox" id="abrasiones"
                                                                   name="exploracion_fisica[]" value="abrasiones"
                                                                   {{ in_array('abrasiones', (array) $exploracionFisica) ? 'checked' : '' }}>
                                                           </td>
                                                           <td class="border border-gray-500 px-2 py-1">
                                                               Abrasiones</td>
                                                           <td class="border border-gray-500 px-2 py-1">A</td>
                                                        </tr>
                                                        <tr>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               4</td>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               <input type="checkbox" id="penetraciones"
                                                                   name="exploracion_fisica[]" value="penetraciones"
                                                                   {{ in_array('penetraciones', (array) $exploracionFisica) ? 'checked' : '' }}>
                                                           </td>
                                                           <td class="border border-gray-500 px-2 py-1">
                                                               Penetraciones</td>
                                                           <td class="border border-gray-500 px-2 py-1">P</td>
                                                        </tr>
                                                        <tr>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               5</td>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               <input type="checkbox" id="movimiento_paradójico"
                                                                   name="exploracion_fisica[]"
                                                                   value="movimiento_paradójico"
                                                                   {{ in_array('movimiento_paradójico', (array) $exploracionFisica) ? 'checked' : '' }}>
                                                           </td>
                                                           <td class="border border-gray-500 px-2 py-1">
                                                               Movimiento Paradójico</td>
                                                           <td class="border border-gray-500 px-2 py-1">MP
                                                           </td>
                                                        </tr>
                                                        <tr>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               6</td>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               <input type="checkbox" id="crepitacion"
                                                                   name="exploracion_fisica[]" value="crepitacion"
                                                                   {{ in_array('crepitacion', (array) $exploracionFisica) ? 'checked' : '' }}>
                                                           </td>
                                                           <td class="border border-gray-500 px-2 py-1">
                                                               Crepitación</td>
                                                           <td class="border border-gray-500 px-2 py-1">C</td>
                                                        </tr>
                                                        <tr>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               7</td>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               <input type="checkbox" id="heridas"
                                                                   name="exploracion_fisica[]" value="heridas"
                                                                   {{ in_array('heridas', (array) $exploracionFisica) ? 'checked' : '' }}>
                                                           </td>
                                                           <td class="border border-gray-500 px-2 py-1">
                                                               Heridas</td>
                                                           <td class="border border-gray-500 px-2 py-1">H</td>
                                                        </tr>
                                                        <tr>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               8</td>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               <input type="checkbox" id="fracturas"
                                                                   name="exploracion_fisica[]" value="fracturas"
                                                                   {{ in_array('fracturas', (array) $exploracionFisica) ? 'checked' : '' }}>
                                                           </td>
                                                           <td class="border border-gray-500 px-2 py-1">
                                                               Fracturas</td>
                                                           <td class="border border-gray-500 px-2 py-1">F
                                                           </td>
                                                        </tr>
                                                        <tr>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               9</td>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               <input type="checkbox" id="enfisema_subcutaneo"
                                                                   name="exploracion_fisica[]"
                                                                   value="enfisema_subcutaneo"
                                                                   {{ in_array('enfisema_subcutaneo', (array) $exploracionFisica) ? 'checked' : '' }}>
                                                           </td>
                                                           <td class="border border-gray-500 px-2 py-1">
                                                               Enfisema Subcutáneo</td>
                                                           <td class="border border-gray-500 px-2 py-1">ES
                                                           </td>
                                                        </tr>
                                                        <tr>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               10</td>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               <input type="checkbox" id="quemaduras"
                                                                   name="exploracion_fisica[]" value="quemaduras"
                                                                   {{ in_array('quemaduras', (array) $exploracionFisica) ? 'checked' : '' }}>
                                                           </td>
                                                           <td class="border border-gray-500 px-2 py-1">
                                                               Quemaduras</td>
                                                           <td class="border border-gray-500 px-2 py-1">Q
                                                           </td>
                                                        </tr>
                                                        <tr>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               11</td>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               <input type="checkbox" id="laceraciones"
                                                                   name="exploracion_fisica[]" value="laceraciones"
                                                                   {{ in_array('laceraciones', (array) $exploracionFisica) ? 'checked' : '' }}>
                                                           </td>
                                                           <td class="border border-gray-500 px-2 py-1">
                                                               Laceraciones</td>
                                                           <td class="border border-gray-500 px-2 py-1">L
                                                           </td>
                                                        </tr>
                                                        <tr>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               12</td>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               <input type="checkbox" id="edema"
                                                                   name="exploracion_fisica[]" value="edema"
                                                                   {{ in_array('edema', (array) $exploracionFisica) ? 'checked' : '' }}>
                                                           </td>
                                                           <td class="border border-gray-500 px-2 py-1">Edema
                                                           </td>
                                                           <td class="border border-gray-500 px-2 py-1">E
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               13</td>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               <input type="checkbox" id="alteracion_sensibilidad"
                                                                   name="exploracion_fisica[]"
                                                                   value="alteracion_sensibilidad"
                                                                   {{ in_array('alteracion_sensibilidad', (array) $exploracionFisica) ? 'checked' : '' }}>
                                                           </td>
                                                           <td class="border border-gray-500 px-2 py-1">
                                                               Alteración de Sensibilidad</td>
                                                           <td class="border border-gray-500 px-2 py-1">AS
                                                           </td>
                                                        </tr>
                                                        <tr>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               14</td>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               <input type="checkbox" id="alteracion_movilidad"
                                                                   name="exploracion_fisica[]"
                                                                   value="alteracion_movilidad"
                                                                   {{ in_array('alteracion_movilidad', (array) $exploracionFisica) ? 'checked' : '' }}>
                                                           </td>
                                                           <td class="border border-gray-500 px-2 py-1">
                                                               Alteración de Movilidad</td>
                                                           <td class="border border-gray-500 px-2 py-1">AM
                                                           </td>
                                                        </tr>
                                                        <tr>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               15</td>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               <input type="checkbox" id="dolor"
                                                                   name="exploracion_fisica[]" value="dolor"
                                                                   {{ in_array('dolor', (array) $exploracionFisica) ? 'checked' : '' }}>
                                                           </td>
                                                           <td class="border border-gray-500 px-2 py-1">Dolor
                                                           </td>
                                                           <td class="border border-gray-500 px-2 py-1">DO
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               16</td>
                                                           <td class="border border-gray-500 px-2 py-1 text-center">
                                                               <input type="checkbox" id="amputacion"
                                                                   name="exploracion_fisica[]" value="amputacion"
                                                                   {{ in_array('amputacion', (array) $exploracionFisica) ? 'checked' : '' }}>
                                                           </td>
                                                           <td class="border border-gray-500 px-2 py-1">
                                                               Amputación</td>
                                                           <td class="border border-gray-500 px-2 py-1">AP
                                                           </td>
                                                       </tr>
                                                   </tbody>
                                               </table>
                                           </div>

                                           <h6>Pupilas</h6>

                                           <table style="
                                                width: 80%;
                                                border-collapse: collapse;
                                                text-align: center;
                                                margin: 20px auto;
                                                background-color: #f9f9f9;
                                                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                                                border-radius: 10px;
                                                overflow: hidden;
                                            ">
                                                <thead>
                                                    <tr style="background-color: #eaeaea;">
                                                        <th style="border-bottom: 2px solid #000; padding: 15px; font-weight: bold;">
                                                            Imagen
                                                        </th>
                                                        <th style="border-bottom: 2px solid #000; padding: 15px; font-weight: bold;">
                                                            Seleccionar
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr >
                                                        <td style="padding: 5px 15px; text-align: center; vertical-align: middle;">
                                                            <img src="{{ asset('images/recursos/ojos2.jpg') }}" width="150" alt="Ojos 1" style="border-radius: 8px; display: block; margin: 0 auto;">
                                                        </td>
                                                        <td style="padding: 0 15px; vertical-align: middle;">
                                                            <label for="ojos1">
                                                                <input type="radio" name="ojos" id="ojos1" value="1"
                                                                {{  ($phase8->valor ?? '' ) === '1' ?  'checked' : '' }}>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 5px 15px; text-align: center; vertical-align: middle;">
                                                            <img src="{{ asset('images/recursos/ojos5.jpg') }}" width="150" alt="Ojos 2" style="border-radius: 8px; display: block; margin: 0 auto;">
                                                        </td>
                                                        <td style="padding: 0 15px; vertical-align: middle;">
                                                            <label for="ojos2">
                                                                <input type="radio" name="ojos" id="ojos2" value="2"
                                                                {{  ($phase8->valor ?? '' ) === '2' ?  'checked' : '' }}>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 5px 15px; text-align: center; vertical-align: middle;">
                                                            <img src="{{ asset('images/recursos/ojos4.jpg') }}" width="150" alt="Ojos 3" style="border-radius: 8px; display: block; margin: 0 auto;">
                                                        </td>
                                                        <td style="padding: 0 15px; vertical-align: middle;">
                                                            <label for="ojos3">
                                                                <input type="radio" name="ojos" id="ojos3" value="3"
                                                                {{  ($phase8->valor ?? '' ) === '3' ?  'checked' : '' }}>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 5px 15px; text-align: center; vertical-align: middle;">
                                                            <img src="{{ asset('images/recursos/dilatados.jpg') }}" width="150" alt="Ojos 4" style="border-radius: 8px; display: block; margin: 0 auto;">
                                                        </td>
                                                        <td style="padding:0 15px; vertical-align: middle;">
                                                            <label for="ojos4">
                                                                <input type="radio" name="ojos" id="ojos4" value="4"
                                                                {{  ($phase8->valor ?? '' ) === '4' ?  'checked' : '' }}>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 5px 15px; text-align: center; vertical-align: middle;">
                                                            <img src="{{ asset('images/recursos/ojos3.jpg') }}" width="150" alt="Ojos 5" style="border-radius: 8px; display: block; margin: 0 auto;">
                                                        </td>
                                                        <td style="padding: 0 15px; vertical-align: middle;">
                                                            <label for="ojos5">
                                                                <input type="radio" name="ojos" id="ojos5" value="5"
                                                                {{  ($phase8->valor ?? '' ) === '5' ?  'checked' : '' }}>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                       </div>

                                       {{-- ZONAS DE LESIÓN --}}
                                       <div style="width: 80%;" >
                                           <h5>
                                               Zonas de Lesión
                                           </h5>
                                           <p>Haz clic en la imagen del cuerpo humano para marcar las zonas de
                                               lesión:</p>

                                           <div style="display: block;">
                                               <input type="text" id="coordinate" name="coordinate"
                                               value="{{$phase8_zona->zona ?? ''}}">
                                               <input type="text" id="zonaslabel" name="zonaslabel"
                                               value="{{$phase8_zona->coordinate ?? ''}}">
                                           </div>

                                           <!-- Canvas para la imagen del cuerpo humano -->
                                           <div class="flex justify-center">
                                                <div id="zonalesion">
                                                    <canvas id="bodyCanvas" width="400" height="405"
                                                    class="border"></canvas>
                                                </div>
                                           </div>

                                           <!-- Lista de puntos marcados -->
                                           <div id="zonasMarcadas" class="mt-4 text-center"
                                               style="height: 20vh; overflow-y: auto;">
                                               <h6 class="font-bold">Zonas Marcadas:</h6>
                                               <ul id="listaZonas" class="list-disc inline-block text-left"></ul>
                                           </div>
                                       </div>
                                   </div>


                                   {{-- SIGNOS VITALES Y MONITOREO --}}
                                           <div style="width: 90%; margin: 0 auto; padding: 0 10px;">
                                            <h6>Signos vitales y Monitoreo</h6>
                                               <div
                                                   class="grid grid-cols-5 gap-2 border border-gray-500 p-4 text-center text-sm">
                                                   <!-- Encabezados -->
                                                   <div class="font-bold border border-gray-500 p-1">Hora</div>
                                                   <div class="font-bold border border-gray-500 p-1">FR</div>
                                                   <div class="font-bold border border-gray-500 p-1">FC</div>
                                                   <div class="font-bold border border-gray-500 p-1">TAS</div>
                                                   <div class="font-bold border border-gray-500 p-1">TAD</div>

                                                   <!-- Fila de datos -->
                                                   <div class="border border-gray-500 p-1">
                                                        <input type="time" name="hora_es" id="hora_es"
                                                        class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center"
                                                        value="{{$phase8->hora_es ?? ''}}" step="60">
                                                   </div>
                                                   <div class="border border-gray-500 p-1">
                                                       <input type="number" name="fr" min="0"
                                                           step=".1"
                                                           class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center"
                                                           value="{{$phase8->fr ?? ''}}">
                                                   </div>
                                                   <div class="border border-gray-500 p-1">
                                                       <input type="number" name="fc" min="0"
                                                           step=".1"
                                                           value="{{$phase8->fc ?? ''}}"
                                                           class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center">
                                                   </div>
                                                   <div class="border border-gray-500 p-1">
                                                       <input type="number" min="0" step=".1"
                                                           name="tas"
                                                           value="{{$phase8->tas ?? ''}}"
                                                           class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center">
                                                   </div>
                                                   <div class="border border-gray-500 p-1">
                                                       <input type="number" min="0" step=".1"
                                                           name="tad"
                                                           value="{{$phase8->tad ?? ''}}"
                                                           class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center">
                                                   </div>
                                               </div>

                                               <div
                                                   class="grid grid-cols-5 gap-2 border border-gray-500 p-4 text-center text-sm">
                                                   <!-- Encabezados -->
                                                   <div class="font-bold border border-gray-500 p-1">SpO2</div>
                                                   <div class="font-bold border border-gray-500 p-1">Temp</div>
                                                   <div class="font-bold border border-gray-500 p-1">Glasgow
                                                   </div>
                                                   <div class="font-bold border border-gray-500 p-1">Trauma Score
                                                   </div>
                                                   <div class="font-bold border border-gray-500 p-1">EKG</div>

                                                   <!-- Fila de datos -->
                                                   <div class="border border-gray-500 p-1">
                                                       <input type="number" min="0" step=".1"
                                                           name="spo2"
                                                           value="{{$phase8->spo2 ?? ''}}"
                                                           class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center">
                                                   </div>
                                                   <div class="border border-gray-500 p-1">
                                                       <input type="number" min="0" step=".1"
                                                           name="temp"
                                                           value="{{$phase8->temp ?? ''}}"
                                                           class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center">
                                                   </div>
                                                   <div class="border border-gray-500 p-1">
                                                       <input type="number" min="0" step=".1"
                                                           name="glasgow"
                                                           value="{{$phase8->glasgow ?? ''}}"
                                                           class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center">
                                                   </div>
                                                   <div class="border border-gray-500 p-1">
                                                       <input type="number" min="0" step=".1"
                                                           name="trauma_score"
                                                           value="{{$phase8->trauma_score ?? ''}}"
                                                           class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center">
                                                   </div>
                                                   <div class="border border-gray-500 p-1">
                                                       <input type="number" min="0" step=".1"
                                                           name="ekg"
                                                           value="{{$phase8->ekg ?? ''}}"
                                                           class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center">
                                                   </div>
                                               </div>
                                           </div>

                                   <!-- Interrogatorio -->
                                   <div style="width: 90%; margin: 0 auto; padding: 0 10px;">
                                        <h6>Interrogatorio</h6>

                                        <div>
                                            <div style="display: flex;">
                                                <div style="padding: 10px 10px;">
                                                    <!-- Información sobre alergias -->
                                                    <div class="mb-4">
                                                            <label for="alergias" class="font-semibold">Alergias:</label>
                                                            <input type="text" id="alergias" name="alergias"
                                                                class="form-control w-full border border-gray-400 rounded-md"
                                                                placeholder="Ingrese alergias"
                                                                value="{{$phase8->alergias ?? ''}}">
                                                    </div>

                                                        <!-- Atendido por primer responsable -->
                                                    <div class="mb-4">
                                                        <p class="font-semibold">Atendido por primer responsable:</p>
                                                        <div class="flex items-center space-x-4">
                                                            <label>
                                                                <input type="radio" name="atendido" value="si"
                                                                {{  ($phase8->atendido ?? '' ) === 'si' ?  'checked' : '' }}>
                                                                Si
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="atendido" value="no"
                                                                {{  ($phase8->atendido ?? '' ) === 'no' ?  'checked' : '' }}>
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                        <!-- Medicamentos que está ingiriendo -->
                                                    <div class="mb-4">
                                                        <label for="medicamentos" class="font-semibold">Medicamentos
                                                            que está
                                                            ingiriendo:</label>
                                                        <input type="text" id="medicamentos" name="medicamentos"
                                                            class="form-control w-full border border-gray-400 rounded-md"
                                                            placeholder="Ingrese medicamentos"
                                                            value="{{$phase8->medicamentos ?? ''}}">
                                                    </div>

                                                    <!-- Condición del paciente -->
                                                    <div class="mb-4" >
                                                        <p class="font-semibold">Condición del paciente:</p>
                                                        <div class="flex items-center space-x-4">
                                                            <label>
                                                                <input type="radio" name="condicion" value="critico"
                                                                {{  ($phase8->condicion ?? '' ) === 'critico' ?  'checked' : '' }}>
                                                                Crítico
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="condicion" value="no_critico"
                                                                {{  ($phase8->condicion ?? '' ) === 'no_critico' ?  'checked' : '' }}>
                                                                No Crítico
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="estabilidad"
                                                                    value="inestable"
                                                                    {{  ($phase8->estabilidad ?? '' ) === 'inestable' ?  'checked' : '' }}>
                                                                Inestable
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="estabilidad" value="estable"
                                                                {{  ($phase8->estabilidad ?? '' ) === 'estable' ?  'checked' : '' }}>
                                                                Estable
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div style="padding: 0 10px;">
                                                    <!-- Enfermedades y cirugías previas -->
                                                    <div class="mb-4">
                                                        <label for="antecedentes" class="font-semibold">Enfermedades
                                                            y cirugías
                                                            previas:</label>
                                                        <input type="text" id="antecedentes" name="antecedentes"
                                                            class="form-control w-full border border-gray-400 rounded-md"
                                                            placeholder="Ingrese antecedentes médicos"
                                                            value="{{$phase8->antecedentes ?? ''}}">
                                                    </div>

                                                    <!-- Hora de última comida -->
                                                    <div class="mb-4">
                                                        <label for="ultima_comida" class="font-semibold">Hora de
                                                            última comida:</label>
                                                        <input type="text" id="ultima_comida" name="ultima_comida"
                                                            class="form-control w-full border border-gray-400 rounded-md"
                                                            placeholder="Ingrese hora"
                                                            value="{{$phase8->ultima_comida ?? ''}}">
                                                    </div>

                                                    <!-- Eventos previos relacionados -->
                                                    <div class="mb-4">
                                                        <label for="eventos_previos" class="font-semibold">Eventos
                                                            previos
                                                            relacionados:</label>
                                                        <textarea id="eventos_previos" name="eventos_previos"
                                                            class="form-control w-full border border-gray-400 rounded-md" rows="3"
                                                            placeholder="Describa eventos relacionados"
                                                            >{{$phase8->eventos_previos ?? ''}}</textarea>
                                                    </div>

                                                     <!-- Prioridad del paciente -->
                                                <div class="mb-4" >
                                                    <p class="font-semibold">Prioridad:</p>
                                                    <div class="flex items-center space-x-4">
                                                        <label>
                                                            <input type="radio" name="prioridad" value="rojo"
                                                            {{  ($phase8->prioridad ?? '' ) === 'rojo' ?  'checked' : '' }}>
                                                            Rojo
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="prioridad" value="amarillo"
                                                            {{  ($phase8->prioridad ?? '' ) === 'amarillo' ?  'checked' : '' }}>
                                                            Amarillo
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="prioridad" value="verde"
                                                            {{  ($phase8->prioridad ?? '' ) === 'verde' ?  'checked' : '' }}>
                                                            Verde
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="prioridad" value="negro"
                                                            {{  ($phase8->prioridad ?? '' ) === 'negro' ?  'checked' : '' }}>
                                                            Negro
                                                        </label>
                                                    </div>
                                                </div>
                                                </div>

                                            </div>




                                        </div>
                                   </div>
                                </div>

                            </div>

                            <!-- Fase 9: tratamiento -->
                            <div class="phase" id="phase9" style="display:none;">
                                <h6 class="text-2xl font-extrabold text-center text-blue-600 mb-4">Tratamiento</h6>
                                <div style="max-height: 60vh;  overflow-y: auto;">


                                    <div style="display: flex; margin: 0 auto; width: 100%;">
                                        <div style="padding: 0 10px; width: 50%;">
                                            <div class="mb-4">
                                                <h5 class="font-semibold">Vía Aérea:</h5>
                                                <select name="via_aerea" id="via_aerea">
                                                    <option value="aspiracion"
                                                    {{  ($phase9->via_aerea ?? '' ) === 'aspiracion' ?  'selected' : '' }}
                                                    >Aspiración</option>
                                                    <option value="canula_orofaringea"
                                                    {{  ($phase9->via_aerea ?? '' ) === 'canula_orofaringea' ?  'selected' : '' }}>Cánula Orofaríngea</option>
                                                    <option value="canula_nasofaringea"
                                                    {{  ($phase9->via_aerea ?? '' ) === 'canula_nasofaringea' ?  'selected' : '' }}>Cánula Nasofaríngea</option>
                                                    <option value="intubacion_orotraqueal"
                                                    {{  ($phase9->via_aerea ?? '' ) === 'intubacion_orotraqueal' ?  'selected' : '' }}>Intubación Orotraqueal
                                                    </option>
                                                    <option value="intubacion_nasotraqueal"
                                                    {{  ($phase9->via_aerea ?? '' ) === 'intubacion_nasotraqueal' ?  'selected' : '' }}>Intubación Nasotraqueal
                                                    </option>
                                                    <option value="manual"
                                                    {{  ($phase9->via_aerea ?? '' ) === 'manual' ?  'selected' : '' }}>Manual</option>
                                                    <option value="mascarilla_laringea"
                                                    {{  ($phase9->via_aerea ?? '' ) === 'mascarilla_laringea' ?  'selected' : '' }}>Mascarilla Laríngea</option>
                                                    <option value="cricotiroidotomia"
                                                    {{  ($phase9->via_aerea ?? '' ) === 'cricotiroidotomia' ?  'selected' : '' }}>Cricotiroidotomía por Punción
                                                    </option>
                                                </select>
                                            </div>

                                            <!-- Control Cervical -->
                                            <div class="mb-4">
                                                <h5 class="font-semibold mb-2">Control Cervical:</h5>
                                                <select name="control_cervical" class="w-full p-2 border rounded cursor-pointer">
                                                  <option value="manual"
                                                  {{  ($phase9->control_cervical ?? '' ) === 'manual' ?  'selected' : '' }}>Manual</option>
                                                  <option value="collarin_rigido"
                                                  {{  ($phase9->control_cervical ?? '' ) === 'collarin_rigido' ?  'selected' : '' }}>Collarín Rígido</option>
                                                  <option value="collarin_blando"
                                                  {{  ($phase9->control_cervical ?? '' ) === 'collarin_bland-' ?  'selected' : '' }}>Collarín Blando</option>
                                                </select>
                                            </div>


                                            <!-- Asistencia Ventilatoria -->
                                            <div class="mb-4" style="border: 1px solid; padding: 10px;">
                                                <h5 class="font-semibold">Asistencia Ventilatoria:</h5>
                                                <select name="asistencia_ventilatoria" id="asistencia_ventilatoria" class="w-full p-2 border rounded cursor-pointer">
                                                  <option value="">Seleccione una opción</option>
                                                  <option value="balon_mascarilla"
                                                  {{  ($phase9->asistencia_ventilatoria ?? '' ) === 'balon_mascarilla' ?  'selected' : '' }}>Balón-Válvula-Mascarilla</option>
                                                  <option value="valvula_demanda"
                                                  {{  ($phase9->asistencia_ventilatoria ?? '' ) === 'valvula_demanda' ?  'selected' : '' }}>Válvula de Demanda</option>
                                                  <option value="ventilador_automatico"
                                                  {{  ($phase9->asistencia_ventilatoria ?? '' ) === 'ventilador_automatico' ?  'selected' : '' }}>Ventilador Automático</option>
                                                </select>

                                                @if ($phase9->asistencia_ventilatoria === 'ventilador_automatico')
                                                    <div id="ventilador_opciones" class="mt-4">
                                                @else
                                                    <div id="ventilador_opciones" class="mt-4 hidden">
                                                @endif
                                                        <div style="display: flex;">
                                                            <div class="mt-2" style="margin-right: 10px;">
                                                                <label for="FREC" class="font-semibold">FREC: </label>
                                                                <input
                                                                    type="number"
                                                                    id="FREC"
                                                                    name="FREC"
                                                                    value="{{ $phase9->FREC ?? $phase8->FREC ?? '' }}"
                                                                    class="form-control w-full border border-gray-400 rounded-md"
                                                                >
                                                            </div>
                                                            <div class="mt-2">
                                                                <label for="volumen" class="font-semibold">VOL: </label>
                                                                <input
                                                                    type="number"
                                                                    id="volumen"
                                                                    name="volumen"
                                                                    value="{{ $phase9->volumen ?? $phase8->volumen ?? '' }}"
                                                                    class="form-control w-full border border-gray-400 rounded-md"
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="flex justify-center items-center mt-2 space-x-6">
                                                        <label class="flex items-center space-x-2">
                                                            <input type="checkbox" name="heperventilacion" value="si"
                                                            {{  ($phase9->heperventilacion ?? '' ) === 'si' ?  'checked' : '' }}>
                                                            <span>Hiperventilación</span>
                                                        </label>
                                                        <label class="flex items-center space-x-2">
                                                            <input type="checkbox" name="descompresión_pleural_con_agua" value="si"
                                                            {{  ($phase9->descompresión_pleural_con_agua ?? '' ) === 'si' ?  'checked' : '' }}>
                                                            <span>Descompresión Pleural Con Agua</span>
                                                        </label>
                                                    </div>
                                            </div>



                                            <!-- Oxigenoterapia -->
                                            <div class="mb-4" style="border: 1px solid; padding: 10px;">
                                                <h5 class="font-semibold">Oxigenoterapia:</h5>
                                                <div class="grid grid-cols-2 gap-4 mt-2">
                                                    <label class="flex items-center space-x-2">
                                                        <input type="checkbox" name="oxigenoterapia[]" value="puntas_nasales"
                                                        {{ in_array('puntas_nasales', $oxigenoterapia ?? []) ? 'checked' : '' }}>
                                                        <span>Puntas Nasales</span>
                                                    </label>
                                                    <label class="flex items-center space-x-2">
                                                        <input type="checkbox" name="oxigenoterapia[]" value="mascarilla_simple"
                                                        {{ in_array('mascarilla_simple', $oxigenoterapia ?? []) ? 'checked' : '' }}>
                                                        <span>Mascarilla Simple</span>
                                                    </label>
                                                    <label class="flex items-center space-x-2">
                                                        <input type="checkbox" name="oxigenoterapia[]" value="mascarilla_reservorio"
                                                        {{ in_array('mascarilla_reservorio', $oxigenoterapia ?? []) ? 'checked' : '' }}>
                                                        <span>Mascarilla con Reservorio</span>
                                                    </label>
                                                    <label class="flex items-center space-x-2">
                                                        <input type="checkbox" name="oxigenoterapia[]" value="mascarilla_venturi"
                                                        {{ in_array('mascarilla_venturi', $oxigenoterapia ?? []) ? 'checked' : '' }}>
                                                        <span>Mascarilla Venturi</span>
                                                    </label>
                                                </div>

                                                <div class="mt-4">
                                                    <label for="litros" class="font-semibold">LTS x Min:</label>
                                                    <input type="number" id="litros" name="litros"
                                                        class="form-control w-full border border-gray-400 rounded-md mt-1"
                                                         value="{{$phase9->litros ?? ''}}" >
                                                </div>

                                                  <!-- Hemotorax -->
                                                  <div class="mb-4" style="margin-top: 10px;">
                                                    <div class="flex items-center space-x-4">
                                                        <label class="flex items-center space-x-2">
                                                            <input type="checkbox" name="hemitorax[]" value="hemitorax_derecho"
                                                                @checked(in_array('hemitorax_derecho', $hemitorax ?? []))>
                                                            <span>Hemitórax Derecho</span>
                                                        </label>
                                                        <label class="flex items-center space-x-2">
                                                            <input type="checkbox" name="hemitorax[]" value="hemitorax_izquierdo"
                                                                @checked(in_array('hemitorax_izquierdo', $hemitorax ?? []))>
                                                            <span>Hemitórax Izquierdo</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>




                                             <!-- Control de Hemorragias -->
                                             <div class="mb-4">
                                                <h5 class="font-semibold">Control de Hemorragias:</h5>
                                                <select name="control_hemorragias" id="control_hemorragias">
                                                    <option value="presion_directa"
                                                    {{  ($phase9->control_hemorragias ?? '' ) === 'presion_directa' ?  'selected' : '' }}> Presión Directa</option>
                                                    <option value="torniquete"
                                                    {{  ($phase9->control_hemorragias ?? '' ) === 'torniquete' ?  'selected' : '' }}>Torniquete</option>
                                                    <option value="empaquetamiento"
                                                    {{  ($phase9->control_hemorragias ?? '' ) === 'empaquetamiento' ?  'selected' : '' }}>Empaquetamiento</option>
                                                    <option value="vendaje_compresivo"
                                                    {{  ($phase9->control_hemorragias ?? '' ) === 'vendaje_compresivo' ?  'selected' : '' }}>Vendaje Compresivo</option>
                                                </select>

                                            </div>



                                        </div>

                                        <div style="padding: 0 10px; width: 50%;">



                                            <!-- Vías Venosas -->
                                            <div class="mb-4">
                                                <h5 class="font-semibold">Vías Venosas:</h5>
                                                <div class="flex items-center space-x-4 mt-2">
                                                    <div class="flex items-center space-x-2">
                                                        <label for="linea_iv" class="font-semibold">Línea IV (#):</label>
                                                        <input type="number" id="linea_iv" name="vias_venosas[linea_iv]"
                                                            class="form-control border border-gray-400 rounded-md w-24"
                                                            value="{{ $vias_venosas['linea_iv'] ?? '' }}">
                                                    </div>
                                                    <div class="flex items-center space-x-2">
                                                        <label for="cateter" class="font-semibold">Catéter (#):</label>
                                                        <input type="number" id="cateter" name="vias_venosas[cateter]"
                                                            class="form-control border border-gray-400 rounded-md w-24"
                                                            value="{{ $vias_venosas['cateter'] ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>




                                           <!-- Sitio de Aplicación -->
                                           <div class="mb-4">
                                            <h5 class="font-semibold">Sitio de Aplicación:</h5>
                                            <select name="sitio_aplicacion" class="form-control w-full border border-gray-400 rounded-md">
                                                <option value="mano"
                                                {{  ($phase9->sitio_aplicacion ?? '' ) === 'mano' ?  'selected' : '' }}>Mano</option>
                                                <option value="pliegue_antecubital"
                                                {{  ($phase9->sitio_aplicacion ?? '' ) === 'pliegue_antecubital' ?  'selected' : '' }}>Pliegue Antecubital</option>
                                                <option value="intraosea"
                                                {{  ($phase9->sitio_aplicacion ?? '' ) === 'intraosea' ?  'selected' : '' }}>Intraósea</option>
                                                <option value="otra"
                                                {{  ($phase9->sitio_aplicacion ?? '' ) === 'otra' ?  'selected' : '' }}>Otra</option>
                                            </select>
                                        </div>

                                       <!-- Tipos de Soluciones -->
                                        <div class="mb-4">
                                            <h5 class="font-semibold">Tipos de Soluciones:</h5>
                                            <div class="grid grid-cols-2 gap-4 mt-2">
                                                <label class="flex items-center space-x-2">
                                                    <input type="checkbox" name="tipo_soluciones[]" value="hartmann"
                                                    {{ in_array('hartmann', $tipo_soluciones ?? []) ? 'checked' : '' }}>
                                                    <span>Hartmann</span>
                                                </label>
                                                <label class="flex items-center space-x-2">
                                                    <input type="checkbox" name="tipo_soluciones[]" value="nacl_09"
                                                    {{ in_array('nacl_09', $tipo_soluciones ?? []) ? 'checked' : '' }}>
                                                    <span>NaCl 0.9%</span>
                                                </label>
                                                <label class="flex items-center space-x-2">
                                                    <input type="checkbox" name="tipo_soluciones[]" value="mixta"
                                                    {{ in_array('mixta', $tipo_soluciones ?? []) ? 'checked' : '' }}>
                                                    <span>Mixta</span>
                                                </label>
                                                <label class="flex items-center space-x-2">
                                                    <input type="checkbox" name="tipo_soluciones[]" value="glucosa_5"
                                                    {{ in_array('glucosa_5', $tipo_soluciones ?? []) ? 'checked' : '' }}>
                                                    <span>Glucosa 5%</span>
                                                </label>
                                                <label class="flex items-center space-x-2">
                                                    <input type="checkbox" name="tipo_soluciones[]" value="otra"
                                                    {{ in_array('otra', $tipo_soluciones ?? []) ? 'checked' : '' }}>
                                                    <span>Otra</span>
                                                </label>
                                            </div>


                                            <h5 class="font-semibold">Especifique:</h5>
                                            <div class="flex flex-col md:flex-row md:space-x-4 mt-1">
                                                <div>
                                                    <label for="cantidad" class="font-semibold">Cantidad:</label>
                                                    <input type="text" id="cantidad" name="soluciones[cantidad]"
                                                        class="form-control border border-gray-400 rounded-md mt-1 w-full md:w-40"
                                                        value="{{ $soluciones['cantidad'] ?? '' }}">
                                                </div>
                                                <div>
                                                    <label for="infusiones" class="font-semibold">Infusiones:</label>
                                                    <input type="text" id="infusiones" name="soluciones[infusiones]"
                                                        class="form-control border border-gray-400 rounded-md mt-1 w-full md:w-40"
                                                        value="{{ $soluciones['infusiones'] ?? '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                    </div>


                                    <!-- Tabla para Manejo Farmacológico y Terapia Eléctrica -->
                                    <div class="mb-4">
                                        <h5 class="font-semibold">Registro de Medicamentos y Terapia Eléctrica:</h5>
                                        <table class="table-auto w-full border-collapse border border-gray-400">
                                            <thead>
                                                <tr class="bg-gray-200">
                                                    <th class="border border-gray-400 px-4 py-2">Hora</th>
                                                    <th class="border border-gray-400 px-4 py-2">Medicamento</th>
                                                    <th class="border border-gray-400 px-4 py-2">Dosis</th>
                                                    <th class="border border-gray-400 px-4 py-2">Vía de Administración</th>
                                                    <th class="border border-gray-400 px-4 py-2">Terapia Eléctrica</th>
                                                </tr>
                                            </thead>
                                            <tbody id="pharmaTableBody">
                                                @foreach($medicamentos_terapia as $index => $medicamento)
                                                <tr>
                                                    <td class="border border-gray-400 px-4 py-2">
                                                        <input type="time" name="medicamentos_terapia[{{ $index }}][hora]"
                                                            class="form-control w-full border border-gray-400 rounded-md"
                                                            value="{{ $medicamento['hora'] ?? '' }}">
                                                    </td>
                                                    <td class="border border-gray-400 px-4 py-2">
                                                        <input type="text" name="medicamentos_terapia[{{ $index }}][medicamento]"
                                                            class="form-control w-full border border-gray-400 rounded-md"
                                                            value="{{ $medicamento['medicamento'] ?? '' }}">
                                                    </td>
                                                    <td class="border border-gray-400 px-4 py-2">
                                                        <input type="number" name="medicamentos_terapia[{{ $index }}][dosis]"
                                                            class="form-control w-full border border-gray-400 rounded-md"
                                                            value="{{ $medicamento['dosis'] ?? '' }}">
                                                    </td>
                                                    <td class="border border-gray-400 px-4 py-2">
                                                        <select name="medicamentos_terapia[{{ $index }}][via_administracion]"
                                                        class="form-control w-full border border-gray-400 rounded-md">
                                                            <option value="">Seleccionar</option>
                                                            <option value="oral" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'oral') ? 'selected' : '' }}>Oral</option>
                                                            <option value="sublingual" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'sublingual') ? 'selected' : '' }}>Sublingual</option>
                                                            <option value="intravenosa" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'intravenosa') ? 'selected' : '' }}>Intravenosa</option>
                                                            <option value="intramuscular" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'intramuscular') ? 'selected' : '' }}>Intramuscular</option>
                                                            <option value="subcutanea" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'subcutanea') ? 'selected' : '' }}>Subcutánea</option>
                                                            <option value="intradermica" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'intradermica') ? 'selected' : '' }}>Intradérmica</option>
                                                            <option value="topica" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'topica') ? 'selected' : '' }}>Tópica</option>
                                                            <option value="rectal" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'rectal') ? 'selected' : '' }}>Rectal</option>
                                                            <option value="nasal" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'nasal') ? 'selected' : '' }}>Nasal</option>
                                                            <option value="oftalmica" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'oftalmica') ? 'selected' : '' }}>Oftálmica</option>
                                                            <option value="otica" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'otica') ? 'selected' : '' }}>Ótica</option>
                                                            <option value="vaginal" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'vaginal') ? 'selected' : '' }}>Vaginal</option>
                                                            <option value="bucal" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'bucal') ? 'selected' : '' }}>Bucal</option>
                                                        </select>
                                                    </td>
                                                    <td class="border border-gray-400 px-4 py-2">
                                                        <input type="text" name="medicamentos_terapia[{{ $index }}][terapia_electrica]"
                                                            class="form-control w-full border border-gray-400 rounded-md"
                                                            value="{{ $medicamento['terapia_electrica'] ?? '' }}">
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="flex justify-end mt-2">
                                            <button type="button"
                                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600"
                                                onclick="addPharmaRow()">Añadir Fila</button>
                                        </div>
                                    </div>

                                    <!-- Sección de RCP y Procedimientos -->
                                    <div class="mb-4">
                                        <h5 class="font-semibold">RCP y Procedimientos:</h5>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div class="border border-gray-400 p-2">
                                                <label>
                                                    <input type="checkbox" name="rcp_procedimientos[]" value="rcp_basica"
                                                    {{ in_array('rcp_basica', $rcp_procedimientos ?? []) ? 'checked' : '' }}>
                                                    RCP Básica
                                                </label>
                                            </div>
                                            <div class="border border-gray-400 p-2">
                                                <label>
                                                    <input type="checkbox" name="rcp_procedimientos[]" value="rcp_avanzada"
                                                    {{ in_array('rcp_avanzada', $rcp_procedimientos ?? []) ? 'checked' : '' }}>
                                                    RCP Avanzada
                                                </label>
                                            </div>
                                            <div class="border border-gray-400 p-2">
                                                <label>
                                                    <input type="checkbox" name="rcp_procedimientos[]" value="inmovilizacion"
                                                    {{ in_array('inmovilizacion', $rcp_procedimientos ?? []) ? 'checked' : '' }}>
                                                    Inmovilización de Extremidades
                                                </label>
                                            </div>
                                            <div class="border border-gray-400 p-2">
                                                <label>
                                                    <input type="checkbox" name="rcp_procedimientos[]" value="empaquetamiento"
                                                    {{ in_array('empaquetamiento', $rcp_procedimientos ?? []) ? 'checked' : '' }}>
                                                    Empaquetamiento
                                                </label>
                                            </div>
                                            <div class="border border-gray-400 p-2">
                                                <label>
                                                    <input type="checkbox" name="rcp_procedimientos[]" value="curacion"
                                                    {{ in_array('curacion', $rcp_procedimientos ?? []) ? 'checked' : '' }}>
                                                    Curación
                                                </label>
                                            </div>
                                            <div class="border border-gray-400 p-2">
                                                <label>
                                                    <input type="checkbox" name="rcp_procedimientos[]" value="vendaje"
                                                    {{ in_array('vendaje', $rcp_procedimientos ?? []) ? 'checked' : '' }}>
                                                    Vendaje
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <!-- Botón Registrar Atención -->
                            <div class="flex justify-center">
                                <button type="submit" id="btnGuardar"
                                    class="px-4 py-4 bg-blue-500 text-white font-medium rounded-lg shadow-md hover:bg-blue-600 transition">
                                    <i class="bi bi-check-circle"></i> Guardar Atención
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Campo oculto para almacenar la imagen -->
                    <input type="text" id="captura_imagen" name="captura_imagen">

                </form>
            </div>

            <script>


                function capturarZonaLesion() {
                    // Obtener los elementos necesarios
                    const divParaCapturar = document.getElementById("zonalesion");

                   // Sobrescribe el método de creación de canvas
                    HTMLCanvasElement.prototype.getContext = (function(original) {
                        return function(type, options) {
                            if (type === '2d') {
                                options = options || {};
                                options.willReadFrequently = true; // Establece la opción
                            }
                            return original.call(this, type, options);
                        };
                    })(HTMLCanvasElement.prototype.getContext);

                    // Llama a html2canvas como de costumbre
                    html2canvas(document.getElementById("zonalesion")).then(function(canvas) {
                        const imgData = canvas.toDataURL("image/png");
                        document.getElementById("captura_imagen").value = imgData;
                    });

                }



                 // Función para mostrar/ocultar el campo "Otro Lugar" dependiendo del valor seleccionado.

                function manejarLugarOcurrencia() {
                    // Referencias a los elementos del DOM
                    const lugar = document.getElementById('lugar_ocurrencia');
                    const otroLugarDiv = document.getElementById('otro_lugar');
                    const inputOtroLugar = document.getElementById('otro_lugar_input');

                    // Verificar si el valor seleccionado es 'otro'
                    if (lugar.value === 'otro') {
                        otroLugarDiv.style.display = 'block'; // Mostrar el campo "Otro Lugar"
                    } else {
                        otroLugarDiv.style.display = 'none'; // Ocultar el campo "Otro Lugar"
                        inputOtroLugar.value = ''; // Limpiar el valor del campo si está oculto
                    }
                }

                // Evento de cambio para el selector de lugar de ocurrencia
                document.getElementById('lugar_ocurrencia').addEventListener('change', manejarLugarOcurrencia);

                // Aplicar el estado inicial al cargar la página
                window.addEventListener('load', manejarLugarOcurrencia);


                document.getElementById('origen_probable').addEventListener('change', function() {
                    const btnphase6 = document.getElementById('btnphase6');
                    if (this.value === 'gineco_obstetrica') {
                        btnphase6.style.display = 'block';
                    } else {
                        btnphase6.style.display = 'none';
                    }
                });

                document.getElementById('asistencia_ventilatoria').addEventListener('change', function() {
                    const ventiladorOpciones = document.getElementById('ventilador_opciones');
                    if (this.value === 'ventilador_automatico') {
                    ventiladorOpciones.classList.remove('hidden');
                    } else {
                    ventiladorOpciones.classList.add('hidden');
                    }
                });

                // Referencias a los elementos del DOM
                const edadInput = document.getElementById('edad');
                const mesesContainer = document.getElementById('meses-container');
                const mesesInput = document.getElementById('meses');

                // Función para manejar la lógica de mostrar/ocultar el campo de meses
                function manejarEdadMeses() {
                    const edad = parseInt(edadInput.value, 10); // Convertir el valor a número entero

                    if (!isNaN(edad) && edad === 0) {
                        // Mostrar el campo de meses si la edad es exactamente 0
                        mesesContainer.style.display = 'block';
                    } else {
                        // Ocultar el campo de meses y limpiar su valor
                        mesesContainer.style.display = 'none';
                        mesesInput.value = ''; // Limpiar el valor del campo meses
                    }
                }

                // Asignar la misma función al evento 'change' y 'input'
                edadInput.addEventListener('input', manejarEdadMeses);
                edadInput.addEventListener('change', manejarEdadMeses);

                // Llamar a la función al cargar la página para aplicar el estado inicial
                window.onload = manejarEdadMeses;


                function agente_causal(){
                    const agentecausal = document.getElementById('agente_causal');
                    const especificarOtro = document.getElementById('especificar_otro');
                    if (agentecausal.value === '15') {
                        especificarOtro.style.display = 'block';
                    } else {
                        especificarOtro.style.display = 'none';
                    }
                }

                document.getElementById('agente_causal').addEventListener('change', agente_causal);

                // Aplicar el estado inicial al cargar la página
                window.addEventListener('load', agente_causal);

                function mostrarDetallesAccidente() {
                    // Obtener el valor seleccionado del tipo de accidente
                    var tipoAccidente = document.getElementById("tipo_accidente").value;

                    // Ocultar todos los divs de accidentes
                    var todosAccidentes = document.querySelectorAll('[id^="accidente_"]');
                    todosAccidentes.forEach(function(detalle) {
                        detalle.style.display = "none";
                    });

                    // Si se selecciona un tipo de accidente válido, mostrar los detalles correspondientes
                    if (tipoAccidente) {
                        var detallesSeleccionados = document.querySelectorAll('[id^="accidente_' + tipoAccidente + '"]');
                        detallesSeleccionados.forEach(function(detalle) {
                            detalle.style.display = "block";
                        });
                    }
                }

                function limpiarCamposAccidente() {
                    var tipoAccidente = document.getElementById("tipo_accidente").value;
                    // Crear un conjunto de IDs de los divs visibles para excluirlos de la limpieza
                    var todosAccidentes = document.querySelectorAll('[id^="accidente_"]');
                    var detallesSeleccionados = document.querySelectorAll('[id^="accidente_' + tipoAccidente + '"]');
                    const idsVisibles = new Set([...detallesSeleccionados].map(detalle => detalle.id));

                        // Limpiar los campos de los divs ocultos (no incluidos en los divs visibles)
                        todosAccidentes.forEach(detalle => {
                            if (!idsVisibles.has(detalle.id)) {
                                const campos = detalle.querySelectorAll("input, select, textarea");
                                campos.forEach(campo => {
                                    if (campo.type === "checkbox" || campo.type === "radio") {
                                        campo.checked = false; // Desmarcar checkboxes y radios
                                    } else {
                                        campo.value = ""; // Limpiar texto, select y otros inputs
                                    }
                                });
                            }
                        });
                }

            document.getElementById('tipo_accidente').addEventListener('change', () => {
                    mostrarDetallesAccidente();
                    limpiarCamposAccidente();
            });

                // Aplicar el estado inicial al cargar la página
                window.addEventListener('load', mostrarDetallesAccidente);


                function marcarZona(zona) {
                    const lista = document.getElementById('listaZonas');
                    const item = document.createElement('li');
                    item.textContent = zona;
                    lista.appendChild(item);
                }

                document.addEventListener('DOMContentLoaded', function() {
                    const buttons = document.querySelectorAll('.btn-nav');
                    const phases2 = document.querySelectorAll('.phase');

                    // Función para ocultar todas las fases
                    function hideAllPhases() {
                        phases2.forEach(phase => {
                            phase.style.display = 'none';
                        });
                    }

                    // Agregar evento a cada botón
                    buttons.forEach(button => {
                        button.addEventListener('click', function() {
                            const targetId = this.getAttribute(
                                'data-target'); // Obtener el ID de la fase objetivo
                            hideAllPhases();
                            document.getElementById(targetId).style.display =
                                'block'; // Mostrar la fase seleccionada
                        });
                    });
                });

                document.addEventListener('DOMContentLoaded', function() {
                    // Seleccionar todos los encabezados de secciones
                    const toggleSections = document.querySelectorAll('.toggle-section');

                    toggleSections.forEach(toggle => {
                        toggle.addEventListener('click', function() {
                            // Buscar el contenido de la sección asociada
                            const sectionContent = this.nextElementSibling;
                            const icon = this.querySelector('svg');

                            // Alternar la visibilidad del contenido
                            if (sectionContent.style.display === 'none' || !sectionContent.style.display) {
                                sectionContent.style.display = 'block';
                                icon.classList.add('rotate-180'); // Rotar el ícono
                            } else {
                                sectionContent.style.display = 'none';
                                icon.classList.remove('rotate-180'); // Restaurar la rotación
                            }
                        });
                    });
                });

                // Función para añadir una nueva fila a la tabla
                let rowCount = {{ count($medicamentos_terapia) }}; // Establecer el contador a la cantidad de filas actuales


                function addPharmaRow() {
                    const tableBody = document.getElementById("pharmaTableBody");

                    // Crear una nueva fila
                    const newRow = document.createElement("tr");

                    // Crear celdas de la nueva fila
                    newRow.innerHTML = `
                        <td class="border border-gray-400 px-4 py-2">
                            <input type="time" name="medicamentos_terapia[${rowCount}][hora]"
                                class="form-control w-full border border-gray-400 rounded-md">
                        </td>
                        <td class="border border-gray-400 px-4 py-2">
                            <input type="text" name="medicamentos_terapia[${rowCount}][medicamento]"
                                class="form-control w-full border border-gray-400 rounded-md">
                        </td>
                        <td class="border border-gray-400 px-4 py-2">
                            <input type="number" name="medicamentos_terapia[${rowCount}][dosis]"
                                class="form-control w-full border border-gray-400 rounded-md">
                        </td>
                        <td class="border border-gray-400 px-4 py-2">
                            <select name="medicamentos_terapia[{{ $index }}][via_administracion]"
                                                        class="form-control w-full border border-gray-400 rounded-md">
                                                            <option value="">Seleccionar</option>
                                                            <option value="oral" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'oral') ? 'selected' : '' }}>Oral</option>
                                                            <option value="sublingual" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'sublingual') ? 'selected' : '' }}>Sublingual</option>
                                                            <option value="intravenosa" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'intravenosa') ? 'selected' : '' }}>Intravenosa</option>
                                                            <option value="intramuscular" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'intramuscular') ? 'selected' : '' }}>Intramuscular</option>
                                                            <option value="subcutanea" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'subcutanea') ? 'selected' : '' }}>Subcutánea</option>
                                                            <option value="intradermica" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'intradermica') ? 'selected' : '' }}>Intradérmica</option>
                                                            <option value="topica" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'topica') ? 'selected' : '' }}>Tópica</option>
                                                            <option value="rectal" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'rectal') ? 'selected' : '' }}>Rectal</option>
                                                            <option value="nasal" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'nasal') ? 'selected' : '' }}>Nasal</option>
                                                            <option value="oftalmica" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'oftalmica') ? 'selected' : '' }}>Oftálmica</option>
                                                            <option value="otica" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'otica') ? 'selected' : '' }}>Ótica</option>
                                                            <option value="vaginal" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'vaginal') ? 'selected' : '' }}>Vaginal</option>
                                                            <option value="bucal" {{ (isset($medicamento['via_administracion']) && $medicamento['via_administracion'] === 'bucal') ? 'selected' : '' }}>Bucal</option>
                                                        </select>
                        </td>
                        <td class="border border-gray-400 px-4 py-2">
                            <input type="text" name="medicamentos_terapia[${rowCount}][terapia_electrica]"
                                class="form-control w-full border border-gray-400 rounded-md">
                        </td>
                    `;

                    // Agregar la nueva fila a la tabla
                    tableBody.appendChild(newRow);

                    // Incrementar el contador de filas
                    rowCount++;
                }

                //Fin función  para añadir una nueva fila a la tabla

                const canvas = document.getElementById('bodyCanvas');
                const ctx = canvas.getContext('2d');
                const listaZonas = document.getElementById('listaZonas');
                const coordinate = document.getElementById('coordinate');
                const zonaslabel = document.getElementById('zonaslabel');

                // Imagen del cuerpo humano
                const bodyImage = new Image();
                    bodyImage.src =
                    "{{ asset('images/cuerpo1.png') }}"; // Asegúrate de que la imagen esté en el mismo directorio o ajusta la ruta.
                const bodyImage2 = new Image();
                    bodyImage2.src = "{{ asset('images/cuerpo2.png') }}";
                // Puntos permitidos con coordenadas predefinidas

                const allowedPoints = [{
                        x: 100,
                        y: 20,
                        label: "Cabeza"
                    },
                    {
                        x: 60,
                        y: 90,
                        label: "Hombro Derecho"
                    },
                    {
                        x: 140,
                        y: 90,
                        label: "Hombro Izquierdo"
                    },
                    {
                        x: 45,
                        y: 160,
                        label: "Brazo Derecho"
                    },
                    {
                        x: 155,
                        y: 160,
                        label: "Brazo Izquierdo"
                    },
                    {
                        x: 100,
                        y: 105,
                        label: "Tórax"
                    },
                    {
                        x: 100,
                        y: 157,
                        label: "Abdomen"
                    },
                    {
                        x: 100,
                        y: 210,
                        label: "Genitales"
                    },
                    {
                        x: 85,
                        y: 300,
                        label: "Rodilla Derecha"
                    },
                    {
                        x: 115,
                        y: 300,
                        label: "Rodilla Izquierda"
                    },
                    {
                        x: 85,
                        y: 390,
                        label: "Pie Derecha"
                    },
                    {
                        x: 110,
                        y: 390,
                        label: "Pie Izquierda"
                    }
                ];

                const allowedPoints2 = [{
                        x: 300,
                        y: 50,
                        label: "Nuca"
                    },
                    {
                        x: 300,
                        y: 105,
                        label: "Espalda"
                    },
                    {
                        x: 300,
                        y: 160,
                        label: "Cadera"
                    },
                    {
                        x: 220,
                        y: 220,
                        label: "Mano Derecho"
                    },
                    {
                        x: 380,
                        y: 220,
                        label: "Mano Izquierdo"
                    },
                    {
                        x: 285,
                        y: 260,
                        label: "Muslo Derecha"
                    },
                    {
                        x: 320,
                        y: 260,
                        label: "Muslo Izquierda"
                    },
                    {
                        x: 285,
                        y: 330,
                        label: "Pantorilla Derecha"
                    },
                    {
                        x: 320,
                        y: 330,
                        label: "Pantorilla Izquierda"
                    },
                    {
                        x: 85,
                        y: 390,
                        label: "Pie Derecha"
                    },
                    {
                        x: 110,
                        y: 390,
                        label: "Pie Izquierda"
                    },
                ];

                const marks = []; // Almacena las marcas realizadas
                const coordenadas = [];
                const zonas = [];

                // Dibujar la imagen del cuerpo humano en el canvas
                bodyImage.onload = function() {
                    ctx.drawImage(bodyImage, 0, 0, 200, canvas.height);
                    allowedPoints.forEach(point => {
                        drawCircle(point.x, point.y);
                    });
                };

                bodyImage2.onload = function() {
                    ctx.drawImage(bodyImage2, 200, 0, 200, canvas.height);
                    allowedPoints2.forEach(point => {
                        drawCircle(point.x, point.y);
                    });
                };

                // Dibujar una marca en un punto permitido
                function drawMark(x, y) {
                    ctx.beginPath();
                    ctx.arc(x, y, 7, 0, Math.PI * 2); // Círculo con radio 5
                    ctx.fillStyle = 'red';
                    ctx.fill();
                    ctx.strokeStyle = 'white';
                    ctx.lineWidth = 2;
                    ctx.stroke();
                }

                function dropMark(x, y) {
                    ctx.beginPath();
                    ctx.arc(x, y, 8, 0, Math.PI * 2); // Círculo con radio 5
                    ctx.fillStyle = 'white';
                    ctx.fill();
                    ctx.strokeStyle = 'black';
                    ctx.lineWidth = 2;
                    ctx.stroke();
                }

                function drawCircle(x, y) {
                    ctx.beginPath();
                    ctx.arc(x, y, 8, 0, Math.PI * 2); // Círculo con radio 5
                    ctx.strokeStyle = 'black';
                    ctx.lineWidth = 2;
                    ctx.stroke();
                }

                // Actualizar la lista de puntos marcados

                function actualizarMarcas() {


                    listaZonas.innerHTML = '';
                    coordinate.value = '';
                    zonaslabel.value = ''

                    // Simulación de datos obtenidos de la base de datos
                    const coordenadasBD = "{{ $phase8_zona->coordinate }}";
                    const zonasBD = "{{ $phase8_zona->zona }}";

                    // Convertir coordenadas y zonas de cadena a arrays
                    const coordenadasArray = coordenadasBD.split(' | ').map(coord => {
                        const [x, y] = coord.replace(/[()]/g, '').split(',').map(Number);
                        return { x, y };
                    });

                    const zonasArray = zonasBD.split(' | ');

                    // Combinar coordenadas y zonas en objetos de marcas y eliminar las vacías
                    const nuevasMarcas = coordenadasArray.map((coord, index) => ({
                        ...coord,
                        label: zonasArray[index]?.trim() || ''
                    })).filter(marca => marca.label !== '');

                    // Evitar duplicados y eliminar marcas que no deberían estar
                    const marcasExistentes = new Set(marks.map(mark => `${mark.x},${mark.y},${mark.label}`));

                    nuevasMarcas.forEach(nuevaMarca => {
                        const marcaClave = `${nuevaMarca.x},${nuevaMarca.y},${nuevaMarca.label}`;

                        if (!marcasExistentes.has(marcaClave)) {
                            marks.push(nuevaMarca);
                            marcasExistentes.add(marcaClave);


                        }
                    });

                    // Actualizar la interfaz con las marcas y eliminar marcas innecesarias
                    marks.forEach((mark, index) => {
                        if (mark.label) { // Asegurarse de que no se agreguen zonas vacías
                            const item = document.createElement('li');
                            coordenadas.push(`(${mark.x}, ${mark.y})`);
                            zonas.push(mark.label);
                            item.textContent = `Zona ${index + 1}: ${mark.label}`;
                            listaZonas.appendChild(item);
                        }
                    });

                    // Actualizar los campos de texto con los datos procesados
                    coordinate.value = coordenadas.join(' | ');
                    zonaslabel.value = zonas.join(' | ');

                    // Eliminar marcas vacías del arreglo `marks`
                    marks = marks.filter(mark => mark.label !== '');
                }



                // Manejar clics en el canvas
                canvas.addEventListener('click', function(event) {
                    const rect = canvas.getBoundingClientRect();
                    const x = event.clientX - rect.left; // Coordenada X relativa
                    const y = event.clientY - rect.top; // Coordenada Y relativa

                    // Buscar si el clic está cerca de algún punto permitido
                    const clickedPoint = allowedPoints.find(
                        point => Math.sqrt((point.x - x) ** 2 + (point.y - y) ** 2) <= 10
                    );

                    const clickedPoint2 = allowedPoints2.find(
                        point => Math.sqrt((point.x - x) ** 2 + (point.y - y) ** 2) <= 10
                    );

                    if (clickedPoint) {
                        // Verificar si ya está marcado
                        const existingMarkIndex = marks.findIndex(mark => mark.x === clickedPoint.x && mark.y ===
                            clickedPoint.y);

                        if (existingMarkIndex !== -1) {
                            // Si ya está marcado, quitar la marca
                            dropMark(clickedPoint.x, clickedPoint.y);
                            marks.splice(clickedPoint, 1);
                            coordenadas.splice(clickedPoint,1);
                            zonas.splice(clickedPoint,1);
                        } else {
                            // Si no está marcado, agregar la marca
                            marks.push(clickedPoint);
                            drawMark(clickedPoint.x, clickedPoint.y);
                            capturarZonaLesion();
                        }
                        actualizarMarcas(); // Actualizar la lista de zonas
                    }

                    if (clickedPoint2) {
                        // Verificar si ya está marcado
                        const existingMarkIndex = marks.findIndex(mark => mark.x === clickedPoint2.x && mark.y ===
                            clickedPoint2.y);

                        if (existingMarkIndex !== -1) {
                            // Si ya está marcado, quitar la marca
                            dropMark(clickedPoint2.x, clickedPoint2.y);
                            marks.splice(clickedPoint2, 1);
                        } else {
                            // Si no está marcado, agregar la marca
                            marks.push(clickedPoint2);
                            drawMark(clickedPoint2.x, clickedPoint2.y);
                            capturarZonaLesion();
                        }
                        actualizarMarcas(); // Actualizar la lista de zonas

                    }
                });
                window.addEventListener('load', actualizarMarcas);



            </script>
        </main>
    </div>

    @livewireScripts
</body>

</html>
