<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Reporte de Usuarios</title>

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .container {
            width: 90%;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .report-header {
            text-align: center;
            margin-bottom: 10px;
        }

        .report-header h1 {
            font-size: 32px;
            color: #2c3e50;
        }

        .report-header p {
            font-size: 18px;
            color: #34495e;
        }

        .department-title {
            font-size: 28px;
            font-weight: bold;
            color: #f959de;
            margin-bottom: 10px;
            border-bottom: 2px solid #f959de;
            padding-bottom: 10px;
        }

        .card {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            background-color: #ecf0f1;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-doctor {
            background-color: #dff9fb;
            border-left: 4px solid #f959de;
        }

        .card-content {
            flex-grow: 1;
        }

        .card-title {
            font-size: 22px;
            font-weight: bold;
            color: #2c3e50;
            margin: 0;
        }

        .card-details {
            margin-top: 8px;
            font-size: 16px;
            color: #7f8c8d;
        }

        .footer-note {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #7f8c8d;
        }

        .footer-note strong {
            color: #2c3e50;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="report-header">
        <h1>Reporte de Usuarios</h1>
        <p>Listado completo de los Usuarios</p>
    </div>

        <div class="department-section">
            <h2 class="department-title">Usuarios</h2>
            <!-- Listado de usuarios en Tarjetas -->
            @foreach ($usuarios as $usuario)
                <div class="card">
                    <div class="card-content">
                        <h2 class="card-title"> {{ $usuario->name}}</h2>
                        <p class="card-details">
                            Correo: {{ $usuario->email }}<br>
                            Rol: {{  $usuario->roles->pluck('name')->first() }}<br>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
</div>

</body>
</html>
