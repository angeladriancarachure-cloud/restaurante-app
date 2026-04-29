@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Editar Gasto</h2>
    <form action="{{ url('gasto/'.$gasto->id_gasto) }}" method="POST">
        @csrf @method('PATCH')
        <div class="mb-3"><label>Concepto</label><input type="text" name="concepto" class="form-control" value="{{ $gasto->concepto }}">@error('concepto')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Monto</label><input type="number" step="0.01" name="monto" class="form-control" value="{{ $gasto->monto }}">@error('monto')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Categoría</label>
            <select name="categoria" class="form-control">
                @foreach(['Servicios','Mantenimiento','Sueldos','Compras','Otros'] as $cat)
                <option value="{{ $cat }}" {{ $gasto->categoria == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Fecha</label><input type="date" name="fecha_gasto" class="form-control" value="{{ $gasto->fecha_gasto }}">@error('fecha_gasto')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Descripción</label><textarea name="descripcion" class="form-control">{{ $gasto->descripcion }}</textarea></div>
        <button class="btn btn-success">Actualizar</button>
        <a href="{{ url('gasto') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
