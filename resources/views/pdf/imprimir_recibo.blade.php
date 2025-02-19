<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimiendo...</title>
</head>
<body>
    <iframe id="pdfFrame" src="{{ asset('storage/' . basename($pdfPath)) }}" width="100%" height="100%" style="border: none;"></iframe>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var iframe = document.getElementById('pdfFrame');
            iframe.onload = function () {
                iframe.contentWindow.print(); // Manda a imprimir automáticamente
            };
        });
    </script>
</body>
</html>
