<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receta Médica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            display: flex; /* Usar flexbox en el body */
            justify-content: center; /* Centrar horizontalmente */
            align-items: flex-start; /* Alinear al inicio en vertical */
            height: 100vh; /* Altura completa de la ventana */
        }
        .page {
            width: 100%; /* Ancho del contenedor, puedes ajustarlo según tus necesidades */
            max-width: 900px; /* Ancho máximo para pantallas grandes */
            height: auto;
            display: flex;
            flex-direction: column; /* Asegúrate de que los elementos se apilen verticalmente */
            border: 2px solid #000;
            padding: 15px;
            box-sizing: border-box;
            border-radius: 10px; /* Bordes redondeados */
            background-color: #fff; /* Fondo blanco para la receta */
            margin: -20px; /* Margen para separar del borde de la ventana */
            margin-top: -4%;
        }


        .header {
            margin-bottom: 10px;
            align-items: center;
            height: 10%;
            justify-content: center;
            position: relative; /* Necesario para el pseudo-elemento */
        }

        .contentPaciente {
            align-items: center;
            justify-content: center;
            position: relative; /* Necesario para el pseudo-elemento */
        }

        .header::after {
            content: ''; /* Crear el pseudo-elemento */
            position: absolute;
            left: -15px; /* Alinear a la izquierda */
            bottom: 0; /* Alinear en la parte inferior */
            width: 104%; /* Ancho completo del header */
            height: 5px; /* Altura del borde inferior */
            border-bottom: 4px double; /* Borde doble de 3px */
            border-color: #000; /* Color del borde */
        }

        .header-text {
            display: inline-flex;
            width: 55%;
            text-align: center;
            float: left;
            font-size: 15px;
            white-space: nowrap; /* Evita que el texto se divida en líneas */
        }

        .header-text > * {
            margin: 0; /* Elimina márgenes entre los elementos hijos */
            padding: 0; /* Elimina padding entre los elementos hijos */
        }

        .header-img{
            text-align: center;
            float: left;
            width: 20%;
            display: inline-block;
            padding: 0;
            margin: 0;
            margin-top: -8px;
        }

        .folio-container {
            width: 25%; /* Ancho del contenedor */
            text-align: center; /* Centrar texto */
            float: right; /* Asegura que flote a la derecha */
            justify-content: center;
            display: flex; /* Usar flexbox para centrar */
            flex-direction: column; /* Apilar elementos en columna */
            align-items: center; /* Centrar horizontalmente */
        }

        .folio-container p{
            font-size: 10px;
        }

        .folio-container > * {
            margin: 0; /* Elimina márgenes entre los elementos hijos */
            padding: 0; /* Elimina padding entre los elementos hijos */
        }

        .folio {
            border: 2px solid #000; /* Borde más grueso y claro */
            margin: 0;
            background-color: #fff; /* Fondo blanco para el folio */
            border-radius: 8px; /* Bordes redondeados */
            width: 90%; /* Hacerlo ocupar el 100% del contenedor */
            text-align: center; /* Centrar texto */
            justify-content: center;
            margin-left: 10px;
        }


        .foliotext {
            background-color: #000; /* Fondo negro */
            color: #fff; /* Texto blanco */
            font-weight: bold; /* Texto en negrita */
            padding: 1px 0; /* Espaciado interno superior e inferior */
            letter-spacing: 10px; /* Espaciado de letras ajustado */
            text-align: center; /* Centrar texto */
            font-size: 18px; /* Tamaño de fuente ajustado */
            border-radius: 4px; /* Bordes redondeados */
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3); /* Sombra suave */
            margin: 0; /* Sin margen para que se ajuste bien */
        }


        .folioid {
            font-size: 24px; /* Tamaño de fuente más grande */
            color: red; /* Color del ID */
            font-weight: bold; /* Negrita */
            margin-top: 5px; /* Espacio superior para separación */
        }

        .content {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .section {
            width: 48%;
        }

        .field-label {
            font-weight: bold;
        }

        h3 {
            margin-top: 10px;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .final{
            margin-top: 5%;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            padding: 0 2px;
            border: 5px double #000; /* Borde doble de 3px */
        }

        .footer > * {
            margin: 0; /* Elimina márgenes entre los elementos hijos */
            padding: 0; /* Elimina padding entre los elementos hijos */
        }

        .header-img > * {
            margin: 0; /* Elimina márgenes entre los elementos hijos */
            padding: 0; /* Elimina padding entre los elementos hijos */
        }

        .doctor-info {
            margin-top: 5px; /* Espacio superior para la sección del doctor */
            text-align: center; /* Centrar texto */
        }

        .doctor-info > * {
            margin: 0; /* Elimina márgenes entre los elementos hijos */
            padding: 0; /* Elimina padding entre los elementos hijos */
        }




    </style>
</head>
<body>
    <div class="page">
        <div class="header">
            <div class="header-img">
                <img src="{{ public_path('img/logosvg.png') }}" alt="Logo Cruz Roja" width="70" height="90">
                <p>CHILPANCINGO, GRO.</p>
            </div>
            <div class="header-text">
                <h1>CRUZ ROJA MEXICANA</h1>
                <h2>DELEGACIÓN CHILPANCINGO</h2>
            </div>
            <div class="folio-container">
                <div class="folio">
                    <div class="foliotext">
                        FOLIO
                    </div>
                    <span class="folioid">00{{ $receta->id }}</span>
                </div>
                <p>TELÉFONOS: <strong>472 65 14, 472 65 62</strong></p>
                <p>FECHA: <strong>{{ $receta->created_at->format('d / m / Y') }}</strong></p>
            </div>
        </div>
        <div class="contentPaciente" >
            <table style="width: 100%; border-collapse: collapse; ">
                <tr>
                    <!-- Información del paciente y diagnóstico -->
                    <td style="width: 90%;  vertical-align: top;  border-collapse: collapse; ">
                        <table style="width: 90%;">
                            <tr >
                                <td style="width: 20%;"><span style="font-weight: bold;">NOMBRE:</span></td>
                                <td style="width: 80%;"><p style="margin: 0; padding: 5px 0; border-bottom: 1px solid #000; font-size: 13px;">
                                    {{ $paciente->nombre }} {{ $paciente->apellidopaterno }} {{ $paciente->apellidomaterno }}
                                </p></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span style="font-weight: bold; display: block;">Diagnóstico:</span>
                                    <p style="margin: 5px 0; word-wrap: break-word; line-height: 1.5;">
                                        {{ $receta->diagnostico }}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span style="font-weight: bold; display: block;">Tratamiento:</span>
                                    <ul style="margin: 0; padding: 0; list-style-type: none;">
                                        @foreach($medicamentosArray as $medicamento)
                                            <li style="margin-bottom: 5px; padding: 2px;">
                                                <span style="font-weight: bold;">* </span>{{ $medicamento }}
                                            </li>
                                        @endforeach
                                    </ul>

                                </td>
                            </tr>
                        </table>
                    </td>

                    <!-- Signos vitales -->
                    <td style="width: 25%; ">
                        <table style="width: 100%; border-collapse: collapse;">
                            <tr>
                                <td><span style="font-weight: bold;">T/A:</span></td>
                                <td>
                                    <p style="margin: 0; border-bottom: 1px solid #000; padding: 2px;">
                                        {{ $receta->presion_arterial }}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: bold;">Temp:</span></td>
                                <td>
                                    <p style="margin: 0; border-bottom: 1px solid #000; padding: 2px;">
                                        {{ $receta->temperatura }} °C
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: bold;">Talla:</span></td>
                                <td>
                                    <p style="margin: 0; border-bottom: 1px solid #000; padding: 2px;">
                                        {{ $receta->talla }} cm
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: bold;">Peso:</span></td>
                                <td>
                                    <p style="margin: 0; border-bottom: 1px solid #000; padding: 2px;">
                                        {{ $receta->peso }} kg
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: bold;">FC:</span></td>
                                <td>
                                    <p style="margin: 0; border-bottom: 1px solid #000; padding: 2px;">
                                        {{ $receta->frecuencia_cardiaca }} bpm
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: bold;">FR:</span></td>
                                <td>
                                    <p style="margin: 0; border-bottom: 1px solid #000; padding: 2px;">
                                        {{ $receta->frecuencia_respiratoria }} rpm
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: bold;">SPO2:</span></td>
                                <td>
                                    <p style="margin: 0; border-bottom: 1px solid #000; padding: 2px;">
                                        {{ $receta->saturacion_oxigeno }}%
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: bold;">Alergias:</span></td>
                                <td>
                                    <p style="margin: 0; border-bottom: 1px solid #000; padding: 2px;">
                                        {{ $receta->alergia ?? 'Ninguna' }}
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr style="margin-top: 0;">
                    <td colspan="2" style="width: 100%;">
                        <div class="doctor-info" >
                            <h3 style="margin-bottom: 5px;">Dr. {{ $doctor->personal->Nombre }} {{ $doctor->personal->apellido_paterno }} {{ $doctor->personal->apellido_materno }}</h3>
                            <h4 style="margin-bottom: 5px;">Cédula: {{ $doctor->cedulaProfesional }}</h4>
                            <img src="{{ public_path($doctor->rutafirma) }}" alt="Firma del Dr. {{ $doctor->personal->nombre }} {{ $doctor->personal->apellidoPaterno }}" width="150">
                        </div>
                    </td>
                </tr>
                <tr style="margin-top: 0;">
                    <div class="footer" style="width: 30%;">
                        <p style="margin: 0;">FAVOR DE PRESENTAR SU RECETA EN LA PRÓXIMA CONSULTA</p>
                        <p style="margin: 0;">SURTASE EN FARMACIA <span style="font-weight: 700; font-size: 15px;">"CRUZ ROJA"</span></p>
                    </div>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
