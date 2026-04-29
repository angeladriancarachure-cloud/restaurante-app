@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Productos</h2>
    @if(session('mensaje'))<div class="alert alert-success">{{ session('mensaje') }}</div>@endif
    <a href="{{ url('producto/create') }}" class="btn btn-success mb-3">Nuevo Producto</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Nombre</th><th>Stock</th><th>Unidad</th><th>Precio</th><th>Acciones</th></tr></thead>
        <tbody>
        @foreach($productos as $p)
        <tr>
            <td>{{ $p->id_producto }}</td>
            <td>{{ $p->nombre_producto }}</td>
            <td>{{ $p->stock_actual }}</td>
            <td>{{ $p->unidad_medida }}</td>
            <td>${{ $p->precio_unitario }}</td>
            <td>
                <a href="{{ url('producto/'.$p->id_producto.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ url('producto/'.$p->id_producto) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $productos->links() }}
</div>
@endsection
