@extends('layouts.grupos')
@section('title', 'grupos')

@section('content')
<div class="container">
<h1>Lista de Grupos</h1>
    <a href="{{ route('grupos.create') }}" class="btn btn-primary">Agregar Grupo</a>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Grupo</th>
                <th>Nombre del Grupo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grupos as $index => $grupo)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $grupo->idgrupo }}</td>
                    <td>{{ $grupo->nombreGrupo }}</td>
                    <td>
                        <a href="{{ route('grupos.edit', $grupo->idgrupo) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection