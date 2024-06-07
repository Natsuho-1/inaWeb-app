<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Models\Especialidad;
use App\Models\Aula;
use App\Models\Grado;
use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SeccionController extends Controller
{
    public function index()
    {
        $secciones = Seccion::with( 'especialidad')->get();
        return view('secciones.index', compact('secciones'));
    }

    public function create()
    {
        $especialidades = Especialidad::all();
        $aulas = Aula::all();
        return view('secciones.create', compact('especialidades','aulas'));
    }

    public function store(Request $request)
{
    $request->validate([
        'idseccion' => 'required|string|max:6|unique:secciones,idseccion',
        'seccion' => 'required|string|max:50',
        'idespecialidad' => 'required|string|max:6',
        'estado' => 'required|string',
    
    ]);
    Seccion::create($request->all());


        return redirect()->route('secciones.index')->with('success', 'Sección creada con éxito');
}
public function edit($id)
{
    $seccion = Seccion::findOrFail($id);
    $especialidades = Especialidad::all();
    $aulas = Aula::all();

    return view('secciones.edit', compact('seccion', 'especialidades', 'aulas'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'seccion' => 'required|string|max:50',
        'idespecialidad' => 'required|string|max:6',
        'estado' => 'required|string',
    ]);

    $seccion = Seccion::findOrFail($id);
    $seccion->update($request->all());

    return redirect()->route('secciones.index')->with('success', 'Sección actualizada con éxito');
}

public function destroy($id)
{
    $seccion = Seccion::findOrFail($id);
    $seccion->delete();

    return redirect()->route('secciones.index')->with('success', 'Sección eliminada con éxito');
}
}
