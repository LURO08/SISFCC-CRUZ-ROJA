<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Recibo de Cobro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0 0px;
            padding: 0;
            /* width: 60mm; */
            /* margin-left: -10px; */
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

        .content-item {
            display: flex;
            justify-content: space-between;
            margin: 0 0;
            font-size: 12px;
        }

        .content-item span {
            font-size: 12px;
        }

        .total {
            font-weight: bold;
            border-top: 1px dashed #000;
            padding-top: 5px;
            margin-top: 5px;
        }

        .medicamento-item {
            margin-bottom: 5px;
            padding: 5px;
            border-bottom: 1px solid #ddd;
        }

        .medicamento-item p {
            margin: 2px 0;
            font-size: 12px;
        }

        .total-final {
            font-weight: bold;
            font-size: 14px;
            padding-top: 8px;
            text-align: center;
        }

        .table {
            width: 105%;
            margin: 10px -10px;
            border-spacing: 0;
        }

        .table td,
        .table th {
            padding: 4px 0;
            text-align: center;
            font-size: 12px;
        }

        .table th {
            font-weight: bold;
        }

        .separator {
            border-top: 1px dashed #000;
            margin: 10px -10px;
            width: 105%;
        }
    </style>
</head>

<body>
    <div class="header" style="margin-top: -25px;">
        <table style="width: 110%; border-collapse: collapse; vertical-align: middle; margin-left: -10px;">
            <tr>
                <td style="width: 10%; text-align: left;">
                    <img src="{{ public_path('img/logosvg.png') }}" alt="Logo Cruz Roja" style="width: 60px; height: 50px;">
                </td>
                <td style="width: 100%; text-align: center;">
                    <h2 style="margin: 0; font-size: 1.3em;">Cruz Roja Mexicana</h2>
                    <h3 style="margin: 0; font-size: 1.1em;">Delegación Chilpancingo</h3>
                </td>
            </tr>

        </table>
    </div>

    <div class="content-item">
        <table class="table">
            <tr style="width: 100%;  text-align: center; justify-content: center;">
                <td style="text-align: left;">
                    <strong>FOLIO:</strong>

                </td>
                <td style="text-align: right;">{{ str_pad($cobro->id, 4, '0', STR_PAD_LEFT) }}</td>
            </tr>
            <tr>
                <td style="text-align: left; white-space: nowrap;">
                    <strong>Paciente:</strong>
                </td>
                <td style="text-align: right; overflow: hidden; text-overflow: ellipsis;">
                    {{ $cobro->paciente->nombre ?? null }} {{ $cobro->paciente->apellidopaterno ?? null }} {{ $cobro->paciente->apellidomaterno ?? null }}
                </td>
            </tr>

            <tr>
                <td style="text-align: left;">
                    <strong>Fecha:</strong>
                </td>
                <td style="text-align: right;"> {{ $cobro->created_at->format('d/m/Y H:i') }}</td>
            </tr>
        </table>
    </div>

    <div class="separator"></div>

    @php
        $totalMedicamentos = 0;
        $totalServicios = 0;
    @endphp

<div style="width: 100%; margin-bottom: 20px;">
    {{-- Servicios --}}
    <table class="table" style="margin-bottom: 10px; width: 105%; border-collapse: collapse;">
        <thead>
            <tr >
                <th style="text-align: left;" colspan="3">Servicio</th>
                <th style="text-align: center;">Costo</th>
            </tr>
        </thead>
        <tbody>
            @if (count($servicios) > 0)
                @foreach ($servicios as $servicio)
                    @if (!empty($servicio))
                        @php
                            $subtotalServicio = $servicio['costo'];
                            $totalServicios += $subtotalServicio;
                        @endphp
                        <tr>
                            <td colspan="3" style="text-align: left; ">
                                {{ $servicio['nombre'] }}
                            </td>
                            <td style="text-align: right; padding: 5px;">
                                $ {{ number_format($servicio['costo'], 1, '.', '') }}
                            </td>
                        </tr>
                    @endif
                @endforeach

            @else
                <tr>
                    <td colspan="4" style="text-align: center; padding: 10px;">Ningún Servicio Utilizado</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="separator"></div>

    {{-- Medicamentos --}}
    <table class="table" style="margin-bottom: 10px; width: 105%; border-collapse: collapse;">
        <thead>
            <tr >
                <th style="text-align: left;">Nombre</th>
                <th style="text-align: center;">Cant</th>
                <th style="text-align: center; ">Und</th>
                <th style="text-align: center;">Total</th>
            </tr>
        </thead>
        <tbody>
            @if (count($listamedicamentos) > 0)
                @foreach ($listamedicamentos as $medicamento)
                    @if (!empty($medicamento))
                        @php
                            $subtotalMedicamento = $medicamento['costo'] * $medicamento['cantidad'];
                            $totalMedicamentos += $subtotalMedicamento;
                        @endphp
                        <tr>
                            <td style="text-align: left;">
                                {{ $medicamento['nombre'] }}
                            </td>
                            <td style="text-align: center; padding: 0 5px; ">
                                {{ number_format($medicamento['cantidad'], 0, '', '') }}
                            </td>
                            <td style="text-align: left; padding: 0 5px;">
                                $ {{ number_format($medicamento['costo'], 1, '.', '') }}
                            </td>
                            <td style="text-align: left; padding: 0 5px;">
                                $ {{ number_format($subtotalMedicamento, 1, '.', '') }}
                            </td>
                        </tr>
                    @endif
                @endforeach
            @else
                <tr>
                    <td colspan="5" style="text-align: center; padding: 10px;">Ningún Medicamento Utilizado</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>


    <div class="separator"></div>

    <!-- Total a Cobrar -->

        <table class="table" style="padding-top: 0; margin-top: 5px;">
            <tr>
                <td style="text-align: left; font-weight: bold;">Total:</td>
                <td style="text-align: right; font-weight: 800; font-size: 13px;">${{ number_format($cobro->monto, 2) }}</td>
            </tr>
        </table>
</body>

</html>
