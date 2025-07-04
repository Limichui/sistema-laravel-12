<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bucles</title>
</head>
<body>
    <h1>Foreach en Laravel</h1>
    <h2>Lista de individulos:</h2>
    
        @foreach ($lista as $obj)
            <p>- {{ $obj }}</p>
        @endforeach

    <p>Gracias por participar.</p>
    
</body>
</html>