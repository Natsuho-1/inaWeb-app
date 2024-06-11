@extends('layouts.secciones')

@section('title', 'Seccion')

@section('content')
<div class="container">
    <h1>Agregar Sección</h1>
    <form action="{{ route('secciones.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="idseccion" class="form-label">ID Sección</label>
            <input type="text" class="form-control" id="idseccion" name="idseccion" required maxlength="6">
        </div>
        <div class="mb-3">
            <label for="idespecialidad" class="form-label">Especialidad</label>
            <select class="form-select" id="idespecialidad" name="idespecialidad" required>
                @foreach($especialidades as $especialidad)
                    <option value="{{ $especialidad->idespecialidad }}">{{ $especialidad->descripcionspecialidad }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="idaula" class="form-label">Aula</label>
            <select class="form-select" id="idaula" name="idaula" required>
                @foreach($aulas as $aula)
                    <option value="{{ $aula->idaula }}">{{ $aula->nvl_especialidad }} - {{ $aula->modalidad }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="seccion" class="form-label">Nombre de la Sección</label>
            <input type="text" class="form-control" id="seccion" name="seccion" required maxlength="50">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection