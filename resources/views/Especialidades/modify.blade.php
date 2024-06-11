@extends('layouts.especialidades')

@section('title', 'Modificar Especialidad')

@section('content')
<div class="container">
    <h1>Modificar Especialidad</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Modalidad</th>
                <th>Nivel</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($especialidades as $especialidad)
                <tr>
                    <td>{{ $especialidad->idespecialidad }}</td>
                    <td>{{ $especialidad->descripcionspecialidad }}</td>
                    <td>{{ $especialidad->modalidad }}</td>
                    <td>{{ $especialidad->nombrenivel }}</td>
                    <td>
                        <a href="{{ route('especialidades.edit', $especialidad->idespecialidad) }}" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
