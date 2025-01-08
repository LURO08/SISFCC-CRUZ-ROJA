<style>
    :root {
        --primary-color: #007bff;
        --hover-color: #0056b3;
        --text-color: #fff;
        --background-color: #f8f9fa;
        --modal-overlay-color: rgba(0, 0, 0, 0.7);
        --modal-border-radius: 10px;
        --btn-danger-color: #dc3545;
        --btn-danger-hover: #c82333;
        --shadow-color: rgba(0, 0, 0, 0.1);
    }

    main {
        display: flex;
        justify-content: center;
        width: auto;
        height: 100%;
        overflow-x: scroll;
        min-width: 10vh;
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: var(--text-color);
        min-width: 120px; /* Asegurar tamaño mínimo */
        text-align: center; /* Centrar texto */
        margin: 0; /* Eliminar márgenes innecesarios */
        padding: 10px 20px; /* Espaciado interno */
        border-radius: 5px; /* Bordes redondeados */
        font-size: 1rem; /* Tamaño de fuente */
        cursor: pointer; /* Indicador interactivo */
        border: none; /* Eliminar bordes */
        transition: all 0.3s ease; /* Animación suave */
    }
     .btn-primary:hover {
        background-color: var(--hover-color);
    }

    .central {
        width: auto;
        padding: 0 20px;
        flex: 1;
        box-sizing: border-box;
        display: flex;
        justify-content: center;
        text-align: center;
        overflow-x: scroll;
    }

    .TituloServicios {
        font-size: 36px;
        font-weight: bold;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 10px 0;
        border-radius: 5px;
    }

    /* Estilos responsivos */
    @media (max-width: 768px) {

        .TituloServicios {
            font-size: 28px;
        }

        .tableServicios {
            width: 80%;
            max-width: 80%;
            min-width: 1000px;
            margin: 0 auto;
            border-collapse: collapse;
            margin-bottom: 20px;
            margin-top: 10px;
            table-layout: fixed;
            overflow-x: scroll;


        }

        .tableServicios th,
        .tableServicios td {
            font-size: 12px; /* Tamaño de fuente reducido */
        }

        .action-buttons {
            flex-direction: column; /* Cambia a diseño vertical */
            gap: 15px;             /* Añade más espacio entre los botones */
        }

        .action-buttons a.btn-edit,
        .action-buttons .btn-delete {
            width: 100%;           /* Los botones ocuparán todo el ancho disponible */
            text-align: center;    /* Asegura que el texto quede centrado */
        }

        .tableServicios th,
        .tableServicios td {
            font-size: 12px; /* Tamaño de fuente reducido */
        }
    }

    .panelservicios{
        width: 80%;
        margin: 0 auto;
        min-width: 10vh;
        overflow-x: scroll;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem; background-color: #f8f9fa; border-radius: 8px;
    }

    /* Estilos para la tabla de pacientes */
    .tableServicios {
        width: 100%;
        max-width: 100%;
        margin: 0 auto;
        border-collapse: collapse;
        margin-bottom: 20px;
        margin-top: 10px;
        table-layout: fixed;
        min-width: 80%;
    }

    .tableServicios thead {
        background-color: var(--primary-color);
        color: white;
    }

    .tableServicios th,
    .tableServicios td {
        padding: 10px;
        text-align: center;
        border: 1px solid #dee2e6;
        word-wrap: break-word;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .tableServicios td {
        text-overflow: ellipsis;
    }

    .tableServicios th {
        font-weight: bold;
    }

    .tableServicios td button {
        margin-right: 5px;
    }

    .tableServicios td:nth-child(2),
    /* Asegúrate de que el índice sea el correcto para la columna de descripción */
    .tableServicios th:nth-child(2) {
        width: 13%;
        /* Ajusta este valor según el tamaño que desees */
    }

    .tableServicios td:nth-child(1),
    /* Asegúrate de que el índice sea el correcto para la columna de descripción */
    .tableServicios th:nth-child(1) {
        width: 6%;
        /* Ajusta este valor según el tamaño que desees */
    }

    .tableServicios td:nth-child(3),
    /* Asegúrate de que el índice sea el correcto para la columna de descripción */
    .tableServicios th:nth-child(3) {
        width: 10%;
        /* Ajusta este valor según el tamaño que desees */
    }

    /* Especificar el tamaño de la columna de descripción */
    .tableServicios td:nth-child(4),
    /* Asegúrate de que el índice sea el correcto para la columna de descripción */
    .tableServicios th:nth-child(4) {
        width: 45%;
        /* Ajusta este valor según el tamaño que desees */
    }

    .tableServicios td:nth-child(5),
    /* Asegúrate de que el índice sea el correcto para la columna de descripción */
    .tableServicios th:nth-child(5) {
        width: 7%;
        /* Ajusta este valor según el tamaño que desees */
    }

    .tableServicios td:nth-child(6),
    /* Asegúrate de que el índice sea el correcto para la columna de descripción */
    .tableServicios th:nth-child(6) {
        width: 22%;
        /* Ajusta este valor según el tamaño que desees */
    }

    /* Si la descripción es larga, asegúrate de que se divida adecuadamente */
    .tableServicios td:nth-child(4) {
        word-wrap: break-word;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Estilo base para la sección de botones */
    .action-buttons {
        display: flex;
        gap: 10px;
        align-items: center;
        justify-content: center;
    }
    /* Estilos para los botones */
    .btn-edit,
    .btn-delete {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-right: 5px;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        flex: 1;
    }

    .btn-edit {
        background-color: var(--primary-color);
        color: var(--text-color);
    }
    .btn-delete {
        background-color: var(--btn-danger-color);
        color: var(--text-color);
    }

    .btn-edit:hover {
        background-color: #2763a4;
        /* Verde más oscuro al pasar el ratón */
    }

    .btn-delete:hover {
        background-color: #c82333;
        /* Rojo más oscuro al pasar el ratón */
    }

    .gratuito {
        color: green;
        font-weight: bold;
    }

    .con-costo {
        color: black;
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

    @include('admin.menu_nav')


    <div class="central">
        <div>
            <h1 class="TituloServicios">Lista de Servicios</h1>
            <div
                style="width: 80%; min-width: 10vh; overflow-x: auto;  margin: 0 auto;  display: flex; justify-content: space-between; align-items: center; gap: 1rem; background-color: #f8f9fa; border-radius: 8px;">
                <!-- Botón para abrir el modal -->
                <a href="#addServiceModal" class="btn-primary">Agregar Servicio</a>

                <div
                    style="display: flex; gap: 0.5rem; align-items: center; justify-content: space-between; width: 30%;">
                    <span>Buscar:</span>
                    <input type="search" class="form-control" placeholder="Buscar Servicio..." id="buscarServicio"
                        style="padding: 10px; flex: 1; border-radius: 4px;" onkeyup="buscarServicio()">
                </div>
            </div>

            <div class="panelservicios" style="min-width: 10vh; overflow-x: scroll;">
                <table class="tableServicios">
                    <thead>
                        <tr>
                            <th>Folio</th> <!-- ID del servicio -->
                            <th>Nombre</th> <!-- Nombre del servicio -->
                            <th>Costo</th> <!-- Costo del servicio -->
                            <th>Descripción</th> <!-- Descripción del servicio -->
                            <th>Ícono</th>
                            <th>Acciones</th> <!-- Opciones de editar/eliminar -->
                        </tr>
                    </thead>
                    <tbody id="tbodyServicios">
                        @foreach ($servicios as $servicio)
                            <tr>
                                <td>{{ $servicio->getID() }}</td>
                                <td>{{ $servicio->nombre }}</td>
                                <td class="{{ $servicio->costo == 0 ? 'gratuito' : 'con-costo' }}">
                                    {{ $servicio->costo == 0 ? 'Gratuito' : '$' . number_format($servicio->costo, 2) }}
                                </td>
                                <td>{{ $servicio->descripcion }}</td>
                                <td>{{ $servicio->icono }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <!-- Botón Editar -->
                                        <a href="#editServiceModal-{{ $servicio->id }}" class="btn-edit">
                                            Editar
                                        </a>
                                        <!-- Botón Eliminar -->
                                        <form action="{{ route('admin.servicio.destroy', $servicio->id) }}" method="POST"  class="btn-delete" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>


                            </tr>

                            <!-- Edit Patient Modal -->
                            <div class="modal" id="editServiceModal-{{ $servicio->id }}">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="padding-left: 10px;">Editar Servicio</h5>
                                        <a href="#" class="close">&times;</a>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.servicio.update', $servicio->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label for="nombre">Nombre del Servicio</label>
                                                <input type="text" name="nombre" class="form-control"
                                                    value="{{ $servicio->nombre }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="icono">Ícono</label><br>
                                                <input type="text" name="icono" class="form-control"
                                                    value="{{ $servicio->icono }}" >
                                            </div>

                                            <div class="form-group">
                                                <label for="costo">Costo</label><br>
                                                <input type="number" step="0.01" name="costo" class="form-control"
                                                    value="{{ $servicio->costo }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="descripcion">Descripción</label><br>
                                                <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required>{{ $servicio->descripcion }}</textarea>
                                            </div>

                                            <!-- Botones centrados -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn-primary">Actualizar</button>
                                                <a href="#" class="btn-secondary" data-dismiss="modal">Cancelar</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Fin Edit Patient Modal -->
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="pagination-wrapper" style="width: 80%; margin: 0 auto;">
                {{ $servicios->links() }}
            </div>





            <!-- Add Patient Modal -->
            <div id="addServiceModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Nuevo Servicio</h5>
                        <a href="#" class="close">&times;</a>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.servicio.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="PanelModal">
                                <div class="form-group">
                                    <label for="nombre">Nombre del Servicio</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre"
                                        placeholder="Ingrese el nombre del servicio" required>
                                </div>

                                <div class="form-group">
                                    <label for="icono">Ícono</label><br>
                                    <input type="text" name="icono" class="form-control" id="icono"
                                        placeholder="Ingrese del ícono" >
                                </div>

                                <div class="form-group">
                                    <label for="costo">Costo</label><br>
                                    <input type="number" step="0.01" name="costo" class="form-control"
                                        id="costo" placeholder="Ingrese el costo del servicio">
                                </div>

                                <div class="form-group">
                                    <label for="descripcion">Descripción</label><br>
                                    <textarea name="descripcion" id="descripcion" class="form-control" rows="4"
                                        placeholder="Ingrese una descripción detallada del servicio" required></textarea>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn-primary">Guardar</button>
                                <a href="#" class="btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        const todosLosServicios = @json($serviciosall); // Traer todos los servicios

        function buscarServicio() {
            const searchValue = document.getElementById('buscarServicio').value.toLowerCase();

            // Si la búsqueda está vacía, recargar la página
            if (searchValue.trim() === '') {
                window.location.reload();
                return;
            }

            const tbody = document.getElementById('tbodyServicios');
            tbody.innerHTML = ''; // Limpiar la tabla

            function normalizarTexto(texto) {
                return texto
                    .normalize("NFD") // Descompone caracteres con acentos en sus componentes base
                    .replace(/[\u0300-\u036f]/g, "") // Elimina los diacríticos (acentos)
                    .toLowerCase(); // Convierte a minúsculas
            }

            // Filtrar los servicios
            const resultados = todosLosServicios.filter(servicio => {
                // Normalizar valores para evitar errores
                const idServicio = String(servicio.id || '').padStart(3, '0');
                const nombreServicio = normalizarTexto(servicio.nombre || '');
                const descripcionServicio = normalizarTexto(servicio.descripcion || '');
                const costoServicio = servicio.costo !== null && servicio.costo !== undefined ?
                    parseFloat(servicio.costo).toFixed(2) :
                    'Gratuito'; // Asignar 'Gratuito' si no tiene costo
                const searchNormalized = normalizarTexto(searchValue);

                // Comparar incluyendo "Gratuito"
                return (
                    idServicio.includes(searchValue) || // Búsqueda por ID
                    nombreServicio.includes(searchNormalized) || // Búsqueda por nombre
                    descripcionServicio.includes(searchNormalized) || // Búsqueda por descripción
                    costoServicio.includes(searchNormalized) || // Búsqueda por costo
                    (normalizarTexto('Gratuito').includes(searchNormalized) && servicio.costo ==
                        0) // Búsqueda explícita de "Gratuito"
                );
            });

            // Mostrar resultados
            if (resultados.length > 0) {
                resultados.forEach(servicio => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${String(servicio.id).padStart(3, '0')}</td>
                        <td>${servicio.nombre || 'Sin nombre'}</td>
                        <td>${servicio.costo > 0 ? `$${parseFloat(servicio.costo).toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}` : 'Gratuito'}</td>
                        <td>${servicio.descripcion || 'Sin descripción'}</td>
                        <td>${servicio.icono || 'Sin icono'}</td>

                        <td>

                            <div style="flex-direction: column; gap: 10px;">
                                <div style="display: flex; gap: 10px; align-items: center;">

                                <a href="#editServiceModal-${servicio.id}" class="btn-edit">Editar</a>
                                <form action="${servicio.eliminarruta}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Eliminar</button>
                                </form>
                                </div>
                            </div>
                        </td>
                    `;
                    tbody.appendChild(row);
                });
            } else {
                tbody.innerHTML = `<tr><td colspan="5" style="text-align: center;">No se encontraron resultados</td></tr>`;
            }
        }
    </script>

