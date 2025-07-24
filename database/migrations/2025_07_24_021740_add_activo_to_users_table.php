<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Adding the 'activo' column to the 'users' table
            // Agregar la columna 'activo' a la tabla 'usuarios'
            $table->boolean('activo')->default(true)->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Dropping the 'activo' column from the 'users' table
            // Eliminar la columna 'activo' de la tabla 'usuarios'
            $table->dropColumn('activo');
        });
    }
};
