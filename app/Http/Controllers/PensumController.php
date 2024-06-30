<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pensum;
use App\Models\Especialidad;
use App\Models\PensumAsignatura;

class PensumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pensums = Pensum::all();
        $especialidades= Especialidad::all();
        return view('pensum.index', compact('pensums','especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $especialidades = Especialidad::all();
        return view('pensum.create', compact('especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idespecialidad' => 'required|string',
            'nombrepensum' => 'required|string|max:255',
            'promocion' => 'required|date',
            'duracion' => 'required|integer',
            'periodos' => 'required|integer',
        ]);

        Pensum::create($validatedData);

        return redirect()->route('pensum.index')->with('success', 'Pensum creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pensum = Pensum::findOrFail($id);
        $especialidades = Especialidad::all();
        return view('pensum.edit', compact('pensum', 'especialidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'idespecialidad' => 'required|string',
            'nombrepensum' => 'required|string|max:50',
            'promocion' => 'required|date',
            'duracion' => 'required|integer',
            'periodos' => 'required|integer',
        ]);

        $pensum = Pensum::findOrFail($id);
        $pensum->update($request->all());

        return redirect()->route('pensum.index')->with('success', 'Pensum actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Buscar el pensum por su ID
            $pensum = Pensum::findOrFail($id);

            // Eliminar el pensum
            $pensum->delete();

            // Redirigir con un mensaje de éxito
            return redirect()->route('pensum.index')->with('success', 'Pensum eliminado exitosamente.');
        } catch (\Exception $e) {
            // Manejar posibles errores
            return redirect()->route('pensum.index')->with('error', 'Ocurrió un error al intentar eliminar el pensum.');
        }
    }
    public function vistaGrafica($idpensum)
    {
        $pensum = Pensum::findOrFail($idpensum);
        $asignaturas = PensumAsignatura::where('idpensum', $idpensum)->with('asignatura')->get();

        return view('pensumasignaturas.index', compact('pensum', 'asignaturas'));
    }

}
