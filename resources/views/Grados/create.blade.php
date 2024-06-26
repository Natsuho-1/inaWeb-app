@extends('layouts.grados')
@section('title', 'grados')

@section('content')
<div class="container">
    <h1>Nuevo Grado</h1>
    <form action="{{ route('grados.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="idgrado" class="form-label">ID del grado</label>
            <input type="text" class="form-control" id="idgrado" name="idgrado" required>
        </div>
        <div class="mb-3">
            <label for="descripciongrado" class="form-label">Nombre del grado</label>
            <input type="text" class="form-control" id="descripciongrado" name="descripciongrado" required>
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