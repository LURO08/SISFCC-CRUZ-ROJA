<!DOCTYPE html><html>

<head>
    <title>Reporte Diario - {{ $fecha }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
            color: #333;
        }

        h1,
        h2 {
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

            /* page-break-inside: avoid; */
        }

        th,
        td {
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
        <table
            style="border: none; background-color: #fff; width: 100%; border-collapse: collapse; vertical-align: middle; margin: auto;">
            <tr>
                <td style="width: 10%; text-align: left; border: none; background-color: #fff;" rowspan="2">
                    <img src="{{ public_path('img/logo.png') }}" alt="Logo Cruz Roja" style="width: 70px;">
                </td>
                <td rowspan="2" style="width: 90%; text-align: center; border: none; background-color: #fff; ">
                    <p style=" font-size: 1.5em; font-weight: bold; color: #333;">CRUZ ROJA MEXICANA DELEGACIÓN
                        CHILPANCINGO</p>
                    <p style="font-size: 1.3em; color: #333; ">REPORTE DIARIO DE SERVICIOS</p>
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
        $compartidosValidos = ['aplicación', 'certificado', 'curación', 'sutura', 'inyección'];
    @endphp

    <!-- Turno Matutino -->
    <div class="turno">
        <div class="content">
            @php
                $compartidos = [];
                $noCompartidos = [];
                $totalcompartidos = 0;
                $totalnocompartidos = 0;
            @endphp
            <table>
                <thead>
                    <tr>
                        <th class="header" colspan="3">Turno Matutino (7:00 AM - 2:00 PM)</th>
                    </tr>
                    @if ($matutino->isEmpty())
                        <tr>
                            <th class="no-data" colspan="3">No hay registros en este turno.</th>
                        </tr>
                    @endif
                </thead>
                <tbody>
                    @foreach ($matutino as $registro)
                        @if (is_array($registro->servicios))
                            @foreach ($registro->servicios as $servicio)
                                @php
                                    $nombre = strtolower($servicio['nombre'] ?? '');
                                    $costo = $servicio['costo'] ?? 0;
                                    $hora = \Carbon\Carbon::parse($registro->created_at)->format('H:i:s');
                                    $servicioData = compact('nombre', 'costo', 'hora');

                                    $esCompartido = collect($compartidosValidos)->contains(fn($buscado) => strpos($nombre, $buscado) !== false);

                                    if ($esCompartido) {
                                        $compartidos[] = $servicioData;
                                        $totalcompartidos += $costo;
                                    } else {
                                        $noCompartidos[] = $servicioData;
                                        $totalnocompartidos += $costo;
                                    }
                                @endphp
                            @endforeach
                        @endif
                    @endforeach

                    @if (!$matutino->isEmpty())
                        <tr>
                            <th style="text-align: center;">SERVICIOS COMPARTIDOS</th>
                            <th style="text-align: center;">PRECIO</th>
                            <th style="text-align: center;">HORA</th>
                        </tr>

                        @foreach ($compartidos as $servicio)
                            <tr>
                                <td style="text-align: center;">{{ ucfirst($servicio['nombre']) }}</td>
                                <td style="text-align: center;">${{ number_format($servicio['costo'], 2, '.', '') }}</td>
                                <td style="text-align: center;">{{ $servicio['hora'] }}</td>
                            </tr>
                        @endforeach
                        @if(!number_format($totalcompartidos) <= 0)
                            <tr>
                                <td style="text-align: center; font-weight: 800; font-size: 15px;">CRUZ ROJA</td>
                                <td  style="text-align: center; font-weight: 800; font-size: 15px;"> 60%</td>
                                <td style="text-align: center; font-weight: 800; font-size: 18px;">
                                    ${{ number_format($totalcompartidos * 0.60, 2, '.', '') }}
                                </td>
                            </tr>
                            <tr>
                                <td  style="text-align: center; font-weight: 800; font-size: 15px;">MEDICOS</td>
                                <td  style="text-align: center; font-weight: 800; font-size: 15px;">40%</td>
                                <td style="text-align: center; font-weight: 800; font-size: 18px;">
                                    ${{ number_format($totalcompartidos * 0.40, 2, '.', '') }}
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" style="text-align: center; font-weight: 800; font-size: 15px;">
                                    TOTAL COMPARTIDOS:

                                </td>
                                <td style="text-align: center; font-weight: 800; font-size: 18px;">
                                    <div style="width: 80%; margin: 0 auto; border-top: 2px solid;"></div>
                                    ${{ number_format($totalcompartidos, 2, '.', '') }}
                                </td>
                            </tr>
                        @else
                        <tr>
                            <td style="text-align: center;  font-size: 12px;" colspan="3">NINGÚN SERVICIO REGISTRADO</td>
                        </tr>
                        @endif





                        <tr>
                            <th style="text-align: center;">SERVICIOS NO COMPARTIDOS</th>
                            <th style="text-align: center;">PRECIO</th>
                            <th style="text-align: center;">HORA</th>
                        </tr>

                        @foreach ($noCompartidos as $servicio)
                            <tr>
                                <td style="text-align: center;">{{ ucfirst($servicio['nombre']) }}</td>
                                <td style="text-align: center;">${{ number_format($servicio['costo'], 2, '.', '') }}</td>
                                <td style="text-align: center;">{{ $servicio['hora'] }}</td>
                            </tr>
                        @endforeach

                        @if(!number_format($totalnocompartidos) <= 0)
                        <tr>
                            <td colspan="2" style="text-align: center; font-weight: 800; font-size: 15px;">TOTAL NO COMPARIDAS:</td>
                            <td style="text-align: center; font-weight: 800; font-size: 18px;">
                                ${{ number_format($totalnocompartidos, 2, '.', '') }}
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" style="text-align: center; font-weight: 900; font-size: 18px;">
                                TOTAL:
                            </td>
                            <td style="text-align: center; font-weight: 900; font-size: 20px;">
                                @php $totalTurnoMatutino += $totalcompartidos + $totalnocompartidos; @endphp
                                ${{ number_format($totalTurnoMatutino, 2, '.', '') }}
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td style="text-align: center;  font-size: 12px;" colspan="3">NINGÚN SERVICIO REGISTRADO</td>
                        </tr>
                        @endif
                    @endif
                </tbody>
            </table>
        </div>
    </div>


    <!-- Turno Vespertino -->
    <div class="turno">
        <div class="content">
            @php
                $compartidos = [];
                $noCompartidos = [];
                $totalcompartidos = 0;
                $totalnocompartidos = 0;
            @endphp
            <table>

                <thead>
                    <tr>
                        <th class="header" colspan="3">Turno Vespertino (1:00 PM - 7:00 PM)</th>
                    </tr>
                    @if ($vespertino->isEmpty())
                        <tr>
                            <th class="no-data" colspan="3">No hay registros en este turno.</th>
                        </tr>
                    @endif
                </thead>
                <tbody>

                    @foreach ($vespertino as $registro)
                        @if (is_array($registro->servicios))
                            @foreach ($registro->servicios as $servicio)
                                @php
                                    $nombre = strtolower($servicio['nombre'] ?? '');
                                    $costo = $servicio['costo'] ?? 0;
                                    $hora = \Carbon\Carbon::parse($registro->created_at)->format('H:i:s');
                                    $servicioData = compact('nombre', 'costo', 'hora');

                                    $esCompartido = collect($compartidosValidos)->contains(fn($buscado) => strpos($nombre, $buscado) !== false);

                                    if ($esCompartido) {
                                        $compartidos[] = $servicioData;
                                        $totalcompartidos += $costo;
                                    } else {
                                        $noCompartidos[] = $servicioData;
                                        $totalnocompartidos += $costo;
                                    }
                                @endphp
                            @endforeach
                        @endif
                    @endforeach

                    @if (!$vespertino->isEmpty())
                        <tr>
                            <th style="text-align: center;">SERVICIOS COMPARTIDOS</th>
                            <th style="text-align: center;">PRECIO</th>
                            <th style="text-align: center;">HORA</th>
                        </tr>

                        @foreach ($compartidos as $servicio)
                            <tr>
                                <td style="text-align: center;">{{ ucfirst($servicio['nombre']) }}</td>
                                <td style="text-align: center;">${{ number_format($servicio['costo'], 2, '.', '') }}</td>
                                <td style="text-align: center;">{{ $servicio['hora'] }}</td>
                            </tr>
                        @endforeach

                        @if(!number_format($totalcompartidos) <= 0)

                        <tr>
                            <td style="text-align: center; font-weight: 800; font-size: 15px;">CRUZ ROJA</td>
                            <td  style="text-align: center; font-weight: 800; font-size: 15px;"> 60%</td>
                            <td style="text-align: center; font-weight: 800; font-size: 18px;">
                                ${{ number_format($totalcompartidos * 0.60, 2, '.', '') }}
                            </td>
                        </tr>
                        <tr>
                            <td  style="text-align: center; font-weight: 800; font-size: 15px;">MEDICOS</td>
                            <td  style="text-align: center; font-weight: 800; font-size: 15px;">40%</td>
                            <td style="text-align: center; font-weight: 800; font-size: 18px;">
                                ${{ number_format($totalcompartidos * 0.40, 2, '.', '') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center; font-weight: 800; font-size: 15px;">
                                TOTAL COMPARTIDOS:

                            </td>
                            <td style="text-align: center; font-weight: 800; font-size: 18px;">
                                <div style="width: 80%; margin: 0 auto; border-top: 2px solid;"></div>
                                ${{ number_format($totalcompartidos, 2, '.', '') }}
                            </td>
                        </tr>

                    @else
                        <tr>
                            <td style="text-align: center;  font-size: 12px;" colspan="3">NINGÚN SERVICIO REGISTRADO</td>
                        </tr>
                    @endif

                        <tr>
                            <th style="text-align: center;">SERVICIOS NO COMPARTIDOS</th>
                            <th style="text-align: center;">PRECIO</th>
                            <th style="text-align: center;">HORA</th>
                        </tr>

                        @foreach ($noCompartidos as $servicio)
                            <tr>
                                <td style="text-align: center;">{{ ucfirst($servicio['nombre']) }}</td>
                                <td style="text-align: center;">${{ number_format($servicio['costo'], 2, '.', '') }}</td>
                                <td style="text-align: center;">{{ $servicio['hora'] }}</td>
                            </tr>
                        @endforeach

                        @if(!number_format($totalnocompartidos) <= 0)
                        <tr>
                            <td colspan="2" style="text-align: center; font-weight: 800; font-size: 15px;">TOTAL NO COMPARIDAS:</td>
                            <td style="text-align: center; font-weight: 800; font-size: 18px;">
                                ${{ number_format($totalnocompartidos, 2, '.', '') }}
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" style="text-align: center; font-weight: 900; font-size: 18px;">
                                TOTAL:
                            </td>
                            <td style="text-align: center; font-weight: 900; font-size: 20px;">
                                @php $totalTurnoVespertino += $totalcompartidos + $totalnocompartidos; @endphp
                                ${{ number_format($totalTurnoVespertino, 2, '.', '') }}
                            </td>
                        </tr>

                        @else
                        <tr>
                            <td style="text-align: center;  font-size: 12px;" colspan="3">NINGÚN SERVICIO REGISTRADO</td>
                        </tr>
                        @endif
                    @endif
                </tbody>
            </table>
        </div>
    </div>


    <!-- Turno Nocturno -->
    <div class="turno">
        <div class="content">
            <table>
                @php
                    $compartidos = [];
                    $nocompartidos = [];
                    $totalcompartidos = 0;
                    $totalnocompartidos = 0;
                @endphp


                <thead>
                    <tr>
                        <th class="header" colspan="3">
                            Turno Nocturno (7:00 PM - 7:00 AM)
                        </th>
                    </tr>
                    @if ($nocturno->isEmpty())
                        <tr>
                            <th class="no-data" colspan="3">No hay registros en este turno.</th>
                        </tr>
                    @endif
                </thead>
                <tbody>
                    @foreach ($nocturno as $registro)
                        @if (is_array($registro->servicios))
                            @foreach ($registro->servicios as $servicio)
                                @php
                                    $nombre = strtolower($servicio['nombre'] ?? '');
                                    $costo = $servicio['costo'] ?? 0;
                                    $hora = \Carbon\Carbon::parse($registro->created_at)->format('H:i:s');
                                    $servicioData = compact('nombre', 'costo', 'hora');

                                    $esCompartido = collect($compartidosValidos)->contains(fn($buscado) => strpos($nombre, $buscado) !== false);

                                    if ($esCompartido) {
                                        $compartidos[] = $servicioData;
                                        $totalcompartidos += $costo;
                                    } else {
                                        $noCompartidos[] = $servicioData;
                                        $totalnocompartidos += $costo;
                                    }
                                @endphp
                            @endforeach
                        @endif
                    @endforeach

                    @if (!$nocturno->isEmpty())
                        <tr>
                            <th style="text-align: center;">SERVICIOS COMPARTIDOS</th>
                            <th style="text-align: center;">PRECIO</th>
                            <th style="text-align: center;">HORA</th>
                        </tr>

                        @foreach ($compartidos as $servicio)
                            <tr>
                                <td style="text-align: center;">{{ ucfirst($servicio['nombre']) }}</td>
                                <td style="text-align: center;">${{ number_format($servicio['costo'], 2, '.', '') }}</td>
                                <td style="text-align: center;">{{ $servicio['hora'] }}</td>
                            </tr>
                        @endforeach

                        @if(!number_format($totalcompartidos) <= 0)

                            <tr>
                                <td style="text-align: center; font-weight: 800; font-size: 15px;">CRUZ ROJA</td>
                                <td  style="text-align: center; font-weight: 800; font-size: 15px;"> 60%</td>
                                <td style="text-align: center; font-weight: 800; font-size: 18px;">
                                    ${{ number_format($totalcompartidos * 0.60, 2, '.', '') }}
                                </td>
                            </tr>
                            <tr>
                                <td  style="text-align: center; font-weight: 800; font-size: 15px;">MEDICOS</td>
                                <td  style="text-align: center; font-weight: 800; font-size: 15px;">40%</td>
                                <td style="text-align: center; font-weight: 800; font-size: 18px;">
                                    ${{ number_format($totalcompartidos * 0.40, 2, '.', '') }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center; font-weight: 800; font-size: 15px;">
                                    TOTAL COMPARTIDOS:

                                </td>
                                <td style="text-align: center; font-weight: 800; font-size: 18px;">
                                    <div style="width: 80%; margin: 0 auto; border-top: 2px solid;"></div>
                                    ${{ number_format($totalcompartidos, 2, '.', '') }}
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td style="text-align: center;  font-size: 12px;" colspan="3">NINGÚN SERVICIO REGISTRADO</td>
                            </tr>
                        @endif
                        <tr>
                            <th style="text-align: center;">SERVICIOS NO COMPARTIDOS</th>
                            <th style="text-align: center;">PRECIO</th>
                            <th style="text-align: center;">HORA</th>
                        </tr>

                        @foreach ($noCompartidos as $servicio)
                            <tr>
                                <td style="text-align: center;">{{ ucfirst($servicio['nombre']) }}</td>
                                <td style="text-align: center;">${{ number_format($servicio['costo'], 2, '.', '') }}</td>
                                <td style="text-align: center;">{{ $servicio['hora'] }}</td>
                            </tr>
                        @endforeach

                        @if(!number_format($totalnocompartidos) <= 0)

                            <tr>
                                <td colspan="2" style="text-align: center; font-weight: 800; font-size: 15px;">TOTAL NO COMPARIDAS:</td>
                                <td style="text-align: center; font-weight: 800; font-size: 18px;">
                                    ${{ number_format($totalnocompartidos, 2, '.', '') }}
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" style="text-align: center; font-weight: 900; font-size: 18px;">
                                    TOTAL:
                                </td>
                                <td style="text-align: center; font-weight: 900; font-size: 20px;">
                                    @php $totalTurnoNocturno += $totalcompartidos + $totalnocompartidos; @endphp
                                    ${{ number_format($totalTurnoNocturno, 2, '.', '') }}
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td style="text-align: center;  font-size: 12px;" colspan="3">NINGÚN SERVICIO REGISTRADO</td>
                            </tr>
                        @endif
                    @endif

                </tbody>
            </table>
        </div>
    </div>

    <table
        style="font-size: 17px; width: 100%; text-align: center; justify-content: center; background-color: #fff; border: 1px solid #fff;">
        <tbody>
            <tr>
                <th style="text-align: right; background-color: #fff; border: 1px solid #fff;">TOTAL:</th>
                <th style="background-color: #fff; border: 1px solid #fff;">
                    ${{ number_format($totalTurnoMatutino + $totalTurnoVespertino + $totalTurnoNocturno, 2, '.', ',') }}
                </th>
            </tr>
        </tbody>
    </table>

</body>

</html>
