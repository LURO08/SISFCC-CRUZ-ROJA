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

    .btn:hover {
        background-color: var(--hover-color);
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
        width: auto;
        padding: 0 20px;
        flex: 1;
        box-sizing: border-box;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
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

    .list-group {
        list-style-type: none;
        padding: 0;
    }

    .list-group-item {
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: background-color 0.3s;
    }

    .list-group-item:hover {
        background-color: #f1f1f1;
    }

    .item-content {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .view-treatment-btn {
        background-color: var(--primary-color);
        color: var(--text-color);
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .view-treatment-btn:hover {
        background-color: var(--hover-color);
    }

    /* Panel central */
    #panelCentral {
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

    /* Panel central */
    #PedidosProveedor {
        display: flex;
        text-align: center;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    /* Panel central */
    #PedidosProveedor h1 {
        font-size: 30px;
        font-weight: 700;
    }

    #PanelMostrarPedidos .table,
    #MedicamentosSurtidos .table {
        width: 100%;
        border: 1px solid #dee2e6;
    }

    #PanelMostrarPedidos .table th,
    #MedicamentosSurtidos .table th {
        font-weight: bold;
        background-color: var(--primary-color);
        color: var(--text-color);
        text-align: center;
        padding: 15px;
        margin: 5px;
    }

    #PanelMostrarPedidos .table tbody tr,
    #MedicamentosSurtidos .table tbody tr {
        margin-top: 10px;
    }

    #PanelMostrarPedidos .table-responsive,
    #MedicamentosSurtidos .table-responsive {
        max-height: 300px;
    }

    #PanelMostrarPedidos .btnAgregarMedicamento,
    #MedicamentosSurtidos .btnAgregarMedicamento {
        width: 100%;
    }


    /* Panel central */
    #donaciones {
        display: flex;
        text-align: center;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    #PanelMostrarDonaciones .table {
        width: 100%;
        border: 1px solid #dee2e6;
    }

    #PanelMostrarDonaciones .table th {
        font-weight: bold;
        background-color: var(--primary-color);
        color: var(--text-color);
        text-align: center;
        padding: 15px;
    }

    #PanelMostrarDonaciones .table-responsive {
        max-height: 300px;
    }

    .list-group {
        max-height: 300px;
        overflow-y: auto;
    }

    /* Mejora de apariencia de la tabla */
    .table-hover tbody tr:hover {
        background-color: #6d85ed92;
    }

    strong {
        margin-bottom: 10px;
        display: inline-block;
    }


    #panelCentral h1 {
        text-shadow: 1px 2px 2px rgba(0, 0, 0, 0.2);
        letter-spacing: 1px;
        font-weight: 800;
        justify-content: center;
    }

    .tableMedicamenrtos,
    .tableConsultas,
    .tableMedicamentosASurtir,
    .table {
        border-collapse: collapse;
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
        width: 100%;
        text-align: center;
        margin: 0 auto;
        max-width: 100%;
        border-radius: 0.5rem;
        overflow: hidden;
    }

    .tableMedicamentos thead {
        background-color: #f8f9fa;
        color: #343a40;
    }

    .tableMedicamentos th,
    .tableMedicamentosASurtir th,
    .tableConsultas th {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
        padding: 10px;
        text-align: center;
    }

    .tableMedicamentos td,
    .tableConsultas td,
    .tableMedicamentosASurtir td {
        padding: 10px;
        border: 1px solid #dbdbdb;
        text-align: center;
    }

    .list-group-item {
        margin-bottom: 2px;
        padding: 2px;
        justify-content: center;
        justify-items: center;
        /* Ajusta el padding para un mejor aspecto */
    }

    .list-group-item button {
        justify-content: center;
        justify-items: center;
        align-items: center;
        align-content: center;
    }

    .list-group-item input {
        justify-content: center;
        justify-items: center;
        align-items: center;
        align-content: center;
    }

    .list-group-item ul,
    .list-group-item li {
        justify-content: center;
        justify-items: center;
        align-items: center;
        align-content: center;
    }

    .form-group input {
        width: 100%;
    }

    /* Estilo para la etiqueta */
    .PanelIzquierdo label {
        margin-bottom: 10px;
        display: block;
        text-align: left;
    }

    /* Estilo para el input de archivo */
    .PanelIzquierdo .form-control-file {
        width: 100%;
        max-width: 500px;
    }

    /* Estilo para las imágenes previas */
    .img-thumbnail {
        border-radius: 4px;
        border: 1px solid #dee2e6;
        max-width: 100%;
        height: auto;
        max-height: 150px;
        margin: 5px;
    }

    .form-row {
        display: flex;
    }

    .form-group .form-control {
        width: 100%;
    }

    /* Estilos para el panel izquierdo */
    .PanelIzquierdo {
        width: 80%;
        margin: 0 auto;
        text-align: left;
    }

    /* Estilos para la foto */
    .PanelIzquierdo .form-group {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* Estilos para la foto */
    .PanelIzquierdo .form-group-label {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-left: 15%;
    }

    /* Estilo para la imagen de vista previa */
    #foto-preview-edit- {
        margin-bottom: 15px;
    }

    .PanelDerecho {
        width: 100%;
        margin-left: 5%;
    }

    .modalNuevoProveedor,
    .modalProductoadd,
    .modalMedicamentosSurtidos,
    .modalDonaciones,
    .tratamientoModal,
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

    .modalNuevoProveedor:target,
    .modalProductoadd:target,
    .modalMedicamentosSurtidos:target,
    .modalDonaciones:target,
    .tratamientoModal:target,
    .modal:target {
        display: flex;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px 20px 0;
        border-radius: 8px;
        width: 100%;
        position: relative;
        justify-content: space-between;
    }

    .tratamientoModal .modal-content {
        max-width: 700px;
    }

    .modalNuevoProveedor .modal-content {
        max-width: 600px;
    }

    .modalProductoadd .modal-content {
        max-width: 650px;
    }

    .modalMedicamentosSurtidos .modal-content {
        max-width: 480px;
    }

    .modalDonaciones .modal-content {
        max-width: 500px;
    }

    .modalDonaciones .modal-body,
    .modalMedicamentosSurtidos .modal-body {
        padding: 20px;
        max-height: 50vh;
        overflow-y: auto;
        height: 50vh;
    }

    .modalNuevoProveedor .modal-header,
    .modalProductoadd .modal-header,
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

    .modal-title,
    .modalNuevoProveedor .modal-title {
        font-size: 1.25rem;
        margin: 0;
    }

    .modalNuevoProveedor .close,
    .close {
        font-size: 1.5rem;
        color: #fff;
        text-decoration: none;
        cursor: pointer;
        margin-right: 10px;
    }

    .modalNuevoProveedor .close:hover,
    .close:hover {
        color: #dcdcdc;
    }

    .form-group {
        margin-bottom: 15px;
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

    .modal-footer a {
        margin-top: 15px;
    }

    .modalNuevoProveedor .modalProveedor-body {
        padding: 20px 20px 0;
    }

    .modalNuevoProveedor .formContent {

        max-height: 60vh;
        overflow-y: auto;
    }

    .modalNuevoProveedor .form-group {
        margin-bottom: 15px;
    }

    .modalNuevoProveedor .modalProveedor-footer {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }

    .modalNuevoProveedor .modalProveedor-footer button {
        margin: 10px;
    }

    .modalNuevoProveedor .btn {
        padding: 10px 20px;
        border-radius: 5px;
        color: #fff;
        text-decoration: none;
        cursor: pointer;
    }


    .modalNuevoProveedor .addProveedor {
        background-color: #007bff;
        border-color: #007bff;
        float: left;
    }

    .modalNuevoProveedor .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        margin-top: 6px;
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

    .panelOpcionesDonaciones {
        display: flex;
        padding: 5px;
        padding-top: 15px;
    }

    .btn-custom {
        padding: 10px;
        background-color: #007bff;
        border-radius: 5px;
        color: #fff;
        border: none;
        text-align: center;
        width: 100%;
        font-size: 16px;
    }

    .btn-custom:hover {
        background-color: #0056b3;
    }

    .table-container {
        border: 1px solid var(--primary-color);
        border-radius: 8px;
        overflow: hidden;
        font-family: Arial, sans-serif;
        margin: 20px 0;
        max-width: 600px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .table-header {
        background-color: var(--primary-color);
        color: white;
        font-weight: bold;

    }

    .header-row,
    .body-row {
        display: flex;
        justify-content: space-between;
        padding: 10px;
    }

    .body-row {
        background-color: var(--secondary-color);
        color: #000;
        transition: background-color 0.2s ease;
    }

    .body-row:nth-child(even) {
        background-color: #e9ecef;
    }

    .body-row:hover {
        background-color: #f1f1f1;
    }

    .col {
        flex: 1;
        text-align: center;
        border-right: 1px solid #ddd;
    }

    .col:last-child {
        border-right: none;
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

    /* Ocultar secciones inicialmente */
    .section {
        display: none;
    }

    /* Mostrar la sección activa */
    .section.active {
        display: block;
    }


    /* CSS DE REPORTE */
    /* General */
    body {
        background-color: #f9f9f9;
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        color: #333;
    }

    .section {
        padding: 40px 20px;
    }

    .text-center {
        text-align: center;
    }

    h2 {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    /* Card */
    .card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .card-body {
        padding: 20px;
    }

    /* Formulario */
    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #555;
    }

    .form-control,
    .form-select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 1rem;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0px 0px 6px rgba(0, 123, 255, 0.2);
    }

    .form-select {
        background-color: #f8f8f8;
    }

    /* Botones */
    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .btn i {
        margin-right: 8px;
    }

    /* Layout */
    .row {
        display: flex;
        gap: 20px;
        justify-content: space-between;
    }

    .col {
        flex: 1;
    }

    .mb-3 {
        margin-bottom: 20px;
    }

    /* Responsivo */
    @media (max-width: 768px) {
        .row {
            flex-direction: column;
        }

        .col {
            margin-bottom: 15px;
        }
    }
</style>

<body>
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
        <div class="notification alert alert-error alert-dismissible fade show" role="alert"
            style="position: fixed; top: 20px; right: 20px; width: 300px; z-index: 1050;
            background-color: #e14a4a; color: white; border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); padding: 20px; padding-top: 30px;
            text-align: center;">
            <a type="button" class="btn-close" href=""
                style="position: absolute; top: 10px; right: 10px; font-size: 22px;
            color: white; text-decoration: none; opacity: 0.8;">
                &times;</a>
            <strong>Error!</strong> {{ session('success') }}
        </div>
    @endif

    @include('admin.menu_nav')


    <div class="central">

        <section id="inicio" class="section active flex flex-col items-center justify-center text-center">
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
            <h1 style="margin: 0; text-align: center;">SISTEMA DE ADMINISTRADOR</h1>
            <h3 style="margin: 0; text-align: center; font-size: 25px;">DE LA </h3>
            <h2 style="margin: 0; text-align: center; font-size: 27px;">CRUZ ROJA MEXICANA DELEGACIÓN CHILPANCINGO
            </h2>
        </section>


        <div id="PanelServicios" class="panelCentral" style="display: none;">
            <h1>Servicios Disponibles en la Cruz Roja</h1>
            <h2>Explora los servicios que ofrecemos y gestiona los detalles que necesites.</h2>

            <!-- Botón para agregar un nuevo servicio -->
            <a class="btn btn-primary" data-toggle="modal" href="#agregarServicioModal">
                ➕ Agregar Nuevo Servicio
            </a>

            <!-- Contenedor de servicios -->
            <div class="panelServicios">
                <div id="serviciosContainer">
                    {{-- Se asume que 'servicios' es una colección de servicios obtenidos del modelo --}}
                    @foreach ($servicios as $servicio)
                        <div class="servicio-item">
                            <div class="servicio-header"
                                onclick="toggleServicioDetalle('detalle{{ $servicio->id }}')">
                                <span class="servicio-icono">{{ $servicio->icono }}</span>
                                <h3>{{ $servicio->nombre }}</h3>
                                <p>Costo: <span class="costo">{{ $servicio->costo }}</span></p>
                            </div>
                            <div id="detalle{{ $servicio->id }}" class="servicio-detalle" style="display: none;">
                                <p>{{ $servicio->descripcion }}</p>
                                <button class="btn-eliminar" onclick="eliminarServicio({{ $servicio->id }})">
                                    ❌ Eliminar Servicio
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="modal fade" id="agregarServicioModal" tabindex="-1" role="dialog"
                aria-labelledby="agregarServicioModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <!-- Encabezado del modal -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="agregarServicioModalLabel">Agregar Nuevo Servicio</h5>
                            <a type="button" class="close" data-dismiss="modal" aria-label="Close"
                                href="">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Campo para el nombre del servicio -->
                                <div class="form-group">
                                    <label for="nombre">Nombre del Servicio</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="Ejemplo: Consulta Médica" required>
                                </div>

                                <!-- Campo para el costo del servicio -->
                                <div class="form-group">
                                    <label for="costo">Costo</label>
                                    <input type="number" class="form-control" id="costo" name="costo"
                                        placeholder="Ejemplo: 100.00" required>
                                </div>

                                <!-- Campo para la descripción del servicio -->
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"
                                        placeholder="Breve descripción del servicio" required></textarea>
                                </div>

                                <!-- Campo para el ícono del servicio -->
                                <div class="form-group">
                                    <label for="icono">Ícono</label>
                                    <input type="text" class="form-control" id="icono" name="icono"
                                        placeholder="Ejemplo: 🚑" required>
                                </div>
                            </form>
                        </div>

                        <!-- Pie de página del modal -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Guardar Servicio</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <section id="reportes" class="section">
            <h2 class="text-center mb-4">Generar Reportes</h2>
            <div class="card shadow">
                <div class="card-body">
                    <!-- Filtros -->
                    <form action="{{ route('admin.reporte.descargar') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Tipo de Reporte -->
                            <div class="col">
                                <label for="tipoReporte" class="form-label">Tipo de Reporte</label>
                                <select id="tipoReporte" name="tipo_reporte" class="form-select">
                                    <option value="pacientes">Pacientes</option>
                                    <option value="medicamentos">Medicamentos</option>
                                    <option value="cobros">Cobros</option>
                                    <option value="facturas">Facturas</option>
                                    <option value="doctores">Doctores</option>
                                </select>
                            </div>

                            <!-- Filtro por Fecha -->
                            <div class="col">
                                <label for="rangoFecha" class="form-label">Rango de Fecha</label>
                                <select id="rangoFecha" name="rango_fecha" class="form-select">
                                    <option value="todos">Todos los registros</option>
                                    <option value="desde_fecha">Desde una fecha específica</option>
                                    <option value="rango_fechas">Entre fechas</option>
                                </select>
                            </div>
                        </div>

                        <!-- Fechas dinámicas -->
                        <div class="row mt-3">
                            <!-- Fecha Inicial -->
                            <div class="col" id="fechaInicioContainer" style="display: none;">
                                <label for="fechaInicio" class="form-label">Fecha Inicial</label>
                                <input type="date" id="fechaInicio" name="fecha_inicio" class="form-control">
                            </div>

                            <!-- Fecha Final -->
                            <div class="col" id="fechaFinContainer" style="display: none;">
                                <label for="fechaFin" class="form-label">Fecha Final</label>
                                <input type="date" id="fechaFin" name="fecha_fin" class="form-control">
                            </div>
                        </div>

                        <!-- Opciones Avanzadas -->
                        <div class="mb-3 mt-3">
                            <label for="filtroAvanzado" class="form-label">Filtro Avanzado (opcional)</label>
                            <input type="text" id="filtroAvanzado" name="filtro_avanzado" class="form-control"
                                placeholder="Nombre, ID, o cualquier criterio...">
                        </div>

                        <!-- Botones -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-file-alt"></i> Generar Reporte
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                <i class="fas fa-eraser"></i> Limpiar Campos
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>


    <div class="derecha" id="recetas-container">
        <div class="btnOcultar">
            <button id="toggle-recetas" class="btn btn-primary my-4">></button>
        </div>
        <div id="MenuDatos" style="justify-content: center; justify-items: center;">
            <h2 class="my-4">Facturas a Realizar</h2>
            @if ($facturas->isEmpty())
                <div class="alert alert-info" role="alert">
                    No hay solicitudes de facturas
                </div>
            @else
                <div class="list-group">
                    <table class="tableConsultas">
                        @foreach ($facturas as $factura)
                            <tr style="text-align: center; align-items: center; justify-content: center;">
                                <td><strong>{{ $factura->nombre }}</strong><br>
                                    <strong>{{ $factura->rfc }}</strong>
                                </td>
                                <td rowspan="2"
                                    style="text-align: center; align-items: center; justify-content: center;">
                                    <!-- Botón para abrir el modal -->
                                    <a class="btn btn-info view-treatment-btn"
                                        href="#tratamientoModal-{{ $factura->id }}">
                                        👁️
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Fecha:</strong> {{ $factura->created_at->format('d/m/Y') }}<br>
                                    <strong>Hora:</strong> {{ $factura->created_at->format('H:i') }}
                                </td>
                            </tr>

                            <div class=" fade tratamientoModal" id="tratamientoModal-{{ $factura->id }}"
                                tabindex="-1" role="dialog"
                                aria-labelledby="tratamientoModalLabel-{{ $factura->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tratamientoModalLabel-{{ $factura->id }}">
                                                Tratamiento
                                                para {{ $factura->cobro->paciente->nombre }}</h5>
                                            <button type="button" class="close" data-id="{{ $factura->id }}"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </button>
                                        </div>
                                        <div class="modal-body" style=" height: 85vh; overflow: auto;">
                                            <form action="{{ route('farmacia.surtir.receta') }}"method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="tratamiento-container"
                                                    style="margin: 10px 0; padding: 15px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
                                                    <h3 style="margin-bottom: 8px; color: #2c3e50;">Tratamiento</h3>

                                                    @if (!empty($factura->receta->tratamiento))
                                                        <p style="line-height: 1.6; font-size: 16px; color: #34495e;">
                                                            {{ $factura->receta->tratamiento }}
                                                        </p>
                                                    @else
                                                        <p style="font-style: italic; color: #7f8c8d;">No se ha
                                                            especificado ningún
                                                            tratamiento.</p>
                                                    @endif
                                                </div>

                                                <br>
                                                <!-- Barra de búsqueda -->
                                                <div class="form-group">
                                                    <strong>Buscar: </strong>
                                                    <input type="search" class="form-control"
                                                        id="searchMedicamento-{{ $factura->id }}"
                                                        placeholder="Buscar medicamento"
                                                        onkeyup="filterMedicamentos({{ $factura->id }})">
                                                </div>


                                                <!-- Sección para mostrar los medicamentos agregados -->
                                                <h5>Medicamentos Agregados</h5>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">
                                                        Surtir Receta
                                                    </button>
                                                    <button type="button" class="close"
                                                        data-id="{{ $factura->id }}" aria-label="Close">
                                                        <span aria-hidden="true">Cerrar</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </table>
                </div>
            @endif

        </div>
    </div>

    <script>
        var menuDatos = document.getElementById('MenuDatos');
        var derecha = document.querySelectorAll('.derecha');
        document.getElementById("menu").style.display = 'block';

        var btntogglerecetas = document.getElementById('toggle-recetas');

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

        const central = document.getElementById('panelCentral');
        const panelfarmcia = document.getElementById('PanelFarmacia');
        const paneldoctor = document.getElementById('PanelConsultorio');
        const PanelServicios = document.getElementById('PanelServicios');

        function toggleServicioDetalle(id) {
            const detalle = document.getElementById(id);
            detalle.style.display = detalle.style.display === 'none' ? 'block' : 'none';
        }

        function showSection(event, sectionId) {
            event.preventDefault(); // Prevenir la recarga de la página
            console.log("Cambiando a la sección:", sectionId); // Mensaje de depuración
            document.querySelectorAll('.section').forEach(section => section.classList.remove('active'));
            const section = document.getElementById(sectionId);
            if (section) {
                section.classList.add('active');
            } else {
                console.error("Sección no encontrada:", sectionId); // Mensaje de error si no se encuentra la sección
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const rangoFecha = document.getElementById("rangoFecha");
            const fechaInicioContainer = document.getElementById("fechaInicioContainer");
            const fechaFinContainer = document.getElementById("fechaFinContainer");

            rangoFecha.addEventListener("change", function() {
                if (this.value === "desde_fecha") {
                    // Mostrar solo Fecha Inicial
                    fechaInicioContainer.style.display = "block";
                    fechaFinContainer.style.display = "none";
                } else if (this.value === "rango_fechas") {
                    // Mostrar Fecha Inicial y Fecha Final
                    fechaInicioContainer.style.display = "block";
                    fechaFinContainer.style.display = "block";
                } else {
                    // Ocultar ambos campos
                    fechaInicioContainer.style.display = "none";
                    fechaFinContainer.style.display = "none";
                }
            });
        });
    </script>

</body>
