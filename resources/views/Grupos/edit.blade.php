@extends('layouts.grupos')
@section('title', 'grupos')

@section('content')
<div class="container">
    <h1>Editar Grupo</h1>
    <form action="{{ route('grupos.update', $grupo->idgrupo) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="idgrupo" class="form-label">ID Grupo</label>
            <input type="text" class="form-control" id="idgrupo" name="idgrupo" value="{{ $grupo->idgrupo }}" required>
        </div>

        <div class="mb-3">
            <label for="grupo" class="form-label">Nombre del Grupo</label>
            <input type="text" class="form-control" id="nombreGrupo" name="nombreGrupo" value="{{ $grupo->nombreGrupo }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection