<style>
    :root {
        --primary-color: #007bff;
        --hover-color: #0056b3;
        --text-color: #fff;
        --background-color: #f4f4f4;
    }

    .TituloPacientes{
        font-size: 25px;
        font-weight: 700;
        text-align: center;
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
        border: 1px solid #dee2e6;
        width: 100%;
        text-align: center;
        margin: 0 auto;
        max-width: 100%;
        border-radius: 0.5rem;
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
        padding: 0px 15px 0px 15px;
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


    /* Estilos para el modal */
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
        background-color: #007bff;
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
        max-height: 90vh;
        overflow-y: auto;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .text-center {
        text-align: center;
    }

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
        border-color: #007bff;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-primary:hover,
    .btn-secondary:hover {
        opacity: 0.8;
    }

    /* Estilos para la tabla de pacientes */
    .tablePacientes {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .tablePacientes thead {
        background-color: var(--primary-color);
        color: white;
    }

    .tablePacientes th,
    .tablePacientes td {
        padding: 10px;
        text-align: center;
        border: 1px solid #dee2e6;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .tablePacientes th {
        font-weight: bold;
    }

    .tablePacientes td button {
        margin-right: 5px;
    }

    .form-row {
        display: flex;
    }

    .form-group .form-control {
        width: 100%;
    }

    .PanelDerecho {
        width: 100%;
        margin-left: 5%;
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

    .btn-delete {
        background-color: #dc3545;
        /* Color rojo */
        border-color: #dc3545;
        color: #fff;
        padding: 8px 12px;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-delete:hover {
        background-color: #c82333;
        /* Rojo más oscuro al pasar el ratón */
    }

    .tablePacientes .accionesbtn {
        display: flex; /* Activar flexbox */
    flex-direction: row; /* Alinear elementos en columna */
    align-items: center; /* Centrar horizontalmente */
    justify-content: center; /* Centrar verticalmente */
    gap: 10px; /* Espacio entre botones (opcional) */
    height: 100%; /* Asegurar que ocupe toda la altura de la celda */
    width: 100%;

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

    @include('admin.menu_nav')


    <div class="central">

        <section id="Panelfarmacia">
            <div>
                <h1 class="TituloPacientes">Lista de Pacientes</h1>
                <br>
                <div style="display: flex; justify-content: space-between; align-items: center; gap: 1rem; background-color: #f8f9fa; border-radius: 8px;">
                    <!-- Botón para abrir el modal -->
                    <a href="#addPatientModal" class="btn-primary">Agregar Paciente</a>

                    <div
                        style="display: flex; gap: 0.5rem; align-items: center; justify-content: space-between; width: 30%;">
                        <span>Buscar:</span>
                        <input type="search" class="form-control" placeholder="Buscar paciente..." id="buscarPaciente"
                            style="padding: 10px; flex: 1; border-radius: 4px;" onkeyup="buscarPaciente()">
                    </div>
                </div>

                <table class="tablePacientes">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>Tipo de Sangre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbdypacientes">
                        @foreach ($pacientes as $paciente)
                            <tr>
                                <td>{{$paciente->getID()}}</td>
                                <td>{{ $paciente->nombre }}</td>
                                <td>{{ $paciente->apellidopaterno }}</td>
                                <td>{{ $paciente->apellidomaterno }}</td>
                                <td>{{ $paciente->edad }}</td>
                                <td>{{ $paciente->sexo }}</td>
                                <td>{{ $paciente->tipo_sangre }}</td>
                                <td>
                                    <div style="display: flex; flex-direction: column; gap: 10px;">
                                        <!-- Primera fila: Editar y Eliminar -->
                                        <div style="display: flex; gap: 10px; align-items: center;">
                                            <!-- Botón Editar -->
                                            <a href="#editPatientModal-{{ $paciente->id }}" class="btn btn-edit"
                                                style="background-color: #007bff; color: white; padding: 10px 20px; text-align: center; text-decoration: none; border-radius: 5px; flex: 1;">
                                                Editar
                                            </a>

                                            <!-- Botón Eliminar -->
                                            <form action="{{ route('doctor.pacientes.destroy', $paciente->id) }}" method="POST" style="flex: 1;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-delete"
                                                    style="background-color: #dc3545; color: white; padding: 10px 20px; text-align: center; border: none; border-radius: 5px; width: 100%;">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>

                            </tr>

                            <!-- Edit Patient Modal -->
                            <div class="modal" id="editPatientModal-{{ $paciente->id }}">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="padding-left: 10px;">Editar Paciente</h5>
                                        <a href="#" class="close">&times;</a>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('doctor.pacientes.update', $paciente->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-row">
                                                <!-- Panel derecho: detalles del paciente -->
                                                <div class="PanelDerecho">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre</label><br>
                                                        <input type="text" name="nombre" class="form-control"
                                                            value="{{ $paciente->nombre }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="apellidopaterno">Apellido Paterno</label><br>
                                                        <input type="text" name="apellidopaterno"
                                                            class="form-control"
                                                            value="{{ $paciente->apellidopaterno }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="apellidomaterno">Apellido Materno</label><br>
                                                        <input type="text" name="apellidomaterno"
                                                            class="form-control"
                                                            value="{{ $paciente->apellidomaterno }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="edad">Edad</label><br>
                                                        <input type="number" name="edad" class="form-control"
                                                            value="{{ $paciente->edad }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sexo">Sexo</label><br>
                                                        <select name="sexo" class="form-control" required>
                                                            <option value="Masculino"
                                                                {{ $paciente->sexo == 'M' ? 'selected' : '' }}>
                                                                Masculino
                                                            </option>
                                                            <option value="Femenino"
                                                                {{ $paciente->sexo == 'F' ? 'selected' : '' }}>Femenino
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tipo_sangre">Tipo de Sangre</label><br>
                                                        <select name="tipo_sangre" id="tipo_sangre"
                                                            class="form-control" required>
                                                            <option value="">Seleccione el tipo de sangre
                                                            </option>
                                                            <option value="A+"
                                                                {{ $paciente->tipo_sangre == 'A+' ? 'selected' : '' }}>
                                                                A+</option>
                                                            <option value="A-"
                                                                {{ $paciente->tipo_sangre == 'A-' ? 'selected' : '' }}>
                                                                A-</option>
                                                            <option value="B+"
                                                                {{ $paciente->tipo_sangre == 'B+' ? 'selected' : '' }}>
                                                                B+</option>
                                                            <option value="B-"
                                                                {{ $paciente->tipo_sangre == 'B-' ? 'selected' : '' }}>
                                                                B-</option>
                                                            <option value="O+"
                                                                {{ $paciente->tipo_sangre == 'O+' ? 'selected' : '' }}>
                                                                O+</option>
                                                            <option value="O-"
                                                                {{ $paciente->tipo_sangre == 'O-' ? 'selected' : '' }}>
                                                                O-</option>
                                                            <option value="AB+"
                                                                {{ $paciente->tipo_sangre == 'AB+' ? 'selected' : '' }}>
                                                                AB+</option>
                                                            <option value="AB-"
                                                                {{ $paciente->tipo_sangre == 'AB-' ? 'selected' : '' }}>
                                                                AB-</option>
                                                        </select>
                                                        <small id="tipo_sangreHelp"
                                                            class="form-text text-muted">Seleccione el tipo de sangre
                                                            del paciente.</small>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- Botones centrados -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                                <a href="#" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancelar</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin Edit Patient Modal -->
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination-wrapper">
                    {{ $pacientes->links() }}
                </div>


                <!-- Add Patient Modal -->
                <div id="addPatientModal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Nuevo Paciente</h5>
                            <a href="#" class="close">&times;</a>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('doctor.pacientes.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-row">
                                    <!-- Columna para los detalles del paciente -->
                                    <div class="PanelDerecho">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label><br>
                                            <input type="text" name="nombre" class="form-control" id="nombre"
                                                placeholder="Ingrese el nombre del Paciente" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="apellidopaterno">Apellido Paterno</label><br>
                                            <input type="text" name="apellidopaterno" class="form-control"
                                                id="apellidopaterno" placeholder="Ingrese el apellido paterno"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="apellidomaterno">Apellido Materno</label><br>
                                            <input type="text" name="apellidomaterno" class="form-control"
                                                id="apellidomaterno" placeholder="Ingrese el apellido materno"
                                                required>
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
                                            <select name="tipo_sangre" id="tipo_sangre" class="form-control"
                                                required>
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
                                            <small id="tipo_sangreHelp" class="form-text text-muted">Seleccione el
                                                tipo de sangre del paciente.</small>
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

            </div>

        </section>
    </div>

    <script>
        var menuDatos = document.getElementById('MenuDatos');
        document.getElementById("menu").style.display = 'block';

        var btntogglerecetas = document.getElementById('toggle-recetas');

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

        const todosLosPacientes = @json($todosLosPacientes); // Traer todos los pacientes

        function buscarPaciente() {
            const searchValue = document.getElementById('buscarPaciente').value.toLowerCase();

            if (searchValue.trim() === '') {
                window.location.reload(); // Recargar la página
                return;
            }

            const tbody = document.getElementById('tbdypacientes');
            tbody.innerHTML = ''; // Limpiar la tabla

            function normalizarTexto(texto) {
                return texto
                    .normalize("NFD") // Descompone caracteres con acentos en sus componentes base
                    .replace(/[\u0300-\u036f]/g, "") // Elimina los diacríticos (acentos)
                    .toLowerCase(); // Convierte a minúsculas
            }
            // Filtrar los pacientes
            const resultados = todosLosPacientes.filter(paciente => {
                const nombreCompleto =  normalizarTexto(`${paciente.nombre} ${paciente.apellidopaterno} ${paciente.apellidomaterno}`)
                    .toLowerCase();
                    const searchNormalized = normalizarTexto(searchValue);
                return (
                    String(paciente.id).padStart(3, '0').includes(searchValue) ||
                    nombreCompleto.includes(searchNormalized) || // Búsqueda por nombre completo
                    paciente.nombre.toLowerCase().includes(searchNormalized) ||
                    paciente.apellidopaterno.toLowerCase().includes(searchNormalized) ||
                    paciente.apellidomaterno.toLowerCase().includes(searchNormalized) ||
                    (paciente.edad && paciente.edad.toString().includes(searchNormalized)) ||
                    paciente.sexo.toLowerCase().includes(searchNormalized) ||
                    paciente.tipo_sangre.toLowerCase().includes(searchNormalized)
                );
            });


            // Mostrar resultados
            if (resultados.length > 0) {
                resultados.forEach(paciente => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                <td>${paciente.folio}</td>
                <td>${paciente.nombre}</td>
                <td>${paciente.apellidopaterno}</td>
                <td>${paciente.apellidomaterno}</td>
                <td>${paciente.edad}</td>
                <td>${paciente.sexo}</td>
                <td>${paciente.tipo_sangre}</td>
                <td class="accionesbtn">
                    <a href="#editPatientModal-${paciente.id}" class="btn-edit">Editar</a>
                    <form action="${paciente.eliminarruta}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Eliminar</button>
                    </form>
                </td>
            `;
                    tbody.appendChild(row);
                });
            } else {
                tbody.innerHTML = `<tr><td colspan="7" style="text-align: center;">No se encontraron resultados</td></tr>`;
            }
        }
    </script>

</body>
