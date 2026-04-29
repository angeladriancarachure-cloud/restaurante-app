@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Editar Compra</h2>
    <form action="{{ url('compra/'.$compra->id_compra) }}" method="POST">
        @csrf @method('PATCH')
        <div class="mb-3"><label>Proveedor</label>
            <select name="id_proveedor" class="form-control">
                @foreach($proveedores as $p)
                <option value="{{ $p->id_proveedor }}" {{ $compra->id_proveedor == $p->id_proveedor ? 'selected' : '' }}>{{ $p->nombre_empresa }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Empleado</label>
            <select name="id_empleado" class="form-control">
                <option value="">-- Sin empleado --</option>
                @foreach($empleados as $e)
                <option value="{{ $e->id_empleado }}" {{ $compra->id_empleado == $e->id_empleado ? 'selected' : '' }}>{{ $e->nombre }} {{ $e->apellido }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Fecha</label><input type="date" name="fecha_compra" class="form-control" value="{{ $compra->fecha_compra }}"></div>
        <div class="mb-3"><label>Total</label><input type="number" step="0.01" name="total" class="form-control" value="{{ $compra->total }}"></div>
        <div class="mb-3"><label>Notas</label><textarea name="notas" class="form-control">{{ $compra->notas }}</textarea></div>
        <button class="btn btn-success">Actualizar</button>
        <a href="{{ url('compra') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
