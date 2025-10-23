<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VueloController;
use App\Http\Controllers\ReservacionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// --------------------------
// Rutas de autenticación
// --------------------------
Route::get("/login", [AuthController::class, "showLogin"])->name("login");
Route::post("/login", [AuthController::class, "login"])->name("login.post");
Route::post("/logout", [AuthController::class, "logout"])->name("logout");

// --------------------------
// Rutas protegidas (requieren login)
// --------------------------
Route::middleware("auth")->group(function () {
    // Dashboard
    Route::get("/", function () {
        return view("welcome");
    })->name("dashboard");

    // --------------------------
    // CRUD (ahora sin filtro de rol)
    // --------------------------

    // Clientes
    Route::resource("clientes", ClienteController::class);

    // Vuelos
    Route::resource("vuelos", VueloController::class);

    // Reservaciones
    Route::resource("reservaciones", ReservacionController::class)->parameters([
        "reservaciones" => "reservacion",
    ]);

    // Usuarios
    Route::resource("users", UserController::class);
});
