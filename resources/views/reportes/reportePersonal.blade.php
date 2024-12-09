<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Reporte de Personal</title>

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

        .department-title {
            font-size: 28px;
            font-weight: bold;
            color: #f959de;
            margin-bottom: 20px;
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
            margin-bottom: 10px;
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
        <h1>Reporte de Personal</h1>
        <p>Listado completo del personal y doctores organizados por departamento</p>
    </div>

    <!-- Sección de Departamento -->
    @foreach ($personal->groupBy('Departamento') as $department => $personalsByDept)
        <div class="department-section">
            <h2 class="department-title">{{ $department }}</h2>

            <!-- Listado de Personal y Doctores en Tarjetas -->
            @foreach ($personalsByDept as $personal)
                <div class="card {{ $personal->Cargo == 'doctor' ? 'card-doctor' : '' }}">
                    <div class="card-content">
                        <h2 class="card-title"> {{ $personal->Cargo == 'doctor' ? 'Dr.' : '' }}  {{ $personal->Nombre }} {{ $personal->apellido_paterno }} {{ $personal->apellido_materno }}</h2>
                        <p class="card-details">
                            Edad: {{ $personal->Edad }}<br>
                            Sexo: {{ $personal->Sexo }}<br>
                            Cargo: {{ $personal->Cargo }}<br>
                            Turno: {{ $personal->Turno }}<br>
                            Horario: {{ $personal->Horario }}<br>
                            Telefono: {{ $personal->Telefono }}<br>
                            Dirección: {{ $personal->Direccion }}<br>
                            @if($personal->Cargo == 'doctor')
                                @foreach ($doctores as $doctor )
                                    @if ($doctor->personalid == $personal->id)

                                        CED: {{ $doctor->cedulaProfesional }}
                                    @endif
                                @endforeach
                            @endif
                        </p>
                    </div>


                </div>
            @endforeach
        </div>
    @endforeach
</div>

</body>
</html>
