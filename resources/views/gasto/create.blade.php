@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Nuevo Gasto</h2>
    <form action="{{ url('gasto') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Concepto</label><input type="text" name="concepto" class="form-control" value="{{ old('concepto') }}">@error('concepto')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Monto</label><input type="number" step="0.01" name="monto" class="form-control" value="{{ old('monto') }}">@error('monto')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Categoría</label>
            <select name="categoria" class="form-control">
                @foreach(['Servicios','Mantenimiento','Sueldos','Compras','Otros'] as $cat)
                <option value="{{ $cat }}">{{ $cat }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Fecha</label><input type="date" name="fecha_gasto" class="form-control">@error('fecha_gasto')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Descripción</label><textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea></div>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ url('gasto') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
