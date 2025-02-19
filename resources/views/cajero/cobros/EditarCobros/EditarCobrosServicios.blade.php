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

    /* Css Menu de opciones Aside*/
    aside {
        width: 16%;
        background-color: var(--background-color);
        padding: 20px;
        height: 100vh;
        box-sizing: border-box;
        border-right: 2px solid #6c757d;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: width 0.3s ease;
        position: relative;
    }

    .toggle {
        text-align: center;
        width: 100%;
        justify-content: center;
        font-size: 30px;
    }

    #menu {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    #menu li {
        margin-bottom: 10px;
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

    .collapse-btn {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: transparent;
        border: none;
        font-size: 20px;
        cursor: pointer;
        color: var(--primary-color);
        transition: color 0.3s;
    }

    .collapse-btn:hover {
        color: var(--hover-color);
    }

    @media (max-width: 768px) {
        aside {
            width: 60px;
            padding: 10px;
        }

        #menu .btn .text {
            display: none;
            /* Ocultar el menú principal en móviles */
        }

        .btn {
            padding: 10px 5px;
            /* Ajustar tamaño del botón en móviles */
        }

        aside:hover {
            width: 200px;
        }

        aside:hover #menu .btn .text {
            display: block;
        }
    }

    .collapsed {
        display: none;
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


    /* Estilos personalizados adicionales */
    .form-group label {
        font-weight: bold;
        color: #34495e;
        margin-bottom: 5px;
    }

    .form-group input {
        border-radius: 5px;
        padding: 10px;
        border: 1px solid #b1b0b0;
        width: 100%;
    }


    #serviciosContainer {
        display: flex;
        flex-direction: column;
        gap: 15px;
        width: 80%;
        margin: auto;
        text-align: center;
        font-family: Arial, sans-serif;
    }

    .panelServicios {
        height: 100%;
        max-height: 70vh;
        overflow-y: auto;
    }


    .costo {
        font-weight: bold;
        color: #ffeb3b;
        font-size: 1em;
    }

    /* Icono de servicio */
    .servicio-icono {
        font-size: 2em;
        color: #ffeb3b;
        margin-right: 10px;
    }






    .btn {
        padding: 10px 15px;
        margin: 5px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }




    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .btn-submit {
        background-color: #007bff;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color: #0056b3;
    }

    #medicamentoModal,
    #materialModal {
        align-content: center;
        justify-items: center;
    }

    .custom-list-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding-left: 5px;
        margin: 5px 5px;
        background-color: #f9f9f9;
        list-style: none;
    }

    .search-result-item {
        padding: 5px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }
    .search-result-item:hover {
        background-color:rgba(106, 152, 239, 0.4)
    }

</style>

<link rel="stylesheet" href="{{ asset('css/component/modal.css') }}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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

<aside id="aside">
    <div class="toggle" onclick="toggleMenu()">
        <span class="icon" id="icon">←</span>
    </div>
    <ul id="menu" class="collapsed">
        <li>
            <a class="btn" href="/cajero" id="home">
                <span class="icon">🏠</span>
                <span class="text" style="font-weight: bold;">Home</span>
            </a>
        </li>
        <li>
            <a class="btn" href="{{ route('cajero.index') }}" id="cobrosBtn">
                <span class="icon">💸</span>
                <span class="text" style="font-weight: bold;">Cobros</span>
            </a>
        </li>
        <li>
            <a class="btn" href="{{ route('cajero.index') }}" id="listaServiciosBtn">
                <span class="icon">📋</span>
                <span class="text" style="font-weight: bold;">Lista Servicios</span>
            </a>
        </li>
        <li>
            <a class="btn"href="{{ route('cajero.index') }}" id="facturasBtn">
                <span class="icon">🧾</span>
                <span class="text" style="font-weight: bold;">Facturas</span>
            </a>
        </li>
        <li>
            <a class="btn" href="{{ route('cajero.index') }}" id="facturasBtn">
                <span class="icon">🧾</span>
                <span class="text" style="font-weight: bold;">Cobros de Servicios</span>
            </a>
        </li>


    </ul>
</aside>

<div class="central">
    <div class="container mt-4">
        <form action="{{ route('cajero.cobro.update',$cobro->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header bg-primary" style="font-size: 30px; font-weight: 800; color: #007bff;">
                    <h4>EDITAR COBROS DE SERVICIOS</h4>
                </div>

                <!-- Fecha y Hora -->
                <div class="flex row mb-3" style="width: 100%; justify-content: space-between;">
                    <div style="width: 30%;">
                        <div class="form-group">
                            <label for="fecha">Fecha del Cobro:</label>
                            <input type="date" id="fecha" class="form-control" value="{{ $cobro->created_at->format('Y-m-d') }}"

                                readonly required style="text-align: center; justify-content: center;">
                        </div>
                    </div>
                    <div style="width: 30%;">
                        <div class="form-group">
                            <label for="hora">Hora del Cobro:</label>
                            <input type="time" id="hora" class="form-control" value="{{ $cobro->created_at->format('H:i') }}"
                                readonly required style="text-align: center;">
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    {{-- DATOS DE PACIENTE --}}
                    <div style="display: flex; width: 100%; justify-content: center;">
                        <div style="width: 50%;">
                            <!-- Buscar o Ingresar Paciente -->
                            <div class="form-group mb-4">
                                <label for="searchPatient" style="font-weight: bold;">Seleccione o Ingrese el
                                    Paciente:</label>
                                <input type="search" id="searchPatient" name="pacienteNombre" value="{{ trim(($cobro->paciente->nombre ?? '') . ' ' . ($cobro->paciente->apellidopaterno ?? '') . ' ' . ($cobro->paciente->apellidomaterno ?? '')) }}"

                                    placeholder="Buscar paciente por nombre..." class="form-control">
                                <div id="searchResults" class="search-results mt-2" style="max-height: 20vh; overflow-y: auto;"></div>
                            </div>

                            <div id="suggestionMessage" class="alert alert-warning mt-2" style="display: none;">
                                <p>
                                    Parece que ingresaste un nombre compuesto (por ejemplo, "Juan Pérez").
                                    <a class="btn btn-sm btn-primary" id="showFieldsButton">Desglosar Nombre</a>
                                </p>
                            </div>
                            <div id="detailedFields" style="display: none;" class="mt-3">


                            </div>



                            <div class="form-group">
                                <input type="hidden" name="idPaciente" id="idPaciente" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="edad">Edad:</label>
                                <input type="number" name="edad" id="edad" value="{{$cobro->paciente->edad ?? ''}}"
                                    placeholder="Ingrese la edad del Paciente" class="form-control">
                            </div>
                        </div>

                        <div style="width: 50%;">

                            <div class="form-group">
                                <label for="edad">Sexo:</label>
                                <select name="sexo" id="sexo">
                                    <option value="" selected>Seleccione una opción:</option>
                                    <option value="Masculino" {{ ($cobro->paciente->sexo ?? '') == 'Masculino' ? 'selected' : '' }}>Hombre</option>
                                    <option value="Femenino"  {{ ($cobro->paciente->sexo ?? '') == 'Femenino' ? 'selected' : '' }}>Mujer</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tipo_sangre">Tipo de Sangre</label>
                                <select name="tipo_sangre" id="tipo_sangre" class="form-control">
                                    <option value="" selected>Seleccione el tipo de sangre</option>
                                    @foreach(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $tipo)
                                        <option value="{{ $tipo }}" {{ ($cobro->paciente->tipo_sangre ?? '') == $tipo ? 'selected' : '' }}>
                                            {{ $tipo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>

                    <div style="display: flex; justify-content: center; width: 100%;">
                        <div style="width: 50%; justify-content: center;">
                            <div style="display: flex; width: 100%; justify-content: center; align-items: center;">
                                <span style="font-weight: 800;">SERVICIOS:</span>
                                <a href="#materialModal" class="btn btn-secondary"
                                    style="margin-left: 10px; padding: 10px 20px; text-decoration: none; color: white; background-color: #6c757d; border-radius: 5px; text-align: center;"
                                    data-bs-toggle="modal">
                                    Agregar Servicio
                                </a>
                            </div>


                            {{-- SERVICIOS AGREGADO --}}
                            <div>
                                <div id="listaServicio" style="display: none;">
                                    <h5 style="font-weight: 700; ">Servicios Agregados:</h5>
                                    <ul id="ServicioList" style="height: 20vh; overflow-y: auto;"></ul>
                                </div>

                                <textarea style="display: none;" id="ServicioText" name="servicios" readonly></textarea>
                            </div>
                        </div>

                        <div style="width: 50%; justify-content: center;">

                            <div style="width: 100%;">
                                <div style="display: flex; width: 100%; justify-content: center; align-items: center;">
                                    <span style="font-weight: 800;">MEDICAMENTOS:</span>
                                    <a href="#medicamentoModal" class="btn btn-primary"
                                        style="margin-left: 10px; padding: 10px 20px; text-decoration: none; color: white; background-color: #007bff; border-radius: 5px; text-align: center;"
                                        data-bs-toggle="modal">
                                        Agregar Medicamento
                                    </a>
                                </div>

                                <div>
                                    {{-- MEDICAMENTOS AGREGADOS --}}
                                    <div id="listaMedicamentos" style="display: none;">
                                        <h5 style="font-weight: 700; ">Tratamientos:</h5>
                                        <ul id="medicamentosList" style="height: 20vh; overflow-y: auto;"></ul>
                                    </div>

                                    <textarea style="display: none;" id="MedicamentosText" name="medicamentos" readonly></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- MODAL SERVICIOS --}}
                    <div class="modal fade" id="materialModal" tabindex="-1" aria-labelledby="materialModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="medicamentoModalLabel">Seleccionar Servicio
                                    </h5>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                        onclick="closeModalServicios()">X</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group" style=" justify-content: space-between;">
                                        <label for="searchMedicamento">Seleccione el Servicio: </label>
                                        <input type="search" id="searchServicio"
                                            placeholder="Busca servicio por nombre..." oninput="searchServicios()">
                                        <div id="searchResultsServicio" class="search-resultsMaterial"></div>
                                    </div>

                                    <div class="form-group" id="CampoServicio" style="display: none;">
                                        <label for="selectedServicio">Servicio: </label>
                                        <input type="text" id="selectedServicio" name="selectedServicio" readonly>
                                        <input type="hidden" id="selectedServicioId" name="selectedServicioId">
                                    </div>

                                    <div class="form-group">
                                        <label for="cantidad">Costo: </label>
                                        <div style="display: flex; justify-content: center; align-items: center; ">
                                            <span style="margin-right: 10px;">$ </span>
                                            <input type="number" id="CostoServicio" disabled>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                            onclick="closeModalServicios()">Cerrar</button>
                                        <a class="btn btn-primary" id="agregarMaterial"
                                            onclick="addServicio()">Agregar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- MODAL MEDICAMENTO --}}
                    <div class="modal fade" id="medicamentoModal" tabindex="-1"
                        aria-labelledby="medicamentoModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="medicamentoModalLabel">Seleccionar Medicamento
                                    </h5>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                        onclick="closeModal()">X</button>

                                </div>
                                <div class="modal-body">
                                    <div class="form-group" style=" justify-content: space-between;">
                                        <label for="searchMedicamento">Seleccionar Medicamento: </label>
                                        <input type="text" id="searchMedicamento"
                                            placeholder="Buscar medicamento por nombre..."
                                            oninput="searchMedicamentos()">
                                        <div id="searchResultsMedicamento" class="search-resultsMedicamentos">
                                        </div>
                                    </div>


                                    <div class="form-group " id="CampoMedicamento" style="display: none;">
                                        <label for="selectedMedicamento">Medicamento:</label>
                                        <input type="text" id="selectedMedicamento" name="selectedMedicamento"
                                            readonly class="form-control">
                                        <input type="hidden" id="selectedMedicamentoId"
                                            name="selectedMedicamentoId">
                                    </div>
                                    <div class="form-group">
                                        <label for="costo">Costo:</label>
                                        <div style="display: flex; align-items: center;">
                                            <span style="margin-right: 10px;">$ </span>
                                            <input type="number" id="CostoMedicamento" min="0"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="costo">Cantidad:</label>
                                        <div style="display: flex; align-items: center;">
                                            <span style="margin-right: 10px;"> </span>
                                            <input type="number" id="CantidadMedicamento" min="0"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div style="width: 100%; display: flex;">
                                            <label for="medicamento_propio" style="display: flex; align-items: center; gap: 10px; cursor: pointer; ">
                                                Medicamento Propio
                                                <input type="checkbox" id="medicamento_propioON" value="true" style="width: 18px; height: 18px; cursor: pointer;">
                                            </label>
                                            <input type="hidden" name="medicamento_propio" id="medicamento_propio" value="false">
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                        onclick="closeModal()">Cerrar</button>
                                    <button type="button" class="btn btn-primary"
                                        onclick="addMedicamento()">Agregar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Monto Total -->
                    <div class="form-group">
                        <label for="montoTotal">Monto Total:</label>
                        <input type="text" name="montoTotal" id="montoTotal" class="form-control"
                            readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Confirmar y Cobrar</button>
                    <a href="{{ route('cajero.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

</div>


<script>
    window.addEventListener('load', cargarMedicamentos);
    window.addEventListener('load', cargarServicios);
    document.getElementById('searchPatient').addEventListener('input', searchPatient);

    const servicios = @json($servicios);
    const medicamentos = @json($medicamentos);
    const pacientes = @json($pacientes);

    let tratamientos = [];
    let serviciosseleccionados = [];

    document.getElementById('medicamento_propioON').addEventListener('click', function() {
        const medicamento_propio = document.getElementById('medicamento_propio');
        const medicamento_propioON = document.getElementById('medicamento_propioON');

        if (medicamento_propioON.checked) { // 'checked' es una propiedad booleana, no una cadena
            medicamento_propio.value = "true";
        } else {
            medicamento_propio.value = "false";
        }
    });

    function searchPatient() {
        const searchQuery = document.getElementById('searchPatient').value.trim();
        const searchResults = document.getElementById('searchResults');
        const detailedFields = document.getElementById('detailedFields');

        // Resetea resultados y campos adicionales
        resetFields(['edad', 'sexo', 'tipo_sangre']);
        searchResults.innerHTML = '';
        detailedFields.style.display = 'none';

        // Si la búsqueda está vacía, no hace nada
        if (searchQuery === '') return;

        // Filtra los pacientes según la búsqueda
        const filteredPacientes = pacientes.filter(paciente =>
            [paciente.nombre, paciente.apellidopaterno, paciente.apellidomaterno || '']
                .some(field => field.toLowerCase().includes(searchQuery.toLowerCase()))
        );

        // Renderiza resultados si se encuentran pacientes
        if (filteredPacientes.length > 0) {
            filteredPacientes.forEach(paciente => {
                const div = createSearchResultDiv(paciente);
                searchResults.appendChild(div);
            });
        } else {
            // Maneja el caso donde no se encuentran resultados
            handleNoResults(searchQuery, searchResults, detailedFields);
        }
    }

    // Función para resetear campos
    function resetFields(fieldIds) {
        fieldIds.forEach(id => {
            document.getElementById(id).value = '';
        });
    }

    // Función para crear un div de resultado
    function createSearchResultDiv(paciente) {
        const div = document.createElement('div');
        div.textContent = `${paciente.nombre} ${paciente.apellidopaterno} ${paciente.apellidomaterno || ''}`.trim();
        div.className = 'search-result-item'; // Clase CSS opcional
        div.onclick = () => selectPatient(
            paciente.id,
            div.textContent,
            paciente.edad,
            paciente.sexo,
            paciente.tipo_sangre
        );
        return div;
    }

    // Función para manejar casos donde no hay resultados
    function handleNoResults(searchQuery, searchResults, detailedFields) {
        const words = searchQuery.split(' ');

        if (words.length === 2) {
            // Muestra mensaje con campos de entrada adicionales si hay dos palabras
            searchResults.innerHTML = `
                <div>
                    <p style="color: red; font-weight: bold;">
                        Por favor, separe el nombre o ingrese un nombre con un mínimo de 3 palabras.
                    </p>
                    <div style="display: flex; gap: 10px;">
                        <div >
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div >
                            <label for="apellidoPaterno">Apellido Paterno:</label>
                            <input type="text" id="apellidoPaterno" name="apellidoPaterno" class="form-control" placeholder="Apellido Paterno" required>
                        </div>
                        <div >
                            <label for="apellidoMaterno">Apellido Materno:</label>
                            <input type="text" id="apellidoMaterno" name="apellidoMaterno" class="form-control" placeholder="Apellido Materno" required>
                        </div>
                    </div>
                </div>`;
            detailedFields.style.display = 'block';
        } else {
            // Muestra un mensaje básico si no hay resultados
            searchResults.innerHTML = `
                <div>
                    <p>No se encontraron pacientes.</p>
                </div>`;
            detailedFields.style.display = 'none';
        }
    }


    function selectPatient(pacienteid, patientName, pacienteEdad, PacienteSexo, PacienteTP) {
        document.getElementById('idPaciente').value = pacienteid;
        document.getElementById('searchPatient').value = patientName;
        document.getElementById('edad').value = pacienteEdad;
        if (PacienteSexo == 'Masculino') {
            document.getElementById('sexo').value = 'Masculino';
        } else if (PacienteSexo == 'Femenino') {
            document.getElementById('sexo').value = 'Femenino';
        }

        document.getElementById('tipo_sangre').value = PacienteTP;
        document.getElementById('searchResults').innerHTML = '';
    }

    // Muestra los campos desglosados cuando se pulsa el botón
    document.getElementById('showFieldsButton').addEventListener('click', function() {
        const searchText = document.getElementById('searchPatient').value.trim();
        const words = searchText.split(' ');
        const [nombre, apellidoPaterno] = words;

        // Rellena los campos con valores predeterminados
        document.getElementById('nombre').value = nombre || '';
        document.getElementById('apellidoPaterno').value = apellidoPaterno || '';
        document.getElementById('apellidoMaterno').value = '';

        // Muestra los campos desglosados
        document.getElementById('detailedFields').style.display = 'block';

        // Oculta el mensaje de sugerencia
        document.getElementById('suggestionMessage').style.display = 'none';
    });




    // SERVICIOS

    function searchServicios() {
        const searchQuery = document.getElementById('searchServicio').value.toLowerCase();
        const searchResults = document.getElementById('searchResultsServicio');
        searchResults.innerHTML = '';

        if (searchQuery === '') return;

        const filteredMaterial = servicios.filter(servicio =>
            servicio.nombre.toLowerCase().includes(searchQuery)
        );

        filteredMaterial.forEach(servicio => {
            const div = document.createElement('div');
            div.textContent = `${servicio.nombre} ${servicio.icono || ''} `
                .trim();
            div.setAttribute('data-id', servicio.id);
            div.onclick = () => selectServicios(servicio.id, div.textContent, servicio.costo);
            searchResults.appendChild(div);
        });

        if (filteredMaterial.length === 0) {
            searchResults.innerHTML = '<div>No se encontro material medico</div>';
        }
    }

    function cargarServicios() {
            const serviciosTexto = `{{ $cobro->servicios }}`.trim();
            const lineas = serviciosTexto.split('\n');

            lineas.forEach((linea, index) => {
                const match = linea.match(/^(.*?)-?\s*Costo:\s*\$(\d+(\.\d{2})?)$/i);

                if (match) {
                    // Crear el objeto tratamiento con los valores parseados
                    const servicio = {
                        nombre: match[1].trim(),
                        costo: parseFloat(match[2])
                    };

                    serviciosseleccionados.push(servicio);
                } else {
                    console.error(`Error en la línea ${index + 1}: Formato incorrecto - "${linea}"`);
                }
            });
            actualizarListaServicios();
    }

    function selectServicios(patientId, patientName, servicioCosto) {
        document.getElementById('CampoServicio').style.display = 'block';
        document.getElementById('selectedServicio').value = patientName;
        document.getElementById('CostoServicio').value = servicioCosto;
        document.getElementById('selectedServicioId').value = patientId;
        document.getElementById('searchResultsServicio').innerHTML = '';
        document.getElementById('searchServicio').value = '';
    }

    function addServicio() {
        const ServicioId = document.getElementById('selectedServicioId').value;
        const ServicioNombre = document.getElementById('selectedServicio').value;
        const ServicioCosto = document.getElementById('CostoServicio').value;

        if (!ServicioId || !ServicioNombre || ServicioCosto < 0) {
            alert('Por favor completa todos los campos con valores válidos.');
            return;
        }

        const existe = serviciosseleccionados.some(servicio => servicio.id === ServicioId);
        if (existe) {
            alert('Este Servicio ya ha sido agregado.');
            return;
        }


        const servicio = {
            id: ServicioId,
            nombre: ServicioNombre,
            costo: ServicioCosto
        };

        serviciosseleccionados.push(servicio);

        actualizarListaServicios();

        document.getElementById('CostoServicio').value = '';
        document.getElementById('CampoServicio').style.display = 'none';
        document.getElementById('selectedServicio').value = '';
        document.getElementById('selectedServicioId').value = '';
    }

    function actualizarListaServicios() {
        const ServicioList = document.getElementById('ServicioList');
        const ServicioListDiv = document.getElementById('listaServicio');
        const inputMaterial = document.getElementById('ServicioText');


        // Limpiar la lista y ocultar el contenedor
        ServicioList.innerHTML = '';
        ServicioListDiv.style.display = 'none';
        inputMaterial.value = '';

        // Verificar si hay materiales en el inventario
        if (serviciosseleccionados.length === 0) {
            ServicioList.innerHTML = '<p>No hay Servicios agregados.</p>';
            return;
        }

        // Recorrer los materiales y generar los elementos de la lista
        serviciosseleccionados.forEach((servicio, index) => {
            // Crear un contenedor para el material y el botón


            const li = document.createElement('li');
            li.classList.add('custom-list-item');

            // Crear el texto del material
            const texto = document.createElement('span');
            texto.textContent = `${servicio.nombre} - Costo: $${servicio.costo}`;

            // Crear el botón para eliminar el material
            const btnEliminar = document.createElement('button');
            btnEliminar.textContent = 'X';
            btnEliminar.style.width = '6%';
            btnEliminar.style.margin = '5px 10px';
            btnEliminar.classList.add('btn', 'btn-danger', 'btn-sm');
            btnEliminar.onclick = () => eliminaServicio(index);

            // Agregar el texto y el botón al contenedor
            li.appendChild(texto);
            li.appendChild(btnEliminar);

            // Mostrar la lista de materiales
            ServicioListDiv.style.display = 'block';
            ServicioList.appendChild(li);

            // Actualizar el texto del input con el resumen de materiales
            inputMaterial.value += `${servicio.nombre} - Costo: $${servicio.costo}\n`;


        });

        actualizarTotal();
        closeModalServicios();
    }

    function eliminaServicio(index) {
        serviciosseleccionados.splice(index, 1); // Eliminar del arreglo
        actualizarListaServicios(); // Actualizar la lista en el HTML
        actualizarTotal();
    }

    function actualizarTotal() {
        // Inicializamos los totales
        let total = 0;
        let totalMedicamentos = 0;

        // Calculamos el total de servicios seleccionados
        total = serviciosseleccionados.reduce((acumulado, servicio) => {
            const costo = parseFloat(servicio.costo) || 0; // Convertimos a número o usamos 0 si es NaN
            return acumulado + costo;
        }, 0);

        // Calculamos el total de tratamientos
        totalMedicamentos = tratamientos.reduce((acumulado, medicamento) => {
            const costoMedicamentos = parseFloat(medicamento.costo) * parseInt(medicamento.cantidad);
            return acumulado + costoMedicamentos;
        }, 0);

        // Sumamos ambos totales y actualizamos el valor del input
        const montoTotal = (total + totalMedicamentos).toFixed(2);
        document.getElementById('montoTotal').value = montoTotal;
    }

    function closeModalServicios() {
        const modal = document.getElementById('materialModal');
        const bootstrapModal = bootstrap.Modal.getInstance(modal);
        bootstrapModal.hide(); // Cierra el modal sin recargar la página
    }

    // MEDICAMENTOS
    function searchMedicamentos() {
        const searchQuery = document.getElementById('searchMedicamento').value.toLowerCase();
        const searchResults = document.getElementById('searchResultsMedicamento');
        searchResults.innerHTML = '';

        if (searchQuery === '') return;

        const filteredMedicaementos = medicamentos.filter(medicamento =>
            medicamento.nombre.toLowerCase().includes(searchQuery) ||
            medicamento.dosis.toLowerCase().includes(searchQuery) ||
            medicamento.medida.toLowerCase().includes(searchQuery)
        );

        filteredMedicaementos.forEach(medicamento => {
            const div = document.createElement('div');
            div.textContent = `${medicamento.nombre} ${medicamento.dosis} ${medicamento.medida || ''}`
                .trim();
            div.setAttribute('data-id', medicamento.id);
            div.onclick = () => selectMedicamento(medicamento.id, div.textContent, medicamento.precio);
            searchResults.appendChild(div);
        });

        if (filteredMedicaementos.length === 0) {
            searchResults.innerHTML = '<div>No se encontraron Medicamentos</div>';
        }
    }

    function cargarMedicamentos() {
            const tratamientoTexto = `{{ $cobro->medicamentos }}`.trim();
            const lineas = tratamientoTexto.split('\n');

            lineas.forEach((linea, index) => {
                const match = linea.match(/^(.*?)-?\s*Costo:\s*\$(\d+(\.\d{2})?)\s*-\s*Cantidad:\s*(\d+)\s*-\s*Propio:\s*(true|false)$/i);

                if (match) {
                    // Crear el objeto tratamiento con los valores parseados
                    const tratamiento = {
                        nombre: match[1].trim(),
                        costo: parseFloat(match[2]), // Ahora permite valores decimales
                        cantidad: parseInt(match[4], 10),
                        propio: match[5].trim(),
                    };

                    tratamientos.push(tratamiento);
                } else {
                    console.error(`Error en la línea ${index + 1}: Formato incorrecto - "${linea}"`);
                }
            });
            actualizarListaMedicamentos();
    }

    function selectMedicamento(patientId, patientName, MedicamentoPrecio) {
        document.getElementById('CampoMedicamento').style.display = 'block';
        document.getElementById('selectedMedicamento').value = patientName;
        document.getElementById('CostoMedicamento').value = MedicamentoPrecio;
        document.getElementById('selectedMedicamentoId').value = patientId;
        document.getElementById('searchResultsMedicamento').innerHTML = '';
        document.getElementById('searchMedicamento').value = '';
    }

    function addMedicamento() {
        // Obtener valores de los campos
        const medicamentoId = document.getElementById('selectedMedicamentoId').value.trim();
        const medicamentoNombre = document.getElementById('selectedMedicamento').value.trim();
        const costo = document.getElementById('CostoMedicamento').value.trim();
        const CantidadMedicamento = document.getElementById('CantidadMedicamento').value.trim();
        const PropioMedicamento = document.getElementById('medicamento_propio').value.trim();


        // Validar que los campos no estén vacíos
        if (!medicamentoId || !medicamentoNombre || !costo || !CantidadMedicamento) {
            alert('Por favor completa todos los campos antes de agregar el tratamiento.');
            return;
        }

        // Validar que "durante" y "cada" sean números válidos
        if (isNaN(costo) || costo <= 0 || isNaN(CantidadMedicamento) || CantidadMedicamento <= 0) {
            alert('Por favor ingresa valores numéricos válidos para "costo" y "cantidad".');
            return;
        }

        // Verificar si el medicamento ya existe en la lista
        const existe = tratamientos.some(tratamiento => tratamiento.nombre.toLowerCase() === medicamentoNombre
            .toLowerCase());
        if (existe) {
            alert('Este medicamento ya está en la lista.');
            return;
        }

        // Crear un objeto para el tratamiento
        const tratamiento = {
            id: medicamentoId,
            nombre: medicamentoNombre,
            costo: costo,
            cantidad: CantidadMedicamento,
            propio : PropioMedicamento
        };

        // Agregar el objeto al arreglo
        tratamientos.push(tratamiento);

        // Actualizar la lista en el HTML
        actualizarListaMedicamentos();

        // Limpiar los campos después de agregar
        document.getElementById('selectedMedicamento').value = '';
        document.getElementById('selectedMedicamentoId').value = '';
        document.getElementById('CostoMedicamento').value = '';
        document.getElementById('CantidadMedicamento').value = '';
        document.getElementById('medicamento_propio').value = "false";
        document.getElementById('medicamento_propioON').checked = false;
    }

    function actualizarListaMedicamentos() {
        const medicamentosList = document.getElementById('medicamentosList');
        const medicamentosListDiv = document.getElementById('listaMedicamentos');
        const inputTratamiento = document.getElementById('MedicamentosText');

        // Limpiar la lista y ocultar el contenedor
        medicamentosList.innerHTML = '';
        medicamentosListDiv.style.display = 'none';
        inputTratamiento.value = '';
        console.log(tratamientos);
        tratamientos.forEach((medicamento, index) => {
            // Crear un contenedor para el tratamiento y el botón
            const li = document.createElement('li');
            li.classList.add('custom-list-item');

            // Crear el texto del tratamiento
            const texto = document.createElement('span');
            texto.textContent =
                `${medicamento.nombre} - Costo: $${medicamento.costo} - Cantidad: ${medicamento.cantidad}`;

            // Crear el botón para eliminar el tratamiento
            const btnEliminar = document.createElement('button');
            btnEliminar.textContent = 'X';
            btnEliminar.style.width = '6%';
            btnEliminar.style.margin = '5px 10px';
            btnEliminar.classList.add('btn', 'btn-danger', 'btn-sm');
            btnEliminar.onclick = () => eliminarTratamiento(index);

            // Agregar el texto y el botón al contenedor
            li.appendChild(texto);
            li.appendChild(btnEliminar);

            // Mostrar la lista de medicamentos
            medicamentosListDiv.style.display = 'block';
            medicamentosList.appendChild(li);

            // Actualizar el texto del input con el resumen de tratamientos

            inputTratamiento.value +=
                `${medicamento.nombre} - Costo: $${medicamento.costo} - Cantidad: ${medicamento.cantidad} - Propio: ${medicamento.propio}\n`;

        });

        actualizarTotal();
        closeModal();
    }

    function eliminarTratamiento(index) {
        tratamientos.splice(index, 1); // Eliminar del arreglo
        actualizarListaMedicamentos(); // Actualizar la lista en el HTML
        actualizarTotal();
    }

    function closeModal() {
        const modal = document.getElementById('medicamentoModal');
        const bootstrapModal = bootstrap.Modal.getInstance(modal);
        bootstrapModal.hide(); // Cierra el modal sin recargar la página
    }
</script>




<script>
    var menuDatos = document.getElementById('MenuDatos');
    var derecha = document.querySelectorAll('.derecha');

    document.getElementById("menu").style.display = 'block';


    function toggleMenu() {
        const menu = document.querySelector("#menu");
        const aside = document.querySelector("#aside");
        const icon = document.querySelector("#icon");

        const isCollapsed = menu.classList.toggle("collapsed"); // Alterna la clase y almacena el estado colapsado

        // Configuración para el estado colapsado o expandido
        if (isCollapsed) {
            aside.style.width = '7%'; // Ancho del menú colapsado
            menu.querySelectorAll(".text").forEach(item => item.style.display = "none"); // Ocultar el texto
            icon.innerHTML = "→"; // Cambiar el icono al estado colapsado
            icon.setAttribute("aria-expanded", "false"); // Accesibilidad
        } else {
            aside.style.width = '16%'; // Ancho del menú expandido
            menu.querySelectorAll(".text").forEach(item => item.style.display = "block"); // Mostrar el texto
            icon.innerHTML = "←"; // Cambiar el icono al estado expandido
            icon.setAttribute("aria-expanded", "true"); // Accesibilidad
        }

        // Transiciones para un efecto suave en el cambio de tamaño
        aside.style.transition = "width 0.3s ease";
    }
</script>
