@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Registrar Empleado</h2>
    <form action="{{ url('empleado') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('empleados.form')
        <button class="btn btn-success">Guardar</button>
        <a href="{{ url('empleado') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
