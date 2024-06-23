@extends('layouts.especialidades')

@section('title', 'Editar Especialidad')

@section('content')
<div class="container mt-4">
    <h1>Editar Especialidad</h1>
    <form action="{{ route('especialidades.update', $especialidad->idespecialidad) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mt-3">
            <label for="descripcionspecialidad">Descripción de la Especialidad</label>
            <input type="text" name="descripcionspecialidad" class="form-control" value="{{ old('descripcionspecialidad', $especialidad->descripcionspecialidad) }}" required>
        </div>
        <div class="form-group mt-3">
            <label for="identificador">Identificador</label>
            <input type="text" name="identificador" class="form-control" value="{{ old('identificador', $especialidad->identificador) }}" required>
        </div>
        <div class="form-group mt-3">
            <label for="modalidad">Modalidad</label>
            <select name="modalidad" class="form-control" required>
                @foreach ($modalidades as $modalidad)
                    <option value="{{ $modalidad }}" {{ old('modalidad', $especialidad->modalidad) == $modalidad ? 'selected' : '' }}>{{ $modalidad }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Actualizar</button>
    </form>
</div>
@endsection

