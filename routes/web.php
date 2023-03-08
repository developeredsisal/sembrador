<?php

use App\Http\Controllers\LecturaController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'App\Http\Middleware\AuthAdmin'], function () {
    Route::get('/lectura', [LecturaController::class, 'create'])->name('lectura');

    Route::delete('/lectura/{id}', [LecturaController::class, 'eliminar'])->name('eliminar-lectura');

    Route::post('/registrar-lectura', [LecturaController::class, 'registrar'])->name('registrar-lectura');

    Route::get('lectura/{id}/editar', [LecturaController::class, 'editarLectura'])->name('editar-lectura');
    Route::put('lectura/{id}/actualizar', [LecturaController::class, 'actualizarLectura'])->name('actualizar-lectura');

    Route::view('/actividad', 'actividad')->name('actividad');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/inicio', [LecturaController::class, 'todas'])->name('inicio');
    Route::get('/lectura', [LecturaController::class, 'lecturas'])->name('lectura');

    Route::get('/cerrar-sesion', [LoginController::class, 'logout'])->name('cerrar-sesion');
});

Route::middleware(['guest'])->group(function () {
    Route::view('/', 'inicio_sesion')->name('inicio.sesion');


    Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
});
