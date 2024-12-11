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

    @include('socorro.menu_nav')


    <div class="central">
        <div id="socorros">
            <h2>Registro de Atención Hospitalaria</h2>

            <div style="display: flex; height: 9%; ">
                <button type="button" class="btn btn-primary mb-3" id="generateReportBtn">
                    <i class="bi bi-file-earmark-pdf"></i> Generar Reporte de Atenciones
                </button>

                <a href="{{route('socorros.emergency.register')}}" class="btn btn-primary bg-pink-600 mb-3"
                style="width: 50%; margin-left: 10px; ">Registrar Atención</a>
            </div>

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


        </div>
    </div>
</body>
