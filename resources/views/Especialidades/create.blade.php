@extends('layouts.especialidades')

@section('title', 'Agregar Especialidad')

@section('content')
<div class="container">
    <h1>Agregar Especialidad</h1>
    <form action="{{ route('especialidades.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="idespecialidad" class="form-label">ID de la Especialidad</label>
            <input type="text" class="form-control" id="idespecialidad" name="idespecialidad" required>
        </div>
        <div class="mb-3">
            <label for="descripcionspecialidad" class="form-label">Descripción de la Especialidad</label>
            <input type="text" class="form-control" id="descripcionspecialidad" name="descripcionspecialidad" required>
        </div>
        <div class="mb-3">
            <label for="modalidad" class="form-label">Modalidad</label>
            <select class="form-select" id="modalidad" name="modalidad" required>
                @foreach($modalidades as $modalidad)
                    <option value="{{ $modalidad }}">{{ $modalidad }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
