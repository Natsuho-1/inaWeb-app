@extends('layouts.especialidades')

@section('title', 'Especialidades')

@section('content')
<div class="container">
    <h1>Especialidades</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Modalidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($especialidades as $especialidad)
                <tr>
                    <td>{{ $especialidad->idespecialidad }}</td>
                    <td>{{ $especialidad->descripcionspecialidad }}</td>
                    <td>{{ $especialidad->modalidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
