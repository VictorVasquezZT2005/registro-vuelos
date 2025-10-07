<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VueloController;
use App\Http\Controllers\ReservacionController;

// Dashboard
Route::get('/', function () {
    return view('welcome'); // Aquí se muestra el dashboard
});

// CRUD
Route::resource('clientes', ClienteController::class);
Route::resource('vuelos', VueloController::class);
Route::resource('reservaciones', ReservacionController::class);
