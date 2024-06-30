<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pensum;
use App\Models\PensumAsignatura;
use App\Models\Asignatura;

class PensumAsignaturaController extends Controller
{
    public function index($id)
    {
        $pensum = Pensum::findOrFail($id);
        $asignaturas = PensumAsignatura::where('idpensum', $id)->with('asignatura')->get();

        return view('pensumasignaturas.index', compact('pensum', 'asignaturas'));
    }

    public function create($idpensum)
    {
        $pensum = Pensum::findOrFail($idpensum);
        $asignaturas = Asignatura::all();

        return view('pensumasignaturas.create', compact('pensum', 'asignaturas'));
    }

    public function store(Request $request, $idpensum)
    {
        $request->validate([
            'idasignatura' => 'required|string',
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

    public function show(string $id)
    {
        //
    }

    public function edit($idpensum, $idpensumasignaturas)
    {
        $pensumAsignatura = PensumAsignatura::findOrFail($idpensumasignaturas);
        $pensum = Pensum::findOrFail($idpensum);
        $asignaturas = Asignatura::all();

        return view('pensumasignaturas.edit', compact('pensumAsignatura', 'pensum', 'asignaturas'));
    }

    public function update(Request $request, $idpensum, $idpensumasignaturas)
    {
        $request->validate([
            'idasignatura' => 'required|string',
            'anio' => 'required|integer',
            'periodo' => 'required|integer',
        ]);

        $pensumAsignatura = PensumAsignatura::findOrFail($idpensumasignaturas);
        $pensumAsignatura->update($request->all());

        return redirect()->route('pensum.asignaturas', $idpensum)->with('success', 'Asignatura actualizada exitosamente.');
    }


    public function destroy($idpensum, $idasignatura)
    {
        $pensumAsignatura = PensumAsignatura::findOrFail($idasignatura);
        $pensumAsignatura->delete();

        return redirect()->route('pensum.asignaturas', $idpensum)->with('success', 'Asignatura eliminada exitosamente.');
    }


}
