@extends('layouts.inscripciones')

@section('title', 'Agregar Aspirante')

@section('content')
<style>
    .opcional {
        color: red;
    }
    .subti {
        font-weight: bold;
    }
</style>
<script src="{{ asset('js/estudiantes.js') }}"></script>
<div class="Busqueda"></div>
<div class="container">
    <form action="{{ route('Estudiantes.store') }}" method="POST">
        @csrf
        <h5>DATOS PERSONALES DEL ESTUDIANTE</h5>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="idestudiante">NIE</label>
                    <input type="text" class="form-control" id="idestudiante" name="idestudiante" aria-describedby="IngresarNIE" maxlength="8" pattern="\d{8}" onkeypress="permitirSoloNumeros(event)">
                    <small id="idestudiante" class="form-text text-muted">Ingresar NIE.</small>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="carnetmenoridad">Carnet de Menoridad (Si posee)<span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="carnetmenoridad" name="carnetmenoridad" aria-describedby="IngresarCARNET" maxlength="10" placeholder="Ingresar Carnet">
                    <small id="carnetmenoridad" class="form-text text-muted">Ingresar Carnet de Menoridad.</small>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" aria-describedby="IngresarNOMBRE" maxlength="100" placeholder="Ingresar Nombres">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" aria-describedby="IngresarAPELLIDOS" maxlength="100" placeholder="Ingresar Apellidos">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="fechanacimiento">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento" aria-describedby="IngresarFECHA" onchange="calcularEdad()" required>
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
                    <input type="text" class="form-control" id="identificacion" name="identificacion" aria-describedby="IngresarDUI" maxlength="9" placeholder="Ingresar DUI">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="telefonofijo">Telefono Fijo <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="telefonofijo" name="telefonofijo" aria-describedby="Ingresartel" maxlength="8" placeholder="####-####">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="telefonomovil">Telefono Movil <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="telefonomovil" name="telefonomovil" aria-describedby="Ingresartel2" maxlength="8" placeholder="####-####">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="otrotelefono">Otro Telefono <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="otrotelefono" name="otrotelefono" aria-describedby="Ingresartel3" maxlength="8" placeholder="####-####">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="correopersonal">Correo Personal <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="correopersonal" name="correopersonal" aria-describedby="Ingresarcorreo" maxlength="100" placeholder="Ingresar correo">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="correoinstitucional">Correo Institucional <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="correoinstitucional" name="correoinstitucional" aria-describedby="Ingresarcorreo2" maxlength="100" placeholder="Ingresar Correo Institucional">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <br>
                <label for="genero">Sexo:</label><br>
                @foreach ($generos as $genero)
                      <input class="form-check-input" type="radio" name="genero" id="genero" value="{{$genero}}">
                <label class="form-check-label" for="masculino">
                    {{$genero}}
                </label>
                    @endforeach
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="direccion">Direccion <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="direccion" name="direccion" aria-describedby="Ingresarcorreo2" maxlength="256" placeholder="Ingresar Dirección">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="nacionalidad">Nacionalidad <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" aria-describedby="Ingresarnacionalidad" maxlength="256" placeholder="Ingresar Nacionalidad">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="departamento">Departamento <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="departamento" name="departamento" aria-describedby="Ingresardepartamento" maxlength="256" placeholder="Ingresar Departamento">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="municipio">Municipio <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="municipio" name="municipio" aria-describedby="Ingresarmunicipio" maxlength="256" placeholder="Ingresar Municipio">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="distrito">Distrito <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="distrito" name="distrito" aria-describedby="Ingresardistrito" maxlength="256" placeholder="Ingresar distrito">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="estadocivil">Estado Civil <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="estadocivil" name="estadocivil" aria-describedby="Ingresarestadocivil" maxlength="2" placeholder="Ingresar Estado Civil">
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
                    <input class="form-check-input" type="radio" name="idgrado" id="idgrado" value="{{ $grado->idgrado }}">
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
                    <input class="form-check-input" type="radio" name="idespecialidad" id="idespecialidad" value="{{ $especialidad->idespecialidad }}">
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
                        <option value="{{ $modalidad }}">{{ $modalidad }}</option>
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
                    <input type="text" class="form-control" id="nombresencargados" name="nombresencargados" aria-describedby="IngresarNOMBRE" maxlength="100" placeholder="Ingresar Nombres">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="apellidosencargados">Apellidos</label>
                    <input type="text" class="form-control" id="apellidosencargados" name="apellidosencargados" aria-describedby="IngresarAPELLIDOS" maxlength="100" placeholder="Ingresar Apellidos">
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
                        <option value="{{ $parentesco }}">{{ $relacion }}</option>
                        @endforeach
                    </select>
                </div>
            </div> 
            <div class="col-4">
                <div class="form-group">
                    <label for="numtelefono">Numero de telefono</label>
                    <input type="text" class="form-control" id="numtelefono" name="numtelefono" aria-describedby="IngresarNOMBRE" maxlength="8" placeholder="Ingresar telefono">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="responsable">Es responsable del aspirante?</label>
                    <br>
                    @foreach ($opciones as $valor=>$opcion)
                      <input class="form-check-input" type="radio" name="responsable" id="responsable" value="{{$opcion}}">
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
                    <input type="text" class="form-control" id="lugartrabajo" name="lugartrabajo" aria-describedby="IngresarNOMBRE" maxlength="256" >
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="telefonotrabajo">Telefono de trabajo</label>
                    <input type="text" class="form-control" id="telefonotrabajo" name="telefonotrabajo" aria-describedby="IngresarAPELLIDOS" maxlength="8" placeholder="Ingresar telefono de trabajo">
                </div>
            </div> 
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
