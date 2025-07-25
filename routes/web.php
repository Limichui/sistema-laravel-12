<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('usuarios', UserController::class);

Route::patch('usuarios/{usuario}/toggle', [UserController::class, 'toggleStatus'])
    ->name('usuarios.toggle');