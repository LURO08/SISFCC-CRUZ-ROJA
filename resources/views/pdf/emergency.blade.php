<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'socorros') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Styles -->
    @livewireStyles
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: -30px;
        padding: 0;
    }
    .container {
            margin: 0;
            padding: 0;
        }

    .header {
        padding: 0;
        margin: 0;
        align-items: center;
        justify-content: center;
        position: relative;
        /* Necesario para el pseudo-elemento */
    }
</style>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">

        <!-- Page Content -->
        <main>
            <div class="header">
                <table style="border-collapse: collapse; width: 100%; padding: 0; margin: 0;">
                    <tr style="padding: 0; margin-bottom: 0;">
                        <td rowspan="2" style="vertical-align: top;">
                            <img src="{{ public_path('img/logosvg.png') }}" alt="Logo Cruz Roja" width="40"
                                height="60">
                        </td>
                        <td style="margin-right: 10px;">
                            <h2 style="margin: 0; font-size: 14px;">CRUZ ROJA MEXICANA</h2>
                        </td>
                        <td>
                            <p style="font-size: 12px;">REGISTRO DE ATENCIÓN PREHOSPITALARIA</p>
                        </td>
                        <td>
                            <p style="margin: 0; font-size: 12px; ">FOLIO:
                                <span
                                    style="border-bottom: 1px solid; display: inline-block; width:50%; text-align: center;">{{ $phase1->id }}</span>
                        </td>
                    </tr>
                    <tr style="padding: 0; margin: 0; padding-top: 0%; margin-top: 0%; justify-content: space-between;">
                        <td>
                            <p style="margin: 0; font-size: 14px;">ESTADO:
                                <span
                                    style="border-bottom: 1px solid; display: inline-block; padding: 0 10px; font-size: 14px;">Guerrero</span>
                            </p>
                        </td>
                        <td>
                            <p style="margin: 0; font-size: 14px;">DELEGACIÓN:
                                <span
                                    style="border-bottom: 1px solid; display: inline-block; padding: 0 10px;  font-size: 14px;">Chilpancingo</span>
                            </p>
                        </td>
                        <td>
                            <p style="margin: 0; font-size: 14px;">ASIGNACIÓN:
                                <span
                                    style="border-bottom: 1px solid; display: inline-block; padding: 0 10px; font-size: 14px;">Central</span>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="container">
                <!-- Main Table for Phase 1 -->
                {{-- LADO DERECHO --}}
                <div style="border: 1px solid; padding: 5px;  width: 48%; float: right;">
                    <table class="table table-bordered" style=" border-collapse: collapse;  ">
                        <thead>
                            <tr>
                                <td colspan="2"
                                    style=" font-size: 12px; text-align: center; padding: 5px; font-weight: bold; border-bottom: 1px solid; ">
                                    VIII EVALUACIÓN INICIAL
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="font-size: 10px; text-align: left;">
                                <!-- Primera Celda: NIVEL DE CONCIENCIA -->
                                <td style="padding: 5px; border-bottom: 1px solid #ccc;">
                                    <div style="display: flex; justify-content: space-between;">
                                        <span>NIVEL DE CONCIENCIA:</span>
                                        <span style="border-bottom: 1px solid #000; flex-grow: 1;">
                                            {{$phase7->nivel_conciencia ?? 'No disponible'}}
                                        </span>
                                    </div>

                                    <div style="display: flex; justify-content: space-between;">
                                        <span>VIA AÉREA:</span>
                                        <span style="border-bottom: 1px solid #000; flex-grow: 1;">
                                            {{$phase7->viaaerea ?? 'No disponible'}}
                                        </span>
                                    </div>
                                    <div style="display: flex; justify-content: space-between;">
                                        <span>REFLEJO DE DEGLUCIÓN:</span>
                                        <span style="border-bottom: 1px solid #000; flex-grow: 1;">
                                            {{$phase7->reflejo_deglucion ?? 'No disponible'}}
                                        </span>
                                    </div>

                                </td>

                                <!-- Segunda Celda: VIA AÉREA -->
                                <td style="padding: 5px; border-bottom: 1px solid #ccc; ">
                                    <span style="font-size: 9px;">VENTILACIÓN</span>
                                    <div style="border: 1px solid; padding: 0 2px;  width: 100%; ">
                                        <div style="display: flex; align-items: center;font-size: 10px;">
                                            <!-- Etiqueta: OBSERVACIÓN -->
                                            <span style="flex: 0 0 auto; white-space: nowrap; margin-right: 10px;">
                                                OBSERVACIÓN:
                                            </span>
                                            <!-- Línea con el valor -->
                                            <span style="flex: 1; border-bottom: 1px solid #000; padding-bottom: 2px;">
                                                {{$phase7->ventilacion_observacion ?? 'No disponible'}}
                                            </span>
                                        </div>


                                        <div style="display: flex; justify-content: space-between;">
                                            <span>AUSCULTACIÓN:</span>
                                            <span style="border-bottom: 1px solid #000; flex-grow: 1; ">
                                                {{$phase7->ventilacion_auscultacion ?? 'No disponible'}}
                                            </span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between;">
                                            <span>HEMITÓRAX:</span>
                                            <span style=" width: 100%; border-bottom: 1px solid #000; flex-grow: 1; ">
                                                {{$phase7->ventilacion_hemitorax ?? 'No disponible'}}
                                            </span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between;">
                                            <span>SITIO:</span>
                                            <span style="border-bottom: 1px solid #000; flex-grow: 1; ">
                                                {{$phase7->ventilacion_sitio ?? 'No disponible'}}
                                            </span>
                                        </div>

                                    </div>

                                </td>
                            </tr>
                            <span style="font-size: 10px;" >CIRCULACIÓN</span>
                            <tr style="font-size: 10px; text-align: left; border: 1px solid; margin-bottom: 15px;">

                                <td style="padding: 5px; " >
                                    <div>
                                        <div style="display: flex; justify-content: space-between;">
                                            <span> PRESENNCIA DE PULSOS:</span>
                                            <span style="border-bottom: 1px solid #000; flex-grow: 1;">
                                                {{$phase7->circulacion_pulsos ?? 'No disponible'}}
                                            </span>
                                        </div>

                                        <div style="display: flex; justify-content: space-between;">
                                            <span>CALIDAD:</span>
                                            <span style="border-bottom: 1px solid #000; flex-grow: 1; ">
                                                {{$phase7->circulacion_calidad ?? 'No disponible'}}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div style="display: flex; justify-content: space-between;">
                                        <span>PIEL:</span>
                                        <span style=" width: 100%; border-bottom: 1px solid #000; flex-grow: 1; ">
                                            {{$phase7->circulacion_piel	 ?? 'No disponible'}}
                                        </span>
                                    </div>
                                    <div style="display: flex; justify-content: space-between;">
                                        <span>CARACTERISTICAS:</span>
                                        <span style="border-bottom: 1px solid #000; flex-grow: 1; ">
                                            {{$phase7->circulacion_caracteristicas ?? 'No disponible'}}
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                 {{-- LADO IZQUIERDO --}}
                <div style="border: 1px solid; padding: 0 5px; width: 48%; ">
                    <table class="table table-bordered" style=" border-collapse: collapse; ">
                        <thead>
                            <tr>
                                <td
                                    style=" font-size: 12px; text-align: center; padding: 5px; font-weight: bold; border-bottom: 1px solid; ">
                                    II DATOS DE SERVICIO
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <!-- Fecha y Día -->
                                    <div style="width: 100%; margin-bottom: 10px; margin-top: 10px; ">
                                        <div style=" float: left;">
                                            <div>
                                                <span style="font-size: 10px;">FECHA: </span>
                                                <span
                                                    style=" font-size: 12px; border-bottom: 1px solid; display: inline-block; width: 20px; text-align: center;">
                                                    {{ $phase1->created_at->format('d') }}
                                                </span>
                                                /
                                                <span
                                                    style=" font-size: 12px;border-bottom: 1px solid; display: inline-block; width: 20px; text-align: center;">
                                                    {{ $phase1->created_at->format('m') }}
                                                </span>
                                                /
                                                <span
                                                    style=" font-size: 12px; border-bottom: 1px solid; display: inline-block; width: 40px; text-align: center;">
                                                    {{ $phase1->created_at->format('Y') }}
                                                </span>
                                                <div style="margin-left: 40px; padding: 0; margin-top: -5px;">
                                                    <span style="font-size: 10px; margin: 0 5px;">DÍA</span>
                                                    <span style="font-size: 10px; margin: 0 5px; ">MES</span>
                                                    <span
                                                        style="font-size: 10px; margin: 0 5px; margin-left: 10px;">AÑO</span>
                                                </div>
                                            </div>


                                        </div>
                                        <div style="float: right; text-align: right;">
                                            <span style="font-size: 10px;">DÍA DE LA SEMANA: </span>
                                            <span
                                                style=" font-size: 12px; border-bottom: 1px solid; display: inline-block; width: 80px; text-align: center;">
                                                {{ $phase1->created_at->translatedFormat('l') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div style="clear: both;"></div>

                                    <!-- Tabla de Cronometría -->
                                    @if (!is_null($phase1->hora_llamada) || !is_null($phase1->hora_despacho) ||
                                        !is_null($phase1->hora_arribo) || !is_null($phase1->hora_traslado) ||
                                        !is_null($phase1->hora_hospital) || !is_null($phase1->hora_disponible))
                                        <table border="1"
                                            style="width: 100%; text-align: center; border-collapse: collapse; margin-bottom: 10px;">
                                            <thead>
                                                <tr>
                                                    <th colspan="6" style="font-size: 10px;">CRONOMETRÍA</th>
                                                </tr>
                                                <tr style="font-size: 10px;">
                                                    <th>HORA LLAMADA</th>
                                                    <th>HORA DESPACHO</th>
                                                    <th>HORA ARRIBO</th>
                                                    <th>HORA TRASLADO</th>
                                                    <th>HORA HOSPITAL</th>
                                                    <th>HORA DISPONIBLE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="font-size: 12px;">
                                                    <td>
                                                        @if($phase1->hora_llamada)
                                                            {{ date('h:i', strtotime($phase1->hora_llamada)) }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($phase1->hora_despacho)
                                                            {{ date('h:i', strtotime($phase1->hora_despacho)) }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($phase1->hora_arribo)
                                                            {{ date('h:i', strtotime($phase1->hora_arribo)) }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($phase1->hora_traslado)
                                                            {{ date('h:i', strtotime($phase1->hora_traslado)) }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($phase1->hora_hospital)
                                                            {{ date('h:i', strtotime($phase1->hora_hospital)) }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($phase1->hora_disponible)
                                                            {{ date('h:i', strtotime($phase1->hora_disponible)) }}
                                                        @endif
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    @endif
                                    <!-- Tabla de Motivo de Atención -->
                                    @if (!$phase1->motivo_atencion == null)
                                        <table border="1"
                                            style="width: 100%; text-align: center; border-collapse: collapse; font-size: 10px;">
                                            <thead>
                                                <tr>
                                                    <th colspan="6" style="padding: 5px;">MOTIVO DE LA ATENCIÓN</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1 @if ($phase1->motivo_atencion == 1)
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>ENFERMEDAD</td>
                                                    <td>2 @if ($phase1->motivo_atencion == 2)
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>TRAUMATISMO</td>
                                                    <td>3 @if ($phase1->motivo_atencion == 3)
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>GINECOOBSTÉTRICO</td>
                                                </tr>
                                                <tr>
                                                    <td>4 @if ($phase1->motivo_atencion == 4)
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>TRASLADO</td>
                                                    <td>5 @if ($phase1->motivo_atencion == 5)
                                                            X
                                                        @endif
                                                    </td>
                                                    <td colspan="3">SERV. ESPECIAL</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endif
                                    <!-- Tabla de Lugar de Ocurrencia -->
                                    @if (!$phase1->lugar_ocurrencia == null)
                                        <p style="font-size: 10px; font-weight: 700;">LUGAR DE OCURRENCIA:</p>
                                        <table
                                            style="width: 100%; margin-top: 10px; text-align: left; border-collapse: collapse; font-size: 10px;">
                                            <tbody>

                                                <tr style="font-size: 8px;">

                                                    <td>
                                                        <div style="display: flex; flex-wrap: wrap;">
                                                            <label style="flex: 1 1 45%; margin-bottom: 5px;">
                                                                <input type="checkbox"
                                                                    {{ $phase1->lugar_ocurrencia == 'hogar' ? 'checked' : '' }}>
                                                                HOGAR
                                                            </label>
                                                            <label style="flex: 1 1 45%; margin-bottom: 5px;">
                                                                <input type="checkbox"
                                                                    {{ $phase1->lugar_ocurrencia == 'via_publica' ? 'checked' : '' }}>
                                                                VÍA PÚBLICA
                                                            </label>
                                                            <label style="flex: 1 1 45%; margin-bottom: 5px;">
                                                                <input type="checkbox"
                                                                    {{ $phase1->lugar_ocurrencia == 'trabajo' ? 'checked' : '' }}>
                                                                TRABAJO
                                                            </label>
                                                            <label style="flex: 1 1 45%; margin-bottom: 5px;">
                                                                <input type="checkbox"
                                                                    {{ $phase1->lugar_ocurrencia == 'escuela' ? 'checked' : '' }}>
                                                                ESCUELA
                                                            </label>
                                                            <label style="flex: 1 1 45%; margin-bottom: 5px;">
                                                                <input type="checkbox"
                                                                    {{ $phase1->lugar_ocurrencia == 'recreacion' ? 'checked' : '' }}>
                                                                RECREACIÓN Y DEPORTE
                                                            </label>
                                                            <label style="flex: 1 1 100%; margin-bottom: 5px;">
                                                                <input type="checkbox"
                                                                    {{ $phase1->lugar_ocurrencia == 'transportepublico' ? 'checked' : '' }}>
                                                                TRANSPORTE PÚBLICO
                                                            </label>
                                                            <label style="flex: 1 1 100%; margin-bottom: 5px;">
                                                                <input type="checkbox"
                                                                    {{ $phase1->lugar_ocurrencia == 'otra' ? 'checked' : '' }}>
                                                                OTRA:
                                                                <span
                                                                    style="border-bottom: 1px solid; display: inline-block; width: 100px;">
                                                                    {{ $phase1->otro_lugar ?? '' }}
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <br>
                {{-- LADO DERECHO --}}
                <div style="border: 1px solid; padding: 5px;  width: 48%; float: right;">
                    <table class="table table-bordered" style=" border-collapse: collapse;  ">
                        <thead>
                            <tr>
                                <td colspan="2"
                                    style=" font-size: 12px; text-align: center; padding: 5px; font-weight: bold; border-bottom: 1px solid; ">
                                    VIII EVALUACIÓN SECUNDARIA
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="font-size: 10px; text-align: left;">
                                <!-- Primera Celda: NIVEL DE CONCIENCIA -->
                                <td style="width: 50%;">
                                     <!-- Exploración Física -->
                                     <div  >
                                        <h6 class="font-extrabold text-center">Exploración Física</h5>
                                        <div>
                                            <table class="table-auto border-collapse w-full" >
                                                <thead>
                                                    <tr >
                                                        <th style="border-bottom: 1px solid;" class="border border-gray-500 px-2 py-1">N°
                                                        </th>
                                                        <th style="border-bottom: 1px solid;" class="border border-gray-500 px-2 py-1">
                                                            Descripción</th>
                                                        <th style="border-bottom: 1px solid;" class="border border-gray-500 px-2 py-1">
                                                            Abreviatura</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="border: 1px solid;">
                                                    @php
                                                        $exploracionFisica = json_decode($phase8->exploracion_fisica, true);
                                                    @endphp
                                                    <tr>
                                                        <td class="border border-gray-500 px-2 py-1 text-center">
                                                            1</td>
                                                        <td class="border border-gray-500 px-2 py-1">
                                                            Deformidades</td>
                                                        <td class="border border-gray-500 px-2 py-1">D
                                                            @if (is_array($exploracionFisica))
                                                                @foreach ($exploracionFisica as $exploracion)
                                                                    @if ($exploracion === 'deformidades')
                                                                        X
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                           </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-500 px-2 py-1 text-center">
                                                            2</td>

                                                        <td class="border border-gray-500 px-2 py-1">
                                                            Contusiones</td>
                                                        <td class="border border-gray-500 px-2 py-1">CD
                                                            @if (is_array($exploracionFisica))
                                                                @foreach ($exploracionFisica as $exploracion)
                                                                    @if ($exploracion === 'contusiones')
                                                                        X
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-500 px-2 py-1 text-center">
                                                            3</td>

                                                        <td class="border border-gray-500 px-2 py-1">
                                                            Abrasiones</td>
                                                        <td class="border border-gray-500 px-2 py-1">A
                                                            @if (is_array($exploracionFisica))
                                                                @foreach ($exploracionFisica as $exploracion)
                                                                    @if ($exploracion === 'abrasiones')
                                                                        X
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-500 px-2 py-1 text-center">
                                                            4</td>

                                                        <td class="border border-gray-500 px-2 py-1">
                                                            Penetraciones</td>
                                                        <td class="border border-gray-500 px-2 py-1">P
                                                            @if (is_array($exploracionFisica))
                                                                @foreach ($exploracionFisica as $exploracion)
                                                                    @if ($exploracion === 'penetraciones')
                                                                        X
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-500 px-2 py-1 text-center">
                                                            5</td>

                                                        <td class="border border-gray-500 px-2 py-1">
                                                            Movimiento Paradójico</td>
                                                        <td class="border border-gray-500 px-2 py-1">MP
                                                            @if (is_array($exploracionFisica))
                                                            @foreach ($exploracionFisica as $exploracion)
                                                                @if ($exploracion === 'movimiento_paradójico')
                                                                    X
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-500 px-2 py-1 text-center">
                                                            6</td>

                                                        <td class="border border-gray-500 px-2 py-1">
                                                            Crepitación</td>
                                                        <td class="border border-gray-500 px-2 py-1">C</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-500 px-2 py-1 text-center">
                                                            7</td>

                                                        <td class="border border-gray-500 px-2 py-1">
                                                            Heridas</td>
                                                        <td class="border border-gray-500 px-2 py-1">H</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-500 px-2 py-1 text-center">
                                                            8</td>

                                                        <td class="border border-gray-500 px-2 py-1">
                                                            Fracturas</td>
                                                        <td class="border border-gray-500 px-2 py-1">F
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-500 px-2 py-1 text-center">
                                                            9</td>

                                                        <td class="border border-gray-500 px-2 py-1">
                                                            Enfisema Subcutáneo</td>
                                                        <td class="border border-gray-500 px-2 py-1">ES
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-500 px-2 py-1 text-center">
                                                            10</td>

                                                        <td class="border border-gray-500 px-2 py-1">
                                                            Quemaduras</td>
                                                        <td class="border border-gray-500 px-2 py-1">Q
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-500 px-2 py-1 text-center">
                                                            11</td>

                                                        <td class="border border-gray-500 px-2 py-1">
                                                            Laceraciones</td>
                                                        <td class="border border-gray-500 px-2 py-1">L
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-500 px-2 py-1 text-center">
                                                            12</td>

                                                        <td class="border border-gray-500 px-2 py-1">Edema
                                                        </td>
                                                        <td class="border border-gray-500 px-2 py-1">E
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-500 px-2 py-1 text-center">
                                                            13</td>

                                                        <td class="border border-gray-500 px-2 py-1">
                                                            Alteración de Sensibilidad</td>
                                                        <td class="border border-gray-500 px-2 py-1">AS
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-500 px-2 py-1 text-center">
                                                            14</td>

                                                        <td class="border border-gray-500 px-2 py-1">
                                                            Alteración de Movilidad</td>
                                                        <td class="border border-gray-500 px-2 py-1">AM
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-500 px-2 py-1 text-center">
                                                            15</td>

                                                        <td class="border border-gray-500 px-2 py-1">Dolor
                                                        </td>
                                                        <td class="border border-gray-500 px-2 py-1">DO
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-500 px-2 py-1 text-center">
                                                            16</td>

                                                        <td class="border border-gray-500 px-2 py-1">
                                                            Amputación</td>
                                                        <td class="border border-gray-500 px-2 py-1">AP
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <h6>Pupilas</h6>

                                        <table style="
                                             width: 80%;
                                             border-collapse: collapse;
                                             text-align: center;
                                             margin: 20px auto;
                                             background-color: #f9f9f9;
                                             box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                                             border-radius: 10px;
                                             overflow: hidden;
                                         ">
                                             <thead>
                                                 <tr style="background-color: #eaeaea;">
                                                     <th style="border-bottom: 2px solid #000; padding: 15px; font-weight: bold;">
                                                         Imagen
                                                     </th>
                                                     <th style="border-bottom: 2px solid #000; padding: 15px; font-weight: bold;">
                                                         Seleccionar
                                                     </th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <tr >
                                                     <td style="padding: 5px 15px; text-align: center; vertical-align: middle;">
                                                         <img src="{{ asset('images/recursos/ojos2.jpg') }}" width="150" alt="Ojos 1" style="border-radius: 8px; display: block; margin: 0 auto;">
                                                     </td>
                                                     <td style="padding: 0 15px; vertical-align: middle;">
                                                         <label for="ojos1">
                                                             <input type="radio" name="ojos" id="ojos1" value="1">
                                                         </label>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td style="padding: 5px 15px; text-align: center; vertical-align: middle;">
                                                         <img src="{{ asset('images/recursos/ojos5.jpg') }}" width="150" alt="Ojos 2" style="border-radius: 8px; display: block; margin: 0 auto;">
                                                     </td>
                                                     <td style="padding: 0 15px; vertical-align: middle;">
                                                         <label for="ojos2">
                                                             <input type="radio" name="ojos" id="ojos2" value="2">
                                                         </label>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td style="padding: 5px 15px; text-align: center; vertical-align: middle;">
                                                         <img src="{{ asset('images/recursos/ojos4.jpg') }}" width="150" alt="Ojos 3" style="border-radius: 8px; display: block; margin: 0 auto;">
                                                     </td>
                                                     <td style="padding: 0 15px; vertical-align: middle;">
                                                         <label for="ojos3">
                                                             <input type="radio" name="ojos" id="ojos3" value="3">
                                                         </label>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td style="padding: 5px 15px; text-align: center; vertical-align: middle;">
                                                         <img src="{{ asset('images/recursos/dilatados.jpg') }}" width="150" alt="Ojos 4" style="border-radius: 8px; display: block; margin: 0 auto;">
                                                     </td>
                                                     <td style="padding:0 15px; vertical-align: middle;">
                                                         <label for="ojos4">
                                                             <input type="radio" name="ojos" id="ojos4" value="4">
                                                         </label>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td style="padding: 5px 15px; text-align: center; vertical-align: middle;">
                                                         <img src="{{ asset('images/recursos/ojos3.jpg') }}" width="150" alt="Ojos 5" style="border-radius: 8px; display: block; margin: 0 auto;">
                                                     </td>
                                                     <td style="padding: 0 15px; vertical-align: middle;">
                                                         <label for="ojos5">
                                                             <input type="radio" name="ojos" id="ojos5" value="5">
                                                         </label>
                                                     </td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                    </div>

                                </td>

                                <td>
                                     {{-- ZONAS DE LESIÓN --}}
                                     <div style="width: 80%;">
                                        <h5>
                                            Zonas de Lesión
                                        </h5>
                                        <p>Haz clic en la imagen del cuerpo humano para marcar las zonas de
                                            lesión:</p>

                                        <div style="display: none;">
                                            <input type="text" id="coordinate" name="coordinate">
                                            <input type="text" id="zonaslabel" name="zonaslabel">
                                        </div>

                                        <!-- Canvas para la imagen del cuerpo humano -->
                                        <div class="flex justify-center">
                                            <canvas id="bodyCanvas" width="400" height="405"
                                                class="border"></canvas>
                                        </div>

                                        <!-- Lista de puntos marcados -->
                                        <div id="zonasMarcadas" class="mt-4 text-center"
                                            style="height: 20vh; overflow-y: auto;">
                                            <h6 class="font-bold">Zonas Marcadas:</h6>
                                            <ul id="listaZonas" class="list-disc inline-block text-left"></ul>
                                        </div>
                                    </div>
                                </td>


                        </tbody>
                    </table>
                </div>

                <div style="margin-top: 2px; width: 49.2%;">
                    @if (!is_null($phase2->ambulance_id) || !is_null($phase2->chofer_id) ||
                        !is_null($phase2->paramedico_id) || !is_null($phase2->helicoptero_id))
                        <div style=" width: 100%;  float: left; border: 1px solid;">
                            <table class="table table-bordered"
                                style="font-size: 10px;  width: 100%; margin: 0 auto; padding: 5px;">
                                <tr>
                                    <td colspan="2"
                                        style=" font-size: 12px; text-align: center; padding: 5px; font-weight: bold; border-bottom: 1px solid; ">
                                        III CONTROL
                                    </td>
                                </tr>
                                <tr>
                                    <th style="text-align: left;">AMBULANCIA:</th>
                                    <td style="border: 1px solid; text-align: center;">
                                        {{ $phase2->Ambulance->placa ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align: left;"> OPERADOR:</th>
                                    <td style="border-bottom: 1px solid;">
                                        {{ optional($phase2->Chofer)->Nombre ?? 'No disponible' }}
                                        {{ optional($phase2->Chofer)->apellido_paterno ?? '' }}
                                        {{ optional($phase2->Chofer)->apellido_materno ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th style="text-align: left;">PRESTADORES DE SERVICIO:</th>
                                    <td style="border-bottom: 1px solid;">
                                        {{ optional($phase2->Paramedico)->Nombre ?? 'Nombre no disponible' }}
                                        {{ optional($phase2->Paramedico)->apellido_paterno ?? '' }}
                                        {{ optional($phase2->Paramedico)->apellido_materno ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th style="text-align: left;">HÉLICOPTERO MATRICULA:</th>
                                    <td style="border: 1px solid; text-align: center;">
                                        {{ $phase2->Helicoptero->placa ?? 'N/A' }}</td>
                                </tr>
                            </table>
                        </div>
                    @endif

                    <div style="clear: both;"></div>

                    <div style=" border: 1px solid;  float: left; width: 100%;  margin: 0 auto; ">
                        <table style="font-size: 10px; width: 100%; padding: 5px;">
                            <tr>
                                <td colspan="2"
                                    style=" font-size: 12px;  text-align: center; padding: 5px; font-weight: bold; border-bottom: 1px solid;">
                                    IV DATOS DEL PACIENTE
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">NOMBRE O MEDIA FILACIÓN:</th>
                                <td style="border-bottom: 1px solid;">{{ $phase3->nombre }}
                                    {{ $phase3->apellido_paterno }} {{ $phase3->apellido_materno }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">GÉNERO:</th>
                                <td style="border-bottom: 1px solid;">{{ $phase3->sexo }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">EDAD:</th>
                                <td style="border-bottom: 1px solid; ">{{ $phase3->edad ?? 'No disponible' }}</td>
                            </tr>
                            @if (!empty($phase3->meses))
                                <tr>
                                    <th style="text-align: left;">MESES:</th>
                                    <td style="border-bottom: 1px solid;">{{ $phase3->meses }}</td>
                                </tr>
                            @endif

                            <tr>
                                <th style="text-align: left;">DOMICILIO:</th>
                                <td style="border-bottom: 1px solid;">{{ $phase3->domicilio }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">COLONIA / COMUNIDAD:</th>
                                <td style="border-bottom: 1px solid;">{{ $phase3->colonia }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">ALCALDÍA / MUNICIPIO:</th>
                                <td style="border-bottom: 1px solid;">{{ $phase3->alcaldia }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">TELÉFONO:</th>
                                <td style="border-bottom: 1px solid;">{{ $phase3->telefono }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">OCUPACIÓN:</th>
                                <td style="border-bottom: 1px solid;">{{ $phase3->ocupacion }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">DERECHOHABIENTE A:</th>
                                <td style="border-bottom: 1px solid;">{{ $phase3->derechohabiente }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">COMPAÑÍA SEGURO GASTOS MÉDICOS:</th>
                                <td style="border-bottom: 1px solid;">{{ $phase3->compania_seguro }}</td>
                            </tr>
                        </table>
                    </div>

                    <div style="clear: both;"></div>

                    <div style=" width: 100%;">
                        <div style="float: left; border: 1px solid; width: 100%;">
                            <!-- Tabla de Causa Traumática -->
                            <table style="width: 100%; font-size: 10px; border-collapse: collapse; padding: 5px;">
                                <tr>
                                    <td colspan="2"
                                        style="text-align: center; padding: 5px; font-weight: bold; border-bottom: 1px solid;">
                                        V CAUSA TRAUMÁTICA
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align: left; padding: 5px;">AGENTE CAUSAL:</th>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding: 5px;">
                                        <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                                            <table style="width: 100%; font-size: 8px;">
                                                <tr>
                                                    <td style="border: 1px solid; text-align: center;">
                                                        1 @if ($phase4->agente_causal == '1')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>ARMA</td>
                                                    <td style="border: 1px solid; text-align: center;">
                                                        6 @if ($phase4->agente_causal == '6')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>MAQUINARIA</td>

                                                    <td style="border: 1px solid; text-align: center;">
                                                        11 @if ($phase4->agente_causal == '11')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>ELECTRICIDAD</td>
                                                </tr>
                                                <tr>
                                                    <td style="border: 1px solid; text-align: center;">
                                                        2 @if ($phase4->agente_causal == '2')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>JUGUETE</td>
                                                    <td style="border: 1px solid; text-align: center;">
                                                        7 @if ($phase4->agente_causal == '7')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>HERRAMIENTA</td>

                                                    <td style="border: 1px solid; text-align: center;">
                                                        12 @if ($phase4->agente_causal == '12')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>EXPLOSIÓN</td>
                                                </tr>
                                                <tr>
                                                    <td style="border: 1px solid; text-align: center;">
                                                        3 @if ($phase4->agente_causal == '3')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>AUTOMOTOR</td>
                                                    <td style="border: 1px solid; text-align: center;">
                                                        8 @if ($phase4->agente_causal == '8')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>FUEGO</td>

                                                    <td style="border: 1px solid; text-align: center;">
                                                        13 @if ($phase4->agente_causal == '13')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>SER HUMANO</td>
                                                </tr>
                                                <tr>
                                                    <td style="border: 1px solid; text-align: center;">
                                                        4 @if ($phase4->agente_causal == '4')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>BICICLETA / SCOOTER</td>
                                                    <td style="border: 1px solid; text-align: center;">
                                                        9 @if ($phase4->agente_causal == '9')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>SUSTANCIA / OBJECTO CALIENTE</td>

                                                    <td style="border: 1px solid; text-align: center;">
                                                        14 @if ($phase4->agente_causal == '14')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>ANIMAL</td>
                                                </tr>
                                                <tr>
                                                    <td style="border: 1px solid; text-align: center;">
                                                        5 @if ($phase4->agente_causal == '5')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>PRODUCTO BIOLÓGICO / QUIMICO</td>
                                                    <td style="border: 1px solid; text-align: center;">
                                                        10 @if ($phase4->agente_causal == '10')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>SUSTANCIA TOXICA</td>

                                                    <td style="border: 1px solid; text-align: center;">
                                                        15 @if ($phase4->agente_causal == '15')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>OTRO</td>
                                                </tr>
                                            </table>

                                        </div>
                                    </td>
                                </tr>
                                @if ($phase4->agente_causal == '15')
                                    <tr>
                                        <th style="text-align: left; padding: 5px;">ESPECIFICAR:</th>
                                        <td style="border-bottom: 1px solid; padding: 5px;">
                                            {{ $phase4->especificar ?? 'No disponible' }}</td>
                                    </tr>
                                @endif

                                <tr>
                                    <th style="text-align: left; padding: 5px;">LESIONES CAUSADAS:</th>
                                    <td style="border-bottom: 1px solid; padding: 5px;">
                                        {{ $phase4->lesionescausadas ?? 'No disponible' }}</td>
                                </tr>

                                @if($phase4->tipo_accidente == 'automovilistico')
                                    <tr>
                                        <th style="text-align: left; padding: 5px;">COLISIÓN:</th>
                                        <td style="border-bottom: 1px solid; padding: 5px;">
                                            {{ $phase4->colision ?? 'No disponible' }}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left; padding: 5px;">CONTRA OBJETO:</th>
                                        <td style="border-bottom: 1px solid; padding: 5px;">
                                            {{ $phase4->contraobjeto ?? 'No disponible' }}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left; padding: 5px;">IMPACTO:</th>
                                        <td style="border-bottom: 1px solid; padding: 5px;">
                                            {{ $phase4->impacto ?? 'No disponible' }}</td>
                                    </tr>

                                    <tr>
                                        <th style="text-align: left; padding: 5px;">HUNDIMIENTO:</th>
                                        <td style="border-bottom: 1px solid; padding: 5px;">
                                            {{ $phase4->hundimiento ?? 'No disponible' }}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left; padding: 5px;">PARABRISAS:</th>
                                        <td style="border-bottom: 1px solid; padding: 5px;">
                                            {{ $phase4->parabrisas ?? 'No disponible' }}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left; padding: 5px;">VOLANTE:</th>
                                        <td style="border-bottom: 1px solid; padding: 5px;">
                                            {{ $phase4->volante ?? 'No disponible' }}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left; padding: 5px;">BOLSA DE AIRE:</th>
                                        <td style="border-bottom: 1px solid; padding: 5px;">
                                            {{ $phase4->bolsaaire ?? 'No disponible' }}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left; padding: 5px;">CINTURÓN:</th>
                                        <td style="border-bottom: 1px solid; padding: 5px;">
                                            {{ $phase4->cinturon ?? 'No disponible' }}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left; padding: 5px;">DENTRO DEL VEHÍCULO:</th>
                                        <td style="border-bottom: 1px solid; padding: 5px;">
                                            {{ $phase4->dentrovehiculo ?? 'No disponible' }}</td>
                                    </tr>

                                @elseif ($phase4->tipo_accidente == 'atropellado')
                                    <tr>
                                        <th style="text-align: left; padding: 5px;">TIPO DE ACCIDENTE:</th>
                                        <td style="border-bottom: 1px solid; padding: 5px;">
                                            {{ $phase4->tipo_accidente ?? 'No disponible' }}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left; padding: 5px;">ATROPELLADO POR:</th>
                                        <td style="border-bottom: 1px solid; padding: 5px;">
                                            {{ $phase4->atropelladopor ?? 'No disponible' }}</td>
                                    </tr>
                                @endif
                            </table>

                        </div>
                    </div>

                    <div style="clear: both;"></div>

                    <div style=" width: 100%;">
                        <div style="float: left; border: 1px solid; width: 100%;">
                            <!-- Tabla de Causa Clinica -->
                            <table style="width: 100%; font-size: 10px; border-collapse: collapse; padding: 5px;">
                                <tr>
                                    <td colspan="2"
                                        style="text-align: center; padding: 5px; font-weight: bold; border-bottom: 1px solid;">
                                        V CAUSA CLÍNICA
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align: left; padding: 5px;">ORIGEN PROBABLE:</th>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding: 5px;">
                                        <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                                            <table style="width: 100%; font-size: 8px;">
                                                <tr>
                                                    <td style="border: 1px solid; text-align: center;">
                                                        1 @if ($phase5->origen_probable == 'neurologica')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>NEUROLÓGICA</td>
                                                    <td style="border: 1px solid; text-align: center;">
                                                        6 @if ($phase5->origen_probable == 'digestiva')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>DIGESTIVA</td>

                                                    <td style="border: 1px solid; text-align: center;">
                                                        11 @if ($phase5->origen_probable == 'musculo_esqueletico')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>MÚSCULO ESQUELÉTICO</td>
                                                </tr>
                                                <tr>
                                                    <td style="border: 1px solid; text-align: center;">
                                                        2 @if ($phase5->origen_probable == 'cardiovascular')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>CARDIOVASCULAR</td>
                                                    <td style="border: 1px solid; text-align: center;">
                                                        7 @if ($phase5->origen_probable == 'urogenital')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>UROGENITAL</td>

                                                    <td style="border: 1px solid; text-align: center;">
                                                        12 @if ($phase5->origen_probable == 'infecciosa')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>INFECCIOSA</td>
                                                </tr>
                                                <tr>
                                                    <td style="border: 1px solid; text-align: center;">
                                                        3 @if ($phase5->origen_probable == 'respiratorio')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>RESPIRATORIO</td>
                                                    <td style="border: 1px solid; text-align: center;">
                                                        8 @if ($phase5->origen_probable == 'gineco_obstetrica')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>GINECO-OBTETRICA</td>

                                                    <td style="border: 1px solid; text-align: center;">
                                                        13 @if ($phase5->origen_probable == 'oncologico')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>ONCOLÓGICO</td>
                                                </tr>
                                                <tr>
                                                    <td style="border: 1px solid; text-align: center;">
                                                        4 @if ($phase5->origen_probable == 'metabolico')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>METABÓLICO</td>
                                                    <td style="border: 1px solid; text-align: center;">
                                                        9 @if ($phase5->origen_probable == 'Cognitivo_emocional')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>COGNITIVO / EMOCIONAL</td>

                                                    <td style="border: 1px solid; text-align: center;">
                                                        14 @if ($phase5->origen_probable == 'otro')
                                                            X
                                                        @endif
                                                    </td>
                                                    <td>OTRO</td>
                                                </tr>
                                            </table>

                                        </div>
                                    </td>
                                </tr>
                                @if ($phase5->origen_probable == 'otro')
                                    <tr>
                                        <th style="text-align: left; padding: 5px;">ESPECIFICAR:</th>
                                        <td style="border-bottom: 1px solid; padding: 5px;">
                                            {{ $phase5->especificarOrigen ?? 'No disponible' }}</td>
                                    </tr>
                                @endif

                                <tr>
                                    <th style="text-align: left; padding: 5px;">1° VEZ:</th>
                                    <td style="border-bottom: 1px solid; padding: 5px;">
                                        {{ $phase5->primeravez ?? 'No disponible' }}</td>
                                </tr>

                                <tr>
                                    <th style="text-align: left; padding: 5px;">SUBSECUENTE:</th>
                                    <td style="border-bottom: 1px solid; padding: 5px;">
                                        {{ $phase5->subsecuente ?? 'No disponible' }}</td>
                                </tr>
                            </table>

                        </div>
                    </div>

                    <div style="clear: both;"></div>

                    <div style=" width: 100%;">
                        <div style="float: left; border: 1px solid; width: 100%;">
                            <!-- Tabla de Causa Clinica -->
                            <table style="width: 100%; font-size: 10px; border-collapse: collapse; padding: 5px;">
                                @if (!is_null($phase6->gesta) || !is_null($phase6->cesareas) || !is_null($phase6->para) || !is_null($phase6->aborto)
                                || !is_null($phase6->semanas) || !is_null($phase6->fechaParto) || !is_null($phase6->membranas)
                                || !is_null($phase6->fum) || !is_null($phase6->horaContracciones) || !is_null($phase6->frecuencia)
                                || !is_null($phase6->duracion)
                                )
                                    <tr>
                                        <td colspan="2"
                                            style="text-align: center; padding: 5px; font-weight: bold; border-bottom: 1px solid;">
                                            VII PARTO
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2" style="text-align: left; padding: 5px;">DATOS DE LA MADRE:</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="padding: 0 5px;">
                                            <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                                                <table style="width: 100%; font-size: 8px; border: 1px solid;">
                                                    <tr>
                                                        <td style=" font-size: 6px;  text-align: center;">
                                                            GESTA
                                                        </td>
                                                        <td>
                                                            <p style=" font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                {{$phase6->gesta ?? 'No disponible'}}
                                                            </p>
                                                        </td>
                                                        <td style="font-size: 6px; text-align: center;">
                                                            CESAREAS
                                                        </td>
                                                        <td>
                                                            <p style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                {{$phase6->cesareas ?? 'No disponible'}}
                                                            </p>
                                                        </td>

                                                        <td style="font-size: 6px; text-align: center;">
                                                            PARA
                                                        </td>
                                                        <td>
                                                            <p style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                {{$phase6->para ?? 'No disponible'}}
                                                            </p>
                                                        </td>
                                                        <td style="font-size: 6px; text-align: center;">
                                                            ABORTO
                                                        </td>
                                                        <td>
                                                            <p style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                {{$phase6->aborto ?? 'No disponible'}}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>

                                                        <td colspan="2" style=" font-size: 6px; text-align: center;">
                                                            SEMANAS DE GESTIÓN
                                                        </td>
                                                        <td colspan="2">
                                                            <p style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                {{$phase6->semanas ?? 'No disponible'}}
                                                            </p>
                                                        </td>

                                                        <td colspan="2"  style="font-size: 6px; text-align: center;">
                                                            FECHA POBABLE DE PARTO
                                                        </td>
                                                        <td colspan="2">
                                                            <p style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                {{$phase6->semanas ?? 'No disponible'}}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>

                                                        <td colspan="2" style=" font-size: 6px; text-align: center;">
                                                            MEMBRANAS
                                                        </td>
                                                        <td colspan="2">
                                                            <p style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                {{$phase6->membranas ?? 'No disponible'}}
                                                            </p>
                                                        </td>

                                                        <td colspan="2"  style="font-size: 6px; text-align: center;">
                                                            F.U.M
                                                        </td>
                                                        <td colspan="2">
                                                            <p style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                {{$phase6->fum ?? 'No disponible'}}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td  colspan="3" style=" font-size: 6px;  text-align: center;">
                                                            HORA DE INICIO DE CONTRACCIONES:
                                                        </td>
                                                        <td>
                                                            <p style=" font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                {{$phase6->horaContracciones ?? 'No disponible'}}
                                                            </p>
                                                        </td>
                                                        <td style="font-size: 6px; text-align: center;">
                                                            FRECUENCIA:
                                                        </td>
                                                        <td>
                                                            <p style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                {{$phase6->frecuencia ?? 'No disponible'}}
                                                            </p>
                                                        </td>

                                                        <td style="font-size: 6px; text-align: center;">
                                                            DURACIÓN:
                                                        </td>
                                                        <td>
                                                            <p style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                {{$phase6->duracion ?? 'No disponible'}}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>





                                            </div>
                                        </td>
                                    </tr>
                                @endif
                                @if (!is_null($phase6->horanacimiento) || !is_null($phase6->lugar_post_parto)
                                || !is_null($phase6->placenta_expulsada)
                                )
                                <tr>
                                    <th colspan="2" style="text-align: left; padding: 5px;"> DATOS POST PARTO:</th>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding: 0 5px;">
                                        <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                                            <table style="width: 100%; font-size: 8px; border: 1px solid;">
                                                <tr>
                                                    <td style=" font-size: 6px;  text-align: center;">
                                                        HORA DE NACIMIENTO
                                                    </td>
                                                    <td>
                                                        <p style=" font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                            {{$phase6->horanacimiento ?? 'No disponible'}}
                                                        </p>
                                                    </td>
                                                    <td style="font-size: 6px; text-align: center;">
                                                        LUGAR
                                                    </td>
                                                    <td>
                                                        <p style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                            {{$phase6->lugar_post_parto ?? 'No disponible'}}
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td style=" font-size: 6px; text-align: center;">
                                                        PLACENTA EXPULSADA
                                                    </td>
                                                    <td colspan="2">
                                                        <p style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                            {{$phase6->placenta_expulsada ?? 'No disponible'}}
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>





                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @if ( !is_null($phase6->estado_producto) || !is_null($phase6->genero_producto)
                                )
                                <tr>
                                    <th colspan="2" style="text-align: left; padding: 5px;">DATOS DEL RECIÉN NACIDO:</th>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding: 0 5px;">
                                        <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                                            <table style="width: 100%; font-size: 6px; ">
                                                <tr>
                                                    <!-- Primera Celda: Producto -->
                                                    <td style=" padding: 0 2px;">
                                                        PRODUCTO
                                                    </td>
                                                    <!-- Segunda Celda: Valor Numérico y Estado -->
                                                    <td style="border: 1px solid black; padding: 0; text-align: center;">
                                                        <div style="display: flex; padding-top: 4px; padding-bottom: 4px; justify-content: space-between; align-items: center; height: 1%;">
                                                            <!-- Número 1 -->
                                                            <div style=" float: left;  border-right: 1px solid black; width: 30%; padding: 0; margin: 0;">
                                                                1
                                                                @if ( $phase6->estado_producto === 'vivo')
                                                                    X
                                                                @endif
                                                            </div>
                                                            <!-- Estado del Producto -->
                                                            <div style=" float: right; width: 70%;  padding-left: 10px;">
                                                                VIVO
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td style="border: 1px solid black; padding: 0; text-align: center;">
                                                        <div style="display: flex; padding-top: 4px; padding-bottom: 4px; justify-content: space-between; align-items: center; height: 1%;">
                                                            <!-- Número 1 -->
                                                            <div style=" float: left;  border-right: 1px solid black; width: 30%; padding: 0; margin: 0;">
                                                                2
                                                                @if ( $phase6->estado_producto === 'muerto')
                                                                    X
                                                                @endif
                                                            </div>
                                                            <!-- Estado del Producto -->
                                                            <div style=" float: right; width: 70%;  padding-left: 10px;">
                                                                MUERTO
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <!-- Primera Celda: Producto -->
                                                    <td style=" padding: 0 2px;">
                                                        GENERO
                                                    </td>
                                                    <!-- Segunda Celda: Valor Numérico y Estado -->
                                                    <td style="border: 1px solid black; padding: 0; text-align: center;">
                                                        <div style="display: flex; padding-top: 4px; padding-bottom: 4px; justify-content: space-between; align-items: center; height: 1%;">
                                                            <!-- Número 1 -->
                                                            <div style=" float: left;  border-right: 1px solid black; width: 30%; padding: 0; margin: 0;">
                                                                1
                                                                @if ( $phase6->genero_producto === 'masculino')
                                                                    X
                                                                @endif
                                                            </div>
                                                            <!-- Estado del Producto -->
                                                            <div style=" float: right; width: 70%;  padding-left: 10px;">
                                                                MASC
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td style="border: 1px solid black; padding: 0; text-align: center;">
                                                        <div style="display: flex; padding-top: 4px; padding-bottom: 4px; justify-content: space-between; align-items: center; height: 1%;">
                                                            <!-- Número 1 -->
                                                            <div style=" float: left;  border-right: 1px solid black; width: 30%; padding: 0; margin: 0;">
                                                                2
                                                                @if ( $phase6->genero_producto === 'femenino')
                                                                    X
                                                                @endif
                                                            </div>
                                                            <!-- Estado del Producto -->
                                                            <div style=" float: right; width: 70%;  padding-left: 10px;">
                                                                FEM
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                @endif
                                @if (!is_null($phase6->apgar1) || !is_null($phase6->apgar5)
                                )
                                                <tr>
                                                    <!-- Primera Celda: Producto -->
                                                    <td style=" padding: 0 2px;">
                                                        APGAR
                                                    </td>
                                                    <!-- Segunda Celda: Valor Numérico y Estado -->
                                                    <td style="border: 1px solid black; padding: 0; text-align: center;">
                                                        <div style="display: flex; padding-top: 4px; padding-bottom: 4px; justify-content: space-between; align-items: center; height: 1%;">
                                                            <!-- Número 1 -->
                                                            <div style=" float: left;  border-right: 1px solid black; width: 30%; padding: 0; margin: 0;">
                                                                1
                                                            </div>
                                                            <!-- Estado del Producto -->
                                                            <div style=" float: right; width: 70%;  padding-left: 10px;">
                                                                {{$phase6->apgar1 ?? ''}}
                                                            </div>

                                                        </div>
                                                    </td>

                                                    <td style="border: 1px solid black; padding: 0; text-align: center;">
                                                        <div style="display: flex; padding-top: 4px; padding-bottom: 4px; justify-content: space-between; align-items: center; height: 1%;">
                                                            <!-- Número 1 -->
                                                            <div style=" float: left;  border-right: 1px solid black; width: 30%; padding: 0; margin: 0;">
                                                                2
                                                            </div>
                                                            <!-- Estado del Producto -->
                                                            <div style=" float: right; width: 70%;  padding-left: 10px;">
                                                                {{$phase6->apgar5 ?? ''}}
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                @endif
                                            </table>
                                        </dv>
                                    </td>
                                </tr>

                            </table>



                        </div>
                    </div>

                    <div style="clear: both;"></div>

                </div>










            </div>

            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

        </main>
    </div>

    @livewireScripts
</body>

</html>
