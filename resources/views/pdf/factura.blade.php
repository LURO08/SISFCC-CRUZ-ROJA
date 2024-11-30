<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .header {
            background-color: #ca3030;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .header h3 {
            margin: 0;
        }
        .content {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 10px;
        }
        .content div {
            font-size: 14px;
        }
        .content div strong {
            color: #2c3e50;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .total {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            text-align: right;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            text-align: center;
            color: #aaa;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="title">Solicitud de Factura</div>

    <!-- Información general de la solicitud -->
    <div class="header">
        <h3>Datos de la Solicitud de Factura</h3>
    </div>

    <div class="content">
        <div><strong>Folio:</strong> {{ $solicitud->getID() }}</div>
        <div><strong>RFC:</strong> {{ $solicitud->rfc }}</div>
        <div><strong>Dirección:</strong> {{ $solicitud->direccion }}</div>
        <div><strong>Teléfono:</strong> {{ $solicitud->telefono }}</div>
        <div><strong>Correo:</strong> {{ $solicitud->correo }}</div>
        <div><strong>Estatus:</strong> {{ ucfirst($solicitud->estatus) }}</div>
        <div><strong>Servicio:</strong> {{ $solicitud->cobro->Servicio->nombre }}</div>
        <div><strong>Servicio Costo:</strong> ${{ number_format($solicitud->cobro->Servicio->costo, 2) }}</div>
        <div><strong>Fecha de Solicitud:</strong> {{ $solicitud->created_at->format('d/m/Y H:i') }}</div>
    </div>

    <!-- Información del Paciente -->
    <div class="header">
        <h3>Datos del Paciente</h3>
    </div>
    <div class="content">
        <div><strong>Paciente:</strong> {{ $solicitud->cobro->paciente->nombre }} {{ $solicitud->cobro->paciente->apellidopaterno }} {{ $solicitud->cobro->paciente->apellidomaterno }}</div>
        <div><strong>Edad:</strong> {{ $solicitud->cobro->paciente->edad }} años</div>
        <div><strong>Sexo:</strong> {{ $solicitud->cobro->paciente->sexo }}</div>
        <div><strong>Tipo de Sangre:</strong> {{ $solicitud->cobro->paciente->tipo_sangre }}</div>
    </div>

    <!-- Información de la Receta Médica -->
    <div class="header">
        <h3>Receta Médica</h3>
    </div>
    <div class="content">
        <p><strong>Doctor:</strong> {{ $solicitud->cobro->receta->doctor->personal->Nombre }} {{ $solicitud->cobro->receta->doctor->personal->apellido_paterno }}</p>
        <p><strong>Diagnóstico:</strong> {{ $solicitud->cobro->receta->diagnostico }}</p>
        <p><strong>Tratamiento:</strong> {{ $solicitud->cobro->receta->tratamiento }}</p>

        <!-- Medicamentos Surtidos -->
        <h4>Medicamentos Surtidos:</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Medicamento</th>
                    <th>Cantidad</th>
                    <th>Dosis</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($solicitud->cobro->receta->medicamentos as $medicamento)
                    <tr>
                        <td>{{ $medicamento->medicamento->nombre }}</td>
                        <td>{{ $medicamento->cantidad }}</td>
                        <td>{{ $medicamento->medicamento->dosis ?? 'N/A' }} {{ $medicamento->medicamento->medida ?? 'N/A' }}</td>
                        <td>${{ number_format($medicamento->medicamento->precio ?? 0, 2) }}</td>
                        <td>${{ number_format(($medicamento->cantidad ?? 0) * ($medicamento->medicamento->precio ?? 0), 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="total">
            <strong>Total Medicamentos:</strong> ${{ number_format($solicitud->preciototal, 2) }}
        </div>
    </div>

    <!-- Monto Total de la Solicitud -->
    <div class="total">
        <strong>Monto Total:</strong> ${{ number_format($solicitud->monto, 2) }}
    </div>
</div>

<div class="footer">
    <p>Cruz Roja Mexicana Delegación Chilpancingo</p>
</div>

</body>
</html>
