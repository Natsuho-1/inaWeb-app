@extends('layouts.docentes')

@section('title', 'Lista de Docentes')

@section('content')
<div class="container">
    <h1>Lista de Docentes</h1>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Docente</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Especialidad</th>
                <th>Nivel</th>
                <th>Correo Institucional</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($docentes as $index => $docente)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $docente->iddocente }}</td>
                    <td>{{ $docente->persona->nombres }}</td>
                    <td>{{ $docente->persona->apellidos }}</td>
                    <td>{{ $docente->especialidad }}</td>
                    <td>{{ $docente->nivel }}</td>
                    <td>{{ $docente->persona->correoinstitucional }}</td>
                    <td>
                        <a href="{{ route('docentes.edit', $docente->iddocente) }}" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

