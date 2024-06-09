<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidad;
use Illuminate\Support\Facades\Log;

class EspecialidadController extends Controller
{
    protected $modalidades = ['Virtual', 'Presencial', 'A Distancia'];
    protected $niveles = ['Básica', 'Bachillerato', 'Superior'];

    public function index()
    {
        Log::info('Entrando al método index');
        $especialidades = Especialidad::all();
        Log::info('Especialidades obtenidas', ['especialidades' => $especialidades]);
        return view('especialidades.index', compact('especialidades'));
    }

    public function create()
    {
        Log::info('Entrando al método create');
        $modalidades = $this->modalidades;
        $niveles = $this->niveles;
        return view('especialidades.create', compact('modalidades', 'niveles'));
    }

    public function store(Request $request)
    {
        Log::info('Datos recibidos en la solicitud', $request->all());

        $validatedData = $request->validate([
            'idespecialidad' => 'required|max:6',
            'descripcionspecialidad' => 'required|max:25',
            'modalidad' => 'required',
            'nombrenivel' => 'required'
        ]);

        Log::info('Datos validados correctamente', $validatedData);

        try {
            $especialidad = new Especialidad();
            $especialidad->idespecialidad = $validatedData['idespecialidad'];
            $especialidad->descripcionspecialidad = $validatedData['descripcionspecialidad'];
            $especialidad->modalidad = $validatedData['modalidad'];
            $especialidad->nombrenivel = $validatedData['nombrenivel'];

            $especialidad->save();
            Log::info('Especialidad creada correctamente', ['especialidad' => $especialidad]);
        } catch (\Exception $e) {
            Log::error('Error al crear la especialidad', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->route('especialidades.create')->with('error', 'Error al crear la especialidad');
        }

        return redirect()->route('especialidades.index')->with('success', 'Especialidad creada correctamente');
    }

    public function edit($id)
    {
        Log::info('Entrando al método edit', ['id' => $id]);
        $especialidad = Especialidad::findOrFail($id);
        $modalidades = $this->modalidades;
        $niveles = $this->niveles;
        return view('especialidades.edit', compact('especialidad', 'modalidades', 'niveles'));
    }

    public function update(Request $request, $id)
    {
        Log::info('Datos recibidos en la solicitud', $request->all());

        $validatedData = $request->validate([
            'descripcionspecialidad' => 'required|max:25',
            'modalidad' => 'required',
            'nombrenivel' => 'required'
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





