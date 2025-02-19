<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Correo') }}" />
                <x-input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <div class="relative">
                    <x-input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm pr-12 focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password" required autocomplete="current-password" />
                    <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 focus:outline-none" onclick="togglePasswordVisibility()">
                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <!-- Icono de ojo -->
                            <path id="eye" stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path id="eye-outline" stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.808 2.447-2.95 4.5-5.542 5.5-2.592 1-5.734 1-8.326 0C3.732 16.5 2.29 14.447 2.458 12z" />
                        </svg>
                    </button>
                </div>
            </div>

            <script>
                function togglePasswordVisibility() {
                    const passwordInput = document.getElementById('password');
                    const eyeIcon = document.getElementById('eye-icon');

                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';

                        // Cambia a ícono de ojo tachado
                        eyeIcon.innerHTML = `
                            <!-- Icono de ojo tachado -->
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.808 2.447-2.95 4.5-5.542 5.5-2.592 1-5.734 1-8.326 0C3.732 16.5 2.29 14.447 2.458 12z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4l16 16" /> <!-- Línea tachada -->
                        `;
                    } else {
                        passwordInput.type = 'password';

                        // Cambia a ícono de ojo
                        eyeIcon.innerHTML = `
                            <!-- Icono de ojo -->
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.808 2.447-2.95 4.5-5.542 5.5-2.592 1-5.734 1-8.326 0C3.732 16.5 2.29 14.447 2.458 12z" />
                        `;
                    }
                }
            </script>


            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" class="text-indigo-600 focus:ring-indigo-500" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-600 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>

            <div class="mt-6">
                <x-button class="w-full py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Ingresar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
