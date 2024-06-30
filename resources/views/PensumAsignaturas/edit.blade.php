@extends('layouts.pensumasignaturas')

@section('title', 'Editar Asignatura del Pensum')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
    <h1>Editar Asignatura del Pensum</h1>
    <form action="{{ route('pensum.asignatura.update', ['idpensum' => $pensum->idpensum, 'idasignatura' => $pensumAsignatura->idpensumasignaturas]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="idasignatura" class="form-label">Asignatura</label>
            <select class="form-select" id="idasignatura" name="idasignatura" required>
                @foreach($asignaturas as $asignatura)
                    <option value="{{ $asignatura->idasignatura }}" {{ $asignatura->idasignatura == $pensumAsignatura->idasignatura ? 'selected' : '' }}>
                        {{ $asignatura->asignatura }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="anio" class="form-label">Año</label>
            <input type="number" class="form-control" id="anio" name="anio" value="{{ $pensumAsignatura->anio }}" max="{{ $pensum->duracion }}" min="1" required>
        </div>
        <div class="mb-3">
            <label for="periodo" class="form-label">Periodo</label>
            <select class="form-select" id="periodo" name="periodo" required>
                <option value="-1" {{ $pensumAsignatura->periodo == -1 ? 'selected' : '' }}>Sin periodo</option>
                <option value="0" {{ $pensumAsignatura->periodo == 0 ? 'selected' : '' }}>Todos los periodos</option>
                @for ($i = 0; $i <= $pensum->periodos; $i++)
                    <option value="{{ $i+1 }}" {{ $pensumAsignatura->periodo == $i ? 'selected' : '' }}>{{ $i+1 }}</option>
                @endfor
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#idasignatura').select2();
    });
</script>
@endsection
