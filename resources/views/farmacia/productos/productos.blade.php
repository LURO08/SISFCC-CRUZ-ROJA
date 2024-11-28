<!-- Custom CSS -->
<style>
    .tituloMedicamentos {
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


    /* Estilos para el modal */
    .modalEditmedicamento,
    .modalmedicamentoadd {
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

    .modalEditmedicamento:target,
    .modalmedicamentoadd:target {
        display: flex;
    }

    .modalEditmedicamento .modal-content,
    .modalmedicamentoadd .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        width: 100%;
        max-width: 600px;
        position: relative;
        justify-content: space-between;
    }

    .modalEditmedicamento .modal-header,
    .modalmedicamentoadd .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #dee2e6;
        margin-bottom: 15px;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
        padding: 5px;
    }

    .modalEditmedicamento .modal-title,
    .modalmedicamentoadd .modal-title {
        font-size: 1.25rem;
        margin: 0;
    }

    .modalEditmedicamento .modal-body,
    .modalmedicamentoadd .modal-body {
        padding: 20px;
        height: 80vh;

    }

    .modalEditmedicamento .form-group,
    .modalmedicamentoadd .form-group {
        margin-bottom: 15px;

    }


    .modalEditmedicamento .form-group .form-control,
    .modalmedicamentoadd .form-group .form-control {
        width: 100%;
    }

    /* Estilo para la previsualización de fotos */
    .img-thumbnail {
        max-width: 90%;
        max-height: 150px;
        border-radius: 4px;
        border: 1px solid #dee2e6;
        margin: 5px;
    }

    .modalEditmedicamento .form-row,
    .modalmedicamentoadd .form-row {
        display: flex;
        padding: 15px;
        height: 65vh;
        overflow-y: auto;
    }

    /* Estilos para el panel izquierdo */
    .modalEditmedicamento .PanelIzquierdo,
    .modalmedicamentoadd .PanelIzquierdo {
        width: 80%;
        margin: 0 auto;
        text-align: left;
    }

    /* Estilos para la foto */
    .modalEditmedicamento .PanelIzquierdo .form-group,
    .modalmedicamentoadd .PanelIzquierdo .form-group {
        display: flex;
        flex-direction: column;
        align-items: center;
    }


    .modalmedicamentoadd .PanelIzquierdo .form-group-label,
    .modalEditmedicamento .PanelIzquierdo .form-group-label {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-left: 15%;
    }

    /* Estilo para la imagen de vista previa */
    .modalmedicamentoadd #foto-preview-edit-,
    .modalEditmedicamento #foto-preview-edit- {
        margin-bottom: 15px;
    }

    /* Estilo para la etiqueta */
    .modalmedicamentoadd .PanelIzquierdo label,
    .modalEditmedicamento .PanelIzquierdo label {
        margin-bottom: 10px;
        display: block;
        text-align: left;
    }

    /* Estilo para el input de archivo */
    .modalmedicamentoadd .PanelIzquierdo .form-control-file,
    .modalEditmedicamento .PanelIzquierdo .form-control-file {
        width: 100%;
        max-width: 500px;
    }

    /* Estilo para las imágenes previas */
    .modalmedicamentoadd .img-thumbnail,
    .modalEditmedicamento .img-thumbnail {
        border-radius: 4px;
        border: 1px solid #dee2e6;
        max-width: 100%;
        height: auto;
    }

    .modalmedicamentoadd .PanelDerecho,
    .modalEditmedicamento .PanelDerecho {
        width: 100%;
        margin-left: 5%;
    }

    .modalmedicamentoadd .modal-footer,
    .modalEditmedicamento .modal-footer {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }

    .modalmedicamentoadd .modal-footer button,
    .modalEditmedicamento .modal-footer button {
        margin: 10px;
        justify-content: center;
        align-content: center;
        align-items: center;
    }

    .modalmedicamentoadd .close,
    .modalEditmedicamento .close {
        font-size: 1.5rem;
        color: #fff;
        text-decoration: none;
        cursor: pointer;
        margin-right: 10px;
    }

    .modalmedicamentoadd .close:hover,
    .modalEditmedicamento .close:hover {
        color: #dcdcdc;
    }

    .text-center {
        text-align: center;
    }

    .btn-addMedicamento,
    .btn-secondary,
    .btn-primary {
        padding: 10px 20px;
        border-radius: 5px;
        color: #fff;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-addMedicamento,
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        float: left;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }


    .btn-addMedicamento:hover,
    .btn-secondary:hover {
        opacity: 0.8;
    }


    .tablemedicamentos {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
    }

    .tablemedicamentos thead {
        background-color: #f8f9fa;
        color: #343a40;
    }

    .tablemedicamentos th,
    .tablemedicamentos td {
        padding: 10px 10px 10px 10px;
        text-align: center;
        border: 1px solid #dee2e6;
    }

    .tablemedicamentos td {
        padding: 0px 10px 0px 10px;
        text-align: center;
        border: 1px solid #dee2e6;

    }

    .tablemedicamentos th {
        font-weight: bold;
        background-color: #007bff;
        color: #fff;
        text-align: center;
    }

    .tablemedicamentos td img {
        border-radius: 4px;
        max-width: 100px;
    }

    /* Estilo específico para los botones */
    .tablemedicamentos .accionesbtn {
        display: flex; /* Activar flexbox */
    flex-direction: row; /* Alinear elementos en columna */
    align-items: center; /* Centrar horizontalmente */
    justify-content: center; /* Centrar verticalmente */
    gap: 8px; /* Espacio entre botones (opcional) */
    height: 100%; /* Asegurar que ocupe toda la altura de la celda */
    width: 100%;
    }


    .tablemedicamentos .accionesbtn a,
    .tablemedicamentos .accionesbtn form {
        display: inline-block;
        padding: 10px 15px; /* Botones más grandes para mayor visibilidad */
        font-size: 14px; /* Un tamaño de fuente adecuado */
        text-decoration: none; /* Eliminar subrayado de los enlaces */
        border-radius: 5px; /* Bordes redondeados para un diseño más suave */
    }

    /* Estilos para los botones */
    .btn-edit {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        font-size: 14px;
        width: 40%;
        padding: 10px 12px;
        border-radius: 4px;
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        /* Transición suave */
        margin: 0;
    }

    .btn-edit:hover {
        background-color: #2763a4;
        transform: scale(1.05);
        /* Efecto sutil de zoom al hacer hover */
        /* Verde más oscuro al pasar el ratón */
    }

    .btn-edit:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.5);
        /* Mejor estilo para el enfoque (focus) */
    }

    .btn-delete {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #fff;
        font-size: 14px;
        width: auto;
        padding: 10px 12px;
        border-radius: 4px;
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        /* Transición suave */
    }

    .btn-delete:hover {
        background-color: #c82333;
        transform: scale(1.05);
        /* Efecto sutil de zoom al hacer hover */
    }

    .btn-delete:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(255, 0, 0, 0.5);
        /* Mejor estilo para el enfoque (focus) */
    }
</style>

<!-- Contenido HTML -->
<div class="row">
    <div class="col-md-12">
        <h1 class="tituloMedicamentos">Lista de Medicamentos</h1>
        <br>
        <div style="display: flex; justify-content: space-between; align-items: center; gap: 1rem; background-color: #f8f9fa; border-radius: 8px;">
            <!-- Botón para abrir el modal, alineado a la izquierda -->
            <a href="#addProductModal" class="btn" style=" background-color: #007bff;
            border-color: #007bff; color:#fff;" style="white-space: nowrap;">Agregar Medicamento</a>

            <!-- Barra de búsqueda y botón, alineados a la derecha -->
            <div style="display: flex; gap: 0.5rem; align-items: center; justify-content: space-between; width: 30%;">
                <span>Buscar:</span>
                <input type="search" class="form-control" placeholder="Buscar medicamento..." id="buscarMedicamento"
                       style="padding: 10px; flex: 1; border-radius: 4px;"
                       onkeyup="buscarMedicamento()">
            </div>
        </div>
        <table class="tablemedicamentos">
            <thead>
                <tr>
                    <th>Folio</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Unidades</th>
                    <th>Dosis</th>
                    <th>Caducidad</th>
                    <th>Precio</th>
                    <th>Fotos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tbdymedicamentos" class="tbdymedicamentos">
                @foreach ($medicamentos as $medicamento)
                    <tr>
                        <td>{{ $medicamento->getID() }}</td>
                        <td>{{ $medicamento->nombre }}</td>
                        <td>{{ $medicamento->descripcion }}</td>
                        <td>{{ $medicamento->cantidad }}</td>
                        <td style="padding: 0px 10px; white-space: nowrap;">{{ $medicamento->dosis }} {{ $medicamento->medida }}</td>

                        <td>{{ date('d/m/Y', strtotime($medicamento->caducidad)) }}</td>
                        <td>{{ $medicamento->precio }}</td>
                        <td>
                            @if ($medicamento->imagen)
                                <div>
                                    <img src="{{ asset($medicamento->imagen) }}" alt="{{ $medicamento->nombre }}"
                                        class="img-fluid" width="100px">
                                </div>
                            @else
                                <span>No hay fotos</span>
                            @endif
                        </td>
                        <td >
                            <div class="accionesbtn">
                                <!-- Botón para editar el modal -->

                                <a href="#editProductModal-{{ $medicamento->id }}" class="btn-edit">Editar</a>

                                <form action="{{ route('farmacia.product.destroy', $medicamento->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Eliminar</button>
                                </form>

                            </div>
                        </td>
                    </tr>

                    <!-- Edit Product Modal -->
                    <div class="modalEditmedicamento" id="editProductModal-{{ $medicamento->id }}">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="padding-left: 10px;">Editar medicamento</h5>
                                    <a href="#" class="close">&times;</a>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('farmacia.product.update', $medicamento->id) }}"
                                        method="POST" enctype="multipart/form-data">
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
                                                        id="foto-preview-edit-{{ $medicamento->id }}"></div>
                                                    @if ($medicamento->imagen)
                                                        <div>
                                                            <img id="imgAnterior-{{ $medicamento->id }}"
                                                                src="{{ asset($medicamento->imagen) }}"
                                                                alt="{{ $medicamento->nombre }}" class="img-fluid"
                                                                width="100px">
                                                        </div>
                                                    @else
                                                        <span>No hay fotos</span>
                                                    @endif
                                                    <input type="file" name="rutaimg"
                                                        id="btnfotos-{{ $medicamento->id }}" class="form-control-file"
                                                        style="width: 71%;">
                                                </div>
                                            </div>

                                            <!-- Panel derecho: detalles del medicamento -->
                                            <div class="PanelDerecho">
                                                <div class="form-group">
                                                    <label for="nombre">Nombre</label><br>
                                                    <input type="text" name="nombre" class="form-control"
                                                        value="{{ $medicamento->nombre }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="descripcion">Descripción</label><br>
                                                    <textarea name="descripcion" class="form-control" rows="4">{{ $medicamento->descripcion }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cantidad">Unidades</label><br>
                                                    <input type="number" name="cantidad" class="form-control"
                                                        value="{{ $medicamento->cantidad }}" required>
                                                </div>
                                                <div class="form-group" id="DivDosis">
                                                    <label for="dosis">Dosis</label>
                                                    <div class="input-group" class="from-control-selecto"
                                                        style="display: flex;">
                                                        <input type="number" class="form-control-1" name="dosis"
                                                            value="{{ $medicamento->dosis }}" required>
                                                        <div class="input-group-append" class="form-control-2">
                                                            <select name="medida" class="form-control">
                                                                <option value="g"
                                                                    {{ $medicamento->medida == 'g' ? 'selected' : '' }}>
                                                                    g
                                                                </option>
                                                                <option value="mg"
                                                                    {{ $medicamento->medida == 'mg' ? 'selected' : '' }}>
                                                                    mg</option>
                                                                <option value="ml"
                                                                    {{ $medicamento->medida == 'ml' ? 'selected' : '' }}>
                                                                    ml</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="caducidad">Caducidad</label><br>
                                                    <input type="date" name="caducidad" class="form-control"
                                                        value="{{ isset($medicamento->caducidad) ? date('Y-m-d', strtotime($medicamento->caducidad)) : '' }}"
                                                        required>
                                                </div>



                                                <div class="form-group">
                                                    <label for="precio">Precio</label><br>
                                                    <input type="number" name="precio" class="form-control"
                                                        value="{{ $medicamento->precio }}" required>
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
         <!-- Paginación -->
         <div class="pagination-wrapper">
            {{ $medicamentos->links() }}
        </div>
    </div>
</div>

<!-- Add Product Modal -->
<div id="addProductModal" class="modalmedicamentoadd">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Agregar Nuevo medicamento</h5>
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

                    <!-- Columna para los detalles del medicamento -->
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
                                <input type="number" class="form-control-1" name="dosis" id="dosis"
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
                            <input type="number" name="precio" class="form-control" id="precio" step="0.1"
                                placeholder="Ingrese el precio del Medicamento" required>
                        </div>

                        <div class="form-group">
                            <label for="caducidad">Caducidad</label><br>
                            <input type="date" name="caducidad" class="form-control" id="caducidad" required>
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

    // Previsualización de imagen para agregar medicamento
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

    // Función para mostrar una sección específica
    function showSection(event, sectionId) {
        event.preventDefault(); // Evita recargas innecesarias

        // Oculta todas las secciones
        const sections = document.querySelectorAll('.section');
        sections.forEach(section => {
            section.style.display = 'none';
        });

        // Muestra la sección deseada
        const sectionToShow = document.getElementById(sectionId);
        if (sectionToShow) {
            sectionToShow.style.display = 'block';
        }
    }

    // Previsualización de imagen para editar medicamento
    document.querySelectorAll("[id^='btnfotos-']").forEach(function(input) {
        input.onchange = function() {
            var id = this.id.split('-')[1];
            var preview = document.getElementById("foto-preview-edit-" + id);
            var file = this.files[0];
            var reader = new FileReader();
            var imgAnterior = document.getElementById("imgAnterior-" + id);

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

    const todosLosMedicamentos = @json($todosLosMedicamentos);  // Traer todos los medicamentos

    function buscarMedicamento() {
        const searchValue = document.getElementById('buscarMedicamento').value.toLowerCase();

        if (searchValue.trim() === '') {
                window.location.reload(); // Recargar la página
                return;
        }

        const tbody = document.getElementById('tbdymedicamentos');
        tbody.innerHTML = '';  // Limpiar la tabla

        // Filtrar los medicamentos
        const resultados = todosLosMedicamentos.filter(medicamento =>
            String(medicamento.id).padStart(3, '0').includes(searchValue) ||
            medicamento.nombre.toLowerCase().includes(searchValue) ||
            (medicamento.descripcion && medicamento.descripcion.toLowerCase().includes(searchValue)) ||
            (medicamento.cantidad && medicamento.cantidad.toString().includes(searchValue)) ||
            (medicamento.dosis && medicamento.medida && (`${medicamento.dosis}${medicamento.medida}`).toLowerCase().includes(searchValue.replace(/\s+/g, '').toLowerCase())) ||
            (medicamento.precio && medicamento.precio.toString().includes(searchValue)) ||
            (medicamento.caducidad && medicamento.caducidad.includes(searchValue))
        );

        // Mostrar resultados
        if (resultados.length > 0) {
            resultados.forEach(medicamento => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${medicamento.folio}</td>
                    <td>${medicamento.nombre}</td>
                    <td>${medicamento.descripcion}</td>
                    <td>${medicamento.cantidad}</td>
                    <td style="padding: 0px 10px; white-space: nowrap;">${medicamento.dosis} ${medicamento.medida}</td>
                    <td>${new Date(medicamento.caducidad).toLocaleDateString()}</td>
                    <td>${medicamento.precio}</td>
                    <td>
                        ${medicamento.imagen_url
                            ? `<img src="${medicamento.imagen_url}" alt="${medicamento.nombre}" class="img-fluid" width="100px">`
                            : 'No hay fotos'}
                    </td>
                    <td class="accionesbtn">
                        <a href="#editProductModal-${medicamento.id}" class="btn-edit">Editar</a>
                        <form action="${medicamento.eliminarruta}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Eliminar</button>
                        </form>
                    </td>
                `;
                tbody.appendChild(row);
            });
        } else {
            tbody.innerHTML = `<tr><td colspan="9" style="text-align: center;">No se encontraron resultados</td></tr>`;
        }
    }
</script>
