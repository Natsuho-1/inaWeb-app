@extends('layouts.Estudiantes')
@section('title', 'Estudiantes')

@section('content')
<div class="container">
    <h1>Lista de Estudiantes</h1>
    
    <!-- Formulario de Filtro -->
    <form method="GET" action="{{ route('Estudiantes.alumnos') }}" class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <label for="grup">Grupo de clase</label>
                <select name="grup" id="grup" class="form-control">
                    <option value="">Todas</option>
                    @foreach($grupos as $grupo)
                        <option value="{{ $grupo->idgrupos }}" {{ $request->grup == $grupo->idgrupos ? 'selected' : '' }}>{{ $grupo->descripciongrupo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="grade">Grado</label>
                <select name="grade" id="grade" class="form-control">
                    <option value="">Todos</option>
                    @foreach($grados as $grado)
                        <option value="{{ $grado->idgrado }}" {{ $request->grade == $grado->idgrado ? 'selected' : '' }}>{{ $grado->descripciongrado }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="specialty">Especialidad</label>
                <select name="specialty" id="specialty" class="form-control">
                    <option value="">Todas</option>
                    @foreach($especialidades as $especialidad)
                        <option value="{{ $especialidad->idespecialidad }}" {{ $request->specialty == $especialidad->idespecialidad ? 'selected' : '' }}>{{ $especialidad->descripcionspecialidad }}</option>
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
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Estudiante</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Grupo de Clase</th>
                <th>Grado</th>
                <th>Especialidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $index => $estudiante)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $estudiante->idestudiante }}</td>
                    <td>{{ $estudiante->persona->nombres }}</td>
                    <td>{{ $estudiante->persona->apellidos }}</td>
                    <td>{{ $estudiante->seccion->grupo->descripciongrupo }}</td>
                    <td>{{ $estudiante->grado->descripciongrado }}</td>
                    <td>{{ $estudiante->especialidad->descripcionspecialidad }}</td>
                    <td>
                        <!-- Acciones -->
                        <a href="{{ route('Estudiantes.editarAlumnos', $estudiante->idestudiante) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
