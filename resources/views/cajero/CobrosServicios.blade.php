<style>
    :root {
        --primary-color: #007bff;
        --hover-color: #0056b3;
        --text-color: #fff;
        --background-color: #f4f4f4;
    }

    main {
        display: flex;
        justify-content: center;
        width: auto;
        height: 100%;
    }

    /* Css Menu de opciones Aside*/
    aside {
        width: 16%;
        background-color: var(--background-color);
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
        background-color: var(--primary-color);
        color: var(--text-color);
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s, padding 0.3s;
        justify-content: center;
    }

    .collapse-btn {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: transparent;
        border: none;
        font-size: 20px;
        cursor: pointer;
        color: var(--primary-color);
        transition: color 0.3s;
    }

    .collapse-btn:hover {
        color: var(--hover-color);
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

    /* Estilos para la parte central */
    .central {
        width: auto;
        padding: 0 20px;
        flex: 1;
        box-sizing: border-box;
        display: flex;
        justify-content: center;
        text-align: center;
    }

    #panelCentral {
        flex: 1;
        box-sizing: border-box;
        display: flex;
        justify-content: center;
        text-align: center;
        font-size: 2rem;
        font-style: italic;
        font-weight: bold;
        color: var(--primary-color);
        margin: 20px 0;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    /* Estilos para la parte derecha */
    .derecha {
        width: auto;
        display: flex;
        padding: 0;
        margin: 0;
    }

    #MenuDatos {
        padding: 15px;
        overflow-x: auto;
        overflow-y: auto;
        width: auto;
        max-height: 100vh;
        box-sizing: border-box;
        scrollbar-width: thin;
        scrollbar-color: #888 #f0f0f0;
    }

    .btnOcultar {
        border-right: 2px solid #6c757d;
        padding: 5px;
    }

    .derecha .btnOcultar {
        height: 100vh;
        align-items: center;
        align-content: center;
        justify-content: center;
        width: auto;
    }



    .tratamientoModal .modal-content {
        max-width: 700px;
    }

    .facturasolicitud .modal-content {
        max-width: 500px;
    }

    .modalinfoCobro .modal-content {
        max-width: 600px;
    }
    .modalSolicitudFactura .modal-content{
        max-width: 500px;
    }

    .facturasolicitud .Modal-bodyAjustable {
        height: 60vh;
        overflow: auto;
    }

    .cobrodeServicios .modal-content {
        max-width: 800px;
    }

    .cobrodeServicios .ServiciosPaneles {
        height: 70vh;
        overflow: auto;
    }


    /* Estilos personalizados adicionales */
    .form-group label {
        font-weight: bold;
        color: #34495e;
        margin-bottom: 5px;
    }

    .form-group input {
        border-radius: 5px;
        padding: 10px;
        border: 1px solid #b1b0b0;
        width: 100%;
    }

    /* CSS DE LISTA SERVICIOS */

    .central #listaServiciosPanel {
        margin: 20px;
    }

    .central #listaServiciosPanel h1 {
        color: #f04628;
        font-weight: 800;
        font-size: 2em;
    }

    .central #listaServiciosPanel h2 {
        font-size: 1em;
        margin-bottom: 20px;
    }

    #serviciosContainer {
        display: flex;
        flex-direction: column;
        gap: 15px;
        width: 80%;
        margin: auto;
        text-align: center;
        font-family: Arial, sans-serif;
    }

    .panelServicios {
        height: 100%;
        max-height: 70vh;
        overflow-y: auto;
    }

    .servicio-item {
        background: linear-gradient(135deg, #1a73e8 0%, #4285f4 100%);
        padding: 20px;
        border-radius: 12px;
        width: 100%;
        max-width: 700px;
        margin: auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        color: #ffffff;
        transition: transform 0.12s ease, box-shadow 0.12s ease;
        cursor: pointer;
    }

    .servicio-item:hover {
        transform: scale(1.02);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    /* Animación de clic ajustada */
    .servicio-item:active {
        transform: scale(0.99);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.25);
        background: linear-gradient(135deg, #1a73e8 0%, #2a6bd8 100%);
    }

    /* Header de cada servicio */
    .servicio-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
    }

    .servicio-header h3 {
        font-size: 1.3em;
        margin: 0;
        font-weight: bold;
    }

    .costo {
        font-weight: bold;
        color: #ffeb3b;
        font-size: 1em;
    }

    /* Detalles del servicio */
    .servicio-detalle {
        display: none;
        margin-top: 15px;
        padding: 15px;
        background-color: rgba(255, 255, 255, 0.15);
        border-radius: 8px;
        color: #f1f1f1;
        animation: fadeIn 0.3s ease-in-out;
    }

    /* Icono de servicio */
    .servicio-icono {
        font-size: 2em;
        color: #ffeb3b;
        margin-right: 10px;
    }

    /* CSS TABLA FACTURAS */
    .facturasContainer {
        margin-top: 20px;
        overflow-x: auto;
        /* Permite desplazamiento horizontal si es necesario */
    }

    .central #facturasPanel h1 {
        color: #f04628;
        font-weight: 800;
        font-size: 2em;
    }

    .central #facturasPanel h2 {
        font-size: 1em;
        margin-bottom: 20px;
    }


    .facturasTable {
        width: 100%;
        border-collapse: collapse;
        margin: 10px 0;
        font-family: Arial, sans-serif;
    }

    .facturasTable th,
    .facturasTable td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    .facturasTable th {
        background-color: #1a73e8;
        color: white;
        font-weight: bold;
    }

    .facturasTable tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .facturasTable tr:hover {
        background-color: #ddd;
    }

    .btn {
        padding: 10px 15px;
        margin: 5px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .ver-btn {
        background-color: #007bff;
        /* Color verde */
        color: white;
    }

    .descargar-btn {
        background-color: #f32121;
        /* Color azul */
        color: white;
    }

    .btn:hover {
        opacity: 0.7;
        /* Efecto de opacidad al pasar el ratón */
    }

    /* CSS TABLA COBROS */

    .cobros-container {
        margin-top: 20px;
    }

    .central #cobrosPanel h1 {
        color: #f04628;
        font-weight: 800;
        font-size: 2em;
    }

    .central #cobrosPanel h2 {
        font-size: 1em;
        margin-bottom: 20px;
    }

    .cobros-form {
        margin-bottom: 20px;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .btn-submit {
        background-color: #007bff;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color: #0056b3;
    }

    .cobros-historial {
        margin-top: 30px;
        max-height: 70vh;
        overflow: auto;
    }

    .cobros-historial .table thead {
        background-color: #007bff;
        color: white;
    }

    .cobros-historial .table th,
    .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .cobros-historial .cobros-table tbody tr:hover {
        background-color: #f1f1f1;
    }

    .cobros-historial .form-group {
        text-align: left;
    }

    .cobros-historial .DatosPaciente {
        text-align: left;
        margin-bottom: 5px;
    }


    @media (max-width: 768px) {

        .cobros-table th,
        .cobros-table td {
            font-size: 12px;
            padding: 10px 8px;
        }
    }

      /* Estilos para la tabla con tema azul */
      .table-blue {
        width: 100%;
        border-collapse: collapse;
    }

    .table-blue th,
    .table-blue td {
        border: 1px solid #007bff;
        padding: 8px;
        text-align: center;
    }

    .table-blue thead {
        background-color: #007bff;
        color: #ffffff;
    }

    .table-blue tbody tr:nth-child(even) {
        background-color: #e7f1ff;
    }

    .table-blue tbody tr:hover {
        background-color: #d1e7fd;
    }


</style>

<link rel="stylesheet" href="{{ asset('css/component/modal.css') }}">

    @if (session('success'))
        <div id="successNotification" class="notification alert alert-success alert-dismissible fade show" role="alert"
            style="position: fixed; top: 20px; right: 20px; width: 300px; z-index: 1050;
        background-color: #4CAF50; color: white; border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); padding: 20px; padding-top: 30px; text-align: center;">
            <a type="button" class="btn-close" href=""
                style="position: absolute; top: 10px; right: 10px; font-size: 22px; color: white;
        text-decoration: none; opacity: 0.8;">
                &times;</a>
            <strong>Éxito!</strong> {{ session('success') }}
        </div>
        <script>
            // Oculta la notificación después de 5 segundos (5000 ms)
            setTimeout(() => {
                const notification = document.getElementById('successNotification');
                if (notification) {
                    notification.style.transition = "opacity 0.5s ease";
                    notification.style.opacity = "0"; // Transición de desvanecimiento
                    setTimeout(() => notification.remove(), 500); // Elimina el elemento tras la transición
                }
            }, 3000);
        </script>
    @endif

    @if (session('error'))
        <div id="successNotification" class="notification alert alert-error alert-dismissible fade show" role="alert"
            style="position: fixed; top: 20px; right: 20px; width: 300px; z-index: 1050;
        background-color: #f63737; color: white; border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); padding: 20px; padding-top: 30px; text-align: center;">
            <a type="button" class="btn-close" href=""
                style="position: absolute; top: 10px; right: 10px; font-size: 22px; color: white;
        text-decoration: none; opacity: 0.8;">
                &times;</a>
            <strong>Error!</strong> {{ session('error') }}
        </div>
        <script>
            // Oculta la notificación después de 5 segundos (5000 ms)
            setTimeout(() => {
                const notification = document.getElementById('successNotification');
                if (notification) {
                    notification.style.transition = "opacity 0.5s ease";
                    notification.style.opacity = "0"; // Transición de desvanecimiento
                    setTimeout(() => notification.remove(), 500); // Elimina el elemento tras la transición
                }
            }, 3000);
        </script>
    @endif

<aside id="aside">
    <div class="toggle" onclick="toggleMenu()">
        <span class="icon" id="icon">←</span>
    </div>
    <ul id="menu" class="collapsed">
        <li>
            <a class="btn" href="/cajero" id="home">
                <span class="icon">🏠</span>
                <span class="text" style="font-weight: bold;">Home</span>
            </a>
        </li>
        <li>
            <a class="btn" href="#" id="cobrosBtn" onclick="showPanel('cobrosPanel')">
                <span class="icon">💸</span>
                <span class="text" style="font-weight: bold;">Cobros</span>
            </a>
        </li>
        <li>
            <a class="btn" href="#" id="listaServiciosBtn" onclick="showPanel('listaServiciosPanel')">
                <span class="icon">📋</span>
                <span class="text" style="font-weight: bold;">Lista Servicios</span>
            </a>
        </li>
        <li>
            <a class="btn" href="#" id="facturasBtn" onclick="showPanel('facturasPanel')">
                <span class="icon">🧾</span>
                <span class="text" style="font-weight: bold;">Facturas</span>
            </a>
        </li>
        <li>
            <a class="btn" href="#" id="facturasBtn" onclick="showPanel('facturasPanel')">
                <span class="icon">🧾</span>
                <span class="text" style="font-weight: bold;">Cobros de Servicios</span>
            </a>
        </li>


    </ul>
</aside>

<div class="central">

    <div id="panelCentral" class="panelCentral">
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
        <h1 style="margin: 0; text-align: center;">SISTEMA DE CAJA DE COBRO</h1>
        <h3 style="margin: 0; text-align: center; font-size: 25px;">DE LA </h3>
        <h2 style="margin: 0; text-align: center; font-size: 27px;">CRUZ ROJA MEXICANA DELEGACIÓN CHILPANCINGO</h2>
    </div>

    <div id="listaServiciosPanel" class="panelCentral" style="display: none;">
        <h1>Servicios Disponibles en la Cruz Roja</h1>
        <h2>Explora los servicios que ofrecemos y consulta los detalles que necesites.</h2>

        <div class="panelServicios">
            <div id="serviciosContainer">
                {{-- Se asume que 'servicios' es una colección de servicios obtenidos del modelo --}}
                @foreach ($servicios as $servicio)
                    <div class="servicio-item" onclick="toggleServicioDetalle('detalle{{ $servicio->id }}')">
                        <div class="servicio-header">
                            <span class="servicio-icono">{{ $servicio->icono }}</span>
                            <h3>{{ $servicio->nombre }}</h3>
                            <p>Costo: <span class="costo">{{ $servicio->costo }}</span></p>
                        </div>
                        <div id="detalle{{ $servicio->id }}" class="servicio-detalle" style="display: none;">
                            <p>{{ $servicio->descripcion }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



                                <div class="modal cobrosServicios" id="cobrodeServicios">
                                    <div class="modal-content" >
                                        <!-- Modal Header -->
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="tratamientoModalLabel-{{ $receta->id }}">
                                                Cobro de Servicios del Paciente: {{ $receta->paciente->nombre }}
                                            </h5>
                                            <a type="button" class="close text-white" data-id="{{ $receta->id }}"
                                                aria-label="Close" href="#">
                                                <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>

                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <!-- Formulario de Cobro -->
                                            <form action="{{ route('cajero.cobros.store', $receta->id) }}" method="POST">
                                                @csrf

                                                <div class="ServiciosPaneles"
                                                    style=" justify-content: space-between; margin-top: 10px;">
                                                    <div class="Panel IzquieroCobro">
                                                        @php
                                                            $totalMedicamentos = 0.0;
                                                            $totalMaterial = 0.0;
                                                            $totalServicio = 0.0;
                                                        @endphp

                                                        <div style="display: flex;">

                                                            <div style="width: 50%; margin-right: 10px;">
                                                                <!-- Información del Paciente -->
                                                                <div class="form-group">
                                                                    <div class="paciente-info mb-4"
                                                                        style="border-top: 1px solid #ddd; padding-top: 15px;">
                                                                        <h5>Información del Paciente</h5>
                                                                        <input type="hidden" id="paciente_id" name="paciente_id"
                                                                            value="{{ $receta->paciente->id }}">

                                                                        <input type="hidden" id="receta_id" name="receta_id"
                                                                            value="{{ $receta->id }}">
                                                                        <p><strong>Paciente:</strong> {{ $receta->paciente->nombre }}
                                                                            {{ $receta->paciente->apellidopaterno }}
                                                                            {{ $receta->paciente->apellidomaterno }}</p>
                                                                        <p><strong>Edad:</strong> {{ $receta->paciente->edad }}</p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="nombre">Nombre del DerechoHabiente:</label>
                                                                    <input type="text" name="nombre" id="nombre" class="form-control"
                                                                        placeholder="Ingrese el nombre del cobro" required>
                                                                </div>

                                                                <!-- Información del Servicio -->
                                                                <div class="form-group">
                                                                    <div class="servicio-info mb-4"
                                                                        style="border-top: 1px solid #ddd; padding-top: 15px;">
                                                                        <h5>Detalles del Servicio</h5>
                                                                        <select name="servicio" id="servicio-{{ $receta->id }}"
                                                                            class="form-control" required
                                                                            onchange="actualizarCosto({{ $receta->id }})">
                                                                            <option value="" selected disabled>Seleccione una opción
                                                                            </option>
                                                                            @foreach ($servicios as $servicio)
                                                                                <option value="{{ $servicio->id }}"
                                                                                    data-costo="{{ $servicio->costo }}">
                                                                                    {{ $servicio->nombre }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <p><strong>Fecha del Servicio:</strong>
                                                                            {{ \Carbon\Carbon::parse($receta->fecha)->format('d/m/Y') }}</p>
                                                                        <p><strong>Costo Estimado:</strong> <span
                                                                                id="costo-{{ $receta->id }}">{{ $servicio->costo ?? '0.00' }}</span>
                                                                        </p>

                                                                        <input type="hidden" name="costo2" id="costo2-{{ $receta->id }}"
                                                                            value="{{ $servicio->costo }}" step="0.01" />
                                                                    </div>
                                                                </div>

                                                                <!-- Monto Total -->
                                                                <div class="form-group">
                                                                    <label for="montotext">Monto Total:</label>
                                                                    <input type="text" name="monto" id="monto-{{ $receta->id }}"
                                                                        class="form-control" value="0.0" step="0.01" readonly required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="fecha">Fecha del Cobro:</label>
                                                                    <input type="date" name="fecha" id="fecha" class="form-control"
                                                                        value="{{ date('Y-m-d') }}" required>
                                                                </div>

                                                                <div
                                                                    style="margin-left: 20px; display: flex; justify-content: space-between; align-items: center; padding-right: 10px; width: 100%;">
                                                                    <label for="facturacion">Facturación</label>
                                                                    <input type="checkbox" name="facturacion"
                                                                        id="facturacion-{{ $receta->id }}"
                                                                        onclick="toggleFacturacion({{ $receta->id }})">
                                                                </div>

                                                            </div>

                                                            <div style="width: 50%;">


                                                                {{-- <!-- Información del Tratamiento -->
                                                                <div class="form-group">
                                                                    <div class="tratamiento-container mb-4"
                                                                        style="border-top: 1px solid #ddd; padding-top: 15px;">
                                                                        <h5>Tratamiento</h5>
                                                                        @if (!empty($receta->tratamiento))
                                                                        @foreach ($receta->tratamiento as $medicamento)
                                                                            <p style="line-height: 1.6; font-size: 16px; color: #34495e;">
                                                                                {{ $medicamento }}
                                                                            </p>
                                                                            @endforeach
                                                                        @else
                                                                            <p style="font-style: italic; color: #7f8c8d;">No se ha
                                                                                especificado ningún tratamiento.</p>
                                                                        @endif
                                                                    </div>
                                                                </div> --}}



                                                                <!-- Medicamentos Surtidos -->
                                                                <div class="form-group">
                                                                    <div class="medicamentos-surtidos mb-4"
                                                                        style="border-top: 1px solid #ddd; padding-top: 15px;">

                                                                        <div>
                                                                                    @php
                                                                                        $recetasFiltradas = $recetasSurtidas->filter(function ($recetaSurtida) use ($receta) {
                                                                                            return $recetaSurtida->receta_id == $receta->id;
                                                                                        });

                                                                                    @endphp
                                                                                    @if ($recetasFiltradas->isNotEmpty())
                                                                                    <table class="table table-blue">
                                                                                        <thead class="thead-light">
                                                                                            <tr>
                                                                                                <th colspan="4">Medicamentos Surtidos</th>
                                                                                            </tr>

                                                                                        </thead>
                                                                                        <thead class="thead-light">
                                                                                            <tr>
                                                                                                <td>Medicamento</td>
                                                                                                <td>Cantidad</td>
                                                                                                <td>Precio</td>
                                                                                                <td>Total</td>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody >
                                                                                        @foreach ($recetasSurtidas as $recetaSurtida)
                                                                                            @if ($recetaSurtida->receta_id == $receta->id && !empty($recetaSurtida))
                                                                                                @php
                                                                                                    $subtotal =
                                                                                                        $recetaSurtida->cantidad *
                                                                                                        $recetaSurtida->medicamento->precio;
                                                                                                    $totalMedicamentos += $subtotal;
                                                                                                @endphp

                                                                                                <tr >
                                                                                                    <td style="text-align: left;">{{ $recetaSurtida->medicamento->nombre }}
                                                                                                    </td>
                                                                                                    <td style="text-align: center;">{{ $recetaSurtida->cantidad }}</td>
                                                                                                    <td style="text-align: center;">${{ number_format($recetaSurtida->medicamento->precio, 2) }}
                                                                                                    </td>
                                                                                                    <td style="text-align: center;">${{ number_format($subtotal, 2) }}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    @else
                                                                                        <tr>
                                                                                            <th style="text-align: center;">
                                                                                                Ningún Medicamento Surtido
                                                                                            </th>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                    @endif

                                                                        </div>
                                                                        <div

                                                                            style="display: flex; padding: 10px; justify-content: right; margin-right: 20px;">

                                                                            <table class="table" style="width: 100%;">
                                                                                <thead>
                                                                                <tr style="border-top: 2px solid #ddd;">
                                                                                    <!-- Primera columna -->
                                                                                    <th colspan="2"></th>
                                                                                    <!-- Segunda columna: Título del total -->
                                                                                    <th style="text-align: left; padding: 8px; font-weight: bold;">Total:</th>
                                                                                    <!-- Tercera columna: Espaciador o contenido adicional si necesario -->
                                                                                    <td style="text-align: center; padding: 8px;"></td>
                                                                                    <!-- Cuarta columna: Total en formato numérico -->
                                                                                    <td style="text-align: right; padding: 8px; font-weight: bold;">
                                                                                        ${{ number_format($totalMedicamentos, 2) }}
                                                                                        <input type="hidden" name="totalMedicamentos" id="MedicamentosTotal-{{ $receta->id }}" value="{{ $totalMedicamentos }}">
                                                                                    </td>
                                                                                </tr>
                                                                            </thead>
                                                                            </table>



                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <table class="table table-blue">
                                                                        <thead class="thead-light">
                                                                            <tr>
                                                                                <th colspan="4">Material Utilizado</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <thead class="thead-light">
                                                                            <tr>
                                                                                <th>Nombre</th>
                                                                                <th>Cantidad</th>
                                                                                <th>Precio</th>
                                                                                <th>Total</th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody >

                                                                            @foreach ($receta->material as $material )
                                                                                @if (!empty($material))
                                                                                    @foreach ($inventarioMedico as $materialMedico)

                                                                                            @if ($material['nombre'] === $materialMedico->nombre)
                                                                                                @php
                                                                                                    $subtotalMaterial =
                                                                                                    $material['cantidad'] *
                                                                                                    $materialMedico->precio;
                                                                                                    $totalMaterial += $subtotalMaterial;
                                                                                                @endphp

                                                                                                <tr>
                                                                                                    <td style="text-align: left;">
                                                                                                        {{$material['nombre']}}
                                                                                                    </td>
                                                                                                    <td style="text-align: center;">
                                                                                                        {{number_format($material['cantidad'])}}
                                                                                                    </td>
                                                                                                    <td style="text-align: center;">
                                                                                                        $ {{number_format($materialMedico->precio)}}
                                                                                                    </td style="text-align: center;">
                                                                                                    <td>  ${{ number_format($material['cantidad'] * $materialMedico->precio)}}</td>
                                                                                                </tr>
                                                                                            @endif

                                                                                    @endforeach
                                                                                @else
                                                                                    <tr>
                                                                                        <th style="text-align: center;">
                                                                                            Ningún Material Utilizado
                                                                                        </th>
                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach
                                                                        </tbody >
                                                                    </table>

                                                                    <table class="table" style="width: 100%;">
                                                                        <thead>
                                                                            <tr style="border-top: 2px solid #ddd;">
                                                                                <!-- Primera columna -->
                                                                                <th colspan="2"></th>
                                                                                <!-- Segunda columna: Título del total -->
                                                                                <th style="text-align: left; padding: 8px; font-weight: bold;">Total:</th>
                                                                                <!-- Tercera columna: Espaciador o contenido adicional si necesario -->
                                                                                <td style="text-align: center; padding: 8px;"></td>
                                                                                <!-- Cuarta columna: Total en formato numérico -->
                                                                                <td style="text-align: right; padding: 8px; font-weight: bold;">
                                                                                    ${{ number_format($totalMaterial, 2) }}
                                                                                    <input type="hidden" name="totalMaterial" id="materialTotal-{{$receta->id}}" value="{{ $totalMaterial }}">
                                                                                </td>
                                                                            </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Contenedor para los datos de facturación -->
                                                    <div id="datosFacturacion-{{ $receta->id }}"
                                                        style="display: none; margin-top: 40px; ">
                                                        <!-- Nombre del Cliente -->
                                                        <h2
                                                            style="width: 100%; font-size: 20px; text-align: center; font-weight: 700; box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2); margin-bottom: 20px;  ">
                                                            Datos de Factura</h2>
                                                        <div class="form-group">
                                                            <label for="nombreCliente">Nombre del Facturador</label>
                                                            <input type="text" class="form-control" id="nombreCliente"
                                                                name="nombreCliente">
                                                        </div>
                                                        <!-- RFC -->
                                                        <div class="form-group">
                                                            <label for="rfcCliente">RFC</label>
                                                            <input type="text" class="form-control" id="rfcCliente"
                                                                name="rfcCliente">
                                                        </div>
                                                        <!-- Dirección -->
                                                        <div class="form-group">
                                                            <label for="direccionCliente">Dirección</label>
                                                            <input type="text" class="form-control" id="direccionCliente"
                                                                name="direccionCliente">
                                                        </div>

                                                        <!-- Correo Electrónico -->
                                                        <div class="form-group">
                                                            <label for="emailCliente">Correo Electrónico</label>
                                                            <input type="email" class="form-control" id="emailCliente"
                                                                name="emailCliente">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="telefono">Telefono</label>
                                                            <input type="telefono" class="form-control" id="telefono"
                                                                name="telefono">
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- Modal Footer Buttons -->
                                                <div class="modal-footer mt-4">
                                                    <button type="submit" class="btn btn-success">Confirmar y Cobrar</button>
                                                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

</div>




<script>
    var btntogglerecetas = document.getElementById('toggle-recetas');
    var menuDatos = document.getElementById('MenuDatos');
    var derecha = document.querySelectorAll('.derecha');
    var ServicioTotal = 0;

    document.getElementById("menu").style.display = 'block';

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

    btntogglerecetas.addEventListener('click', function() {
        var recetasContainer = document.getElementById('recetas-container');
        if (recetasContainer.style.width > '4%') {
            recetasContainer.style.width = '4%';
            btntogglerecetas.innerHTML = "<";
            menuDatos.style.display = 'none';
        } else {
            recetasContainer.style.width = 'auto';
            btntogglerecetas.innerHTML = ">";
            menuDatos.style.display = 'block';
        }
    });

    function toggleRecetaDetails(recetaId) {
        var details = document.getElementById('recetaDetails-' + recetaId);
        if (details.style.display === 'none') {
            details.style.display = 'block';
        } else {
            details.style.display = 'none';
        }
    }

    function showPanel(panelId) {
        var panels = document.querySelectorAll('.panelCentral');
        panels.forEach(panel => panel.style.display = 'none');

        document.getElementById(panelId).style.display = 'block';
    }

    function toggleServicioDetalle(detalleId) {
        const detalle = document.getElementById(detalleId);
        if (detalle.style.display === "none") {
            detalle.style.display = "block"; // Muestra el detalle
        } else {
            detalle.style.display = "none"; // Oculta el detalle
        }
    }


    function actualizarCosto(recetaId) {
        // Obtener el select y la opción seleccionada
        const select = document.getElementById(`servicio-${recetaId}`);
        const selectedOption = select.options[select.selectedIndex];
        const costoServicio = parseFloat(selectedOption.getAttribute('data-costo')) || 0.0;

        // Obtener el valor de MedicamentosTotal específico para esta receta
        const valorMedicamentos = parseFloat(document.getElementById(`MedicamentosTotal-${recetaId}`).value) || 0.0;
        const valorMaterial = parseFloat(document.getElementById(`materialTotal-${recetaId}`).value) || 0.0;

        // Calcular el monto total
        const montoTotal = valorMedicamentos + costoServicio + valorMaterial;

        // Actualizar el campo monto correspondiente a esta receta
        document.getElementById(`monto-${recetaId}`).value = montoTotal.toFixed(2);
        document.getElementById(`costo-${recetaId}`).innerHTML = costoServicio;
        document.getElementById(`costo2-${recetaId}`).value = costoServicio;

        console.log("Costo Servicio: " + costoServicio + " | Medicamentos: " + valorMedicamentos + "| Material: " + valorMaterial +  " | Total: " +
            montoTotal);
    }



    function validarNumero(input) {
        // Intentar convertir el valor a número
        let valor = parseFloat(input.value);
        // Si el valor no es un número, asignar 0
        input.value = isNaN(valor) ? 0 : valor.toFixed(2);
    }

    function toggleFacturacion(recetaId) {
        var checkbox = document.getElementById(`facturacion-${recetaId}`);
        var datosFacturacion = document.getElementById(`datosFacturacion-${recetaId}`);
        // Mostrar o esconder los datos de facturación
        if (checkbox.checked) {
            datosFacturacion.style.display = "block";
        } else {
            datosFacturacion.style.display = "none";
        }
    }
</script>
