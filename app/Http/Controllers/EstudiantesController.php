<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Estudiantes;
use App\Models\Especialidad;
use App\Models\Grado;
use App\Models\Grupo;
use App\Models\Seccion;
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
    protected $modalidades = ['Presencial','Virtual', 'A Distancia'];
    protected $estadocivil = ['Soltero'=>'S','Casado'=>'C','Acompañado'=>'A','Dicorciado'=>'D','Viudo'=>'V'];
    protected $parentescos = ['Padre'=>'P','Madre'=>'M','Hermano'=>'Ho','Hermana'=>'Ha','Tio'=>'To','Tia'=>'Ta','Abuelo'=>'Ao','Abuela'=>'Aa','Otro'=>'O'];
    protected $opciones = ['SI'=>1,'NO'=>0];
    protected $generos = ['Masculino','Femenino'];
    
    public function index(Request $request)
    {
        $grados = Grado::all();
        $especialidades = Especialidad::all();
    
        // Obtener todos los grupos con sus secciones filtradas por grado y especialidad
        $grupos = Grupo::with(['secciones' => function($query) use ($request) {
            if ($request->filled('grade')) {
                $query->where('idgrado', $request->grade);
            }
            if ($request->filled('specialty')) {
                $query->where('idespecialidad', $request->specialty);
            }
        }])->get();
    
        // Obtener estudiantes que cumplen con los filtros y el campo inscrito igual a 0
        $estudiantes = Estudiantes::with(['persona', 'grado', 'especialidad', 'seccion'])
            ->where('inscrito', 0) // Mostrar solo estudiantes con inscrito igual a 0
            ->when($request->filled('grade'), function($query) use ($request) {
                $query->whereHas('grado', function($q) use ($request) {
                    $q->where('idgrado', $request->grade);
                });
            })
            ->when($request->filled('specialty'), function($query) use ($request) {
                $query->whereHas('especialidad', function($q) use ($request) {
                    $q->where('idespecialidad', $request->specialty);
                });
            })
            ->get();
    
        return view('estudiantes.index', compact('grados', 'especialidades', 'grupos', 'estudiantes', 'request'));
    }
    

    public function aceptar($id)
    {
        $estudiante = Estudiantes::findOrFail($id);
        $grado = $estudiante->idgrado;
        $especialidad = $estudiante->idespecialidad; 
        $idpersona=$estudiante->idpersonal;

        $persona = Persona::findOrFail($idpersona);
        $correo=$persona->correopersonal;

        // Buscar una sección que cumpla con el grado y especialidad y que tenga capacidad disponible
        $seccion = Seccion::where('idgrado', $grado)
            ->where('idespecialidad', $especialidad)
            ->whereColumn('inscritos', '<', 'cantidad')
            ->first();

        if ($seccion) {
            $usuario = Usuario::create([
                'idusuario' => $id,
                'idrol' => '3',
                'correo_usuario' => $correo,
                'contraseña' => '123456',
            ]);
           
            $persona->idusuario=$id;
            $persona->save();
            // Asignar sección al estudiante
            $estudiante->idseccion = $seccion->idseccion;
            $estudiante->inscrito = 1;
            $estudiante->save();

            // Incrementar el número de inscritos en la sección
            $seccion->inscritos += 1;
            $seccion->save();

            return redirect()->route('Estudiantes.index')->with('success', 'Estudiante inscrito correctamente.');
        } else {
            return redirect()->route('Estudiantes.index')->with('error', 'No hay secciones disponibles para este grado y especialidad.');
        }
}


    
public function alumno(Request $request)
{
    $query = Estudiantes::where('inscrito', 1);

if ($request->filled('grade')) {
    // Filtrar por grado a través de la relación con secciones
    $query->whereHas('seccion', function ($query) use ($request) {
        $query->where('idgrado', $request->grade);
    });
}

if ($request->filled('specialty')) {
    // Filtrar por especialidad a través de la relación con secciones
    $query->whereHas('seccion', function ($query) use ($request) {
        $query->where('idespecialidad', $request->specialty);
    });
}

if ($request->filled('grup')) {
    // Filtrar por grupo a través de la relación con secciones
    $query->whereHas('seccion', function ($query) use ($request) {
        $query->where('idgrupos', $request->grup);
    });
}

$estudiantes = $query->get();

$grados = Grado::all();
$especialidades = Especialidad::all();
$grupos = Grupo::all();
$secciones = Seccion::all();

return view('estudiantes.alumnos', compact('estudiantes', 'secciones', 'grados', 'especialidades', 'grupos', 'request'));}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modalidades = $this->modalidades;
        $parentescos=$this->parentescos;
        $opciones=$this->opciones;
        $generos=$this->generos;
        $estadosciviles=$this->estadocivil;
        $grados = Grado::all();
        $especialidades = Especialidad::all();
        return view('Estudiantes.create',compact('grados','especialidades','modalidades','parentescos','opciones','generos','estadosciviles'));
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
        'lugartrabajo'=> 'required|string|max:256',
        'parentesco'=> 'required|string|max:2',
        'telefonotrabajo'=> 'required|string|max:8'
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
            'correopersonal'=>$request->correopersonal,
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
            'responsable'=> '1'
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
    public function edit($id)
    {
        $modalidades = $this->modalidades;
        $parentescos=$this->parentescos;
        $opciones=$this->opciones;
        $generos=$this->generos;
        $estadosciviles=$this->estadocivil;
        $grados = Grado::all();
        $especialidades = Especialidad::all();
        $estudiantes = Estudiantes::with('persona', 'familiares')->findOrFail($id);
        return view('Estudiantes.edit', compact('estudiantes','grados','especialidades','modalidades','parentescos','opciones','generos','estadosciviles'));
    }
    public function editarAlumnos($id){
        $parentescos=$this->parentescos;
        $opciones=$this->opciones;
        $generos=$this->generos;
        $estadosciviles=$this->estadocivil;
        $estudiantes = Estudiantes::with('persona', 'familiares')->findOrFail($id);
        return view('Estudiantes.editarAlumnos', compact('estudiantes','parentescos','opciones','generos','estadosciviles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idestudiante)
    {
    // Validar los datos del formulario
    try {
        $request->validate([
            // Validación similar a la función store, pero ajustada para actualización
            'idestudiante' => 'required|string|max:8',
            'carnetmenoridad' => 'nullable|string|max:10',
            'modalidad' => 'nullable|string|max:15',
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
            'idespecialidad' => 'required|string|max:6',
            'idgrado' => 'required|string|max:6',

            //familiares
            'nombresencargados' => 'required|string|max:100',
            'apellidosencargados' => 'required|string|max:100',
            'numtelefono' => 'required|string|max:8',
            'lugartrabajo' => 'required|string|max:256',
            'parentesco' => 'required|string|max:2',
            'telefonotrabajo' => 'required|string|max:8'
        ]);
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        // Manejo de errores, redireccionamiento o respuesta apropiada
        // Por ejemplo, podrías redirigir de nuevo al formulario de edición con un mensaje de error
        return redirect()->back()->withErrors(['message' => 'Error al validar los datos.']);
    }

    // Obtener el ID personal asociado al idestudiante
    $persona = Persona::whereHas('estudiante', function ($query) use ($idestudiante) {
        $query->where('idestudiante', $idestudiante);
    })->firstOrFail();

    // Iniciar la transacción
    DB::transaction(function () use ($request, $persona) {
        // Actualizar la persona asociada al estudiante
        $persona->update([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'fechanacimiento' => $request->fechanacimiento,
            'identificacion' => $request->identificacion,
            'telefonofijo' => $request->telefonofijo,
            'telefonomovil' => $request->telefonomovil,
            'otrotelefono' => $request->otrotelefono,
            'genero' => $request->genero,
            'correoinstitucional' => $request->correoinstitucional,
            'correopersonal'=>$request->correopersonal,
            'direccion' => $request->direccion,
            'nacionalidad' => $request->nacionalidad,
            'departamento' => $request->departamento,
            'municipio' => $request->municipio,
            'distrito' => $request->distrito,
            'estadocivil' => $request->estadocivil
        ]);

        // Actualizar el estudiante
        $persona->estudiante->update([
            'idestudiante' => $request->idestudiante,
            'idgrado' => $request->idgrado,
            'idespecialidad' => $request->idespecialidad,
            'carnetmenoridad' => $request->carnetmenoridad,
            'modalidad' => $request->modalidad
        ]);

        // Actualizar el familiar asociado al estudiante
        $familiares = $persona->estudiante->familiares;
        foreach ($familiares as $familiar) {
        $familiar->update([
            'nombresencargados' => $request->nombresencargados,
            'apellidosencargados' => $request->apellidosencargados,
            'numtelefono' => $request->numtelefono,
            'parentesco' => $request->parentesco,
            'lugartrabajo' => $request->lugartrabajo,
            'telefonotrabajo' => $request->telefonotrabajo
        ]);
    }
    });

    // Redireccionar o devolver una respuesta de éxito
    return redirect()->route('Estudiantes.index')->with('success', 'Estudiante actualizado exitosamente.');
    }
    public function updateAlumnos(Request $request, $idestudiante)
    {
    // Validar los datos del formulario
    try {
        $request->validate([
            // Validación similar a la función store, pero ajustada para actualización
            'idestudiante' => 'required|string|max:8',
            'carnetmenoridad' => 'nullable|string|max:10',
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

            //familiares
            'nombresencargados' => 'required|string|max:100',
            'apellidosencargados' => 'required|string|max:100',
            'numtelefono' => 'required|string|max:8',
            'lugartrabajo' => 'required|string|max:256',
            'parentesco' => 'required|string|max:2',
            'telefonotrabajo' => 'required|string|max:8'
        ]);
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        // Manejo de errores, redireccionamiento o respuesta apropiada
        // Por ejemplo, podrías redirigir de nuevo al formulario de edición con un mensaje de error
        return redirect()->back()->withErrors(['message' => 'Error al validar los datos.']);
    }

    // Obtener el ID personal asociado al idestudiante
    $persona = Persona::whereHas('estudiante', function ($query) use ($idestudiante) {
        $query->where('idestudiante', $idestudiante);
    })->firstOrFail();

    // Iniciar la transacción
    DB::transaction(function () use ($request, $persona) {
        // Actualizar la persona asociada al estudiante
        $persona->update([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'fechanacimiento' => $request->fechanacimiento,
            'identificacion' => $request->identificacion,
            'telefonofijo' => $request->telefonofijo,
            'telefonomovil' => $request->telefonomovil,
            'otrotelefono' => $request->otrotelefono,
            'genero' => $request->genero,
            'correopersonal'=>$request->correopersonal,
            'correoinstitucional' => $request->correoinstitucional,
            'direccion' => $request->direccion,
            'nacionalidad' => $request->nacionalidad,
            'departamento' => $request->departamento,
            'municipio' => $request->municipio,
            'distrito' => $request->distrito,
            'estadocivil' => $request->estadocivil
        ]);

        // Actualizar el estudiante
        $persona->estudiante->update([
            'idestudiante' => $request->idestudiante,
            'carnetmenoridad' => $request->carnetmenoridad,
        ]);

        // Actualizar el familiar asociado al estudiante
        $familiares = $persona->estudiante->familiares;
        foreach ($familiares as $familiar) {
        $familiar->update([
            'nombresencargados' => $request->nombresencargados,
            'apellidosencargados' => $request->apellidosencargados,
            'numtelefono' => $request->numtelefono,
            'parentesco' => $request->parentesco,
            'lugartrabajo' => $request->lugartrabajo,
            'telefonotrabajo' => $request->telefonotrabajo
        ]);
    }
    });

    // Redireccionar o devolver una respuesta de éxito
    return redirect()->route('Estudiantes.alumnos')->with('success', 'Estudiante actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiantes $estudiantes)
    {
        //
    }
}
