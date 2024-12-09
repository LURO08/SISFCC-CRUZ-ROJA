<style>
    .principal {
        margin: 0;
        font-family: Arial, sans-serif;
        display: flex;
        /* Flexbox para la disposición */
        height: 100vh;
        /* Altura de la ventana */
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
        color: #c2185b;

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
        background-color: #ff00bb;
        border-color: #ff00bb;
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

    /* Sección de Servicios de Ambulancias */
    #ambulancias h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #0d6efd;
        /* Azul Bootstrap */
        margin-bottom: 20px;
    }

    #ambulancias .btn-primary {
        font-size: 1.2rem;
        padding: 10px 20px;
        border-radius: 5px;
    }


    /* Estados de Ambulancia */
    .badge {
        font-size: 0.85rem;
        padding: 5px 10px;
        border-radius: 12px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .badge.en-servicio {
        background-color: #ff79c6;
        color: #ffffff;
    }

    .badge.finalizado {
        background-color: #c2185b;
        color: #ffffff;
    }

    /* Definir colores personalizados */
    /* Botones con colores personalizados */
    .btn-rosa {
        background-color: #f06292;
        /* Rosa */
        color: white;
    }

    .btn-azul {
        background-color: #4e73df;
        /* Azul */
        color: white;
    }

    .btn-verde {
        background-color: #1cc88a;
        /* Verde */
        color: white;
    }

    /* Efectos al pasar el cursor */
    .btn-rosa:hover,
    .btn-azul:hover,
    .btn-verde:hover {
        background-color: #d81b60;
        /* Cambio de rosa más intenso */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        /* Sombra más intensa */
    }

    /* Efectos de sombra y transición */
    .btn-sm {
        padding: 8px 16px;
    }

    .rounded-pill {
        border-radius: 50px;
        /* Bordes redondeados más suaves */
    }

    .shadow-sm {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    }

    .transition-all {
        transition: all 0.3s ease;
    }





    /* Estado de la Ambulancia */
    .badge {
        font-size: 0.9rem;
        padding: 0.5em 0.75em;
        border-radius: 5px;
        text-transform: uppercase;
    }

    .badge.en-servicio {
        background-color: #0d6efd;
        color: #ffffff;
    }

    .badge.finalizado {
        background-color: #198754;
        color: #ffffff;
    }

    #ambulancias table {
        width: 80%;
        /* Ancho de la tabla al 80% */
        margin: 0 auto;
        /* Centra la tabla horizontalmente */
        border-collapse: collapse;
        /* Opcional, para colapsar los bordes */
    }

    /* Botones de acción */
    #ambulancias .btn-warning {
        color: #ffffff;
        background-color: #ffc107;
        border: none;
    }

    #ambulancias .btn-warning:hover {
        background-color: #ffca2c;
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
        max-width: 450px;
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

    .form-group select,
    .form-group input {
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 10px;
        width: 100%;
        margin-top: 8px;
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

    /* Badges */
    .badge {
        font-size: 0.9rem;
        padding: 0.5em 0.75em;
        border-radius: 5px;
    }

    .badge.bg-primary {
        background-color: #fd0db5;
        color: #ddd;
    }

    .badge.bg-success {
        background-color: #198754;
        color: #ddd;
    }

    /* Modal container */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Slightly lighter background */
        z-index: 999;
        justify-content: center;
        align-items: center;
    }

    /* Show modal when targeted */
    .modal:target {
        display: flex;
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

    /* Modal header */
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 2px solid #f129c9;
        /* Slightly thicker border for better separation */
        margin-bottom: 15px;
        color: #343434;
        padding: 5px;
    }

    /* Modal title */
    .modal-title {
        font-size: 1.2rem;
        /* Larger title font */
        margin: 0;
    }

    /* Close button */
    .close {
        font-size: 2rem;
        color: #5a5a5ac3;
        text-decoration: none;
        cursor: pointer;
        padding: 0 10px;
        transition: color 0.3s;
    }

    /* Hover effect for close button */
    .close:hover {
        color: #e94ef7c3;
    }

    /* Modal body */
    .modal-body {
        padding: 10px;
    }

    /* Modal dialog */
    .modal-dialog {
        width: 80%;
        /* Full width to handle responsive layouts */
        max-width: 600px;
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
        background-color: #c2185b;
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
</style>

@if (session('success'))
    <div class="notification alert alert-success alert-dismissible fade show" role="alert"
        style="position: fixed; top: 20px; right: 20px; width: 300px; z-index: 1050; background-color: #4CAF50; color: white; border-radius: 4px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); padding: 15px;">
        <strong>Éxito!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="opacity: 0.8;"></button>
    </div>
@endif

@if (session('error'))
    <div class="notification alert alert-danger alert-dismissible fade show" role="alert"
        style="position: fixed; top: 70px; right: 20px; width: 300px; z-index: 1050; background-color: #f44336; color: white; border-radius: 4px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); padding: 15px;">
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
            style="opacity: 0.8;"></button>
    </div>
@endif

@include('socorro.menu_nav')

<div class="principal">
    <nav class="aside-menu" id="aside">
        <ul id="menu">
            <li><a href="#" onclick="showSection(event, 'inicio')">Inicio</a></li>
            <li><a href="#" onclick="showSection(event, 'ambulancias')">Ambulancias en Servicio</a></li>
            <li><a href="#" onclick="showSection(event, 'socorros')">Registro de Atención</a></li>
        </ul>
    </nav>

    <div class="content">
        <section id="inicio" class="section active flex flex-col items-center justify-center text-center">
            <h1 class="text-3xl font-bold mb-4">Sistema de Administrador</h1>
            <p>Bienvenido al sistema. Desde aquí puedes gestionar el personal, usuarios y adjuntar tickets y notas.</p>
        </section>

        <section id="socorros" class="section">
            <h2>Registro de Atención Hospitalaria</h2>

            <!-- Botón para generar reporte -->
            <button type="button" class="btn btn-primary mb-3" id="generateReportBtn">
                <i class="bi bi-file-earmark-pdf"></i> Generar Reporte de Atenciones
            </button>

            <a href="#registerHospitalAttentionModal" class="btn btn-primary bg-pink-600 mb-3">Registrar Atención</a>

            <!-- Tabla de registros de atención -->
            <div class="table-responsive" style="height: 80vh; overflow: auto;">
                <table class="table-auto w-full text-center border-collapse">
                    <thead class="bg-pink-200">
                        <tr>
                            <th>#</th>
                            <th>Ambulancia</th>
                            <th>Chofer</th>
                            <th>Paramedico</th>
                            <th>Fecha de Atención</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($phases as $phase)
                            <tr>
                                <td>{{ $phase->folio }}</td>
                                <td>{{ $phase->ambulance->placa ?? 'N/A' }}</td>
                                <td>{{ $phase->chofer->Nombre ?? 'N/A' }}
                                    {{ $phase->chofer->apellido_paterno ?? 'N/A' }}</td>
                                <td>{{ $phase->paramedico->nombre ?? 'N/A' }}</td>
                                <td>{{ $phase->created_at->format('Y-m-d H:i:s') }}</td>
                                <td style="width: 10%;">
                                    <div class="btn-group-vertical" style="display: flex; flex-direction: column;">
                                        <!-- Botón "Ver Detalles" con color rosa y efectos -->
                                        <button style="margin:5px 0;"
                                            class=" btn  btn-sm rounded-pill shadow-sm hover:bg-pink-600 bg-pink-600 text-white hover:shadow-lg transition-all duration-300"
                                            data-bs-toggle="modal" data-bs-target="#registerHospitalAttentionModal">
                                            Ver Detalles
                                        </button>

                                        <!-- Botón "Editar" con color azul y efectos -->
                                        <a href="#EditarHospitalAttentionModal" style="margin:5px 0;"
                                            class="btn  btn-sm rounded-pill shadow-sm hover:bg-blue-700 bg-blue-700 text-white hover:shadow-lg transition-all duration-300">
                                            Editar
                                        </a>

                                        <!-- Botón "Descargar" con color verde y efectos -->
                                        <button style="margin:5px 0;"
                                            class="btn  btn-sm rounded-pill shadow-sm hover:bg-green-600 bg-green-600 text-white hover:shadow-lg transition-all duration-300">
                                            Descargar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>

            <!-- Modal de Registro de Atención Hospitalaria por Fases -->
            <div class="modal fade" id="registerHospitalAttentionModal">
                <div class="modal-content">
                    <div class="bg-pink-500 modal-header">
                        <h5 class="modal-title" id="registerHospitalAttentionModalLabel"><i class="bi bi-ambulance"></i>
                            Registrar Atención Hospitalaria</h5>
                        <a type="button" class="btn-close" href="">X</a>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('emergencia.store') }}" method="POST">
                            @csrf

                            <div class="flex flex-wrap">
                                <div id="buttons-container" class="flex gap-1 mr-10"
                                    style=" margin: 0 auto; height: 20%; max-width: 69vh; overflow-x: auto;">
                                    <!-- Primera fila -->
                                    <button type="button" style="height: 80px; width: 100%; padding: 5px;"
                                        class="btn-nav px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                                        data-target="phase1">
                                        🚑 Ambulancia
                                    </button>
                                    <button type="button" style="height: 80px; width: 100%; padding: 5px;"
                                        class="btn-nav px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                                        data-target="phase2">
                                        🛑 Control
                                    </button>
                                    <button type="button" style="height: 80px; width: 100%; padding: 5px;"
                                        class="btn-nav px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                                        data-target="phase3">
                                        ⚠️ Accidente
                                    </button>
                                    <!-- Segunda fila -->
                                    <button type="button" style="height: 80px; width: 100%; padding: 5px;"
                                        class="btn-nav px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                                        data-target="phase4">
                                        📍 Ubicación y Motivo
                                    </button>
                                    <button type="button" style="height: 80px; width: 100%; padding: 5px;"
                                        class="btn-nav px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                                        data-target="phase5">
                                        🩺 Causa Clínica
                                    </button>
                                    <button type="button" style="height: 80px; width: 100%; padding: 5px;"
                                        id="btnphase6" style="display: none;"
                                        class="btn-nav px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                                        data-target="phase6">
                                        👶 Parto
                                    </button>
                                    <!-- Tercera fila -->
                                    <button type="button" style="height: 80px; width: 100%; padding: 5px;"
                                        class="btn-nav px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                                        data-target="phase7">
                                        ✅ Evaluación Inicial
                                    </button>
                                    <button type="button" style="height: 80px; width: 100%; padding: 5px;"
                                        class="btn-nav px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                                        data-target="phase8">
                                        🩹 Evaluación Secundaria
                                    </button>
                                    <button type="button" style="height: 80px; width: 100%; padding: 5px;"
                                        class="btn-nav px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                                        data-target="phase9">
                                        💊 Tratamiento
                                    </button>
                                </div>
                                <div style="height:80%; margin-top: 30px; margin: 0 auto;">
                                    <!-- Fase 1: Información de Ambulancia -->
                                    <div class="phase" id="phase1">
                                        <div style="max-height: 50vh; overflow-y: auto;">

                                            <h6 class="font-bold">Fase 1: Datos del Servicio</h6>
                                            <h2 style="font-size: 25px; font-weight: 700; text-align: center;">
                                                Cronometria</h2>
                                            <div style="display: flex;">
                                                <div class="form-group col-md-2" style="margin-right: 5px;">
                                                    <label for="hora_llamada" class="form-label">Hora de
                                                        Llamada</label>
                                                    <input type="time" name="hora_llamada" id="hora_llamada"
                                                        class="form-control">
                                                </div>

                                                <div class="form-group col-md-2" style="margin-right: 5px;">
                                                    <label for="hora_despacho" class="form-label">Hora de
                                                        Despacho</label>
                                                    <input type="time" name="hora_despacho" id="hora_despacho"
                                                        class="form-control">
                                                </div>

                                                <div class="form-group col-md-2" style="margin-right: 5px;">
                                                    <label for="hora_arribo" class="form-label">Hora de Arribo</label>
                                                    <input type="time" name="hora_arribo" id="hora_arribo"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div style="display: flex;">
                                                <div class="form-group col-md-2" style="margin-right: 5px;">
                                                    <label for="hora_traslado" class="form-label">Hora de
                                                        Traslado</label>
                                                    <input type="time" name="hora_traslado" id="hora_traslado"
                                                        class="form-control">
                                                </div>

                                                <div class="form-group col-md-2" style="margin-right: 5px;">
                                                    <label for="hora_hospital" class="form-label">Hora en
                                                        Hospital</label>
                                                    <input type="time" name="hora_hospital" id="hora_hospital"
                                                        class="form-control">
                                                </div>

                                                <div class="form-group col-md-2" style="margin-right: 5px;">
                                                    <label for="hora_disponible" class="form-label">Hora
                                                        Disponible</label>
                                                    <input type="time" name="hora_disponible" id="hora_disponible"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="motivo_atencion" class="form-label">Motivo de la
                                                    Atención</label>
                                                <select name="motivo_atencion" id="motivo_atencion"
                                                    class="form-select">
                                                    <option value="" disabled selected>Seleccionar</option>
                                                    <option value="1">Enfermedad</option>
                                                    <option value="2">Traumatismo</option>
                                                    <option value="3">Ginecoobstétrico</option>
                                                    <option value="4">Traslado</option>
                                                    <option value="5">Servicio Especial</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="direccion_accidente" class="form-label">Ubicación del
                                                    Servico</label>
                                                <input type="text" name="direccion_accidente"
                                                    id="direccion_accidente" class="form-control"
                                                    placeholder="Dirección del lugar del accidente">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="entre_calles_accidente" class="form-label">Entre Qué
                                                    Calles</label>
                                                <input type="text" name="entre_calles_accidente"
                                                    id="entre_calles_accidente" class="form-control"
                                                    placeholder="Calles cercanas al accidente">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="colonia_accidente" class="form-label">Colonia</label>
                                                <input type="text" name="colonia_accidente" id="colonia_accidente"
                                                    class="form-control" placeholder="Colonia del accidente">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="municipio_accidente" class="form-label">Municipio</label>
                                                <input type="text" name="municipio_accidente"
                                                    id="municipio_accidente" class="form-control"
                                                    placeholder="Municipio del accidente">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="lugar_ocurrencia" class="form-label">Lugar de
                                                    Ocurrencia</label>
                                                <select name="lugar_ocurrencia" id="lugar_ocurrencia"
                                                    class="form-select">
                                                    <option value="viapublica">Vía Pública</option>
                                                    <option value="casa">Casa</option>
                                                    <option value="trabajo">Trabajo</option>
                                                    <option value="escuela">Escuela</option>
                                                    <option value="transportepublico">Transporte Público</option>
                                                    <option value="otro">Otro</option>
                                                </select>
                                            </div>

                                            <!-- Campo adicional oculto -->
                                            <div class="form-group mb-3" id="otro_lugar_div" style="display: none;">
                                                <label for="otro_lugar" class="form-label">Especificar otro
                                                    lugar</label>
                                                <input type="text" name="otro_lugar" id="otro_lugar"
                                                    class="form-control" placeholder="Ingrese el lugar" />
                                            </div>
                                        </div>

                                        <div class="flex justify-center space-x-4 mt-4">
                                            <button type="button"
                                                class="btn-footer  px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                                                id="nextPhase1">Siguiente</button>
                                        </div>
                                    </div>
                                    <!-- Fase 2: Control -->
                                    <div class="phase" id="phase2" style="display:none;">
                                        <div style="max-height: 50vh; overflow-y: auto;">
                                            <h6 class="font-bold">Fase 2: Control</h6>
                                            <div class="form-group">
                                                <label for="ambulance_id" class="form-label">Selecciona una
                                                    Ambulancia</label>
                                                <select name="ambulance_id" id="ambulance_id" class="form-select">
                                                    <option value="" disabled selected>Seleccionar</option>
                                                    @foreach ($ambulanceServices as $service)
                                                        @php
                                                            $status = strtolower(trim($service->status)); // Normalizamos el valor del estado.
                                                        @endphp
                                                        @if ($status === 'en servicio' && $service->ambulancia)
                                                            <option value="{{ $service->ambulancia->id }}">
                                                                {{ $service->ambulancia->marca }}
                                                                ({{ $service->ambulancia->placa }})
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="chofer_id" class="form-label">Selecciona un Chofer</label>
                                                <select name="chofer_id" id="chofer_id" class="form-select">
                                                    <option value="" disabled selected>Seleccionar</option>
                                                    @if (isset($personal) && count($personal) > 0)
                                                        @foreach ($personal as $person)
                                                            @php
                                                                $cargo = strtolower(trim($person->Cargo)); // Normalizamos el valor del cargo
                                                            @endphp
                                                            @if ($cargo === 'chofer')
                                                                <option value="{{ $person->id }}">
                                                                    {{ $person->Nombre }}
                                                                    {{ $person->apellido_paterno }}
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


                                            <div class="form-group">
                                                <label for="paramedico_id" class="form-label">Selecciona un
                                                    Paramédico</label>
                                                <select name="paramedico_id" id="paramedico_id" class="form-select">
                                                    <option value="" disabled selected>Seleccionar</option>
                                                    @foreach ($personal as $person)
                                                        @php
                                                            $cargo = strtolower(trim($person->Cargo)); // Normalizamos el valor del cargo
                                                        @endphp
                                                        @if ($cargo === 'paramédico')
                                                            <option value="{{ $person->id }}">
                                                                {{ $person->Nombre }} {{ $person->apellido_paterno }}
                                                                {{ $person->apellido_materno }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="ambulance_id" class="form-label">Selecciona un
                                                    Helicoptero(Opcional)</label>
                                                <select name="helicoptero_id" id="helicoptero_id"
                                                    class="form-select">
                                                    <option value="" disabled selected>Seleccionar</option>
                                                    @foreach ($helicopteros as $helicoptero)
                                                        @php
                                                            $tipo = strtolower(trim($helicoptero->tipo)); // Normalizamos el valor del estado.
                                                        @endphp
                                                        @if ($tipo === 'helicoptero')
                                                            <option value="{{ $helicoptero->id }}">
                                                                {{ $helicoptero->marca }}
                                                                ({{ $helicoptero->placa }})
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="flex justify-center space-x-4 mt-4">
                                            <button type="button"
                                                class="btn-footer px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                                                id="nextPhase2">Siguiente</button>
                                            <button type="button"
                                                class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600"
                                                id="prevPhase2">Atrás</button>
                                        </div>
                                    </div>
                                    <!-- Fase 3: Detalles del Accidente -->
                                    <div class="phase" id="phase3" style="display:none;">
                                        <div style="max-height: 50vh; overflow-y: auto;">
                                            <h6 class="font-bold">Fase 3: Datos del Paciente</h6>
                                            <div class="form-group mb-3">
                                                <label for="nombre" class="form-label">Nombre</label>
                                                <input type="text" name="nombre" id="nombre"
                                                    class="form-control" placeholder="Nombre del paciente">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="apellidopaterno" class="form-label">Apellido
                                                    Paterno</label>
                                                <input type="text" name="apellidopaterno" id="apellidopaterno"
                                                    class="form-control" placeholder="Apellido paterno">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="apellidomaterno" class="form-label">Apellido
                                                    Materno</label>
                                                <input type="text" name="apellidomaterno" id="apellidomaterno"
                                                    class="form-control" placeholder="Apellido materno">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="edad" class="form-label">Edad</label>
                                                <input type="number" name="edad" id="edad"
                                                    class="form-control" placeholder="Edad del paciente">
                                            </div>
                                            <div class="form-group mb-3" id="meses-container" style="display: none;">
                                                <label for="meses" class="form-label">Meses</label>
                                                <input type="number" name="meses" id="meses"
                                                    class="form-control" placeholder="Meses del paciente"
                                                    min="1" max="11">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="sexo" class="form-label">Sexo</label>
                                                <select name="sexo" id="sexo" class="form-select">
                                                    <option value="masculino">Masculino</option>
                                                    <option value="femenino">Femenino</option>
                                                    <option value="otro">Otro</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="tipo_sangre" class="form-label">Tipo de Sangre</label>
                                                <input type="text" name="tipo_sangre" id="tipo_sangre"
                                                    class="form-control" placeholder="Tipo de sangre">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="domicilio" class="form-label">Domicilio</label>
                                                <input type="text" name="domicilio" id="domicilio"
                                                    class="form-control" placeholder="Domicilio del paciente">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="colonia" class="form-label">Colonia / Comunidad</label>
                                                <input type="text" name="colonia" id="colonia"
                                                    class="form-control" placeholder="Colonia del paciente">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="alcaldia" class="form-label">Alcaldia / Municipio</label>
                                                <input type="text" name="alcaldia" id="alcaldia"
                                                    class="form-control" placeholder="Alcaldia del paciente">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="telefono" class="form-label">Teléfono</label>
                                                <input type="text" name="telefono" id="telefono"
                                                    class="form-control" placeholder="Teléfono de contacto">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="ocupacion" class="form-label">Ocupación</label>
                                                <input type="text" name="ocupacion" id="ocupacion"
                                                    class="form-control" placeholder="Ocupación del paciente">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="derechohabiente"
                                                    class="form-label">Derechohabiente</label>
                                                <input type="text" name="derechohabiente" id="derechohabiente"
                                                    class="form-control"
                                                    placeholder="Institución de derechohabiencia">
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="companiaseguro" class="form-label">Compañia seguro gastos
                                                    medicos</label>
                                                <input type="text" name="companiaseguro" id="companiaseguro"
                                                    class="form-control"
                                                    placeholder="Compañia de seguro de gastos medicos del paciente">
                                            </div>
                                        </div>
                                        <div class="flex justify-center space-x-4 mt-4">
                                            <button type="button"
                                                class="btn-footer px-4 py-2 bg-pink-500 text-white rounded-md"
                                                id="nextPhase3">Siguiente</button>
                                            <button type="button"
                                                class="btn px-4 py-2 bg-gray-500 text-white rounded-md"
                                                id="prevPhase3">Atrás</button>
                                        </div>
                                    </div>
                                    <!-- Fase 4: Información de Ubicación y Motivo -->
                                    <div class="phase" id="phase4" style="display:none;">
                                        <div style="max-height: 50vh; overflow-y: auto;">
                                            <h6>Fase 4: Causas Traumática</h6>

                                            <div class="form-group">
                                                <label for="agente_causal" class="form-label">Agente Causal</label>
                                                <select name="agente_causal" id="agente_causal" class="form-select">
                                                    <option value="" disabled selected>Selecciona una opción
                                                    </option>
                                                    <option value="arma">1. Arma</option>
                                                    <option value="juguete">2. Juguete</option>
                                                    <option value="automotor">3. Automotor</option>
                                                    <option value="bicicleta_scooter">4. Bicicleta / Scooter</option>
                                                    <option value="producto_biologico_quimico">5. Producto Biológico /
                                                        Químico
                                                    </option>
                                                    <option value="maquinaria">6. Maquinaria</option>
                                                    <option value="herramienta">7. Herramienta</option>
                                                    <option value="fuego">8. Fuego</option>
                                                    <option value="sustancia_objeto_caliente">9. Sustancia / Objeto
                                                        Caliente
                                                    </option>
                                                    <option value="sustancia_toxica">10. Sustancia Tóxica</option>
                                                    <option value="electricidad">11. Electricidad</option>
                                                    <option value="explosion">12. Explosión</option>
                                                    <option value="ser_humano">13. Ser Humano</option>
                                                    <option value="animal">14. Animal</option>
                                                    <option value="otro">15. Otro</option>
                                                </select>
                                            </div>

                                            <div class="form-group mt-3" id="especificar_otro"
                                                style="display: none;">
                                                <label for="especificar" class="form-label">Especifique</label>
                                                <input type="text" name="especificar" id="especificar"
                                                    class="form-control" placeholder="Especifique el agente causal">
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="lesionescausadas" class="form-label">Lesiones causadas
                                                    por</label>
                                                <input type="text" name="lesionescausadas" id="lesionescausadas"
                                                    class="form-control" placeholder="Lesiones causadas por">
                                            </div>

                                            <div class="form-group">
                                                <label for="tipo_accidente" class="form-label">Tipo de
                                                    Accidente</label>
                                                <select id="tipo_accidente" name="tipo_accidente"
                                                    class="form-control" onchange="mostrarDetallesAccidente()">
                                                    <option value="">Seleccione el tipo de accidente</option>
                                                    <option value="automovilistico">Automovilístico</option>
                                                    <option value="atropellado">Atropellado</option>
                                                </select>
                                            </div>

                                            <div id="accidente_atropellado" style="display: none;">
                                                <div class="form-group">
                                                    <label for="atropelladopor" class="form-label">Atropellado
                                                        por</label>
                                                    <select id="atropelladopor" name="atropelladopor"
                                                        class="form-control" onchange="mostrarDetallesAccidente()">
                                                        <option value="">Seleccione el tipo de accidente</option>
                                                        <option value="motocicleta">Motocicleta</option>
                                                        <option value="automotor">AutoMotor</option>
                                                        <option value="bicicleta">Bicicleta</option>
                                                        <option value="maquinaria">Maquinaria</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div id="accidente_automovilistico" style="display: none;">
                                                <div class="form-group" id="select_automovilistico">
                                                    <label for="colision" class="form-label">Accidente
                                                        Automovilístico</label>
                                                    <select id="colision" name="colision" class="form-control">
                                                        <option value="colision">Colisión</option>
                                                        <option value="moto">Motocicleta</option>
                                                        <option value="automotor">Automotor</option>
                                                        <option value="bicicleta">Bicicleta</option>
                                                        <option value="maquinaria">Maquinaria</option>
                                                    </select>
                                                </div>

                                                <h6 class="font-bold" style="text-align: center;">Sobre la Colisión
                                                </h6>

                                                <div class="form-group">
                                                    <label for="contraobjeto" class="form-label">Contra Objeto</label>
                                                    <select name="contraobjeto" id="contraobjeto"
                                                        class="form-select">
                                                        <option value="" disabled selected>Selecciona una opción
                                                        </option>
                                                        <option value="fijo">Fijo</option>
                                                        <option value="en movimiento">En Movimiento</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="impacto" class="form-label">Impacto</label>
                                                    <select name="impacto" id="impacto" class="form-select">
                                                        <option value="" disabled selected>Selecciona una opción
                                                        </option>
                                                        <option value="frontal">Frontal</option>
                                                        <option value="lateral">Lateral</option>
                                                        <option value="posterior">Posterior</option>
                                                    </select>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="hundimiento" class="form-label">Hundimiento</label>
                                                    <div
                                                        style="display: flex; align-items: center; justify-content: center;">
                                                        <input type="number" name="hundimiento" id="hundimiento"
                                                            class="form-control" placeholder="Hundimiento"
                                                            style="max-width: 90%;">
                                                        <span
                                                            style="margin-left: 8px; font-weight: bold; font-size: 1rem;">CMS</span>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="parabrisas" class="form-label">Parabrisas</label>
                                                    <select name="parabrisas" id="parabrisas" class="form-select">
                                                        <option value="" disabled selected>Selecciona una opción
                                                        </option>
                                                        <option value="integro">Integro</option>
                                                        <option value="rotodoblado">Roto Doblado</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="volante" class="form-label">Volante</label>
                                                    <select name="volante" id="volante" class="form-select">
                                                        <option value="" disabled selected>Selecciona una opción
                                                        </option>
                                                        <option value="integro">Integro</option>
                                                        <option value="doblado">Doblado</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="bolsaaire" class="form-label">Bolsa De Aire</label>
                                                    <select name="bolsaaire" id="bolsaaire" class="form-select">
                                                        <option value="" disabled selected>Selecciona una opción
                                                        </option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="cinturon" class="form-label">Cinturón de
                                                        Seguridad</label>
                                                    <select name="cinturon" id="cinturon" class="form-select">
                                                        <option value="" disabled selected>Selecciona una opción
                                                        </option>
                                                        <option value="colocado">Colocado</option>
                                                        <option value="nocolocado">No Colocado</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="dentrovehiculo" class="form-label">Dentro del
                                                        Vehículo</label>
                                                    <select name="dentrovehiculo" id="dentrovehiculo"
                                                        class="form-select">
                                                        <option value="" disabled selected>Selecciona una opción
                                                        </option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                        <option value="eyectado">Eyectado</option>
                                                        <option value="prensado">Prensado</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-center space-x-4 mt-4">
                                            <button type="button"
                                                class="btn-footer px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                                                id="nextPhase4">Siguiente</button>
                                            <button type="button"
                                                class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600"
                                                id="prevPhase4">Atrás</button>
                                        </div>
                                    </div>
                                    <!-- Fase 5: Causa Clinica -->
                                    <div class="phase" id="phase5" style="display:none;">
                                        <div id="Fase5">
                                            <div style="max-height: 50vh; overflow-y: auto;">
                                                <h6>Fase 5: Causa Clinica</h6>
                                                <div class="form-group">
                                                    <label for="origen_probable" class="form-label">Origen
                                                        Probable</label>
                                                    <select id="origen_probable" name="origen_probable"
                                                        class="form-control">
                                                        <option value="">Seleccione el origen probable</option>
                                                        <option value="neurologica">Neurológica</option>
                                                        <option value="cardiovascular">Cardiovascular</option>
                                                        <option value="respiratorio">Respiratorio</option>
                                                        <option value="metabolico">Metabólico</option>
                                                        <option value="digestiva">Digestiva</option>
                                                        <option value="urogenital">Urogenital</option>
                                                        <option value="gineco_obstetrica">Gineco-Obstetrica</option>
                                                        <option value="Cognitivo_emocional">Cognitivo / Emocional
                                                        </option>

                                                        <option value="musculo_esqueletico">Músculo Esquelético
                                                        </option>
                                                        <option value="infecciosa">Infecciosa</option>
                                                        <option value="oncologico">Oncológico</option>
                                                        <option value="otro">Otro</option>
                                                    </select>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="especificarOrigen"
                                                        class="form-label">Especifique</label>
                                                    <input type="text" name="especificarOrigen"
                                                        id="especificarOrigen" class="form-control"
                                                        placeholder="Especifique el origen probable">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="primeravez" class="form-label">1° Vez</label>
                                                    <input type="text" name="primeravez" id="primeravez"
                                                        class="form-control" placeholder="1° Vez">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="subsecuente" class="form-label">Subsecuente</label>
                                                    <input type="text" name="subsecuente" id="subsecuente"
                                                        class="form-control" placeholder="Subsecuente">
                                                </div>
                                            </div>

                                            <div class="flex justify-center space-x-4 mt-4">
                                                <button type="button"
                                                    class="btn-footer px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                                                    id="nextPhase5">Siguiente</button>
                                                <button type="button"
                                                    class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600"
                                                    id="prevPhase5">Atrás</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fase 6: Parto -->
                                    <div class="phase" id="phase6" style="display: none;">
                                        <div style="max-height: 50vh; overflow-y: auto;">
                                            <h6 class="font-bold">Fase 6: Parto</h6>

                                            <h5 style="text-align: center;">Datos de la Madre</h5>
                                            <div class="form-group mt-3">
                                                <label for="gesta" class="form-label">Gesta</label>
                                                <input type="text" name="gesta" id="gesta"
                                                    class="form-control" placeholder="Especifique la Gesta">
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="cesareas" class="form-label">Cesáreas</label>
                                                <input type="text" name="cesareas" id="cesareas"
                                                    class="form-control" placeholder="Número de cesáreas">
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="para" class="form-label">Para</label>
                                                <input type="text" name="para" id="para"
                                                    class="form-control" placeholder="Número de partos">
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="aborto" class="form-label">Aborto</label>
                                                <input type="text" name="aborto" id="aborto"
                                                    class="form-control" placeholder="Número de abortos">
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="semanas" class="form-label">Semanas de Gestación</label>
                                                <input type="text" name="semanas" id="semanas"
                                                    class="form-control" placeholder="Semanas de gestación">
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="fechaParto" class="form-label">Fecha Probable de
                                                    Parto</label>
                                                <input type="date" name="fechaParto" id="fechaParto"
                                                    class="form-control">
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="membranas" class="form-label">Membranas</label>
                                                <input type="text" name="membranas" id="membranas"
                                                    class="form-control" placeholder="Estado de las membranas">
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="fum" class="form-label">F.U.M. (Fecha de Última
                                                    Menstruación)</label>
                                                <input type="date" name="fum" id="fum"
                                                    class="form-control">
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="horaContracciones" class="form-label">Hora de Inicio de
                                                    Contracciones</label>
                                                <input type="time" name="horaContracciones" id="horaContracciones"
                                                    class="form-control">
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="frecuencia" class="form-label">Frecuencia</label>
                                                <input type="text" name="frecuencia" id="frecuencia"
                                                    class="form-control" placeholder="Frecuencia de contracciones">
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="duracion" class="form-label">Duración</label>
                                                <input type="text" name="duracion" id="duracion"
                                                    class="form-control" placeholder="Duración de contracciones">
                                            </div>

                                            <h5 style="text-align: center;">Datos Post-Parto</h5>

                                            <div class="form-group mt-3">
                                                <label for="horanacimiento" class="form-label">Hora de
                                                    Nacimeinto</label>
                                                <input type="time" name="horanacimiento" id="horanacimiento"
                                                    class="form-control" placeholder="Ingrese la hora de Nacimiento">
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="lugar_post-parto" class="form-label">Lugar</label>
                                                <input type="text" name="lugar_post-parto" id="lugar_post-parto"
                                                    class="form-control" placeholder="Ingrese el lugar">
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="placenta_expulsada"
                                                    class="form-label">placenta_expulsada</label>
                                                <input type="text" name="placenta_expulsada"
                                                    id="placenta_expulsada" class="form-control"
                                                    placeholder="placenta_expulsada">
                                            </div>

                                            <h5 style="text-align: center;">Datos del Recien Nacido</h5>

                                            <div class="form-group mb-3">
                                                <label for="estado_producto" class="form-label">Sexo</label>
                                                <select name="estado_producto" id="estado_producto"
                                                    class="form-select">
                                                    <option value="vivo">Vivo</option>
                                                    <option value="muerto">Muerto</option>
                                                </select>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="genero_producto" class="form-label">Genero</label>
                                                <select name="genero_producto" id="genero_producto"
                                                    class="form-select">
                                                    <option value="masculino">Masculino</option>
                                                    <option value="femenino">Femenino</option>
                                                </select>
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="apgar1" class="form-label">APGAR (1 Minuto)</label>
                                                <input type="number" name="apgar1" id="apgar1"
                                                    class="form-control" placeholder="Puntaje (0-10)" min="0"
                                                    max="10">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="apgar5" class="form-label">APGAR (5 Minutos)</label>
                                                <input type="number" name="apgar5" id="apgar5"
                                                    class="form-control" placeholder="Puntaje (0-10)" min="0"
                                                    max="10">
                                            </div>
                                        </div>

                                        <div class="flex justify-center space-x-4 mt-4">
                                            <button type="button"
                                                class="btn-footer px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                                                id="nextPhase6">Siguiente</button>
                                            <button type="button"
                                                class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600"
                                                id="prevPhase6">Atrás</button>
                                        </div>
                                    </div>
                                    <!-- Fase 7: Evaluación Inicial -->
                                    <div class="phase" id="phase7" style="display: none;">
                                        <div style="max-height: 50vh; overflow-y: auto;">
                                            <h6 class="font-bold">Fase 7: Evaluación Inicial</h6>
                                            <div class="form-group">
                                                <label for="nivel_conciencia" class="form-label">Nivel de
                                                    Conciencia</label>
                                                <select id="nivel_conciencia" name="nivel_conciencia"
                                                    class="form-control">
                                                    <option value="">Seleccione el Nivel de Conciencia</option>
                                                    <option value="alerta">Alerta</option>
                                                    <option value="respuesta_estimuloverbal">Respuesta a Estímulo
                                                        Verbal</option>
                                                    <option value="respuesta_estimulodoloroso">Respuesta a Estímulo
                                                        Doloroso
                                                    </option>
                                                    <option value="inconciente">Inconsciente</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="viaaerea" class="form-label">Vía Aérea</label>
                                                <select id="viaaerea" name="viaaerea" class="form-control">
                                                    <option value="">Seleccione la Vía Aérea</option>
                                                    <option value="permeable">Permeable</option>
                                                    <option value="comprometida">Comprometida</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="reflejo_deglutacion" class="form-label">Reflejo de
                                                    Deglución</label>
                                                <select id="reflejo_deglutacion" name="reflejo_deglutacion"
                                                    class="form-control">
                                                    <option value="">Seleccione el Reflejo de Deglución</option>
                                                    <option value="ausente">Ausente</option>
                                                    <option value="presente">Presente</option>
                                                </select>
                                            </div>

                                            <h5 class="font-bold" style="text-align: center;">Ventilación</h5>

                                            <div class="form-group">
                                                <label for="ventilacion_observacion"
                                                    class="form-label">Observación</label>
                                                <select id="ventilacion_observacion" name="ventilacion_observacion"
                                                    class="form-control">
                                                    <option value="">Seleccione la Observación</option>
                                                    <option value="automatismo_regular">Automatismo Regular</option>
                                                    <option value="automatismo_irregular">Automatismo Irregular
                                                    </option>
                                                    <option value="ventilacion_rapida">Ventilación Rápida</option>
                                                    <option value="ventilacion_superficial">Ventilación Superficial
                                                    </option>
                                                    <option value="apnea">Apnea</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="ventilacion_auscultacion"
                                                    class="form-label">Auscultación</label>
                                                <select id="ventilacion_auscultacion" name="ventilacion_auscultacion"
                                                    class="form-control">
                                                    <option value="">Seleccione la Auscultación</option>
                                                    <option value="ruidos_normales">Ruidos Respiratorios Normales
                                                    </option>
                                                    <option value="ruidos_disminuidos">Ruidos Respiratorios Disminuidos
                                                    </option>
                                                    <option value="ruidos_ausentes">Ruidos Respiratorios Ausentes
                                                    </option>
                                                    <option value="estertores">Estertores</option>
                                                    <option value="sibilancias">Sibilancias</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="ventilacion_hemitorax"
                                                    class="form-label">Hemitorax</label>
                                                <select id="ventilacion_hemitorax" name="ventilacion_hemitorax"
                                                    class="form-control">
                                                    <option value="">Seleccione el Hemitorax</option>
                                                    <option value="derecho">Derecho</option>
                                                    <option value="izquierdo">Izquierdo</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="ventilacion_sitio" class="form-label">Sitio</label>
                                                <select id="ventilacion_sitio" name="ventilacion_sitio"
                                                    class="form-control">
                                                    <option value="">Seleccione el Sitio</option>
                                                    <option value="apical">Apical</option>
                                                    <option value="base">Base</option>
                                                </select>
                                            </div>

                                            <h5 class="font-bold" style="text-align: center;">Circulación</h5>

                                            <div class="form-group">
                                                <label for="circulacion_pulsos" class="form-label">Presencia de
                                                    Pulsos</label>
                                                <select id="circulacion_pulsos" name="circulacion_pulsos"
                                                    class="form-control">
                                                    <option value="">Seleccione la Presencia de Pulsos</option>
                                                    <option value="carotideo">Carotídeo</option>
                                                    <option value="radial">Radial</option>
                                                    <option value="paro_cardiaco">Paro Cardiorespiratorio</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="circulacion_calidad" class="form-label">Calidad</label>
                                                <select id="circulacion_calidad" name="circulacion_calidad"
                                                    class="form-control">
                                                    <option value="">Seleccione la Calidad</option>
                                                    <option value="normal">Normal</option>
                                                    <option value="rapido">Rápido</option>
                                                    <option value="lento">Lento</option>
                                                    <option value="ritmico">Rítmico</option>
                                                    <option value="arritmico">Arrítmico</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="circulacion_piel" class="form-label">Piel</label>
                                                <select id="circulacion_piel" name="circulacion_piel"
                                                    class="form-control">
                                                    <option value="">Seleccione el Estado de la Piel</option>
                                                    <option value="normal">Normal</option>
                                                    <option value="palida">Pálida</option>
                                                    <option value="cianotica">Cianótica</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="circulacion_caracteristicas"
                                                    class="form-label">Características</label>
                                                <select id="circulacion_caracteristicas"
                                                    name="circulacion_caracteristicas" class="form-control">
                                                    <option value="">Seleccione las Características</option>
                                                    <option value="normal">Normal</option>
                                                    <option value="caliente">Caliente</option>
                                                    <option value="fria">Fría</option>
                                                    <option value="diaforesis">Diaforesis</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="flex justify-center space-x-4 mt-4">
                                            <button type="button"
                                                class="btn-footer px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                                                id="nextPhase7">Siguiente</button>
                                            <button type="button"
                                                class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600"
                                                id="prevPhase7">Atrás</button>
                                        </div>
                                    </div>
                                    <!-- Fase 8: Evaluación Secundaria -->
                                    <div class="phase" id="phase8" style="display:none;">/
                                        <div style="max-height: 50vh; overflow-y: auto;">
                                            <h6 class="font-bold">Fase 8: Evaluación Secundaria</h6>

                                            <!-- Exploración Física -->
                                            <div>
                                                <h5 class="font-bold cursor-pointer toggle-section flex items-center">
                                                    Exploración Física
                                                    <svg class="ml-2 transition-transform transform rotate-0"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" width="20" height="20">
                                                        <path fill-rule="evenodd"
                                                            d="M12 16.293l5.293-5.293-1.414-1.414L12 13.465 8.121 9.586 6.707 11l5.293 5.293z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </h5>
                                                <div class="section-content" style="display: none;">
                                                    <div style="max-height: 130px; overflow-y: auto;">
                                                        <table
                                                            class="table-auto border-collapse border border-gray-500 w-full">
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
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        1</td>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        <input type="checkbox" id="deformidades"
                                                                            name="exploracion_fisica[]"
                                                                            value="deformidades">
                                                                    </td>
                                                                    <td class="border border-gray-500 px-2 py-1">
                                                                        Deformidades</td>
                                                                    <td class="border border-gray-500 px-2 py-1">D</td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        2</td>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        <input type="checkbox" id="contusiones"
                                                                            name="exploracion_fisica[]"
                                                                            value="contusiones">
                                                                    </td>
                                                                    <td class="border border-gray-500 px-2 py-1">
                                                                        Contusiones</td>
                                                                    <td class="border border-gray-500 px-2 py-1">CD
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        3</td>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        <input type="checkbox" id="abrasiones"
                                                                            name="exploracion_fisica[]"
                                                                            value="abrasiones">
                                                                    </td>
                                                                    <td class="border border-gray-500 px-2 py-1">
                                                                        Abrasiones</td>
                                                                    <td class="border border-gray-500 px-2 py-1">A</td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        4</td>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        <input type="checkbox" id="penetraciones"
                                                                            name="exploracion_fisica[]"
                                                                            value="penetraciones">
                                                                    </td>
                                                                    <td class="border border-gray-500 px-2 py-1">
                                                                        Penetraciones</td>
                                                                    <td class="border border-gray-500 px-2 py-1">P</td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        5</td>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        <input type="checkbox"
                                                                            id="movimiento_paradójico"
                                                                            name="exploracion_fisica[]"
                                                                            value="movimiento_paradójico">
                                                                    </td>
                                                                    <td class="border border-gray-500 px-2 py-1">
                                                                        Movimiento Paradójico</td>
                                                                    <td class="border border-gray-500 px-2 py-1">MP
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        6</td>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        <input type="checkbox" id="crepitacion"
                                                                            name="exploracion_fisica[]"
                                                                            value="crepitacion">
                                                                    </td>
                                                                    <td class="border border-gray-500 px-2 py-1">
                                                                        Crepitación</td>
                                                                    <td class="border border-gray-500 px-2 py-1">C</td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        7</td>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        <input type="checkbox" id="heridas"
                                                                            name="exploracion_fisica[]"
                                                                            value="heridas">
                                                                    </td>
                                                                    <td class="border border-gray-500 px-2 py-1">
                                                                        Heridas</td>
                                                                    <td class="border border-gray-500 px-2 py-1">H</td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        8</td>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        <input type="checkbox" id="fracturas"
                                                                            name="exploracion_fisica[]"
                                                                            value="fracturas">
                                                                    </td>
                                                                    <td class="border border-gray-500 px-2 py-1">
                                                                        Fracturas</td>
                                                                    <td class="border border-gray-500 px-2 py-1">F
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        9</td>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        <input type="checkbox"
                                                                            id="enfisema_subcutaneo"
                                                                            name="exploracion_fisica[]"
                                                                            value="enfisema_subcutaneo">
                                                                    </td>
                                                                    <td class="border border-gray-500 px-2 py-1">
                                                                        Enfisema Subcutáneo</td>
                                                                    <td class="border border-gray-500 px-2 py-1">ES
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        10</td>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        <input type="checkbox" id="quemaduras"
                                                                            name="exploracion_fisica[]"
                                                                            value="quemaduras">
                                                                    </td>
                                                                    <td class="border border-gray-500 px-2 py-1">
                                                                        Quemaduras</td>
                                                                    <td class="border border-gray-500 px-2 py-1">Q
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        11</td>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        <input type="checkbox" id="laceraciones"
                                                                            name="exploracion_fisica[]"
                                                                            value="laceraciones">
                                                                    </td>
                                                                    <td class="border border-gray-500 px-2 py-1">
                                                                        Laceraciones</td>
                                                                    <td class="border border-gray-500 px-2 py-1">L
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        12</td>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        <input type="checkbox" id="edema"
                                                                            name="exploracion_fisica[]"
                                                                            value="edema">
                                                                    </td>
                                                                    <td class="border border-gray-500 px-2 py-1">Edema
                                                                    </td>
                                                                    <td class="border border-gray-500 px-2 py-1">E
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        13</td>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        <input type="checkbox"
                                                                            id="alteracion_sensibilidad"
                                                                            name="exploracion_fisica[]"
                                                                            value="alteracion_sensibilidad">
                                                                    </td>
                                                                    <td class="border border-gray-500 px-2 py-1">
                                                                        Alteración de Sensibilidad</td>
                                                                    <td class="border border-gray-500 px-2 py-1">AS
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        14</td>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        <input type="checkbox"
                                                                            id="alteracion_movilidad"
                                                                            name="exploracion_fisica[]"
                                                                            value="alteracion_movilidad">
                                                                    </td>
                                                                    <td class="border border-gray-500 px-2 py-1">
                                                                        Alteración de Movilidad</td>
                                                                    <td class="border border-gray-500 px-2 py-1">AM
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        15</td>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        <input type="checkbox" id="dolor"
                                                                            name="exploracion_fisica[]"
                                                                            value="dolor">
                                                                    </td>
                                                                    <td class="border border-gray-500 px-2 py-1">Dolor
                                                                    </td>
                                                                    <td class="border border-gray-500 px-2 py-1">DO
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        16</td>
                                                                    <td
                                                                        class="border border-gray-500 px-2 py-1 text-center">
                                                                        <input type="checkbox" id="amputacion"
                                                                            name="exploracion_fisica[]"
                                                                            value="amputacion">
                                                                    </td>
                                                                    <td class="border border-gray-500 px-2 py-1">
                                                                        Amputación</td>
                                                                    <td class="border border-gray-500 px-2 py-1">AP
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Zonas de Lesión -->
                                            <div>
                                                <h5 class="font-bold cursor-pointer toggle-section flex items-center">
                                                    Zonas de Lesión
                                                    <svg class="ml-2 transition-transform transform rotate-0"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" width="20" height="20">
                                                        <path fill-rule="evenodd"
                                                            d="M12 16.293l5.293-5.293-1.414-1.414L12 13.465 8.121 9.586 6.707 11l5.293 5.293z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </h5>
                                                <div class="section-content" style="display: none;">
                                                    <p>Haz clic en la imagen del cuerpo humano para marcar las zonas de
                                                        lesión:</p>

                                                    <div style="display: none;">
                                                        <input type="text" id="coordinate" name="coordinate">
                                                        <input type="text" id="zonaslabel" name="zonaslabel">
                                                    </div>

                                                    <!-- Canvas para la imagen del cuerpo humano -->
                                                    <div class="flex justify-center">
                                                        <canvas id="bodyCanvas" width="400" height="405"
                                                            class="border"></canvas>
                                                    </div>

                                                    <!-- Lista de puntos marcados -->
                                                    <div id="zonasMarcadas" class="mt-4 text-center"
                                                        style="height: 20vh; overflow-y: auto;">
                                                        <h6 class="font-bold">Zonas Marcadas:</h6>
                                                        <ul id="listaZonas"
                                                            class="list-disc inline-block text-left"></ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Pupilas -->
                                            <div>
                                                <h5 class="font-bold cursor-pointer toggle-section flex items-center">
                                                    Pupilas
                                                    <svg class="ml-2 transition-transform transform rotate-0"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" width="20" height="20">
                                                        <path fill-rule="evenodd"
                                                            d="M12 16.293l5.293-5.293-1.414-1.414L12 13.465 8.121 9.586 6.707 11l5.293 5.293z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </h5>
                                                <div class="section-content" style="display: none;">
                                                    <table
                                                        style="width: 100%; border-collapse: collapse; text-align: center;">
                                                        <thead>
                                                            <tr>
                                                                <th
                                                                    style="border-bottom: 2px solid #000; padding: 10px;">
                                                                    Imagen</th>
                                                                <th
                                                                    style="border-bottom: 2px solid #000; padding: 10px;">
                                                                    Seleccionar</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <img src="{{ asset('images/recursos/ojos2.jpg') }}"
                                                                        width="300" alt="Ojos 1">
                                                                </td>
                                                                <td>
                                                                    <label for="ojos1">
                                                                        <input type="radio" name="ojos"
                                                                            id="ojos1" value="1">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <img src="{{ asset('images/recursos/ojos5.jpg') }}"
                                                                        width="300" alt="Ojos 2">
                                                                </td>
                                                                <td>
                                                                    <label for="ojos2">
                                                                        <input type="radio" name="ojos"
                                                                            id="ojos2" value="2">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <img src="{{ asset('images/recursos/ojos4.jpg') }}"
                                                                        width="300" alt="Ojos 3">
                                                                </td>
                                                                <td>
                                                                    <label for="ojos3">
                                                                        <input type="radio" name="ojos"
                                                                            id="ojos3" value="3">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <img src="{{ asset('images/recursos/dilatados.jpg') }}"
                                                                        width="300" alt="Ojos 4">
                                                                </td>
                                                                <td>
                                                                    <label for="ojos4">
                                                                        <input type="radio" name="ojos"
                                                                            id="ojos4" value="4">

                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <img src="{{ asset('images/recursos/ojos3.jpg') }}"
                                                                        width="300" alt="Ojos 5">
                                                                </td>
                                                                <td>
                                                                    <label for="ojos5">
                                                                        <input type="radio" name="ojos"
                                                                            id="ojos5" value="5">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- Signos Vitales y Monitoreo -->
                                            <div>
                                                <h5 class="font-bold cursor-pointer toggle-section flex items-center">
                                                    Signos Vitales y Monitoreo
                                                    <svg class="ml-2 transition-transform transform rotate-0"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" width="20" height="20">
                                                        <path fill-rule="evenodd"
                                                            d="M12 16.293l5.293-5.293-1.414-1.414L12 13.465 8.121 9.586 6.707 11l5.293 5.293z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </h5>
                                                <div class="section-content" style="display: none;">
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
                                                            <input type="time" name="hora_es"
                                                                class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center"
                                                                step="1">

                                                        </div>
                                                        <div class="border border-gray-500 p-1">
                                                            <input type="number" name="fr" min="0"
                                                                step=".1"
                                                                class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center">
                                                        </div>
                                                        <div class="border border-gray-500 p-1">
                                                            <input type="number" name="fc" min="0"
                                                                step=".1"
                                                                class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center">
                                                        </div>
                                                        <div class="border border-gray-500 p-1">
                                                            <input type="number" min="0" step=".1"
                                                                name="tas"
                                                                class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center">
                                                        </div>
                                                        <div class="border border-gray-500 p-1">
                                                            <input type="number" min="0" step=".1"
                                                                name="tad"
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
                                                                class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center">
                                                        </div>
                                                        <div class="border border-gray-500 p-1">
                                                            <input type="number" min="0" step=".1"
                                                                name="temp"
                                                                class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center">
                                                        </div>
                                                        <div class="border border-gray-500 p-1">
                                                            <input type="number" min="0" step=".1"
                                                                name="glasgow"
                                                                class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center">
                                                        </div>
                                                        <div class="border border-gray-500 p-1">
                                                            <input type="number" min="0" step=".1"
                                                                name="trauma_score"
                                                                class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center">
                                                        </div>
                                                        <div class="border border-gray-500 p-1">
                                                            <input type="number" min="0" step=".1"
                                                                name="ekg"
                                                                class="form-control w-full h-10 text-sm border border-gray-400 rounded-md text-center">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Interrogatorio -->
                                            <div>
                                                <h5 class="font-bold cursor-pointer toggle-section flex items-center">
                                                    Interrogatorio
                                                    <svg class="ml-2 transition-transform transform rotate-0"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" width="20" height="20">
                                                        <path fill-rule="evenodd"
                                                            d="M12 16.293l5.293-5.293-1.414-1.414L12 13.465 8.121 9.586 6.707 11l5.293 5.293z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </h5>

                                                <div class="section-content"
                                                    style="display: none; padding-top: 8px;">
                                                    <!-- Atendido por primer responsable -->
                                                    <div class="mb-4">
                                                        <p class="font-semibold">Atendido por primer responsable:</p>
                                                        <div class="flex items-center space-x-4">
                                                            <label>
                                                                <input type="radio" name="atendido"
                                                                    value="si">
                                                                Si
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="atendido"
                                                                    value="no">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <!-- Información sobre alergias -->
                                                    <div class="mb-4">
                                                        <label for="alergias"
                                                            class="font-semibold">Alergias:</label>
                                                        <input type="text" id="alergias" name="alergias"
                                                            class="form-control w-full border border-gray-400 rounded-md"
                                                            placeholder="Ingrese alergias">
                                                    </div>

                                                    <!-- Medicamentos que está ingiriendo -->
                                                    <div class="mb-4">
                                                        <label for="medicamentos" class="font-semibold">Medicamentos
                                                            que está
                                                            ingiriendo:</label>
                                                        <input type="text" id="medicamentos"
                                                            name="medicamentos"
                                                            class="form-control w-full border border-gray-400 rounded-md"
                                                            placeholder="Ingrese medicamentos">
                                                    </div>

                                                    <!-- Enfermedades y cirugías previas -->
                                                    <div class="mb-4">
                                                        <label for="antecedentes" class="font-semibold">Enfermedades
                                                            y cirugías
                                                            previas:</label>
                                                        <input type="text" id="antecedentes"
                                                            name="antecedentes"
                                                            class="form-control w-full border border-gray-400 rounded-md"
                                                            placeholder="Ingrese antecedentes médicos">
                                                    </div>

                                                    <!-- Hora de última comida -->
                                                    <div class="mb-4">
                                                        <label for="ultima_comida" class="font-semibold">Hora de
                                                            última comida:</label>
                                                        <input type="text" id="ultima_comida"
                                                            name="ultima_comida"
                                                            class="form-control w-full border border-gray-400 rounded-md"
                                                            placeholder="Ingrese hora">
                                                    </div>

                                                    <!-- Eventos previos relacionados -->
                                                    <div class="mb-4">
                                                        <label for="eventos_previos" class="font-semibold">Eventos
                                                            previos
                                                            relacionados:</label>
                                                        <textarea id="eventos_previos" name="eventos_previos"
                                                            class="form-control w-full border border-gray-400 rounded-md" rows="3"
                                                            placeholder="Describa eventos relacionados"></textarea>
                                                    </div>

                                                    <!-- Condición del paciente -->
                                                    <div class="mb-4">
                                                        <p class="font-semibold">Condición del paciente:</p>
                                                        <div class="flex items-center space-x-4">
                                                            <label>
                                                                <input type="radio" name="condicion"
                                                                    value="critico">
                                                                Crítico
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="condicion"
                                                                    value="no_critico">
                                                                No Crítico
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="estabilidad"
                                                                    value="inestable">
                                                                Inestable
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="estabilidad"
                                                                    value="estable">
                                                                Estable
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <!-- Prioridad del paciente -->
                                                    <div class="mb-4">
                                                        <p class="font-semibold">Prioridad:</p>
                                                        <div class="flex items-center space-x-4">
                                                            <label>
                                                                <input type="radio" name="prioridad"
                                                                    value="rojo">
                                                                Rojo
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="prioridad"
                                                                    value="amarillo">
                                                                Amarillo
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="prioridad"
                                                                    value="verde">
                                                                Verde
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="prioridad"
                                                                    value="negro">
                                                                Negro
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Botones -->
                                        <div class="flex justify-center space-x-4 mt-4">
                                            <button type="button"
                                                class="btn-footer px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                                                id="nextPhase8">Siguiente</button>
                                            <button type="button"
                                                class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600"
                                                id="prevPhase8">Atrás</button>
                                        </div>
                                    </div>
                                    <!-- Fase 9: Evaluación Secundaria -->
                                    <div class="phase" id="phase9" style="display:none;">
                                        <div style="max-height: 50vh; max-width: 80vh; overflow-y: auto;">
                                            <h6 class="font-bold">Fase 9: Tratamiento</h6>

                                            <div class="mb-4">
                                                <h5 class="font-semibold">Vía Aérea:</h5>
                                                <select name="via_aerea" id="via_aerea">
                                                    <option value="aspiracion">Aspiración</option>
                                                    <option value="canula_orofaringea">Cánula Orofaríngea</option>
                                                    <option value="canula_nasofaringea">Cánula Nasofaríngea</option>
                                                    <option value="intubacion_orotraqueal">Intubación Orotraqueal
                                                    </option>
                                                    <option value="intubacion_nasotraqueal">Intubación Nasotraqueal
                                                    </option>
                                                    <option value="manual">Manual</option>
                                                    <option value="mascarilla_laringea">Mascarilla Laríngea</option>
                                                    <option value="cricotiroidotomia">Cricotiroidotomía por Punción
                                                    </option>
                                                </select>
                                                <p class="text-sm text-gray-500 mt-2">Usa Ctrl (o Cmd en Mac) para
                                                    seleccionar múltiples opciones.</p>
                                            </div>

                                            <!-- Control Cervical -->
                                            <div class="mb-4">
                                                <h5 class="font-semibold">Control Cervical:</h5>
                                                <div class="flex flex-col space-y-2">
                                                    <label>
                                                        <input type="radio" name="control_cervical"
                                                            value="manual">
                                                        Manual
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="control_cervical"
                                                            value="collarin_rigido">
                                                        Collarín Rígido
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="control_cervical"
                                                            value="collarin_blando">
                                                        Collarín Blando
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Asistencia Ventilatoria -->
                                            <div class="mb-4">
                                                <h5 class="font-semibold">Asistencia Ventilatoria:</h5>
                                                <div class="flex flex-col space-y-2">
                                                    <label>
                                                        <input type="checkbox" name="asistencia_ventilatoria[]"
                                                            value="balon_mascarilla">
                                                        Balón-Válvula-Mascarilla
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="asistencia_ventilatoria[]"
                                                            value="valvula_demanda">
                                                        Válvula de Demanda
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="asistencia_ventilatoria[]"
                                                            value="ventilador_automatico">
                                                        Ventilador Automático
                                                    </label>
                                                </div>
                                                <div class="mt-2">
                                                    <label for="FREC" class="font-semibold">Frecuencia
                                                        (FREC):</label>
                                                    <input type="text" id="FREC" name="FREC"
                                                        class="form-control w-full border border-gray-400 rounded-md">
                                                </div>
                                                <div class="mt-2">
                                                    <label for="volumen" class="font-semibold">Volumen
                                                        (VOL):</label>
                                                    <input type="text" id="volumen" name="volumen"
                                                        class="form-control w-full border border-gray-400 rounded-md">
                                                </div>
                                            </div>

                                            <!-- Oxigenoterapia -->
                                            <div class="mb-4">
                                                <h5 class="font-semibold">Oxigenoterapia:</h5>
                                                <div class="flex flex-col space-y-2">
                                                    <label>
                                                        <input type="checkbox" name="oxigenoterapia[]"
                                                            value="puntas_nasales">
                                                        Puntas Nasales
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="oxigenoterapia[]"
                                                            value="mascarilla_simple">
                                                        Mascarilla Simple
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="oxigenoterapia[]"
                                                            value="mascarilla_reservorio">
                                                        Mascarilla con Reservorio
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="oxigenoterapia[]"
                                                            value="mascarilla_venturi">
                                                        Mascarilla Venturi
                                                    </label>
                                                </div>
                                                <div class="mt-2">
                                                    <label for="litros" class="font-semibold">LTS x Min:</label>
                                                    <input type="text" id="litros" name="litros"
                                                        class="form-control w-full border border-gray-400 rounded-md">
                                                </div>
                                            </div>

                                            <!-- Procedimientos adicionales -->
                                            <div class="mb-4">
                                                <h5 class="font-semibold">Procedimientos Adicionales:</h5>
                                                <div class="flex flex-col space-y-2">
                                                    <label>
                                                        <input type="checkbox" name="procedimientos_adicionales[]"
                                                            value="hiperventilacion">
                                                        Hiperventilación
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="procedimientos_adicionales[]"
                                                            value="descompresion_pleural">
                                                        Descompresión Pleural con Aguja
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="procedimientos_adicionales[]"
                                                            value="hemitorax_derecho">
                                                        Hemitórax Derecho
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="procedimientos_adicionales[]"
                                                            value="hemitorax_izquierdo">
                                                        Hemitórax Izquierdo
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Control de Hemorragias -->
                                            <div class="mb-4">
                                                <h5 class="font-semibold">Control de Hemorragias:</h5>
                                                <div class="flex flex-col space-y-2">
                                                    <label>
                                                        <input type="checkbox" name="control_hemorragias[]"
                                                            value="presion_directa">
                                                        Presión Directa
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="control_hemorragias[]"
                                                            value="torniquete">
                                                        Torniquete
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="control_hemorragias[]"
                                                            value="empaquetamiento">
                                                        Empaquetamiento
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="control_hemorragias[]"
                                                            value="vendaje_compresivo">
                                                        Vendaje Compresivo
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Vías Venosas -->
                                            <div class="mb-4">
                                                <h5 class="font-semibold">Vías Venosas:</h5>
                                                <div class="mt-2">
                                                    <label for="linea_iv" class="font-semibold">Línea IV
                                                        (#):</label>
                                                    <input type="text" id="linea_iv"
                                                        name="vias_venosas[linea_iv]"
                                                        class="form-control w-full border border-gray-400 rounded-md">
                                                </div>
                                                <div class="mt-2">
                                                    <label for="cateter" class="font-semibold">Catéter (#):</label>
                                                    <input type="text" id="cateter"
                                                        name="vias_venosas[cateter]"
                                                        class="form-control w-full border border-gray-400 rounded-md">
                                                </div>
                                            </div>

                                            <!-- Sitio de Aplicación -->
                                            <div class="mb-4">
                                                <h5 class="font-semibold">Sitio de Aplicación:</h5>
                                                <div class="flex flex-col space-y-2">
                                                    <label>
                                                        <input type="radio" name="sitio_aplicacion"
                                                            value="mano">
                                                        Mano
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="sitio_aplicacion"
                                                            value="pliegue_antecubital">
                                                        Pliegue Antecubital
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="sitio_aplicacion"
                                                            value="intraosea">
                                                        Intraósea
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="sitio_aplicacion"
                                                            value="otra">
                                                        Otra
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Tipos de Soluciones -->
                                            <div class="mb-4">
                                                <h5 class="font-semibold">Tipos de Soluciones:</h5>
                                                <div class="flex flex-col space-y-2">
                                                    <label>
                                                        <input type="checkbox" name="tipo_soluciones[]"
                                                            value="hartmann">
                                                        Hartmann
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="tipo_soluciones[]"
                                                            value="nacl_09">
                                                        NaCl 0.9%
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="tipo_soluciones[]"
                                                            value="mixta">
                                                        Mixta
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="tipo_soluciones[]"
                                                            value="glucosa_5">
                                                        Glucosa 5%
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="tipo_soluciones[]"
                                                            value="otra">
                                                        Otra
                                                    </label>
                                                </div>
                                                <div class="mt-2">
                                                    <label for="soluciones_especifique"
                                                        class="font-semibold">Especifique:</label>
                                                    <input type="text" id="soluciones_especifique"
                                                        name="soluciones[especifique]"
                                                        class="form-control w-full border border-gray-400 rounded-md">
                                                </div>
                                                <div class="mt-2">
                                                    <label for="cantidad" class="font-semibold">Cantidad:</label>
                                                    <input type="text" id="cantidad"
                                                        name="soluciones[cantidad]"
                                                        class="form-control w-full border border-gray-400 rounded-md">
                                                </div>
                                                <div class="mt-2">
                                                    <label for="infusiones"
                                                        class="font-semibold">Infusiones:</label>
                                                    <input type="text" id="infusiones"
                                                        name="soluciones[infusiones]"
                                                        class="form-control w-full border border-gray-400 rounded-md">
                                                </div>
                                            </div>

                                            <!-- Tabla para Manejo Farmacológico y Terapia Eléctrica -->
                                            <div class="mb-4">
                                                <h5 class="font-semibold">Registro de Medicamentos y Terapia
                                                    Eléctrica:</h5>
                                                <table
                                                    class="table-auto w-full border-collapse border border-gray-400">
                                                    <thead>
                                                        <tr class="bg-gray-200">
                                                            <th class="border border-gray-400 px-4 py-2">Hora</th>
                                                            <th class="border border-gray-400 px-4 py-2">Medicamento
                                                            </th>
                                                            <th class="border border-gray-400 px-4 py-2">Dosis</th>
                                                            <th class="border border-gray-400 px-4 py-2">Vía de
                                                                Administración</th>
                                                            <th class="border border-gray-400 px-4 py-2">Terapia
                                                                Eléctrica</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="pharmaTableBody">
                                                        <tr>
                                                            <td class="border border-gray-400 px-4 py-2">
                                                                <input type="time" name="hora[]"
                                                                    class="form-control w-full border border-gray-400 rounded-md">
                                                            </td>
                                                            <td class="border border-gray-400 px-4 py-2">
                                                                <input type="text" name="medicamento[]"
                                                                    class="form-control w-full border border-gray-400 rounded-md">
                                                            </td>
                                                            <td class="border border-gray-400 px-4 py-2">
                                                                <input type="text" name="dosis[]"
                                                                    class="form-control w-full border border-gray-400 rounded-md">
                                                            </td>
                                                            <td class="border border-gray-400 px-4 py-2">
                                                                <input type="text" name="via_administracion[]"
                                                                    class="form-control w-full border border-gray-400 rounded-md">
                                                            </td>
                                                            <td class="border border-gray-400 px-4 py-2">
                                                                <input type="text" name="terapia_electrica[]"
                                                                    class="form-control w-full border border-gray-400 rounded-md">
                                                            </td>
                                                        </tr>
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
                                                        <label><input type="checkbox" name="rcp_basica"> RCP
                                                            Básica</label>
                                                    </div>
                                                    <div class="border border-gray-400 p-2">
                                                        <label><input type="checkbox" name="rcp_avanzada"> RCP
                                                            Avanzada</label>
                                                    </div>
                                                    <div class="border border-gray-400 p-2">
                                                        <label><input type="checkbox" name="inmovilizacion">
                                                            Inmovilización de Extremidades</label>
                                                    </div>
                                                    <div class="border border-gray-400 p-2">
                                                        <label><input type="checkbox" name="empaquetamiento">
                                                            Empaquetamiento</label>
                                                    </div>
                                                    <div class="border border-gray-400 p-2">
                                                        <label><input type="checkbox" name="curacion">
                                                            Curación</label>
                                                    </div>
                                                    <div class="border border-gray-400 p-2">
                                                        <label><input type="checkbox" name="vendaje">
                                                            Vendaje</label>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="flex justify-center space-x-4 mt-4">
                                            <button type="button"
                                                class="btn-footer px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                                                id="nextPhase9">Siguiente</button>
                                            <button type="button"
                                                class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600"
                                                id="prevPhase9">Atrás</button>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class=" btn-footer px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600">
                                        <i class="bi bi-check-circle"></i> Registrar Atención
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section id="ambulancias" class="section">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 style="color:#c2185b;">Servicios de Ambulancias</h1>
                <a type="button"
                    class="inline-block px-4 py-2 mx-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                    data-bs-toggle="modal" href="#registerAmbulanceModal">
                    <i class="bi bi-plus-circle"></i> Registrar Ambulancia
                </a>
            </div>

            <!-- Tabla de servicios -->
            <div class="table-responsive">
                <table class="table-auto w-full text-center border-collapse">
                    <thead class="bg-pink-200">
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
                                                class="inline-block px-4 py-2 bg-pink-600 text-white font-semibold rounded-md hover:bg-pink-700">
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
                        <div class="bg-pink-500 modal-header">
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
                                class="px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600"
                                form="registerAmbulanceForm">
                                <i class="bi bi-check-circle"></i> Registrar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script>
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

        document.addEventListener('DOMContentLoaded', function() {
            // Seleccionar todas las fases dinámicamente
            const phases = document.querySelectorAll('[id^="phase"]');
            const origenProbable = document.getElementById('origen_probable');
            const faseCausaClinica = document.getElementById('phase5');
            const faseParto = document.getElementById('phase6');

            // Configurar los botones de avanzar y retroceder dinámicamente
            phases.forEach((phase, index) => {
                const nextButton = document.getElementById(`nextPhase${index + 1}`);
                const prevButton = document.getElementById(`prevPhase${index + 1}`);

                // Evento para avanzar
                if (nextButton) {
                    nextButton.addEventListener('click', () => {
                        // Si estamos en la fase 5, evaluar el valor seleccionado
                        if (phase.id === 'phase5') {
                            if (origenProbable.value === 'gineco_obstetrica') {
                                faseCausaClinica.style.display = 'none';
                                faseParto.style.display = 'block';
                            } else {
                                phase.style.display = 'none';
                                if (phases[index + 1]) phases[index + 2].style.display = 'block';
                            }
                        } else {
                            // Comportamiento normal para otras fases
                            phase.style.display = 'none';
                            if (phases[index + 1]) phases[index + 1].style.display = 'block';
                        }
                    });
                }

                // Evento para retroceder
                if (prevButton) {
                    prevButton.addEventListener('click', () => {
                        if (phase.id === 'phase7') {
                            // Si regresamos desde la fase 7
                            if (origenProbable.value === 'gineco_obstetrica') {
                                phase.style.display = 'none';
                                faseParto.style.display = 'block';

                            } else {
                                phase.style.display = 'none';
                                faseCausaClinica.style.display = 'block';
                            }
                        } else {
                            // Comportamiento normal para otras fases
                            phase.style.display = 'none';
                            if (phases[index - 1]) phases[index - 1].style.display = 'block';
                        }
                    });
                }
            });
        });

        // document.addEventListener('DOMContentLoaded', function() {
        //     // Seleccionar todas las fases dinámicamente
        //     const phases = document.querySelectorAll('[id^="phase"]');
        //     const origenProbable = document.getElementById('origen_probable');
        //     const faseCausaClinica = document.getElementById('phase5');
        //     const faseParto = document.getElementById('phase6');

        //     // Configurar los botones de avanzar y retroceder dinámicamente
        //     phases.forEach((phase, index) => {
        //         const nextButton = document.getElementById(`nextPhase${index + 1}`);
        //         const prevButton = document.getElementById(`prevPhase${index + 1}`);

        //         // Evento para avanzar
        //         if (nextButton) {
        //             nextButton.addEventListener('click', () => {
        //                 // Si estamos en la fase 5, evaluar el valor seleccionado
        //                 if (phase.id === 'phase5') {
        //                     if (origenProbable.value === 'gineco_obstetrica') {
        //                         faseCausaClinica.style.display = 'none';
        //                         faseParto.style.display = 'block';
        //                     } else {
        //                         phase.style.display = 'none';
        //                         if (phases[index + 1]) phases[index + 2].style.display = 'block';
        //                     }
        //                 } else {
        //                     // Comportamiento normal para otras fases
        //                     phase.style.display = 'none';
        //                     if (phases[index + 1]) phases[index + 1].style.display = 'block';
        //                 }
        //             });
        //         }

        //         // Evento para retroceder
        //         if (prevButton) {
        //             prevButton.addEventListener('click', () => {
        //                 if (phase.id === 'phase7') {
        //                     // Si regresamos desde la fase 7
        //                     if (origenProbable.value === 'gineco_obstetrica') {
        //                         phase.style.display = 'none';
        //                         faseParto.style.display = 'block';

        //                     } else {
        //                         phase.style.display = 'none';
        //                         faseCausaClinica.style.display = 'block';
        //                     }
        //                 } else {
        //                     // Comportamiento normal para otras fases
        //                     phase.style.display = 'none';
        //                     if (phases[index - 1]) phases[index - 1].style.display = 'block';
        //                 }
        //             });
        //         }
        //     });
        // });

        document.getElementById('lugar_ocurrencia').addEventListener('change', function() {
            const otroLugarDiv = document.getElementById('otro_lugar_div');
            if (this.value === 'other') {
                otroLugarDiv.style.display = 'block';
            } else {
                otroLugarDiv.style.display = 'none';
                document.getElementById('otro_lugar').value = ''; // Limpia el campo si se oculta
            }
        });

        document.getElementById('origen_probable').addEventListener('change', function() {
            const btnphase6 = document.getElementById('btnphase6');
            if (this.value === 'gineco_obstetrica') {
                btnphase6.style.display = 'block';
            } else {
                btnphase6.style.display = 'none';
            }
        });

        const edadInput = document.getElementById('edad');
        const mesesContainer = document.getElementById('meses-container');
        const mesesInput = document.getElementById('meses');

        edadInput.addEventListener('input', () => {
            const edad = parseInt(edadInput.value);
            if (edad === 0) {
                mesesContainer.style.display = 'block'; // Muestra el campo de meses
            } else {
                mesesContainer.style.display = 'none'; // Oculta el campo de meses
                mesesInput.value = ''; // Limpia el valor del campo de meses
            }
        });

        document.getElementById('agente_causal').addEventListener('change', function() {
            const especificarOtro = document.getElementById('especificar_otro');
            if (this.value === 'otro') {
                especificarOtro.style.display = 'block';
            } else {
                especificarOtro.style.display = 'none';
            }
        });

        function mostrarDetallesAccidente() {
            var tipoAccidente = document.getElementById("tipo_accidente").value;
            var accidenteAutomovilistico = document.getElementById("accidente_automovilistico");
            var accidenteAtropellado = document.getElementById("accidente_atropellado");


            // Mostrar los detalles solo si se selecciona "Automovilístico"
            if (tipoAccidente === "automovilistico") {
                accidenteAutomovilistico.style.display = "block";
                accidenteAtropellado.style.display = "none";

            } else if (tipoAccidente === "atropellado") {
                accidenteAtropellado.style.display = "block";
                accidenteAutomovilistico.style.display = "none";
            }
        }

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
        function addPharmaRow() {
            const tableBody = document.getElementById('pharmaTableBody');
            const newRow = `
                <tr>
                    <td class="border border-gray-400 px-4 py-2">
                        <input type="time" name="hora[]" class="form-control w-full border border-gray-400 rounded-md">
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        <input type="text" name="medicamento[]" class="form-control w-full border border-gray-400 rounded-md">
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        <input type="text" name="dosis[]" class="form-control w-full border border-gray-400 rounded-md">
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        <input type="text" name="via_administracion[]" class="form-control w-full border border-gray-400 rounded-md">
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        <input type="text" name="terapia_electrica[]" class="form-control w-full border border-gray-400 rounded-md">
                    </td>
                </tr>
            `;
            tableBody.insertAdjacentHTML('beforeend', newRow);
        }

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
            const coordenadas = [];
            const zonas = [];
            listaZonas.innerHTML = '';
            coordinate.value = '';
            zonaslabel.value = ''
            marks.forEach((mark, index) => {
                const item = document.createElement('li');
                coordenadas.push(`(${mark.x}, ${mark.y})`);
                zonas.push(`${mark.label}`);
                item.textContent = `Zona ${index + 1}: ${mark.label}`;
                listaZonas.appendChild(item);
            });
            coordinate.value = coordenadas.join(' | ');
            zonaslabel.value = zonas.join(' | ');
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
                } else {
                    // Si no está marcado, agregar la marca
                    marks.push(clickedPoint);
                    drawMark(clickedPoint.x, clickedPoint.y);
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
                }
                actualizarMarcas(); // Actualizar la lista de zonas
            }
        });
    </script>

    <style>
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
