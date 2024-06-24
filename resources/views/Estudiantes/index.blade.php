@extends('layouts.Estudiantes')
@section('title', 'Estudiantes')

@section('content')
<div class="container">
<div class="container">
<h1>Lista de Estudiantes</h1>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Estudiante</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Seccion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $index => $estudiante)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $estudiante->idestudiante }}</td>
                    <td>{{ $estudiante->persona->nombres }}</td>
                    <td>{{ $estudiante->persona->apellidos }}</td>
                    <td>{{ $estudiante->idseccion }}</td>
                    <td>
                      
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection