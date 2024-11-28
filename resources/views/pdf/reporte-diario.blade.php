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
            margin-top: 5px;
            color: #333;
        }
        .header {
            font-size: 16px;
            font-weight: bold;
            color: #f03636;
        }
        .content {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <h1>Reporte Diario - {{ $fecha }}</h1>

    <!-- Turno Matutino -->
    <div class="turno">
        <h2 class="header">Turno Matutino (7:00 AM - 1:00 PM)</h2>
        @if ($matutino->isEmpty())
            <p class="no-data">No hay registros en este turno.</p>
        @else
            <div class="content">
                <table>
                    <thead>
                        <tr>
                            <th>Paciente</th>
                            <th>Servicio</th>
                            <th>Monto</th>
                            <th>Facturación</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matutino as $registro)
                            <tr>
                                <td>{{ $registro->paciente->nombre }} {{ $registro->paciente->apellidopaterno }} {{ $registro->paciente->apellidomaterno }}</td>
                                <td>{{ $registro->Servicio->nombre }}</td>
                                <td>${{ $registro->monto }}</td>
                                <td>{{ $registro->facturación ? 'Sí' : 'No' }}</td>
                                <td>{{ \Carbon\Carbon::parse($registro->created_at)->format('H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="firma-container">
            <div class="firma-label">Firma del Responsable:</div>
            <div class="firma-line"></div>
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
                            <th>Paciente</th>
                            <th>Servicio</th>
                            <th>Monto</th>
                            <th>Facturación</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vespertino as $registro)
                            <tr>
                                <td>{{ $registro->paciente->nombre }} {{ $registro->paciente->apellidopaterno }} {{ $registro->paciente->apellidomaterno }}</td>
                                <td>{{ $registro->Servicio->nombre }}</td>
                                <td>${{ $registro->monto }}</td>
                                <td>{{ $registro->facturación ? 'Sí' : 'No' }}</td>
                                <td>{{ \Carbon\Carbon::parse($registro->created_at)->format('H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="firma-container">
            <div class="firma-label">Firma del Responsable:</div>
            <div class="firma-line"></div>
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
                            <th>Paciente</th>
                            <th>Servicio</th>
                            <th>Monto</th>
                            <th>Facturación</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nocturno as $registro)
                            <tr>
                                <td>{{ $registro->paciente->nombre }} {{ $registro->paciente->apellidopaterno }} {{ $registro->paciente->apellidomaterno }}</td>
                                <td>{{ $registro->Servicio->nombre }}</td>
                                <td>${{ $registro->monto }}</td>
                                <td>{{ $registro->facturación ? 'Sí' : 'No' }}</td>
                                <td>{{ \Carbon\Carbon::parse($registro->created_at)->format('H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="firma-container">
            <div class="firma-label">Firma del Responsable:</div>
            <div class="firma-line"></div>
        </div>
    </div>
</body>
</html>
