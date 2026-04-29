@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Compras</h2>
    @if(session('mensaje'))<div class="alert alert-success">{{ session('mensaje') }}</div>@endif
    <a href="{{ url('compra/create') }}" class="btn btn-success mb-3">Nueva Compra</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Proveedor</th><th>Fecha</th><th>Total</th><th>Acciones</th></tr></thead>
        <tbody>
        @foreach($compras as $c)
        <tr>
            <td>{{ $c->id_compra }}</td>
            <td>{{ $c->id_proveedor }}</td>
            <td>{{ $c->fecha_compra }}</td>
            <td>${{ $c->total }}</td>
            <td>
                <a href="{{ url('compra/'.$c->id_compra.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ url('compra/'.$c->id_compra) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $compras->links() }}
</div>
@endsection
