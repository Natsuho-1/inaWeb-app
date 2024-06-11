@extends('layouts.grupos')
@section('title', 'grupos')

@section('content')
<div class="container">
    <h1>Editar Grupo</h1>
    <form action="{{ route('grupos.update', $grupo->idgrupos) }}" method="POST">
        @csrf
        @method('PUT')
        <!--<div class="mb-3">
            <label for="idgrupos" class="form-label">ID Grupo</label>
            <input type="text" class="form-control" id="idgrupos" maxlength="6" disabled name="idgrupos" value="{{ $grupo->idgrupos }}" required>
        </div>-->
        <div class="mb-3">
            <label for="descripciongrupo" class="form-label">Nombre del Grupo</label>
            <input type="text" class="form-control" id="descripciongrupo" maxlength="50" name="descripciongrupo" value="{{ $grupo->descripciongrupo }}" required>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>    
            <select class="form-select" id="estado" name="estado" required>
                @foreach($estados as $estado)
                    <option value="
                    @if ($grupo->estado==0)
                        {{$grupo->estado}}
                        @section(
                            $grupo->estado=$grupo->estado+1,
                            $val=0
                        )
                        
                        @endsection
                        @else
                        {{$grupo->estado}}
                        @section(
                            $grupo->estado=$grupo->estado-1,
                            $val=1
                        )
                        
                        @endsection
                    @endif
                    ">
                    @if ($val==0)
                        Inactivo
                        @section(
                            $val=1
                        )
                        
                        @endsection
                        @else
                        Activo
                        @section(
                            $val=0
                        )
                        
                        @endsection
                    @endif
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection