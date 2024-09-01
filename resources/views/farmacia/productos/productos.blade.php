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
        <h2>Lista de Productos</h2>
        <br>

        <!-- Botón para abrir el modal -->
        <a href="#addProductModal" class="btn btn-primary">Agregar Medicamento</a>

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
                    <th>Descripción</th>
                    <th>Unidades</th>
                    <th>Dosis</th>
                    <th>Precio</th>
                    <th>Fotos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->cantidad }}</td>
                        <td>{{ $producto->dosis }} {{ $producto->medida }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>
                            @if ($producto->imagen)
                                <div>
                                    <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}"
                                        class="img-fluid" width="100px">
                                </div>
                            @else
                                <span>No hay fotos</span>
                            @endif
                        </td>
                        <td>
                            <!-- Botón para editar el modal -->
                            <a href="#editProductModal-{{ $producto->id }}" class="btn btn-edit">Editar</a>

                            <form action="{{ route('farmacia.product.destroy', $producto->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Eliminar</button>
                            </form>

                        </td>
                    </tr>

                    <!-- Edit Product Modal -->
                    <div class="modal" id="editProductModal-{{ $producto->id }}">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="padding-left: 10px;">Editar Producto</h5>
                                    <a href="#" class="close">&times;</a>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('farmacia.product.update', $producto->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-row">
                                            <!-- Panel izquierdo: foto -->
                                            <div class="PanelIzquierdo">
                                                <div class="form-group-label">
                                                    <label for="rutaimg">Foto</label>
                                                </div>
                                                <div class="form-group">

                                                    <div class="text-center"
                                                        id="foto-preview-edit-{{ $producto->id }}"></div>
                                                    @if ($producto->imagen)
                                                        <div>
                                                            <img id="imgAnterior-{{ $producto->id }}"
                                                                src="{{ asset($producto->imagen) }}"
                                                                alt="{{ $producto->nombre }}" class="img-fluid"
                                                                width="100px">
                                                        </div>
                                                    @else
                                                        <span>No hay fotos</span>
                                                    @endif
                                                    <input type="file" name="rutaimg"
                                                        id="btnfotos-{{ $producto->id }}" class="form-control-file"
                                                        style="width: 71%;">
                                                </div>
                                            </div>

                                            <!-- Panel derecho: detalles del producto -->
                                            <div class="PanelDerecho">
                                                <div class="form-group">
                                                    <label for="nombre">Nombre</label><br>
                                                    <input type="text" name="nombre" class="form-control"
                                                        value="{{ $producto->nombre }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="descripcion">Descripción</label><br>
                                                    <textarea name="descripcion" class="form-control" rows="4">{{ $producto->descripcion }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cantidad">Unidades</label><br>
                                                    <input type="number" name="cantidad" class="form-control"
                                                        value="{{ $producto->cantidad }}" required>
                                                </div>
                                                <div class="form-group" id="DivDosis">
                                                    <label for="dosis">Dosis</label>
                                                    <div class="input-group" class="from-control-selecto"
                                                        style="display: flex;">
                                                        <input type="text" class="form-control-1" name="dosis"
                                                            value="{{ $producto->dosis }}" required>
                                                        <div class="input-group-append" class="form-control-2">
                                                            <select name="medida" class="form-control">
                                                                <option value="g"
                                                                    {{ $producto->medida == 'g' ? 'selected' : '' }}>g
                                                                </option>
                                                                <option value="mg"
                                                                    {{ $producto->medida == 'mg' ? 'selected' : '' }}>
                                                                    mg</option>
                                                                <option value="ml"
                                                                    {{ $producto->medida == 'ml' ? 'selected' : '' }}>
                                                                    ml</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="precio">Precio</label><br>
                                                    <input type="number" name="precio" class="form-control"
                                                        value="{{ $producto->precio }}" required>
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
                    <!-- Fin Edit Product Modal -->
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Product Modal -->
<div id="addProductModal" class="modal">
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
                                <input type="text" class="form-control-1" name="dosis" id="dosis"
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
    // Previsualización de imagen para agregar producto
    document.getElementById("btnfotos").onchange = function() {
        var preview = document.getElementById("foto-preview");
        var file = this.files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.innerHTML = '<img src="' + reader.result + '" class="img-thumbnail">';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.innerHTML = '';
        }
    };

    // Previsualización de imagen para editar producto
    document.querySelectorAll("[id^='btnfotos-']").forEach(function(input) {
        input.onchange = function() {
            var id = this.id.split('-')[1];
            var preview = document.getElementById("foto-preview-edit-" + id);
            var file = this.files[0];
            var reader = new FileReader();
            var imgAnterior = document.getElementById("imgAnterior-"+ id);

            reader.onloadend = function() {
                preview.innerHTML = '<img src="' + reader.result + '" class="img-thumbnail">';
                // Verificar si el elemento existe antes de intentar modificar su estilo

                imgAnterior.style.display = "none";

            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = '';
            }
        }
    });
</script>
