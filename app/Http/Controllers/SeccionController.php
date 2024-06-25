<?php

namespace App\Http\Controllers;


use App\Models\Seccion;
use App\Models\Especialidad;
use App\Models\Aula;
use App\Models\Grado;
use App\Models\Grupo;
use App\Models\Nivel;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    public function index()
    {
        // Obtener todas las secciones con sus relaciones
        $secciones = Seccion::with(['especialidad','grado','grupo','grado.nivel'])->get();

        // Pasar los datos a la vista
        return view('secciones.index', compact('secciones'));
    }

    public function create()
    {
        // Obtener todas las especialidades y aulas para el formulario
        $secciones = Seccion::all();
        $especialidades = Especialidad::all();
        $grados = Grado::all();
        $grupos = Grupo::all();
        $niveles = Nivel::all();
        // Pasar los datos a la vista
        return view('secciones.create', compact('secciones','especialidades','grados','grupos','niveles'));
    }
    public function store(Request $request)
    {
        // Validar y guardar la nueva sección
        $request->validate([
            'idgrado' => 'required|string|max:6',
            'idespecialidad' => 'required|string|max:6',
            'idgrupo' => 'required|string|max:6',
            'cantidad' => 'required|string|max:2'
        ]);
    
        // Generar un ID de sección aleatorio de 6 dígitos
        $lastSeccion = Seccion::orderBy('idseccion', 'desc')->first();
        $newIdSeccion = $lastSeccion ? intval($lastSeccion->idseccion) + 1 : 100000; // Iniciar desde 100000 si no hay registros
        while (Seccion::where('idseccion', $newIdSeccion)->exists()) {
            $newIdSeccion++;
        }
    
        // Crear la nueva sección con el ID de sección generado y los demás campos del request
        Seccion::create([
            'idseccion' => $newIdSeccion,
            'idgrado' => $request->input('idgrado'),
            'idespecialidad' => $request->input('idespecialidad'),
            'idaula' => 'AU0001',
            'idgrupos' => $request->input('idgrupo'),
            'cantidad' => $request->input('cantidad'),
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
        $grados = Grado::all();
        $grupos = Grupo::all();
        return view('secciones.edit', compact('seccion','especialidades','grados','grupos'));
    }

    public function update(Request $request, $idseccion)
    {
        $request->validate([
            'idgrado' => 'required|string|max:6',
            'idespecialidad' => 'required|string|max:6',
            'idaula' => 'AU0001',
            'idgrupos' => 'required|string|max:6',
            'cantidad' => 'required|string|max:2'
        ]);

        $seccion = Seccion::findOrFail($idseccion);
        $seccion->update($request->all());

        return redirect()->route('secciones.index')->with('success', 'Sección actualizada con éxito.');
    }
}
