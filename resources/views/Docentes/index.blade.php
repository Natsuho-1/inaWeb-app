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
                <th>ID Docente</th>
                <th>Nombre del Empleado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($docentes as $docente)
                <tr>
                    <td>{{ $docente->iddocente }}</td>
                    <td>{{ $docente->nombre }}</td>
                    <td>
                        <a href="{{ route('docentes.edit', $docente->iddocente) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('docentes.destroy', $docente->iddocente) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
