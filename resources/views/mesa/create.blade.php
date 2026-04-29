@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Nueva Mesa</h2>
    <form action="{{ url('mesa') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Número de Mesa</label><input type="number" name="numero_mesa" class="form-control" value="{{ old('numero_mesa') }}">@error('numero_mesa')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Capacidad</label><input type="number" name="capacidad" class="form-control" value="{{ old('capacidad') }}">@error('capacidad')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Ubicación</label>
            <select name="ubicacion" class="form-control">
                <option value="Interior">Interior</option>
                <option value="Terraza">Terraza</option>
                <option value="VIP">VIP</option>
                <option value="Barra">Barra</option>
            </select>
        </div>
        <div class="mb-3"><label>Estado</label>
            <select name="estado" class="form-control">
                <option value="Libre">Libre</option>
                <option value="Ocupada">Ocupada</option>
                <option value="Reservada">Reservada</option>
                <option value="Mantenimiento">Mantenimiento</option>
            </select>
        </div>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ url('mesa') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
