<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios'; // Define el nombre de la tabla
    protected $primaryKey = 'id'; // Define la clave primaria de la tabla
    protected $fillable = [
        'contenido',
        'user_id',
        'entrada_id',
    ]; // Campos que se pueden asignar masivamente

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id'); // Relación inversa con User
    }

    public function entrada()
    {
        return $this->belongsTo(Entrada::class, 'entrada_id'); // Relación inversa con Entrada
    }
}
