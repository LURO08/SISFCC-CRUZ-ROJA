<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
</body>
</html>
