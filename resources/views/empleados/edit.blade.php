@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Editar Empleado</h2>
    <form action="{{ url('empleado/'.$empleado->id_empleado) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PATCH')
        @include('empleados.form')
        <button class="btn btn-success">Actualizar</button>
        <a href="{{ url('empleado') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
