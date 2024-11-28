<!-- Custom CSS -->
<style>

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
        height: 40vh;
        overflow-y: auto;
    }

    .tablePacientes thead {
        background-color: #d32f2f;
        color: white;
    }

    .tablePacientes th, .tablePacientes td {
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
</style>

<!-- Contenido HTML -->
<div>

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

    <div>
        <h2>Lista de Pacientes</h2>
        <br>
        <!-- Botón para abrir el modal -->
        <a href="#addPatientModal" class="btn-primary">Agregar Paciente</a>
        <br><br>

        <table class="tablePacientes">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Tipo de Sangre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $paciente)
                    <tr>
                        <td>{{ $paciente->nombre }}</td>
                        <td>{{ $paciente->apellidopaterno }}</td>
                        <td>{{ $paciente->apellidomaterno }}</td>
                        <td>{{ $paciente->edad }}</td>
                        <td>{{ $paciente->sexo }}</td>
                        <td>{{ $paciente->tipo_sangre }}</td>
                        <td>
                            <!-- Botón para editar el modal -->
                            <a href="#editPatientModal-{{ $paciente->id }}" class="btn btn-edit">Editar</a>

                            <form action="{{ route('doctor.pacientes.destroy', $paciente->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Eliminar</button>
                            </form>
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
                                            <!-- Panel derecho: detalles del paciente -->
                                            <div class="PanelDerecho">
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
                                                            {{ $paciente->sexo == 'M' ? 'selected' : '' }}>Masculino
                                                        </option>
                                                        <option value="Femenino"
                                                            {{ $paciente->sexo == 'F' ? 'selected' : '' }}>Femenino
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tipo_sangre">Tipo de Sangre</label><br>
                                                    <select name="tipo_sangre" id="tipo_sangre" class="form-control" required>
                                                        <option value="">Seleccione el tipo de sangre</option>
                                                        <option value="A+" {{ $paciente->tipo_sangre == 'A+' ? 'selected' : '' }}>A+</option>
                                                        <option value="A-" {{ $paciente->tipo_sangre == 'A-' ? 'selected' : '' }}>A-</option>
                                                        <option value="B+" {{ $paciente->tipo_sangre == 'B+' ? 'selected' : '' }}>B+</option>
                                                        <option value="B-" {{ $paciente->tipo_sangre == 'B-' ? 'selected' : '' }}>B-</option>
                                                        <option value="O+" {{ $paciente->tipo_sangre == 'O+' ? 'selected' : '' }}>O+</option>
                                                        <option value="O-" {{ $paciente->tipo_sangre == 'O-' ? 'selected' : '' }}>O-</option>
                                                        <option value="AB+" {{ $paciente->tipo_sangre == 'AB+' ? 'selected' : '' }}>AB+</option>
                                                        <option value="AB-" {{ $paciente->tipo_sangre == 'AB-' ? 'selected' : '' }}>AB-</option>
                                                    </select>
                                                    <small id="tipo_sangreHelp" class="form-text text-muted">Seleccione el tipo de sangre del paciente.</small>
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
            <form action="{{ route('doctor.pacientes.store') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" name="apellidopaterno" class="form-control" id="apellidopaterno"
                                placeholder="Ingrese el apellido paterno" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidomaterno">Apellido Materno</label><br>
                            <input type="text" name="apellidomaterno" class="form-control" id="apellidomaterno"
                                placeholder="Ingrese el apellido materno" required>
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
                            <small id="tipo_sangreHelp" class="form-text text-muted">Seleccione el tipo de sangre del paciente.</small>
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
