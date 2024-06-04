<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuninare\support\BD;
use App\Models\Seccion;
use App\Models\Especialidad;
use App\Models\Aula;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secciones = Seccion::with(['especialidad', 'aula'])->get();

        // Pasar los datos a la vista
        return view('secciones.index', compact('secciones'));  }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         // Obtener todas las especialidades y aulas para el formulario
         $especialidades = Especialidad::all();
         $aulas = Aula::all();
 
         // Pasar los datos a la vista
         return view('secciones.create', compact('especialidades', 'aulas'));
  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar y crear una nueva sección
        $request->validate([
            'idseccion' => 'required|string|max:6',
            'idespecialidad' => 'required|string|max:6',
            'idaula' => 'required|string|max:6',
            'seccion' => 'required|string|max:50',
        ]);

        Seccion::create($request->all());

        return redirect()->route('secciones.index')->with('success', 'Sección creada con éxito');
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
   
     public function edit($idseccion)
    {
        $seccion = Seccion::findOrFail($idseccion);
        $especialidades = Especialidad::all();
        $aulas = Aula::all();
        return view('secciones.edit', compact('seccion', 'especialidades', 'aulas'));
    }

    public function update(Request $request, $idseccion)
    {
        $request->validate([
            'idseccion' => 'required|string|max:6|unique:secciones,idseccion,' . $idseccion . ',idseccion',
            'idespecialidad' => 'required|string|max:6',
            'idaula' => 'required|string|max:6',
            'seccion' => 'required|string|max:50',
        ]);

        $seccion = Seccion::findOrFail($idseccion);
        $seccion->update($request->all());

        return redirect()->route('secciones.index')->with('success', 'Sección actualizada con éxito.');
    }
 
     public function destroy($id)
     {
         $seccion = Seccion::findOrFail($id);
         $seccion->delete();
 
         return redirect()->route('secciones.index')->with('success', 'Sección eliminada con éxito.');
     }
}
