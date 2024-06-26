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
                <th>#</th>
                <th>ID</th>
                <th>Especialidad</th>
                <th>Nombre Pensum</th>
                <th>Promoción</th>
                <th>Duración</th>
                <th>Periodos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pensums as $index => $pensum)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pensum->idpensum }}</td>
                    <td>{{ $pensum->idespecialidad }}</td>
                    <td>{{ $pensum->nombrepensum }}</td>
                    <td>{{ $pensum->promocion ? $pensum->promocion->format('Y-m-d') : 'N/A' }}</td>
                    <td>{{ $pensum->duracion }}</td>
                    <td>{{ $pensum->periodos }}</td>
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
