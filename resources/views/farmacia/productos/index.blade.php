<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'farmacia') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])


        <style>
            #panelOpciones{
                background-color: #d32f2f;
            }
        </style>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main  class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

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


             @include('farmacia.productos.productos')


            </main>
        </div>


        @livewireScripts
    </body>
</html>
