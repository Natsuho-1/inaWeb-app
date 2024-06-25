@extends('layouts.Estudiantes')
@section('title', 'Estudiantes')

@section('content')
<div class="container">
    <h1>Lista de Estudiantes</h1>
    
    <!-- Formulario de Filtro -->
    <form method="GET" action="{{ route('students.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <label for="specialty">Especialidad</label>
                <select name="specialty" id="specialty" class="form-control">
                    <option value="">Todas</option>
                    @foreach($secciones as $seccion)
                        <option value="{{ $secciones->idseccion }}" {{ $request-> == $especialidad->idespecialidad ? 'selected' : '' }}>{{ $especialidad->nombre }}</option>
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
                <th>Sección</th>
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
                    <td>{{ $estudiante->idseccion }}</td>
                    <td>{{ $estudiante->grado->nombre }}</td>
                    <td>{{ $estudiante->especialidad->nombre }}</td>
                    <td>
                        <!-- Acciones -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
