@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Nuevo Cliente</h2>
    <form action="{{ url('cliente') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Nombre</label><input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">@error('nombre')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Apellido</label><input type="text" name="apellido" class="form-control" value="{{ old('apellido') }}"></div>
        <div class="mb-3"><label>Teléfono</label><input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}"></div>
        <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="{{ old('email') }}">@error('email')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Fecha Nacimiento</label><input type="date" name="fecha_nacimiento" class="form-control"></div>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ url('cliente') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
