<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $estados = ['Activo', 'Inactivo'];
    public function index()
    {
        //
        Log::info('Entrando al método index');
        $grupos = Grupo::all();
        Log::info('Grupos obtenidos', ['grupos' => $grupos]);
        return view('grupos.index', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $estados = $this->estados;

        // Pasar los datos a la vista
        return view('grupos.create', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'idgrupos' => 'required|string|max:6|unique:grupos,idgrupos',
            'descripciongrupo' => 'required|string|max:50',
            'estado'=>'required|string|max:2'
        ]);

        Grupo::create($request->all());

        return redirect()->route('grupos.index')->with('success', 'Grupo creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.grupo $grupo
     */
    public function edit($id)
    {
        $estados = $this->estados;
        Log::info('Entrando al método edit', ['id' => $id]);
        $grupo = Grupo::findOrFail($id);
        return view('grupos.edit', compact('grupo','estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        Log::info('Datos recibidos en la solicitud', $request->all());

        $validatedData = $request->validate([
            'descripciongrupo' => 'required|string|max:50',
            'estado'=>'required|string|max:2'
        ]);

        Log::info('Datos validados correctamente', $validatedData);

        try {
            $grupo = Grupo::findOrFail($id);
            $grupo->update($validatedData);
            Log::info('Grupo actualizado correctamente');
        } catch (\Exception $e) {
            Log::error('Error al actualizar el grupo', ['error' => $e->getMessage()]);
            return redirect()->route('grupos.edit', $id)->with('error', 'Error al actualizar el grupo');
        }

        return redirect()->route('grupos.index')->with('success', 'Grupo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(grupo $grupo)
    {
        //
    }
}