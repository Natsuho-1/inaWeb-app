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
    public function index(Request $request)
    {
        $query = Seccion::query();
    
        if ($request->filled('grado')) {
            $query->where('idgrado', $request->input('grado'));
        }
    
        if ($request->filled('especialidad')) {
            $query->where('idespecialidad', $request->input('especialidad'));
        }
    
        if ($request->filled('nivel')) {
            // Asumiendo que la relación entre grado y nivel está definida en tu modelo de grado
            $query->whereHas('grado', function ($q) use ($request) {
                $q->where('idnivel', $request->input('nivel'));
            });
        }
    
        $secciones = $query->get();
        $grados = Grado::all();
        $especialidades = Especialidad::all();
        $niveles = Nivel::all(); // Asumiendo que tienes un modelo y tabla para los niveles
    
        return view('secciones.index', compact('secciones', 'grados', 'especialidades', 'niveles'));
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
            'cantidad' => 'required|string|max:2',
            
        ]);
     // Verificar si ya existe una sección con los mismos valores de grado, especialidad y grupo
     $existingSeccion = Seccion::where('idgrado', $request->input('idgrado'))
     ->where('idespecialidad', $request->input('idespecialidad'))
     ->where('idgrupos', $request->input('idgrupo'))
     ->first();

 if ($existingSeccion) {
     return redirect()->back()->withErrors(['duplicate' => 'Ya existe una sección con el mismo grado, especialidad y grupo.']);
 }

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
     'inscritos' => 0,
 ]);

 return redirect()->route('secciones.index')->with('success', 'Sección creada exitosamente.');
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
    $seccion = Seccion::findOrFail($idseccion);

    // Validar que la capacidad sea mayor que el número de estudiantes inscritos
    $request->validate([
        'cantidad' => 'required|integer|min:' . ($seccion->inscritos + 1),
    ], [
        'cantidad.min' => 'La capacidad debe ser mayor que el número de estudiantes inscritos (' . $seccion->inscritos . ').'
    ]);

    // Si la sección tiene estudiantes inscritos, solo permitimos cambiar la capacidad
    if ($seccion->inscritos != 0) {
        $seccion->cantidad = $request->cantidad;
    } else {
        // Si no tiene estudiantes inscritos, permitimos cambiar todos los campos
        $seccion->idgrado = $request->idgrado;
        $seccion->idespecialidad = $request->idespecialidad;
        $seccion->idgrupos = $request->idgrupos;
        $seccion->cantidad = $request->cantidad;
    }

    $seccion->save();

    return redirect()->route('secciones.index')->with('success', 'Sección actualizada correctamente.');
}

}
