<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-label for="email" value="{{ __('Correo') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <div class="relative">
                    <x-input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm pr-12 focus:ring-indigo-500 focus:border-indigo-500"
                             type="password" name="password" required autocomplete="new-password" oninput="validatePasswords()" />
                    <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 focus:outline-none"
                            onclick="togglePasswordVisibility('password', 'eye-icon')">
                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <!-- Icono de ojo -->
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.808 2.447-2.95 4.5-5.542 5.5-2.592 1-5.734 1-8.326 0C3.732 16.5 2.29 14.447 2.458 12z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                <div class="relative">
                    <x-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm pr-12 focus:ring-indigo-500 focus:border-indigo-500"
                             type="password" name="password_confirmation" required autocomplete="new-password" oninput="validatePasswords()" />
                    <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 focus:outline-none"
                            onclick="togglePasswordVisibility('password_confirmation', 'eye-icon-confirmation')">
                        <svg id="eye-icon-confirmation" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <!-- Icono de ojo -->
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.808 2.447-2.95 4.5-5.542 5.5-2.592 1-5.734 1-8.326 0C3.732 16.5 2.29 14.447 2.458 12z" />
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

                    if (password && passwordConfirmation) {
                        if (password === passwordConfirmation) {
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
                }
            </script>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Restablecer Contraseña') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
