@extends('layouts.grupos')
@section('title', 'grupos')

@section('content')
<div class="container">
<h1>Lista de Grupos</h1>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Grupo</th>
                <th>Nombre del Grupo</th>
                <th>estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grupos as $index => $grupo)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $grupo->idgrupos }}</td>
                    <td>{{ $grupo->descripciongrupo }}</td>
                    @if ($grupo->estado==1)
                     <td>Activo</td>
                     @elseif($grupo->estado==0)
                     <td>Inactivo</td>
                    @endif
                    <td>
                        <a href="{{ route('grupos.edit', $grupo->idgrupos) }}" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection