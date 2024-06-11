@extends('layouts.especialidades')

@section('title', 'Editar Especialidad')

@section('content')
<div class="container">
    <h1>Editar Especialidad</h1>
    <form action="{{ route('especialidades.update', $especialidad->idespecialidad) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="descripcionspecialidad" class="form-label">Descripción de la Especialidad</label>
            <input type="text" class="form-control" id="descripcionspecialidad" name="descripcionspecialidad" value="{{ $especialidad->descripcionspecialidad }}" required>
        </div>
        <div class="mb-3">
            <label for="modalidad" class="form-label">Modalidad</label>
            <select class="form-select" id="modalidad" name="modalidad" required>
                @foreach($modalidades as $modalidad)
                    <option value="{{ $modalidad }}" @if($especialidad->modalidad == $modalidad) selected @endif>{{ $modalidad }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nombrenivel" class="form-label">Nivel</label>
            <select class="form-select" id="nombrenivel" name="nombrenivel" required>
                @foreach($niveles as $nivel)
                    <option value="{{ $nivel }}" @if($especialidad->nombrenivel == $nivel) selected @endif>{{ $nivel }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
