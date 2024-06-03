<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\EspecialidadController;

Route::get('/especialidades', [EspecialidadController::class, 'index'])->name('especialidades.index');
Route::get('/especialidades/create', [EspecialidadController::class, 'create'])->name('especialidades.create');
Route::post('/especialidades', [EspecialidadController::class, 'store'])->name('especialidades.store');
Route::get('/especialidades/{id}/edit', [EspecialidadController::class, 'edit'])->name('especialidades.edit');
Route::put('/especialidades/{id}', [EspecialidadController::class, 'update'])->name('especialidades.update');
Route::get('/especialidades/modify', [EspecialidadController::class, 'modify'])->name('especialidades.modify');

use App\Http\Controllers\EstudiantesController;

Route::get('/Estudiantes', [EstudiantesController::class, 'index'])->name('Estudiantes.index');
Route::get('/Estudiantes/create', [EstudiantesController::class, 'create'])->name('Estudiantes.create');
