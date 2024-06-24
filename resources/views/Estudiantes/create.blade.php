@extends('layouts.Estudiantes')

@section('title', 'Agregar Estudiante')

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
                    <input type="text" class="form-control" id="carnetmenoridad" name="carnetmenoridad" aria-describedby="IngresarCARNET" placeholder="Ingresar Carnet">
                    <small id="carnetmenoridad" class="form-text text-muted">Ingresar Carnet de Menoridad.</small>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" aria-describedby="IngresarNOMBRE" placeholder="Ingresar Nombres">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" aria-describedby="IngresarAPELLIDOS" placeholder="Ingresar Apellidos">
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
                    <input type="text" class="form-control" id="identificacion" name="identificacion" aria-describedby="IngresarDUI" placeholder="Ingresar DUI">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="telefonofijo">Telefono Fijo <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="telefonofijo" name="telefonofijo" aria-describedby="Ingresartel" placeholder="####-####">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="telefonomovil">Telefono Movil <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="telefonomovil" name="telefonomovil" aria-describedby="Ingresartel2" placeholder="####-####">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="otrotelefono">Otro Telefono <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="otrotelefono" name="otrotelefono" aria-describedby="Ingresartel3" placeholder="####-####">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="correopersonal">Correo Personal <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="correopersonal" name="correopersonal" aria-describedby="Ingresarcorreo" placeholder="Ingresar correo">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="correoinstitucional">Correo Institucional <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="correoinstitucional" name="correoinstitucional" aria-describedby="Ingresarcorreo2" placeholder="Ingresar Correo Institucional">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <br>
                <label for="genero">Sexo:</label><br>
                <input class="form-check-input" type="radio" name="genero" id="genero" value="Masculino">
                <label class="form-check-label" for="masculino">
                    Masculino
                </label>
                <input class="form-check-input" type="radio" name="genero" id="genero" value="Femenino">
                <label class="form-check-label" for="femenino">
                    Femenino
                </label>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="direccion">Direccion <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="direccion" name="direccion" aria-describedby="Ingresarcorreo2" placeholder="Ingresar Dirección">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="nacionalidad">Nacionalidad <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" aria-describedby="Ingresarnacionalidad" placeholder="Ingresar Nacionalidad">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="departamento">Departamento <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="departamento" name="departamento" aria-describedby="Ingresardepartamento" placeholder="Ingresar Departamento">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="municipio">Municipio <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="municipio" name="municipio" aria-describedby="Ingresarmunicipio" placeholder="Ingresar Municipio">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="distrito">Distrito <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="distrito" name="distrito" aria-describedby="Ingresardistrito" placeholder="Ingresar distrito">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="estadocivil">Estado Civil <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="estadocivil" name="estadocivil" aria-describedby="Ingresarestadocivil" placeholder="Ingresar Estado Civil">
                </div>
            </div>
        </div>
        <br>
        <h5>INFORMACIÓN ACADÉMICA DEL ASPIRANTE</h5>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label class="subti" for="nivel">Nivel al que aspira</label><br>
                    @foreach ($grados as $grado)
                    <input class="form-check-input" type="radio" name="nivel" id="nivel" value="{{ $grado->idgrado }}">
                    <label class="form-check-label" for="nivel">
                        {{ $grado->descripciongrado }}
                    </label><br>
                    @endforeach
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label class="subti" for="especialidad">Especialidad a la que aspira</label><br>
                    @foreach ($especialidades as $especialidad)
                    <input class="form-check-input" type="radio" name="especialidad" id="especialidad" value="{{ $especialidad->idespecialidad }}">
                    <label class="form-check-label" for="especialidad">
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
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
