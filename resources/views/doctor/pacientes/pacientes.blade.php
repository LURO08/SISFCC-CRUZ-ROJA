<!-- Custom CSS -->
<style>
    .slick-slide img {
        width: 100%;
        height: auto;
    }

    .img-thumbnail {
        max-width: 90%;
        max-height: 150px;
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

    /* Estilos para la tabla de productos */
    .tableProductos {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .tableProductos thead {
        background-color: #f8f9fa;
        color: #343a40;
    }

    .tableProductos th,
    .tableProductos td {
        padding: 10px;
        text-align: left;
        border: 1px solid #dee2e6;
    }

    .tableProductos th {
        font-weight: bold;
    }

    .tableProductos td img {
        border-radius: 4px;
        max-width: 100px;
    }

    .tableProductos td button {
        margin-right: 5px;
    }

    /* Estilo para la previsualización de fotos */
    .img-thumbnail {
        max-width: 90%;
        max-height: 150px;
        border-radius: 4px;
        border: 1px solid #dee2e6;
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
        /* Centra el panel en su contenedor */
        text-align: left;
        /* Centra el texto y los elementos internos */
    }

    /* Estilos para la foto */
    .PanelIzquierdo .form-group {
        display: flex;
        flex-direction: column;
        align-items: center;
        /* Centra el contenido dentro del grupo de formulario */
    }

    /* Estilos para la foto */
    .PanelIzquierdo .form-group-label {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        /* Centra el contenido dentro del grupo de formulario */
        margin-left: 15%;
    }

    /* Estilo para la imagen de vista previa */
    #foto-preview-edit- {
        margin-bottom: 15px;
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
        /* Asegura que el input de archivo ocupe todo el ancho del contenedor */
        max-width: 500px;
        /* Puedes ajustar este valor según tus necesidades */
    }

    /* Estilo para las imágenes previas */
    .img-thumbnail {
        border-radius: 4px;
        border: 1px solid #dee2e6;
        max-width: 100%;
        height: auto;
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
<div class="row">
    <div class="col-md-12">
        <h2>Lista de Pacientes</h2>
        <br>

        <!-- Botón para abrir el modal -->
        <a href="#addPatientModal" class="btn btn-primary">Agregar Paciente</a>

        <br><br>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="tablePacientes">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Tipo de Sangre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $paciente)
                    <tr>
                        <td>{{ $paciente->id }}</td>
                        <td>{{ $paciente->nombre }}</td>
                        <td>{{ $paciente->apellidopaterno }}</td>
                        <td>{{ $paciente->apellidomaterno }}</td>
                        <td>{{ $paciente->fecha_nacimiento }}</td>
                        <td>{{ $paciente->edad }}</td>
                        <td>{{ $paciente->sexo }}</td>
                        <td>{{ $paciente->tipo_sangre }}</td>
                        <td>
                            <!-- Botón para editar el modal -->
                            <a href="#editPatientModal-{{ $paciente->id }}" class="btn btn-edit">Editar</a>

                            <form action="{{ route('paciente.destroy', $paciente->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Eliminar</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Patient Modal -->
                    <div class="modal" id="editPatientModal-{{ $paciente->id }}">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="padding-left: 10px;">Editar Paciente</h5>
                                    <a href="#" class="close">&times;</a>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('paciente.update', $paciente->id) }}" method="POST"
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
                                                    <label for="fecha_nacimiento">Fecha de Nacimiento</label><br>
                                                    <input type="date" name="fecha_nacimiento" class="form-control"
                                                        value="{{ $paciente->fecha_nacimiento }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="edad">Edad</label><br>
                                                    <input type="number" name="edad" class="form-control"
                                                        value="{{ $paciente->edad }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sexo">Sexo</label><br>
                                                    <select name="sexo" class="form-control" required>
                                                        <option value="M"
                                                            {{ $paciente->sexo == 'M' ? 'selected' : '' }}>Masculino
                                                        </option>
                                                        <option value="F"
                                                            {{ $paciente->sexo == 'F' ? 'selected' : '' }}>Femenino
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tipo_sangre">Tipo de Sangre</label><br>
                                                    <input type="text" name="tipo_sangre" class="form-control"
                                                        value="{{ $paciente->tipo_sangre }}" required>
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
            <form action="{{ route('paciente.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label><br>
                            <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento"
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
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipo_sangre">Tipo de Sangre</label><br>
                            <input type="text" name="tipo_sangre" class="form-control" id="tipo_sangre"
                                placeholder="Ingrese el tipo de sangre" required>
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
