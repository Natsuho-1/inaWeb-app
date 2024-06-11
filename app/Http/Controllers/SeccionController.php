<?php

namespace App\Http\Controllers;


use App\Models\Seccion;
use App\Models\Especialidad;
use App\Models\Aula;
use App\Models\Grado;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    public function index()
    {
        // Obtener todas las secciones con sus relaciones
        $secciones = Seccion::with(['especialidad', 'aula','grado'])->get();

        // Pasar los datos a la vista
        return view('secciones.index', compact('secciones'));
    }

    public function create()
    {
        // Obtener todas las especialidades y aulas para el formulario
        $especialidades = Especialidad::all();
        $aulas = Aula::all();
        $grados = Grado::all();
        // Pasar los datos a la vista
        return view('secciones.create', compact('especialidades', 'aulas','grados'));
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
    
        // Generar un ID de sección aleatorio de 6 dígitos
        $idseccion = $this->generateRandomId();
    
        // Crear la nueva sección con el ID de sección generado y los demás campos del request
        Seccion::create([
            'idseccion' => $idseccion,
            'idgrado' => $request->input('idgrado'),
            'idespecialidad' => $request->input('idespecialidad'),
            'idaula' => $request->input('idaula'),
            // Otros campos del request pueden ser añadidos aquí si es necesario
        ]);
    
        return redirect()->route('secciones.index')->with('success', 'Sección creada con éxito.');
    }
    
    // Método para generar un ID aleatorio de 6 dígitos
    private function generateRandomId()
    {
        return mt_rand(100000, 999999);
    }

    public function edit($idseccion)
    {
        $seccion = Seccion::findOrFail($idseccion);
        $especialidades = Especialidad::all();
        $aulas = Aula::all(); 
        $grados = Grado::all();
        return view('secciones.edit', compact('seccion','especialidades', 'aulas','grados'));
    }

    public function update(Request $request, $idseccion)
    {
        $request->validate([
            'idgrado' => 'required|string|max:6',
            'idespecialidad' => 'required|string|max:6',
            'idaula' => 'required|string|max:6',
        ]);

        $seccion = Seccion::findOrFail($idseccion);
        $seccion->update($request->all());

        return redirect()->route('secciones.index')->with('success', 'Sección actualizada con éxito.');
    }
}
