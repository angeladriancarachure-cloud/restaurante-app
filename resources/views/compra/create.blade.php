@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Nueva Compra</h2>
    <form action="{{ url('compra') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Proveedor</label>
            <select name="id_proveedor" class="form-control">
                @foreach($proveedores as $p)
                <option value="{{ $p->id_proveedor }}">{{ $p->nombre_empresa }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Empleado</label>
            <select name="id_empleado" class="form-control">
                <option value="">-- Sin empleado --</option>
                @foreach($empleados as $e)
                <option value="{{ $e->id_empleado }}">{{ $e->nombre }} {{ $e->apellido }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Fecha</label><input type="date" name="fecha_compra" class="form-control">@error('fecha_compra')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Total</label><input type="number" step="0.01" name="total" class="form-control">@error('total')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Notas</label><textarea name="notas" class="form-control"></textarea></div>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ url('compra') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
