<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Asignatura;
use App\Models\AsignacionAsignaturas;

class AsignacionAsignaturasController extends Controller
{
    public function index()
    {
        $asignaciones = AsignacionAsignaturas::with(['docente.persona', 'asignatura'])
            ->get()
            ->groupBy('iddocente')
            ->map(function ($rows) {
                $docente = $rows->first()->docente;
                $asignaturas = $rows->pluck('asignatura.asignatura')->implode(', ');
                $anio = $rows->first()->anio;
                $estado = $rows->first()->estado;

                return [
                    'docente' => $docente,
                    'asignaturas' => $asignaturas,
                    'anio' => $anio,
                    'estado' => $estado,
                ];
            })
            ->values()
            ->all();

        return view('Asignacion_Asignaturas.index', compact('asignaciones'));
    }

    public function create()
    {
        $docentes = Docente::with('persona')->get();
        $asignaturas = Asignatura::all();
        return view('Asignacion_Asignaturas.create', compact('docentes', 'asignaturas'));
    }

    public function store(Request $request)
{
    $request->validate([
        'iddocente' => 'required|string|max:8|exists:docentes,iddocente',
        'idasignatura' => 'required|array',
        'idasignatura.*' => 'required|string|max:6|exists:asignaturas,idasignatura'
    ]);

    $anio = now()->format('Y-m-d');
    $duplicatedAssignments = [];

    foreach ($request->idasignatura as $idasignatura) {
        // Verificar si ya existe la asignación
        $existingAssignment = AsignacionAsignaturas::where('iddocente', $request->iddocente)
            ->where('idasignatura', $idasignatura)
            ->exists();

        if (!$existingAssignment) {
            AsignacionAsignaturas::create([
                'iddocente' => $request->iddocente,
                'idasignatura' => $idasignatura,
                'anio' => $anio,
                'estado' => '1' // Suponiendo que '1' significa activo
            ]);
        } else {
            $duplicatedAssignments[] = $idasignatura;
        }
    }

    if (count($duplicatedAssignments) > 0) {
        $asignaturasDuplicadas = Asignatura::whereIn('idasignatura', $duplicatedAssignments)->pluck('asignatura')->implode(', ');
        return redirect()->route('asignacion_asignaturas.create')->with('error', 'Las siguientes asignaturas ya estaban asignadas: ' . $asignaturasDuplicadas);
    }

    return redirect()->route('asignacion_asignaturas.create')->with('success', 'Materias asignadas con éxito');
}

}

