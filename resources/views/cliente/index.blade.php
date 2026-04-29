@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Clientes</h2>
    @if(session('mensaje'))<div class="alert alert-success">{{ session('mensaje') }}</div>@endif
    <a href="{{ url('cliente/create') }}" class="btn btn-success mb-3">Nuevo Cliente</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Acciones</th></tr></thead>
        <tbody>
        @foreach($clientes as $c)
        <tr>
            <td>{{ $c->id_cliente }}</td>
            <td>{{ $c->nombre }} {{ $c->apellido }}</td>
            <td>{{ $c->email }}</td>
            <td>{{ $c->telefono }}</td>
            <td>
                <a href="{{ url('cliente/'.$c->id_cliente.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ url('cliente/'.$c->id_cliente) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $clientes->links() }}
</div>
@endsection
