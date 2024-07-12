@extends('layouts.especialidades')

@section('title', 'Especialidades')

@section('content')
    <div class="container mt-4">
        <h1>Especialidades</h1>
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Identificador</th>
                    <th>Modalidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($especialidades as $index => $especialidad)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $especialidad->idespecialidad }}</td>
                        <td>{{ $especialidad->descripcionspecialidad }}</td>
                        <td>{{ $especialidad->identificador }}</td>
                        <td>{{ $especialidad->modalidad }}</td>
                        <td>
                            <a href="{{ route('especialidades.edit', $especialidad->idespecialidad) }}" class="btn btn-primary">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

