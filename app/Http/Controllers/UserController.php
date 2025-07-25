<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
Use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');
        $registros = User::where('name', 'like', "%{$buscar}%")
            ->orWhere('email', 'like', "%{$buscar}%")
            ->orWhere('id', 'desc')
            ->paginate(10);
        return view('usuario.index', compact('registros', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario.action');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        //dd($request->all()); // Esto detiene la ejecución y muestra los datos recibidos
        $registro= new User();
        $registro->name = $request->input('name');
        $registro->email = $request->input('email');
        $registro->password = bcrypt($request->input('password'));
        $registro->activo = $request->input('activo'); // Default to 1 if not provided
        $registro->save();
        return redirect()->route('usuarios.index')->with('mensaje', 'Registro del usuario ' . $registro->name . ' creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $registro=User::findOrFail($id);
        return view('usuario.action', compact('registro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id)
    {
        $registro=User::findOrFail($id);
        $registro->name = $request->input('name');
        $registro->email = $request->input('email');
        $registro->activo = $request->input('activo'); // Default to 1 if not provided

        // Solo actualizar la contraseña si se ingresó
        if ($request->filled('password')) {
            $registro->password = bcrypt($request->input('password'));
        }

        $registro->save();

        return redirect()->route('usuarios.index')->with('mensaje', 'Registro del usuario ' . $registro->name . ' actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $registro = User::findOrFail($id);
        $registro->delete();
        
        return redirect()->route('usuarios.index')->with('mensaje', 'Registro del usuario ' . $registro->name . ' eliminado exitosamente.');
    }
}
