<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reporte de {{ ucfirst(request('tipo_reporte')) }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <!-- Custom Styles -->
    <style>
        /* General styles for the report table */
        .report-container {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            font-family: 'Arial', sans-serif;
        }

        .report-container th,
        .report-container td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        .report-container th {
            background-color: #f1f3f4;
            font-weight: bold;
            color: #34495e;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .report-container tr:last-child td {
            border-bottom: none;
        }

        .report-container td img {
            max-width: 180px;
            height: auto;
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .report-container td {
            color: #2c3e50;
            font-size: 16px;
            line-height: 1.6;
        }

        .report-container td p {
            margin: 5px 0;
        }

        .report-container td strong {
            color: #34495e;
        }

        .price {
            font-weight: bold;
            color: #e74c3c;
            font-size: 18px;
        }

        .link {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        .link:hover {
            text-decoration: underline;
        }

        /* Header styles for better readability */
        .report-header {
            text-align: center;
            background-color: #34495e;
            color: #ecf0f1;
            padding: 20px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .report-header h2 {
            margin: 0;
            font-size: 24px;
        }

        .report-header p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #bdc3c7;
        }
    </style>

</head>

<body class="font-sans antialiased bg-gray-100">
    <x-banner />
    <div class="min-h-screen">
        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="mt-6 px-4">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Reporte de
                {{ ucfirst(request('tipo_reporte')) }}</h2>

            @forelse ($resultados as $resultado)
                <!-- Pacientes -->
                @if (request('tipo_reporte') === 'pacientes')
                    <table class="report-container">
                        <tr>
                            <td>
                                <h4>{{ $resultado->nombre }} {{ $resultado->apellidopaterno }}
                                    {{ $resultado->apellidomaterno }}</h4>
                                <p><strong>Edad:</strong> {{ $resultado->edad }}</p>
                                <p><strong>Sexo:</strong> {{ $resultado->sexo }}</p>
                                <p><strong>Tipo de Sangre:</strong> {{ $resultado->tipo_sangre }}</p>
                            </td>
                        </tr>
                    </table>

                    <!-- Medicamentos -->
                @elseif (request('tipo_reporte') === 'medicamentos')
                    <table class="report-container">
                        <tr>
                            <td>
                                @if ($resultado->imagen)
                                    <img src="{{ public_path($resultado->imagen) }}"
                                        alt="Imagen de {{ $resultado->nombre }}">
                                @else
                                    <img src="ruta_a_imagen_placeholder.jpg" alt="No hay imagen disponible">
                                @endif
                            </td>
                            <td>
                                <h4>{{ $resultado->nombre }}</h4>
                                <p><strong>Descripción:</strong> {{ $resultado->descripcion }}</p>
                                <p><strong>Dosis:</strong> {{ $resultado->dosis }}</p>
                                <p><strong>Medida:</strong> {{ $resultado->medida }}</p>
                                <p><strong>Cantidad:</strong> {{ $resultado->cantidad }}</p>
                                <p><strong>Caducidad:</strong> {{ $resultado->caducidad }}</p>
                                <p class="price"><strong>Precio:</strong> ${{ number_format($resultado->precio, 2) }}
                                </p>
                            </td>
                        </tr>
                    </table>

                    <!-- Cobros -->
                @elseif (request('tipo_reporte') === 'cobros')
                    <table class="report-container">
                        <tr>
                            <td>
                                <h3><strong>Folio: </strong>{{ $resultado->folio }}</h3>

                                <p><strong>DerechoHabiente:</strong> {{ $resultado->nombre }}</p>
                                <p><strong>Fecha Cobro:</strong> {{ $resultado->fecha }}</p>
                                <p><strong>Hora Cobro:</strong> {{ $resultado->hora }}</p>
                                <p><strong>Servicio:</strong> {{ $resultado->Servicio->nombre }}</p>
                                <p><strong>Costo:</strong> ${{ $resultado->Servicio->costo }}</p>

                                <h4>Datos del Paciente</h4>
                                @if ($resultado->receta && $resultado->receta->paciente)
                                    <p><strong>Paciente:</strong> {{ $resultado->receta->paciente->nombre }}
                                        {{ $resultado->receta->paciente->apellidopaterno }}
                                        {{ $resultado->receta->paciente->apellidomaterno }}</p>
                                    <p><strong>Edad:</strong> {{ $resultado->receta->paciente->edad }}</p>
                                    <p><strong>Sexo:</strong> {{ $resultado->receta->paciente->sexo }}</p>
                                    <p><strong>Tipo de Sangre:</strong> {{ $resultado->receta->paciente->tipo_sangre }}
                                    </p>
                                @else
                                    <p>No hay datos del paciente asociados.</p>
                                @endif
                            </td>
                            <td>
                                <h4>Medicamentos Surtidos</h4>
                                @if ($resultado->receta && $resultado->receta->medicamentos)
                                    <ul>
                                        @foreach ($resultado->receta->medicamentos as $medica)
                                            <li>
                                                <strong>Nombre:</strong>
                                                {{ $medica->medicamento->nombre ?? 'N/A' }}<br>
                                                <strong>Cantidad:</strong> {{ $medica->cantidad ?? 'N/A' }}<br>
                                                <strong>Dosis:</strong> {{ $medica->medicamento->dosis ?? 'N/A' }}
                                                {{ $medica->medicamento->medida ?? 'N/A' }}<br>
                                                <strong>Precio:
                                                </strong>{{ number_format(($medica->cantidad ?? 0) * ($medica->medicamento->precio ?? 0), 2) }}
                                                <br>
                                            </li>
                                        @endforeach
                                        <strong>Precio Total: </strong>{{ $resultado->preciototal }}
                                    </ul>
                                @else
                                    <p>No hay medicamentos surtidos asociados a esta receta.</p>
                                @endif

                                <h4>Datos del Doctor</h4>
                                @if ($resultado->receta && $resultado->receta->doctor)
                                    <p><strong>Nombre:</strong> {{ $resultado->receta->doctor->nombre }}</p>
                                    <p><strong>Apellido Paterno:</strong>
                                        {{ $resultado->receta->doctor->apellidoPaterno }}</p>
                                    <p><strong>Apellido Materno:</strong>
                                        {{ $resultado->receta->doctor->apellidoMaterno }}</p>
                                    <p><strong>Cédula Profesional:</strong>
                                        {{ $resultado->receta->doctor->cedulaProfesional }}</p>
                                @else
                                    <p>No hay datos del doctor asociados.</p>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: center;" colspan="2">
                                <p> <strong style="font-size: 20px;">Monto Total:</strong>
                                    ${{ number_format($resultado->monto, 2) }}</p>
                                <p><strong>Facturo:</strong> {{ $resultado->facturo }}</p>
                            </td>
                        </tr>
                    </table>
                    <!-- Doctores -->
                @elseif (request('tipo_reporte') === 'doctores')
                    <table class="report-container">
                        <tr>
                            <th>Folio</th>
                            <td>{{ $resultado->getID() }}</td>
                        </tr>
                        <tr>
                            <th>Nombre Completo</th>
                            <td>{{ $resultado->personal->Nombre }} {{ $resultado->personal->apellido_paterno }}
                                {{ $resultado->personal->apellido_materno }}</td>
                        </tr>
                        <tr>
                            <th>Correo Electrónico</th>
                            <td>{{ $resultado->personal->usuario->email }}</td>
                        </tr>
                        <tr>
                            <th>Cédula Profesional</th>
                            <td>{{ $resultado->cedulaProfesional }}</td>
                        </tr>
                        <tr>
                            <th>Se Registro</th>
                            <td>{{ $resultado->getFecha() }} a las {{ $resultado->getHora() }}</td>
                        </tr>
                        <tr>
                            <th>Firma</th>
                            <td>
                                @if ($resultado->rutafirma)
                                    <img src="{{ public_path($resultado->rutafirma) }}"
                                        alt="Imagen de {{ $resultado->personal->Nombre }}">
                                @else
                                    <img src="ruta_a_imagen_placeholder.jpg" alt="No hay imagen disponible">
                                @endif
                            </td>
                        </tr>
                    </table>
                <!-- Facturas -->
                @elseif (request('tipo_reporte') === 'facturas')
                <table class="report-container">
                    <tr>
                        <th>Folio</th>
                        <td>{{ $resultado->getID() }}</td>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <td>{{ $resultado->nombre }}</td>
                    </tr>
                    <tr>
                        <th>RFC</th>
                        <td>{{ $resultado->rfc }}</td>
                    </tr>
                    <tr>
                        <th>Dirección</th>
                        <td>{{ $resultado->direccion }}</td>
                    </tr>
                    <tr>
                        <th>Teléfono</th>
                        <td>{{ $resultado->telefono }}</td>
                    </tr>
                    <tr>
                        <th>Correo Electrónico</th>
                        <td>{{ $resultado->correo }}</td>
                    </tr>
                    <tr>
                        <th>Monto</th>
                        <td>${{ number_format($resultado->monto, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Estatus</th>
                        <td>{{ ucfirst($resultado->estatus) }}</td>
                    </tr>
                </table>
            @endif




            @empty
                <p class="text-center text-gray-600">No se encontraron resultados para este reporte.</p>
            @endforelse
        </main>
    </div>

    @livewireScripts
</body>

</html>
