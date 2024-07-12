@extends('layouts.secciones')

@section('title', 'Editar Sección')

@section('content')
<div class="container">
    <h1>Editar Sección</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('secciones.update', $seccion->idseccion) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="idgrado" class="form-label">Grado</label>
            <select class="form-control" id="idgrado" name="idgrado" required {{ $seccion->inscritos != 0 ? 'disabled' : '' }}>
                @foreach($grados as $grado)
                    <option value="{{ $grado->idgrado }}" {{ $grado->idgrado == $seccion->idgrado ? 'selected' : '' }}>
                        {{ $grado->descripciongrado }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="idespecialidad" class="form-label">Especialidad</label>
            <select class="form-control" id="idespecialidad" name="idespecialidad" required {{ $seccion->inscritos != 0 ? 'disabled' : '' }}>
                @foreach($especialidades as $especialidad)
                    <option value="{{ $especialidad->idespecialidad }}" {{ $especialidad->idespecialidad == $seccion->idespecialidad ? 'selected' : '' }}>
                        {{ $especialidad->descripcionspecialidad }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="idgrupo" class="form-label">Grupo</label>
            <select class="form-control" id="idgrupos" name="idgrupos" required {{ $seccion->inscritos != 0 ? 'disabled' : '' }}>
                @foreach($grupos as $grupo)
                    <option value="{{$grupo->idgrupos }}" {{ $grupo->idgrupos == $seccion->idgrupos ? 'selected' : '' }}>
                        {{ $grupo->descripciongrupo }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Capacidad de Estudiantes</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ $seccion->cantidad }}" required min="{{ $seccion->inscritos + 1 }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    form.addEventListener('submit', function () {
        const disabledFields = form.querySelectorAll('select[disabled]');
        disabledFields.forEach(function (field) {
            field.removeAttribute('name');
        });
    });
});
</script>
@endsection
