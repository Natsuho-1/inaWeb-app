@extends('layouts.especialidades')

@section('title', 'Editar Especialidad')

@section('content')
<div class="container">
    <h1>Editar Especialidad</h1>
    <form action="{{ route('especialidades.update', $especialidad['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Especialidad</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $especialidad['nombre'] }}" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $especialidad['descripcion'] }}</textarea>
        </div>
        <div class="mb-3">
            <label for="creditos" class="form-label">Número de Créditos</label>
            <input type="number" class="form-control" id="creditos" name="creditos" value="{{ $especialidad['creditos'] }}" required>
        </div>
        <div class="mb-3">
            <label for="duracion" class="form-label">Duración en Años</label>
            <input type="number" class="form-control" id="duracion" name="duracion" value="{{ $especialidad['duracion'] }}" required>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-select" id="estado" name="estado" required>
                <option value="activo" {{ $especialidad['estado'] == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ $especialidad['estado'] == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection

