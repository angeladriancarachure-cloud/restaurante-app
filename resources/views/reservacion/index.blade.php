@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Reservaciones</h2>
    @if(session('mensaje'))<div class="alert alert-success">{{ session('mensaje') }}</div>@endif
    <a href="{{ url('reservacion/create') }}" class="btn btn-success mb-3">Nueva Reservación</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Cliente</th><th>Mesa</th><th>Fecha</th><th>Hora</th><th>Personas</th><th>Estado</th><th>Acciones</th></tr></thead>
        <tbody>
        @foreach($reservaciones as $r)
        <tr>
            <td>{{ $r->id_reservacion }}</td>
            <td>{{ $r->id_cliente }}</td>
            <td>{{ $r->id_mesa }}</td>
            <td>{{ $r->fecha_reservacion }}</td>
            <td>{{ $r->hora_reservacion }}</td>
            <td>{{ $r->numero_personas }}</td>
            <td>{{ $r->estado }}</td>
            <td>
                <a href="{{ url('reservacion/'.$r->id_reservacion.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ url('reservacion/'.$r->id_reservacion) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $reservaciones->links() }}
</div>
@endsection
