@extends('layouts.pensumasignaturas')

@section('title', 'Vista Gráfica de Asignaturas del Pensum')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <style>
        .table td, .table th {
            text-align: center;
            vertical-align: middle;
        }
        .table .year {
            font-weight: bold;
        }
    </style>
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
                <th>Asignaturas / Años</th>
                @for ($i = 1; $i <= $pensum->periodos; $i++)
                    <th>
                        @if ($i == 0)
                            Todos los periodos
                        @else
                            Periodo {{ $i }}
                        @endif
                    </th>
                @endfor
                <th>Sin periodo (-1)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pensum->asignaturasPorAnio() as $anio => $asignaturasPorPeriodo)
                <tr>
                    <td class="year">{{ $anio }}</td>
                    @for ($i = 1; $i <= $pensum->periodos; $i++)
                        <td>
                            @foreach ($asignaturasPorPeriodo[$i] ?? [] as $asignatura)
                                {{ $asignatura->asignatura->asignatura }} <br>
                            @endforeach
                        </td>
                    @endfor
                    <td>
                        @foreach ($asignaturasPorPeriodo[-1] ?? [] as $asignatura)
                            {{ $asignatura->asignatura->asignatura }} <br>
                        @endforeach
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
