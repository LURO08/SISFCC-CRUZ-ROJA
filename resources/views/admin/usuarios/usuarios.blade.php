<style>
    main {
        display: flex;
        justify-content: center;
        width: auto;
        height: 100%;
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
        background-color: #ffffff;
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

    .modal-dialog {
        width: 500px;

    }

    .modal-dialog .modal-title {
        padding-left: 5px;
    }


    .btn-primary {
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


    .btn-primary:hover,
    {
    opacity: 0.8;
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

    .btn-eliminar {
        background-color: #f53232;
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

    .btn-eliminar:hover {
        background-color: #b81f1f;
        /* Verde más oscuro al pasar el ratón */
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

    table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 16px;
    text-align: center;
}

table th, table td {
    padding: 30px;
    border: 1px solid #ddd;
    transition: background-color 0.3s ease, color 0.3s ease;
}

table th {
    background-color: #007bff; /* Cambia al color principal */
    color: #ffffff; /* Texto blanco */
    font-weight: bold;
    text-transform: uppercase; /* Texto en mayúsculas */
}

table td {
    background-color: #f9f9f9; /* Fondo suave para las celdas */
    color: #333; /* Texto oscuro */
}

table tbody tr:hover {
    background-color: #e6f7ff; /* Cambia el fondo al pasar el ratón */
    color: #007bff; /* Resalta el texto */
}


@media (max-width: 768px) {
    table th, table td {
        padding: 10px;
        font-size: 14px;
    }
}



</style>

@include('admin.menu_nav')

<div class="central">
    <section id="PanelUsuarios" style=" width: auto;"  >
        <!-- Botón para abrir el modal -->
        <div class=" rounded bg-white  shadow-md "  >
            <h1 style="text-align: center; font-size: 25px; font-weight: 700;">Registro Usuarios</h1>
            <a href="#addUsuarioModal"
                class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Agregar
                Usuario</a>
            <br><br>
            <table class="  text-center shadow-md" style=" width: auto;" >
                <thead class="bg-blue-500 " style="color:#fff; ">
                    <tr>
                        <th class="px-4 py-2">Usuario</th>
                        <th class="px-4 py-2">Correo</th>
                        <th class="px-4 py-2">Rol</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="border px-4 py-2">{{ $user->name }}</td>
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            <td class="border px-4 py-2">{{ $user->roles->pluck('name')->first() }}</td>
                            <td class="border px-4 py-2">
                                <div class="d-flex align-items-center justify-content-around" style="display: flex;">
                                    <!-- Botón Editar -->
                                    <a href="#editUsuarioModal-{{ $user->id }}" class="btn btn-edit btn-sm me-2">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>

                                    <!-- Botón Eliminar -->
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-eliminar"
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                                            <i class="fas fa-trash-alt"></i> Eliminar
                                        </button>
                                    </form>
                                </div>

                            </td>
                        </tr>

                        <!-- Edit Usuario Modal -->
                        <div class="modal" id="editUsuarioModal-{{ $user->id }}">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="bg-blue-500 modal-header ">
                                        <h5 class="modal-title">Editar Usuario</h5>
                                        <a href="#" class="close">&times;</a>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST"
                                            class="px-6">
                                            @csrf
                                            @method('PUT')

                                            <div class="mb-4">
                                                <label for="name"
                                                    class="block text-sm font-medium text-gray-700">Name</label>
                                                <input type="text" name="name" id="name-{{ $user->id }}"
                                                    value="{{ old('name', $user->name) }}" required
                                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('name') border-red-500 @enderror">
                                                @error('name')
                                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="email"
                                                    class="block text-sm font-medium text-gray-700">Email</label>
                                                <input type="email" name="email" id="email-{{ $user->id }}"
                                                    value="{{ old('email', $user->email) }}" required
                                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror">
                                                @error('email')
                                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mt-4">
                                                <x-label for="role" value="{{ __('Rol') }}" />
                                                <select id="role" name="role" class="block mt-1 w-full" required>
                                                    @foreach (['admin', 'almacenista', 'Jefe de Socorros', 'doctor', 'cajero', 'farmacia'] as $role)
                                                        <option value="{{ $role }}"
                                                            {{ old('role', $user->role ?? '') === $role ? 'selected' : '' }}>
                                                            {{ __('roles.' . $role) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="mb-4">
                                                <label for="password"
                                                    class="block text-sm font-medium text-gray-700">Password</label>
                                                <input type="password" name="password"
                                                    id="password-{{ $user->id }}"
                                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password') border-red-500 @enderror">
                                                <small class="text-sm text-gray-500">Leave blank to keep current
                                                    password</small>
                                                @error('password')
                                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="password_confirmation"
                                                    class="block text-sm font-medium text-gray-700">Confirm
                                                    Password</label>
                                                <input type="password" name="password_confirmation"
                                                    id="password_confirmation-{{ $user->id }}"
                                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password_confirmation') border-red-500 @enderror">
                                                @error('password_confirmation')
                                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <button type="submit"
                                                class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Update</button>
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

        <br><br>
        <!-- Add Usuario Modal -->
        <div id="addUsuarioModal" class="modal">
            <div class="modal-content">
                <div class="bg-blue-500 modal-header">
                    <h5 class="modal-title px-5">Agregar Nuevo Usuario</h5>
                    <a href="#" class="close">&times;</a>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <x-label for="name" value="{{ __('Usuario') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-label for="email" value="{{ __('Correo') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Contraseña') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-label for="role" value="{{ __('Rol') }}" />
                            <select id="role" name="role" class="block mt-1 w-full" required>
                                @foreach (['admin', 'almacenista', 'Jefe de Socorros', 'doctor', 'cajero', 'farmacia'] as $role)
                                    <option value="{{ $role }}" {{ old('role', $user->role ?? '') === $role ? 'selected' : '' }}>
                                        {{ __( 'roles.' . $role) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>





                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-label for="terms">
                                    <div class="flex items-center">
                                        <x-checkbox name="terms" id="terms" required />

                                        <div class="ms-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' =>
                                                    '<a target="_blank" href="' .
                                                    route('terms.show') .
                                                    '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                    __('Terms of Service') .
                                                    '</a>',
                                                'privacy_policy' =>
                                                    '<a target="_blank" href="' .
                                                    route('policy.show') .
                                                    '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                    __('Privacy Policy') .
                                                    '</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-label>
                            </div>
                        @endif

                        <div class="flex items-center justify-center mt-4">
                            <x-button>
                                {{ __('Register') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>


</div>
