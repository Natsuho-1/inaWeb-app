@extends('layouts.niveles')
@section('title', 'niveles')

@section('content')
<div class="container">
    <h1>Nuevo Nivel</h1>
    <form action="{{ route('niveles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="idnivel" class="form-label">ID del Nivel</label>
            <input type="text" class="form-control" id="idnivel" name="idnivel" required>
        </div>
        <div class="mb-3">
            <label for="nombreNivel" class="form-label">Nombre del Nivel</label>
            <input type="text" class="form-control" id="nombreNivel" name="nombreNivel" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection