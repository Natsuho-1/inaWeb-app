@extends('layouts.pensum')

@section('title', 'Pensum')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
@endsection

@section('content')
<div class="container">
    <h1>Pensum</h1>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table id="myTable" class="table" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Especialidad</th>
                <th>Nombre Pensum</th>
                <th>Promoción</th>
                <th>Duración</th>
                <th>Periodos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pensums as $index => $pensum)
                <tr>
                    <td>{{ $pensum->idpensum }}</td>
                    <td>
                        @foreach($especialidades as $espe)
                            @if($pensum->idespecialidad == $espe->idespecialidad)
                                {{ $espe->descripcionspecialidad }}
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $pensum->nombrepensum }}</td>
                    <td>{{ $pensum->promocion ? $pensum->promocion->format('Y-m-d') : 'N/A' }}</td>
                    <td>{{ $pensum->duracion }}</td>
                    <td>{{ $pensum->periodos }}</td>
                    <td>
                        <a href="{{ route('pensum.edit', $pensum->idpensum) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('pensum.destroy', $pensum->idpensum) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este pensum?')">Eliminar</button>
                        </form>
                        <a href="{{ route('pensum.asignaturas', $pensum->idpensum) }}" class="btn btn-info btn-sm">Asignaturas</a>
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
            $('#myTable').DataTable();
        });
    </script>
@endsection
