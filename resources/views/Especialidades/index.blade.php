@extends('layouts.especialidades')

@section('title', 'Especialidades')

@section('content')
<div class="container">
    <h1>Especialidades</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($especialidades as $index => $especialidad)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $especialidad['nombre'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
