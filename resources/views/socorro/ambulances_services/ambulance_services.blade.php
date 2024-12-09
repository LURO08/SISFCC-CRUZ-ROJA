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
        padding: 20px;
        border-radius: 8px;
        width: 100%;
        max-width: 600px;
        position: relative;
        justify-content: space-between;
    }

    .ModalContenedorDatos {
        max-height: 70vh;
        overflow-y: auto;
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

    .modal-title{
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

    .form-group {
        margin-bottom: 15px;
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

    @include('socorro.menu_nav')


    <div class="central">
        <div id="ambulancias">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 style="color:#c2185b;">Servicios de Ambulancias</h1>
                <a type="button"
                    class="inline-block px-4 py-2 mx-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600"
                    data-bs-toggle="modal" href="#registerAmbulanceModal">
                    <i class="bi bi-plus-circle"></i> Registrar Ambulancia
                </a>
            </div>

            <!-- Tabla de servicios -->
            <div class="table-responsive">
                <table class="table-auto w-full text-center border-collapse">
                    <thead class="bg-blue-200">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Ambulancia</th>
                            <th class="px-4 py-2">Inicio</th>
                            <th class="px-4 py-2">Fin</th>
                            <th class="px-4 py-2">Estado</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ambulanceServices as $service)
                            <tr>
                                <td class="border px-4 py-2">{{ $service->id }}</td>
                                <td class="border px-4 py-2">
                                    @if ($service->ambulancia)
                                        {{ $service->ambulancia->tipo }} ({{ $service->ambulancia->placa }})
                                    @else
                                        <span class="text-gray-500">No asignada</span>
                                    @endif
                                </td>

                                <td class="border px-4 py-2">{{ $service->start_time }}</td>
                                <td class="border px-4 py-2">{{ $service->end_time ?? 'En curso' }}</td>
                                <td class="border px-4 py-2">
                                    @if ($service->status === 'En servicio')
                                        <span class="badge bg-primary">En Servicio</span>
                                    @else
                                        <span class="badge bg-success">Finalizado</span>
                                    @endif
                                </td>
                                <td class="border px-4 py-2 flex justify-center gap-2">
                                    @if ($service->status === 'En servicio')
                                        <form action="{{ route('ambulance_services.end', $service->id) }}"
                                            method="POST">
                                            @csrf
                                            <button
                                                class="inline-block px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                                                <i class="bi bi-stop-circle"></i> Finalizar
                                            </button>
                                        </form>
                                    @else
                                        ---
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="border px-4 py-2">No hay servicios registrados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Modal Registrar Ambulancia en Servicio -->
            <div class="modal fade" id="registerAmbulanceModal" tabindex="-1"
                aria-labelledby="registerAmbulanceModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Encabezado -->
                        <div class="bg-blue-500 modal-header">
                            <h5 class="modal-title" id="registerAmbulanceModalLabel">
                                <i class="bi bi-truck"></i> Registrar Ambulancia en Servicio
                            </h5>
                            <a href="#" class="close" data-dismiss="modal">&times;</a>
                        </div>

                        <!-- Cuerpo del Modal -->
                        <div class="modal-body">
                            <form action="{{ route('ambulance_services.store') }}" method="POST"
                                id="registerAmbulanceForm">
                                @csrf
                                <div class="form-group">
                                    <label for="ambulance_id" class="form-label">Selecciona una Ambulancia</label>
                                    <select name="ambulance_id" id="ambulance_id" class="form-select">
                                        <option value="" disabled selected>Seleccionar</option>
                                        @foreach ($ambulances as $ambulance)
                                            <option value="{{ $ambulance->id }}">
                                                {{ $ambulance->marca }} ({{ $ambulance->placa }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="start_time" class="form-label">Hora de Inicio</label>
                                    <input type="datetime-local" name="start_time" id="start_time"
                                        class="form-control">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="status" class="form-label">Estado</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="" disabled selected>Seleccionar</option>
                                        <option value="En servicio">En servicio</option>
                                        <option value="Finalizado">Finalizado</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <!-- Pie del Modal -->
                        <div class="flex justify-center space-x-4 mt-4">
                            <a href="#"
                                class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600"
                                data-dismiss="modal">
                                Cancelar
                            </a>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600"
                                form="registerAmbulanceForm">
                                <i class="bi bi-check-circle"></i> Registrar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
