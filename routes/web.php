<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'App\Http\Middleware\AuthAdmin'], function () {
    Route::view('/lectura', 'lectura')->name('lectura');
    Route::view('/actividad', 'actividad')->name('actividad');
//     Route::get('/actividades', [LibroController::class, 'actividades'])->name('actividades');

//     Route::post('/registrar-recurso', [LibroController::class, 'registrar'])->name('registrar-recurso');
});

Route::middleware(['auth'])->group(function () {
    Route::view('/inicio', 'inicio')->name('inicio');
    // Route::get('/ortografia', [LibroController::class, 'ortografia'])->name('ortografia');
    // Route::get('/lecturas', [LibroController::class, 'lecturas'])->name('lecturas');
    // Route::get('/actividad/{id}', [LibroController::class, 'actividad'])->name('actividad');
    // Route::get('/envedar/{id}', [LibroController::class, 'envedar'])->name('envedar');

    Route::get('/cerrar-sesion', [LoginController::class, 'logout'])->name('cerrar-sesion');

});

Route::middleware(['guest'])->group(function () {
    Route::view('/', 'inicio_sesion')->name('inicio.sesion');
    // Route::view('/registro', 'registro')->name('registro');
    // Route::view('/restablecer', 'restablecer')->name('restablecer');
    // Route::view('/olvidecontrasena', 'olvidecontrasena')->name('olvidecontrasena');

    Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
    // Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
});