<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estructuras de control</title>
</head>
<body>
    <h1>Switch en Laravel</h1>
    <h2>Número: {{ $numero }}</h2>
    <p>Día: 
        @switch($numero)
            @case(1)
                Lunes
                @break
            @case(2)
                Martes
                @break
            @case(3)
                Miercoles
                @break
            @case(4)
                Jueves
                @break
            @case(5)
                Viernes
                @break
            @case(6)
                Sábado
                @break
            @case(7)
                Domingo
                @break
            @default
                Error
        @endswitch
    </p>

    <p>Gracias por participar.</p>
    
</body>
</html>