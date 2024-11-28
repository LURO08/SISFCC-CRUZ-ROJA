<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Hola, {{ $data['nombre'] }}</h1>
    <p>{{ $data['mensaje'] }}</p>

    <h2>Detalles del Pedido</h2>
    <p><strong>ID del Pedido:</strong> {{  str_pad( $data['pedido_id'], 4, '0', STR_PAD_LEFT) }}</p>


            <h2>Medicamentos Pedidos</h2>
<table>
    <thead>
        <tr>
            <th>Nombre del Medicamento</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data['medicamentos'] as $medicamentoPedido)
            @foreach ($data['medicamentosAll'] as $medicamento)
                @if ($medicamento->id == $medicamentoPedido['medicamento_id'])
                    <tr>
                        <td>{{ $medicamento->nombre }}</td>
                        <td>{{ $medicamentoPedido['medicamento_cantidad'] }}</td>
                    </tr>
                @endif
            @endforeach
        @endforeach
    </tbody>
</table>
    <p>Gracias por su atención.</p>
</body>
</html>
