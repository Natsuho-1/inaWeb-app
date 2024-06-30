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
Route::post('/Estudiantes', [EstudiantesController::class, 'store'])->name('Estudiantes.store');
Route::get('/Estudiantes/{id}/edit', [EstudiantesController::class, 'edit'])->name('Estudiantes.edit');
Route::put('/Estudiantes/{id}', [EstudiantesController::class, 'update'])->name('Estudiantes.update');

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























































//Pensums 
use App\Http\Controllers\PensumController;
Route::get('/pensum', [PensumController::class, 'index']);
Route::resource('pensum', PensumController::class);

//PensumAsigntaruras
use App\Http\Controllers\PensumAsignaturaController;

Route::get('pensum/{idpensum}/asignaturas', [PensumAsignaturaController::class, 'index'])->name('pensum.asignaturas');
Route::get('pensum/{idpensum}/asignaturas/create', [PensumAsignaturaController::class, 'create'])->name('pensum.asignatura.create');
Route::post('pensum/{idpensum}/asignaturas', [PensumAsignaturaController::class, 'store'])->name('pensum.asignatura.store');
Route::get('pensum/{idpensum}/asignaturas/{idasignatura}/edit', [PensumAsignaturaController::class, 'edit'])->name('pensum.asignatura.edit');
Route::put('pensum/{idpensum}/asignaturas/{idasignatura}', [PensumAsignaturaController::class, 'update'])->name('pensum.asignatura.update');
Route::delete('pensum/{idpensum}/asignaturas/{idasignatura}', [PensumAsignaturaController::class, 'destroy'])->name('pensum.asignatura.destroy');
Route::get('/vistagrafica/{idpensum}', [PensumController::class, 'vistaGrafica'])->name('pensum.vistagrafica');
