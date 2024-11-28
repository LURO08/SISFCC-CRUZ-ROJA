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
        color:  var(--text-color);
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
        color:var(--primary-color);
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
    #MedicamentosSurtidos .table-responsive{
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
    .tableConsultas th{
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
    .list-group-item li  {
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

    .modal-content{
        background-color: #fff;
        padding: 20px 20px 0;
        border-radius: 8px;
        width: 100%;
        position: relative;
        justify-content: space-between;
    }

    .tratamientoModal .modal-content{
        max-width: 700px;
    }

    .modalNuevoProveedor .modal-content  {
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
    .modal-header
     {
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
</style>

<body>
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

    <aside id="aside">
        <div class="toggle" onclick="toggleMenu()">
            <span class="icon" id="icon">←</span>
        </div>
        <ul id="menu" class="collapsed">
            <li>
                <a class="btn" href="/farmacia" id="home">
                    <span class="icon">🏠</span>
                    <span class="text" style="font-weight: bold;">Home</span>
                </a>
            </li>
            <li>
                <a class="btn btn-info view-proveedor-btn" href="#modalNuevoProveedor">
                    <!-- Icono cambiado a un carrito -->
                    <span class="icon">🛒</span> <!-- Puedes usar un ícono de carrito -->
                    <span class="text">Nuevo Proveedor </span>
                </a>
            </li>
            <li>
                <a class="btn" href="#" id="recipes" onclick="PedidosAProveedor()">
                    <!-- Icono cambiado a un carrito -->
                    <span class="icon">🛒</span> <!-- Puedes usar un ícono de carrito -->
                    <span class="text">Pedidos a proveedor</span>
                </a>
            </li>
            <li>
                <a class="btn" href="#" onclick="MedicamentosSurtidosAReceta()">
                    <!-- Icono cambiado a un carrito -->
                    <span class="icon">🛒</span> <!-- Puedes usar un ícono de carrito -->
                    <span class="text">Recetas Surtidas </span>
                </a>
            </li>
            <li>
                <a href="#" class="btn" onclick="Donaciones()">
                    <!-- Icono cambiado a un símbolo de donación -->
                    <span class="icon">🎁</span> <!-- Puedes usar un ícono de regalo -->
                    <span class="text">Donaciones</span>
                </a>
            </li>
        </ul>
    </aside>

    <div class="central">

        <div id="MedicamentosSurtidos" class="container mt-4">
                <h2 class="mb-4 text-center">Consulta de Recetas Surtidas</h2>
                @if ($recetasSurtidas->isEmpty())
                    <div class="alert alert-warning text-center">No hay recetas surtidas disponibles.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Folio Receta</th>
                                    <th>Paciente</th>
                                    <th>Fecha de Surtido</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recetasSurtidas->unique('receta_id') as $recetaSu)
                                    <tr>
                                        <td>{{ str_pad($recetaSu->receta_id, 4, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $recetaSu->paciente->nombre }}</td>
                                        <td>{{ $recetaSu->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <a class="btn btn-info" data-toggle="modal"
                                                href="#detallesModal-{{ $recetaSu->receta_id }}">
                                                Ver Detalles
                                            </a>
                                        </td>
                                    </tr>

                            </tbody>
                        </table>

                        <!-- Modal para los detalles de la receta -->
                        <div class="modalMedicamentosSurtidos" id="detallesModal-{{ $recetaSu->receta_id }}" tabindex="-1"
                            role="dialog" aria-labelledby="detallesModalLabel-{{ $recetaSu->receta_id }}"
                            aria-hidden="true">

                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="detallesModalLabel-{{ $recetaSu->receta_id }}">Detalles de
                                        Receta Surtida</h5>
                                    <a class="close text-white" href="">&times;
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <div style="text-align: left;">
                                        <p><strong>Folio Receta:</strong>
                                            {{ str_pad($recetaSu->receta_id, 4, '0', STR_PAD_LEFT) }}</p>
                                        <p><strong>Paciente:</strong> <br>
                                            {{ $recetaSu->paciente->nombre }} {{ $recetaSu->paciente->apellidopaterno }}
                                            {{ $recetaSu->paciente->apellidomaterno }}</p>
                                        <p><strong>Fecha de Surtido:</strong> {{ $recetaSu->created_at->format('d/m/Y') }}
                                            a las {{ $recetaSu->created_at->format('H:i') }}</p>
                                        <p><strong>Tratamiento de la receta:</strong> <br>
                                            {{ $recetaSu->receta->tratamiento }}</p>
                                        <br>
                                        <p><strong>Medicamentos Surtidos:</strong></p>
                                    </div>

                                    <table class="table table-blue">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cantidad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($recetasSurtidas as $medicamento)
                                                @if ($medicamento->receta_id == $recetaSu->receta_id)
                                                    <!-- Filtra medicamentos por receta_id -->
                                                    <tr>
                                                        <td>{{ $medicamento->medicamento->nombre }}</td>
                                                        <td>{{ $medicamento->cantidad }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <a href="" class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
                                </div>
                            </div>
                        </div>
                @endforeach

                </div>
                @endif
        </div>

        <div class="Donaciones" id="donaciones" style="display: none;">
            <div class="panelOpcionesDonaciones">
                <!-- Botón para ver donaciones -->
                <button class="btn-custom  w-50" style="margin-right: 5px;" onclick="MostrarDonaciones()">
                    <i class="fas fa-eye"></i> Ver Donaciones
                </button>

                <!-- Botón para registrar donaciones -->
                <button class="btn-custom  w-50" style="margin-left: 5px;" onclick="RegistrarDonaciones()">
                    <i class="fas fa-plus"></i> Registrar Donación
                </button>
            </div>

            <div id="PanelMostrarDonaciones" style="display: none;">

                <h2 class="mb-4 text-center">Consulta de Donaciones de Medicamentos</h2>
                @if ($donaciones->isEmpty())
                    <div class="alert alert-warning text-center">No hay donaciones disponibles.</div>
                @else
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" >
                        <thead class="thead-dark" >
                                <tr >
                                    <th>Folio Donación</th>
                                    <th>Donante</th>
                                    <th>Fecha de Donación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donaciones->unique('donacion_id') as $donacion)
                                    <tr>
                                        <td>{{ str_pad($donacion->id, 4, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $donacion->nombredonante }}</td>
                                        <td>{{ $donacion->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <a class="btn btn-info" data-toggle="modal"
                                                href="#detallesDonacionModal-{{ $donacion->donacion_id }}">
                                                Ver Detalles
                                            </a>
                                        </td>

                                        <!-- Modal para los detalles de la donación -->
                                        <div class="modalDonaciones" id="detallesDonacionModal-{{ $donacion->donacion_id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="detallesDonacionModalLabel-{{ $donacion->donacion_id }}"
                                            aria-hidden="true">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary text-white">
                                                        <h5 class="modal-title" id="detallesDonacionModalLabel-{{ $donacion->donacion_id }}">Detalles
                                                            de Donación</h5>
                                                        <a  class="close text-white" href="">
                                                            <span aria-hidden="true">&times;</span>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div style="text-align: left;">
                                                            <p><strong>Folio Donación:</strong>
                                                                {{ str_pad($donacion->id, 4, '0', STR_PAD_LEFT) }}</p>
                                                            <p><strong>Donante:</strong> {{ $donacion->nombredonante }}</p>
                                                            <p><strong>Fecha de Donación:</strong> {{ \Carbon\Carbon::parse($donacion->fecha_donacion)->format('d/m/Y') }}</p>
                                                            <p><strong>Fecha de Creación:</strong> {{$donacion->created_at->format('d/m/Y H:m') }}</p>
                                                            <br>
                                                            <p><strong>Medicamentos Donados:</strong></p>
                                                        </div>

                                                        <div class="table-container">
                                                            <div class="table-header">
                                                                <div class="row header-row">
                                                                    <div class="col">Nombre</div>
                                                                    <div class="col">Cantidad</div>
                                                                </div>
                                                            </div>
                                                            <div class="table-body">
                                                                @foreach ($donaciones->where('donacion_id', $donacion->donacion_id) as $donacion)
                                                                    <div class="row body-row">
                                                                        <div class="col">{{ $donacion->medicamentos->nombre }}</div>
                                                                        <div class="col">{{ $donacion->medicamento_cantidad }}</div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="" class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
                                                    </div>
                                                </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <div class="PanelRegistrarDonación" id="PanelRegistrarDonación">
                <!-- Título principal -->
                <h1 style="font-size: 28px; font-weight: 700;">Registrar Donación</h1>
                <!-- Formulario de Datos de la Donación -->
                <div class="d-flex justify-content-between mb-4 w-100">
                    <div class="col-md-6">
                        <form action="{{ route('farmacia.donaciones.medicammentos') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nombreDonante"><strong>Nombre del Donante:</strong></label>
                                <input type="text" id="nombreDonante" name="nombreDonante" class="form-control"
                                    placeholder="Nombre del donante" required>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fechaDonacion"><strong>Fecha de Donación:</strong></label>
                                    <input type="date" id="fechaDonacion" name="fechaDonacion" class="form-control"
                                        required>
                                </div>
                            </div>

                            <!-- Aquí se agregarán los medicamentos seleccionados como inputs ocultos -->
                            <div id="medicamentosSeleccionados"></div>

                            <div class="d-flex" style="width: 100%; margin: 0 auto;">
                                <!-- Sección de búsqueda y medicamentos disponibles -->
                                <div style="width: 50%; float: left;">

                                    <h5 class="font-weight-bold" style="font-size: 25px;">Medicamentos Disponibles</h5>
                                    <a href="#addProductModal" class="btn btn-primary w-50">Registrar Medicamento</a>
                                    <div class="form-group mb-3 d-flex align-items-center">
                                        <strong class="mr-2">Buscar:</strong>
                                        <input type="search" class="form-control" id="buscarMedicamento"
                                            placeholder="Buscar medicamento" onkeyup="filtrarMedicamentos()"
                                            style="width: 80%;">

                                    </div>

                                    <!-- Tabla de Medicamentos con desplazamiento -->
                                    <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                                        <table class="table tablaMedicamentos">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Dosis</th>
                                                    <th>Cantidad Stock</th>
                                                    <th>Cantidad</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablaMedicamentos">
                                                @foreach ($productos as $medicamento)
                                                    @if ($medicamento->cantidad >= 1)
                                                        <tr>
                                                            <td>{{ $medicamento->nombre }}</td>
                                                            <td>{{ $medicamento->dosis }} {{ $medicamento->medida }}</td>
                                                            <td>{{ $medicamento->cantidad }}</td>
                                                            <td>
                                                                <input type="number"
                                                                    id="cantidadMedicamento-{{ $medicamento->id }}"
                                                                    class="form-control" value="1" min="1"
                                                                    max="{{ $medicamento->cantidad }}"
                                                                    style="width: 60px; display: inline-block;"
                                                                    oninput="this.value = Math.min(Math.max(this.value, 1), {{ $medicamento->cantidad }})"
                                                                    required>
                                                            </td>
                                                            <td>
                                                                <button type="button"
                                                                    class="btn btn-success btnAgregarMedicamento"
                                                                    onclick="añadirMedicamentoDonados('{{ $medicamento->nombre }}', '{{ $medicamento->id }}', document.getElementById('cantidadMedicamento-{{ $medicamento->id }}').value)">Añadir</button>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Sección para mostrar los medicamentos agregados -->
                                <div style="width: 50%; float: right; height: 46vh;">
                                    <h5 class="font-weight-bold" style="font-size: 25px;">Medicamentos Agregados</h5>
                                    <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                                        <div id="listaMedicamentosDonados" class="list-group listaMedicamentos">
                                            <!-- Aquí se agregarán los medicamentos seleccionados -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center w-100 mt-4">
                                <button type="submit" class="btn-custom">Registrar Donación</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div class="PedidosAProveedor" id="PedidosProveedor">

            <div class="panelOpcionesPedidos" style="display: flex; padding: 10px;">
                <!-- Botón para ver donaciones -->
                <button class="btn-custom" style="margin-right: 5px; width: 50%;" onclick="MostrarPedidos()">
                    <i class="fas fa-eye"></i> Ver Pedidos
                </button>

                <!-- Botón para registrar donaciones -->
                <button class="btn-custom  " style="margin-left: 5px; width: 50%;" onclick="RegistrarPedidos()">
                    <i class="fas fa-plus"></i> Registrar Pedido
                </button>
            </div>

            <div id="PanelMostrarPedidos" style="display: none;">
                <h2 class="mb-4 text-center">Consulta los pedidos de Medicamentos</h2>
                @if ($PedidoProveedor->isEmpty())
                    <div class="alert alert-warning text-center">No hay pedidos disponibles.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Folio del pedido</th>
                                    <th>Proveedor</th>
                                    <th>Fecha de Pedido</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($PedidoProveedor->unique('pedido_id') as $Pedido)
                                    <tr>
                                        <td>{{ str_pad($Pedido->pedido_id, 4, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $Pedido->proveedor->nombre }}</td>
                                        <td>{{ $Pedido->created_at->format('d/m/Y H:m:s') }}</td>
                                        <td>
                                            <a class="btn btn-info" data-toggle="modal"
                                                href="#detallesPedidosModal-{{ $Pedido->pedido_id }}">
                                                Ver Detalles
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Modal para los detalles
                                        de la donación -->
                    <div class="modalDonaciones" id="detallesPedidosModal-{{ $Pedido->pedido_id }}" tabindex="-1"
                        role="dialog" aria-labelledby="detallesPedidosModalLabel-{{ $Pedido->pedido_id }}"
                        aria-hidden="true">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="detallesDonacionModalLabel-{{ $Pedido->pedido_id }}">Detalles
                                        de Pedidos</h5>
                                    <a  class="close text-white" href="">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <div style="text-align: left;">
                                        <p><strong>Folio Pedido:</strong>
                                            {{ str_pad($Pedido->pedido_id, 4, '0', STR_PAD_LEFT) }}</p>
                                        <p><strong>Proveedor:</strong> {{ $Pedido->proveedor->nombre }}</p>

                                        <p><strong>Fecha de Creación:</strong> {{$Pedido->created_at->format('d/m/Y H:m') }}</p>
                                        <br>
                                        <p><strong>Medicamentos Pedidos:</strong></p>
                                    </div>

                                    <div class="table-container">
                                        <div class="table-header">
                                            <div class="row header-row">
                                                <div class="col">Nombre</div>
                                                <div class="col">Cantidad</div>
                                            </div>
                                        </div>
                                        <div class="tbody">
                                            @foreach ($PedidoProveedor->where('pedido_id', $Pedido->pedido_id) as $medicamento)
                                                <div class="row body-row">
                                                    <div class="col">{{ $medicamento->medicamento->nombre }}</div>
                                                    <div class="col">{{ $medicamento->medicamento_cantidad }}</div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <a href="" class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
                                </div>
                            </div>
                        </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <div id="PanelRegistrarPedido" >
                    <!-- Título principal -->
                <h1 class="text-center">Pedidos a Proveedor</h1>
                <form action="{{ route('farmacia.pedidos.medicammentos') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex flex-column" style="width: 100%;">
                                <!-- Sección de selección de proveedor -->
                                <div class="col-md-5 mb-3 mx-auto">
                                    <label for="seleccionarProveedor"><strong>Seleccionar Proveedor:</strong></label>
                                    <select id="proveedor_id" name="proveedor_id" class="form-select">
                                        <option value="">Seleccione un proveedor</option>
                                        @foreach ($proveedores as $proveedor)
                                            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('proveedor_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                <div class="d-flex" style="width: 100%; margin: 0 auto;">
                    <!-- Sección de búsqueda y medicamentos disponibles -->
                    <div class="col-md-6" style="width: 50%; float: left;">
                        <h5 class="font-weight-bold" style="font-size: 25px;">Medicamentos Disponibles</h5>
                        <div class="form-group mb-3" style="display: flex; align-items: center;">
                            <strong style="margin-right: 10px;">Buscar:</strong>
                            <input type="search" class="form-control" id="buscarMedicamento"
                                placeholder="Buscar medicamento" onkeyup="filtrarMedicamentos()" style="width: 80%;">
                        </div>

                        <!-- Tabla de Medicamentos con desplazamiento -->
                        <div class="table-responsive" style="max-height: 300px;  overflow-y: auto;">
                            <table class="table tablaMedicamentos">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Dosis</th>
                                        <th>Cantidad Stock</th>
                                        <th>Cantidad</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaMedicamentos">
                                    @foreach ($productos as $medicamento)
                                        @if ($medicamento->cantidad >= 1)
                                            <tr>
                                                <td>{{ $medicamento->nombre }}</td>
                                                <td>{{ $medicamento->dosis }} {{ $medicamento->medida }}</td>
                                                <td>{{ $medicamento->cantidad }}</td>
                                                <td>
                                                    <input type="number"
                                                        id="cantidadMedicamentoProveedor-{{ $medicamento->id }}"
                                                        class="form-control" value="1" min="1"
                                                        max="{{ $medicamento->cantidad }}"
                                                        style="width: 60px; display: inline-block;"
                                                        aria-label="Cantidad de {{ $medicamento->nombre }}"
                                                        oninput="this.value = Math.min(Math.max(this.value, 1), {{ $medicamento->cantidad }})"
                                                        required>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btnAgregarMedicamento"
                                                        onclick="añadirMedicamentoProveedor('{{ $medicamento->nombre }}', '{{ $medicamento->id }}')">Añadir</button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Sección para mostrar los medicamentos agregados -->
                    <div style="width: 50%; float: right; height: 46vh;">
                        <h5 class="font-weight-bold" style="font-size: 25px;">Medicamentos Agregados</h5>
                        <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                            <div id="listaMedicamentosPedidosProveedor" class="list-group listaMedicamentos">
                                <!-- Aquí se agregarán los medicamentos seleccionados -->

                                @error('proveedor_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                    </div>

                    <div  style="display: flex; justify-content: center; width: 100%;">
                        <button type="submit" class="btn-custom" style="text-align: center; justify-content: center;  width: 50%;">Pedir a Proveedor</button>
                    </div>
                </form>
                </div>

            </div>

        </div>


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
        <h1 style="margin: 0; text-align: center;">SISTEMA DE FARMACIA MÉDICO</h1>
        <h3 style="margin: 0; text-align: center; font-size: 25px;">DE LA </h3>
        <h2 style="margin: 0; text-align: center; font-size: 27px;">CRUZ ROJA MEXICANA DELEGACIÓN CHILPANCINGO
        </h2>
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
                            @if (!$receta->surtida)
                                <tr style="text-align: center; align-items: center; justify-content: center;">
                                    <td><strong>{{ $receta->paciente->nombre }}
                                            {{ $receta->paciente->apellidopaterno }}
                                            {{ $receta->paciente->apellidomaterno }}</strong></td>
                                    <td rowspan="2"
                                        style="text-align: center; align-items: center; justify-content: center;">
                                        <!-- Botón para abrir el modal -->
                                        <button class="btn btn-info view-treatment-btn"
                                            data-id="{{ $receta->id }}">
                                            👁️
                                        </button>
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
                    <div class=" fade tratamientoModal" id="tratamientoModal-{{ $receta->id }}" tabindex="-1"
                        role="dialog" aria-labelledby="tratamientoModalLabel-{{ $receta->id }}"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tratamientoModalLabel-{{ $receta->id }}">
                                        Tratamiento
                                        para {{ $receta->paciente->nombre }}</h5>
                                    <button type="button" class="close" data-id="{{ $receta->id }}"
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

                                        @if (!empty($receta->tratamiento))
                                            <p style="line-height: 1.6; font-size: 16px; color: #34495e;">
                                                {{ $receta->tratamiento }}
                                            </p>
                                        @else
                                            <p style="font-style: italic; color: #7f8c8d;">No se ha especificado ningún
                                                tratamiento.</p>
                                        @endif
                                    </div>

                                    <br>
                                    <!-- Barra de búsqueda -->
                                    <div class="form-group">
                                        <strong>Buscar: </strong>
                                        <input type="search" class="form-control"
                                            id="searchMedicamento-{{ $receta->id }}"
                                            placeholder="Buscar medicamento"
                                            onkeyup="filterMedicamentos({{ $receta->id }})">
                                    </div>

                                    <!-- Tabla de Medicamentos con desplazamiento -->
                                    <div style="max-height: 200px; overflow-y: auto;">
                                        <h5>Medicamentos Recetados</h5>
                                        <table class="table tableMedicamentosASurtir">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Dosis</th>
                                                    <th>Cantidad</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody id="medicamentosBody-{{ $receta->id }}">
                                                @foreach ($productos as $medicamento)
                                                    <tr>
                                                        <td>{{ $medicamento->nombre }}</td>
                                                        <td>{{ $medicamento->dosis }} {{ $medicamento->medida }}
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                id="cantidad-{{ $receta->id }}-{{ $medicamento->id }}"
                                                                class="form-control" value="1" min="1"
                                                                max="{{ $medicamento->cantidad }}"
                                                                style="width: 60px; display: inline-block;"
                                                                title="Ingrese la cantidad (mínimo: 1, máximo: {{ $medicamento->cantidad }})"
                                                                aria-label="Cantidad de {{ $medicamento->nombre }}"
                                                                oninput="this.value = Math.min(Math.max(this.value, 1), {{ $medicamento->cantidad }})"
                                                                required>

                                                        </td>
                                                        <td>
                                                            <button type="button"
                                                                class="btn btn-primary agregar-medicamento"
                                                                onclick="agregarMedicamentoASurtir({{ $receta->id }}, '{{ $medicamento->nombre }}', '{{ $medicamento->id }}')">Agregar</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Sección para mostrar los medicamentos agregados -->
                                        <h5>Medicamentos Agregados</h5>
                                        <input type="hidden" name="paciente_id"
                                            value="{{ $receta->paciente->id }}">
                                        <div id="medicamentosAgregados-{{ $receta->id }}"
                                            style="max-height: 200px; overflow-y: auto; width: 100%; justify-content: center;">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">
                                                Surtir Receta
                                            </button>
                                            <button type="button" class="close" data-id="{{ $receta->id }}"
                                                aria-label="Close">
                                                <span aria-hidden="true">Cerrar</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            @if (!$medicamentos->isEmpty())
                <h2 class="my-4 text-warning"
                    style="font-weight: 700; font-size: 18px; border-bottom: 1px solid #6c757d; margin-bottom: 5px;">
                    Medicamentos Caducidades</h2>

                <div class="table-responsive">
                    <table class="tableMedicamentos">
                        <thead class="thead-dark">
                            <tr>
                                <th>Medicamento</th>
                                <th>Caducidad</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medicamentos as $medicamento)
                                <tr
                                    @if ($medicamento->caducidad < date('Y-m-d')) style="background-color: #c9c7c7e8;" @elseif($medicamento->caducidad >= date('Y-m-d')) style="background-color: #f8d7da;" @endif>
                                    <td>
                                        <strong>{{ $medicamento->nombre }}</strong>
                                    </td>
                                    <td>
                                        <small
                                            class="text-muted">{{ date('d/m/Y', strtotime($medicamento->caducidad)) }}</small>
                                    </td>
                                    <td
                                        class="@if ($medicamento->caducidad >= date('Y-m-d')) text-warning @else text-danger @endif">
                                        @if ($medicamento->caducidad >= date('Y-m-d'))
                                            <i class="fas fa-clock"></i> <strong>Próximo a Caducar</strong>
                                        @else
                                            <i class="fas fa-exclamation-triangle"></i> <strong>Caducado</strong>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif


            @if (!$medicamentosCantidad->isEmpty())
                <h2 class="my-4 text-warning text-center"
                    style="font-weight: 700; font-size: 18px; border-bottom: 1px solid #6c757d; margin-bottom: 5px;">
                    Medicamentos Stock
                </h2>

                <div class="table-responsive d-flex justify-content-center">
                    <table class="table tableMedicamentos text-center" style="width: 100%;">
                        <thead class="thead-dark">
                            <tr>
                                <th>Medicamento</th>
                                <th>Cantidad</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medicamentosCantidad as $medicamento)
                                <tr @if ($medicamento->cantidad <= 5) style="background-color: #f8d7da;" @endif>
                                    <td>
                                        <strong>{{ $medicamento->nombre }}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $medicamento->cantidad }}</strong>
                                    </td>
                                    <td
                                        class="{{ $medicamento->cantidad > 20 ? 'text-success' : ($medicamento->cantidad > 0 ? 'text-warning' : 'text-danger') }}">
                                        @if ($medicamento->cantidad > 20)
                                            <i class="fas fa-check-circle"></i> <strong>En stock</strong>
                                        @elseif ($medicamento->cantidad > 0 && $medicamento->cantidad <= 20)
                                            <i class="fas fa-clock"></i> <strong>Próximo a agotar</strong>
                                        @elseif ($medicamento->cantidad == 0)
                                            <i class="fas fa-exclamation-triangle"></i> <strong>Agotado</strong>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>

    <!-- Add Proveedor Modal -->
    <div id="modalNuevoProveedor" class="modalNuevoProveedor">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Nuevo Proveedor</h5>
                <a href="" class="close">&times;</a>
            </div>
            <div class="modalProveedor-body">
                <form action="{{ route('farmacia.proveedor.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="formContent">
                        <div class="form-group col-md-6">
                            <label for="nombreProveedor">Nombre</label>
                            <input type="text" class="form-control" id="nombreProveedor" name="nombreProveedor"
                                placeholder="Nombre del proveedor" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellidoProveedor">Apellido Paterno</label>
                            <input type="text" class="form-control" id="apellidopaternoProveedor"
                                name="apellidopaternoProveedor" placeholder="Apellido del proveedor" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellidoProveedor">Apellido Materno</label>
                            <input type="text" class="form-control" id="apellidomaternoProveedor"
                                name="apellidomaternoProveedor" placeholder="Apellido del proveedor" required>
                        </div>
                        <div class="form-group">
                            <label for="telefonoProveedor">Teléfono</label>
                            <input type="tel" class="form-control" id="telefonoProveedor"
                                name="telefonoProveedor" placeholder="Teléfono del proveedor" required>
                        </div>
                        <div class="form-group">
                            <label for="correoProveedor">Correo Electrónico</label>
                            <input type="email" class="form-control" name="correoProveedor" id="correoProveedor"
                                placeholder="Correo del proveedor" required>
                        </div>
                        <div class="form-group">
                            <label for="direccionProveedor">Dirección</label>
                            <input type="text" class="form-control" id="direccionProveedor"
                                name="direccionProveedor" placeholder="Dirección del proveedor">
                        </div>
                    </div>
                    <div class="modalProveedor-footer">
                        <button type="submit" class="btn addProveedor">Guardar</button>
                        <a href="" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div id="addProductModal" class="modalProductoadd">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Nuevo Producto</h5>
                <a href="#" class="close">&times;</a>
            </div>
            <div class="modal-body">
                <form action="{{ route('farmacia.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <!-- Columna para la foto -->
                        <div class="PanelIzquierdo">
                            <div class="form-group">
                                <label for="rutaimg">Foto</label>
                                <div class="text-center" id="foto-preview"></div>
                                <input type="file" name="rutaimg" id="btnfotos" class="form-control-file"
                                    style="width: 71%;">
                            </div>
                        </div>

                        <!-- Columna para los detalles del producto -->
                        <div class="PanelDerecho">
                            <div class="form-group">
                                <label for="nombre">Nombre</label><br>
                                <input type="text" name="nombre" class="form-control" id="nombre"
                                    placeholder="Ingrese el nombre del Medicamento" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label><br>
                                <textarea name="descripcion" class="form-control" id="descripcion" rows="4"
                                    placeholder="Ingrese una descripción del Medicamento"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="cantidad">Unidades</label><br>
                                <input type="number" name="cantidad" class="form-control" id="cantidad"
                                    placeholder="Ingrese la cantidad disponible" required>
                            </div>
                            <div class="form-group" id="DivDosis">
                                <label for="dosis">Dosis</label>
                                <div class="input-group" class="from-control-selecto" style="display: flex;">
                                    <input type="number" class="form-control-1" name="dosis" id="dosis"
                                        placeholder="Ingrese la dosis disponible" required>
                                    <div class="input-group-append" class="form-control-2">
                                        <select name="medida" id="medida" class="form-control">
                                            <option value="g">g</option>
                                            <option value="mg">mg</option>
                                            <option value="ml">ml</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio</label><br>
                                <input type="number" name="precio" class="form-control" id="precio"
                                    placeholder="Ingrese el precio del Medicamento" required>
                            </div>

                            <div class="form-group">
                                <label for="caducidad">Caducidad</label><br>
                                <input type="date" name="caducidad" class="form-control" id="caducidad" required>
                            </div>
                        </div>
                    </div>

                    <!-- Botones centrados -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var btntogglerecetas = document.getElementById('toggle-recetas');
        var menuDatos = document.getElementById('MenuDatos');
        var derecha = document.querySelectorAll('.derecha');
        const panelPedidosProveedor = document.getElementById('PedidosProveedor');
        var MedicamentosSurtidos = document.getElementById('MedicamentosSurtidos');

        // Arreglo para almacenar los medicamentos agregados
        let medicamentosAgregados = {};
        let medicamentosDonados = {};
        let medicamentosAñadidosProveedor = {};

        panelPedidosProveedor.style.display = 'none';
        MedicamentosSurtidos.style.display = 'none';
        document.getElementById("menu").style.display = 'block';

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

        document.querySelectorAll('.view-treatment-btn').forEach(button => {
            button.addEventListener('click', () => {
                const recetaId = button.getAttribute('data-id');
                document.getElementById(`tratamientoModal-${recetaId}`).style.display = 'flex';
            });
        });

        document.querySelectorAll('.close').forEach(closeBtn => {
            closeBtn.addEventListener('click', () => {
                const recetaId = closeBtn.getAttribute('data-id');
                document.getElementById(`tratamientoModal-${recetaId}`).style.display = 'none';
            });
        });

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

        function toggleRecetaDetails(recetaId) {
            var details = document.getElementById('recetaDetails-' + recetaId);
            if (details.style.display === 'none') {
                details.style.display = 'block';
            } else {
                details.style.display = 'none';
            }
        }

        function filterMedicamentos(recetaId) {
            const searchValue = document.getElementById('searchMedicamento-' + recetaId).value.toLowerCase();
            const tbody = document.getElementById('medicamentosBody-' + recetaId);
            const rows = tbody.getElementsByTagName('tr');

            Array.from(rows).forEach(row => {
                const medicamentoName = row.cells[0].textContent.toLowerCase();
                row.style.display = medicamentoName.includes(searchValue) ? '' : 'none';
            });
        }

        //FUNCIONES SURTIR RECETA
        // Función para agregar medicamentos
        function agregarMedicamentoASurtir(recetaId, medicamentoNombre, medicamentoId) {
            const cantidadInput = document.getElementById('cantidad-' + recetaId + '-' + medicamentoId);

            if (cantidadInput) {
                const cantidad = parseInt(cantidadInput.value);

                if (!medicamentosAgregados[recetaId]) {
                    medicamentosAgregados[recetaId] = {};
                }

                // Inicializar el medicamento si no ha sido agregado antes
                if (!medicamentosAgregados[recetaId][medicamentoId]) {
                    medicamentosAgregados[recetaId][medicamentoId] = {
                        nombre: medicamentoNombre,
                        cantidad: 0
                    };
                }
                // Sumar la cantidad si el medicamento ya fue agregado
                medicamentosAgregados[recetaId][medicamentoId].cantidad += cantidad;
                // Actualizar la lista en la interfaz
                actualizarListaMedicamentosSurtidos(recetaId);
            } else {
                console.error(`Cantidad input not found for recetaId: ${recetaId} and medicamentoId: ${medicamentoId}`);
            }
        }

        // Función para eliminar un medicamento agregado
        function eliminarMedicamentoSurtirReceta(recetaId, medicamentoId) {

            console.log("sE ACEDIO AL METODO ELIMINAR");
            // Verificar si la receta existe
            if (medicamentosAgregados[recetaId]) {

                // Verificar si el medicamento con el id proporcionado existe
                if (medicamentosAgregados[recetaId][medicamentoId]) {

                    // Eliminar el medicamento específico usando el id
                    delete medicamentosAgregados[recetaId][medicamentoId];

                    // Si no quedan más medicamentos en la receta, eliminar también la receta
                    if (Object.keys(medicamentosAgregados[recetaId]).length === 0) {
                        delete medicamentosAgregados[recetaId];
                    }

                    // Actualizar la lista de medicamentos en la interfaz
                    actualizarListaMedicamentosSurtidos(recetaId);
                } else {
                    console.error(`El medicamento con ID ${medicamentoId} no existe en la receta ${recetaId}.`);
                }
            } else {
                console.error(`La receta con ID ${recetaId} no existe.`);
            }
        }

        // Función para actualizar la lista de medicamentos agregados
        function actualizarListaMedicamentosSurtidos(recetaId) {
            const lista = document.getElementById('medicamentosAgregados-' + recetaId);
            lista.innerHTML = ''; // Limpiar la lista
            lista.style.marginBottom = '10px'; // Espacio entre las listas de medicamentos

            // Crear un campo oculto para el ID de la receta
            const IDReceta = document.createElement('input');
            IDReceta.type = 'hidden';
            IDReceta.name = "receta_id";
            IDReceta.value = recetaId;
            lista.appendChild(IDReceta); // Agregar el campo a la lista

            // Verificar si hay medicamentos agregados para la receta
            if (medicamentosAgregados[recetaId]) {
                for (const [id, data] of Object.entries(medicamentosAgregados[recetaId])) {
                    const nombre = data.nombre;
                    const cantidad = data.cantidad;

                    // Crear un contenedor para cada medicamento
                    const contenedorMedicamento = document.createElement('div');
                    contenedorMedicamento.style.display = 'flex'; // Usar flexbox para alineación
                    contenedorMedicamento.style.alignItems = 'center'; // Centrar verticalmente
                    contenedorMedicamento.style.marginBottom = '5px'; // Espacio entre medicamentos

                    // Campo oculto para el ID del medicamento
                    const Campoid = document.createElement('input');
                    Campoid.type = 'hidden';
                    Campoid.name = 'medicamento_id' + id;
                    Campoid.value = id;

                    // Nombre del medicamento
                    const nombreMedicamento = document.createElement('span');
                    nombreMedicamento.textContent = nombre;
                    nombreMedicamento.style.marginRight = '10px'; // Espaciado a la derecha
                    nombreMedicamento.style.flex = '1'; // Permitir que el nombre ocupe el espacio restante

                    // Campo de entrada para la cantidad
                    const input = document.createElement('input');
                    input.type = 'number';
                    input.value = cantidad;
                    input.readOnly = true; // Mantener el campo como solo lectura
                    input.name = 'cantidad' + id;
                    input.style.width = '60px';
                    input.style.marginRight = '10px'; // Espaciado a la derecha

                    // Botón de eliminación
                    const eliminarBtn = document.createElement('a'); // Cambiar de 'a' a 'button'
                    eliminarBtn.className = 'btn btn-danger btn-sm';
                    eliminarBtn.textContent = 'X';
                    eliminarBtn.marginTop = '30px';
                    eliminarBtn.style.width = '60px';
                    eliminarBtn.onclick = function(event) {
                        event.preventDefault(); // Prevenir el comportamiento predeterminado
                        eliminarMedicamentoSurtirReceta(recetaId, id); // Llamar a la función al hacer clic
                        actualizarListaMedicamentosAgregados(recetaId); // Actualizar la lista tras eliminar
                    };

                    // Agregar todos los elementos al contenedor del medicamento
                    contenedorMedicamento.appendChild(Campoid);
                    contenedorMedicamento.appendChild(nombreMedicamento);
                    contenedorMedicamento.appendChild(input);
                    contenedorMedicamento.appendChild(eliminarBtn);

                    // Agregar el contenedor a la lista
                    lista.appendChild(contenedorMedicamento);
                }
            }
        }

        // Función para filtrar medicamentos en la tabla
        function filtrarMedicamentos() {
            const valorBusqueda = document.getElementById('buscarMedicamento').value.toLowerCase();
            const tabla = document.getElementById('tablaMedicamentos');
            const filas = tabla.getElementsByTagName('tr');

            Array.from(filas).forEach(fila => {
                const nombreMedicamento = fila.cells[0].textContent.toLowerCase();
                fila.style.display = nombreMedicamento.includes(valorBusqueda) ? '' : 'none';
            });
        }

        //FUNCIONES DONACIONES
        // Función para añadir medicamentos
        function añadirMedicamentoDonados(medicamentoNombre, medicamentoId) {
            const cantidadInput = document.getElementById('cantidadMedicamento-' + medicamentoId);

            if (cantidadInput) {
                const cantidad = parseInt(cantidadInput.value);

                if (!medicamentosDonados[medicamentoNombre]) {
                    medicamentosDonados[medicamentoNombre] = {
                        id: medicamentoId,
                        cantidad: 0
                    };
                }
                medicamentosDonados[medicamentoNombre].cantidad += cantidad;

                // Actualizar la lista en la interfaz
                actualizarListaMedicamentosDonados();
            } else {
                console.error(`Cantidad input no encontrado para medicamentoId: ${medicamentoId}`);
            }
        }

        // Función para eliminar un medicamento añadido
        function eliminarMedicamentoDonado(nombreMedicamento) {
            if (medicamentosDonados[nombreMedicamento]) {
                delete medicamentosDonados[nombreMedicamento];
            }

            actualizarListaMedicamentosDonados();
        }

        // Función para actualizar la lista de medicamentos añadidos
        function actualizarListaMedicamentosDonados(medicamentoId) {
            const lista = document.getElementById('listaMedicamentosDonados');
            lista.innerHTML = ''; // Limpiar la lista

            for (const [nombre, data] of Object.entries(medicamentosDonados)) {
                const id = data.id;
                const cantidad = data.cantidad;

                const li = document.createElement('p');
                li.classList.add('list-group-item', 'd-flex', 'align-items-center', 'justify-content-between');
                li.style.marginBottom = '0px';

                const MedicamentoID = document.createElement('input');
                MedicamentoID.type = 'hidden';
                MedicamentoID.name = 'medicamento_id' + id;
                MedicamentoID.value = id;
                MedicamentoID.readOnly = true; // Mantener el campo como solo lectura

                // Añadir el nombre del medicamento
                const nombreMedicamento = document.createElement('span');
                nombreMedicamento.textContent = nombre;
                nombreMedicamento.style.flex = '1';



                // Crear un campo de entrada para permitir la modificación de la cantidad
                const input = document.createElement('input');
                input.type = 'number';
                input.name = 'cantidad' + id;
                input.value = cantidad;
                input.readOnly = true; // Mantener el campo como solo lectura
                input.style.width = '60px';
                input.style.marginRight = '10px';
                input.onchange = function() {
                    medicamentosDonados[nombre] = parseInt(this.value) || 1;
                };


                const eliminarBtn = document.createElement('a'); // Cambiar de 'a' a 'button'
                eliminarBtn.className = 'btn btn-danger btn-sm';
                eliminarBtn.textContent = 'X';
                eliminarBtn.marginTop = '30px';
                eliminarBtn.style.width = '60px';
                eliminarBtn.onclick = function(event) {
                    event.preventDefault(); // Prevenir el comportamiento predeterminado
                    eliminarMedicamentoDonado(nombre);
                };

                // Añadir los elementos al <li>
                li.appendChild(nombreMedicamento);
                li.appendChild(input);
                li.appendChild(MedicamentoID);
                li.appendChild(eliminarBtn);
                lista.appendChild(li);
            }
        }

        //FUNCIONES PEDIDOS A PROVEEDORES
        // Función para añadir medicamentos
        function añadirMedicamentoProveedor(medicamentoNombre, medicamentoId) {
            const cantidadInput = document.getElementById('cantidadMedicamentoProveedor-' + medicamentoId);

            if (cantidadInput) {
                const cantidad = parseInt(cantidadInput.value);

                if (!medicamentosDonados[medicamentoNombre]) {
                    medicamentosDonados[medicamentoNombre] = {
                        id: medicamentoId,
                        cantidad: 0
                    };
                }
                medicamentosDonados[medicamentoNombre].cantidad += cantidad;

                // Actualizar la lista en la interfaz
                actualizarListaMedicamentosProveedor();
            } else {
                console.error(`Cantidad input no encontrado para medicamentoId: ${medicamentoId}`);
            }
        }

        // Función para eliminar un medicamento añadido
        function eliminarMedicamentoProveedor(nombreMedicamento) {
            if (medicamentosDonados[nombreMedicamento]) {
                delete medicamentosDonados[nombreMedicamento];
            }

            actualizarListaMedicamentosProveedor();
        }

        // Función para actualizar la lista de medicamentos añadidos
        function actualizarListaMedicamentosProveedor(medicamentoId) {
            const lista = document.getElementById('listaMedicamentosPedidosProveedor');
            lista.innerHTML = ''; // Limpiar la lista

            for (const [nombre, data] of Object.entries(medicamentosDonados)) {
                const id = data.id;
                const cantidad = data.cantidad;

                const li = document.createElement('p');
                li.classList.add('list-group-item', 'd-flex', 'align-items-center', 'justify-content-between');
                li.style.marginBottom = '0px';

                const MedicamentoID = document.createElement('input');
                MedicamentoID.type = 'hidden';
                MedicamentoID.name = 'medicamento_id' + id;
                MedicamentoID.value = id;
                MedicamentoID.readOnly = true; // Mantener el campo como solo lectura

                // Añadir el nombre del medicamento
                const nombreMedicamento = document.createElement('span');
                nombreMedicamento.textContent = nombre;
                nombreMedicamento.style.flex = '1';



                // Crear un campo de entrada para permitir la modificación de la cantidad
                const input = document.createElement('input');
                input.type = 'number';
                input.name = 'cantidad' + id;
                input.value = cantidad;
                input.readOnly = true; // Mantener el campo como solo lectura
                input.style.width = '60px';
                input.style.marginRight = '10px';
                input.onchange = function() {
                    medicamentosAñadidosProveedor[nombre] = parseInt(this.value) || 1;
                };


                const eliminarBtn = document.createElement('a'); // Cambiar de 'a' a 'button'
                eliminarBtn.className = 'btn btn-danger btn-sm';
                eliminarBtn.textContent = 'X';
                eliminarBtn.marginTop = '30px';
                eliminarBtn.style.width = '60px';
                eliminarBtn.onclick = function(event) {
                    event.preventDefault(); // Prevenir el comportamiento predeterminado
                    eliminarMedicamentoProveedor(nombre);
                };

                // Añadir los elementos al <li>
                li.appendChild(nombreMedicamento);
                li.appendChild(input);
                li.appendChild(MedicamentoID);
                li.appendChild(eliminarBtn);
                lista.appendChild(li);
            }
        }

        function MedicamentosSurtidosAReceta() {
            const panelCentral = document.getElementById('panelCentral');
            const donaciones = document.getElementById('donaciones');
            const inventario = document.getElementById('Inventario');
            const Proveedores = document.getElementById('Proveedores');

            MedicamentosSurtidos.style.display = 'block';
            panelPedidosProveedor.style.display = 'none';
            panelCentral.style.display = 'none';
            donaciones.style.display = 'none';
            inventario.style.display = 'none';
            Proveedores.style.display = 'none';
        }

        function PedidosAProveedor() {
            const panelCentral = document.getElementById('panelCentral');
            const donaciones = document.getElementById('donaciones');
            const inventario = document.getElementById('Inventario');
            const Proveedores = document.getElementById('Proveedores');

            MedicamentosSurtidos.style.display = 'none';
            panelPedidosProveedor.style.display = 'block';
            panelCentral.style.display = 'none';
            donaciones.style.display = 'none';
            inventario.style.display = 'none';
            Proveedores.style.display = 'none';
        }

        function Inventario() {
            const panelCentral = document.getElementById('panelCentral');
            const donaciones = document.getElementById('donaciones');
            const inventario = document.getElementById('Inventario');
            const Proveedores = document.getElementById('Proveedores');

            MedicamentosSurtidos.style.display = 'none';
            panelPedidosProveedor.style.display = 'none';
            panelCentral.style.display = 'none';
            donaciones.style.display = 'none';
            inventario.style.display = 'block';
            Proveedores.style.display = 'none';

        }

        function Proveedores() {
            const panelCentral = document.getElementById('panelCentral');
            const donaciones = document.getElementById('donaciones');
            const inventario = document.getElementById('Inventario');
            const Proveedores = document.getElementById('Proveedores');

            MedicamentosSurtidos.style.display = 'none';
            panelPedidosProveedor.style.display = 'none';
            panelCentral.style.display = 'none';
            donaciones.style.display = 'none';
            inventario.style.display = 'none';
            Proveedores.style.display = 'block';

        }

        function Donaciones() {
            const panelCentral = document.getElementById('panelCentral');
            const donaciones = document.getElementById('donaciones');
            const inventario = document.getElementById('Inventario');
            const Proveedores = document.getElementById('Proveedores');

            MedicamentosSurtidos.style.display = 'none';
            panelPedidosProveedor.style.display = 'none';
            panelCentral.style.display = 'none';
            donaciones.style.display = 'block';
            inventario.style.display = 'none';
            Proveedores.style.display = 'none';
        }

        function MostrarDonaciones() {
            const mostrarDonaciones = document.getElementById('PanelMostrarDonaciones');
            const RegistrarDonaciones = document.getElementById('PanelRegistrarDonación');
            RegistrarDonaciones.style.display = 'none';
            mostrarDonaciones.style.display = 'block';
        }

        function RegistrarDonaciones() {
            const mostrarDonaciones = document.getElementById('PanelMostrarDonaciones');
            const RegistrarDonaciones = document.getElementById('PanelRegistrarDonación');
            RegistrarDonaciones.style.display = 'block';
            mostrarDonaciones.style.display = 'none';
        }

        function MostrarPedidos() {
            const mostrarPedidos = document.getElementById('PanelMostrarPedidos');
            const RegistrarPedidos = document.getElementById('PanelRegistrarPedido');
            RegistrarPedidos.style.display = 'none';
            mostrarPedidos.style.display = 'block';
        }

        function RegistrarPedidos() {
            const mostrarPedidos = document.getElementById('PanelMostrarPedidos');
            const RegistrarPedidos = document.getElementById('PanelRegistrarPedido');
            RegistrarPedidos.style.display = 'block';
            mostrarPedidos.style.display = 'none';
        }
    </script>

</body>
