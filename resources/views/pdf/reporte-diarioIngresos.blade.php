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
                    <p style="font-size: 1.3em; color: #333; ">REPORTE DIARIO DE INGRESOS</p>
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

<div>
    <!-- TURNO MATUTINO -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td colspan="2" style="text-align: center; font-weight: bold; border-bottom: 1px solid #000;">TURNO MATUTINO</td>
            <td style="text-align: center; font-weight: bold; border-bottom: 1px solid #000;">TOTAL</td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold; text-align:center;">CAJERO</td>
            <td>
                @if (!empty($matutino->first()->personal))
                    <div class="firma-label" style="text-align: center;">
                        {{ $matutino->first()->personal->Nombre ?? '' }}
                        {{ $matutino->first()->personal->apellido_paterno ?? '' }}
                        {{ $matutino->first()->personal->apellido_materno ?? '' }}
                    </div>
                @else
                    <p class="no-data" style="text-align: center; color: red; font-style: italic;">Personal no disponible.</p>
                @endif
            </td>
            <td style="text-align: center;">
                @php
                    $totalTurnoMatutino = 0;
                    foreach ($matutino as $registro) {
                        $totalTurnoMatutino += $registro->monto;
                    }
                @endphp
                {{ number_format($totalTurnoMatutino, 2, '.', '') }}
            </td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold; text-align:center;">FIRMA</td>
            <td colspan="2" style="text-align: center; border-top: 1px solid #000;"></td>
        </tr>
    </table>

    <br>

    <!-- TURNO VESPERTINO -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td colspan="2" style="text-align: center; font-weight: bold; border-bottom: 1px solid #000;">TURNO VESPERTINO</td>
            <td style="text-align: center; font-weight: bold; border-bottom: 1px solid #000;">TOTAL</td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold; text-align:center;">CAJERO</td>
            <td>
                @if (!empty($vespertino->first()->personal))
                    <div class="firma-label" style="text-align: center;">
                        {{ $vespertino->first()->personal->Nombre ?? '' }}
                        {{ $vespertino->first()->personal->apellido_paterno ?? '' }}
                        {{ $vespertino->first()->personal->apellido_materno ?? '' }}
                    </div>
                @else
                    <p class="no-data" style="text-align: center; color: red; font-style: italic;">Personal no disponible.</p>
                @endif
            </td>
            <td style="text-align: center;">
                @php
                    $totalTurnoVespertino = 0;
                    foreach ($vespertino as $registro) {
                        $totalTurnoVespertino += $registro->monto;
                    }
                @endphp
                {{ number_format($totalTurnoVespertino, 2, '.', '') }}
            </td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold; text-align:center;">FIRMA</td>
            <td colspan="2" style="text-align: center; border-top: 1px solid #000;"></td>
        </tr>
    </table>

    <br>

    <!-- TURNO NOCTURNO -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td colspan="2" style="text-align: center; font-weight: bold; border-bottom: 1px solid #000;">TURNO NOCTURNO</td>
            <td style="text-align: center; font-weight: bold; border-bottom: 1px solid #000;">TOTAL</td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold; text-align:center;">CAJERO</td>
            <td>
                @if (!empty($nocturno->first()->personal))
                    <div class="firma-label" style="text-align: center;">
                        {{ $nocturno->first()->personal->Nombre ?? '' }}
                        {{ $nocturno->first()->personal->apellido_paterno ?? '' }}
                        {{ $nocturno->first()->personal->apellido_materno ?? '' }}
                    </div>
                @else
                    <p class="no-data" style="text-align: center; color: red; font-style: italic;">Personal no disponible.</p>
                @endif
            </td>
            <td style="text-align: center;">
                @php
                    $totalTurnoNocturno = 0;
                    foreach ($nocturno as $registro) {
                        $totalTurnoNocturno += $registro->monto;
                    }
                @endphp
                {{ number_format($totalTurnoNocturno, 2, '.', '') }}
            </td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold; text-align:center;">FIRMA</td>
            <td colspan="2" style="text-align: center; border-top: 1px solid #000;"></td>
        </tr>
    </table>
</div>

<table style="font-size: 17px; width: 100%; text-align: center; background-color: #fff; border-collapse: collapse; margin: auto;">
    <tbody>
        <tr>
            <th style="text-align: center; background-color: #fff; padding: 10px;">TOTAL DEL DÍA:</th>
            <th style="text-align: center; background-color: #fff;  padding: 10px;">
                ${{ number_format($totalTurnoMatutino + $totalTurnoVespertino + $totalTurnoNocturno, 2, '.', ',') }}
            </th>
        </tr>
    </tbody>
</table>

<table style="font-size: 17px; width: 100%; text-align: center; border: 0px solid #fff; background-color: #fff; margin: auto; margin-top: 100px;">
    <tbody>
        <tr>
            <th style="text-align: center; border: 0px solid #fff; background-color: #fff;">
                <div class="firma-line" style="border-top: 1px solid #000; width: 200px; "></div>
                REVISO
            </th>
        </tr>
    </tbody>
</table>








</body>
</html>
