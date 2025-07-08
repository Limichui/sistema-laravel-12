@extends('app')
@section('title', 'Sistema - Categorias')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/categoria.css') }}">
@endpush

@section('contenido')
    <h2 class="texto-rojo">Categorías</h2>
    <p>Este es el contenido de las categorias</p>
@endsection

@push('scripts')
    <script src="{{ asset('js/categoria.js') }}"></script> 
@endpush