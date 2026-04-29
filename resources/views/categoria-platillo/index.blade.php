@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Categorías de Platillos</h2>
    @if(session('mensaje'))<div class="alert alert-success">{{ session('mensaje') }}</div>@endif
    <a href="{{ url('categoria-platillo/create') }}" class="btn btn-success mb-3">Nueva Categoría</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Nombre</th><th>Acciones</th></tr></thead>
        <tbody>
        @foreach($categorias as $c)
        <tr>
            <td>{{ $c->id_categoria_platillo }}</td>
            <td>{{ $c->nombre_categoria }}</td>
            <td>
                <a href="{{ url('categoria-platillo/'.$c->id_categoria_platillo.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ url('categoria-platillo/'.$c->id_categoria_platillo) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $categorias->links() }}
</div>
@endsection
