@extends('layouts.docentes')

@section('title', 'Agregar Docente')

@section('content')
<div class="container">
    <h1>Agregar Docente</h1>
    <form action="{{ route('docentes.store') }}" method="POST">
        @csrf
        @include('docentes.form')
    </form>
</div>
@endsection
