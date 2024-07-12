<?php

// app/Http/Controllers/AsignaturaController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asignatura;

class AsignaturaController extends Controller
{

    protected $tipos = ['Conceptual', 'Numérica', 'Técnica'];

    public function index() {
        $asignaturas = Asignatura::all();
        return view('asignaturas.index', compact('asignaturas'));
    }

    public function create() {
        $tipos = $this->tipos;
        return view('asignaturas.create',compact('tipos'));
    }

    public function store(Request $request) {
        $request->validate([
            'idasignatura' => 'nullable|string|max:6|unique:asignaturas,idasignatura',
            'asignatura' => 'required|string|max:50',
            'tipo' => 'required|string|max:15'
        ]);

        Asignatura::create($request->all());
        return redirect()->route('asignaturas.index')->with('success', 'Asignatura creada con éxito');
    }

    public function edit($id) {
        $asignatura = Asignatura::find($id);
        $tipos = $this->tipos;
        return view('asignaturas.edit', compact('asignatura', 'tipos'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'idasignatura' => 'nullable|string|max:6|unique:asignaturas,idasignatura,' . $id . ',idasignatura',
            'asignatura' => 'required|string|max:50',
            'tipo' => 'required|string|max:15'
        ]);

        $asignatura = Asignatura::find($id);
        $asignatura->update($request->all());
        return redirect()->route('asignaturas.index')->with('success', 'Asignatura actualizada con éxito');
    }
}

