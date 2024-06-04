<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    public function index()
    {
        $especialidades = Especialidad::all();
        return view('especialidades.index', compact('especialidades'));
    }

    public function create()
    {
        return view('especialidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'idespecialidad' => 'required|string|max:6|unique:especialidades,idespecialidad',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'creditos' => 'required|integer',
            'duracion' => 'required|integer',
            'estado' => 'required|string',
        ]);

        Especialidad::create($request->all());

        return redirect()->route('especialidades.index')->with('success', 'Especialidad creada con éxito.');
    }

    public function edit(Especialidad $especialidad)
    {
        return view('especialidades.edit', compact('especialidad'));
    }

    public function update(Request $request, Especialidad $especialidad)
    {
        $request->validate([
            'idespecialidad' => 'required|string|max:6|unique:especialidades,idespecialidad,' . $especialidad->idespecialidad . ',idespecialidad',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'creditos' => 'required|integer',
            'duracion' => 'required|integer',
            'estado' => 'required|string',
        ]);

        $especialidad->update($request->all());

        return redirect()->route('especialidades.index')->with('success', 'Especialidad actualizada con éxito.');
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
