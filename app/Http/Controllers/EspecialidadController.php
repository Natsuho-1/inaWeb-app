<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    public function index()
    {
        $especialidades = [
            ['id' => 1, 'nombre' => 'Ingeniería Informática', 'descripcion' => 'Descripción de Ingeniería Informática', 'creditos' => 180, 'duracion' => 4, 'estado' => 'activo'],
            ['id' => 2, 'nombre' => 'Administración de Empresas', 'descripcion' => 'Descripción de Administración de Empresas', 'creditos' => 150, 'duracion' => 3, 'estado' => 'activo'],
            ['id' => 3, 'nombre' => 'Medicina', 'descripcion' => 'Descripción de Medicina', 'creditos' => 240, 'duracion' => 6, 'estado' => 'activo']
        ];
        return view('especialidades.index', compact('especialidades'));
    }

    public function create()
    {
        return view('especialidades.create');
    }

    public function store(Request $request)
    {
        // Aquí normalmente guardarías la especialidad en la base de datos
        return redirect()->route('especialidades.index');
    }

    public function edit($id)
    {
        $especialidad = [
            'id' => $id, 
            'nombre' => 'Ingeniería Informática', 
            'descripcion' => 'Descripción de Ingeniería Informática', 
            'creditos' => 180, 
            'duracion' => 4, 
            'estado' => 'activo'
        ];
        return view('especialidades.edit', compact('especialidad'));
    }

    public function update(Request $request, $id)
    {
        // Aquí normalmente actualizarías la especialidad en la base de datos
        return redirect()->route('especialidades.index');
    }

    public function modify()
    {
        $especialidades = [
            ['id' => 1, 'nombre' => 'Ingeniería Informática', 'descripcion' => 'Descripción de Ingeniería Informática', 'creditos' => 180, 'duracion' => 4, 'estado' => 'activo'],
            ['id' => 2, 'nombre' => 'Administración de Empresas', 'descripcion' => 'Descripción de Administración de Empresas', 'creditos' => 150, 'duracion' => 3, 'estado' => 'activo'],
            ['id' => 3, 'nombre' => 'Medicina', 'descripcion' => 'Descripción de Medicina', 'creditos' => 240, 'duracion' => 6, 'estado' => 'activo']
        ];
        return view('especialidades.modify', compact('especialidades'));
    }
}
