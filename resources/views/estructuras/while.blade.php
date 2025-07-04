<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bucles</title>
</head>
<body>
    <h1>While en Laravel</h1>
    <h2>Número de iteraciones: {{ $numero }}</h2>
    
    <p>
        @While ($numero > 0)
            <strong>{{ $numero }}</strong>
            @php
                $numero--;
            @endphp
        @endWhile
    </p>

    <p>Gracias por participar.</p>
    
</body>
</html>