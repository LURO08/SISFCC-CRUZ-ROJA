<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/component/modal.css') }}">
    <title>Pacientes y Recetas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .btn {
            display: flex;
            align-items: center;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, padding 0.3s;
            justify-content: center;
        }

        .btn:hover {
            background-color: #0056b3;
            /* Color de fondo al pasar el ratón */
        }

        .collapse-btn {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: transparent;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #007bff;
            transition: color 0.3s;
        }

        .collapse-btn:hover {
            color: #0056b3;
        }

        .content {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
        }

        :root {
            --primary-color: #007bff;
            --hover-color: #0056b3;
            --text-color: #fff;
            --background-color: #f4f4f4;
        }

        .TituloPacientes {
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

        .modal-content {
            max-width: 700px;
            padding: 0px;
        }

        .central {
            width: auto;
            padding: 0 20px;

            box-sizing: border-box;



        }



        .table {
            border-collapse: collapse;
            border: 1px solid #dee2e6;
            width: 100%;
            text-align: center;
            margin: 0 auto;
            max-width: 100%;
            border-radius: 0.5rem;
        }


        .form-group input {
            width: 100%;
        }

        .form-group .form-control {
            width: 100%;
        }


        .form-group {
            margin-bottom: 15px;
        }

        .table-container {
            border: 1px solid var(--primary-color);
            border-radius: 8px;

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
            padding: 15px;
            height: 65vh;
            overflow-y: auto;

        }

        .form-group .form-control {
            width: 100%;
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
            display: flex;
            /* Activar flexbox */
            flex-direction: row;
            /* Alinear elementos en columna */
            align-items: center;
            /* Centrar horizontalmente */
            justify-content: center;
            /* Centrar verticalmente */
            gap: 10px;
            /* Espacio entre botones (opcional) */
            height: 100%;
            /* Asegurar que ocupe toda la altura de la celda */
            width: 100%;

        }

        .modal .modal-content {
            max-width: 450px;
        }
    </style>

</head>

<body>
    @include('doctor.consulta.menu_nav')

    <div class="content">
        <!-- Tabla de Recetas Generadas -->
        <div>
            <h1 style="margin: 0; text-align: center; font-weight: 800; font-size: 2rem;
            color: #007bff;">Lista de Pacientes</h1>
            <br>
            <div
                style="display: flex; justify-content: space-between; align-items: center; gap: 1rem; background-color: #f8f9fa; border-radius: 8px;">
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
                            <td>{{ $paciente->getID() }}</td>
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
                                        <form action="{{ route('doctor.pacientes.destroy', $paciente->id) }}"
                                            method="POST" style="flex: 1;">
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
                                    <form action="{{ route('doctor.pacientes.update', $paciente->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label><br>
                                                <input type="text" name="nombre" class="form-control"
                                                    value="{{ $paciente->nombre }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="apellidopaterno">Apellido Paterno</label><br>
                                                <input type="text" name="apellidopaterno" class="form-control"
                                                    value="{{ $paciente->apellidopaterno }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="apellidomaterno">Apellido Materno</label><br>
                                                <input type="text" name="apellidomaterno" class="form-control"
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
                                                <select name="tipo_sangre" id="tipo_sangre" class="form-control"
                                                    required>
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
                                                <small id="tipo_sangreHelp" class="form-text text-muted">Seleccione el
                                                    tipo
                                                    de sangre
                                                    del paciente.</small>
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
                                        id="apellidopaterno" placeholder="Ingrese el apellido paterno" required>
                                </div>
                                <div class="form-group">
                                    <label for="apellidomaterno">Apellido Materno</label><br>
                                    <input type="text" name="apellidomaterno" class="form-control"
                                        id="apellidomaterno" placeholder="Ingrese el apellido materno" required>
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
                                    <select name="tipo_sangre" id="tipo_sangre" class="form-control" required>
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

    <script>
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
                const nombreCompleto = normalizarTexto(
                        `${paciente.nombre} ${paciente.apellidopaterno} ${paciente.apellidomaterno}`)
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

</html>
