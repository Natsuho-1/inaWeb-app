@extends('layouts.especialidades')

@section('title', 'Especialidades')

@section('content')
<div class="container">
    <h1>Especialidades</h1>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Descripción</th>
                <th>Modalidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($especialidades as $index => $especialidad)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $especialidad->idespecialidad }}</td>
                    <td>{{ $especialidad->descripcionspecialidad }}</td>
                    <td>{{ $especialidad->modalidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
