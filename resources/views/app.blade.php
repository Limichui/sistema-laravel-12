<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Sistema')</title>
    <!-- Apilar estilos CSS -->
    @stack('styles')
    <!-- Vincular estilos CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <header>
        <h1 class="texto-rojo">Bienvenido a mi sistema</h1>
    </header>
    @include('partials.menu')
    <main>
        <!-- Contenido principal -->
        @yield('contenido')
    </main>
    <footer>
        <p>2025 - Sistema</p>
    </footer>
    <!-- Apilar scripts JS -->
    @stack('scripts')
    <!-- Vincular scripts JS -->    
</body>
</html>