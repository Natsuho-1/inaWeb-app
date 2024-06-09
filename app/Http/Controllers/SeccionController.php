<?php

namespace App\Http\Controllers;


use App\Models\Seccion;
use App\Models\Especialidad;
use App\Models\Aula;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    public function index()
    {
        // Obtener todas las secciones con sus relaciones
        $secciones = Seccion::with(['especialidad', 'aula'])->get();

        // Pasar los datos a la vista
        return view('secciones.index', compact('secciones'));
    }

    public function create()
    {
        // Obtener todas las especialidades y aulas para el formulario
        $especialidades = Especialidad::all();
        $aulas = Aula::all();

        // Pasar los datos a la vista
        return view('secciones.create', compact('especialidades', 'aulas'));
    }

    public function store(Request $request)
    {
        // Validar y guardar la nueva sección
        $request->validate([
            'idseccion' => 'required|string|max:6',
            'idespecialidad' => 'required|string|max:6',
            'idaula' => 'required|string|max:6',
            'seccion' => 'required|string|max:50',
        ]);

        Seccion::create($request->all());

        return redirect()->route('secciones.index')->with('success', 'Sección creada con éxito.');
    }
}