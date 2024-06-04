@extends('layouts.secciones')

@section('title', 'Editar Sección')

@section('content')
<div class="container">
    <h1>Editar Sección</h1>
    <form action="{{ route('secciones.update', $seccion->idseccion) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="idseccion" class="form-label">ID Sección</label>
            <input type="text" class="form-control" id="idseccion" name="idseccion" value="{{ $seccion->idseccion }}" required>
        </div>
        <div class="mb-3">
            <label for="idespecialidad" class="form-label">Especialidad</label>
            <select class="form-control" id="idespecialidad" name="idespecialidad" required>
                @foreach($especialidades as $especialidad)
                    <option value="{{ $especialidad->idespecialidad }}" {{ $especialidad->idespecialidad == $seccion->idespecialidad ? 'selected' : '' }}>
                        {{ $especialidad->nvl_especialidad }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="idaula" class="form-label">Aula</label>
            <select class="form-control" id="idaula" name="idaula" required>
                @foreach($aulas as $aula)
                    <option value="{{ $aula->idaula }}" {{ $aula->idaula == $seccion->idaula ? 'selected' : '' }}>
                        {{ $aula->nvl_especialidad }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="seccion" class="form-label">Nombre de la Sección</label>
            <input type="text" class="form-control" id="seccion" name="seccion" value="{{ $seccion->seccion }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection