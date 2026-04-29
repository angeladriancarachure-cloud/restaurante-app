@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Editar Mesa</h2>
    <form action="{{ url('mesa/'.$mesa->id_mesa) }}" method="POST">
        @csrf @method('PATCH')
        <div class="mb-3"><label>Número de Mesa</label><input type="number" name="numero_mesa" class="form-control" value="{{ $mesa->numero_mesa }}">@error('numero_mesa')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Capacidad</label><input type="number" name="capacidad" class="form-control" value="{{ $mesa->capacidad }}">@error('capacidad')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Ubicación</label>
            <select name="ubicacion" class="form-control">
                @foreach(['Interior','Terraza','VIP','Barra'] as $u)
                <option value="{{ $u }}" {{ $mesa->ubicacion == $u ? 'selected' : '' }}>{{ $u }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Estado</label>
            <select name="estado" class="form-control">
                @foreach(['Libre','Ocupada','Reservada','Mantenimiento'] as $e)
                <option value="{{ $e }}" {{ $mesa->estado == $e ? 'selected' : '' }}>{{ $e }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Actualizar</button>
        <a href="{{ url('mesa') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
