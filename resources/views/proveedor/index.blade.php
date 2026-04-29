@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Proveedores</h2>
    @if(session('mensaje'))<div class="alert alert-success">{{ session('mensaje') }}</div>@endif
    <a href="{{ url('proveedor/create') }}" class="btn btn-success mb-3">Nuevo Proveedor</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Empresa</th><th>Contacto</th><th>Teléfono</th><th>Email</th><th>Acciones</th></tr></thead>
        <tbody>
        @foreach($proveedores as $p)
        <tr>
            <td>{{ $p->id_proveedor }}</td>
            <td>{{ $p->nombre_empresa }}</td>
            <td>{{ $p->contacto }}</td>
            <td>{{ $p->telefono }}</td>
            <td>{{ $p->email }}</td>
            <td>
                <a href="{{ url('proveedor/'.$p->id_proveedor.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ url('proveedor/'.$p->id_proveedor) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $proveedores->links() }}
</div>
@endsection
