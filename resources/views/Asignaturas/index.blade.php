@extends('layouts.asignaturas')

@section('title', 'Asignaturas')

@section('content')
    <div class="container">
        <h1>Asignaturas</h1>
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Asignatura</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asignaturas as $index => $asignatura)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $asignatura->idasignatura }}</td>
                        <td>{{ $asignatura->asignatura }}</td>
                        <td>{{ $asignatura->tipo }}</td>
                        <td>
                            <a href="{{ route('asignaturas.edit', $asignatura->idasignatura) }}"
                                class="btn btn-primary">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
