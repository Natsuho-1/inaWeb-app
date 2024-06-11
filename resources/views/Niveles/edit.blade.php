@extends('layouts.niveles')
@section('title', 'niveles')

@section('content')
<div class="container">
    <h1>Editar Nivel</h1>
    <form action="{{ route('niveles.update', $nivel->idnivel) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="idnivel" class="form-label">ID Nivel</label>
            <input type="text" class="form-control" id="idnivel" name="idnivel" value="{{ $nivel->idnivel }}" required>
        </div>

        <div class="mb-3">
            <label for="nivel" class="form-label">Nombre del Nivel</label>
            <input type="text" class="form-control" id="nombreNivel" name="nombreNivel" value="{{ $nivel->nombreNivel }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection