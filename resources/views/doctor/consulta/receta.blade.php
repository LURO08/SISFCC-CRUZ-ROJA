<style>
    :root {
        --primary-color: #007bff;
        --hover-color: #0056b3;
        --text-color: #fff;
        --background-color: #f4f4f4;
    }

    #aside{
        height: 93vh;
    }

    .modal .TituloPacientes {
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

    .modal .fade {
        margin: 0 auto;
        justify-content: center;
    }

    .central {
        width: auto;
        padding: 0 20px;
        flex: 1;
        box-sizing: border-box;
        display: flex;
        justify-content: center;
        text-align: center;
    }

    /* Panel central */
    #panelCentral {
        text-align: center;
        font-size: 2rem;
        font-style: italic;
        font-weight: bold;
        color: var(--primary-color);
        margin: 20px 0;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }


    #panelCentral h1 {
        text-shadow: 1px 2px 2px rgba(0, 0, 0, 0.2);
        letter-spacing: 1px;
        font-weight: 800;
        justify-content: center;
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
        overflow: hidden;
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
        margin-bottom: 20px;
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
        margin: 5px  5px;
        background-color: #f9f9f9;
        list-style: none;
    }

</style>

<link rel="stylesheet" href="{{ asset('css/component/modal.css') }}">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<body>

    @include('doctor.consulta.menu_nav')

    <div class="central">

        <section id="Panelfarmacia" style="width: 100%;">
            <div style="width: 100%;">

                <div style="display: flex; flex-direction: row; justify-content: center; align-items: center; padding:5px 20px; background-color: #f8f9fa; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <h1 style="font-weight: bold; font-size: 28px; color: #007bff; text-align: center; margin-bottom: 20px; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);">
                        Nueva Receta
                    </h1>

                </div>

                <!-- Modal para Crear Receta -->


                <div style="display: flex; justify-content: space-between; align-items: center; padding: 15px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                    <!-- Contenedor de búsqueda de paciente -->
                    <div class="search-container" style="flex: 1; margin-right: 5px;">
                        <div style="display: flex;  align-items: center;">
                            <label for="searchPatient" style="font-weight: bold; margin-bottom: 5px; display: block; margin-right: 10px;">Seleccione el Paciente:</label>
                            <input type="search" id="searchPatient" placeholder="Buscar paciente por nombre..."
                            style="width: 50%; padding: 10px; border: 1px solid #747474; border-radius: 5px; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);"
                            oninput="searchPatient()">
                        </div>
                        <div id="searchResults" class="search-results" style="margin-top: 10px;"></div>
                    </div>

                    <!-- Contenedor de botones -->
                    <div class="search-containerMaterial" style="flex: 1; display: flex; justify-content: center; gap: 15px;">
                        <a href="#medicamentoModal" class="btn btn-primary" style="padding: 10px 20px; text-decoration: none; color: white; background-color: #007bff; border-radius: 5px; text-align: center;" data-bs-toggle="modal">
                            Agregar Medicamento
                        </a>
                        <a href="#materialModal" class="btn btn-secondary" style="padding: 10px 20px; text-decoration: none; color: white; background-color: #6c757d; border-radius: 5px; text-align: center;" data-bs-toggle="modal">
                            Agregar Material
                        </a>
                    </div>
                </div>



                <form action="{{ route('doctor.receta.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="display: flex; justify-content: space-between;">
                        <div style="flex: 1; margin-right: 20px;">
                            <div class="form-group" id="contSeleccionado" style="display: none;">
                                <input type="text" id="selectedPatient" name="selectedPatient" readonly>
                                <input type="hidden" id="selectedPatientId" name="selectedPatientId">
                            </div>
                            <br>
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


                                            <div class="form-group "  id="CampoMedicamento" style="display: none;">
                                                <label for="selectedMedicamento">Medicamento:</label>
                                                <input type="text" id="selectedMedicamento"
                                                    name="selectedMedicamento" readonly class="form-control">
                                                <input type="hidden" id="selectedMedicamentoId"
                                                    name="selectedMedicamentoId">
                                            </div>
                                            <div class="form-group">
                                                <label for="durante">Durante:</label>
                                                <div style="display: flex; align-items: center;">
                                                    <input type="number" id="durante" name="durante"
                                                        class="form-control">
                                                    <span>Días</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cada">Cada:</label>
                                                <div style="display: flex; align-items: center;">
                                                    <input type="number" id="cada" name="cada"
                                                        class="form-control">
                                                    <span>Horas</span>
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

                            {{-- MODAL MATERIAL --}}
                            <div class="modal fade" id="materialModal" tabindex="-1"
                                aria-labelledby="materialModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="medicamentoModalLabel">Seleccionar Material
                                            </h5>
                                            <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal" onclick="closeModalMaterial()">X</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group" style=" justify-content: space-between;">
                                                <label for="searchMedicamento">Seleccione el Material: </label>
                                                <input type="search" id="searchMaterial"
                                                    placeholder="Buscar material medico por nombre..."
                                                    oninput="searchMateriales()">
                                                <div id="searchResultsMaterial" class="search-resultsMaterial"></div>
                                            </div>

                                            <div class="form-group" id="CampoMaterial" style="display: none;">
                                                <label for="selectedMaterial">Material: </label>
                                                <input type="text" id="selectedMaterial" name="selectedMaterial"
                                                    readonly>
                                                <input type="hidden" id="selectedMaterialId"
                                                    name="selectedMaterialId">
                                            </div>


                                            <div class="form-group">
                                                <label for="cantidad">Cantidad: </label>
                                                <div style="display: flex; justify-content: center;">
                                                    <input type="number" id="cantidad">
                                                    <span
                                                        style="justify-content: center; text-align: center; margin-left: 10px; align-items: center; align-content: center;">
                                                        Dias</span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal" onclick="closeModalMaterial()">Cerrar</button>
                                                <a class="btn btn-primary" id="agregarMaterial"
                                                    onclick="addMaterial()">Agregar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div style="margin-bottom: 1rem;">
                                <label for="diagnostico"
                                    style="display: block; margin-bottom: 0.5rem; font-weight: 700;">Diagnóstico</label>
                                <textarea id="diagnostico" name="diagnostico" rows="4" required placeholder="Escribe el diagnóstico aquí..."
                                    style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc; resize: vertical;"></textarea>
                            </div>

                            <div>
                                {{-- MEDICAMENTOS AGREGADOS --}}
                                <div id="listaMedicamentos" style="display: none;" >
                                    <h5 style="font-weight: 700; ">Tratamientos:</h5>
                                    <ul id="medicamentosList" style="height: 20vh; overflow-y: auto;"></ul>
                                </div>

                                <textarea style="display: none;" id="tratamientoText" name="tratamiento" readonly></textarea>
                            </div>

                            {{-- MATERIAL AGREGADO --}}
                            <div>
                                <div id="listaMaterial" style="display: none;">
                                    <h5 style="font-weight: 700; ">Material Agregados:</h5>
                                    <ul id="MaterialList" style="height: 20vh; overflow-y: auto;"></ul>
                                </div>

                                <textarea style="display: none;" id="MaterialText" name="material" readonly></textarea>
                            </div>
                        </div>
                        <div style="flex: 1; width: 100%;">
                            <div style="display: flex; width: 100%;">
                                <div>
                                    <!-- Presión Arterial -->
                                    <div class="form-group" style="margin-bottom: 1rem; flex-basis: 100%;">
                                        <label for="presion_arterial"
                                            style="display: block; margin-bottom: 0.5rem;">T/A</label>
                                        <div style="display: flex; align-items: center;">
                                            <input type="text" id="presion_arterial" name="presion_arterial"
                                                placeholder="120/80"
                                                style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;">
                                            <p style="margin-left: 0.5rem;">mmHg</p>
                                        </div>
                                    </div>

                                    <!-- Temperatura -->
                                    <div class="form-group" style="margin-bottom: 1rem; flex-basis: 100%;">
                                        <label for="temperatura"
                                            style="display: block; margin-bottom: 0.5rem;">Temp</label>
                                        <div style="display: flex; align-items: center;">
                                            <input type="number" id="temperatura" name="temperatura"
                                                placeholder="36.6"
                                                style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc";
                                                step="0.1" min="0">
                                            <p style="margin-left: 0.5rem;">°C</p>
                                        </div>
                                    </div>

                                    <!-- Talla -->
                                    <div class="form-group" style="margin-bottom: 1rem; flex-basis: 100%;">
                                        <label for="talla"
                                            style="display: block; margin-bottom: 0.5rem;">Talla</label>
                                        <div style="display: flex; align-items: center;">
                                            <input type="number" id="talla" name="talla" placeholder="170"
                                                min="0"
                                                style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;">
                                            <p style="margin-left: 0.5rem;">cm</p>
                                        </div>
                                    </div>

                                    <!-- Peso -->
                                    <div class="form-group" style="margin-bottom: 1rem; flex-basis: 100%;">
                                        <label for="peso"
                                            style="display: block; margin-bottom: 0.5rem;">Peso</label>
                                        <div style="display: flex; align-items: center;">
                                            <input type="number" id="peso" name="peso" placeholder="70"
                                                min="0"
                                                style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;">
                                            <p style="margin-left: 0.5rem;">Kg</p>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <!-- Frecuencia Cardiaca -->
                                    <div class="form-group" style="margin-bottom: 1rem; flex-basis: 100%;">
                                        <label for="frecuencia_cardiaca"
                                            style="display: block; margin-bottom: 0.5rem;">FC</label>
                                        <div style="display: flex; align-items: center;">
                                            <input type="number" id="frecuencia_cardiaca" name="frecuencia_cardiaca"
                                                min="0" placeholder="75"
                                                style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;">
                                            <p style="margin-left: 0.5rem;">X'</p>
                                        </div>
                                    </div>

                                    <!-- Frecuencia Respiratoria -->
                                    <div class="form-group" style="margin-bottom: 1rem; flex-basis: 100%;">
                                        <label for="frecuencia_respiratoria"
                                            style="display: block; margin-bottom: 0.5rem;">FR</label>
                                        <div style="display: flex; align-items: center;">
                                            <input type="number" id="frecuencia_respiratoria"
                                                name="frecuencia_respiratoria" placeholder="20" min="0"
                                                style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;">
                                            <p style="margin-left: 0.5rem;">X'</p>
                                        </div>
                                    </div>

                                    <!-- Saturación de Oxígeno -->
                                    <div class="form-group" style="margin-bottom: 1rem; flex-basis: 100%;">
                                        <label for="saturacion_oxigeno"
                                            style="display: block; margin-bottom: 0.5rem;">SPO2</label>
                                        <div style="display: flex; align-items: center;">
                                            <input type="number" id="saturacion_oxigeno" name="saturacion_oxigeno"
                                                placeholder="98" min="0"
                                                style="flex: 1; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;">
                                            <p style="margin-left: 0.5rem;">%</p>
                                        </div>
                                    </div>

                                    <!-- Alergias -->
                                    <div class="form-group" style="margin-bottom: 1rem; flex-basis: 100%;">
                                        <label for="alergia"
                                            style="display: block; margin-bottom: 0.5rem;">Alergia</label>
                                        <input type="text" id="alergia" name="alergia"
                                            placeholder="Especificar alergias"
                                            style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="form-group"
                                    style="display: flex; justify-content: center; align-content: center; width: 100%;">
                                    <label for="farmacia">Enviar a Farmacia (opcional):</label>
                                    <input type="checkbox" name="enviar_farmacia" value="1"
                                        style="width: 5%; border-radius: 4px; margin-left: 10px; height: auto;">
                                </div>

                                <!-- Caja de Cobro siempre será obligatorio pero oculto -->
                                <input type="hidden" name="enviar_caja" value="1">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('doctor.index') }}" style="text-decoration: none; color: #fff; background-color: #dc3545; padding: 10px 20px; border-radius: 5px; font-size: 16px; font-weight: 500; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); transition: background-color 0.3s;">
                            Regresar
                        </a>
                    </div>
                </form>
            </div>

        </section>

    </div>

    <script>
        const pacientes = @json($pacientes);
        const medicamentos = @json($medicamentos);
        const materiales = @json($inventarioMedico);
        // Arreglo para almacenar los medicamentos seleccionados
        let tratamientos = [];
        let inventarioMedico  = [];
        document.getElementById("menu").style.display = 'block';
        document.getElementById("menu2").style.display = 'none';
        document.getElementById("recipesTable").style.display = 'none';


        function searchPatient() {
            const searchQuery = document.getElementById('searchPatient').value.toLowerCase();
            const searchResults = document.getElementById('searchResults');
            searchResults.innerHTML = '';

            if (searchQuery === '') return;

            const filteredPacientes = pacientes.filter(paciente =>
                paciente.nombre.toLowerCase().includes(searchQuery) ||
                paciente.apellidopaterno.toLowerCase().includes(searchQuery) ||
                (paciente.apellidomaterno && paciente.apellidomaterno.toLowerCase().includes(searchQuery))
            );

            filteredPacientes.forEach(paciente => {
                const div = document.createElement('div');
                div.textContent = `${paciente.nombre} ${paciente.apellidopaterno} ${paciente.apellidomaterno || ''}`
                    .trim();
                div.setAttribute('data-id', paciente.id);
                div.onclick = () => selectPatient(paciente.id, div.textContent);
                searchResults.appendChild(div);
            });

            if (filteredPacientes.length === 0) {
                searchResults.innerHTML = '<div>No se encontraron pacientes</div>';
            }
        }

        function selectPatient(patientId, patientName) {

            document.getElementById('selectedPatient').value = patientName;
            document.getElementById('selectedPatient').style.display = 'none';
            document.getElementById('selectedPatientId').value = patientId;
            document.getElementById('searchResults').innerHTML = '';
            document.getElementById('searchPatient').value = patientName;
            document.getElementById('contSeleccionado').style.display = 'block';
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
                div.onclick = () => selectMedicamento(medicamento.id, div.textContent);
                searchResults.appendChild(div);
            });

            if (filteredMedicaementos.length === 0) {
                searchResults.innerHTML = '<div>No se encontraron Medicamentos</div>';
            }
        }

        function selectMedicamento(patientId, patientName) {
            document.getElementById('CampoMedicamento').style.display = 'block';
            document.getElementById('selectedMedicamento').value = patientName;
            document.getElementById('selectedMedicamentoId').value = patientId;
            document.getElementById('searchResultsMedicamento').innerHTML = '';
            document.getElementById('searchMedicamento').value = '';
        }

        function addMedicamento() {
            // Obtener valores de los campos
            const medicamentoId = document.getElementById('selectedMedicamentoId').value.trim();
            const medicamentoNombre = document.getElementById('selectedMedicamento').value.trim();
            const durante = document.getElementById('durante').value.trim();
            const cada = document.getElementById('cada').value.trim();

            // Validar que los campos no estén vacíos
            if (!medicamentoId || !medicamentoNombre || !durante || !cada) {
                alert('Por favor completa todos los campos antes de agregar el tratamiento.');
                return;
            }

            // Validar que "durante" y "cada" sean números válidos
            if (isNaN(durante) || isNaN(cada) || durante <= 0 || cada <= 0) {
                alert('Por favor ingresa valores numéricos válidos para "durante" y "cada".');
                return;
            }

            // Verificar si el medicamento ya existe en la lista
            const existe = tratamientos.some(tratamiento => tratamiento.nombre.toLowerCase() === medicamentoNombre.toLowerCase());
            if (existe) {
                alert('Este medicamento ya está en la lista.');
                return;
            }

            // Crear un objeto para el tratamiento
            const tratamiento = {
                id: medicamentoId,
                nombre: medicamentoNombre,
                durante: parseInt(durante, 10),
                cada: parseInt(cada, 10)
            };

            // Agregar el objeto al arreglo
            tratamientos.push(tratamiento);

            // Actualizar la lista en el HTML
            actualizarListaMedicamentos();

            // Limpiar los campos después de agregar
            document.getElementById('durante').value = '';
            document.getElementById('cada').value = '';
            document.getElementById('selectedMedicamento').value = '';
            document.getElementById('selectedMedicamentoId').value = '';
        }

        function actualizarListaMedicamentos() {
            const medicamentosList = document.getElementById('medicamentosList');
            const medicamentosListDiv = document.getElementById('listaMedicamentos');
            const inputTratamiento = document.getElementById('tratamientoText');

            // Limpiar la lista y ocultar el contenedor
            medicamentosList.innerHTML = '';
            medicamentosListDiv.style.display = 'none';
            inputTratamiento.value = '';

            // Recorrer los tratamientos y generar los elementos de la lista
            tratamientos.forEach((tratamiento, index) => {
                // Crear un contenedor para el tratamiento y el botón
                const li = document.createElement('li');
                    li.classList.add('custom-list-item');

                // Crear el texto del tratamiento
                const texto = document.createElement('span');
                texto.textContent = `${tratamiento.nombre} - Cada: ${tratamiento.cada} horas, Durante: ${tratamiento.durante} días`;

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

                inputTratamiento.value += `${tratamiento.nombre} - Durante: ${tratamiento.durante} días, Cada: ${tratamiento.cada} horas\n`;
                closeModal();
            });
        }

        function eliminarTratamiento(index) {
            tratamientos.splice(index, 1); // Eliminar del arreglo
            actualizarListaMedicamentos(); // Actualizar la lista en el HTML
        }

         // MATERIAL MEDICO

         function searchMateriales() {
            const searchQuery = document.getElementById('searchMaterial').value.toLowerCase();
            const searchResults = document.getElementById('searchResultsMaterial');
            searchResults.innerHTML = '';

            if (searchQuery === '') return;

            const filteredMaterial = materiales.filter(material =>
                material.nombre.toLowerCase().includes(searchQuery)
            );

            filteredMaterial.forEach(material => {
                const div = document.createElement('div');
                div.textContent = `${material.nombre}`
                    .trim();
                div.setAttribute('data-id', material.id);
                div.onclick = () => selectMaterial(material.id, div.textContent);
                searchResults.appendChild(div);
            });

            if (filteredMaterial.length === 0) {
                searchResults.innerHTML = '<div>No se encontro material medico</div>';
            }
        }

        function selectMaterial(patientId, patientName) {
            document.getElementById('CampoMaterial').style.display = 'block';
            document.getElementById('selectedMaterial').value = patientName;
            document.getElementById('selectedMaterialId').value = patientId;
            document.getElementById('searchResultsMaterial').innerHTML = '';
            document.getElementById('searchMaterial').value = '';

        }

        function addMaterial() {
            const MaterialId = document.getElementById('selectedMaterialId').value;
            const MaterialNombre = document.getElementById('selectedMaterial').value;
            const MaterialCantidad = document.getElementById('cantidad').value;

            if (!MaterialId || !MaterialNombre || MaterialCantidad <= 0 || isNaN(MaterialCantidad)) {
                alert('Por favor completa todos los campos con valores válidos.');
                return;
            }

            const existe = inventarioMedico.some(material => material.id === MaterialId);
            if (existe) {
                alert('Este material ya ha sido agregado.');
                return;
            }


            const material = {
                id: MaterialId,
                nombre: MaterialNombre,
                cantidad: MaterialCantidad
            };

            inventarioMedico.push(material);

            actualizarListaMaterial();

            document.getElementById('cantidad').value = '';
            document.getElementById('selectedMaterial').value = '';
            document.getElementById('selectedMaterialId').value = '';
        }

        function actualizarListaMaterial() {
            const materialList = document.getElementById('MaterialList');
            const materialListDiv = document.getElementById('listaMaterial');
            const inputMaterial = document.getElementById('MaterialText');


            // Limpiar la lista y ocultar el contenedor
            materialList.innerHTML = '';
            materialListDiv.style.display = 'none';
            inputMaterial.value = '';

            // Verificar si hay materiales en el inventario
            if (inventarioMedico.length === 0) {
                materialList.innerHTML = '<p>No hay materiales agregados.</p>';
                return;
            }

            // Recorrer los materiales y generar los elementos de la lista
            inventarioMedico.forEach((material, index) => {
                // Crear un contenedor para el material y el botón


                const li = document.createElement('li');
                    li.classList.add('custom-list-item');

                // Crear el texto del material
                const texto = document.createElement('span');
                texto.textContent = `${material.nombre} - Cantidad: ${material.cantidad}`;

                // Crear el botón para eliminar el material
                const btnEliminar = document.createElement('button');
                btnEliminar.textContent = 'X';
                btnEliminar.style.width = '6%';
                btnEliminar.style.margin = '5px 10px';
                btnEliminar.classList.add('btn', 'btn-danger', 'btn-sm');
                btnEliminar.onclick = () => eliminarMaterial(index);

                // Agregar el texto y el botón al contenedor
                li.appendChild(texto);
                li.appendChild(btnEliminar);

                // Mostrar la lista de materiales
                materialListDiv.style.display = 'block';
                materialList.appendChild(li);

                // Actualizar el texto del input con el resumen de materiales
                inputMaterial.value += `${material.nombre} - Cantidad: ${material.cantidad}\n`;
                closeModalMaterial();
            });
        }


        function eliminarMaterial(index) {
            inventarioMedico.splice(index, 1); // Eliminar del arreglo
            actualizarListaMaterial(); // Actualizar la lista en el HTML
        }

        function closeModal() {
            const modal = document.getElementById('medicamentoModal');
            const bootstrapModal = bootstrap.Modal.getInstance(modal);
            bootstrapModal.hide(); // Cierra el modal sin recargar la página
        }

        function closeModalMaterial() {
            const modal = document.getElementById('materialModal');
            const bootstrapModal = bootstrap.Modal.getInstance(modal);
            bootstrapModal.hide(); // Cierra el modal sin recargar la página
        }

        // Agregar control al formulario para evitar recarga en ciertas acciones
        const recetaForm = document.getElementById('recetaForm');
        recetaForm.addEventListener('submit', function(event) {
            event.preventDefault();
            // Puedes agregar lógica aquí para enviar datos mediante AJAX si es necesario
            recetaForm.submit(); // Enviar formulario manualmente si es necesario
        });
    </script>


</body>


