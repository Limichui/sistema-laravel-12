<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Entrada;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entrada>
 */
class EntradaFactory extends Factory
{
    protected $model = Entrada::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nombreImagen = 'imagen-' . Str::random(5) . '.jpg';

        // Crear archivo vacío en storage/app/public/images
        //Storage::disk('public')->put('images/' . $nombreImagen, ''); 

        return [
            'titulo' => $this->faker->text(rand(10, 50)), // Genera un título aleatorio con una longitud entre 10 y 50 caracteres
            'tag' => $this->faker->word, // Genera una etiqueta aleatoria de una sola palabra
            'imagen' => $nombreImagen, // Genera una sola palabra aleatoria de la imagen
            'contenido' => $this->faker->paragraph, // Genera un párrafo de contenido aleatorio
            'user_id' => User::inRandomOrder()->first()->id, // Asigna un usuario aleatorio existente
        ];
    }
}
