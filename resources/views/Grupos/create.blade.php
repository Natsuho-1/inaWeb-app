@extends('layouts.grupos')
@section('title', 'grupos')

@section('content')
<div class="container">
    <h1>Nuevo Grupo</h1>
    <form action="{{ route('grupos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="idgrupos" class="form-label">ID del grupo</label>
            <input type="text" class="form-control" id="idgrupos" name="idgrupos" required>
        </div>
        <div class="mb-3">
            <label for="descripciongrupo" class="form-label">Nombre del grupo</label>
            <input type="text" class="form-control" id="descripciongrupo" name="descripciongrupo" required>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Modalidad</label>
            <select class="form-select" id="estado" name="estado" required>
                @foreach($estados as $index =>$estado)
                    <option value="{{ $index + 1 }}">{{ $estado }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection