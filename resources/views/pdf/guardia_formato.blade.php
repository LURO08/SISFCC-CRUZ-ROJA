<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formato de suplecia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
            margin-top: -20px;
        }

        .header {
            text-align: center;
            padding-top: 0px;
            margin-top: 0px;
        }

        .content {
            text-align: left;
        }

        .header h2,
        .header p {
            margin: 0;
            padding: 0;
        }

        .content-item {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
        }

        .content-item span {
            font-size: 12px;
        }


        .table {
            width: 100%;
            margin: 10px 0;
            border-spacing: 0;
        }

        .table td,
        .table th {
            padding: 4px 0;
            text-align: center;
            font-size: 12px;
        }

        .table th {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header" style="margin-top: -25px;">

        <table style="width: 100%; border-collapse: collapse; margin-bottom: 10px;">
            <tr>
                <!-- Logo -->
                <td>
                    <img src="{{ public_path('img/logo.png') }}" alt="Logo Cruz Roja" style="width: 60px; height: 80px;">
                </td>
                <!-- Información de la Delegación -->
                <td style="width: 25%;">
                    <h2 style="margin: 0; font-size: 1.2em;">Delegación Chilpancingo</h2>
                </td>
                <!-- Título del Formato -->
                <td style="width: 70%; text-align: center; vertical-align: middle; font-size: 1em; font-weight: bold;">
                 <h1>FORMATO DE SUPLENCIA</h1>
                </td>
            </tr>
        </table>

    </div>

    <div class="content-item" style="margin-top: -13px;">
        <table style="margin: 0 auto; width: 100%; ">
            <tr>
                <td style="width: 30%;">
                    <div style="border: 1px solid; border-radius: 20px; padding: 5px; text-align: center;">
                        <table style="margin: 0 auto; ">
                            <tr>
                                <td style="font-weight: bold;">Fecha</td>
                                <td style=" border-bottom: 1px solid; padding: 0 10px;"></td>
                                <td>/</td>
                                <td style=" border-bottom: 1px solid; padding: 0 10px;"></td>
                                <td>/</td>
                                <td style=" border-bottom: 1px solid; padding: 0 10px;"></td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td></td>
                <td style="width: 30%; margin-right: 10px;">
                    <div style="border: 1px solid; border-radius: 20px; width: 100%; padding: 5px; text-align: center; display: inline-block;">
                        <table style="margin: 0 auto; width: 100%; ">
                            <tr style="width: 100%;">
                                <td style="font-weight: bold; width: 20%;">Folio:</td>
                                <td style=" border-bottom: 1px solid; width: 80%;"></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <table style="margin: 0 auto; width: 100%; padding: 10px; margin-top: -10px;">
        <!-- Encabezado -->
        <tr>
            <td colspan="3">
                <table style="width: 100%;">
                    <tr>
                        <th colspan="3" style="padding-top: 10px; text-align: center;">DATOS DEL TRABAJADOR SOLICITANTE</th>
                    </tr>
                    <!-- Espaciado -->
                    <tr>
                        <td colspan="3" style="height: 10px;"></td>
                    </tr>
                    <!-- Nombre y Teléfono -->
                    <tr style="text-align: center;">
                        <td style="border-top: 1px solid; padding: 5px 0;" colspan="2">Nombre completo del trabajador</td>
                        <td style="border-top: 1px solid; padding: 5px 0; width: 15%;">Teléfono</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table style="width: 100%;">
                                <!-- Espaciado -->
                                <tr>
                                    <td colspan="3" style="height: 10px;"></td>
                                </tr>
                                <!-- Correo y Cargos -->
                                <tr style="text-align: center;">
                                    <td style="border-top: 1px solid; padding: 5px 0;" colspan="2">Correo</td>
                                    <td style="border-top: 1px solid; padding: 5px 0; width: 33%;">Cargos</td>
                                </tr>
                                <!-- Espaciado -->
                                <tr>
                                    <td colspan="3" style="height: 10px;"></td>
                                </tr>
                                <!-- Turno, Horario y Departamento -->
                                <tr style="text-align: center;">
                                    <td style="border-top: 1px solid; padding: 5px 0; width: 33%;">Turno</td>
                                    <td style="border-top: 1px solid; padding: 5px 0; width: 33%;">Horario</td>
                                    <td style="border-top: 1px solid; padding: 5px 0; width: 33%;">Departamento</td>
                                </tr>
                            </table>
                        </td>
                        <!-- Firma de conformidad -->
                        <td style="width: 40%; text-align: center;">
                            <table style="border-radius: 15px; border: 1px solid; padding: 5px; margin: 0 auto;">
                                <tr>
                                    <td style="text-align: center; font-size: 10px;">FIRMA DE CONFORMIDAD</td>
                                </tr>
                                <tr>
                                    <td style="height: 20px;"></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; border-top: 1px solid; font-size: 10px;">SOLICITANTE</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>

    </table>



    <table style="margin: 0 auto; width: 100%; padding: 10px; margin-top: -15px;">
        <!-- Encabezado: Datos del trabajador suplente -->
        <tr>
            <td colspan="3">
                <table style="width: 100%;">
                    <tr>
                        <th colspan="3" style=" text-align: center;">DATOS DEL TRABAJADOR SUPLENTE</th>
                    </tr>
                    <!-- Espaciado -->
                    <tr>
                        <td colspan="3" style="height: 10px;"></td>
                    </tr>
                    <!-- Nombre y Teléfono -->
                    <tr style="text-align: center;">
                        <td style="border-top: 1px solid; padding: 5px 0;" colspan="2">Nombre completo del trabajador</td>
                        <td style="border-top: 1px solid; padding: 5px 0; width: 15%;">Teléfono</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table style="width: 100%;">
                                <!-- Espaciado -->
                                <tr>
                                    <td colspan="3" style="height: 10px;"></td>
                                </tr>
                                <!-- Correo y Cargos -->
                                <tr style="text-align: center;">
                                    <td style="border-top: 1px solid; padding: 5px 0;" colspan="2">Correo</td>
                                    <td style="border-top: 1px solid; padding: 5px 0; width: 33%;">Cargos</td>
                                </tr>
                                <!-- Espaciado -->
                                <tr>
                                    <td colspan="3" style="height: 10px;"></td>
                                </tr>
                                <!-- Turno, Horario y Departamento -->
                                <tr style="text-align: center;">
                                    <td style="border-top: 1px solid; padding: 5px 0; width: 33%;">Turno</td>
                                    <td style="border-top: 1px solid; padding: 5px 0; width: 33%;">Horario</td>
                                    <td style="border-top: 1px solid; padding: 5px 0; width: 33%;">Departamento</td>
                                </tr>
                            </table>
                        </td>
                        <!-- Firma de conformidad -->
                        <td style="width: 40%; text-align: center;" >
                            <table style="border-radius: 15px; border: 1px solid; padding: 5px; margin: 0 auto;">
                                <tr>
                                    <td style="text-align: center; font-size: 10px;">FIRMA DE CONFORMIDAD</td>
                                </tr>
                                <tr>
                                    <td style="height: 20px;"></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; border-top: 1px solid; font-size: 10px;">SUPLENTE</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- Fechas de cobertura -->
        <tr style="text-align: center; margin-top: -25px;">
            @if ($dias == 1)
                <td style="width: 70%;">
                        <table style=" width: 50%; margin: 0 auto;">
                            <tr>
                                <td style="padding: 5px 0; width: 40%;">Cubrira el día</td>
                                <td style="border-bottom: 1px solid; padding: 0 10px;"></td>
                                <td>/</td>
                                <td style="border-bottom: 1px solid; padding: 0 10px;"></td>
                                <td>/</td>
                                <td style="border-bottom: 1px solid; padding: 0 20px;"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Día</td>
                                <td></td>
                                <td>Mes</td>
                                <td></td>
                                <td>Año</td>
                            </tr>
                        </table>
                </td>
            @elseif ($dias >= 2)
                <td style="width: 70%;">
                    <div style="padding: 5px;">
                        <table style="margin: 0 auto;">
                            <tr>
                                <td style="padding: 20px 0;">Cubrira el día</td>
                                <td style="border-bottom: 1px solid; padding: 0 10px;"></td>
                                <td>/</td>
                                <td style="border-bottom: 1px solid; padding: 0 10px;"></td>
                                <td>/</td>
                                <td style="border-bottom: 1px solid; padding: 0 20px;"></td>
                                <td style="padding: 0 20px;" rowspan="2">al</td>
                                <td style="border-bottom: 1px solid; padding: 0 10px;"></td>
                                <td>/</td>
                                <td style="border-bottom: 1px solid; padding: 0 10px;"></td>
                                <td>/</td>
                                <td style="border-bottom: 1px solid; padding: 0 20px;"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Día</td>
                                <td></td>
                                <td>Mes</td>
                                <td></td>
                                <td>Año</td>
                                <td>Día</td>
                                <td></td>
                                <td>Mes</td>
                                <td></td>
                                <td>Año</td>
                            </tr>
                        </table>
                    </div>
                </td>
            @endif

            <!-- Nombre y firma -->
            <td style="width: 40%; padding-right: 40px;">
                <table style="width: 100%; margin: 0 auto; text-align: center;">
                    <tr>
                        <td style="height: 60px;"></td>
                    </tr>
                    <tr>
                        <td style="border-top: 1px solid;">FIRMA Y SELLO DE AUTORIZACIÓN</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>




</div>


</body>

</html>
