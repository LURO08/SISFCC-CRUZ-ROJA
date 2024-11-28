<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Recibo de Cobro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            width: 58mm; /* Ancho típico de ticket */
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
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Cruz Roja Mexicana</h2>
        <h3 style="padding: 0; margin: 0;">Delegación Chilpancingo</h3>
    </div>

    <br>

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

    <!-- Mostrar solo si hay medicamentos -->
    @if (count($medicamentos) > 0)
        <table class="table" style="margin-bottom: 5px; padding-bottom: 0px;">
            <tr>
                <th style="text-align: left;">Medicamento</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
            @php $totalMedicamentos = 0; @endphp
            @foreach ($medicamentos as $medicamento)
                @if ($medicamento->receta_id == $cobro->receta_id)
                    @php
                        $subtotal = $medicamento->cantidad * $medicamento->medicamentos->precio;
                        $totalMedicamentos += $subtotal;
                    @endphp
                    <tr>
                        <td style="text-align: left;">{{ $medicamento->medicamentos->nombre }}</td>
                        <td>{{ $medicamento->cantidad }}</td>
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
                @endif
            @endforeach
                <tr style="margin-bottom: 0px; padding-bottom: 0px;">
                    <td colspan="2" style="text-align: left;"> SubTotal:</td>
                    <td>${{ number_format($totalMedicamentos, 2) }}</td>
                </tr>
        </table>
    @endif
    <div class="separator" style="  margin: 0px 0;"></div>

    <!-- Total a Cobrar -->

        <table class="table" style="padding-top: 0; margin-top: 5px;">
            <tr>
                <td style="text-align: left; font-weight: bold;">Total:</td>
                <td style="text-align: right;">${{ number_format($cobro->monto, 2) }}</td>
            </tr>
        </table>
</body>

</html>
