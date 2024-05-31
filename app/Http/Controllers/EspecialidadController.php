<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    public function index()
    {
        $especialidades = [
            ['id' => 1, 'nombre' => 'Ingeniería Informática'],
            ['id' => 2, 'nombre' => 'Administración de Empresas'],
            ['id' => 3, 'nombre' => 'Medicina']
        ];
        return view('especialidades.index', compact('especialidades'));
    }

    public function create()
    {
        return view('especialidades.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('especialidades.index');
    }

    public function edit($id)
    {
        $especialidad = ['id' => $id, 'nombre' => 'Ingeniería Informática'];
        return view('especialidades.edit', compact('especialidad'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('especialidades.index');
    }

    public function modify()
    {
        $especialidades = [
            ['id' => 1, 'nombre' => 'Ingeniería Informática'],
            ['id' => 2, 'nombre' => 'Administración de Empresas'],
            ['id' => 3, 'nombre' => 'Medicina']
        ];
        return view('especialidades.modify', compact('especialidades'));
    }
}
