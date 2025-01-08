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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #190101;
        }

        main {
            display: flex;
            height: 50;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #d32f2f;
            color: white;
            bottom: 0;
            width: 100%;
            height: 20%;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        /* Estilo del contenido principal */
        .content {
            flex: 1;
            /* Toma el resto del espacio disponible */
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            /* Activar flexbox */
            justify-content: center;
            /* Centrar horizontalmente */
            align-items: center;
            /* Centrar verticalmente */
        }


        /* Panel central */
        #panelCentral {
            text-align: center;
            font-size: 2rem;
            font-style: italic;
            /* Estilo en cursiva */
            font-weight: bold;
            /* Negrita */
            color: #007bff;
            /* Color azul */
            margin: 20px 0;
            /* Espaciado uniforme */
            padding: 20px;
            /* Espaciado interno */
            border-radius: 8px;
            /* Esquinas redondeadas */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Sombra sutil */
            display: flex;
            /* Activar flexbox para centrar contenido */
            flex-direction: column;
            /* Organizar contenido en columna */
            align-items: center;
            /* Centrar contenido horizontalmente */
        }

        #panelCentral h1 {
            margin: 20px 0 0;
            /* Espacio en la parte superior, sin margen en la parte inferior */
            text-shadow: 1px 2px 2px rgba(0, 0, 0, 0.2);
            /* Sombra de texto más sutil */
            letter-spacing: 1px;
            /* Espaciado entre letras */
            font-weight: 800;
        }
    </style>

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
        <main>

            @include('doctor.consulta.menu_nav')

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
        <div class="notification alert alert-error alert-dismissible fade show" role="alert"
            style="position: fixed; top: 20px; right: 20px; width: 300px; z-index: 1050;
            background-color: #e14a4a; color: white; border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); padding: 20px; padding-top: 30px;
            text-align: center;">
            <a type="button" class="btn-close" href=""
                style="position: absolute; top: 10px; right: 10px; font-size: 22px;
            color: white; text-decoration: none; opacity: 0.8;">
                &times;</a>
            <strong>Error!</strong> {{ session('success') }}
        </div>
    @endif

            <div class="content">
                <div id="panelCentral">
                    <svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <!-- Cuadrado superior -->
                        <rect x="35" y="10" width="30" height="30" fill="red" stroke="white"
                            stroke-width="4" />
                        <!-- Cuadrados laterales -->
                        <rect x="10" y="35" width="30" height="30" fill="red" stroke="white"
                            stroke-width="4" />
                        <rect x="60" y="35" width="30" height="30" fill="red" stroke="white"
                            stroke-width="4" />
                        <!-- Cuadrado inferior -->
                        <rect x="35" y="60" width="30" height="30" fill="red" stroke="white"
                            stroke-width="4" />
                        <!-- Cuadrado central alargado horizontal -->
                        <rect x="30" y="37" width="40" height="26" fill="red" />
                        <!-- Cuadrado central alargado vertical -->
                        <rect x="37" y="30" width="26" height="40" fill="red" />
                    </svg>
                    <h1 style="margin: 0; text-align: center;">SISTEMA DE CONSULTORIO MÉDICO</h1>
                </div>
            </div>
        </main>
    </div>

    <footer>
        <p>&copy; 2024 Cruz Roja Mexicana - Delegación Chilpancingo</p>
        <p style="padding-top: 10px;"> <b> Creado por: </b> Jose Luis Romero Palacios</p>
    </footer>
</body>

</html>
