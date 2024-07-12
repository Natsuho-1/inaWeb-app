@extends('layouts.asignaturas')

@section('title', 'Asignaciones de Materias')

@section('content')
<div class="container">
    <h1>Asignaciones de Materias</h1>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Docente</th>
                <th>Materias Asignadas</th>
                <th>Fecha de Asignación</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($asignaciones as $index => $asignacion)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $asignacion['docente']->persona->nombres }} {{ $asignacion['docente']->persona->apellidos }}</td>
                    <td>{{ $asignacion['asignaturas'] }}</td>
                    <td>{{ $asignacion['anio'] }}</td>
                    <td>{{ $asignacion['estado'] == '1' ? 'Activo' : 'Inactivo' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
