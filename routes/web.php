<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\EntradaController;

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

Route::get('probar-conexion', function () {
    try {
        DB::connection()->getPdo();
        return 'Conexión exitosa a la base de datos';
    } catch (\Exception $e) {
        return 'Error al conectar a la base de datos: ' . $e->getMessage();
    }
});

// Consultas a la base de datos usando el Query Builder
// Obtiene todos los usuarios de la tabla 'users'
Route::get('query', function () {
    $entradas = DB::table('entradas')->get(); 
    return $entradas; // Retorna los datos obtenidos de la tabla 'entradas' en formato JSON 
});

// Obtiene la primera entrada de la tabla 'entradas'
Route::get('find', function () {
    $entradas = DB::table('entradas')->first(); 
    return $entradas; // Retorna los datos obtenidos de la tabla 'entradas' en formato JSON 
});

// Obtiene una entrada específica por su ID
Route::get('filtro', function () {
    $entrada = DB::table('entradas')
                ->where('user_id', 1) // Filtra las entradas por user_id igual a 1
                ->where('titulo', 'like', 'a%') // Filtra las entradas por título que comienza con 'a'
                ->orWhere('titulo', 'like', 't%') // O filtra las entradas por título que comienza con 'b'
                ->get(); // Obtiene las entradas filtradas
    return $entrada; // Retorna los datos de la entrada específica en formato JSON
});

//whereNull()
//whereNotNull()
//whereIn()
//whereNotIn()
//whereBetween
//whereNotBetween

//JOINS con query builder

Route::get('join', function(){
    $entradas= DB::table('entradas') // Selecciona la tabla 'entradas'
        ->join('users','entradas.user_id','=','users.id') // Realiza un join con la tabla 'users' donde 'entradas.user_id' es igual a 'users.id'
        ->select('entradas.id','entradas.titulo','entradas.tag', 'entradas.imagen', 'users.email') //
        ->get();
    return $entradas;    
});

//leftJoin()
//rightJoin()
//joinWhere()

// Inserción de un solo registro
Route::get('/insertar', function() {
    $insertado = DB::table('users') // Inserta un nuevo registro en la tabla 'users'
        ->insert([ // Define los datos a insertar
            "name" => "Juan Pérez",
            "email" => "juan@prueba.com",
            "password" => "juan"
        ]);
    return $insertado;
});

// Inserción de registros y obtención del ID del último registro insertado
Route::get('/getId', function() {
    $id = DB::table('users') // Inserta un nuevo registro en la tabla 'users' y obtiene el ID del registro insertado
        ->insertGetId([ // Define los datos a insertar
            "name" => "Juan Pérez",
            "email" => "juan2@prueba.com",
            "password" => "juan2"
        ]);
    return $id;
});

// Rutas con cotroladores
//Route::get('/entrada', [EntradaController::class, 'index']); // Define una ruta que utiliza el método 'index' del controlador 'EntradaController'
//Route::resource('/entrada', EntradaController::class)->only('index', 'show'); // Define un recurso para el controlador 'EntradaController' con solo los métodos 'index' y 'show'
Route::resource('/entrada', EntradaController::class)->except('destroy', 'update'); // Define un recurso completo para el controlador 'EntradaController' excepto los métodos 'destroy' y 'update'

Route::get('/respuesta', function() {
    return response('Hola, esta es una respuesta', 200); // Retorna una respuesta con el contenido 'Hola, esta es una respuesta' y un código de estado 200
});

Route::get('/respuesta2', function() {
    return response('Hola, esta es una respuesta', 404); // Retorna una respuesta con el contenido 'Hola, esta es una respuesta' y un código de estado 200
});