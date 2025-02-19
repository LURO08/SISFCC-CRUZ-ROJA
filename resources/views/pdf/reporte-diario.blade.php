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
            page-break-inside: avoid;
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
        <table style="border: none; background-color: #fff; width: 100%; border-collapse: collapse; vertical-align: middle; margin: auto;">
            <tr>
                <td style="width: 10%; text-align: left; border: none; background-color: #fff;" rowspan="2">
                    <img src="{{ public_path('img/logo.png') }}" alt="Logo Cruz Roja" style="width: 70px;">
                </td>
                <td rowspan="2" style="width: 90%; text-align: center; border: none; background-color: #fff; ">
                    <p style=" font-size: 1.5em; font-weight: bold; color: #333;">CRUZ ROJA MEXICANA DELEGACIÓN CHILPANCINGO</p>
                    <p style="font-size: 1.3em; color: #333; ">REPORTE DIARIO DETALLADO</p>
                </td>
            </tr>
        </table>
    </div>
    <div class="fecha">
        <table style="width: 100%; border: 0px solid #fff; background-color: #fff;">
            <tr>
                <td style="width: 50%; border: 0px solid #fff; background-color: #fff;"></td>
                <td style="width: 30%; border: 0px solid #fff; background-color: #fff;">
                    <table style="width: 100%;  text-align: center;">
                        <tr>
                            <th colspan="3" style="border: 1px solid black; padding: 5px; text-align: center;">FECHA</th>
                        </tr>
                        <tr>
                            <td id="dia" style="border: 1px solid black; padding: 5px; text-align: center;">DÍA</td>
                            <td id="mes" style="border: 1px solid black; padding: 5px; text-align: center;">MES</td>
                            <td id="año" style="border: 1px solid black; padding: 5px; text-align: center;">AÑO</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px; text-align: center;">{{ \Carbon\Carbon::parse($fecha)->format('d') }}</td>
                            <td style="border: 1px solid black; padding: 5px; text-align: center;">{{ \Carbon\Carbon::parse($fecha)->translatedFormat('F') }}</td>
                            <td style="border: 1px solid black; padding: 5px; text-align: center;">{{ \Carbon\Carbon::parse($fecha)->format('Y') }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    @php
        $totalTurnoMatutino = 0;
        $totalTurnoVespertino = 0;
        $totalTurnoNocturno = 0;
    @endphp

    <!-- Turno Matutino -->
    <div class="turno">
            <div class="content">
                <table >
                    <thead >
                        <tr>
                            <th  class="header" colspan="6">
                                Turno Matutino (7:00 AM - 1:00 PM)
                            </th>
                        </tr>
                        @if ($matutino->isEmpty())
                            <th class="no-data" colspan="6" >No hay registros en este turno.</th>
                        @else
                        <tr >
                            <th style="text-align: center;">Paciente</th>
                            <th style="text-align: center;">Servicios</th>
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
                                            <div>{{ $medicamento['nombre'] }}  </div>
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
                            <td colspan="5" style="text-align: right; font-weight: 800; font-size: 18px;">
                               {{ number_format($totalTurnoMatutino, 2, '.', '') }}
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>


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
            <div class="content">
                <table>
                    <thead>
                        <tr>
                            <th  class="header" colspan="6">
                                Turno Vespertino (1:00 PM - 7:00 PM)
                            </th>
                        </tr>
                        @if ($vespertino->isEmpty())
                            <th class="no-data" colspan="6" >No hay registros en este turno.</th>
                        @else
                        <tr>
                            <th style="text-align: center;">Paciente</th>
                            <th style="text-align: center;">Servicios</th>
                            <th style="text-align: center;">Medicamentos</th>
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
                            $totalTurnoVespertino +=  $registro->monto;
                            @endphp
                        @endforeach

                        <tr>
                            <td style="text-align: center; font-weight: 800; font-size: 18px;">Total:</td>
                            <td colspan="5" style="text-align: right; font-weight: 800; font-size: 18px;">
                               {{ number_format($totalTurnoVespertino, 2, '.', '') }}
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>


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
            <div class="content">
                <table>
                    <thead>
                        <tr>
                            <th  class="header" colspan="6">
                                Turno Nocturno (7:00 PM - 7:00 AM)
                            </th>
                        </tr>
                        @if ($nocturno->isEmpty())
                            <th class="no-data" colspan="6" >No hay registros en este turno.</th>
                        @else
                        <tr>
                            <th style="text-align: center;">Paciente</th>
                            <th style="text-align: center;">Servicios</th>
                            <th style="text-align: center;">Medicamentos</th>
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
                            $totalTurnoNocturno +=  $registro->monto;
                            @endphp
                        @endforeach

                        <tr>
                            <td style="text-align: center; font-weight: 800; font-size: 18px;">Total:</td>
                            <td colspan="5" style="text-align: right; font-weight: 800; font-size: 18px;">
                               ${{ number_format($totalTurnoNocturno, 2, '.', '') }}
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>


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
