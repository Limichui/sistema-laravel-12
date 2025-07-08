<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $table = 'entradas'; // Define la el nombre de la table explicitamente. Si se seguió las convenciones de Laravel, no es necesario, pero es una buena práctica.
    protected $primaryKey = 'id'; // Define la clave primaria de la tabla. Por defecto, Laravel asume que es 'id', pero si se usa otro nombre, se debe especificar.
    protected $fillable = [
        'titulo',
        'contenido',
        'user_id',
    ]; // Define los campos que se pueden asignar masivamente. Esto es importante para la seguridad y evitar la asignación masiva de campos no deseados.

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id'); // Define la relación uno a muchos inversa con el modelo User. Esto indica que una entrada pertenece a un usuario.
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class); // Define la relación uno a muchos con el modelo Comentario. Esto indica que una entrada puede tener muchos comentarios.
    }
}
