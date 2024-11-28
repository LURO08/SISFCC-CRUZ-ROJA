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

    /* CSS DE MODALES */
    .tratamientoModal,
    .facturasolicitud,
    .cobrodeServicios,
    .modalinfoCobro,
    .modalSolicitudFactura {
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

    .tratamientoModal:target,
    .facturasolicitud:target,
    .cobrodeServicios:target,
    .modalinfoCobro:target,
    .modalSolicitudFactura:target {
        display: flex;
    }

    .tratamientoModal .modal-content {
        max-width: 700px;
    }

    .facturasolicitud .modal-content {
        max-width: 500px;
    }

    .modalinfoCobro .modal-content {
        max-width: 500px;
    }
    .modalSolicitudFactura .modal-content{
        max-width: 500px;
    }

    .facturasolicitud .Modal-bodyAjustable {
        height: 60vh;
        overflow: auto;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px 20px 0;
        border-radius: 8px;
        width: 100%;
        position: relative;
        justify-content: space-between;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #dee2e6;
        margin-bottom: 15px;
        background-color: #007bff;
        color: #fff;
        border-radius: 10px;
        padding: 5px;
    }

    .modal-title {
        font-size: 1.25rem;
        margin: 0;
    }

    .cobrodeServicios .ServiciosPaneles {
        height: 70vh;
        overflow: auto;
    }

    .modal-body {
        padding: 20px;
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

    .modal-footer {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }

    .modal-footer .btn {
        margin: 10px 10px;
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
</style>

@if (session('error'))
    <div class="notification alert alert-danger alert-dismissible fade show" role="alert"
        style="text-align: center; position: fixed; top: 20px; right: 20px; width: 300px; z-index: 1050; background-color: #f44336; color: white; border-radius: 4px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); padding: 15px; transition: opacity 0.3s;">
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="opacity: 0.8;"></button>
    </div>
@endif

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

    <div id="cobrosPanel" class="panelCentral" style="display: none;">
        <h1>Historial de Cobros</h1>
        <h2>Aquí puedes realizar y gestionar los cobros de los servicios.</h2>

        <!-- Botón para generar reporte diario -->
        <div class="acciones-reporte">
            <form action="{{ route('reporte.diario') }}" method="GET">
                @csrf
                <div class="form-group">
                    <label for="fecha">Seleccione una Fecha para el Reporte:</label>
                    <select name="fecha" id="fecha" class="form-control" required>
                        <option value="" disabled selected>Seleccione una fecha</option>
                        @foreach ($fechasDisponibles as $fecha)
                            <option value="{{ $fecha }}">{{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Generar Reporte Diario</button>
            </form>
        </div>

        <div class="cobros-historial">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Paciente</th>
                            <th>Servicio</th>
                            <th>Monto</th>
                            <th>Facturo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($cobros->isEmpty())
                            <p>No hay datos de cobros disponibles.</p>
                        @else
                            {{-- Se asume que 'cobros' es una colección de cobros obtenidos del modelo --}}
                            @foreach ($cobros as $cobro)
                                <tr>
                                    <td>{{ $cobro->id }}</td>
                                    <td>{{ $cobro->paciente->nombre }}</td>
                                    <td>{{ $cobro->Servicio->nombre }}</td>
                                    <td>${{ number_format($cobro->monto, 2) }}</td>
                                    <td>{{ $cobro->facturación ? 'Sí' : 'No' }}</td>
                                    <td>
                                        @if (!$cobro->facturación)
                                            <a class="btn "
                                                href="#solicitarFacturaModal-{{ $cobro->id }}">Facturar</a>
                                        @endif
                                        <a class="btn" href="#modalInfoCobro-{{ $cobro->id }}">Ver</a>
                                        <a class="btn descargar-btn"  href="{{ route('ticket.descargar', $cobro->id) }}">Descargar</a>
                                    </td>

                                </tr>


                                <!-- Modal para Solicitar Factura -->
                                <div class="facturasolicitud" id="solicitarFacturaModal-{{ $cobro->id }}"
                                    tabindex="-1" role="dialog" aria-labelledby="solicitarFacturaLabel"
                                    aria-hidden="true">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="solicitarFacturaLabel">Solicitud de
                                                Factura de {{ $cobro->paciente->nombre }}</h5>
                                            <a type="button" class="close" href="">
                                                <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formSolicitudFactura"
                                                action="{{ route('cajero.solicitar.factura.store') }}"
                                                method="POST">
                                                @csrf

                                                <div class="Modal-bodyAjustable">
                                                    <div class="DatosPaciente">
                                                        <h2
                                                            style="font-size: 20px; padding-bottom: 0; margin-bottom: 0;">
                                                            DATOS DEL PACIENTE</h2>
                                                        <p><strong>Paciente:</strong> {{ $cobro->paciente->nombre }}
                                                            {{ $cobro->paciente->apellidopaterno }}
                                                            {{ $cobro->paciente->apellidomaterno }}</p>
                                                        <p><strong>Edad:</strong> {{ $cobro->paciente->edad }}</p>
                                                        <p><strong>Monto:</strong>{{ $cobro->monto }}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cobro_id">Cobro</label>
                                                        <input type="hidden" class="form-control" id="cobro_id"
                                                            name="cobro_id" value="{{ $cobro->id }}" readonly>
                                                    </div>
                                                    <!-- Nombre del Cliente -->
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre del Facturador</label>
                                                        <input type="text" class="form-control" id="nombre"
                                                            name="nombre" required>
                                                    </div>
                                                    <!-- RFC -->
                                                    <div class="form-group">
                                                        <label for="rfc">RFC</label>
                                                        <input type="text" class="form-control" id="rfc"
                                                            name="rfc" required>
                                                    </div>
                                                    <!-- Dirección -->
                                                    <div class="form-group">
                                                        <label for="direccion">Dirección</label>
                                                        <input type="text" class="form-control" id="direccion"
                                                            name="direccion" required>
                                                    </div>

                                                    <!-- Correo Electrónico -->
                                                    <div class="form-group">
                                                        <label for="correo">Correo Electrónico</label>
                                                        <input type="email" class="form-control" id="correo"
                                                            name="correo" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="telefono">Telefono</label>
                                                        <input type="telefono" class="form-control" id="telefono"
                                                            name="telefono" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Solicitar
                                                        Factura</button>
                                                    <a type="button" class="btn btn-secondary"
                                                        href="">Cancelar</a>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>

                                <div class="modalinfoCobro" id="modalInfoCobro-{{ $cobro->id }}"
                                    style="font-family: Arial, sans-serif;">
                                    <div class="modal-content">
                                        <!-- Encabezado del Modal -->
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detalles del Cobro - #{{ $cobro->id }}</h5>
                                            <a type="button" class="close" href="" aria-label="Cerrar"
                                                style="text-decoration: none; font-size: 1.5rem;">
                                                &times;
                                            </a>
                                        </div>

                                        <!-- Cuerpo del Modal -->
                                        <div class="modal-body" style="padding: 20px; height: 75vh; overflow: auto;">
                                            <!-- Información del Paciente -->
                                            <h2 style="font-size: 1.2rem; color: #007bff; margin-bottom: 10px;">
                                                Información del Paciente</h2>
                                            <p><strong>Nombre:</strong> {{ $cobro->paciente->nombre }}
                                                {{ $cobro->paciente->apellidopaterno }}
                                                {{ $cobro->paciente->apellidomaterno }}</p>
                                            <p><strong>Edad:</strong> {{ $cobro->paciente->edad }}</p>
                                            <p><strong>Sexo:</strong> {{ $cobro->paciente->sexo }}</p>

                                            <!-- Datos del Servicio -->
                                            <h2
                                                style="font-size: 1.2rem; color: #007bff; margin-top: 20px; margin-bottom: 10px;">
                                                Datos del Servicio</h2>
                                            <p><strong>Servicio:</strong> {{ $cobro->Servicio->nombre }}</p>
                                            <p><strong>Costo del Servicio:</strong>
                                                ${{ number_format($cobro->Servicio->costo, 2) }}</p>

                                            <!-- Información de Medicamentos -->
                                            <h2
                                                style="font-size: 1.2rem; color: #007bff; margin-top: 20px; margin-bottom: 10px;">
                                                Medicamentos Surtidos</h2>
                                            @php $totalMedicamentos = 0; @endphp
                                            @foreach ($recetasSurtidas as $recetaSurtida)
                                                @if ($recetaSurtida->receta_id == $cobro->receta_id)
                                                    @php
                                                        $subtotal =
                                                            $recetaSurtida->cantidad *
                                                            $recetaSurtida->medicamentos->precio;
                                                        $totalMedicamentos += $subtotal;
                                                    @endphp
                                                    <div
                                                        style="background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 5px; padding: 10px; margin-bottom: 10px;">
                                                        <p style="margin: 0;"><strong>Medicamento:</strong>
                                                            {{ $recetaSurtida->medicamentos->nombre }}</p>
                                                        <p style="margin: 0;"><strong>Cantidad:</strong>
                                                            {{ $recetaSurtida->cantidad }}</p>
                                                        <p style="margin: 0;"><strong>Precio Unitario:</strong>
                                                            ${{ number_format($recetaSurtida->medicamentos->precio, 2) }}
                                                        </p>
                                                        <p style="margin: 0;"><strong>Subtotal:</strong>
                                                            ${{ number_format($subtotal, 2) }}</p>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <div
                                                style="background-color: #e9ecef; border-radius: 5px; padding: 10px; margin-top: 10px;">
                                                <p style="margin: 0; font-weight: bold;">Total Medicamentos:
                                                    ${{ number_format($totalMedicamentos, 2) }}</p>
                                            </div>

                                            <!-- Detalles del Cobro -->
                                            <h2
                                                style="font-size: 1.2rem; color: #007bff; margin-top: 20px; margin-bottom: 10px;">
                                                Detalles del Cobro</h2>
                                            <p><strong>Pago: </strong> {{$cobro->nombre}}</p>
                                            <p><strong>Monto:</strong> ${{ number_format($cobro->monto, 2) }}</p>
                                            <p><strong>Facturación:</strong> {{ $cobro->facturación ? 'Sí' : 'No' }}
                                            </p>
                                            <p><strong>Fecha de cobro:</strong>
                                                {{ $cobro->created_at->format('d/m/Y H:i') }}</p>
                                        </div>

                                        <!-- Pie del Modal -->
                                        <div class="modal-footer" style="background-color: #f5f5f5; padding: 15px;">
                                            <a type="button" class="btn btn-secondary" href=""
                                                data-dismiss="modal"
                                                style="text-decoration: none; color: #333; padding: 8px 20px; border: 1px solid #ccc; border-radius: 5px;">Cerrar</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
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

    <div id="facturasPanel" class="panelCentral" style="display: none;">
        <h1>Facturas</h1>
        <p>Gestiona y revisa el historial de facturas emitidas.</p>

        <div class="facturasContainer">
            <table class="facturasTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Cliente</th>
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Se asume que 'facturas' es una colección de facturas obtenidas del modelo --}}
                    @foreach ($facturas as $factura)
                        <tr>
                            <td>{{ $factura->id }}</td>
                            <td>{{ $factura->created_at->format('d/m/Y') }}</td>
                            <td>{{ $factura->created_at->format('H:i') }}</td>
                            <td>{{ $factura->cobro->paciente->nombre }}
                                {{ $factura->cobro->paciente->apellidopaterno }}
                                {{ $factura->cobro->paciente->apellidomaterno }}</td>
                            <td>${{ number_format($factura->monto, 2) }}</td>
                            <td>{{ $factura->estatus }}</td>
                            <td style="display: flex;">
                                <a href="#modalSolicitudFactura-{{ $factura->id }}" class="btn ver-btn">Ver</a>
                                <a class="btn descargar-btn"  href="{{ route('factura.descargar', $factura->id) }}">Descargar</a>
                            </td>
                        </tr>


                        <div class="modalSolicitudFactura" id="modalSolicitudFactura-{{ $factura->id }}" style="font-family: Arial, sans-serif;">
                            <div class="modal-content">
                                <!-- Encabezado del Modal -->
                                <div class="modal-header">
                                    <h5 class="modal-title">Detalles de Solicitud de Factura - #{{ $factura->id }}</h5>
                                    <a type="button" class="close" href="" aria-label="Cerrar" style="text-decoration: none; font-size: 1.5rem;">
                                        &times;
                                    </a>
                                </div>

                                <!-- Cuerpo del Modal -->
                                <div class="modal-body" style="padding: 20px; height: 75vh; overflow: auto;">

                                     <!-- Información del Paciente -->
                                    <h2 style="font-size: 1.2rem; color: #007bff; margin-bottom: 10px;">
                                        Información del Paciente</h2>
                                    <p><strong>Nombre:</strong> {{ $factura->cobro->paciente->nombre }}
                                        {{ $factura->cobro->paciente->apellidopaterno }}
                                        {{ $factura->cobro->paciente->apellidomaterno }}</p>
                                    <p><strong>Edad:</strong> {{ $factura->cobro->paciente->edad }}</p>
                                    <p><strong>Sexo:</strong> {{ $factura->cobro->paciente->sexo }}</p>


                                    <!-- Información de la Solicitud de Factura -->
                                    <h2 style="font-size: 1.2rem; color: #007bff; margin-bottom: 10px;">Información de la Factura</h2>
                                    <p><strong>Nombre:</strong> {{ $factura->nombre }}</p>
                                    <p><strong>RFC:</strong> {{ $factura->rfc }}</p>
                                    <p><strong>Dirección:</strong> {{ $factura->direccion }}</p>
                                    <p><strong>Teléfono:</strong> {{ $factura->telefono }}</p>
                                    <p><strong>Correo Electrónico:</strong> {{ $factura->correo }}</p>

                                    <!-- Monto y Estado de la Solicitud -->

                                    <h2
                                    style="font-size: 1.2rem; color: #007bff; margin-top: 20px; margin-bottom: 10px;">
                                    Datos del Servicio</h2>
                                    <p><strong>Servicio:</strong> {{ $factura->cobro->Servicio->nombre }}</p>
                                    <p><strong>Costo del Servicio:</strong>
                                    ${{ number_format($factura->cobro->Servicio->costo, 2) }}</p>

                                    <h2 style="font-size: 1.2rem; color: #007bff; margin-top: 20px; margin-bottom: 10px;">Detalles del Monto</h2>
                                    <p><strong>Monto:</strong> ${{ number_format($factura->monto, 2) }}</p>
                                    <p><strong>Estatus:</strong> {{ $factura->estatus }}</p>

                                    <!-- Ruta de la Factura -->
                                    <h2 style="font-size: 1.2rem; color: #007bff; margin-top: 20px; margin-bottom: 10px;">Factura Generada</h2>
                                    <p><strong>Ruta de la Factura:</strong>
                                        @if($factura->rutafactura)
                                            <a href="{{ $factura->rutafactura }}" target="_blank">Descargar Factura</a>
                                        @else
                                            No disponible
                                        @endif
                                    </p>

                                    <!-- Fecha de Creación -->
                                    <p><strong>Fecha de Solicitud:</strong> {{ $factura->created_at->format('d/m/Y H:i') }}</p>
                                </div>

                                <!-- Pie del Modal -->
                                <div class="modal-footer" style="background-color: #f5f5f5; padding: 15px;">
                                    <a type="button" class="btn btn-secondary" href="" data-dismiss="modal" style="text-decoration: none; color: #333; padding: 8px 20px; border: 1px solid #ccc; border-radius: 5px;">Cerrar</a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>

<div class="derecha" id="recetas-container">
    <div class="btnOcultar">
        <button id="toggle-recetas" class="btn btn-primary my-4">></button>
    </div>
    <div id="MenuDatos" style="justify-content: center; justify-items: center;">
        <h2 class="my-4">Recetas Recibidas de Consultorio</h2>
        @if ($recetas->isEmpty())
            <div class="alert alert-info" role="alert">
                No hay recetas enviadas a farmacia.
            </div>
        @else
            <div class="list-group">
                <table class="tableConsultas">
                    @foreach ($recetas as $receta)
                        @if (!$receta->cobrada)
                            <tr style="text-align: center; align-items: center; justify-content: center;">
                                <td><strong>{{ $receta->paciente->nombre }}
                                        {{ $receta->paciente->apellidopaterno }}
                                        {{ $receta->paciente->apellidomaterno }}</strong></td>
                                <td rowspan="2"
                                    style="text-align: center; align-items: center; justify-content: center;">
                                    <!-- Botón para abrir el modal -->
                                    <a class="btn btn-info" href="#cobrodeServicios-{{ $receta->id }}"
                                        data-id="{{ $receta->id }}">
                                        👁️
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Fecha:</strong> {{ $receta->created_at->format('d/m/Y') }}<br>
                                    <strong>Hora:</strong> {{ $receta->created_at->format('H:i') }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>

            @foreach ($recetas as $receta)
                <div class="cobrodeServicios" id="cobrodeServicios-{{ $receta->id }}">
                    <div class="modal-content" style="max-width: 550px;">
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
                                            $totalServicio = 0.0;
                                        @endphp

                                        <!-- Información del Tratamiento -->
                                        <div class="form-group">
                                            <div class="tratamiento-container mb-4"
                                                style="border-top: 1px solid #ddd; padding-top: 15px;">
                                                <h5>Tratamiento</h5>
                                                @if (!empty($receta->tratamiento))
                                                    <p style="line-height: 1.6; font-size: 16px; color: #34495e;">
                                                        {{ $receta->tratamiento }}
                                                    </p>
                                                @else
                                                    <p style="font-style: italic; color: #7f8c8d;">No se ha
                                                        especificado ningún tratamiento.</p>
                                                @endif
                                            </div>
                                        </div>

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

                                        <!-- Medicamentos Surtidos -->
                                        <div class="form-group">
                                            <div class="medicamentos-surtidos mb-4"
                                                style="border-top: 1px solid #ddd; padding-top: 15px;">
                                                <h5>Medicamentos Surtidos</h5>
                                                <div
                                                    style="max-height: 200px; overflow-y: auto; width: 100%; justify-content: center;">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <td>Medicamento</td>
                                                                <td>Cantidad</td>
                                                                <td>Precio</td>
                                                                <td>Total</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($recetasSurtidas as $recetaSurtida)
                                                                @if ($recetaSurtida->receta_id == $receta->id)
                                                                    @php
                                                                        $subtotal =
                                                                            $recetaSurtida->cantidad *
                                                                            $recetaSurtida->medicamentos->precio;
                                                                        $totalMedicamentos += $subtotal;
                                                                    @endphp

                                                                    <tr>
                                                                        <td>{{ $recetaSurtida->medicamentos->nombre }}
                                                                        </td>
                                                                        <td>{{ $recetaSurtida->cantidad }}</td>
                                                                        <td>${{ number_format($recetaSurtida->medicamentos->precio, 2) }}
                                                                        </td>
                                                                        <td><input type="number" name="CantidadTotal"
                                                                                class="CantidadTotal"
                                                                                value="{{ number_format($subtotal, 2) }}"
                                                                                disabled></td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach

                                                            @if (!empty($recetaSurtida->receta_id))
                                                                <tr>
                                                                    <td colspan="5" style="text-align: center;">
                                                                        <strong>Ningún Medicamento Surtido</strong>
                                                                    </td>
                                                                </tr>
                                                            @endif

                                                        </tbody>

                                                    </table>
                                                </div>
                                                <div
                                                    style="display: flex; padding: 10px; justify-content: right; margin-right: 20px;">
                                                    <p style="margin-right: 10px;"><span>Total: </span></p>
                                                    <input type="hidden" name="MedicamentosTotal"
                                                        id="MedicamentosTotal-{{ $receta->id }}"
                                                        value="{{ $totalMedicamentos }}">
                                                    <p><span>${{ $totalMedicamentos }}</span></p>
                                                </div>
                                            </div>
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
                                            style="display: flex; justify-content: space-between; align-items: center; padding-right: 10px; width: 100%;">
                                            <label for="facturacion">Facturación</label>
                                            <input type="checkbox" name="facturacion"
                                                id="facturacion-{{ $receta->id }}"
                                                onclick="toggleFacturacion({{ $receta->id }})">
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
            @endforeach

        @endif

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

        // Calcular el monto total
        const montoTotal = valorMedicamentos + costoServicio;

        // Actualizar el campo monto correspondiente a esta receta
        document.getElementById(`monto-${recetaId}`).value = montoTotal.toFixed(2);
        document.getElementById(`costo-${recetaId}`).innerHTML = costoServicio;
        document.getElementById(`costo2-${recetaId}`).value = costoServicio;

        console.log("Costo Servicio: " + costoServicio + " | Medicamentos: " + valorMedicamentos + " | Total: " +
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
