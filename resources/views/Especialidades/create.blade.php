@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('especialidades.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h1>Agregar Especialidad</h1>
            <form action="{{ route('especialidades.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="duracion" class="form-label">Duración (años)</label>
                    <input type="number" class="form-control" id="duracion" name="duracion">
                </div>
                <div class="mb-3">
                    <label for="requisitos" class="form-label">Requisitos</label>
                    <textarea class="form-control" id="requisitos" name="requisitos" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </main>
    </div>
</div>
@endsection

