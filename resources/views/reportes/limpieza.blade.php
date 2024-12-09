<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Reporte de Material de Limpieza</title>

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .report-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .report-header h1 {
            font-size: 32px;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .report-header p {
            font-size: 18px;
            color: #34495e;
        }

        .material-card {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #ecf0f1;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .material-card .info {
            flex: 1;
            padding-right: 20px;
        }

        .material-card img {
            width: 150px;
            height: auto;
            object-fit: cover;
            margin-left: 20px;
            border-radius: 10px;
        }

        .material-card h2 {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .material-card p {
            font-size: 16px;
            color: #7f8c8d;
            margin: 5px 0;
        }

        .material-card p strong {
            color: #2c3e50;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="report-header">
        <h1>Reporte de Material de Limpieza</h1>
        <p>Detalle completo de los materiales de limpieza registrados</p>
    </div>

    <!-- Sección de Material de Limpieza -->
    @foreach ($materialesLimpieza as $material)
        <div class="material-card">
            <div class="info">
                <h2>{{ $material->articulo }}</h2>
                <p><strong>Marca:</strong> {{ $material->marca }}</p>
                <p><strong>Tipo:</strong> {{ $material->tipo }}</p>
                <p><strong>Presentación:</strong> {{ $material->presentacion }}</p>
                <p><strong>Cantidad:</strong> {{ $material->cantidad }}</p>
            </div>
            @if($material->rutaimg)
                <img src="{{ public_path($material->rutaimg) }}" alt="Imagen del Material de Limpieza">
            @endif
        </div>
    @endforeach
</div>

</body>
</html>
