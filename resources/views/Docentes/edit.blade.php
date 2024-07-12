@extends('layouts.docentes')

@section('title', 'Editar Docente')

@section('content')
<div class="container">
    <h1>Editar Docente</h1>
    <form action="{{ route('docentes.update', $docente->iddocente) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="nombres">Nombre</label>
                        <input type="text" name="nombres" class="form-control" value="{{ old('nombres', $persona->nombres) }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos', $persona->apellidos) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="fechaNacimiento">Fecha de Nacimiento</label>
                        <input type="date" name="fechaNacimiento" class="form-control" value="{{ old('fechaNacimiento', $persona->fechaNacimiento) }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mt-3">
                        <label for="identificacion">DUI</label>
                        <input type="text" name="identificacion" class="form-control" value="{{ old('identificacion', $persona->identificacion) }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mt-3">
                        <label for="nit">NIT</label>
                        <input type="text" name="nit" class="form-control" value="{{ old('nit', $docente->nit) }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mt-3">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" class="form-control" value="{{ old('nip', $docente->nip) }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="nivel">Nivel</label>
                        <select name="nivel" class="form-select" required>
                            @foreach($niveles as $nivel)
                                <option value="{{ $nivel->idnivel }}" {{ old('nivel', $docente->nivel) == $nivel->descripcionivel ? 'selected' : '' }}>
                                    {{ $nivel->descripcionivel }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="categoria">Categoría</label>
                        <input type="text" name="categoria" class="form-control" value="{{ old('categoria', $docente->categoria) }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="fecha_graduacion">Fecha de Graduación</label>
                        <input type="date" name="fecha_graduacion" class="form-control" value="{{ old('fecha_graduacion', $docente->fecha_graduacion) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="especialidad">Especialidad</label>
                        <select name="especialidad" class="form-select" required>
                            @foreach($especialidades as $especialidad)
                                <option value="{{ $especialidad->idespecialidad }}" {{ old('especialidad', $docente->especialidad) == $especialidad->descripcionspecialidad ? 'selected' : '' }}>
                                    {{ $especialidad->descripcionspecialidad }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group mt-3">
                        <label for="inpep">INPEP</label>
                        <input type="text" name="inpep" class="form-control" value="{{ old('inpep', $docente->inpep) }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mt-3">
                        <label for="isss">ISSS</label>
                        <input type="text" name="isss" class="form-control" value="{{ old('isss', $docente->isss) }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mt-3">
                        <label for="afp">AFP</label>
                        <input type="text" name="afp" class="form-control" value="{{ old('afp', $docente->afp) }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mt-3">
                        <label for="nup">NUP</label>
                        <input type="text" name="nup" class="form-control" value="{{ old('nup', $docente->nup) }}">
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="nacionalidad">Nacionalidad</label>
                <input type="text" name="nacionalidad" class="form-control" value="{{ old('nacionalidad', $persona->nacionalidad) }}" required>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="pasaporte">Número de Pasaporte</label>
                        <input type="text" name="pasaporte" class="form-control" value="{{ old('pasaporte', $docente->pasaporte) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="otros_cargos">Otros Cargos que Desempeña</label>
                        <input type="text" name="otros_cargos" class="form-control" value="{{ old('otros_cargos', $docente->otros_cargos) }}">
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="lugar">Lugar</label>
                <input type="text" name="lugar" class="form-control" value="{{ old('lugar', $docente->lugar) }}">
            </div>
            <div class="form-group mt-3">
                <label for="otra_institucion">Otra Institución donde Trabaja</label>
                <input type="text" name="otra_institucion" class="form-control" value="{{ old('otra_institucion', $docente->otra_institucion) }}">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="telefono_otrainstitucion">Número de Teléfono</label>
                        <input type="text" name="telefono_otrainstitucion" class="form-control" value="{{ old('telefono_otrainstitucion', $docente->telefono_otrainstitucion) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="turno">Turno</label>
                        <input type="text" name="turno" class="form-control" value="{{ old('turno', $docente->turno) }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="telefonofijo">Teléfono Fijo</label>
                        <input type="text" name="telefonofijo" class="form-control" value="{{ old('telefonofijo', $persona->telefonofijo) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="telefonomovil">Teléfono Móvil</label>
                        <input type="text" name="telefonomovil" class="form-control" value="{{ old('telefonomovil', $persona->telefonomovil) }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="otrotelefono">Otro Teléfono</label>
                        <input type="text" name="otrotelefono" class="form-control" value="{{ old('otrotelefono', $persona->otrotelefono) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="genero">Género</label>
                        <select name="genero" class="form-select">
                            <option value="M" {{ old('genero', $persona->genero) == 'M' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ old('genero', $persona->genero) == 'F' ? 'selected' : '' }}>Femenino</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="correopersonal">Correo Personal</label>
                        <input type="email" name="correopersonal" class="form-control" value="{{ old('correopersonal', $persona->correopersonal) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="correoinstitucional">Correo Institucional</label>
                        <input type="email" name="correoinstitucional" class="form-control" value="{{ old('correoinstitucional', $persona->correoinstitucional) }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="departamento">Departamento</label>
                        <input type="text" name="departamento" class="form-control" value="{{ old('departamento', $persona->departamento) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="municipio">Municipio</label>
                        <input type="text" name="municipio" class="form-control" value="{{ old('municipio', $persona->municipio) }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="distrito">Distrito</label>
                        <input type="text" name="distrito" class="form-control" value="{{ old('distrito', $persona->distrito) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="estadocivil">Estado Civil</label>
                        <input type="text" name="estadocivil" class="form-control" value="{{ old('estadocivil', $persona->estadocivil) }}">
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="direccion">Dirección</label>
                <textarea name="direccion" class="form-control">{{ old('direccion', $persona->direccion) }}</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-3">Guardar</button>
    </form>
</div>
@endsection
