@extends('layouts.secciones')

@section('title', 'Seccion')


@section('content')
<div class="container">
    <h1>Lista de Secciones</h1>
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
                <th>Grado</th>
                <th>Especialidad</th>
                <th>Grupo</th>
                <th>Nivel</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($secciones as $index => $seccion)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $seccion->idseccion }}</td>
                    <td>{{ $seccion->grado->descripciongrado ?? 'N/A' }}</td>
                    <td>{{ $seccion->especialidad->descripcionspecialidad ?? 'N/A' }}</td>
                    <td>{{ $seccion->grupo->descripciongrupo ?? 'N/A' }}</td>
                    <td>{{ $seccion->grado->nivel->descripcionivel ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('secciones.edit', $seccion->idseccion) }}" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection