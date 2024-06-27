@extends('layouts.especialidades')

@section('title', 'Agregar Especialidad')

@section('content')
<div class="container mt-4">
    <h1>Agregar Especialidad</h1>
    <form action="{{ route('especialidades.store') }}" method="POST">
        @csrf
        <div class="form-group mt-3">
            <label for="descripcionspecialidad">Descripción de la Especialidad</label>
            <input type="text" name="descripcionspecialidad" class="form-control" value="{{ old('descripcionspecialidad') }}" required>
        </div>
        <div class="form-group mt-3">
            <label for="identificador">Identificador</label>
            <input type="text" name="identificador" class="form-control" value="{{ old('identificador') }}" required>
        </div>
        <div class="form-group mt-3">
            <label for="modalidad">Modalidad</label>
            <select name="modalidad" class="form-select" required>
                @foreach ($modalidades as $modalidad)
                    <option value="{{ $modalidad }}" {{ old('modalidad') == $modalidad ? 'selected' : '' }}>{{ $modalidad }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Guardar</button>
    </form>
</div>
@endsection

