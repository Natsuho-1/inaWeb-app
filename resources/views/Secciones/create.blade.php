@extends('layouts.secciones')

@section('title', 'Agregar Sección')

@section('content')
<div class="container">
    <h1>Agregar Sección</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('secciones.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="idgrado" class="form-label">Grado</label>
            <select class="form-select" id="idgrado" name="idgrado" required>
                @foreach($grados as $grado)
                    <option value="{{ $grado->idgrado }}" {{ old('idgrado') == $grado->idgrado ? 'selected' : '' }}>
                        {{ $grado->descripciongrado }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="idespecialidad" class="form-label">Especialidad</label>
            <select class="form-select" id="idespecialidad" name="idespecialidad" required>
                @foreach($especialidades as $especialidad)
                    <option value="{{ $especialidad->idespecialidad }}" {{ old('idespecialidad') == $especialidad->idespecialidad ? 'selected' : '' }}>
                        {{ $especialidad->descripcionspecialidad }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="idgrupo" class="form-label">Grupo</label>
            <select class="form-select" id="idgrupo" name="idgrupo" required>
                @foreach($grupos as $grupo)
                    <option value="{{ $grupo->idgrupos }}" {{ old('idgrupo') == $grupo->idgrupos ? 'selected' : '' }}>
                        {{ $grupo->descripciongrupo }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Capacidad de Estudiantes</label>
            <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{ old('cantidad') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection

