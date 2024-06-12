<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GradoController extends Controller
{
    /**
     * Display a listing of the resource. mi rama
     */
    protected $niveles = ['Activo', 'Inactivo'];
    public function index()
    {
        //
        Log::info('Entrando al método index');
        $grados = Grado::all();
        Log::info('Grados obtenidos', ['grados' => $grados]);
        return view('grados.index', compact('grados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $niveles = Nivel::all();

        // Pasar los datos a la vista
        return view('grados.create', compact('niveles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'idgrado' => 'required|string|max:6|unique:grado,idgrado',
            'descripciongrado' => 'required|string|max:50',
            'idnivel'=>'required|string|max:6'
        ]);

        Grado::create($request->all());

        return redirect()->route('grados.index')->with('success', 'Grado creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(grado $grado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.grupo $grupo
     */
    public function edit($id)
    {
        $niveles = Nivel::all();

        Log::info('Entrando al método edit', ['id' => $id]);
        $grados = Grado::findOrFail($id);
        return view('grados.edit', compact('grados','niveles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        Log::info('Datos recibidos en la solicitud', $request->all());

        $validatedData = $request->validate([
            'descripciongrado' => 'required|string|max:50',
            'idnivel'=>'required|string|max:6'
        ]);

        Log::info('Datos validados correctamente', $validatedData);

        try {
            $grado = Grado::findOrFail($id);
            $grado->update($validatedData);
            Log::info('Grado actualizado correctamente');
        } catch (\Exception $e) {
            Log::error('Error al actualizar el grado', ['error' => $e->getMessage()]);
            return redirect()->route('grados.edit', $id)->with('error', 'Error al actualizar el grado');
        }

        return redirect()->route('grados.index')->with('success', 'Grado actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(grado $grupo)
    {
        //
    }
}