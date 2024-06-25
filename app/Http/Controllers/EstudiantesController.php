<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Estudiantes;
use App\Models\Especialidad;
use App\Models\Grado;
use App\Models\Persona;
use App\Models\Usuario;
use App\Models\Familiares;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $modalidades = ['Virtual', 'Presencial', 'A Distancia'];
    protected$parentescos = ['Padre'=>'P','Madre'=>'M','Hermano'=>'Ho','Hermana'=>'Ha','Tio'=>'To','Tia'=>'Ta','Abuelo'=>'Ao','Abuela'=>'Aa','Otro'=>'O'];
    protected$opciones = ['SI'=>1,'NO'=>0];
    protected$generos = ['Masculino','Femenino'];
    public function index(Request $request)
    {
        $query = Estudiantes::query();

        if ($request->filled('grade')) {
            $query->where('idgrado', $request->grade);
        }

        if ($request->filled('specialty')) {
            $query->where('idespecialidad', $request->specialty);
        }

        $estudiantes = $query->get();
        $grados = Grado::all();
        $especialidades = Especialidad::all();

        return view('estudiantes.index', [
            'estudiantes' => $estudiantes,
            'grados' => $grados,
            'especialidades' => $especialidades,
            'request' => $request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modalidades = $this->modalidades;
        $parentescos=$this->parentescos;
        $opciones=$this->opciones;
        $generos=$this->generos;
        $grados = Grado::all();
        $especialidades = Especialidad::all();
        return view('Estudiantes.create',compact('grados','especialidades','modalidades','parentescos','opciones','generos'));
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
    try{
    $request->validate([
        //Aspirante
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
        'estadocivil' => 'nullable|string|max:2',
        'idespecialidad'=>'required|string|max:6',
        'idgrado'=> 'required|string|max:6',
        
        //familiares
        'nombresencargados'=> 'required|string|max:100',
        'apellidosencargados'=> 'required|string|max:100',
        'numtelefono'=> 'required|string|max:8',
        'idpersonal'=> 'required',
        'parentesco'=> 'required|string|max:2',
        'lugartrabajo'=> 'required|string|max:256',
        'telefonotrabajo'=> 'required|string|max:8',
        'responsable'=> 'required'
    ]);
    } catch (\Exception $e) {
        Log::error($e->getMessage());
    }
    DB::transaction(function () use ($request) {
        // Crear un nuevo registro en la tabla 'usuarios'
        /*$usuario = Usuario::create([
            'idusuario' => $request->idestudiante,
            'idrol' => '3',
            'correo_usuario' => $request->correopersonal,
            'contraseña' => '123456',
        ]);*/
        // Crear una nueva persona
        $persona = Persona::create([
            //'idusuario' => $usuario->idusuario,
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
            'idgrado'=> $request->idgrado,
            'idespecialidad'=> $request->idespecialidad,
            'carnetmenoridad' => $request->carnetmenoridad,
            'modalidad' => $request->modalidad,
            'estadoestudiante'=> '0',
            'inscrito' => '0'
        ]);
        Familiares::create([
            'idestudiante' => $request->idestudiante,
            'idpersonal' => $idPersonal,
            'nombresencargados'=> $request->nombresencargados,
            'apellidosencargados'=> $request->apellidosencargados,
            'numtelefono'=> $request->numtelefono,
            'parentesco'=> $request->parentesco,
            'lugartrabajo'=> $request->lugartrabajo,
            'telefonotrabajo'=> $request->telefonotrabajo,
            'responsable'=> $request->responsable
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
