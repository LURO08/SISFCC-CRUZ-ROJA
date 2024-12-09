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
        min-width: 120px;
        /* Asegurar tamaño mínimo */
        text-align: center;
        /* Centrar texto */
        margin: 0;
        /* Eliminar márgenes innecesarios */
        padding: 10px 20px;
        /* Espaciado interno */
        border-radius: 5px;
        /* Bordes redondeados */
        font-size: 1rem;
        /* Tamaño de fuente */
        cursor: pointer;
        /* Indicador interactivo */
        border: none;
        /* Eliminar bordes */
        transition: all 0.3s ease;
        /* Animación suave */
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

    .TituloCobros {
        font-size: 36px;
        font-weight: bold;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 10px 0;
        border-radius: 5px;
    }

    @media (max-width: 1100px) {

        .TitulotableCobros {
            font-size: 28px;
        }

        .tableCobros {
            width: 80%;
            max-width: 80%;

            margin: 0 auto;
            border-collapse: collapse;
            margin-bottom: 20px;
            margin-top: 10px;
            table-layout: fixed;
            overflow-x: scroll;


        }

        .tableCobros th,
        .tableCobros td {
            font-size: 10px;
            /* Tamaño de fuente reducido */
        }

        .action-buttons {
            flex-direction: column;
            /* Cambia a diseño vertical */
            gap: 15px;
            /* Añade más espacio entre los botones */
        }

        .action-buttons a.btn-edit,
        .action-buttons .btn-delete {
            width: 100%;
            font-size: 10px;
            /* Los botones ocuparán todo el ancho disponible */
            text-align: center;
            /* Asegura que el texto quede centrado */
        }
    }

    /* Estilos responsivos */
    @media (max-width: 1100px) {

        .TitulotableCobros {
            font-size: 28px;
        }

        .tableCobros {
            width: 80%;
            max-width: 80%;

            margin: 0 auto;
            border-collapse: collapse;
            margin-bottom: 20px;
            margin-top: 10px;
            table-layout: fixed;
            overflow-x: scroll;


        }

        .tableCobros th,
        .tableCobros td {
            font-size: 10px;
            /* Tamaño de fuente reducido */
        }

        .action-buttons {
            flex-direction: column;
            /* Cambia a diseño vertical */
            gap: 15px;
            /* Añade más espacio entre los botones */
        }

        .action-buttons a.btn-edit,
        .action-buttons .btn-delete {
            width: 100%;
            font-size: 10px;
            /* Los botones ocuparán todo el ancho disponible */
            text-align: center;
            /* Asegura que el texto quede centrado */
        }
    }

    .panelcobros {
        width: 80%;
        margin: 0 auto;
        min-width: 10vh;
        overflow-x: scroll;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        background-color: #f8f9fa;
        border-radius: 8px;
    }

    /* Estilos para la tabla de pacientes */
    .tableCobros {
        width: 100%;
        max-width: 100%;
        margin: 0 auto;
        border-collapse: collapse;
        margin-bottom: 20px;
        margin-top: 10px;
        table-layout: fixed;
        min-width: 80%;
    }

    .tableCobros thead {
        background-color: var(--primary-color);
        color: white;
    }

    .tableCobros th,
    .tableCobros td {
        padding: 10px;
        text-align: center;
        border: 1px solid #dee2e6;

        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .tableCobros td {
        text-overflow: ellipsis;
    }

    .tableCobros th {
        font-weight: bold;
    }

    .tableCobros td button {
        margin-right: 5px;
    }


    .tableCobros td:nth-child(6),
    /* Asegúrate de que el índice sea el correcto para la columna de descripción */
    .tableCobros th:nth-child(6) {
        width: 22%;
        /* Ajusta este valor según el tamaño que desees */
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
        <h1 class="TituloCobros">Lista de Cobros</h1>
        <div
            style="width: 80%; min-width: 10vh; overflow-x: auto;  margin: 0 auto;  display: flex; justify-content: space-between; align-items: center; gap: 1rem; background-color: #f8f9fa; border-radius: 8px;">
            <div style="display: flex; gap: 0.5rem; align-items: center; justify-content: space-between; width: 30%;">
                <span>Buscar:</span>
                <input type="search" class="form-control" placeholder="Buscar cobro..." id="buscarcobro"
                    style="padding: 10px; flex: 1; border-radius: 4px;" onkeyup="buscarcobro()">
            </div>
        </div>

        <div class="panelcobros" style="min-width: 10vh; overflow-x: scroll;">
            <table class="tableCobros">
                <thead>
                    <tr>
                        <th>Folio</th> <!-- ID del cobro -->
                        <th>DerechoHabiente</th> <!-- Nombre del cobro -->
                        <th>servicio</th> <!-- Costo del cobro -->
                        <th>monto</th> <!-- Descripción del cobro -->
                        <th>facturo</th>
                        <th>Acciones</th> <!-- Opciones de editar/eliminar -->
                    </tr>
                </thead>
                <tbody id="tbodycobros">
                    @foreach ($cobros as $cobro)
                        <tr>
                            <td>{{ $cobro->getID() }}</td>
                            <td>{{ $cobro->nombre }}</td>
                            <td>{{ $cobro->Servicio->nombre }}</td>
                            <td>{{ $cobro->monto }}</td>
                            <td>
                                {{ $cobro->facturación == 1 ? 'Si' : 'No' }}
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <!-- Botón Editar -->
                                    <a href="#editCobrosModal-{{ $cobro->id }}" class="btn-edit">
                                        Editar
                                    </a>
                                    <!-- Botón Eliminar -->
                                    <form action="{{ route('admin.cobro.destroy', $cobro->id) }}" method="POST"
                                        class="btn-delete">
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
                        <div class="modal" id="editCobrosModal-{{ $cobro->id }}">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="padding-left: 10px;">Editar cobro</h5>
                                    <a href="#" class="close">&times;</a>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.cobro.update', $cobro->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="nombre">DerechoHabiente</label>
                                            <input type="text" name="nombre" class="form-control"
                                                value="{{ $cobro->nombre }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="servicio">Servicio</label><br>
                                            <select name="servicio" id="servicio"
                                                class="block w-full mt-1 px-3 py-2 border border-gray-500 rounded-md shadow-sm">
                                                <option value="" disabled
                                                    {{ !$cobro->servicio ? 'selected' : '' }}>
                                                    Seleccione un
                                                    servicio</option>
                                                @foreach ($servicios as $servicio)
                                                    <option value="{{ $servicio->id }}"
                                                        {{ old('servicio', $cobro->servicio) == $servicio->id ? 'selected' : '' }}>
                                                        {{ $servicio->nombre }} :
                                                        {{ $servicio->costo == 0 ? 'Gratuito' : '$' . number_format($servicio->costo, 2) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="costo">Monto</label><br>
                                            <input type="number" step="0.01" name="costo" class="form-control"
                                                value="{{ $cobro->monto }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="facturación">Facturación</label><br>
                                            <select name="facturación" id="facturación" class="form-control">
                                                {{ $cobro->descripcion }}
                                                <option value="1"
                                                {{ old('facturación', $cobro->facturación) == true ? 'selected' : '' }}>Si</option>
                                                <option  {{ old('facturación', $cobro->facturación) == false ? 'selected' : '' }}   value="0">No</option>
                                            </select>
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
            {{ $cobros->links() }}
        </div>

    </div>
</div>

<script>
    const todosLoscobros = @json($cobrosall); // Traer todos los cobros

    function buscarcobro() {
        const searchValue = document.getElementById('buscarcobro').value.toLowerCase();

        // Si la búsqueda está vacía, recargar la página
        if (searchValue.trim() === '') {
            window.location.reload();
            return;
        }

        const tbody = document.getElementById('tbodycobros');
        tbody.innerHTML = ''; // Limpiar la tabla

        function normalizarTexto(texto) {
            return texto
                .normalize("NFD") // Descompone caracteres con acentos en sus componentes base
                .replace(/[\u0300-\u036f]/g, "") // Elimina los diacríticos (acentos)
                .toLowerCase(); // Convierte a minúsculas
        }

        // Filtrar los cobros
        const resultados = todosLoscobros.filter(cobro => {
            // Normalizar valores para evitar errores
            const idcobro = String(cobro.id || '').padStart(3, '0');
            const nombrecobro = normalizarTexto(cobro.nombre || '');
            const descripcioncobro = normalizarTexto(cobro.descripcion || '');
            const costocobro = cobro.costo !== null && cobro.costo !== undefined ?
                parseFloat(cobro.costo).toFixed(2) :
                'Gratuito'; // Asignar 'Gratuito' si no tiene costo
            const searchNormalized = normalizarTexto(searchValue);

            // Comparar incluyendo "Gratuito"
            return (
                idcobro.includes(searchValue) || // Búsqueda por ID
                nombrecobro.includes(searchNormalized) || // Búsqueda por nombre
                descripcioncobro.includes(searchNormalized) || // Búsqueda por descripción
                costocobro.includes(searchNormalized) || // Búsqueda por costo
                (normalizarTexto('Gratuito').includes(searchNormalized) && cobro.costo ==
                    0) // Búsqueda explícita de "Gratuito"
            );
        });

        // Mostrar resultados
        if (resultados.length > 0) {
            resultados.forEach(cobro => {
                const row = document.createElement('tr');
                row.innerHTML = `
                        <td>${String(cobro.id).padStart(3, '0')}</td>
                        <td>${cobro.nombre || 'Sin nombre'}</td>
                        <td>${cobro.costo > 0 ? `$${parseFloat(cobro.costo).toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}` : 'Gratuito'}</td>
                        <td>${cobro.descripcion || 'Sin descripción'}</td>
                        <td>${cobro.icono || 'Sin icono'}</td>

                        <td>

                            <div style="flex-direction: column; gap: 10px;">
                                <div style="display: flex; gap: 10px; align-items: center;">

                                <a href="#editServiceModal-${cobro.id}" class="btn-edit">Editar</a>
                                <form action="${cobro.eliminarruta}" method="POST" style="display:inline;">
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
