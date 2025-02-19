<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Recibo de Cobro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            padding-top: 0px;
            margin-top: 0px;


        }

        .content {
            text-align: left;
        }

        .header h2,
        .header p {
            margin: 0;
            padding: 0;
        }

        .content-item {
            display: flex;
            justify-content: space-between;
            margin: 4px 0;
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
            width: 100%;
            margin: 10px 0;
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
            margin: 10px 0;
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
            <tr>
                <td style="text-align: left;">
                    <strong>Paciente:</strong>
                </td>
                <td style="text-align: right;">{{ $receta->paciente->nombre }} {{ $receta->paciente->apellidopaterno }} {{ $receta->paciente->apellidomaterno }}</td>
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

    <table class="table">
        <tr>
            <th style="text-align: left;">Servicio</th>
            <th>Costo</th>
        </tr>
        <tr>
            <td style="text-align: left;">
                {{ $cobro->Servicio->nombre }}
            </td>
            <td>
                ${{ number_format($totalServicio, 2) }}
            </td>
        </tr>
    </table>
    <!-- Separador antes de medicamentos -->
    <div class="separator" ></div>

    <table class="table" style="margin-bottom: 5px; padding-bottom: 0px;">
        <tr>
            <th style="text-align: left;">Nombre</th>
            <th>Cantidad</th>
            <th>Und</th>
            <th>Total</th>
        </tr>
        @php $totalMedicamentos = 0;  $totalMaterial = 0; @endphp
        <!-- Mostrar solo si hay medicamentos -->
        @if (count($medicamentos) > 0)


                @foreach ($medicamentos as $medicamento)
                    @if ($medicamento->receta_id == $cobro->receta_id)
                        @php
                            $subtotal = $medicamento->cantidad * $medicamento->medicamento->precio;
                            $totalMedicamentos += $subtotal;
                        @endphp
                        <tr>
                            <td style="text-align: left;">{{ $medicamento->medicamento->nombre }}</td>
                            <td>{{ $medicamento->cantidad }}</td>
                            <td>${{ $medicamento->medicamento->precio }}</td>
                            <td>${{ number_format($subtotal, 2) }}</td>
                        </tr>
                    @endif
                @endforeach

        @endif

    @foreach ($receta->material as $material )
        @if (!empty($material))
            @foreach ($inventarioMedico as $materialMedico)

                    @if ($material['nombre'] === $materialMedico->nombre)
                        @php
                            $subtotalMaterial =
                            $material['cantidad'] *
                            $materialMedico->precio;
                            $totalMaterial += $subtotalMaterial;
                        @endphp

                        <tr>
                            <td style="text-align: left;">
                                {{$material['nombre']}}
                            </td>
                            <td style="text-align: center;">
                                {{number_format($material['cantidad'])}}
                            </td>
                            <td style="text-align: center;">
                                $ {{number_format($materialMedico->precio)}}
                            </td style="text-align: center;">
                            <td>  ${{ number_format($material['cantidad'] * $materialMedico->precio)}}</td>
                        </tr>
                    @endif

            @endforeach
        @else
                <tr>
                    <th style="text-align: center;">
                        Ningún Material Utilizado
                    </th>
                </tr>
        @endif
    @endforeach
        <tr>
            <td colspan="3" style="text-align: left;">SubTotal:</td>
            <td>${{$totalMaterial+$totalMedicamentos}}</td>
        </tr>
    </table>
    </div>

    <div class="separator" style="  margin: 0px 0;"></div>

    <!-- Total a Cobrar -->

        <table class="table" style="padding-top: 0; margin-top: 5px;">
            <tr>
                <td style="text-align: left; font-weight: bold;">Total:</td>
                <td style="text-align: right; font-weight: 800; font-size: 13px;">${{ number_format($cobro->monto, 2) }}</td>
            </tr>
        </table>
</body>

</html>
