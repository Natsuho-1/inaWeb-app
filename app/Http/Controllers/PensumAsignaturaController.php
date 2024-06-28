<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pensum;
use App\Models\PensumAsignatura;
use App\Models\Asignatura;
class PensumAsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
         // Buscar el pensum por su ID
         $pensum = Pensum::findOrFail($id);

         // Obtener las asignaturas asociadas a este pensum
         $asignaturas = PensumAsignatura::where('idpensum', $id)->with('asignatura')->get();
        
        return view('pensumasignaturas.index', compact('pensum', 'asignaturas'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($idpensum)
    {
        $pensum = Pensum::findOrFail($idpensum);
        $asignaturas = Asignatura::all();
        
        return view('pensumasignaturas.create', compact('pensum', 'asignaturas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $idpensum)
    {
        $request->validate([
            'idasignatura' => 'required|integer',
            'anio' => 'required|integer',
            'periodo' => 'required|integer',
        ]);
        PensumAsignatura::create([
            'idpensum' => $idpensum,
            'idasignatura' => $request->idasignatura,
            'anio' => $request->anio,
            'periodo' => $request->periodo,
        ]);

        return redirect()->route('pensum.asignaturas', $idpensum)->with('success', 'Asignatura agregada exitosamente.');
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
    public function edit($idpensum, $idasignatura)
    {
        $pensumAsignatura = PensumAsignatura::where('idpensum', $idpensum)->where('idasignatura', $idasignatura)->firstOrFail();
        $pensum = Pensum::findOrFail($idpensum);
        $asignatura = Asignatura::findOrFail($idasignatura);
        
        return view('pensum.edit_asignatura', compact('pensumAsignatura', 'pensum', 'asignatura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idpensum, $idasignatura)
    {
        $request->validate([
            'anio' => 'required|integer',
            'periodo' => 'required|integer',
        ]);

        $pensumAsignatura = PensumAsignatura::where('idpensum', $idpensum)->where('idasignatura', $idasignatura)->firstOrFail();
        $pensumAsignatura->update($request->all());

        return redirect()->route('pensum.asignaturas', $idpensum)->with('success', 'Asignatura actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idpensum, $idasignatura)
    {
        // Busca el registro con la clave primaria compuesta
        $pensumAsignatura = PensumAsignatura::where('idasignatura', $idasignatura)
            ->firstOrFail();

        // Elimina el registro encontrado
        $pensumAsignatura->delete();

        // Redirecciona a la ruta deseada con un mensaje de éxito
        return redirect()->route('pensum.asignaturas', $idpensum)
            ->with('success', 'Asignatura eliminada exitosamente.');
    }


}
