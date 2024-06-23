@extends('layouts.asignaturas')

@section('title', 'Agregar Asignatura')

@section('content')
<div class="container mt-4">
    <h1>Agregar Asignatura</h1>
    <form action="{{ route('asignaturas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="asignatura" class="form-label">Asignatura</label>
            <input type="text" class="form-control" id="asignatura" name="asignatura" value="{{ old('asignatura') }}" required>
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" class="form-control" required>
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo }}" {{ old('tipo') == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection

