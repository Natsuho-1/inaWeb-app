@extends('layouts.grupos')
@section('title', 'grupos')

@section('content')
<div class="container">
    <h1>Nuevo Grupo</h1>
    <form action="{{ route('grupos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="idgrupo" class="form-label">ID del grupo</label>
            <input type="text" class="form-control" id="idgrupo" name="idgrupo" required>
        </div>
        <div class="mb-3">
            <label for="nombreGrupo" class="form-label">Nombre del grupo</label>
            <input type="text" class="form-control" id="nombreGrupo" name="nombreGrupo" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection