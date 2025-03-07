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
                    <p style="font-size: 1.3em; color: #333; ">REPORTE DIARIO DE MEDICAMENTOS</p>
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
            <table>
                @php
                    $totalTurnoMatutino = 0;
                    $propios = [];
                    $noPropios = [];
                    $totalpropios = 0;
                    $totalnoPropios = 0;
                @endphp

                @foreach ($matutino as $registro)
                    @if (is_array($registro->medicamentos))
                        @foreach ($registro->medicamentos as $medicamento)
                            @if (!empty($medicamento['propio']) && filter_var($medicamento['propio'], FILTER_VALIDATE_BOOLEAN))
                                @php
                                    $propios[] = [
                                        'nombre' => $medicamento['nombre'] ?? '',
                                        'cantidad' => $medicamento['cantidad'] ?? 0,
                                        'costo' => $medicamento['costo'] ?? 0,
                                        'hora' => \Carbon\Carbon::parse($registro->created_at)->format('H:i:s'),
                                    ];
                                @endphp
                            @else
                                @php
                                    $noPropios[] = [
                                        'nombre' => $medicamento['nombre'] ?? '',
                                        'cantidad' => $medicamento['cantidad'] ?? 0,
                                        'costo' => $medicamento['costo'] ?? 0,
                                        'hora' => \Carbon\Carbon::parse($registro->created_at)->format('H:i:s'),
                                    ];
                                @endphp
                            @endif
                        @endforeach
                    @endif
                @endforeach

                <thead>
                    <tr>
                        <th class="header" colspan="5">
                            Turno Matutino (7:00 AM - 1:00 PM)
                        </th>
                    </tr>
                    @if ($matutino->isEmpty())
                        <tr>
                            <th class="no-data" colspan="5">No hay registros en este turno.</th>
                        </tr>
                    @else

                </thead>
                <tbody>
                    <tr>
                        <th style="text-align: center;">MEDICAMENTO PROPIOS</th>
                        <th style="text-align: center;">CANTIDAD</th>
                        <th style="text-align: center;">UNIDAD</th>
                        <th style="text-align: center;">PRECIO</th>
                        <th style="text-align: center;">HORA</th>
                    </tr>

                    @for ($i = 0; $i < count($propios); $i++)
                        <tr>
                            <td style="text-align: center;">{{ $propios[$i]['nombre'] ?? '' }}</td>
                            <td style="text-align: center;">{{ $propios[$i]['cantidad'] ?? '' }}</td>
                            <td style="text-align: center;">
                                @isset($propios[$i]['costo'])
                                    ${{ number_format($propios[$i]['costo'], 2, '.', '') }}
                                @endisset
                            </td>
                            <td style="text-align: center;">
                                ${{ number_format(($propios[$i]['costo'] ?? 0) * ($propios[$i]['cantidad'] ?? 1), 2, '.', '') }}
                                @php
                                    $totalpropios += ($propios[$i]['costo'] ?? 0) * ($propios[$i]['cantidad'] ?? '');
                                @endphp
                            </td>

                            <td style="text-align: center;">
                                {{ $propios[$i]['hora'] ?? '' }}
                            </td>
                        </tr>
                    @endfor

                    @if(!$totalpropios <= 0)
                        <tr>
                            <td colspan="3" style="text-align: center; font-weight: 800; font-size: 18px;">Total Propios:</td>
                            <td colspan="2" style="text-align: center; font-weight: 800; font-size: 18px;">
                                ${{ number_format($totalpropios, 2, '.', '') }}
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="5" style="text-align: center; font-size: 12px;">NINGÚN MEDICAMENTO REGISTRADO</td>
                        </tr>
                    @endif

                    <tr>
                        <th style="text-align: center;">MEDICAMENTO NO PROPIOS</th>
                        <th style="text-align: center;">CANTIDAD</th>
                        <th style="text-align: center;">UNIDAD</th>
                        <th style="text-align: center;">PRECIO</th>
                        <th style="text-align: center;">HORA</th>
                    </tr>


                    @for ($i = 0; $i < count($noPropios); $i++)
                        <tr>
                            <td style="text-align: center;">{{ $noPropios[$i]['nombre'] ?? '' }}</td>
                            <td style="text-align: center;">{{ $noPropios[$i]['cantidad'] ?? '' }}</td>
                            <td style="text-align: center;">
                                @isset($noPropios[$i]['costo'])
                                    ${{ number_format($noPropios[$i]['costo'], 2, '.', '') }}
                                @endisset
                            </td>
                            <td style="text-align: center;">
                                ${{ number_format(($noPropios[$i]['costo'] ?? 0) * ($noPropios[$i]['cantidad'] ?? 1), 2, '.', '') }}
                                @php
                                    $totalnoPropios += ($noPropios[$i]['costo'] ?? 0) * ($noPropios[$i]['cantidad'] ?? 1);
                                @endphp
                            </td>

                            <td style="text-align: center;">
                                {{ $noPropios[$i]['hora'] ?? '' }}
                            </td>
                        </tr>
                    @endfor

                    @if(!number_format($totalnoPropios) <= 0)

                            <tr>
                                <td colspan="3" style="text-align: center; font-weight: 800; font-size: 15px;">CRUZ ROJA</td>
                                <td  style="text-align: center; font-weight: 800; font-size: 15px;"> 20%</td>
                                <td style="text-align: center; font-weight: 800; font-size: 18px;">
                                    ${{ number_format($totalnoPropios * 0.20, 2, '.', '') }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: center; font-weight: 800; font-size: 15px;">MEDICOS</td>
                                <td  style="text-align: center; font-weight: 800; font-size: 15px;">80%</td>
                                <td style="text-align: center; font-weight: 800; font-size: 18px;">
                                    ${{ number_format($totalnoPropios * 0.80, 2, '.', '') }}
                                </td>
                            </tr>
                            <tr>

                                <td  colspan="3" style="text-align: center; font-weight: 800; font-size: 18px;">Total No Propios:</td>
                                <td colspan="2" style="text-align: center; font-weight: 800; font-size: 18px;">
                                    ${{ number_format($totalnoPropios, 2, '.', '') }}
                                </td>
                            </tr>

                            @else
                            <tr>
                                <td colspan="5" style="text-align: center; font-size: 12px;">NINGÚN MEDICAMENTO REGISTRADO</td>
                            </tr>
                            @endif

                    <tr>
                        <td style="text-align: center; font-weight: 900; font-size: 20px;" colspan="3">
                            Total:
                        </td>
                        <td style="text-align: center; font-weight: 900; font-size: 20px;"  colspan="2">
                            @php $totalTurnoMatutino += ($totalpropios + $totalnoPropios); @endphp
                            ${{ number_format($totalTurnoMatutino, 2, '.', '') }}
                        </td>
                    </tr>
                    @endif




                </tbody>
            </table>
        </div>

    </div>

    <!-- Turno Vespertino -->
    <div class="turno">
        <div class="content">

            <table>

                @php
                    $totalTurnoVespertino = 0;
                    $propios = [];
                    $noPropios = [];
                    $totalpropios = 0;
                    $totalnoPropios = 0;
                @endphp

                @foreach ($vespertino as $registro)
                    @if (is_array($registro->medicamentos))
                        @foreach ($registro->medicamentos as $medicamento)
                            @if (!empty($medicamento['propio']) && filter_var($medicamento['propio'], FILTER_VALIDATE_BOOLEAN))
                                @php
                                    $propios[] = [
                                        'nombre' => $medicamento['nombre'] ?? '',
                                        'cantidad' => $medicamento['cantidad'] ?? 0,
                                        'costo' => $medicamento['costo'] ?? 0,
                                        'hora' => \Carbon\Carbon::parse($registro->created_at)->format('H:i:s'),
                                    ];
                                @endphp
                            @else
                                @php
                                    $noPropios[] = [
                                        'nombre' => $medicamento['nombre'] ?? '',
                                        'cantidad' => $medicamento['cantidad'] ?? 0,
                                        'costo' => $medicamento['costo'] ?? 0,
                                        'hora' => \Carbon\Carbon::parse($registro->created_at)->format('H:i:s'),
                                    ];
                                @endphp
                            @endif
                        @endforeach
                    @endif
                @endforeach

                <thead>
                    <tr>
                        <th class="header" colspan="5">
                            Turno Vespertino (1:00 AM - 7:00 PM)
                        </th>
                    </tr>
                    @if ($vespertino->isEmpty())
                        <tr>
                            <th class="no-data" colspan="5">No hay registros en este turno.</th>
                        </tr>
                    @else

                </thead>
                <tbody>
                    <tr>
                        <th style="text-align: center;">MEDICAMENTO PROPIOS</th>
                        <th style="text-align: center;">CANTIDAD</th>
                        <th style="text-align: center;">UNIDAD</th>
                        <th style="text-align: center;">PRECIO</th>
                        <th style="text-align: center;">HORA</th>
                    </tr>

                    @for ($i = 0; $i < count($propios); $i++)
                        <tr>
                            <td style="text-align: center;">{{ $propios[$i]['nombre'] ?? '' }}</td>
                            <td style="text-align: center;">{{ $propios[$i]['cantidad'] ?? '' }}</td>
                            <td style="text-align: center;">
                                @isset($propios[$i]['costo'])
                                    ${{ number_format($propios[$i]['costo'], 2, '.', '') }}
                                @endisset
                            </td>
                            <td style="text-align: center;">
                                ${{ number_format(($propios[$i]['costo'] ?? 0) * ($propios[$i]['cantidad'] ?? 1), 2, '.', '') }}
                                @php
                                    $totalpropios += ($propios[$i]['costo'] ?? 0) * ($propios[$i]['cantidad'] ?? '');
                                @endphp
                            </td>

                            <td style="text-align: center;">
                                {{ $propios[$i]['hora'] ?? '' }}
                            </td>
                        </tr>
                    @endfor

                    @if(!$totalpropios <= 0)
                        <tr>
                            <td colspan="3" style="text-align: center; font-weight: 800; font-size: 18px;">Total Propios:</td>
                            <td colspan="2" style="text-align: center; font-weight: 800; font-size: 18px;">
                                ${{ number_format($totalpropios, 2, '.', '') }}
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="5" style="text-align: center; font-size: 12px;">NINGÚN MEDICAMENTO REGISTRADO</td>
                        </tr>
                    @endif

                    <tr>
                        <th style="text-align: center;">MEDICAMENTO NO PROPIOS</th>
                        <th style="text-align: center;">CANTIDAD</th>
                        <th style="text-align: center;">UNIDAD</th>
                        <th style="text-align: center;">PRECIO</th>
                        <th style="text-align: center;">HORA</th>
                    </tr>


                    @for ($i = 0; $i < count($noPropios); $i++)
                        <tr>
                            <td style="text-align: center;">{{ $noPropios[$i]['nombre'] ?? '' }}</td>
                            <td style="text-align: center;">{{ $noPropios[$i]['cantidad'] ?? '' }}</td>
                            <td style="text-align: center;">
                                @isset($noPropios[$i]['costo'])
                                    ${{ number_format($noPropios[$i]['costo'], 2, '.', '') }}
                                @endisset
                            </td>
                            <td style="text-align: center;">
                                ${{ number_format(($noPropios[$i]['costo'] ?? 0) * ($noPropios[$i]['cantidad'] ?? 1), 2, '.', '') }}
                                @php
                                    $totalnoPropios += ($noPropios[$i]['costo'] ?? 0) * ($noPropios[$i]['cantidad'] ?? 1);
                                @endphp
                            </td>

                            <td style="text-align: center;">
                                {{ $noPropios[$i]['hora'] ?? '' }}
                            </td>
                        </tr>
                    @endfor

                    @if(!number_format($totalnoPropios) <= 0)
                        <tr>
                            <td colspan="3" style="text-align: center; font-weight: 800; font-size: 15px;">CRUZ ROJA</td>
                            <td  style="text-align: center; font-weight: 800; font-size: 15px;"> 20%</td>
                            <td style="text-align: center; font-weight: 800; font-size: 18px;">
                                ${{ number_format($totalnoPropios * 0.20, 2, '.', '') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: center; font-weight: 800; font-size: 15px;">MEDICOS</td>
                            <td  style="text-align: center; font-weight: 800; font-size: 15px;">80%</td>
                            <td style="text-align: center; font-weight: 800; font-size: 18px;">
                                ${{ number_format($totalnoPropios * 0.80, 2, '.', '') }}
                            </td>
                        </tr>
                        <tr>
                            <td  colspan="3" style="text-align: center; font-weight: 800; font-size: 18px;">Total No Propios:</td>
                            <td colspan="2" style="text-align: center; font-weight: 800; font-size: 18px;">
                                ${{ number_format($totalnoPropios, 2, '.', '') }}
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="5" style="text-align: center; font-size: 12px;">NINGÚN MEDICAMENTO REGISTRADO</td>
                        </tr>
                    @endif

                    <tr>
                        <td style="text-align: center; font-weight: 900; font-size: 20px;" colspan="3">
                            Total:
                        </td>
                        <td style="text-align: center; font-weight: 900; font-size: 20px;"  colspan="2">
                            @php $totalTurnoVespertino += ($totalpropios + $totalnoPropios); @endphp
                            ${{ number_format($totalTurnoVespertino, 2, '.', '') }}
                        </td>
                    </tr>
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
                    $totalTurnoNocturno = 0;
                    $propios = [];
                    $noPropios = [];
                    $totalpropios = 0;
                    $totalnoPropios = 0;
                @endphp

                @foreach ($nocturno as $registro)
                    @if (is_array($registro->medicamentos))
                        @foreach ($registro->medicamentos as $medicamento)
                            @if (!empty($medicamento['propio']) && filter_var($medicamento['propio'], FILTER_VALIDATE_BOOLEAN))
                                @php
                                    $propios[] = [
                                        'nombre' => $medicamento['nombre'] ?? '',
                                        'cantidad' => $medicamento['cantidad'] ?? 0,
                                        'costo' => $medicamento['costo'] ?? 0,
                                        'hora' => \Carbon\Carbon::parse($registro->created_at)->format('H:i:s'),
                                    ];
                                @endphp
                            @else
                                @php
                                    $noPropios[] = [
                                        'nombre' => $medicamento['nombre'] ?? '',
                                        'cantidad' => $medicamento['cantidad'] ?? 0,
                                        'costo' => $medicamento['costo'] ?? 0,
                                        'hora' => \Carbon\Carbon::parse($registro->created_at)->format('H:i:s'),
                                    ];
                                @endphp
                            @endif
                        @endforeach
                    @endif

                @endforeach

                <thead>
                    <tr>
                        <th class="header" colspan="5">
                            Turno Nocturno (7:00 PM - 7:00 AM)
                        </th>
                    </tr>
                    @if ($nocturno->isEmpty())
                        <tr>
                            <th class="no-data" colspan="5">No hay registros en este turno.</th>
                        </tr>
                    @else

                </thead>
                <tbody>
                    <tr>
                        <th style="text-align: center;">MEDICAMENTO PROPIOS</th>
                        <th style="text-align: center;">CANTIDAD</th>
                        <th style="text-align: center;">UNIDAD</th>
                        <th style="text-align: center;">PRECIO</th>
                        <th style="text-align: center;">HORA</th>
                    </tr>

                    @for ($i = 0; $i < count($propios); $i++)
                        <tr>
                            <td style="text-align: center;">{{ $propios[$i]['nombre'] ?? '' }}</td>
                            <td style="text-align: center;">{{ $propios[$i]['cantidad'] ?? '' }}</td>
                            <td style="text-align: center;">
                                @isset($propios[$i]['costo'])
                                    ${{ number_format($propios[$i]['costo'], 2, '.', '') }}
                                @endisset
                            </td>
                            <td style="text-align: center;">
                                ${{ number_format(($propios[$i]['costo'] ?? 0) * ($propios[$i]['cantidad'] ?? 1), 2, '.', '') }}
                                @php
                                    $totalpropios += ($propios[$i]['costo'] ?? 0) * ($propios[$i]['cantidad'] ?? '');
                                @endphp
                            </td>

                            <td style="text-align: center;">
                                {{ $propios[$i]['hora'] ?? '' }}
                            </td>
                        </tr>
                    @endfor

                    @if(!$totalpropios <= 0)
                        <tr>
                            <td colspan="3" style="text-align: center; font-weight: 800; font-size: 18px;">Total Propios:</td>
                            <td colspan="2" style="text-align: center; font-weight: 800; font-size: 18px;">
                                ${{ number_format($totalpropios, 2, '.', '') }}
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="5" style="text-align: center; font-size: 12px;">NINGÚN MEDICAMENTO REGISTRADO</td>
                        </tr>
                    @endif

                    <tr>
                        <th style="text-align: center;">MEDICAMENTO NO PROPIOS</th>
                        <th style="text-align: center;">CANTIDAD</th>
                        <th style="text-align: center;">UNIDAD</th>
                        <th style="text-align: center;">PRECIO</th>
                        <th style="text-align: center;">HORA</th>
                    </tr>


                    @for ($i = 0; $i < count($noPropios); $i++)
                        <tr>
                            <td style="text-align: center;">{{ $noPropios[$i]['nombre'] ?? '' }}</td>
                            <td style="text-align: center;">{{ $noPropios[$i]['cantidad'] ?? '' }}</td>
                            <td style="text-align: center;">
                                @isset($noPropios[$i]['costo'])
                                    ${{ number_format($noPropios[$i]['costo'], 2, '.', '') }}
                                @endisset
                            </td>
                            <td style="text-align: center;">
                                ${{ number_format(($noPropios[$i]['costo'] ?? 0) * ($noPropios[$i]['cantidad'] ?? 1), 2, '.', '') }}
                                @php
                                    $totalnoPropios += ($noPropios[$i]['costo'] ?? 0) * ($noPropios[$i]['cantidad'] ?? 1);
                                @endphp
                            </td>

                            <td style="text-align: center;">
                                {{ $noPropios[$i]['hora'] ?? '' }}
                            </td>
                        </tr>
                    @endfor

                    @if(!number_format($totalnoPropios) <= 0)
                        <tr>
                            <td colspan="3" style="text-align: center; font-weight: 800; font-size: 15px;">CRUZ ROJA</td>
                            <td  style="text-align: center; font-weight: 800; font-size: 15px;"> 20%</td>
                            <td style="text-align: center; font-weight: 800; font-size: 18px;">
                                ${{ number_format($totalnoPropios * 0.20, 2, '.', '') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: center; font-weight: 800; font-size: 15px;">MEDICOS</td>
                            <td  style="text-align: center; font-weight: 800; font-size: 15px;">80%</td>
                            <td style="text-align: center; font-weight: 800; font-size: 18px;">
                                ${{ number_format($totalnoPropios * 0.80, 2, '.', '') }}
                            </td>
                        </tr>
                        <tr>
                            <td  colspan="3" style="text-align: center; font-weight: 800; font-size: 18px;">Total No Propios:</td>
                            <td colspan="2" style="text-align: center; font-weight: 800; font-size: 18px;">
                                ${{ number_format($totalnoPropios, 2, '.', '') }}
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="5" style="text-align: center; font-size: 12px;">NINGÚN MEDICAMENTO REGISTRADO</td>
                        </tr>
                    @endif

                    <tr>
                        <td style="text-align: center; font-weight: 900; font-size: 20px;" colspan="3">
                            Total:
                        </td>
                        <td style="text-align: center; font-weight: 900; font-size: 20px;"  colspan="2">
                            @php $totalTurnoNocturno += ($totalpropios + $totalnoPropios); @endphp
                            ${{ number_format($totalTurnoNocturno, 2, '.', '') }}
                        </td>
                    </tr>
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
