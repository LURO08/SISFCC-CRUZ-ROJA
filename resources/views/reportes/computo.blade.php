<!-- resources/views/pdf/equipo_computo.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Reporte de Equipos de Cómputo</title>

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
            margin-bottom: 20px;
        }

        .report-header h1 {
            font-size: 32px;
            color: #2c3e50;
        }

        .report-header p {
            font-size: 18px;
            color: #34495e;
        }

        .computo-section {
            margin-top: 40px;
        }

        .computo-title {
            font-size: 28px;
            font-weight: bold;
            color: #f959de;
            margin-bottom: 20px;
            border-bottom: 2px solid #f959de;
            padding-bottom: 10px;
        }

        .computo-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ecf0f1;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .computo-card:hover {
            transform: translateY(-5px);
        }

        .computo-card .computo-img {
            width: 180px;
            height: auto;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .computo-card .computo-info {
            flex-grow: 1;
            margin-left: 20px;
        }

        .computo-card .computo-info h2 {
            font-size: 22px;
            font-weight: bold;
            color: #2c3e50;
            margin: 0;
        }

        .computo-card .computo-info p {
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
        <h1>Reporte de Equipos de Cómputo</h1>
        <p>Listado completo de equipos de cómputo almacenados</p>
    </div>

    <div class="computo-section">
        <h2 class="computo-title">Equipos de Cómputo Almacenados</h2>

        <!-- Listado de Equipos de Cómputo en Tarjetas -->
        @foreach ($equiposComputo as $equipo)
            <div class="computo-card">
                <div>
                    @if($equipo->rutaimg)
                        <img src="{{ public_path($equipo->rutaimg) }}" alt="Imagen del equipo de cómputo" class="computo-img">
                    @else
                        <p class="no-image">Sin imagen disponible</p>
                    @endif
                </div>

                <div class="computo-info">
                    <h2>{{ $equipo->nombre }}</h2>
                    <p><strong>Cantidad:</strong> {{ $equipo->cantidad }}</p>
                    <p><strong>Estado:</strong> {{ $equipo->estado }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="footer-note">
        <p>Generado por Sistema de Inventario - Cruz Roja Mexicana</p>
    </div>
</div>

</body>
</html>
