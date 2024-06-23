@extends('layouts.docentes')

@section('title', 'Editar Docente')

@section('content')
<div class="container">
    <h1>Editar Docente</h1>
    <form action="{{ route('docentes.update', $docente->iddocente) }}" method="POST">
        @csrf
        @method('PUT')
        @include('docentes.form')
        <button type="submit" class="btn btn-success mt-3">Actualizar</button>
    </form>
</div>
@endsection
