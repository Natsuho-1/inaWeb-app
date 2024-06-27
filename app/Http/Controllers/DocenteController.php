<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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
        $data = $request->all();
        Log::info('Datos del formulario', $data);

        // Validar los datos del formulario
        $request->validate([
            // Docente
            'iddocente' => 'required|string|max:8',
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
            'pasaporte' => 'nullable|string|max:50',
            'otros_cargos' => 'nullable|string',
            'lugar' => 'nullable|string|max:100',
            'otra_institucion' => 'nullable|string|max:100',
            'telefono_otrainstitucion' => 'nullable|string|max:15',
            'turno' => 'nullable|string|max:50',
            'idseccion' => 'nullable|string|max:6',
            // Personal
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'fechaNacimiento' => 'nullable|date',
            'identificacion' => 'nullable|string|max:9',
            'telefonofijo' => 'nullable|string|max:8',
            'telefonomovil' => 'nullable|string|max:8',
            'otrotelefono' => 'nullable|string|max:8',
            'genero' => 'nullable|string|max:15',
            'correopersonal' => 'nullable|string|max:100',
            'correoinstitucional' => 'nullable|string|max:100',
            'direccion' => 'nullable|string|max:256',
            'nacionalidad' => 'nullable|string|max:256',
            'departamento' => 'nullable|string|max:256',
            'municipio' => 'nullable|string|max:256',
            'distrito' => 'nullable|string|max:256',
            'estadocivil' => 'nullable|string|max:2', // 'S', 'C', 'A', 'D', 'V'
        ]);

        DB::transaction(function () use ($request) {
            // Crear un nuevo registro en la tabla 'usuarios'
            $usuario = Usuario::create([
                'idusuario' => $request->iddocente,
                'idrol' => '2',
                'correo_usuario' => $request->correopersonal,
                'contraseña' => bcrypt('123456'), // Make sure to hash passwords
            ]);

            // Crear una nueva persona
            $persona = Persona::create([
                'idusuario' => $usuario->idusuario,
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'fechaNacimiento' => $request->fechaNacimiento,
                'identificacion' => $request->identificacion,
                'telefonofijo' => $request->telefonofijo,
                'telefonomovil' => $request->telefonomovil,
                'otrotelefono' => $request->otrotelefono,
                'genero' => $request->genero,
                'correopersonal' => $request->correopersonal,
                'correoinstitucional' => $request->correoinstitucional,
                'direccion' => $request->direccion,
                'nacionalidad' => $request->nacionalidad,
                'departamento' => $request->departamento,
                'municipio' => $request->municipio,
                'distrito' => $request->distrito,
                'estadocivil' => $request->estadocivil,
            ]);

            // Crear un nuevo docente vinculado a la persona
            Docente::create([
                'iddocente' => $request->iddocente,
                'idseccion' => $request->idseccion,
                'idpersonal' => $persona->idpersonal,
                'dui' => $request->dui,
                'nit' => $request->nit,
                'nip' => $request->nip,
                'nivel' => $request->nivel,
                'categoria' => $request->categoria,
                'especialidad' => $request->especialidad,
                'fecha_graduacion' => $request->fecha_graduacion,
                'inpep' => $request->inpep,
                'isss' => $request->isss,
                'afp' => $request->afp,
                'nup' => $request->nup,
                'pasaporte' => $request->pasaporte,
                'otros_cargos' => $request->otros_cargos,
                'lugar' => $request->lugar,
                'otra_institucion' => $request->otra_institucion,
                'telefono_otrainstitucion' => $request->telefono_otrainstitucion,
                'turno' => $request->turno,
            ]);
        });

        return redirect()->route('docentes.index')->with('success', 'Docente creado exitosamente');
    }

    public function edit(Docente $docente)
    {
        return view('docentes.edit', compact('docente'));
    }

    public function update(Request $request, Docente $docente)
    {
        $validatedData = $request->validate([
            'iddocente' => 'required|string|max:8',
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
