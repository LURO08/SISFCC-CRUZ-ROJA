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

    table {
        page-break-inside: avoid;
    }
    #bodyCanvas {
                    display: block;
                    margin: auto;
                }

                .border {
                    border: 1px solid #ccc;
                    border-radius: 5px;
                }

                ul {
                    padding-left: 0;
                }

                li {
                    margin-bottom: 4px;
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
                                    style="border-bottom: 1px solid; display: inline-block; width:50%; text-align: center;">{{ str_pad($phase1->id, 4, '0', STR_PAD_LEFT) }}</span>
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
                <div style="float: right; width: 50%;  margin-left: 5px;">
                    <div
                        style="border: 1px solid #000; padding: 0 9px;  float: right; font-size: 10px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);">
                        <table style="width: 100%; border-collapse: collapse; text-align: left;">
                            <thead>
                                <tr>
                                    <th
                                        style=" font-size: 12px; text-align: center; padding: 5px; font-weight: bold; border-bottom: 1px solid; ">
                                        VIII EVALUACIÓN INICIAL
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- NIVEL DE CONCIENCIA -->
                                <table style="width: 100%; border-collapse: collapse;">
                                    <tr>
                                        <td
                                            style="padding: 10px; border-bottom: 1px solid #ccc; text-align: center; vertical-align: middle; width: 38%;">
                                            <strong>NIVEL DE CONCIENCIA:</strong><br>
                                            <span
                                                style="display: inline-block; width: 100%; border-bottom: 1px solid #000; font-size: 10px;">
                                                @if ($phase7->nivel_conciencia === 'alerta')
                                                    ALERTA
                                                @elseif($phase7->nivel_conciencia === 'respuesta_estimuloverbal')
                                                    Respuesta Estímulo Verbal
                                                @elseif ($phase7->nivel_conciencia === 'respuesta_estimulodoloroso')
                                                    Respuesta Estímulo Doloroso
                                                @elseif ($phase7->nivel_conciencia === 'inconciente')
                                                    Inconciente
                                                @else
                                                    No Disponible
                                                @endif
                                            </span>
                                        </td>
                                        <td
                                            style="padding: 10px; border-bottom: 1px solid #ccc; text-align: center; vertical-align: middle;">
                                            <strong>VÍA AÉREA:</strong><br><br>
                                            <span
                                                style="display: inline-block; width: 100%; border-bottom: 1px solid #000; font-size: 10px;">
                                                @if ($phase7->viaaerea === 'permeable')
                                                    Permeable
                                                @elseif ($phase7->viaaerea === 'comprometida')
                                                    Comprometida
                                                @else
                                                    No Disponible
                                                @endif
                                            </span>
                                        </td>
                                        <td
                                            style="padding: 10px; border-bottom: 1px solid #ccc; text-align: center; vertical-align: middle;">
                                            <strong>REFLEJO DE DEGLUCIÓN:</strong><br>
                                            <span
                                                style="display: inline-block; width: 100%; border-bottom: 1px solid #000; font-size: 10px;">
                                                @if ($phase7->reflejo_deglutacion === 'ausente')
                                                    Ausente
                                                @elseif ($phase7->reflejo_deglutacion === 'presente')
                                                    Presente
                                                @else
                                                    No Disponible
                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                                </table>

                                {{-- VENTILACIÓN --}}
                                <table style="width: 100%; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th colspan="4"
                                                style=" padding: 5px 0; text-align: center; border-bottom: 1px solid #ccc;">
                                                VENTILACIÓN
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <!-- OBSERVACIÓN -->
                                            <td
                                                style="padding: 10px 5px 0px; border-bottom: 1px solid #ccc; text-align: center; vertical-align: top; ">
                                                <strong>OBSERVACIÓN:</strong><br>
                                                <span
                                                    style="display: inline-block; width: 100%; border-bottom: 1px solid #000; font-size: 10px; text-align: center; padding-top: 10px;">
                                                    @if ($phase7->ventilacion_observacion === 'automatismo_regular')
                                                        Automatismo Regular
                                                    @elseif ($phase7->ventilacion_observacion === 'automatismo_irregular')
                                                        Automatismo Irregular
                                                    @elseif ($phase7->ventilacion_observacion === 'ventilacion_rapida')
                                                        Ventilación Rápida
                                                    @elseif ($phase7->ventilacion_observacion === 'ventilacion_superficial')
                                                        Ventilación Superficial
                                                    @elseif ($phase7->ventilacion_observacion === 'apnea')
                                                        Apnea
                                                    @else
                                                        No Disponible
                                                    @endif
                                                </span>
                                            </td>
                                            <!-- AUSCULTACIÓN -->
                                            <td
                                                style="padding: 10px 5px 0px; border-bottom: 1px solid #ccc; text-align: center; vertical-align: top; ">
                                                <strong>AUSCULTACIÓN:</strong><br>
                                                <span
                                                    style="display: inline-block; width: 100%; border-bottom: 1px solid #000; font-size: 10px; padding-top: 10px; ">
                                                    @if ($phase7->ventilacion_auscultacion === 'estertores_sibilancias')
                                                        Estertores Sibilancias
                                                    @elseif ($phase7->ventilacion_auscultacion === 'ruidos_normales')
                                                        Ruidos Respiratorios Normales
                                                    @elseif ($phase7->ventilacion_auscultacion === 'ruidos_disminuidos')
                                                        Ruidos Respiratorios Disminuidos
                                                    @elseif ($phase7->ventilacion_auscultacion === 'ruidos_ausentes')
                                                        Ruidos Respiratorios Ausentes
                                                    @else
                                                        No Disponible
                                                    @endif
                                                </span>
                                            </td>
                                            <!-- HEMITÓRAX -->
                                            <td
                                                style="padding: 5px 5px 0px; border-bottom: 1px solid #ccc; text-align: center; vertical-align: top; ">
                                                <table>
                                                    <tr>
                                                        <th colspan="2">HEMITÓRAX:</th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="hemitorax[]" value="derecho"
                                                                @checked(is_array($decodedHemitorax = json_decode($phase7->ventilacion_hemitorax ?? '[]', true))
                                                                        ? in_array('derecho', $decodedHemitorax)
                                                                        : $decodedHemitorax === 'derecho')>
                                                        </td>
                                                        <td>
                                                            <label style="display: inline-flex; align-items: center;">
                                                                Derecha
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="hemitorax[]" value="izquierdo"
                                                                @checked(is_array($decodedHemitorax = json_decode($phase7->ventilacion_hemitorax ?? '[]', true))
                                                                        ? in_array('izquierdo', $decodedHemitorax)
                                                                        : $decodedHemitorax === 'izquierdo')>
                                                        </td>
                                                        <td>
                                                            <label style="display: inline-flex; align-items: center;">
                                                                Izquierda
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <!-- SITIO -->
                                            <td
                                                style=" padding: 5px 5px 0px; border-bottom: 1px solid #ccc; text-align: center; vertical-align: top; ">
                                                <table>
                                                    <tr>
                                                        <th colspan="2">SITIO:</th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="ventilacion_sitio[]"
                                                                value="apical" @checked(is_array($decodedSitio = json_decode($phase7->ventilacion_sitio ?? '[]', true))
                                                                        ? in_array('apical', $decodedSitio)
                                                                        : $decodedSitio === 'apical')>
                                                        </td>
                                                        <td>
                                                            <label style="display: inline-flex; align-items: center;">
                                                                Apical
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="ventilacion_sitio[]"
                                                                value="base" @checked(is_array($decodedSitio = json_decode($phase7->ventilacion_sitio ?? '[]', true))
                                                                        ? in_array('base', $decodedSitio)
                                                                        : $decodedSitio === 'base')>
                                                        </td>
                                                        <td>
                                                            <label style="display: inline-flex; align-items: center;">
                                                                Base
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                {{-- CIRCULACIÓN --}}
                                <table style="width: 100%; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th colspan="4"
                                                style=" padding: 3px 0; text-align: center; border-bottom: 1px solid #ccc;">
                                                CIRCULACIÓN
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <!-- PRESENCIA DE PULSOS -->
                                            <td
                                                style="padding: 5px 5px 0px; border-bottom: 1px solid #ccc; text-align: center; vertical-align: top; ">
                                                <strong>PRESENCIA DE PULSOS:</strong><br>
                                                <span
                                                    style="display: inline-block; width: 100%; border-bottom: 1px solid #000; font-size: 10px; text-align: center; padding-top: 10px;">
                                                    @if ($phase7->circulacion_pulsos === 'carotideo')
                                                        Carotideo
                                                    @elseif ($phase7->circulacion_pulsos === 'radial')
                                                        Radical
                                                    @elseif ($phase7->circulacion_pulsos === 'paro_cardiaco')
                                                        Paro Cardiorespiratorio
                                                    @else
                                                        No Disponible
                                                    @endif
                                                </span>
                                            </td>
                                            <!-- CALIDAD -->
                                            <td
                                                style="padding: 5px 3px 0px; border-bottom: 1px solid #ccc; text-align: center; vertical-align: top;">
                                                <table style="width: 100%;  border-collapse: collapse; ">
                                                    <tr>
                                                        <th colspan="2"
                                                            style="text-align: center; padding-bottom: -10px; margin-bottom: -10px;">
                                                            CALIDAD:</th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table style="width: 100%;  border-collapse: collapse; ">
                                                                <tr>
                                                                    <td style="padding: 0; margin: 0;">
                                                                        <input type="checkbox"
                                                                            name="circulacion_calidad[velocidad]"
                                                                            value="normal" @checked(is_array($decodedcirculacion_calidad = json_decode($phase7->circulacion_calidad ?? '[]', true))
                                                                                    ? in_array('normal', $decodedcirculacion_calidad)
                                                                                    : $decodedcirculacion_calidad === 'normal')>
                                                                    </td>
                                                                    <td style="padding: 0; margin: 0;">
                                                                        <label
                                                                            style=" align-items: center;">Normal</label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding: 0; margin: 0;">
                                                                        <input type="checkbox"
                                                                            name="circulacion_calidad[velocidad]"
                                                                            value="rapido" @checked(is_array($decodedcirculacion_calidad = json_decode($phase7->circulacion_calidad ?? '[]', true))
                                                                                    ? in_array('rapido', $decodedcirculacion_calidad)
                                                                                    : $decodedcirculacion_calidad === 'rapido')>
                                                                    </td>
                                                                    <td style="padding: 0;">
                                                                        <label
                                                                            style=" align-items: center;">Rápido</label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding: 0;">
                                                                        <input type="checkbox"
                                                                            name="circulacion_calidad[velocidad]"
                                                                            value="lento" @checked(is_array($decodedcirculacion_calidad = json_decode($phase7->circulacion_calidad ?? '[]', true))
                                                                                    ? in_array('lento', $decodedcirculacion_calidad)
                                                                                    : $decodedcirculacion_calidad === 'lento')>
                                                                    </td>
                                                                    <td style="padding: 0;">
                                                                        <label
                                                                            style="align-items: center;">Lento</label>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td>
                                                            <table style="width: 100%; border-collapse: collapse;">
                                                                <tr>
                                                                    <td style="padding: 0;">
                                                                        <input type="checkbox"
                                                                            name="circulacion_calidad[ritmica]"
                                                                            value="ritmico"
                                                                            @checked(is_array($decodedcirculacion_calidad = json_decode($phase7->circulacion_calidad ?? '[]', true))
                                                                                    ? in_array('ritmico', $decodedcirculacion_calidad)
                                                                                    : $decodedcirculacion_calidad === 'ritmico')>
                                                                    </td>
                                                                    <td style="padding: 0;">
                                                                        <label
                                                                            style=" align-items: center;">Rítmico</label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding: 0;">
                                                                        <input type="checkbox"
                                                                            name="circulacion_calidad[ritmica]-"
                                                                            value="arritmico"
                                                                            @checked(is_array($decodedcirculacion_calidad = json_decode($phase7->circulacion_calidad ?? '[]', true))
                                                                                    ? in_array('arritmico', $decodedcirculacion_calidad)
                                                                                    : $decodedcirculacion_calidad === 'arritmico')>
                                                                    </td>
                                                                    <td style="padding: 0;">
                                                                        <label
                                                                            style=" align-items: center;">Arritmico</label>
                                                                    </td>
                                                                </tr>

                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </td>
                                            <!-- PIEL -->
                                            <td
                                                style="padding: 10px 5px 0px; border-bottom: 1px solid #ccc; text-align: center; vertical-align: top; ">
                                                <strong>PIEL:</strong><br>
                                                <span
                                                    style="display: inline-block; width: 100%; border-bottom: 1px solid #000; font-size: 10px; padding-top: 10px; ">
                                                    @if ($phase7->circulacion_piel === 'normal')
                                                        Normal
                                                    @elseif ($phase7->circulacion_piel === 'palida')
                                                        Pálida
                                                    @elseif ($phase7->circulacion_piel === 'cianotica')
                                                        Cianótica
                                                    @else
                                                        No Disponible
                                                    @endif
                                                </span>
                                            </td>
                                            <!-- CARACTERISTICAS -->
                                            <td
                                                style="padding: 10px 5px 0px; border-bottom: 1px solid #ccc; text-align: center; vertical-align: top; ">
                                                <strong>CARACTERISTICAS:</strong><br>
                                                <span
                                                    style="display: inline-block; width: 100%; border-bottom: 1px solid #000; font-size: 10px; padding-top: 10px; ">
                                                    @if ($phase7->circulacion_caracteristicas === 'normal')
                                                        Normal
                                                    @elseif ($phase7->circulacion_caracteristicas === 'caliente')
                                                        Caliente
                                                    @elseif ($phase7->circulacion_caracteristicas === 'fria')
                                                        Fría
                                                    @elseif ($phase7->circulacion_caracteristicas === 'diaforesis')
                                                        Diaforesis
                                                    @else
                                                        No Disponible
                                                    @endif
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </tbody>
                        </table>
                    </div>
                    <div style="clear: both;"></div>

                    <div style="border: 1px solid; padding: 5px; float: right; width: 97%; ">
                        <table class="table table-bordered" style=" border-collapse: collapse;  ">
                            <thead>
                                <tr>
                                    <td colspan="3"
                                        style=" font-size: 12px; text-align: center; padding: 5px; font-weight: bold; border-bottom: 1px solid; ">
                                        VIII EVALUACIÓN SECUNDARIA
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="font-size: 10px; text-align: left;">
                                    <!-- Primera Celda: NIVEL DE CONCIENCIA -->
                                    <td style="width: 35%;">
                                        <!-- Exploración Física -->
                                        <table class="table-auto border-collapse">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Exploración Física</th>
                                                </tr>
                                                <tr>
                                                    <th style="border-bottom: 1px solid; border-top: 1px solid;"
                                                        class="px-2 py-1">
                                                        Descripción</th>
                                                    <th style="border-bottom: 1px solid; border-top: 1px solid; "
                                                        class="px-4 py-1" colspan="2">
                                                        Abreviatura</th>
                                                </tr>
                                            </thead>
                                            <tbody style="border: 1px solid;">
                                                @if (in_array('deformidades', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                    <tr style="border: 1px solid; margin: 0;">
                                                        <td class="px-2 py-1">Deformidades</td>
                                                        <td class="px-2 py-1" style="text-align: center;">D</td>
                                                        <td class="px-2 py-1">
                                                            <input type="checkbox" @checked(in_array('deformidades', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (in_array('contusiones', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                    <tr style="border: 1px solid;">
                                                        <td class="px-2 py-1">Contusiones</td>
                                                        <td class="px-2 py-1" style="text-align: center;">CD</td>
                                                        <td class="px-2 py-1">
                                                            <input type="checkbox" @checked(in_array('contusiones', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (in_array('abrasiones', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                    <tr style="border: 1px solid;">
                                                        <td class="px-2 py-1">Abrasiones</td>
                                                        <td class="px-2 py-1" style="text-align: center;">A</td>
                                                        <td class="px-2 py-1">

                                                            <input type="checkbox" @checked(in_array('abrasiones', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (in_array('penetraciones', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                    <tr style="border: 1px solid;">
                                                        <td class="px-2 py-1">Penetraciones</td>
                                                        <td class="px-2 py-1" style="text-align: center;">P</td>
                                                        <td class="px-2 py-1">
                                                            <input type="checkbox" @checked(in_array('penetraciones', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (in_array('movimiento_paradójico', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                    <tr style="border: 1px solid;">
                                                        <td class="px-2 py-1">Movimiento Paradójico</td>
                                                        <td class="px-2 py-1" style="text-align: center;">MP</td>
                                                        <td class="px-2 py-1">

                                                            <input type="checkbox" @checked(in_array('movimiento_paradójico', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                                style="margin: 0px;">
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (in_array('crepitación', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                    <tr style="border: 1px solid;">
                                                        <td class="px-2 py-1">Crepitación</td>
                                                        <td class="px-2 py-1" style="text-align: center;">C</td>
                                                        <td class="px-2 py-1">
                                                            <input type="checkbox" @checked(in_array('crepitación', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                                style="margin: 0px;">
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (in_array('heridas', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                    <tr style="border: 1px solid;">
                                                        <td class="px-2 py-1">Heridas</td>
                                                        <td class="px-2 py-1" style="text-align: center;">H</td>
                                                        <td class="px-2 py-1">
                                                            <input type="checkbox" @checked(in_array('heridas', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (in_array('fracturas', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                    <tr style="border: 1px solid;">
                                                        <td class="px-2 py-1">Fracturas</td>
                                                        <td class="px-2 py-1" style="text-align: center;">F</td>
                                                        <td class="px-2 py-1">
                                                            <input type="checkbox" @checked(in_array('fracturas', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                                style="margin: 0px;">
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (in_array('enfisema_subcutáneo', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                    <tr style="border: 1px solid;">
                                                        <td class="px-2 py-1">Enfisema Subcutáneo</td>
                                                        <td class="px-2 py-1" style="text-align: center;">ES</td>
                                                        <td class="px-2 py-1">
                                                            <input type="checkbox" @checked(in_array('enfisema_subcutáneo', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (in_array('quemaduras', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                    <tr style="border: 1px solid;">
                                                        <td class="px-2 py-1">Quemaduras</td>
                                                        <td class="px-2 py-1" style="text-align: center;">Q</td>
                                                        <td class="px-2 py-1">
                                                            <input type="checkbox" @checked(in_array('quemaduras', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (in_array('laceraciones', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                    <tr style="border: 1px solid;">
                                                        <td class="px-2 py-1">Laceraciones</td>
                                                        <td class="px-2 py-1" style="text-align: center;">L</td>
                                                        <td class="px-2 py-1">
                                                            <input type="checkbox" @checked(in_array('laceraciones', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (in_array('edema', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                    <tr style="border: 1px solid;">
                                                        <td class="px-2 py-1">Edema</td>
                                                        <td class="px-2 py-1" style="text-align: center;">E</td>
                                                        <td class="px-2 py-1">
                                                            <input type="checkbox" @checked(in_array('edema', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (in_array('alteración_de_sensibilidad', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                    <tr style="border: 1px solid;">
                                                        <td class="px-2 py-1">Alteración de Sensibilidad</td>
                                                        <td class="px-2 py-1" style="text-align: center;">AS</td>
                                                        <td class="px-2 py-1">
                                                            <input type="checkbox" @checked(in_array('alteración_de_sensibilidad', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (in_array('alteración_de_movilidad', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                    <tr style="border: 1px solid;">
                                                        <td class="px-2 py-1">Alteración de Movilidad</td>
                                                        <td class="px-2 py-1" style="text-align: center;">AM</td>
                                                        <td class="px-2 py-1">
                                                            <input type="checkbox" @checked(in_array('alteración_de_movilidad', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (in_array('dolor', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                    <tr style="border: 1px solid;">
                                                        <td>Dolor</td>
                                                        <td style="text-align: center;">DO</td>
                                                        <td>
                                                            <input type="checkbox" @checked(in_array('dolor', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (in_array('amputación', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))
                                                    <tr style="border: 1px solid;">
                                                        <td>Amputación</td>
                                                        <td style="text-align: center;">AP</td>
                                                        <td>
                                                            <input type="checkbox" @checked(in_array('amputación', json_decode($phase8->exploracion_fisica ?? '[]', true) ?? []))>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </td>
                                    <!-- Zona de Lesión -->
                                    <td>
                                        {{-- ZONAS DE LESIÓN --}}
                                        <table>
                                            <tr>
                                                <th>Zonas de Lesión</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="data:image/png;base64,{{ $phase8_zona_capturas }}"
                                                        width="150" alt="Imagen del material médico"
                                                        class="material-img">
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                    <!--Pupilas -->
                                    <td>
                                        <table style="width: 100%; border-collapse: collapse;">
                                            <thead>
                                                <tr>
                                                    <th colspan="2"
                                                        style="border-bottom: 1px solid; text-align: center; font-weight: bold;">
                                                        Pupilas</th>
                                                </tr>
                                                <tr style=" border-bottom: 1px solid #000; ">
                                                    <th style="width: 100%;font-weight: bold; text-align: center;">
                                                        <table>
                                                            <tr style="width: 100%; text-align: center;">
                                                                <th
                                                                    style="width: 100%; text-align: center; display: flex; justify-content: space-between; padding: 0px 5px;">
                                                                    <span
                                                                        style="text-align: left; margin-right: 22px;">D</span>
                                                                    <span
                                                                        style="text-align: right; margin-right: 10px;">I</span>
                                                                </th>
                                                            </tr>
                                                        </table>
                                                    </th>
                                                    <th></th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td
                                                        style="padding: 5px; text-align: center; vertical-align: middle;">
                                                        <img src="{{ public_path('images/recursos/ojos2.jpg') }}"
                                                            width="50" alt="Ojos 1"
                                                            style="border-radius: 8px;">
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <input type="checkbox" name="ojos" id="ojos1"
                                                            {{ $phase8->valor == '1' ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 5px; text-align: center; vertical-align: middle;">
                                                        <img src="{{ public_path('images/recursos/ojos5.jpg') }}"
                                                            width="50" alt="Ojos 2"
                                                            style="border-radius: 8px;">
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <input type="checkbox" name="ojos" id="ojos2"
                                                            value="2"
                                                            {{ $phase8->valor == '2' ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 5px; text-align: center; vertical-align: middle;">
                                                        <img src="{{ public_path('images/recursos/ojos4.jpg') }}"
                                                            width="50" alt="Ojos 3"
                                                            style="border-radius: 8px;">
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <input type="checkbox" name="ojos" id="ojos3"
                                                            value="3"
                                                            {{ $phase8->valor == '3' ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 5px; text-align: center; vertical-align: middle;">
                                                        <img src="{{ public_path('images/recursos/dilatados.jpg') }}"
                                                            width="50" alt="Ojos 4"
                                                            style="border-radius: 8px;">
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <input type="checkbox" name="ojos" id="ojos4"
                                                            value="4"
                                                            {{ $phase8->valor == '4' ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 5px; text-align: center; vertical-align: middle;">
                                                        <img src="{{ public_path('images/recursos/ojos3.jpg') }}"
                                                            width="50" alt="Ojos 5"
                                                            style="border-radius: 8px;">
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <input type="checkbox" name="ojos" id="ojos5"
                                                            value="5"
                                                            {{ $phase8->valor == '5' ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <table class="table-auto border-collapse" style="width: 100%; text-align: center; border-spacing: 0; ">
                                            <thead>
                                                <tr>
                                                    <th colspan="11" style="  font-size: 10px; font-weight: bold; text-align: center; border-bottom: 1px solid #000;">SIGNOS VITALES Y MONITOREO</th>
                                                </tr>
                                                <tr style="font-size: 8px;">
                                                    <th style="  border-bottom: 1px solid #ccc;">HORA</th>
                                                    <th style="border-bottom: 1px solid #ccc;">FR</th>
                                                    <th style="border-bottom: 1px solid #ccc;">FC</th>
                                                    <th style="border-bottom: 1px solid #ccc;">TAS</th>
                                                    <th style="border-bottom: 1px solid #ccc;">TAD</th>
                                                    <th style="border-bottom: 1px solid #ccc;">SpO2</th>
                                                    <th style="border-bottom: 1px solid #ccc;">TEMP</th>
                                                    <th style="border-bottom: 1px solid #ccc;">GLUC</th>
                                                    <th style="border-bottom: 1px solid #ccc;">GLASGOW</th>
                                                    <th style=" border-bottom: 1px solid #ccc;">TRAUMA SCORE</th>
                                                    <th style="  border-bottom: 1px solid #ccc;">EKG</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Ejemplo de contenido de la tabla -->
                                                <tr>
                                                    <td style="padding: 5px; font-size: 11px; border-bottom: 1px solid #eee;">12:00</td>
                                                    <td style="padding: 5px; font-size: 11px; border-bottom: 1px solid #eee;">18</td>
                                                    <td style="padding: 5px; font-size: 11px; border-bottom: 1px solid #eee;">80</td>
                                                    <td style="padding: 5px; font-size: 11px; border-bottom: 1px solid #eee;">120</td>
                                                    <td style="padding: 5px; font-size: 11px; border-bottom: 1px solid #eee;">80</td>
                                                    <td style="padding: 5px; font-size: 11px; border-bottom: 1px solid #eee;">95%</td>
                                                    <td style="padding: 5px; font-size: 11px; border-bottom: 1px solid #eee;">36.5°C</td>
                                                    <td style="padding: 5px; font-size: 11px; border-bottom: 1px solid #eee;">110</td>
                                                    <td style="padding: 5px; font-size: 11px; border-bottom: 1px solid #eee;">15</td>
                                                    <td style="padding: 5px; font-size: 11px; border-bottom: 1px solid #eee;">8</td>
                                                    <td style="padding: 5px; font-size: 11px; border-bottom: 1px solid #eee;">Normal</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>


                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- LADO IZQUIERDO --}}
                <div style=" width: 49%; margin-right: 5px;">
                    <div style="border: 1px solid; padding: 0 5px; width: 97.5%; ">
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
                                        @if (
                                            !is_null($phase1->hora_llamada) ||
                                                !is_null($phase1->hora_despacho) ||
                                                !is_null($phase1->hora_arribo) ||
                                                !is_null($phase1->hora_traslado) ||
                                                !is_null($phase1->hora_hospital) ||
                                                !is_null($phase1->hora_disponible))
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
                                                            @if ($phase1->hora_llamada)
                                                                {{ date('h:i', strtotime($phase1->hora_llamada)) }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($phase1->hora_despacho)
                                                                {{ date('h:i', strtotime($phase1->hora_despacho)) }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($phase1->hora_arribo)
                                                                {{ date('h:i', strtotime($phase1->hora_arribo)) }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($phase1->hora_traslado)
                                                                {{ date('h:i', strtotime($phase1->hora_traslado)) }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($phase1->hora_hospital)
                                                                {{ date('h:i', strtotime($phase1->hora_hospital)) }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($phase1->hora_disponible)
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
                                                        <th colspan="6" style="padding: 5px;">MOTIVO DE LA ATENCIÓN
                                                        </th>
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
                                                                        {{ $phase1->lugar_ocurrencia == 'viapublica' ? 'checked' : '' }}>
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
                    <div style="margin-top: 2px; ">
                        @if (
                            !is_null($phase2->ambulance_id) ||
                                !is_null($phase2->chofer_id) ||
                                !is_null($phase2->paramedico_id) ||
                                !is_null($phase2->helicoptero_id))
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

                                    @if ($phase4->tipo_accidente == 'automovilistico')
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
                                        <td colspan="4"
                                            style="text-align: center; padding: 5px; font-weight: bold; border-bottom: 1px solid;">
                                            V CAUSA CLÍNICA
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" style="text-align: left; padding: 5px;">ORIGEN PROBABLE:
                                        </th>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="padding: 5px;">
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

                                    <tr>
                                        <th style="text-align: left; padding: 5px;">ESPECIFICAR:</th>
                                        <td style="border-bottom: 1px solid; padding: 5px;">
                                            {{ $phase5->especificarOrigen ?? 'No disponible' }}</td>
                                    </tr>

                                    <tr>
                                        <td style="width: 40%; padding: 5px;">
                                            <span style="font-weight: 700;">1° VEZ:</span>
                                            <span
                                                style="display: inline-block; border-bottom: 1px solid; width: 70%; padding: 2px 0;">
                                                {{ $phase5->primeravez ?? 'No disponible' }}
                                            </span>
                                        </td>
                                        <td style="width: 60%; padding: 5px;">
                                            <span style="font-weight: 700;">SUBSECUENTE:</span>
                                            <span
                                                style="display: inline-block; border-bottom: 1px solid; width: 60%; padding: 2px 0;">
                                                {{ $phase5->subsecuente ?? 'No disponible' }}
                                            </span>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div>

                        <div style="clear: both;"></div>

                        <div style=" width: 100%;">
                            <div style="float: left; border: 1px solid; width: 100%;">
                                <!-- Tabla de Causa Clinica -->
                                <table style="width: 100%; font-size: 10px; border-collapse: collapse; padding: 5px;">
                                    @if (
                                        !is_null($phase6->gesta) ||
                                            !is_null($phase6->cesareas) ||
                                            !is_null($phase6->para) ||
                                            !is_null($phase6->aborto) ||
                                            !is_null($phase6->semanas) ||
                                            !is_null($phase6->fechaParto) ||
                                            !is_null($phase6->membranas) ||
                                            !is_null($phase6->fum) ||
                                            !is_null($phase6->horaContracciones) ||
                                            !is_null($phase6->frecuencia) ||
                                            !is_null($phase6->duracion))
                                        <tr>
                                            <td colspan="2"
                                                style="text-align: center; padding: 5px; font-weight: bold; border-bottom: 1px solid;">
                                                VII PARTO
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="2" style="text-align: left; padding: 5px;">DATOS DE LA
                                                MADRE:
                                            </th>
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
                                                                <p
                                                                    style=" font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                    {{ $phase6->gesta ?? 'No disponible' }}
                                                                </p>
                                                            </td>
                                                            <td style="font-size: 6px; text-align: center;">
                                                                CESAREAS
                                                            </td>
                                                            <td>
                                                                <p
                                                                    style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                    {{ $phase6->cesareas ?? 'No disponible' }}
                                                                </p>
                                                            </td>

                                                            <td style="font-size: 6px; text-align: center;">
                                                                PARA
                                                            </td>
                                                            <td>
                                                                <p
                                                                    style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                    {{ $phase6->para ?? 'No disponible' }}
                                                                </p>
                                                            </td>
                                                            <td style="font-size: 6px; text-align: center;">
                                                                ABORTO
                                                            </td>
                                                            <td>
                                                                <p
                                                                    style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                    {{ $phase6->aborto ?? 'No disponible' }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td colspan="2"
                                                                style=" font-size: 6px; text-align: center;">
                                                                SEMANAS DE GESTIÓN
                                                            </td>
                                                            <td colspan="2">
                                                                <p
                                                                    style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                    {{ $phase6->semanas ?? 'No disponible' }}
                                                                </p>
                                                            </td>

                                                            <td colspan="2"
                                                                style="font-size: 6px; text-align: center;">
                                                                FECHA POBABLE DE PARTO
                                                            </td>
                                                            <td colspan="2">
                                                                <p
                                                                    style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                    {{ $phase6->semanas ?? 'No disponible' }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td colspan="2"
                                                                style=" font-size: 6px; text-align: center;">
                                                                MEMBRANAS
                                                            </td>
                                                            <td colspan="2">
                                                                <p
                                                                    style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                    {{ $phase6->membranas ?? 'No disponible' }}
                                                                </p>
                                                            </td>

                                                            <td colspan="2"
                                                                style="font-size: 6px; text-align: center;">
                                                                F.U.M
                                                            </td>
                                                            <td colspan="2">
                                                                <p
                                                                    style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                    {{ $phase6->fum ?? 'No disponible' }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"
                                                                style=" font-size: 6px;  text-align: center;">
                                                                HORA DE INICIO DE CONTRACCIONES:
                                                            </td>
                                                            <td>
                                                                <p
                                                                    style=" font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                    {{ $phase6->horaContracciones ?? 'No disponible' }}
                                                                </p>
                                                            </td>
                                                            <td style="font-size: 6px; text-align: center;">
                                                                FRECUENCIA:
                                                            </td>
                                                            <td>
                                                                <p
                                                                    style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                    {{ $phase6->frecuencia ?? 'No disponible' }}
                                                                </p>
                                                            </td>

                                                            <td style="font-size: 6px; text-align: center;">
                                                                DURACIÓN:
                                                            </td>
                                                            <td>
                                                                <p
                                                                    style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                    {{ $phase6->duracion ?? 'No disponible' }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>





                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    @if (!is_null($phase6->horanacimiento) || !is_null($phase6->lugar_post_parto) || !is_null($phase6->placenta_expulsada))
                                        <tr>
                                            <th colspan="2" style="text-align: left; padding: 5px;"> DATOS POST
                                                PARTO:
                                            </th>
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
                                                                <p
                                                                    style=" font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                    {{ $phase6->horanacimiento ?? 'No disponible' }}
                                                                </p>
                                                            </td>
                                                            <td style="font-size: 6px; text-align: center;">
                                                                LUGAR
                                                            </td>
                                                            <td>
                                                                <p
                                                                    style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                    {{ $phase6->lugar_post_parto ?? 'No disponible' }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td style=" font-size: 6px; text-align: center;">
                                                                PLACENTA EXPULSADA
                                                            </td>
                                                            <td colspan="2">
                                                                <p
                                                                    style="font-size: 6px; border-bottom: 1px solid; text-align:  center; ">
                                                                    {{ $phase6->placenta_expulsada ?? 'No disponible' }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>





                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    @if (!is_null($phase6->estado_producto) || !is_null($phase6->genero_producto))
                                        <tr>
                                            <th colspan="2" style="text-align: left; padding: 5px;">DATOS DEL
                                                RECIÉN
                                                NACIDO:</th>
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
                                                            <td
                                                                style="border: 1px solid black; padding: 0; text-align: center;">
                                                                <div
                                                                    style="display: flex; padding-top: 4px; padding-bottom: 4px; justify-content: space-between; align-items: center; height: 1%;">
                                                                    <!-- Número 1 -->
                                                                    <div
                                                                        style=" float: left;  border-right: 1px solid black; width: 30%; padding: 0; margin: 0;">
                                                                        1
                                                                        @if ($phase6->estado_producto === 'vivo')
                                                                            X
                                                                        @endif
                                                                    </div>
                                                                    <!-- Estado del Producto -->
                                                                    <div
                                                                        style=" float: right; width: 70%;  padding-left: 10px;">
                                                                        VIVO
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td
                                                                style="border: 1px solid black; padding: 0; text-align: center;">
                                                                <div
                                                                    style="display: flex; padding-top: 4px; padding-bottom: 4px; justify-content: space-between; align-items: center; height: 1%;">
                                                                    <!-- Número 1 -->
                                                                    <div
                                                                        style=" float: left;  border-right: 1px solid black; width: 30%; padding: 0; margin: 0;">
                                                                        2
                                                                        @if ($phase6->estado_producto === 'muerto')
                                                                            X
                                                                        @endif
                                                                    </div>
                                                                    <!-- Estado del Producto -->
                                                                    <div
                                                                        style=" float: right; width: 70%;  padding-left: 10px;">
                                                                        MUERTO
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <!-- Primera Celda: Producto -->
                                                            <td style=" padding: 0 2px;">
                                                                GENERO
                                                            </td>
                                                            <!-- Segunda Celda: Valor Numérico y Estado -->
                                                            <td
                                                                style="border: 1px solid black; padding: 0; text-align: center;">
                                                                <div
                                                                    style="display: flex; padding-top: 4px; padding-bottom: 4px; justify-content: space-between; align-items: center; height: 1%;">
                                                                    <!-- Número 1 -->
                                                                    <div
                                                                        style=" float: left;  border-right: 1px solid black; width: 30%; padding: 0; margin: 0;">
                                                                        1
                                                                        @if ($phase6->genero_producto === 'masculino')
                                                                            X
                                                                        @endif
                                                                    </div>
                                                                    <!-- Estado del Producto -->
                                                                    <div
                                                                        style=" float: right; width: 70%;  padding-left: 10px;">
                                                                        MASC
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td
                                                                style="border: 1px solid black; padding: 0; text-align: center;">
                                                                <div
                                                                    style="display: flex; padding-top: 4px; padding-bottom: 4px; justify-content: space-between; align-items: center; height: 1%;">
                                                                    <!-- Número 1 -->
                                                                    <div
                                                                        style=" float: left;  border-right: 1px solid black; width: 30%; padding: 0; margin: 0;">
                                                                        2
                                                                        @if ($phase6->genero_producto === 'femenino')
                                                                            X
                                                                        @endif
                                                                    </div>
                                                                    <!-- Estado del Producto -->
                                                                    <div
                                                                        style=" float: right; width: 70%;  padding-left: 10px;">
                                                                        FEM
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                    @endif
                                    @if (!is_null($phase6->apgar1) || !is_null($phase6->apgar5))
                                        <tr>
                                            <!-- Primera Celda: Producto -->
                                            <td style=" padding: 0 2px;">
                                                APGAR
                                            </td>
                                            <!-- Segunda Celda: Valor Numérico y Estado -->
                                            <td style="border: 1px solid black; padding: 0; text-align: center;">
                                                <div
                                                    style="display: flex; padding-top: 4px; padding-bottom: 4px; justify-content: space-between; align-items: center; height: 1%;">
                                                    <!-- Número 1 -->
                                                    <div
                                                        style=" float: left;  border-right: 1px solid black; width: 30%; padding: 0; margin: 0;">
                                                        1
                                                    </div>
                                                    <!-- Estado del Producto -->
                                                    <div style=" float: right; width: 70%;  padding-left: 10px;">
                                                        {{ $phase6->apgar1 ?? '' }}
                                                    </div>

                                                </div>
                                            </td>

                                            <td style="border: 1px solid black; padding: 0; text-align: center;">
                                                <div
                                                    style="display: flex; padding-top: 4px; padding-bottom: 4px; justify-content: space-between; align-items: center; height: 1%;">
                                                    <!-- Número 1 -->
                                                    <div
                                                        style=" float: left;  border-right: 1px solid black; width: 30%; padding: 0; margin: 0;">
                                                        2
                                                    </div>
                                                    <!-- Estado del Producto -->
                                                    <div style=" float: right; width: 70%;  padding-left: 10px;">
                                                        {{ $phase6->apgar5 ?? '' }}
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



            </div>

            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
            <style>
                #bodyCanvas {
                    display: block;
                    margin: auto;
                }

                .border {
                    border: 1px solid #ccc;
                    border-radius: 5px;
                }

                ul {
                    padding-left: 0;
                }

                li {
                    margin-bottom: 4px;
                }
            </style>

            <script>
                document.getElementById('lugar_ocurrencia').addEventListener('change', function() {
                    const otroLugarDiv = document.getElementById('otro_lugar');
                    if (this.value === 'otro') {
                        otroLugarDiv.style.display = 'block';
                    } else {
                        otroLugarDiv.style.display = 'none';
                        document.getElementById('otro_lugar').value = ''; // Limpia el campo si se oculta
                    }
                });

                document.getElementById('origen_probable').addEventListener('change', function() {
                    const btnphase6 = document.getElementById('btnphase6');
                    if (this.value === 'gineco_obstetrica') {
                        btnphase6.style.display = 'block';
                    } else {
                        btnphase6.style.display = 'none';
                    }
                });

                document.getElementById('asistencia_ventilatoria').addEventListener('change', function() {
                    const ventiladorOpciones = document.getElementById('ventilador_opciones');
                    if (this.value === 'ventilador_automatico') {
                        ventiladorOpciones.classList.remove('hidden');
                    } else {
                        ventiladorOpciones.classList.add('hidden');
                    }
                });

                const edadInput = document.getElementById('edad');
                const mesesContainer = document.getElementById('meses-container');
                const mesesInput = document.getElementById('meses');

                edadInput.addEventListener('input', () => {
                    const edad = parseInt(edadInput.value);
                    if (edad === 0) {
                        mesesContainer.style.display = 'block'; // Muestra el campo de meses
                    } else {
                        mesesContainer.style.display = 'none'; // Oculta el campo de meses
                        mesesInput.value = ''; // Limpia el valor del campo de meses
                    }
                });

                document.getElementById('agente_causal').addEventListener('change', function() {
                    const especificarOtro = document.getElementById('especificar_otro');
                    if (this.value === 'otro') {
                        especificarOtro.style.display = 'block';
                    } else {
                        especificarOtro.style.display = 'none';
                    }
                });

                function mostrarDetallesAccidente() {
                    var tipoAccidente = document.getElementById("tipo_accidente").value;

                    // Ocultar todos los divs de accidentes
                    var todosAccidentes = document.querySelectorAll('[id^="accidente_"]');
                    todosAccidentes.forEach(function(detalle) {
                        detalle.style.display = "none";
                    });

                    // Mostrar los divs correspondientes al tipo seleccionado
                    var detallesSeleccionados = document.querySelectorAll('[id^="accidente_' + tipoAccidente + '"]');
                    detallesSeleccionados.forEach(function(detalle) {
                        detalle.style.display = "block";
                    });
                }


                function marcarZona(zona) {
                    const lista = document.getElementById('listaZonas');
                    const item = document.createElement('li');
                    item.textContent = zona;
                    lista.appendChild(item);
                }

                document.addEventListener('DOMContentLoaded', function() {
                    const buttons = document.querySelectorAll('.btn-nav');
                    const phases2 = document.querySelectorAll('.phase');

                    // Función para ocultar todas las fases
                    function hideAllPhases() {
                        phases2.forEach(phase => {
                            phase.style.display = 'none';
                        });
                    }

                    // Agregar evento a cada botón
                    buttons.forEach(button => {
                        button.addEventListener('click', function() {
                            const targetId = this.getAttribute(
                                'data-target'); // Obtener el ID de la fase objetivo
                            hideAllPhases();
                            document.getElementById(targetId).style.display =
                                'block'; // Mostrar la fase seleccionada
                        });
                    });
                });

                document.addEventListener('DOMContentLoaded', function() {
                    // Seleccionar todos los encabezados de secciones
                    const toggleSections = document.querySelectorAll('.toggle-section');

                    toggleSections.forEach(toggle => {
                        toggle.addEventListener('click', function() {
                            // Buscar el contenido de la sección asociada
                            const sectionContent = this.nextElementSibling;
                            const icon = this.querySelector('svg');

                            // Alternar la visibilidad del contenido
                            if (sectionContent.style.display === 'none' || !sectionContent.style.display) {
                                sectionContent.style.display = 'block';
                                icon.classList.add('rotate-180'); // Rotar el ícono
                            } else {
                                sectionContent.style.display = 'none';
                                icon.classList.remove('rotate-180'); // Restaurar la rotación
                            }
                        });
                    });
                });

                // Función para añadir una nueva fila a la tabla
                function addPharmaRow() {
                    const tableBody = document.getElementById('pharmaTableBody');
                    const newRow = `
                        <tr>
                            <td class="border border-gray-400 px-4 py-2">
                                <input type="time" name="hora[]" class="form-control w-full border border-gray-400 rounded-md">
                            </td>
                            <td class="border border-gray-400 px-4 py-2">
                                <input type="text" name="medicamento[]" class="form-control w-full border border-gray-400 rounded-md">
                            </td>
                            <td class="border border-gray-400 px-4 py-2">
                                <input type="text" name="dosis[]" class="form-control w-full border border-gray-400 rounded-md">
                            </td>
                            <td class="border border-gray-400 px-4 py-2">
                                <input type="text" name="via_administracion[]" class="form-control w-full border border-gray-400 rounded-md">
                            </td>
                            <td class="border border-gray-400 px-4 py-2">
                                <input type="text" name="terapia_electrica[]" class="form-control w-full border border-gray-400 rounded-md">
                            </td>
                        </tr>
                    `;
                    tableBody.insertAdjacentHTML('beforeend', newRow);
                }

                const canvas = document.getElementById('bodyCanvas');
                const ctx = canvas.getContext('2d');
                const listaZonas = document.getElementById('listaZonas');
                const coordinate = document.getElementById('coordinate');
                const zonaslabel = document.getElementById('zonaslabel');

                // Imagen del cuerpo humano
                const bodyImage = new Image();

                const bodyImage2 = new Image();

                // Puntos permitidos con coordenadas predefinidas

                const allowedPoints = [{
                        x: 100,
                        y: 20,
                        label: "Cabeza"
                    },
                    {
                        x: 60,
                        y: 90,
                        label: "Hombro Derecho"
                    },
                    {
                        x: 140,
                        y: 90,
                        label: "Hombro Izquierdo"
                    },
                    {
                        x: 45,
                        y: 160,
                        label: "Brazo Derecho"
                    },
                    {
                        x: 155,
                        y: 160,
                        label: "Brazo Izquierdo"
                    },
                    {
                        x: 100,
                        y: 105,
                        label: "Tórax"
                    },
                    {
                        x: 100,
                        y: 157,
                        label: "Abdomen"
                    },
                    {
                        x: 100,
                        y: 210,
                        label: "Genitales"
                    },
                    {
                        x: 85,
                        y: 300,
                        label: "Rodilla Derecha"
                    },
                    {
                        x: 115,
                        y: 300,
                        label: "Rodilla Izquierda"
                    },
                    {
                        x: 85,
                        y: 390,
                        label: "Pie Derecha"
                    },
                    {
                        x: 110,
                        y: 390,
                        label: "Pie Izquierda"
                    }
                ];

                const allowedPoints2 = [{
                        x: 300,
                        y: 50,
                        label: "Nuca"
                    },
                    {
                        x: 300,
                        y: 105,
                        label: "Espalda"
                    },
                    {
                        x: 300,
                        y: 160,
                        label: "Cadera"
                    },
                    {
                        x: 220,
                        y: 220,
                        label: "Mano Derecho"
                    },
                    {
                        x: 380,
                        y: 220,
                        label: "Mano Izquierdo"
                    },
                    {
                        x: 285,
                        y: 260,
                        label: "Muslo Derecha"
                    },
                    {
                        x: 320,
                        y: 260,
                        label: "Muslo Izquierda"
                    },
                    {
                        x: 285,
                        y: 330,
                        label: "Pantorilla Derecha"
                    },
                    {
                        x: 320,
                        y: 330,
                        label: "Pantorilla Izquierda"
                    },
                    {
                        x: 85,
                        y: 390,
                        label: "Pie Derecha"
                    },
                    {
                        x: 110,
                        y: 390,
                        label: "Pie Izquierda"
                    },
                ];

                const marks = []; // Almacena las marcas realizadas

                // Dibujar la imagen del cuerpo humano en el canvas
                bodyImage.onload = function() {
                    ctx.drawImage(bodyImage, 0, 0, 200, canvas.height);
                    allowedPoints.forEach(point => {
                        drawCircle(point.x, point.y);
                    });
                };
                bodyImage.src =
                "{{ public_path('images/cuerpo1.png') }}"; // Asegúrate de que la imagen esté en el mismo directorio o ajusta la ruta.
                const dataURL = canvas.toDataURL('image/png');
                bodyImage2.onload = function() {
                    ctx.drawImage(bodyImage2, 200, 0, 200, canvas.height);
                    allowedPoints2.forEach(point => {
                        drawCircle(point.x, point.y);
                    });
                };
                bodyImage2.src = "{{ public_path('images/cuerpo2.png') }}";

                // Dibujar una marca en un punto permitido
                function drawMark(x, y) {
                    ctx.beginPath();
                    ctx.arc(x, y, 7, 0, Math.PI * 2); // Círculo con radio 5
                    ctx.fillStyle = 'red';
                    ctx.fill();
                    ctx.strokeStyle = 'white';
                    ctx.lineWidth = 2;
                    ctx.stroke();
                }

                function dropMark(x, y) {
                    ctx.beginPath();
                    ctx.arc(x, y, 8, 0, Math.PI * 2); // Círculo con radio 5
                    ctx.fillStyle = 'white';
                    ctx.fill();
                    ctx.strokeStyle = 'black';
                    ctx.lineWidth = 2;
                    ctx.stroke();
                }

                function drawCircle(x, y) {
                    ctx.beginPath();
                    ctx.arc(x, y, 8, 0, Math.PI * 2); // Círculo con radio 5
                    ctx.strokeStyle = 'black';
                    ctx.lineWidth = 2;
                    ctx.stroke();
                }

                // Actualizar la lista de puntos marcados

                function actualizarMarcas() {
                    const coordenadas = [];
                    const zonas = [];
                    listaZonas.innerHTML = '';
                    coordinate.value = '';
                    zonaslabel.value = ''
                    marks.forEach((mark, index) => {
                        const item = document.createElement('li');
                        coordenadas.push(`(${mark.x}, ${mark.y})`);
                        zonas.push(`${mark.label}`);
                        item.textContent = `Zona ${index + 1}: ${mark.label}`;
                        listaZonas.appendChild(item);
                    });
                    coordinate.value = coordenadas.join(' | ');
                    zonaslabel.value = zonas.join(' | ');
                }

                // Manejar clics en el canvas
                canvas.addEventListener('click', function(event) {
                    const rect = canvas.getBoundingClientRect();
                    const x = event.clientX - rect.left; // Coordenada X relativa
                    const y = event.clientY - rect.top; // Coordenada Y relativa

                    // Buscar si el clic está cerca de algún punto permitido
                    const clickedPoint = allowedPoints.find(
                        point => Math.sqrt((point.x - x) ** 2 + (point.y - y) ** 2) <= 10
                    );

                    const clickedPoint2 = allowedPoints2.find(
                        point => Math.sqrt((point.x - x) ** 2 + (point.y - y) ** 2) <= 10
                    );

                    if (clickedPoint) {
                        // Verificar si ya está marcado
                        const existingMarkIndex = marks.findIndex(mark => mark.x === clickedPoint.x && mark.y ===
                            clickedPoint.y);

                        if (existingMarkIndex !== -1) {
                            // Si ya está marcado, quitar la marca
                            dropMark(clickedPoint.x, clickedPoint.y);
                            marks.splice(clickedPoint, 1);
                        } else {
                            // Si no está marcado, agregar la marca
                            marks.push(clickedPoint);
                            drawMark(clickedPoint.x, clickedPoint.y);
                        }
                        actualizarMarcas(); // Actualizar la lista de zonas
                    }

                    if (clickedPoint2) {
                        // Verificar si ya está marcado
                        const existingMarkIndex = marks.findIndex(mark => mark.x === clickedPoint2.x && mark.y ===
                            clickedPoint2.y);

                        if (existingMarkIndex !== -1) {
                            // Si ya está marcado, quitar la marca
                            dropMark(clickedPoint2.x, clickedPoint2.y);
                            marks.splice(clickedPoint2, 1);
                        } else {
                            // Si no está marcado, agregar la marca
                            marks.push(clickedPoint2);
                            drawMark(clickedPoint2.x, clickedPoint2.y);
                        }
                        actualizarMarcas(); // Actualizar la lista de zonas
                    }
                });
            </script>
        </main>
    </div>

    @livewireScripts
</body>

</html>
