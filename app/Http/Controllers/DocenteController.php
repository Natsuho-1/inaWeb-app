<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::all();
        return view('docentes.index', compact('docentes'));
    }

    public function create()
    {
        return view('docentes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'iddocente' => 'required|unique:docentes,iddocente|size:8',
            'nombre' => 'required|string|max:100',
            'edad' => 'required|integer',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string|max:1',
            'estado_civil' => 'required|string|max:50',
            'direccion' => 'required|string',
            'telefono_fijo' => 'nullable|string|max:15',
            'celular' => 'required|string|max:15',
            'celular_clase' => 'nullable|string|max:15',
            'dui' => 'required|string|max:10',
            'nit' => 'required|string|max:17',
            'nip' => 'nullable|string|max:15',
            'nivel' => 'required|string|max:50',
            'categoria' => 'required|string|max:50',
            'especialidad' => 'required|string|max:100',
            'fecha_graduacion' => 'required|date',
            'inpep' => 'nullable|string|max:50',
            'isss' => 'nullable|string|max:50',
            'afp' => 'nullable|string|max:50',
            'nup' => 'nullable|string|max:50',
            'nacionalidad' => 'required|string|max:50',
            'pasaporte' => 'nullable|string|max:50',
            'otros_cargos' => 'nullable|string',
            'lugar' => 'nullable|string|max:100',
            'otra_institucion' => 'nullable|string|max:100',
            'telefono_otrainstitucion' => 'nullable|string|max:15',
            'turno' => 'nullable|string|max:50',
            'idseccion' => 'nullable|string|max:6|exists:secciones,idseccion',
            'idpersonal' => 'required|integer|exists:persona,idpersonal',
        ]);

        Docente::create($validatedData);

        return redirect()->route('docentes.index')->with('success', 'Docente creado exitosamente');
    }

    public function edit(Docente $docente)
    {
        return view('docentes.edit', compact('docente'));
    }

    public function update(Request $request, Docente $docente)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'edad' => 'required|integer',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string|max:1',
            'estado_civil' => 'required|string|max:50',
            'direccion' => 'required|string',
            'telefono_fijo' => 'nullable|string|max:15',
            'celular' => 'required|string|max:15',
            'celular_clase' => 'nullable|string|max:15',
            'dui' => 'required|string|max:10',
            'nit' => 'required|string|max:17',
            'nip' => 'nullable|string|max:15',
            'nivel' => 'required|string|max:50',
            'categoria' => 'required|string|max:50',
            'especialidad' => 'required|string|max:100',
            'fecha_graduacion' => 'required|date',
            'inpep' => 'nullable|string|max:50',
            'isss' => 'nullable|string|max:50',
            'afp' => 'nullable|string|max:50',
            'nup' => 'nullable|string|max:50',
            'nacionalidad' => 'required|string|max:50',
            'pasaporte' => 'nullable|string|max:50',
            'otros_cargos' => 'nullable|string',
            'lugar' => 'nullable|string|max:100',
            'otra_institucion' => 'nullable|string|max:100',
            'telefono_otrainstitucion' => 'nullable|string|max:15',
            'turno' => 'nullable|string|max:50',
            'idseccion' => 'nullable|string|max:6|exists:secciones,idseccion',
            'idpersonal' => 'required|integer|exists:persona,idpersonal',
        ]);

        $docente->update($validatedData);

        return redirect()->route('docentes.index')->with('success', 'Docente actualizado exitosamente');
    }

    public function destroy(Docente $docente)
    {
        $docente->delete();

        return redirect()->route('docentes.index')->with('success', 'Docente eliminado exitosamente');
    }
}

