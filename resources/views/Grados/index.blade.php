@extends('layouts.grados')
@section('title', 'grados')

@section('content')
<div class="container">
<h1>Lista de Grados</h1>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Grado</th>
                <th>Nombre del Grado</th>
                <th>ID Nivel</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grados as $index => $grado)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $grado->idgrado }}</td>
                    <td>{{ $grado->descripciongrado }}</td>
                    <td>{{ $grado->idnivel }}</td>
                    <td>
                        <a href="{{ route('grados.edit', $grado->idgrado) }}" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection