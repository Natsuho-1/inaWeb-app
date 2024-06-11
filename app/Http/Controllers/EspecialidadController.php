<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidad;
use App\Models\Grado;
use Illuminate\Support\Facades\Log;

class EspecialidadController extends Controller
{
    protected $modalidades = ['Virtual', 'Presencial', 'A Distancia'];
    protected $niveles = ['Básica', 'Bachillerato', 'Superior'];

    public function index()
    {
        $especialidades = Especialidad::all();
        return view('especialidades.index', compact('especialidades'));
    }
    public function create()
    {
        $modalidades = $this->modalidades;
        $niveles = $this->niveles;
return view('especialidades.create', compact('modalidades', 'niveles'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
        Log::info('Entrando al método edit', ['id' => $id]);
        $especialidad = Especialidad::findOrFail($id);
        $modalidades = $this->modalidades;
        $niveles = $this->niveles;
        return view('especialidades.edit', compact('especialidad', 'modalidades', 'niveles'));
    }

    public function update(Request $request, Especialidad $especialidad)
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





