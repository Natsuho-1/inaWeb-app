@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('especialidades.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
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
                            <td><a href="{{ route('especialidades.edit', $especialidad['id']) }}" class="btn btn-primary">Editar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </div>
</div>
@endsection
