@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('especialidades.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h1>Editar Especialidad</h1>
            <form action="{{ route('especialidades.update', $especialidad['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ $especialidad['nombre'] }}">
                <button type="submit">Guardar Cambios</button>
            </form>
        </main>
    </div>
</div>
@endsection

