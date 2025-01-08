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

    table th,
    table td {
        padding: 30px;
        border: 1px solid #ddd;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    table th {
        background-color: #007bff;
        /* Cambia al color principal */
        color: #ffffff;
        /* Texto blanco */
        font-weight: bold;
        text-transform: uppercase;
        /* Texto en mayúsculas */
    }

    table td {
        background-color: #f9f9f9;
        /* Fondo suave para las celdas */
        color: #333;
        /* Texto oscuro */
    }

    table tbody tr:hover {
        background-color: #e6f7ff;
        /* Cambia el fondo al pasar el ratón */
        color: #007bff;
        /* Resalta el texto */
    }


    @media (max-width: 768px) {

        table th,
        table td {
            padding: 10px;
            font-size: 14px;
        }
    }

    form label {
        text-align: left;

    }
</style>
<link rel="stylesheet" href="{{ asset('css/component/modal.css') }}">
@if (session('success'))
            <div id="successNotification" class="notification alert alert-success alert-dismissible fade show"
                role="alert"
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
            <div id="successNotification" class="notification alert alert-error alert-dismissible fade show"
                role="alert"
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
    <section id="PanelUsuarios" style=" width: 70%;">
        <!-- Botón para abrir el modal -->
        <div class=" rounded bg-white  shadow-md " style="width: 100%;">
            <h1 style="text-align: center; font-size: 25px; font-weight: 700;">Registro Usuarios</h1>

            <div
                style="width: 100%;  margin: 0 auto;  display: flex; justify-content: space-between; align-items: center; gap: 1rem; background-color: #f8f9fa; border-radius: 8px;">
                <a href="#addUsuarioModal"
                    class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Agregar
                    Usuario</a>
                <div
                    style="display: flex; gap: 0.5rem; align-items: center; justify-content: space-between; width: 30%;">
                    <span>Buscar:</span>
                    <input type="search" class="form-control" placeholder="Buscar Usuario..." id="buscarUsuario"
                        style="padding: 10px; flex: 1; border-radius: 8px;" onkeyup="buscarusuario()">
                </div>
            </div>
            <table class="text-center shadow-md"
                style="width:100%; margin: auto; table-layout: auto; border-collapse: collapse;">
                <thead class="bg-blue-500 " style="color:#fff; ">
                    <tr>
                        <th class="px-4 py-2">Usuario</th>
                        <th class="px-4 py-2">Correo</th>
                        <th class="px-4 py-2">Rol</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbodyusers">
                    @foreach ($users as $user)
                        <tr>
                            <td class="border px-4 py-2">{{ $user->name }}</td>
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            <td class="border px-4 py-2">
                                {{ __('roles.' . $user->roles->pluck('name')->first()) }}
                            </td>

                            <td class="border px-4 py-2" style="text-align: center; vertical-align: middle;">
                                <div class="d-flex align-items-center "
                                    style="display: flex; margin: 0 auto; gap: 10px; text-align: center; vertical-align: middle;">
                                    <!-- Botón Editar -->
                                    <a href="#editUsuarioModal-{{ $user->id }}" class="btn btn-edit btn-sm me-2">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>

                                    <!-- Botón Eliminar -->
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class=" btn-eliminar "
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                                            <i class="fas fa-trash-alt"></i> Eliminar
                                        </button>
                                    </form>
                                </div>

                            </td>
                        </tr>

                        <!-- Edit Usuario Modal -->
                        <div class="modal editUsuarioModal" id="editUsuarioModal-{{ $user->id }}">
                            <div class="modal-content">
                                <div class="bg-blue-500 modal-header">
                                    <h5 class="modal-title">Editar Usuario</h5>
                                    <a href="#" class="close">&times;</a>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST"
                                        class="px-6">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="name"
                                                class="block text-sm font-medium text-gray-700">Name</label>
                                            <input type="text" name="name" id="name-{{ $user->id }}"
                                                value="{{ old('name', $user->name) }}" required
                                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('name') border-red-500 @enderror">
                                            @error('name')
                                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email"
                                                class="block text-sm font-medium text-gray-700">Email</label>
                                            <input type="email" name="email" id="email-{{ $user->id }}"
                                                value="{{ old('email', $user->email) }}" required
                                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror">
                                            @error('email')
                                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="role"
                                                class="block text-sm font-medium text-gray-700">Rol</label>
                                            <select id="role" name="role" class="block mt-1 w-full" required>
                                                @foreach (['admin', 'almacenista', 'Jefe de Socorros', 'doctor', 'cajero', 'farmacia'] as $role)
                                                    <option value="{{ $role }}"
                                                        {{ old('role', $user->role ?? '') === $role ? 'selected' : '' }}>
                                                        {{ __('roles.' . $role) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="password"
                                                class="block text-sm font-medium text-gray-700">Contraseña</label>
                                            <div class="relative">
                                                <input type="password" name="password"
                                                    id="password-{{ $user->id }}"
                                                    autocomplete="new-password"
                                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password') border-red-500 @enderror">
                                                <button type="button"
                                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 focus:outline-none"
                                                    onclick="togglePasswordVisibility('password-{{ $user->id }}', 'eye-icon-{{ $user->id }}')">
                                                    <svg id="eye-icon-{{ $user->id }}"
                                                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.808 2.447-2.95 4.5-5.542 5.5-2.592 1-5.734 1-8.326 0C3.732 16.5 2.29 14.447 2.458 12z" />
                                                    </svg>
                                                </button>
                                            </div>
                                            @error('password')
                                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirmation"
                                                class="block text-sm font-medium text-gray-700">Confirmar
                                                Contraseña</label>
                                            <div class="relative">
                                                <input type="password" name="password_confirmation"
                                                    id="password_confirmation-{{ $user->id }}"
                                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password_confirmation') border-red-500 @enderror">
                                                <button type="button"
                                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 focus:outline-none"
                                                    onclick="togglePasswordVisibility('password_confirmation-{{ $user->id }}', 'eye-icon-confirmation-{{ $user->id }}')">
                                                    <svg id="eye-icon-confirmation-{{ $user->id }}"
                                                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.808 2.447-2.95 4.5-5.542 5.5-2.592 1-5.734 1-8.326 0C3.732 16.5 2.29 14.447 2.458 12z" />
                                                    </svg>
                                                </button>
                                            </div>
                                            @error('password_confirmation')
                                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                            @enderror
                                            <p id="password-match-message-{{ $user->id }}" class="mt-1 text-sm">
                                            </p>
                                        </div>

                                        <div class="flex justify-center space-x-4 mt-4">
                                            <button type="submit"
                                                class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                                                Actualizar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Edit Product Modal -->

                        <script>
                            function togglePasswordVisibility(inputId, iconId) {
                                const input = document.getElementById(inputId);
                                const icon = document.getElementById(iconId);

                                if (input.type === 'password') {
                                    input.type = 'text';
                                    icon.classList.add('text-indigo-500');
                                } else {
                                    input.type = 'password';
                                    icon.classList.remove('text-indigo-500');
                                }
                            }

                            document.querySelector(`#password_confirmation-{{ $user->id }}`).addEventListener('input', function() {
                                const password = document.querySelector(`#password-{{ $user->id }}`).value;
                                const confirmation = this.value;
                                const message = document.getElementById(`password-match-message-{{ $user->id }}`);

                                if (password && confirmation) {
                                    if (password === confirmation) {

                                        message.textContent = '¡Las contraseñas coinciden!';
                                        message.classList.remove('text-red-500');
                                        message.classList.add('text-green-500');
                                    } else {
                                        message.textContent = 'Las contraseñas no coinciden.';
                                        message.classList.remove('text-green-500');
                                        message.classList.add('text-red-500');
                                    }
                                } else {
                                    message.textContent = '';
                                }
                            });
                        </script>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination-wrapper" style="width: 80%; margin: 0 auto;">
            {{ $users->links() }}
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

                        <div class="form-group">
                            <x-label for="name" value="{{ __('Usuario') }}" />
                            <input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div class="form-group">
                            <x-label for="email" value="{{ __('Correo') }}" />
                            <input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                        </div>

                        <div class="form-group">
                            <x-label for="password" value="{{ __('Contraseña') }}" />
                            <div class="relative">
                                <input id="password"
                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm pr-12 focus:ring-indigo-500 focus:border-indigo-500"
                                    type="password" name="password" required autocomplete="new-password"
                                    oninput="validatePasswords()" />
                                <button type="button"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 focus:outline-none"
                                    onclick="togglePasswordVisibility('password', 'eye-icon')">
                                    <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <!-- Icono de ojo -->
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.808 2.447-2.95 4.5-5.542 5.5-2.592 1-5.734 1-8.326 0C3.732 16.5 2.29 14.447 2.458 12z" />
                                    </svg>
                                </button>
                            </div>
                        </div>


                        <div class="form-group">
                            <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                            <div class="relative">
                                <input id="password_confirmation"
                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm pr-12 focus:ring-indigo-500 focus:border-indigo-500"
                                    type="password" name="password_confirmation" required autocomplete="new-password"
                                    oninput="validatePasswords()" />
                                <button type="button"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 focus:outline-none"
                                    onclick="togglePasswordVisibility('password_confirmation', 'eye-icon-confirmation')">
                                    <svg id="eye-icon-confirmation" xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <!-- Icono de ojo -->
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.808 2.447-2.95 4.5-5.542 5.5-2.592 1-5.734 1-8.326 0C3.732 16.5 2.29 14.447 2.458 12z" />
                                    </svg>
                                </button>
                            </div>
                            <p id="password-match-message" class="mt-1 text-sm"></p>
                        </div>

                        <script>
                            function togglePasswordVisibility(inputId, iconId) {
                                const passwordInput = document.getElementById(inputId);
                                const eyeIcon = document.getElementById(iconId);

                                if (passwordInput.type === 'password') {
                                    passwordInput.type = 'text';
                                    eyeIcon.innerHTML = `
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.808 2.447-2.95 4.5-5.542 5.5-2.592 1-5.734 1-8.326 0C3.732 16.5 2.29 14.447 2.458 12z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4l16 16" />
                                    `;
                                } else {
                                    passwordInput.type = 'password';
                                    eyeIcon.innerHTML = `
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.808 2.447-2.95 4.5-5.542 5.5-2.592 1-5.734 1-8.326 0C3.732 16.5 2.29 14.447 2.458 12z" />
                                    `;
                                }
                            }

                            function validatePasswords() {
                                const password = document.getElementById('password').value;
                                const passwordConfirmation = document.getElementById('password_confirmation').value;
                                const message = document.getElementById('password-match-message');
                                const btn = document.getElementById('btnRegistrar');

                                if (password && passwordConfirmation) {
                                    if (password === passwordConfirmation) {
                                        btn.disabled = false;
                                        message.textContent = '¡Las contraseñas coinciden!';
                                        message.classList.remove('text-red-500');
                                        message.classList.add('text-green-500');
                                    } else {
                                        btn.disabled = true;
                                        message.textContent = 'Las contraseñas no coinciden.';
                                        message.classList.remove('text-green-500');
                                        message.classList.add('text-red-500');
                                    }
                                } else {
                                    message.textContent = '';
                                    btn.disabled = false; // Habilitar el botón si no se han ingresado contraseñas
                                }
                            }
                        </script>

                        <div class="form-group">
                            <x-label for="role" :value="__('Rol')" />
                            <select id="role" name="role" class="block mt-1 w-full" required>
                                @php
                                    $roles = ['admin', 'almacenista', 'socorros', 'doctor', 'cajero', 'farmacia'];
                                @endphp
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}"
                                        {{ old('role', $user->role ?? '') === $role ? 'selected' : '' }}>
                                        {{ ucfirst(__('roles.' . $role)) }}
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
                            <button type="submit" id="btnRegistrar"
                                class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                                Registrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <script>
        const todosLosUsuarios = @json($userssall); // Traer todos los usuarios

        // Función para normalizar texto (eliminar acentos, convertir a minúsculas, etc.)
        function normalizarTexto(texto) {
            return texto
                .normalize("NFD") // Descompone caracteres con acentos en sus componentes base
                .replace(/[\u0300-\u036f]/g, "") // Elimina los diacríticos (acentos)
                .toLowerCase(); // Convierte a minúsculas
        }

        function buscarusuario() {
            const searchValue = document.getElementById('buscarUsuario').value.trim();

            // Si la búsqueda está vacía, recargar la página
            if (!searchValue) {
                window.location.reload();
                return;
            }

            const tbody = document.getElementById('tbodyusers');
            tbody.innerHTML = ''; // Limpiar la tabla

            // Filtrar los usuarios
            const resultados = todosLosUsuarios.filter(user => {
                const nameUsuario = normalizarTexto(String(user.name || ''));
                const correoUsuario = normalizarTexto(String(user.email || ''));
                const rolUsuario = normalizarTexto(user.roles && user.roles.length > 0 ? user.roles[0].name : '');
                const searchNormalized = normalizarTexto(searchValue);

                return (
                    nameUsuario.includes(searchNormalized) || // Búsqueda por nombre
                    correoUsuario.includes(searchNormalized) || // Búsqueda por correo
                    rolUsuario.includes(searchNormalized) // Búsqueda por rol
                );
            });


            // Mostrar resultados
            if (resultados.length > 0) {
                resultados.forEach(user => {

                    const row = document.createElement('tr');

                    row.innerHTML = `

                        <td>${user.name || 'Sin nombre'}</td>
                        <td>${user.email || 'Sin correo'}</td>
                        <td>${user.roles[0].name || 'Sin rol'}</td>
                        <td class="border px-4 py-2">
                            <div class="d-flex align-items-center justify-content-around" style="display: flex;">
                                <!-- Botón Editar -->
                                <a href="#editUsuarioModal-${user.id}" class="btn btn-edit btn-sm me-2">
                                    <i class="fas fa-edit"></i> Editar
                                </a>

                                <!-- Botón Eliminar -->
                                <form action="/admin/users/destroy/${user.id}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-eliminar"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    `;
                    tbody.appendChild(row);
                });
            } else {
                tbody.innerHTML = `<tr><td colspan="4" style="text-align: center;">No se encontraron resultados</td></tr>`;
            }
        }
    </script>

</div>
