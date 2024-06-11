@extends('layouts.niveles')
@section('title', 'niveles')
@section('content')
<div class="container">
<h1>Lista de Niveles</h1>
    <a href="{{ route('niveles.create') }}" class="btn btn-primary">Agregar Nivel</a>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Nivel</th>
                <th>Nombre del Nivel</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($niveles as $index => $nivel)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $nivel->idnivel }}</td>
                    <td>{{ $nivel->nombreNivel }}</td>
                    <td>
                        <a href="{{ route('niveles.edit', $nivel->idnivel) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection