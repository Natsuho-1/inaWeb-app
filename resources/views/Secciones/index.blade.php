@extends('layouts.secciones')

@section('title', 'Secciones')

@section('content')
<div class="container">
    <h1>Lista de Secciones</h1>

    <!-- Formulario de Filtro -->
    <form method="GET" action="{{ route('secciones.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <label for="grado">Grado</label>
                <select name="grado" id="grado" class="form-control">
                    <option value="">Todos</option>
                    @foreach($grados as $grado)
                        <option value="{{ $grado->idgrado }}" {{ request('grado') == $grado->idgrado ? 'selected' : '' }}>
                            {{ $grado->descripciongrado }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="especialidad">Especialidad</label>
                <select name="especialidad" id="especialidad" class="form-control">
                    <option value="">Todas</option>
                    @foreach($especialidades as $especialidad)
                        <option value="{{ $especialidad->idespecialidad }}" {{ request('especialidad') == $especialidad->idespecialidad ? 'selected' : '' }}>
                            {{ $especialidad->descripcionspecialidad }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="nivel">Nivel</label>
                <select name="nivel" id="nivel" class="form-control">
                    <option value="">Todos</option>
                    @foreach($niveles as $nivel)
                        <option value="{{ $nivel->idnivel }}" {{ request('nivel') == $nivel->idnivel ? 'selected' : '' }}>
                            {{ $nivel->descripcionivel }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 align-self-end">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Sección</th>
                <th>Grado</th>
                <th>Especialidad</th>
                <th>Grupo</th>
                <th>Nivel</th>
                <th>Capacidad</th>
                <th>Inscritos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($secciones as $index => $seccion)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $seccion->idseccion }}</td>
                    <td>{{ $seccion->grado->descripciongrado ?? 'N/A' }}</td>
                    <td>{{ $seccion->especialidad->descripcionspecialidad ?? 'N/A' }}</td>
                    <td>{{ $seccion->grupo->descripciongrupo ?? 'N/A' }}</td>
                    <td>{{ $seccion->grado->nivel->descripcionnivel ?? 'N/A' }}</td>
                    <td>{{ $seccion->cantidad }}</td>
                    <td>{{ $seccion->inscritos }}</td>
                    <td>
                        <a href="{{ route('secciones.edit', $seccion->idseccion) }}" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
