@extends('layouts.inscripciones')
@section('title', 'inscripciones')

@section('content')
<div class="container">
    <h1>Editar inscripcion</h1>
    <form action="{{ route('Estudiantes.update', $estudiantes->idestudiante) }}" method="POST">
        @csrf
        @method('PUT')
        <h5>DATOS PERSONALES DEL ESTUDIANTE</h5>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="idestudiante">NIE</label>
                    <input type="text" class="form-control" id="idestudiante" value="{{$estudiantes->idestudiante}}" name="idestudiante" aria-describedby="IngresarNIE" maxlength="8" pattern="\d{8}" onkeypress="permitirSoloNumeros(event)">
                    <small id="idestudiante" class="form-text text-muted">Ingresar NIE.</small>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="carnetmenoridad">Carnet de Menoridad (Si posee)<span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="carnetmenoridad" value="{{$estudiantes->carnetmenoridad}}" name="carnetmenoridad" aria-describedby="IngresarCARNET" maxlength="10" placeholder="Ingresar Carnet">
                    <small id="carnetmenoridad" class="form-text text-muted">Ingresar Carnet de Menoridad.</small>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" id="nombres" value="{{$estudiantes->persona->nombres}}" name="nombres" aria-describedby="IngresarNOMBRE" maxlength="100" placeholder="Ingresar Nombres">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" value="{{$estudiantes->persona->apellidos}}" name="apellidos" aria-describedby="IngresarAPELLIDOS" maxlength="100" placeholder="Ingresar Apellidos">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="fechanacimiento">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fechanacimiento" value="{{$estudiantes->persona->fechaNacimiento}}" name="fechanacimiento" aria-describedby="IngresarFECHA" onchange="calcularEdad()" required>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="edad">Edad</label>
                    <input type="number" class="form-control" id="edad" name="edad" aria-describedby="IngresarEDAD" placeholder="Ingresar Edad" min="0" max="100" onkeypress="permitirSoloNumeros(event)" disabled>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="identificacion">DUI (Si es mayor de 18 años)<span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="identificacion" value="{{$estudiantes->persona->identificacion}}" name="identificacion" aria-describedby="IngresarDUI" maxlength="9" placeholder="Ingresar DUI">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="telefonofijo">Telefono Fijo <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="telefonofijo" value="{{$estudiantes->persona->telefonofijo}}" name="telefonofijo" aria-describedby="Ingresartel" maxlength="8" placeholder="####-####">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="telefonomovil">Telefono Movil <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="telefonomovil" value="{{$estudiantes->persona->telefonomovil}}" name="telefonomovil" aria-describedby="Ingresartel2" maxlength="8" placeholder="####-####">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="otrotelefono">Otro Telefono <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="otrotelefono" value="{{$estudiantes->persona->otrotelefono}}" name="otrotelefono" aria-describedby="Ingresartel3" maxlength="8" placeholder="####-####">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="correopersonal">Correo Personal <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="correopersonal" value="{{$estudiantes->persona->correopersonal}}" name="correopersonal" aria-describedby="Ingresarcorreo" maxlength="100" placeholder="Ingresar correo">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="correoinstitucional">Correo Institucional <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="correoinstitucional" value="{{$estudiantes->persona->correoinstitucional}}" name="correoinstitucional" aria-describedby="Ingresarcorreo2" maxlength="100" placeholder="Ingresar Correo Institucional">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <br>
                <label for="genero">Sexo:</label><br>
                @foreach ($generos as $genero)
                      <input class="form-check-input" type="radio" name="genero" id="genero" value="{{$genero}}" {{ $genero == $estudiantes->persona->genero ? 'checked' : '' }}>
                <label class="form-check-label" for="masculino">
                    {{$genero}}
                </label>
                    @endforeach
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="direccion">Direccion <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="direccion" value="{{$estudiantes->persona->direccion}}" name="direccion" aria-describedby="Ingresarcorreo2" maxlength="256" placeholder="Ingresar Dirección">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="nacionalidad">Nacionalidad <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="nacionalidad" value="{{$estudiantes->persona->nacionalidad}}" name="nacionalidad" aria-describedby="Ingresarnacionalidad" maxlength="256" placeholder="Ingresar Nacionalidad">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="departamento">Departamento <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="departamento" value="{{$estudiantes->persona->departamento}}" name="departamento" aria-describedby="Ingresardepartamento" maxlength="256" placeholder="Ingresar Departamento">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="municipio">Municipio <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="municipio" value="{{$estudiantes->persona->municipio}}" name="municipio" aria-describedby="Ingresarmunicipio" maxlength="256" placeholder="Ingresar Municipio">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="distrito">Distrito <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="distrito" value="{{$estudiantes->persona->distrito}}" name="distrito" aria-describedby="Ingresardistrito" maxlength="256" placeholder="Ingresar distrito">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="estadocivil">Estado Civil <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="estadocivil"  value="{{$estudiantes->persona->estadocivil}}" name="estadocivil" aria-describedby="Ingresarestadocivil" maxlength="2" placeholder="Ingresar Estado Civil">
                </div>
            </div>
        </div>
        <br>
        <h5>INFORMACIÓN ACADÉMICA DEL ASPIRANTE</h5>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="subti" for="nivel">Nivel al que aspira</label><br>
                    @foreach ($grados as $grado)
                    <input class="form-check-input" type="radio" name="idgrado" id="idgrado" value="{{ $grado->idgrado }}" {{ $grado->idgrado == $estudiantes->idgrado ? 'checked' : '' }}>
                    <label class="form-check-label" for="nivel">
                        {{ $grado->descripciongrado }}
                    </label><br>
                    @endforeach
                </div>
            </div>
        <br>
            <div class="col-6">
                <div class="form-group">
                    <label class="subti" for="especialidad">Especialidad a la que aspira</label><br>
                    @foreach ($especialidades as $especialidad)
                    <input class="form-check-input" type="radio" name="idespecialidad" id="idespecialidad" value="{{ $especialidad->idespecialidad }}" {{ $especialidad->idespecialidad == $estudiantes->idespecialidad ? 'checked' : '' }}>
                    <label class="form-check-label" for="idespecialidad">
                        {{ $especialidad->descripcionspecialidad }}
                    </label><br>
                    @endforeach
                </div>
            </div>
         </div>
        <br>
        <div class="row">
            <div class="col-4">
             <div class="form-group">
                <label class="subti" for="modalidad">Modalidad</label><br>
                    <select class="form-select" id="modalidad" name="modalidad" required>
                        @foreach($modalidades as $modalidad)
                            <option value="{{ $modalidad }}" {{ $modalidad == $estudiantes->modalidad ? 'selected' : '' }}>
                                {{ $modalidad }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <br>
        <h5>INFORMACIÓN DEL RESPONSABLE</h5>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="nombresencargados">Nombres</label>
                    @foreach ($estudiantes->familiares as $familiar)
                    <input type="text" class="form-control" id="nombresencargados" value="{{$familiar->nombresencargados}}" name="nombresencargados" aria-describedby="IngresarNOMBRE" maxlength="100" placeholder="Ingresar Nombres">
                    @endforeach
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="apellidosencargados">Apellidos</label>
                    @foreach ($estudiantes->familiares as $familiar)
                    <input type="text" class="form-control" id="apellidosencargados" value="{{$familiar->apellidosencargados}}" name="apellidosencargados" aria-describedby="IngresarAPELLIDOS" maxlength="100" placeholder="Ingresar Apellidos">
                    @endforeach
                </div>
            </div> 
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="parentesco">Parentesco</label>
                    <select class="form-select" id="parentesco" name="parentesco" required>
                        @foreach($parentescos as $relacion =>$parentesco)
                        <option value="{{ $parentesco }}" {{ $parentesco == $familiar->parentesco ? 'selected' : '' }}>
                        {{ $relacion }}</option>
                        @endforeach
                    </select>
                </div>
            </div> 
            <div class="col-4">
                <div class="form-group">
                    <label for="numtelefono">Numero de telefono</label>
                    @foreach ($estudiantes->familiares as $familiar)
                    <input type="text" class="form-control" id="numtelefono" value="{{$familiar->numtelefono}}" name="numtelefono" aria-describedby="IngresarNOMBRE" maxlength="8" placeholder="Ingresar telefono">
                    @endforeach
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="responsable">Es responsable del aspirante?</label>
                    <br>
                    @foreach ($opciones as $valor=>$opcion)
                      <input class="form-check-input" type="radio" name="responsable" id="responsable" value="{{$opcion}}"  {{ $opcion == $familiar->responsable ? 'checked' : '' }}>
                <label class="form-check-label" for="masculino">
                    {{$valor}}
                </label>
                    @endforeach
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="lugartrabajo">Lugar de trabajo</label>
                    @foreach ($estudiantes->familiares as $familiar)
                    <input type="text" class="form-control" id="lugartrabajo" value="{{$familiar->lugartrabajo}}" name="lugartrabajo" aria-describedby="IngresarNOMBRE" maxlength="256" >
                    @endforeach
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="telefonotrabajo">Telefono de trabajo</label>
                    @foreach ($estudiantes->familiares as $familiar)
                    <input type="text" class="form-control" id="telefonotrabajo" value="{{$familiar->telefonotrabajo}}" name="telefonotrabajo" aria-describedby="IngresarAPELLIDOS" maxlength="8" placeholder="Ingresar telefono de trabajo">
                    @endforeach
                </div>
            </div> 
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection