<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Persona;
use App\Models\Usuario;
use App\Models\Asignatura;
use App\Models\Nivel;
use App\Models\Especialidad;
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
        $asignaturas = Asignatura::all();
        $niveles = Nivel::all();
        $especialidades = Especialidad::all();
        return view('docentes.create', compact('asignaturas', 'niveles', 'especialidades'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Log::info('Datos del formulario', $data);
        try {
            // Validar los datos del formulario
            $request->validate([
                // Docente
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
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
        DB::transaction(function () use ($request) {

             // generando el ID docente
        $lastDocente = Docente::orderBy('iddocente', 'desc')->first();
        if ($lastDocente) {
            $lastIdNumber = (int) substr($lastDocente->iddocente, 3);
            $newIdNumber = $lastIdNumber + 1;
        } else {
            $newIdNumber = 1;
        }
        $newId = 'DCT' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
        
            // Crear un nuevo registro en la tabla 'usuarios'
            $usuario = Usuario::create([
                'idusuario' => $newId,
                'idrol' => '2',
                'correo_usuario' => $request->correopersonal,
                'contraseña' => ('123456'), // Make sure to hash passwords
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
                'correopersonal' => $usuario->correo_usuario,
                'correoinstitucional' => $request->correoinstitucional,
                'direccion' => $request->direccion,
                'nacionalidad' => $request->nacionalidad,
                'departamento' => $request->departamento,
                'municipio' => $request->municipio,
                'distrito' => $request->distrito,
                'estadocivil' => $request->estadocivil,
            ]);
            
            // Acceder al idpersonal de la persona recién creada
            $idPersonal = $persona->idpersonal;
            Log::info('ID Personal:', ['idpersonal' => $idPersonal]);

            // Crear un nuevo docente vinculado a la persona
            Docente::create([
                'iddocente' => $newId,
                'idpersonal' => $persona->idpersonal,
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
