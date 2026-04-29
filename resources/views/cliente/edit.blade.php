@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Editar Cliente</h2>
    <form action="{{ url('cliente/'.$cliente->id_cliente) }}" method="POST">
        @csrf @method('PATCH')
        <div class="mb-3"><label>Nombre</label><input type="text" name="nombre" class="form-control" value="{{ $cliente->nombre }}">@error('nombre')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Apellido</label><input type="text" name="apellido" class="form-control" value="{{ $cliente->apellido }}"></div>
        <div class="mb-3"><label>Teléfono</label><input type="text" name="telefono" class="form-control" value="{{ $cliente->telefono }}"></div>
        <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="{{ $cliente->email }}">@error('email')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Fecha Nacimiento</label><input type="date" name="fecha_nacimiento" class="form-control" value="{{ $cliente->fecha_nacimiento }}"></div>
        <button class="btn btn-success">Actualizar</button>
        <a href="{{ url('cliente') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
