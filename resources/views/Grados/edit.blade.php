@extends('layouts.grados')
@section('title', 'grados')

@section('content')
<div class="container">
    <h1>Editar Grado</h1>
    <form action="{{ route('grados.update', $grados->idgrado) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="descripciongrado" class="form-label">Nombre del Grado</label>
            <input type="text" class="form-control" id="descripciongrado" maxlength="50" name="descripciongrado" value="{{ $grados->descripciongrado }}" required>
        </div>
        <div class="mb-3">
            <label for="idnivel" class="form-label">Nivel</label>
            <select class="form-select" id="idnivel" name="idnivel" required>
                @foreach($niveles as $nivel)
                    <option value="{{ $nivel->idnivel }}">{{ $nivel->descripcionivel }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection