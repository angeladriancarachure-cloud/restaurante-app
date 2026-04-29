@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Nuevo Producto</h2>
    <form action="{{ url('producto') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Nombre</label><input type="text" name="nombre_producto" class="form-control" value="{{ old('nombre_producto') }}">@error('nombre_producto')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Categoría</label>
            <select name="id_categoria" class="form-control">
                <option value="">-- Sin categoría --</option>
                @foreach($categorias as $c)
                <option value="{{ $c->id_categoria }}">{{ $c->nombre_categoria }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Unidad de Medida</label>
            <select name="unidad_medida" class="form-control">
                @foreach(['kg','g','L','ml','pza','caja'] as $u)
                <option value="{{ $u }}">{{ $u }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Stock Actual</label><input type="number" name="stock_actual" class="form-control" value="{{ old('stock_actual',0) }}"></div>
        <div class="mb-3"><label>Stock Mínimo</label><input type="number" name="stock_minimo" class="form-control" value="{{ old('stock_minimo',0) }}"></div>
        <div class="mb-3"><label>Precio Unitario</label><input type="number" step="0.01" name="precio_unitario" class="form-control" value="{{ old('precio_unitario') }}"></div>
        <div class="mb-3"><label>Proveedor</label>
            <select name="id_proveedor" class="form-control">
                <option value="">-- Sin proveedor --</option>
                @foreach($proveedores as $p)
                <option value="{{ $p->id_proveedor }}">{{ $p->nombre_empresa }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ url('producto') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
