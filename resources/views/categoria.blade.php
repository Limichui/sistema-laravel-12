@extends('app')
@section('title', 'Sistema - Categorias')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/categoria.css') }}">
@endpush

@section('contenido')
    <h2 class="texto-rojo">@lang('main.categories')</h2>
    <p>Este es el contenido de @lang('main.categories')</p>
@endsection

@push('scripts')
    <script src="{{ asset('js/categoria.js') }}"></script> 
@endpush