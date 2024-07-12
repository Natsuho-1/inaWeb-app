@extends('layouts.asignaturas')

@section('title', 'Asignación de Materias')

@section('content')
<div class="container">
    <h1>Asignación de Materias</h1>
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
    <form action="{{ route('asignacion_asignaturas.store') }}" method="POST">
        @csrf
        <div class="form-group mt-3">
            <label for="iddocente">Docente</label>
            <select name="iddocente" class="form-select" required>
                @foreach($docentes as $docente)
                    <option value="{{ $docente->iddocente }}">
                        {{ $docente->persona->nombres }} {{ $docente->persona->apellidos }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="idasignatura">Asignaturas</label>
            <select name="idasignatura[]" class="form-select" multiple required>
                @foreach($asignaturas as $asignatura)
                    <option value="{{ $asignatura->idasignatura }}">
                        {{ $asignatura->asignatura }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Asignar Materias</button>
    </form>
</div>
@endsection
