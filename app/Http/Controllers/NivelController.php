<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        Log::info('Entrando al método index');
        $niveles = Nivel::all();
        Log::info('Grupos obtenidos', ['grupos' => $niveles]);
        return view('niveles.index', compact('niveles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $niveles = Nivel::all();

        // Pasar los datos a la vista
        return view('niveles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'idnivel' => 'required|int|unique:niveles,idnivel',
            'nombreNivel' => 'required|string|max:25',
        ]);

        Nivel::create($request->all());

        return redirect()->route('niveles.index')->with('success', 'Nivel creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nivel $nivel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        Log::info('Entrando al método edit', ['id' => $id]);
        $nivel = Nivel::findOrFail($id);
        return view('niveles.edit', compact('nivel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        Log::info('Datos recibidos en la solicitud', $request->all());

        $validatedData = $request->validate([
            'idnivel' => 'required|int|unique:niveles,idnivel',
            'nombreNivel' => 'required'
        ]);

        Log::info('Datos validados correctamente', $validatedData);

        try {
            $nivel = Nivel::findOrFail($id);
            $nivel->update($validatedData);
            Log::info('Nivel actualizado correctamente');
        } catch (\Exception $e) {
            Log::error('Error al actualizar el nivel', ['error' => $e->getMessage()]);
            return redirect()->route('niveles.edit', $id)->with('error', 'Error al actualizar el nivel');
        }

        return redirect()->route('niveles.index')->with('success', 'Nivel actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nivel $nivel)
    {
        //
    }
}
