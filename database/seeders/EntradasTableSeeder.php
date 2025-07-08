<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Entrada; // Assuming you have an Entrada model

class EntradasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear entradas de ejemplo
        // Asegúrate de que el usuario con ID 1 exista antes de ejecutar este seeder
        // Puedes crear un usuario manualmente o usar un seeder para usuarios
        // Aquí se crean dos entradas de ejemplo
        // Asegúrate de que el modelo Entrada esté correctamente configurado y la migración
        // correspondiente haya sido ejecutada antes de correr este seeder. 
        /*
        Entrada::create([
            'user_id' => 1, // ID del usuario que crea la entrada
            'titulo' => 'Primer Título',
            'imagen' => 'image1.jpg',
            'tag' => 'Etiqueta1',
            'contenido' => 'Este es el contenido del primer registro.',
        ]);
        Entrada::create([
            'user_id' => 1, // ID del usuario que crea la entrada
            'titulo' => 'Segunda Título',
            'imagen' => 'image2.jpg',
            'tag' => 'Etiqueta2',
            'contenido' => 'Este es el contenido del primer registro.',
        ]);
        */
        Entrada::factory()->count(100)->create(); // Crea 100 entradas usando el factory
        // Puedes ajustar el número de entradas según tus necesidades
        // Si tienes un factory configurado para el modelo Entrada, puedes usarlo para generar datos
        // de prueba automáticamente.
        // Si no tienes un factory, puedes crear entradas manualmente como se muestra arriba.
        // Asegúrate de que el modelo Entrada esté correctamente configurado y la migración
        // correspondiente haya sido ejecutada antes de correr este seeder. 
    } 
}
