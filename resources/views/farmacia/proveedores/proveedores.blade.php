<!-- Custom CSS -->
<style>
    .tituloProveedores {
        font-size: 25px;
        font-weight: 700;
        text-align: center;
    }

    .slick-slide img {
        width: 100%;
        height: auto;
    }

    .img-thumbnail {
        max-width: 90%;
        max-height: 150px;
    }

    /* Estilos para el modal */
    .modalAddroveedor,
    .editProveedorModal {
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

    .modalAddroveedor:target,
    .editProveedorModal:target {
        display: flex;
    }

    .modalAddroveedor .modal-content,
    .editProveedorModal .modal-content {
        background-color: #fff;
        padding: 20px 20px 0;
        border-radius: 8px;
        width: 100%;
        max-width: 600px;
        position: relative;
        justify-content: space-between;
    }

    .modalAddroveedor .modal-header,
    .editProveedorModal .modal-header {
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

    .modalAddroveedor .modal-title,
    .editProveedorModal .modal-title{
        font-size: 1.25rem;
        margin: 0;
    }

    .modalAddroveedor .close,
    .editProveedorModal .close {
        font-size: 1.5rem;
        color: #fff;
        text-decoration: none;
        cursor: pointer;
        margin-right: 10px;
    }

    .modalAddroveedor .close:hover,
    .editProveedorModal .close:hover {
        color: #dcdcdc;
    }

    .modalAddroveedor .modal-body,
    .editProveedorModal .modal-body {
        padding: 20px 20px 0;
    }


    .modalAddroveedor .formContent,
    .editProveedorModal .formContent {

        max-height: 60vh;
        overflow-y: auto;
    }

    .modalAddroveedor .form-group,
    .editProveedorModal .form-group {
        margin-bottom: 15px;
    }

    .text-center {
        text-align: center;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 5px;
        color: #fff;
        text-decoration: none;
        cursor: pointer;
    }

    .addProveedor,
    .EditProveedor {
        background-color: #007bff;
        border-color: #007bff;
        float: left;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn:hover,
    .btn-secondary:hover {
        opacity: 0.8;
    }

    /* Estilos para la tabla de productos */
    .tableProductos {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
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
        background-color: #007bff;
        color: #fff;
        text-align: center;
    }

    .tableProductos td img {
        border-radius: 4px;
        max-width: 100px;
    }

    .tableProductos td button {
        margin-right: 5px;
    }

    .form-group .form-control {
        width: 100%;
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
        <h1 class="tituloProveedores">Lista de Proveedores</h1>
        <br>

        <!-- Botón para abrir el modal -->
        <a href="#modalAddroveedor" class="btn addProveedor">Agregar Proveedor</a>

        <br><br>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="tableProductos">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->id }}</td>
                        <td>{{ $proveedor->nombre }}</td>
                        <td>{{ $proveedor->apellidopaterno }}</td>
                        <td>{{ $proveedor->apellidomaterno }}</td>
                        <td>{{ $proveedor->correo }}</td>
                        <td>{{ $proveedor->telefono }}</td>
                        <td>
                            <!-- Botón para editar el modal -->
                            <a href="#editProveedorModal-{{ $proveedor->id }}" class="btn btn-edit">Editar</a>

                            <form action="{{ route('farmacia.product.destroy', $proveedor->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Eliminar</button>
                            </form>

                        </td>
                    </tr>

                    <!-- Edit Product Modal -->
                    <div class="editProveedorModal" id="editProveedorModal-{{ $proveedor->id }}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Proveedor</h5>
                                <a href="#" class="close">&times;</a>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('farmacia.proveedor.update', $proveedor->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="formContent">
                                        <div class="form-group col-md-6">
                                            <label for="nombreProveedor">Nombre</label>
                                            <input type="text" class="form-control" id="nombreProveedor"
                                                name="nombreProveedor" placeholder="Nombre del proveedor"
                                                value="{{ $proveedor->nombre }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="apellidoProveedor">Apellido Paterno</label>
                                            <input type="text" class="form-control" id="apellidopaternoProveedor"
                                                name="apellidopaternoProveedor" placeholder="Apellido del proveedor"
                                                value="{{ $proveedor->apellidopaterno }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="apellidoProveedor">Apellido Materno</label>
                                            <input type="text" class="form-control" id="apellidomaternoProveedor"
                                                name="apellidomaternoProveedor" placeholder="Apellido del proveedor"
                                                value="{{ $proveedor->apellidomaterno }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="telefonoProveedor">Teléfono</label>
                                            <input type="tel" class="form-control" id="telefonoProveedor"
                                                name="telefonoProveedor" placeholder="Teléfono del proveedor"
                                                value="{{ $proveedor->telefono }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="correoProveedor">Correo Electrónico</label>
                                            <input type="email" class="form-control" name="correoProveedor"
                                                id="correoProveedor" placeholder="Correo del proveedor"
                                                value="{{ $proveedor->correo }}">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn EditProveedor">Actualizar</button>
                                            <a href="" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Proveedor Modal -->
<div id="modalAddroveedor" class="modalAddroveedor">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Agregar Nuevo Proveedor</h5>
            <a href="" class="close">&times;</a>
        </div>
        <div class="modal-body">
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
                        <input type="tel" class="form-control" id="telefonoProveedor" name="telefonoProveedor"
                            placeholder="Teléfono del proveedor" required>
                    </div>
                    <div class="form-group">
                        <label for="correoProveedor">Correo Electrónico</label>
                        <input type="email" class="form-control" name="correoProveedor" id="correoProveedor"
                            placeholder="Correo del proveedor" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn addProveedor">Guardar</button>
                    <a href="" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

