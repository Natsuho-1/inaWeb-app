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

Route::resource('secciones', SeccionController::class);
Route::put('secciones/{seccione}', [SeccionController::class, 'update'])->name('secciones.update');
