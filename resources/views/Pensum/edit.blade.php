@extends('layouts.pensum')

@section('title', 'Editar Pensum')

@section('content')
<div class="container">
    <h1>Editar Pensum</h1>
    <form action="{{ route('pensum.update', $pensum->idpensum) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="idpensum" class="form-label">ID Pensum</label>
            <input type="text" class="form-control" id="idpensum" maxlength="6" disabled name="idpensum" value="{{ $pensum->idpensum }}" required>
        </div>
        <div class="mb-3">
            <label for="idespecialidad" class="form-label">Especialidad</label>
            <select class="form-select" id="idespecialidad" name="idespecialidad" required>
                @foreach($especialidades as $especialidad)
                    <option value="{{ $especialidad->idespecialidad }}" {{ $especialidad->idespecialidad == $pensum->idespecialidad ? 'selected' : '' }}>{{ $especialidad->descripcionspecialidad }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nombrepensum" class="form-label">Nombre del Pensum</label>
            <input type="text" class="form-control" id="nombrepensum" name="nombrepensum" maxlength="50" value="{{ $pensum->nombrepensum }}" required>
        </div>
        <div class="mb-3">
            <label for="promocion" class="form-label">Promoción</label>
            <input type="date" class="form-control" id="promocion" name="promocion" value="{{ $pensum->promocion->format('Y-m-d') }}" required>
        </div>
        <div class="mb-3">
            <label for="duracion" class="form-label">Duración (en años)</label>
            <input type="number" class="form-control" id="duracion" name="duracion" value="{{ $pensum->duracion }}" required>
        </div>
        <div class="mb-3">
            <label for="periodos" class="form-label">Periodos</label>
            <input type="number" class="form-control" id="periodos" name="periodos" value="{{ $pensum->periodos }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
