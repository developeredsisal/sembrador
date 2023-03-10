<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\LecturaController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'App\Http\Middleware\AuthAdmin'], function () {
    Route::get('/lectura', [LecturaController::class, 'create'])->name('lectura');
    Route::get('lectura/{id}/actividad', [ActividadController::class, 'subir'])->name('subir-actividad');
    Route::get('/lectura/{id}/actividades', [ActividadController::class, 'mostrarActividades'])->name('subir-actividad');


    Route::get('lectura/{id}/editar', [LecturaController::class, 'editarLectura'])->name('editar-lectura');

    Route::delete('/lectura/{id}', [LecturaController::class, 'eliminar'])->name('eliminar-lectura');

    Route::post('/registrar-lectura', [LecturaController::class, 'registrar'])->name('registrar-lectura');
    Route::post('/lectura/{id}/actividad/registrar', [ActividadController::class, 'registrarActividad'])->name('registrar-actividad');

    Route::put('lectura/{id}/actualizar', [LecturaController::class, 'actualizarLectura'])->name('actualizar-lectura');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/inicio', [LecturaController::class, 'todasLecturas'])->name('inicio');
    Route::get('/lectura', [LecturaController::class, 'lecturas'])->name('lectura');

    Route::get('/cerrar-sesion', [LoginController::class, 'logout'])->name('cerrar-sesion');
});

Route::middleware(['guest'])->group(function () {
    Route::view('/', 'inicio_sesion')->name('inicio.sesion');


    Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
});
