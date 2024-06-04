@extends('layouts.secciones')

@section('title', 'Seccion')


@section('content')
<div class="container">
    <h1>Lista de Secciones</h1>
    <a href="{{ route('secciones.create') }}" class="btn btn-primary">Agregar Sección</a>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Sección</th>
                <th>Nombre de la Sección</th>
                <th>Especialidad</th>
                <th>Aula</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($secciones as $index => $seccion)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $seccion->idseccion }}</td>
                    <td>{{ $seccion->seccion }}</td>
                    <td>{{ $seccion->especialidad->nvl_especialidad ?? 'N/A' }}</td>
                    <td>{{ $seccion->aula->nvl_especialidad ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('secciones.edit', $seccion->idseccion) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('secciones.destroy', $seccion->idseccion) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection