<style>
    .invisible {
        display: none;
        /* Oculta el elemento */
    }

    .button-primary {
        background-color: #007bff;
        /* Color primario */
        color: white;
        /* Color del texto */
        transition: background-color 0.3s;
        /* Transición suave al pasar el mouse */
        padding: 10px 15px;
        /* Espaciado interno */
        border: none;
        /* Sin borde */
        border-radius: 5px;
        /* Bordes redondeados */
        cursor: pointer;
        /* Cambia el cursor al pasar el mouse */
        width: 100%;
        /* Botón ocupa todo el ancho */
    }

    .button-secondary {
        background-color: #007bff;
        /* Color de botón secundario (rosa) */
        color: white;
        /* Color del texto */
        transition: background-color 0.3s;
        /* Transición suave al pasar el mouse */
        padding: 10px 15px;
        /* Espaciado interno */
        border: none;
        /* Sin borde */
        border-radius: 5px;
        /* Bordes redondeados */
        cursor: pointer;
        /* Cambia el cursor al pasar el mouse */
        width: 48%;
        /* Botón ocupa el 48% del ancho */
    }

    .button-secondary:hover {
        background-color: #0056b3;
        /* Color al pasar el mouse */
    }

    .button-primary:hover {
        background-color: #0056b3;
        /* Color al pasar el mouse */
    }

    table {
        width: 100%;
        /* Asegura que la tabla ocupe todo el ancho */
        border-collapse: collapse;
        /* Elimina el espacio entre celdas */
        background-color: #ffe6f2;
        /* Color de fondo de la tabla (rosita) */
    }

    th,
    td {
        padding: 12px;
        /* Espaciado interno de celdas */
        text-align: center;
        /* Alineación del texto */
        border: 1px solid #007bff;
        /* Borde de celdas (rosita) */
    }

    th {
        background-color: #007bff;
        color: #fff;
        /* Color de fondo de encabezados (rosita más claro) */
    }
</style>


@include('admin.menu_nav')
<div class="central">


    <div>
        <h2 class="text-xl font-bold mb-4">Gestión de Tickets de Gasolina y Notas de Mecánicos</h2>
        <div class="flex justify-between mb-4">
            <button type="button" class="button-secondary" onclick="mostrarGestion()">Gestionar Datos</button>
            <button type="button" class="button-secondary" onclick="mostrarRegistro()">Registrar Nuevo</button>
        </div>

        <div id="gestionDatos" class="invisible">
            <h3 class="text-lg font-bold mb-2">Datos Registrados</h3>
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Fecha</th>
                        <th class="py-2 px-4 border-b">Tipo de Documento</th>
                        <th class="py-2 px-4 border-b">Motivo</th>
                        <th class="py-2 px-4 border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody id="data-table">
                    @forelse($documentos as $documento)
                        <tr>
                            <td>{{ $documento->fecha }}</td>
                            <td>
                                @switch($documento->tipodocumento)
                                    @case('ticket_gasolina')
                                        Ticket de Gasolina
                                    @break

                                    @case('nota_mecanico')
                                        Nota de Mecánico
                                    @break
                                @endswitch
                            </td>
                            <td>{{ $documento->motivo }}</td>
                            <td>
                                @if ($documento->rutaimg)
                                    <a href="{{ asset($documento->rutaimg) }}" target="_blank" class="button-primary">Ver
                                        Documento</a>
                                @else
                                    No disponible
                                @endif
                                <form action="{{ route('admin.documento.destroy', $documento->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-block px-4 py-2 bg-pink-600 text-white font-semibold rounded-md hover:bg-pink-700">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="4">No hay documentos registrados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div id="registroNuevo" class="invisible">
                <form action="{{ route('admin.documentos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                        <input type="date" id="fecha" name="fecha"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="tipo_documento" class="block text-sm font-medium text-gray-700">Tipo de Documento</label>
                        <select id="tipo_documento" name="tipo_documento"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                            <option value="">Selecciona un tipo</option>
                            <option value="ticket_gasolina">Ticket de Gasolina</option>
                            <option value="nota_mecanico">Nota de Mecánico</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="motivo" class="block text-sm font-medium text-gray-700">Motivo</label>
                        <textarea id="motivo" name="motivo" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" rows="3"
                            placeholder="Ingresa el motivo" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="documento" class="block text-sm font-medium text-gray-700">Documento (opcional)</label>
                        <input type="file" id="documento" name="documento" accept="image/*"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        <small class="text-gray-600">Formato permitido: JPG, PNG, GIF.</small>
                    </div>

                    <button type="submit" class="button-primary">Subir Documento</button>
                </form>
            </div>
        </div>

    </div>
</div>







    <script>
        function mostrarGestion() {
            document.getElementById('gestionDatos').classList.remove('invisible');
            document.getElementById('registroNuevo').classList.add('invisible');
        }

        function mostrarRegistro() {
            document.getElementById('registroNuevo').classList.remove('invisible');
            document.getElementById('gestionDatos').classList.add('invisible');
        }

        // Inicializa con el registro visible
        mostrarRegistro();
    </script>
