@extends('layouts.inscripciones')
@section('title', 'Estudiantes')

@section('content')
<div class="container">
    <h1>Lista de Estudiantes</h1>
    
    <!-- Formulario de Filtro -->
    <form method="GET" action="{{ route('Estudiantes.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <label for="grade">Grado</label>
                <select name="grade" id="grade" class="form-control">
                    <option value="">Todos</option>
                    @foreach($grados as $grado)
                        <option value="{{ $grado->idgrado }}" {{ request()->input('grade') == $grado->idgrado ? 'selected' : '' }}>{{ $grado->descripciongrado }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="specialty">Especialidad</label>
                <select name="specialty" id="specialty" class="form-control">
                    <option value="">Todas</option>
                    @foreach($especialidades as $especialidad)
                        <option value="{{ $especialidad->idespecialidad }}" {{ request()->input('specialty') == $especialidad->idespecialidad ? 'selected' : '' }}>{{ $especialidad->descripcionspecialidad }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 align-self-end">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif

    @if($request->filled('grade') || $request->filled('specialty'))
        @if($grupos->isNotEmpty())
            <div class="mb-3">
                <h2>Grupos</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Grupo</th>
                            <th>Capacidad de Estudiantes</th>
                            <th>Inscritos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($grupos as $grupo)
                            @foreach($grupo->secciones as $seccion)
                                @if($seccion->idgrado == $request->grade && $seccion->idespecialidad == $request->specialty)
                                    <tr>
                                        <td>{{ $grupo->descripciongrupo }}</td>
                                        <td>{{ $seccion->cantidad }}</td>
                                        <td>{{ $seccion->estudiantes->count() }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endif
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Estudiante</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Sección</th>
                <th>Grado</th>
                <th>Especialidad</th>
                <th>Acciones</th>
                <th>Modificar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $index => $estudiante)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $estudiante->idestudiante }}</td>
                    <td>{{ $estudiante->persona->nombres }}</td>
                    <td>{{ $estudiante->persona->apellidos }}</td>
                    <td>{{ optional($estudiante->seccion)->idseccion }}</td>
                    <td>{{ $estudiante->grado->descripciongrado }}</td>
                    <td>{{ $estudiante->especialidad->descripcionspecialidad }}</td>
                    <td>
                        <!-- Acciones -->
                        <form action="{{ route('Estudiantes.aceptar', $estudiante->idestudiante) }}" method="POST" onsubmit="return confirmarInscripcion()">
                            @csrf
                            <button type="submit" class="btn btn-success">Aceptar</button>
                        </form>
                    </td>
                    <td>
                    <a href="{{ route('Estudiantes.edit', $estudiante->idestudiante) }}" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
function confirmarInscripcion() {
    return confirm('¿Está seguro de inscribir al estudiante?');
}
</script>
@endsection
