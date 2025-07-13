<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //return $request->query(); // Devuelve los parámetros de consulta de la URL
        //return $request->path(); // Devuelve la ruta actual
        //return $request->fullUrl(); // Devuelve la URL completa
        return $request->input('titulo', 'No hay título'); // Devuelve el valor del parámetro 'titulo', o un valor por defecto si no existe
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entrada.create'); // Retorna una vista para crear una nueva entrada
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $entrada = new Entrada();
        $entrada->titulo = $request->input('titulo');
        $entrada->tag = $request->input('tag'); 
        $entrada->contenido = $request->input('contenido');
        $entrada->imagen = "";
        $entrada->user_id = 1; // Asigna un usuario por defecto, puedes cambiarlo según tu lógica
        $entrada->save(); // Guarda la nueva entrada en la base de datos

        return redirect()->route('entrada.create')->with('success', 'Entrada creada exitosamente'); // Redirige a la lista de entradas con un mensaje de éxito
    }

    /**
     * Display the specified resource.
     */
    public function show(Entrada $entrada)
    {
        return "Show ". $entrada->id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entrada $entrada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entrada $entrada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entrada $entrada)
    {
        //
    }
}
