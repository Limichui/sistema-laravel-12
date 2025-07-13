<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <header>
            <h2>Registro de las entradas</h2>
        </header>
        <section class="mt-4">
            @if(session('success')) <!-- Verifica si hay un mensaje de éxito en la sesión -->
                <div class="alert alert-success col-12 col-md-6"> <!-- Muestra el mensaje de éxito -->
                    {{ session('success') }} <!-- Imprime el mensaje de éxito -->
                </div>
            @endif
            <form action="{{ route('entrada.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3 col-12 col-md-6">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{old('titulo')}}" placeholder="Ingrese el título" required>
                </div>  
                <div class="form-group mb-3 col-12 col-md-6">
                    <label for="tag" class="form-label">Tag</label>
                    <input type="text" class="form-control" id="tag" name="tag" value="{{old('tag')}}" placeholder="Ingrese el tag" required>
                </div>
                <div class="form-group mb-3 col-12 col-md-6">
                    <label for="contenido" class="form-label">Contenido</label>
                    <input type="text" class="form-control" id="contenido" name="contenido" value="{{old('contenido')}}" placeholder="Ingrese el contenido" required>
                </div>
                <div class="center">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
            @if ($errors->any()) <!-- Verifica si hay errores de validación -->
                <div class="alert alert-danger mt-3 col-12 col-md-6">
                    <ul>
                        @foreach ($errors->all() as $error) <!-- Itera sobre todos los errores -->
                            <li>{{ $error }}</li> <!-- Imprime cada error -->
                        @endforeach
                    </ul>
                </div>
            @endif
        </section>
    </div>

</body>
</html>