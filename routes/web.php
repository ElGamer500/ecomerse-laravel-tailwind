<?php

use App\Http\Controllers\InicioSesionController;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('inicio');
});

Route::middleware(['web'])->group(function () {
    Route::get('/inicioSesion', [InicioSesionController::class, 'index']);
    Route::get('/register', [InicioSesionController::class, 'registervista'])->name('register');
    /* para crear un usuario nuevo */
    Route::post('/registro-Usuario', [InicioSesionController::class, 'create']);
    Route::post('/inicioSesion', [InicioSesionController::class, 'login']);
    Route::get('/inicio', [InicioSesionController::class, 'dashboard'])->name('inicio');
});
