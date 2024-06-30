<?php

// app/Http/Controllers/EspecialidadController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidad;
use Illuminate\Support\Facades\Log;

class EspecialidadController extends Controller
{
    protected $modalidades = ['Virtual', 'Presencial', 'A Distancia'];

    public function index()
    {
        $especialidades = Especialidad::all();
        return view('especialidades.index', compact('especialidades'));
    }

    public function create()
    {
        $modalidades = $this->modalidades;
        return view('especialidades.create', compact('modalidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcionspecialidad' => 'required|string|max:100',
            'identificador' => 'required|string|max:4',
            'modalidad' => 'required|string|max:15',
        ]);

        Especialidad::create($request->all());

        return redirect()->route('especialidades.index')->with('success', 'Especialidad creada con éxito.');
    }

    public function edit($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        $modalidades = $this->modalidades;
        return view('especialidades.edit', compact('especialidad', 'modalidades'));
    }

    public function update(Request $request, $id)
    {
        Log::info('Datos recibidos en la solicitud', $request->all());

        $validatedData = $request->validate([
            'descripcionspecialidad' => 'required|string|max:100',
            'identificador' => 'required|string|max:4',
            'modalidad' => 'required|string|max:15'
        ]);

        Log::info('Datos validados correctamente', $validatedData);

        try {
            $especialidad = Especialidad::findOrFail($id);
            $especialidad->update($validatedData);
            Log::info('Especialidad actualizada correctamente');
        } catch (\Exception $e) {
            Log::error('Error al actualizar la especialidad', ['error' => $e->getMessage()]);
            return redirect()->route('especialidades.edit', $id)->with('error', 'Error al actualizar la especialidad');
        }

        return redirect()->route('especialidades.index')->with('success', 'Especialidad actualizada correctamente');
    }

    public function modify()
    {
        Log::info('Entrando al método modify');
        $especialidades = Especialidad::all();
        return view('especialidades.modify', compact('especialidades'));
    }
}
