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

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #d32f2f;
    color: white;
    padding: 15px;
}

header .logo {
    display: flex;
    align-items: center;
}

header .logo img {
    width: 50px;
    margin-right: 10px;
}

header nav ul {
    list-style: none;
    display: flex;
}

header nav ul li {
    margin-right: 20px;
}

header nav ul li a {
    color: white;
    text-decoration: none;
}

header .user-info {
    display: flex;
    align-items: center;
}

header .user-info span {
    margin-right: 20px;
}

header .user-info button {
    padding: 5px 10px;
    background-color: white;
    color: #d32f2f;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

main {
    display: flex;
}

aside {
    width: 200px;
    background-color: #ffffff;
    padding: 20px;
    box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.1);
}

aside ul {
    list-style: none;
    padding: 0;
}

aside ul li {
    margin-bottom: 10px;
}

aside ul li a {
    text-decoration: none;
    color: #d32f2f;
    font-weight: bold;
}

.content {
    flex: 1;
    padding: 20px;
}

.content h2 {
    color: #d32f2f;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}
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
                @include('doctor.pagina')
            </main>
        </div>

        <footer>
            <p>&copy; 2024 Cruz Roja Mexicana - Delegación Chilpancingo</p>
            <p style="padding-top: 10px;"> <b> Creado por: </b> Jose Luis Romero Palacios</p>
        </footer>
    </body>
</html>
