<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estructuras de control</title>
</head>
<body>
    <h1>Condicionales en Laravel</h1>
    <h2>Nota: {{ $nota }}</h2>
    <p>Situación: 
        @if ($nota >= 10.5)
            Aprobado
        @else
            Reprobado
        @endif
    </p>

    <p>Categoría: 
        @if ($nota >= 0 && $nota <=6)
            Pésimo
        @elseif ($nota > 6 && $nota <= 10.5)
            Bajo
        @elseif ($nota > 10.5 && $nota <= 14)
            Bueno
        @elseif ($nota > 14 && $nota <= 18)
            Excelente
        @else
            Nota inválida
        @endif

    <p>Gracias por participar.</p>
    
</body>
</html>