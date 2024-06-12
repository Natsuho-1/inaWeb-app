<?php

use Illuminate\Support\Facades\Route;
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

//GRUPOS ROUTE
use App\Http\Controllers\GrupoController;

//MOSTRAR tabla y CREAR nuevo grupo
Route::get('/grupos', [GrupoController::class, 'index'])->name('grupos.index');
Route::get('/grupos/create', [GrupoController::class, 'create'])->name('grupos.create');
Route::post('/grupos', [GrupoController::class, 'store'])->name('grupos.store');
//modificar
Route::get('/grupos/{id}/edit', [GrupoController::class, 'edit'])->name('grupos.edit');
Route::put('/grupos/{id}', [GrupoController::class, 'update'])->name('grupos.update');

//NIVELES ROUTE
use App\Http\Controllers\NivelController;

//MOSTRAR tabla y CREAR nuevo grupo
Route::get('/niveles', [NivelController::class, 'index'])->name('niveles.index');
Route::get('/niveles/create', [NivelController::class, 'create'])->name('niveles.create');
Route::post('/niveles', [NivelController::class, 'store'])->name('niveles.store');
//modificar
Route::get('/niveles/{id}/edit', [NivelController::class, 'edit'])->name('niveles.edit');
Route::put('/niveles/{id}', [NivelController::class, 'update'])->name('niveles.update');
//NIVELES ROUTE

use App\Http\Controllers\GradoController;

//MOSTRAR tabla y CREAR nuevo grupo
Route::get('/grados', [GradoController::class, 'index'])->name('grados.index');
Route::get('/grados/create', [GradoController::class, 'create'])->name('grados.create');
Route::post('/grados', [GradoController::class, 'store'])->name('grados.store');
//modificar
Route::get('/grados/{id}/edit', [GradoController::class, 'edit'])->name('grados.edit');
Route::put('/grados/{id}', [GradoController::class, 'update'])->name('grados.update');

//SECCIONES ROUTE
use App\Http\Controllers\SeccionController;

Route::resource('secciones', SeccionController::class);
Route::put('secciones/{seccione}', [SeccionController::class, 'update'])->name('secciones.update');

//MENUS
// routes/web.php

use App\Http\Controllers\MenuController;

Route::get('/menus', [MenuController::class, 'menuadmin'])->name('menus.admin');
