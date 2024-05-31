@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('especialidades.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
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
        </main>
    </div>
</div>
@endsection
