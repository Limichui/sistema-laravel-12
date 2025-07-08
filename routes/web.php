<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

//Definición básica de rutas
Route::get('/hola', function(){
    $nombre="Limbert Olmos";
    return "Hola, Laravel {$nombre}";
});

//Parámetros en las rutas
//Parámetros Requeridos
Route::get('/usuario/{nombre}', function($nombre){
    return "Usuario: $nombre";
});

//Parámetros con valores por defecto
Route::get('/usuario/{nombre?}', function($nombre='Default'){
    return "Usuario: $nombre";
});

//Rutas nombradas
Route::get('/perfil', function(){
    return view('perfil');
})->name('perfil');

//Redirección de rutas
Route::redirect('/ruta-anterior','/ruta-nueva');

Route::get('/ruta-nueva', function(){
    return "Ruta nueva";
});

//Vista directa
Route::view('/bienvenido','welcome');

//Grupos de ruta
//Agrupación con prefijos
Route::group(['prefix'=>'admin'], function(){
    Route::get('/dashboard', function(){
        return "Admin dashboard";
    });
});

//Helpers
//env(); Obtener variables de entorno
Route::get('/db', function () {
    return env('DB_CONNECTION');
});

//dd(); Depuración de variables
Route::get('/dd', function () {
    $data = ['name' => 'Limbert Olmos', 'role' => 'Developer'];
    dd($data); // Detiene la ejecución y muestra el contenido de $data
});

//config(); Obtener configuración de la aplicación
Route::get('/config', function () {
    return config('app.timezone'); // Devuelve el nombre de la aplicación configurado en config/app.php
});

Route::get('/producto', function () {
    //return view('almacen.producto',['nombre'=>'Impresora LX300', 'marca'=>'EDSON']); // Retorna la vista producto con datos
    //return view('almacen.producto')->with(['nombre' => 'Impresora LX300', 'marca' => 'EDSON']); // Retorna la vista producto con datos
    $nombre= 'Impresora LX300';
    $marca = 'EDSON 1';
    return view('almacen.producto', compact('nombre', 'marca')); // Retorna la vista producto con datos usando compact
});

//Estructuras de control
Route::get('/condicional/{nota}', function ($nota) {
    return view('estructuras.condicional', compact('nota')); // Retorna la vista condicional con la nota
});

Route::get('/switch/{numero}', function ($numero) {
    return view('estructuras.switch', compact('numero')); // Retorna la vista switch con el número
});

//Bucles
Route::get('/while/{numero}', function ($numero) {
    return view('estructuras.while', compact('numero')); // Retorna la vista while con el número
});

Route::get('/foreach', function () {
    $lista=[
        'Limbert Olmos',
        'Juan Perez',
        'Maria Lopez',
        'Carlos Sanchez'
    ];
    return view('estructuras.foreach', compact('lista')); // Retorna la vista foreach con la lista
});

Route::get('contacto', function () {
    return view('contacto'); // Retorna la vista contacto
});

Route::get('categoria', function () {
    return view('categoria'); // Retorna la vista categoria
});

rOUTE::GET('probar-conexion', function () {
    try {
        DB::connection()->getPdo();
        return 'Conexión exitosa a la base de datos';
    } catch (\Exception $e) {
        return 'Error al conectar a la base de datos: ' . $e->getMessage();
    }
});