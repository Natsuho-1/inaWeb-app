@extends('layouts.especialidades')

@section('title', 'Modificar Especialidad')

@section('content')
<div class="container">
    <h1>Modificar Especialidad</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($especialidades as $index => $especialidad)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $especialidad['nombre'] }}</td>
                    <td>
                        <a href="{{ route('especialidades.edit', $especialidad['id']) }}" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

