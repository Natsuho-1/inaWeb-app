@extends('layouts.pensumasignaturas')

@section('title', 'Asignaturas del Pensum')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
@endsection

@section('content')
<div class="container">
    <h1>{{ $pensum->nombrepensum }}</h1>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    <table id="asignaturasTable" class="table" style="width:100%">
        <thead>
            <tr>
                <th>Nombre Asignatura</th>
                <th>Año</th>
                <th>Periodo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($asignaturas as $index => $asigna)
                <tr>
                    <td>{{ $asigna->asignatura->asignatura }}</td>
                    <td>{{ $asigna->anio }}</td>
                    <td>{{ $asigna->periodo }}</td>
                    <td>
                        <a href="{{ route('pensum.asignatura.edit', ['idpensum' => $pensum->idpensum, 'idasignatura' => $asigna->idpensumasignaturas]) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('pensum.asignatura.destroy', ['idpensum' => $pensum->idpensum, 'idasignatura' => $asigna->idpensumasignaturas]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar esta asignatura?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#asignaturasTable').DataTable();
        });
    </script>
@endsection
