<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspecialidadController;

Route::get('/especialidades', [EspecialidadController::class, 'index'])->name('especialidades.index');
Route::get('/especialidades/create', [EspecialidadController::class, 'create'])->name('especialidades.create');
Route::post('/especialidades', [EspecialidadController::class, 'store'])->name('especialidades.store');
Route::get('/especialidades/{id}/edit', [EspecialidadController::class, 'edit'])->name('especialidades.edit');
Route::put('/especialidades/{id}', [EspecialidadController::class, 'update'])->name('especialidades.update');
Route::get('/especialidades/modify', [EspecialidadController::class, 'modify'])->name('especialidades.modify');

use App\Http\Controllers\SeccionController;

Route::get('/secciones', [SeccionController::class, 'index'])->name('secciones.index');
Route::post('/secciones', [SeccionController::class, 'store'])->name('secciones.store');
Route::get('/secciones/create', [SeccionController::class, 'create'])->name('secciones.create');
Route::resource('secciones', SeccionController::class);