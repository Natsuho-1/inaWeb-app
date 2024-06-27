@extends('layouts.pensum')

@section('title', 'Agregar Pensum')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
    <h1>Agregar Pensum</h1>
    <form action="{{ route('pensum.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="idespecialidad" class="form-label">Especialidad</label>
            <select class="form-select" id="idespecialidad" name="idespecialidad" required>
                @foreach($especialidades as $especialidad)
                    <option value="{{ $especialidad->idespecialidad }}">{{ $especialidad->descripcionspecialidad }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nombrepensum" class="form-label">Nombre del Pensum</label>
            <input type="text" class="form-control" id="nombrepensum" name="nombrepensum" required>
        </div>
        <div class="mb-3">
            <label for="promocion" class="form-label">Promoción</label>
            <input type="date" class="form-control" id="promocion" name="promocion" required>
        </div>
        <div class="mb-3">
            <label for="duracion" class="form-label">Duración (en años)</label>
            <input type="number" class="form-control" id="duracion" name="duracion" required>
        </div>
        <div class="mb-3">
            <label for="periodos" class="form-label">Periodos</label>
            <input type="number" class="form-control" id="periodos" name="periodos" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.form-select').select2();
    });
</script>
@endsection
