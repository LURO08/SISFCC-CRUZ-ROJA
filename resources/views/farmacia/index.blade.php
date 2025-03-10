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

        <!-- Styles -->
        @livewireStyles

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <style>

            footer {
                text-align: center;
                padding: 10px;
                background-color: #d32f2f;
                color: white;
                bottom: 0;
                width: 100%;
            }
        </style>

    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class=" bg-gray-100">
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
            <main class="max-w">
                @include('farmacia.dashboard')
            </main>
        </div>

        <footer style="height: 10vh;">
            <p>&copy; 2024 Cruz Roja Mexicana - Delegación Chilpancingo</p>
            <p style="padding-top: 10px;"> <b> Creado por: </b> Jose Luis Romero Palacios</p>
        </footer>
        @livewireScripts
    </body>
</html>
