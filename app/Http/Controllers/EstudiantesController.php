<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Estudiantes;
use App\Models\Especialidad;
use App\Models\Grado;
use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $modalidades = ['Virtual', 'Presencial', 'A Distancia'];
    public function index()
    {
        Log::info('Entrando al método index');
        $estudiantes = Estudiantes::with('persona')->get();
        Log::info('Estudiantes obtenidos', ['estudiantes' => $estudiantes]);
        return view('Estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modalidades = $this->modalidades;
        $grados = Grado::all();
        $especialidades = Especialidad::all();
        return view('Estudiantes.create',compact('grados','especialidades','modalidades'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->all();
        Log::info('Datos del formulario', $data);
    // Validar los datos del formulario
    $request->validate([
        'idestudiante' => 'required|string|max:8',
        'carnetmenoridad' => 'nullable|string|max:10',
        'modalidad' => 'nullable|string|max:15',
        'inscrito' => 'nullable|string|max:2',
        'nombres' => 'required|string|max:100',
        'apellidos' => 'required|string|max:100',
        'fechanacimiento' => 'required',
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
        'estadocivil' => 'nullable|string|max:2'
    ]);

    DB::transaction(function () use ($request) {
        // Crear un nuevo registro en la tabla 'usuarios'
        $usuario = Usuario::create([
            'idusuario' => $request->idestudiante,
            'idrol' => '3',
            'correo_usuario' => $request->correopersonal,
            'contraseña' => '123456',
        ]);
        // Crear una nueva persona
        $persona = Persona::create([
            'idusuario' => $usuario->idusuario,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'fechanacimiento' => $request->fechanacimiento,
            'identificacion' => $request->identificacion,
            'telefonofijo' => $request->telefonofijo,
            'telefonomovil' => $request->telefonomovil,
            'otrotelefono' => $request->otrotelefono,
            'genero' => $request->genero,
            'correoinstitucional' => $request->correoinstitucional,
            'direccion' => $request->direccion,
            'nacionalidad' => $request->nacionalidad,
            'departamento' => $request->departamento,
            'municipio' => $request->municipio,
            'distrito' => $request->distrito,
            'estadocivil' => $request->estadocivil
        ]);
         // Acceder al idpersonal de la persona recién creada
         $idPersonal = $persona->idpersonal;
         Log::info('ID Personal:', ['idpersonal' => $idPersonal]);

        // Crear un nuevo estudiante vinculado a la persona
        Estudiantes::create([
            'idestudiante' => $request->idestudiante,
            'idpersonal' => $idPersonal,
            'carnetmenoridad' => $request->carnetmenoridad,
            'modalidad' => $request->modalidad,
            'inscrito' => '0'
        ]);
    });

    // Redirigir a la lista de estudiantes con un mensaje de éxito
    return redirect()->route('Estudiantes.index')->with('success', 'Estudiante creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiantes $estudiantes)
    {
        //
    }
}
