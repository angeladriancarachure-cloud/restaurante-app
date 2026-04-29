@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Editar Producto</h2>
    <form action="{{ url('producto/'.$producto->id_producto) }}" method="POST">
        @csrf @method('PATCH')
        <div class="mb-3"><label>Nombre</label><input type="text" name="nombre_producto" class="form-control" value="{{ $producto->nombre_producto }}">@error('nombre_producto')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Categoría</label>
            <select name="id_categoria" class="form-control">
                <option value="">-- Sin categoría --</option>
                @foreach($categorias as $c)
                <option value="{{ $c->id_categoria }}" {{ $producto->id_categoria == $c->id_categoria ? 'selected' : '' }}>{{ $c->nombre_categoria }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Unidad de Medida</label>
            <select name="unidad_medida" class="form-control">
                @foreach(['kg','g','L','ml','pza','caja'] as $u)
                <option value="{{ $u }}" {{ $producto->unidad_medida == $u ? 'selected' : '' }}>{{ $u }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Stock Actual</label><input type="number" name="stock_actual" class="form-control" value="{{ $producto->stock_actual }}"></div>
        <div class="mb-3"><label>Stock Mínimo</label><input type="number" name="stock_minimo" class="form-control" value="{{ $producto->stock_minimo }}"></div>
        <div class="mb-3"><label>Precio Unitario</label><input type="number" step="0.01" name="precio_unitario" class="form-control" value="{{ $producto->precio_unitario }}"></div>
        <div class="mb-3"><label>Proveedor</label>
            <select name="id_proveedor" class="form-control">
                <option value="">-- Sin proveedor --</option>
                @foreach($proveedores as $p)
                <option value="{{ $p->id_proveedor }}" {{ $producto->id_proveedor == $p->id_proveedor ? 'selected' : '' }}>{{ $p->nombre_empresa }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Actualizar</button>
        <a href="{{ url('producto') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
