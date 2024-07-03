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
        .no-bullets {
            list-style-type: none; /* Elimina los puntos de la lista */
            padding: 0; /* Elimina el padding predeterminado de la lista */
            margin: 0; /* Elimina el margen predeterminado de la lista */
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
                <th>Años</th>
                @for ($i = 1; $i <= $pensum->periodos; $i++)
                    <th>
                        @if ($i == 0)
                            Todos los periodos
                        @else
                            Periodo {{ $i }}
                        @endif
                    </th>
                @endfor
                <th>Sin periodo</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i <= $pensum->duracion; $i++)
                <tr>
                    <td>Año {{$i}}</td>
                    @for ($j = 1; $j <= $pensum->periodos; $j++)
                        <td>
                            <ul class="no-bullets">
                                @foreach ($asignaturas as $index => $asig)
                                    @if($asig->anio == $i && ($asig->periodo == $j || $asig->periodo == 0))
                                        <li>{{ $asig->asignatura->asignatura }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </td>
                    @endfor
                    <!--Asignaturas sin periodos-->
                    <td>
                        <ul class="no-bullets">
                            @foreach ($asignaturas as $index => $asig)
                                @if($asig->anio == $i && $asig->periodo == -1)
                                    <li>{{ $asig->asignatura->asignatura }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endfor
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
