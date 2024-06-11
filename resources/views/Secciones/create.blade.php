@extends('layouts.secciones')

@section('title', 'Seccion')

@section('content')
<div class="container">
    <h1>Agregar Sección</h1>
    <form action="{{ route('secciones.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="idgrado" class="form-label">Grado</label>
            <select class="form-select" id="idgrado" name="idgrado" required>
                @foreach($grados as $grado)
                    <option value="{{ $grado->idgrado }}">{{ $grado->descripciongrado}}</option>
                @endforeach
            </select>
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
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection