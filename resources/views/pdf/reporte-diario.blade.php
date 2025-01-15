<!DOCTYPE html>
<html>
<head>
    <title>Reporte Diario - {{ $fecha }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
            color: #333;
        }
        h1, h2 {
            margin: 10px 0;
            color: #f03636;
        }
        .turno {
            margin-bottom: 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .no-data {
            text-align: center;
            font-style: italic;
            color: gray;
        }
        .firma-container {
            margin-top: 40px;
            text-align: center;
        }
        .firma-line {
            border-top: 1px solid #000;
            width: 300px;
            margin: 0 auto;
            padding-top: 10px;
        }
        .firma-label {
            font-size: 14px;
            color: #333;
        }
        .header {
            font-size: 16px;
            font-weight: bold;
            color: #000;
        }
        .content {
            margin-top: 15px;
        }

        .header {
            text-align: center;
            padding-top: 0px;
            margin-top: 0px;
        }

        .content {
            text-align: left;
            width: 100%;
        }

        .header h2,
        .header p {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="header" style="margin-top: -25px;">
        <table style="border: 0px solid #fff; background-color: #fff;  width: 110%; border-collapse: collapse; vertical-align: middle; margin-left: -10px;">
            <tr>
                <td style="width: 10%; text-align: left; border: 0px solid #fff; background-color: #fff;">
                    <img src="{{ public_path('img/logosvg.png') }}" alt="Logo Cruz Roja" style="width: 60px; height: 50px;">
                </td>
                <td style="width: 100%; text-align: center; display: block; border: 0px solid #fff; background-color: #fff;">
                        <h2 style="margin: 0; font-size: 1.5em; font-weight: bold; color: #333;">Cruz Roja Mexicana</h2>
                        <h3 style="margin: 0; font-size: 1.2em; font-weight: normal; color: #555;">Delegación Chilpancingo</h3>
                </td>
            </tr>
        </table>
    </div>
    <div style="text-align: center; margin-bottom: 20px; display: flex;">
        <h1 style="font-size: 24px; color: #333; margin: 0;">Reporte Diario</h1>
        <p style="font-size: 18px; color: #555; margin: 5px 0;">
            {{ \Carbon\Carbon::parse($fecha)->locale('es')->translatedFormat('l, d \d\e F \d\e Y') }}
        </p>
    </div>

    @php
        $totalTurnoMatutino = 0;
        $totalTurnoVespertino = 0;
        $totalTurnoNocturno = 0;
    @endphp

    <!-- Turno Matutino -->
    <div class="turno">
        <h2 class="header">Turno Matutino (7:00 AM - 1:00 PM)</h2>
        @if ($matutino->isEmpty())
            <p class="no-data">No hay registros en este turno.</p>
        @else
            <div class="content">
                <table >
                    <thead >
                        <tr >
                            <th style="text-align: center;">Paciente</th>
                            <th style="text-align: center;">Servicio</th>
                            <th style="text-align: center;">Medicamentos</th>
                            <th style="text-align: center;">Monto</th>
                            <th style="text-align: center;">Facturación</th>
                            <th style="text-align: center;">Hora</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($matutino as $registro)
                            <tr>
                                <td style="text-align: center;">
                                    {{ $registro->paciente->nombre ?? 'Sin Asignar' }} {{ $registro->paciente->apellidopaterno ?? '' }} {{ $registro->paciente->apellidomaterno ?? '' }}
                                </td>
                                <td style="text-align: center;">
                                    @if(is_array($registro->servicios))
                                        @foreach($registro->servicios as $servicio)
                                            <div>{{ $servicio['nombre'] }}</div>
                                        @endforeach
                                    @else
                                        <div style="text-align: center;">
                                            Sin Servicios
                                        </div>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if(is_array($registro->medicamentos))
                                        @foreach($registro->medicamentos as $medicamento)
                                            <div>{{ $medicamento['nombre'] }}</div>
                                        @endforeach
                                    @else
                                        <div style="text-align: center;">
                                            Sin medicamento
                                        </div>
                                    @endif
                                </td>
                                <td style="text-align: center;">${{ $registro->monto }}</td>
                                <td style="text-align: center;">{{ $registro->facturación ? 'Sí' : 'No' }}</td>
                                <td style="text-align: center;">{{ \Carbon\Carbon::parse($registro->created_at)->format('H:i:s') }}</td>
                            </tr>
                            @php
                            $totalTurnoMatutino +=  $registro->monto;
                            @endphp
                        @endforeach

                        <tr>
                            <td style="text-align: center; font-weight: 800; font-size: 18px;">Total:</td>
                            <td colspan="4" style="text-align: right; font-weight: 800; font-size: 18px;">
                               {{ number_format($totalTurnoMatutino, 2, '.', '') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Firma -->
        <div class="firma-container" style="margin-top: 20px; text-align: center;">
            @if (!empty($matutino->first()->personal))
                <div class="firma-line" style="border-top: 1px solid #000; width: 200px; "></div>
                <div class="firma-label">
                    {{ $matutino->first()->personal->Nombre ?? '' }}
                    {{ $matutino->first()->personal->apellido_paterno ?? '' }}
                    {{ $matutino->first()->personal->apellido_materno ?? '' }}
                </div>
            @else
                <p class="no-data">Firma no disponible.</p>
            @endif
        </div>
    </div>

    <!-- Turno Vespertino -->
    <div class="turno">
        <h2 class="header">Turno Vespertino (1:00 PM - 7:00 PM)</h2>
        @if ($vespertino->isEmpty())
            <p class="no-data">No hay registros en este turno.</p>
        @else
            <div class="content">
                <table>
                    <thead>
                        <tr>
                            <th style="text-align: center;">Paciente</th>
                            <th style="text-align: center;">Servicio</th>
                            <th style="text-align: center;">Monto</th>
                            <th style="text-align: center;">Facturación</th>
                            <th style="text-align: center;">Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vespertino as $registro)
                            <tr>
                                <td style="text-align: center;">
                                    {{ $registro->paciente->nombre ?? 'Sin Asignar' }} {{ $registro->paciente->apellidopaterno ?? '' }} {{ $registro->paciente->apellidomaterno ?? '' }}
                                </td>
                                <td style="text-align: center;">
                                    @if(is_array($registro->servicios))
                                        @foreach($registro->servicios as $servicio)
                                            <div>{{ $servicio['nombre'] }}</div>
                                        @endforeach
                                    @endif
                                </td>
                                <td style="text-align: center;">${{ $registro->monto }}</td>
                                <td style="text-align: center;">{{ $registro->facturación ? 'Sí' : 'No' }}</td>
                                <td style="text-align: center;">{{ \Carbon\Carbon::parse($registro->created_at)->format('H:i:s') }}</td>
                            </tr>
                            @php
                            $totalTurnoVespertino +=  $registro->monto;
                            @endphp
                        @endforeach

                        <tr>
                            <td style="text-align: center; font-weight: 800; font-size: 18px;">Total:</td>
                            <td colspan="4" style="text-align: center; font-weight: 800; font-size: 18px;">
                               {{ number_format($totalTurnoVespertino, 2, '.', '') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Firma -->
        <div class="firma-container" style="margin-top: 20px; text-align: center;">
            @if (!empty($vespertino->first()->personal))
                <div class="firma-line" style="border-top: 1px solid #000; width: 200px; margin: 10px auto;"></div>
                <div class="firma-label">
                    {{ $vespertino->first()->personal->Nombre ?? '' }}
                    {{ $vespertino->first()->personal->apellido_paterno ?? '' }}
                    {{ $vespertino->first()->personal->apellido_materno ?? '' }}
                </div>
            @else
                <p class="no-data">Firma no disponible.</p>
            @endif
        </div>
    </div>

    <!-- Turno Nocturno -->
    <div class="turno">
        <h2 class="header">Turno Nocturno (7:00 PM - 7:00 AM)</h2>
        @if ($nocturno->isEmpty())
            <p class="no-data">No hay registros en este turno.</p>
        @else
            <div class="content">
                <table>
                    <thead>
                        <tr>
                            <th style="text-align: center;">Paciente</th>
                            <th style="text-align: center;">Servicio</th>
                            <th style="text-align: center;">Monto</th>
                            <th style="text-align: center;">Facturación</th>
                            <th style="text-align: center;">Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nocturno as $registro)
                            <tr>
                                <td style="text-align: center;">{{ $registro->paciente->nombre ?? 'Sin Asignar' }} {{ $registro->paciente->apellidopaterno ?? '' }} {{ $registro->paciente->apellidomaterno ?? '' }}</td>
                                <td style="text-align: center;">
                                    @if(is_array($registro->servicios))
                                        @foreach($registro->servicios as $servicio)
                                            <div>{{ $servicio['nombre'] }}</div>
                                        @endforeach
                                    @endif
                                </td>
                                <td style="text-align: center;">${{ $registro->monto }}</td>
                                <td style="text-align: center;">{{ $registro->facturación ? 'Sí' : 'No' }}</td>
                                <td style="text-align: center;">{{ \Carbon\Carbon::parse($registro->created_at)->format('H:i:s') }}</td>
                            </tr>
                            @php
                            $totalTurnoNocturno +=  $registro->monto;
                            @endphp
                        @endforeach

                        <tr>
                            <td style="text-align: center; font-weight: 800; font-size: 18px;">Total:</td>
                            <td colspan="4" style="text-align: right; font-weight: 800; font-size: 18px;">
                               ${{ number_format($totalTurnoNocturno, 2, '.', '') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Firma -->
        <div class="firma-container" style="margin-top: 20px; text-align: center;">
            @if (!empty($nocturno->first()->personal))
                <div class="firma-line" style="border-top: 1px solid #000; width: 200px; margin: 10px auto;"></div>
                <div class="firma-label">
                    {{ $nocturno->first()->personal->Nombre ?? '' }}
                    {{ $nocturno->first()->personal->apellido_paterno ?? '' }}
                    {{ $nocturno->first()->personal->apellido_materno ?? '' }}
                </div>
            @else
                <p class="no-data">Firma no disponible.</p>
            @endif
        </div>
    </div>

    <table   style="font-size: 17px; width: 100%; text-align: center; justify-content: center; background-color: #fff; border: 1px solid #fff;">
        <tbody>
            <tr >
                <th style="text-align: right; background-color: #fff; border: 1px solid #fff;">TOTAL:</th>
                <th style="background-color: #fff; border: 1px solid #fff;" >${{ number_format($totalTurnoMatutino + $totalTurnoVespertino + $totalTurnoNocturno, 2, '.', ',') }}</th>
            </tr>
        </tbody>
    </table>

</body>
</html>
