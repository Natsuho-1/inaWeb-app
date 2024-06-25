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
            <label for="idgrupo" class="form-label">Grupo</label>
            <select class="form-select" id="idgrupo" name="idgrupo" required>
                @foreach($grupos as $grupo)
                    <option value="{{ $grupo->idgrupos }}">{{ $grupo->descripciongrupo }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Capacidad de Estudiantes</label>
            <input type="text" class="form-control" id="cantidad" name="cantidad" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection