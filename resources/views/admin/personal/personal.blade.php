<style>
    :root {
        --primary-blue: #007bff;
    }

    main {
        display: flex;
        justify-content: center;
        width: auto;
        height: 100%;
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

    .modalpersonalEdit .modal-content {
        max-width: 450px;
    }

    .modalpersonalAdd .modal-content {
        max-width: 450px;
    }



    .personalinfo .modal-content {
        max-width: 350px;
        margin: 0 auto;
    }

    .personalinfo .modal-body {
        justify-content: center;
        margin: 0 auto;
        padding: 0px 10px 0;
    }

    .ModalContenedorDatos {
        max-height: 70vh;
        overflow-y: auto;

    }


    .btn-primary {
        padding: 10px 20px;
        border-radius: 5px;
        color: #fff;
        text-decoration: none;
        cursor: pointer;

    }

    .btn-primary:hover,
    {
    opacity: 0.8;
    }

    table {
        width: 80%;
        table-layout: fixed;
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

    .btn-primary:hover {
        opacity: 0.8;
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

    <section id="PanelPersonal">

        <div class=" mx-auto">
            <h2 class="text-center text-3xl font-bold text-gray-700 mb-4">Registo Personal</h2>
            <div>
                <div
                    style="width: 100%; min-width: 10vh; overflow-x: auto;  margin: 0 auto;  display: flex; justify-content: space-between; align-items: center; gap: 1rem; background-color: #f8f9fa; border-radius: 8px;">
                    <a href="#addPersonalModal"
                        class="inline-block px-4 py-2 mx-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Agregar
                        Personal</a>
                    <div
                        style="display: flex; gap: 0.5rem; align-items: center; justify-content: space-between; width: 30%;">
                        <span>Buscar:</span>
                        <input type="search" class="form-control" placeholder="Buscar Personal..." id="buscarpersonal"
                            style="padding: 10px; flex: 1; border-radius: 4px;" onkeyup="buscarpersonal()">
                    </div>
                </div>

                <div class="overflow-y-auto"
                    style="max-height: 60vh; border: 1px solid #e5e7eb; width:100%; ">
                    <table class="table-auto  text-center border-collapse" style="margin: 0 auto; width: 100%;">
                        <thead class="bg-blue-500 " style="color:#fff;">
                            <tr>
                                <th class="px-4 py-2">Folio</th>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Apellido Paterno</th>
                                <th class="px-4 py-2">Apellido Materno</th>
                                <th class="px-4 py-2">Cargo</th>
                                <th class="px-4 py-2">Departamento</th>
                                <th class="px-4 py-2">Usuario</th>

                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="tbodypersonals">
                            @foreach ($personals as $personal)
                                <tr class="hover:bg-gray-100">
                                    <td class="border px-4 py-2">{{ $personal->getID() }}</td>
                                    <td class="border px-4 py-2">{{ $personal->Nombre }}</td>
                                    <td class="border px-4 py-2">{{ $personal->apellido_paterno }}</td>
                                    <td class="border px-4 py-2">{{ $personal->apellido_materno }}</td>
                                    <td class="border px-4 py-2">{{ $personal->Cargo }}</td>
                                    <td class="border px-4 py-2">{{ $personal->Departamento }}</td>
                                    <td class="border px-4 py-2">
                                        {{ optional($personal->usuario)->name ?? 'N/A' }}
                                    </td>


                                    <td class="border px-4 py-2 flex justify-center gap-2" >
                                        <div class="flex flex-col">
                                            <a href="#personalInfoModal-{{ $personal->id }}"
                                                class="inline-block px-4 py-2 bg-blue-700 text-white font-semibold rounded-md hover:bg-blue-600 mb-2">Ver</a>
                                            <div class="flex">
                                                <a href="#editPersonalModal-{{ $personal->id }}"
                                                    class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 mr-2">Editar</a>
                                                <form action="{{ route('admin.personals.destroy', $personal->id) }}"
                                                    method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-block px-4 py-2 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Edit Personal Modal -->
                                <div class="modal modalpersonalEdit" id="editPersonalModal-{{ $personal->id }}">

                                    <div class="modal-content">
                                        <div class="bg-blue-500 modal-header">
                                            <h5 class="modal-title">Editar Personal</h5>
                                            <a href="#" class="close">&times;</a>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.personals.update', $personal->id) }}"
                                                method="POST" class="px-6">
                                                @csrf
                                                @method('PUT')
                                                <div class="ModalContenedorDatos">
                                                    <div class="form-group">
                                                        <label for="Nombre"
                                                            class="block text-sm font-medium text-gray-700">Nombre</label>
                                                        <input type="text" name="Nombre" id="Nombre"
                                                            value="{{ old('Nombre', $personal->Nombre ?? '') }}"
                                                            required
                                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="apellido_paterno"
                                                            class="block text-sm font-medium text-gray-700">Apellido
                                                            Paterno</label>
                                                        <input type="text" name="apellido_paterno"
                                                            id="apellido_paterno"
                                                            value="{{ old('apellido_paterno', $personal->apellido_paterno ?? '') }}"
                                                            required
                                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="apellido_materno"
                                                            class="block text-sm font-medium text-gray-700">Apellido
                                                            Materno</label>
                                                        <input type="text" name="apellido_materno"
                                                            id="apellido_materno"
                                                            value="{{ old('apellido_materno', $personal->apellido_materno ?? '') }}"
                                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Edad"
                                                            class="block text-sm font-medium text-gray-700">Edad</label>
                                                        <input type="number" name="Edad" id="Edad"
                                                            value="{{ old('Edad', $personal->Edad ?? '') }}" required
                                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Sexo"
                                                            class="block text-sm font-medium text-gray-700">Sexo</label>
                                                        <select name="Sexo" id="Sexo" required
                                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                                                            <option value="Masculino"
                                                                {{ old('Sexo', $personal->Sexo ?? '') == 'Masculino' ? 'selected' : '' }}>
                                                                Masculino</option>
                                                            <option value="Femenino"
                                                                {{ old('Sexo', $personal->Sexo ?? '') == 'Femenino' ? 'selected' : '' }}>
                                                                Femenino</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="FechaNacimiento"
                                                            class="block text-sm font-medium text-gray-700">Fecha
                                                            de
                                                            Nacimiento</label>
                                                        <input type="date" name="FechaNacimiento"
                                                            id="FechaNacimiento" required
                                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm"
                                                            value="{{ old('FechaNacimiento', $personal->FechaNacimiento ?? '') }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Cargo"
                                                            class="block text-sm font-medium text-gray-700">{{ __('Cargo') }}</label>

                                                        <select id="CargoModificar" name="Cargo" required
                                                            class="block w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                                            onchange="toggleHiddenForm(this. )">
                                                            <option value="" disabled
                                                                {{ $personal->Cargo ? '' : 'selected' }}>Seleccione
                                                                un cargo</option>
                                                            <option value="doctor"
                                                                {{ $personal->Cargo === 'doctor' ? 'selected' : '' }}>
                                                                Doctor</option>
                                                            <option value="enfermera"
                                                                {{ $personal->Cargo === 'enfermera' ? 'selected' : '' }}>
                                                                Enfermera</option>
                                                            <option value="chofer"
                                                                {{ $personal->Cargo === 'chofer' ? 'selected' : '' }}>
                                                                Chofer
                                                            </option>
                                                            <option value="paramédico"
                                                                {{ $personal->Cargo === 'paramédico' ? 'selected' : '' }}>
                                                                Paramédico</option>
                                                            <option value="recepcionista"
                                                                {{ $personal->Cargo === 'recepcionista' ? 'selected' : '' }}>
                                                                Recepcionista</option>
                                                            <option value="farmaceutico"
                                                                {{ $personal->Cargo === 'farmaceutico' ? 'selected' : '' }}>
                                                                Farmaceutico</option>
                                                            <option value="cajero"
                                                                {{ $personal->Cargo === 'cajero' ? 'selected' : '' }}>
                                                                Cajero</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Turno"
                                                            class="block text-sm font-medium text-gray-700">Turno</label>

                                                        <select id="Turno" name="Turno" required
                                                            class="block w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                            <option value="matutino"
                                                                {{ $personal->Turno === 'matutino' ? 'selected' : '' }}>
                                                                Matutino</option>
                                                            <option value="vespertino"
                                                                {{ $personal->Turno === 'vespertino' ? 'selected' : '' }}>
                                                                Vespertino</option>
                                                            <option value="nocturno"
                                                                {{ $personal->Turno === 'nocturno' ? 'selected' : '' }}>
                                                                Nocturno</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Telefono"
                                                            class="block text-sm font-medium text-gray-700">Telefono</label>
                                                        <input type="text" name="Telefono" id="Telefono"
                                                            value="{{ old('Telefono', $personal->Telefono ?? '') }}"
                                                            required
                                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Direccion"
                                                            class="block text-sm font-medium text-gray-700">Dirección</label>
                                                        <input type="text" name="Direccion" id="Direccion"
                                                            value="{{ old('Direccion', $personal->Direccion ?? '') }}"
                                                            required
                                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                                                    </div>

                                                    <!-- Usuario -->
                                                    <div class="form-group">
                                                        <label for="user_id"
                                                            class="block text-sm font-medium text-gray-700">Usuario
                                                            Asignado</label>
                                                        <select name="user_id" id="user_id" required
                                                            class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                                                            <option value="" disabled
                                                                {{ !$personal->user_id ? 'selected' : '' }}>
                                                                Seleccione un
                                                                usuario</option>
                                                            @php
                                                                $selectedUserId = $personal->user_id ?? "";
                                                            @endphp

                                                            @foreach ($usuarios as $usuario)
                                                                <option value="{{ $usuario->id }}"
                                                                    {{ $selectedUserId == $usuario->id ? 'selected' : '' }}>
                                                                    {{ $usuario->name }} ({{ $usuario->email }})
                                                                </option>
                                                            @endforeach


                                                        </select>
                                                    </div>

                                                    <!-- Campos adicionales para el rol de Doctor -->

                                                    @foreach ($doctores as $doctor)
                                                        @if ($doctor->personalid == $personal->id)
                                                            <div id="hidden-form" style="margin-top: 10px;"
                                                                class=" form-group p-4 border border-gray-300 rounded-md">
                                                                <h3 class="text-lg font-medium text-gray-700"
                                                                    style="text-align: center; padding-top: 5px;">
                                                                    Formulario
                                                                    del Médico
                                                                </h3>
                                                                <div class="form-group">
                                                                    <x-label for="cedulaProfesional"
                                                                        value="{{ _('Cedula Profesional') }}" />
                                                                    <x-input id="cedulaProfesional"
                                                                        class="block mt-1 w-full" type="text"
                                                                        name="cedulaProfesional"
                                                                        value="{{ $doctor->cedulaProfesional }}" />
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="firma"
                                                                        class="block text-sm font-medium text-gray-700">Firma
                                                                    </label>
                                                                    <div class="flex items-center justify-center mt-4">
                                                                        @if ($doctor->rutafirma)
                                                                            <div>
                                                                                <img id="imgAnterior-{{ $doctor->id }}"
                                                                                    src="{{ asset($doctor->rutafirma) }}"
                                                                                    alt="{{ $doctor->nombre }}"
                                                                                    class="img-fluid rounded-md"
                                                                                    width="150px">
                                                                            </div>
                                                                        @else
                                                                            <span>No hay fotos</span>
                                                                        @endif
                                                                    </div>
                                                                    <input type="file" name="rutafirma"
                                                                        id="rutafirma"
                                                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                                                                            focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm hover:border-red-500
                                                                            @error('rutafirma') border-red-500 @enderror">
                                                                    @error('rutafirma')
                                                                        <p class="mt-1 text-sm text-red-500">
                                                                            {{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach

                                                </div>

                                                <div class="flex justify-center space-x-4 mt-4">
                                                    <button type="submit"
                                                        class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">
                                                        Guardar
                                                    </button>
                                                    <a href="#"
                                                        class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600"
                                                        data-dismiss="modal">
                                                        Cancelar
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>

                                <!-- Personal Info Modal -->
                                <div class="modal personalinfo" id="personalInfoModal-{{ $personal->id }}">
                                    <div class="modal-content" style="height:70vh; ">
                                        <div class="bg-blue-500 modal-header">
                                            <h5 class="modal-title text-white">Información Personal</h5>
                                            <a href="#" class="close text-white"
                                                onclick="closeModal('#personalInfoModal-{{ $personal->id }}')">&times;</a>
                                        </div>
                                        <div class="modal-body" style="overflow-y: auto; height: 60vh;">
                                            <h3 class="text-lg font-semibold mb-2 text-center">
                                                {{ $personal->Cargo == 'doctor' ? 'Datos del Dr.' : 'Datos de:' }}
                                                {{ $personal->Nombre }} {{ $personal->apellido_paterno }}
                                                {{ $personal->apellido_materno }}</h3>

                                            <div>
                                                <div>
                                                    <p> <strong>Cargo: </strong>{{ $personal->Cargo }}</p>
                                                    <p> <strong>Edad: </strong>{{ $personal->Edad }}</p>
                                                    <p><strong>Sexo: </strong>{{ $personal->Sexo }}</p>
                                                    <p><strong>Departamento: </strong> {{ $personal->Departamento }}
                                                    </p>

                                                    <p> <strong>Turno:</strong> {{ $personal->Turno }}</p>

                                                    <p> <strong>Teléfono: </strong> {{ $personal->Telefono }}</p>

                                                    <p> <strong>Dirección: </strong>{{ $personal->Direccion }}</p>

                                                    @if ($personal->Cargo == 'doctor')
                                                        @foreach ($doctores as $doctor)
                                                            @if ($doctor->personalid == $personal->id)
                                                                <p> <strong>Cedula Profesional: </strong>
                                                                    {{ $doctor->cedulaProfesional }} </p>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    <p style="margin: 5px 0; color: #555;"><strong>Creado: </strong>
                                                        {{ $personal->getFecha() }} a las {{ $personal->getHora() }}
                                                    </p>
                                                </div>
                                                <div>
                                                    <h3 style="font-weight: 700; font-size: 20px;  padding: 10px; ">
                                                        Datos del Usuario Asignado</h3>
                                                    <div style="text-align: left; width: 100%;">
                                                        <p style="margin: 5px 0; color: #555;">
                                                            <strong>Usuario: </strong>
                                                            {{ optional($personal->usuario)->name ?? 'Sin nombre' }}

                                                        </p>
                                                        <p style="margin: 5px 0; color: #555;"><strong>Correo:
                                                            </strong>
                                                            {{ $personal->usuario->email ?? 'Sin Usuario' }}</p>
                                                            <p style="margin: 5px 0; color: #555;">
                                                                <strong>Creado:</strong>
                                                                {{ optional($personal->usuario)->getFecha() ?? 'Fecha no disponible' }}
                                                                a las {{ optional($personal->usuario)->getHora() ?? 'Hora no disponible' }}
                                                            </p>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#"
                                                class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600"
                                                data-dismiss="modal">
                                                Cancelar
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="pagination-wrapper" style="width: 80%; margin: 0 auto;">
                    {{ $personals->links() }}
                </div>

                <!-- Add Personal Modal -->
                <div class="modal modalpersonalAdd" id="addPersonalModal">
                    <div class="modal-content">
                        <div class="modal-header bg-blue-500">
                            <h5 class="modal-title">Agregar Personal</h5>
                            <a href="#" class="close">&times;</a>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.personals.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="ModalContenedorDatos">
                                    <div class="form-group">
                                        <label for="Nombre"
                                            class="block text-sm font-medium text-gray-700">Nombre</label>
                                        <input type="text" name="Nombre" id="Nombre"
                                            placeholder="Ingrese el nombre" required minlength="2" maxlength="50"
                                            pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>

                                    <div class="form-group">
                                        <label for="apellido_paterno"
                                            class="block text-sm font-medium text-gray-700">Apellido Paterno</label>
                                        <input type="text" name="apellido_paterno" id="apellido_paterno"
                                            placeholder="Ingrese el apellido paterno" required minlength="2"
                                            maxlength="50" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">

                                    </div>

                                    <div class="form-group">
                                        <label for="apellido_materno"
                                            class="block text-sm font-medium text-gray-700">Apellido Materno</label>
                                        <input type="text" name="apellido_materno" id="apellido_materno"
                                            placeholder="Ingrese el apellido materno" minlength="2" maxlength="50"
                                            required pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>

                                    <div class="form-group">
                                        <label for="Edad"
                                            class="block text-sm font-medium text-gray-700">Edad</label>
                                        <input type="number" name="Edad" id="Edad"
                                            placeholder="Ingrese la edad" required min="0" max="120"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>

                                    <div class="form-group">
                                        <label for="Sexo"
                                            class="block text-sm font-medium text-gray-700">Sexo</label>
                                        <select name="Sexo" id="Sexo" required
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="FechaNacimiento"
                                            class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                                        <input type="date" name="FechaNacimiento" id="FechaNacimiento" required
                                            max="{{ date('Y-m-d') }}" min="1900-01-01"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                                    </div>

                                    <div class="form-group">
                                        <label for="Cargo"
                                            class="block text-sm font-medium text-gray-700">{{ __('Cargo') }}</label>
                                        <select id="CargoAgregar" name="Cargo" required
                                            class="block w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                            <option value="" disabled selected>Seleccione un cargo</option>
                                            <option value="doctor">Doctor</option>
                                            <option value="enfermera">Enfermera</option>
                                            <option value="chofer">Chofer</option>
                                            <option value="paramédico">Paramédico</option>
                                            <option value="recepcionista">Recepcionista</option>
                                            <option value="farmaceutico">Farmaceutico</option>
                                            <option value="cajero">Cajero</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="Turno"
                                            class="block text-sm font-medium text-gray-700">Turno</label>
                                        <select id="Turno" name="Turno" required
                                            class="block w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                            <option value="" disabled selected>Seleccione un Turno</option>
                                            <option value="matutino">Matutino</option>
                                            <option value="vespertino">Vespertino</option>
                                            <option value="nocturno">Nocturno</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="Telefono"
                                            class="block text-sm font-medium text-gray-700">Teléfono</label>
                                        <input type="tel" name="Telefono" id="Telefono" required
                                            pattern="[0-9]{10}" maxlength="10"
                                            placeholder="Ingrese el número telefonico"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>

                                    <div class="form-group">
                                        <label for="Direccion"
                                            class="block text-sm font-medium text-gray-700">Dirección</label>
                                        <input type="text" name="Direccion" id="Direccion"
                                            placeholder="Ingrese su dirección (Calle, número, ciudad, etc.)" required
                                            minlength="5" maxlength="255"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>

                                    <div class="form-group">
                                        <label for="user_id" class="block text-sm font-medium text-gray-700">
                                            Usuario Asignado (Opcional)
                                        </label>
                                        <select name="user_id" id="user_id"
                                            class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                            <option value="" selected>
                                                Seleccione un usuario (Opcional)
                                            </option>
                                            @php
    $selectedUserId = $personal->user_id ?? old('user_id'); // Respaldo al valor de 'old' si no hay $personal
@endphp

@foreach ($usuarios as $usuario)
    <option
        value="{{ $usuario->id }}"
        {{ $selectedUserId == $usuario->id ? 'selected' : '' }}
    >
        {{ $usuario->name }} ({{ $usuario->email }})
    </option>
@endforeach

                                        </select>
                                    </div>

                                    <!-- Campos adicionales para el rol de Doctor -->
                                    <div id="hidden-form2" class="hidden mt-4 p-4 border border-gray-300 rounded-md">
                                        <h3 class="text-lg font-medium text-gray-700" style="text-align: center;">
                                            Formulario del Médico</h3>

                                        <div class="form-group">
                                            <label for="cedulaProfesional"
                                                class="block text-sm font-medium text-gray-700">Cédula
                                                Profesional</label>
                                            <input type="text" id="cedulaProfesional" name="cedulaProfesional"
                                                placeholder="Ingrese su cédula profesional" minlength="7"
                                                maxlength="12" pattern="[0-9]+"
                                                class="block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        </div>

                                        <div class="form-group">
                                            <label for="rutafirma"
                                                class="block text-sm font-medium text-gray-700">Firma (imagen)</label>
                                            <input type="file" id="rutafirma" name="rutafirma"
                                                accept="image/png, image/jpeg"
                                                class="block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                    </div>
                                </div>


                        </div>

                        <div class="modal-footer">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">
                                Guardar
                            </button>
                            <a href="#"
                                class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600"
                                data-dismiss="modal">
                                Cancelar
                            </a>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>




<script>
    document.getElementById('CargoAgregar').addEventListener('change', function() {
        const hiddenFormAgregar = document.querySelector('#hidden-form2');
        const selectedValue = this.value;
        if (selectedValue === 'doctor') {
            hiddenFormAgregar.classList.remove('hidden'); // Muestra el formulario si se selecciona 'doctor'
        } else {
            hiddenFormAgregar.classList.add('hidden'); // Oculta el formulario si no
        }
    });

    document.getElementById('CargoModificar').addEventListener('change', function() {
        const hiddenForm = document.querySelector('#hidden-form');
        if (selectedValue === 'doctor') {
            hiddenForm.classList.remove('hidden'); // Muestra el formulario si se selecciona 'doctor'
        } else {
            hiddenForm.classList.add('hidden'); // Oculta el formulario si no
        }
    });

    // Verifica el valor seleccionado al cargar la página
    document.addEventListener('DOMContentLoaded', () => {
        const selectElement = document.getElementById('Cargo');
        toggleHiddenForm(selectElement.value); // Llama a la función para mostrar u ocultar el formulario
    });

    const todosLospersonals = @json($personalsall); // Traer todos los personales

    function buscarpersonal() {
        const searchValue = document.getElementById('buscarpersonal').value.trim().toLowerCase();

        // Si la búsqueda está vacía, recargar la página
        if (!searchValue) {
            window.location.reload();
            return;
        }

        const tbody = document.getElementById('tbodypersonals');
        tbody.innerHTML = ''; // Limpiar la tabla

        // Función para normalizar texto
        function normalizarTexto(texto) {
            return texto
                .normalize("NFD") // Descompone caracteres con acentos en sus componentes base
                .replace(/[\u0300-\u036f]/g, "") // Elimina los diacríticos (acentos)
                .toLowerCase(); // Convierte a minúsculas
        }

        // Filtrar los personales
        const resultados = todosLospersonals.filter(personal => {
            const nombreCompleto = normalizarTexto(
                `${personal.Nombre || ''} ${personal.apellido_paterno || ''} ${personal.apellido_materno || ''}`
            );
            const idpersonal = String(personal.id || '').toLowerCase();
            const edadpersonal = String(personal.edad || '').toLowerCase();
            const sexopersonal = normalizarTexto(personal.sexo || '');
            const fechanacimientopersonal = normalizarTexto(personal.FechaNacimiento || '');
            const searchNormalized = normalizarTexto(searchValue);

            return (
                idpersonal.includes(searchNormalized) || // Búsqueda por ID
                nombreCompleto.includes(searchNormalized) || // Búsqueda por nombre
                edadpersonal.includes(searchNormalized) || // Búsqueda por edad
                sexopersonal.includes(searchNormalized) || // Búsqueda por sexo
                fechanacimientopersonal.includes(searchNormalized) // Búsqueda por fecha de nacimiento
            );
        });

        // Mostrar resultados
        if (resultados.length > 0) {
            resultados.forEach(personal => {
                const row = document.createElement('tr');
                row.innerHTML = `
                <td>${personal.id || 'N/A'}</td>
                <td>${personal.Nombre || 'Sin nombre'}</td>
                <td>${personal.apellido_paterno || 'Sin apellido'}</td>
                <td>${personal.apellido_materno || 'Sin apellido'}</td>
                <td>${personal.edad || 'Sin edad'}</td>
                <td>${personal.sexo || 'Sin sexo'}</td>
                <td>
                    <div class="flex flex-col">
                        <a href="#personalInfoModal-${personal.id}"
                            class="inline-block px-4 py-2 bg-blue-700 text-white font-semibold rounded-md hover:bg-blue-600 mb-2">Ver</a>
                        <div class="flex">
                            <a href="#editPersonalModal-${personal.id}"
                                class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 mr-2">Editar</a>
                            <form action="${personal.eliminarruta || '#'}"
                                method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-block px-4 py-2 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </td>
            `;
                tbody.appendChild(row);
            });
        } else {
            tbody.innerHTML = `<tr><td colspan="7" style="text-align: center;">No se encontraron resultados</td></tr>`;
        }
    }
</script>
