@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Panel de Administración: Empleados</h2>
    @if(session('mensaje'))<div class="alert alert-success alert-dismissible fade show">{{ session('mensaje') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>@endif
    <a href="{{ url('empleado/create') }}" class="btn btn-success mb-3">Registrar Nuevo Empleado</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Foto</th><th>Nombre</th><th>Email</th><th>Rol</th><th>Acciones</th></tr></thead>
        <tbody>
        @foreach($empleados as $e)
        <tr>
            <td>{{ $e->id_empleado }}</td>
            <td>
                @if($e->foto)
                    <img src="{{ asset('fotos/'.$e->foto) }}" width="50" height="50" class="rounded-circle">
                @else
                    <span class="text-muted">Sin foto</span>
                @endif
            </td>
            <td>{{ $e->nombre }} {{ $e->apellido }}</td>
            <td>{{ $e->email }}</td>
            <td>{{ $e->rol->nombre_rol ?? 'Sin rol' }}</td>
            <td>
                <a href="{{ url('empleado/'.$e->id_empleado.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ url('empleado/'.$e->id_empleado) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $empleados->links() }}
</div>
@endsection
