@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Mesas</h2>
    @if(session('mensaje'))<div class="alert alert-success">{{ session('mensaje') }}</div>@endif
    <a href="{{ url('mesa/create') }}" class="btn btn-success mb-3">Nueva Mesa</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Número</th><th>Capacidad</th><th>Ubicación</th><th>Estado</th><th>Acciones</th></tr></thead>
        <tbody>
        @foreach($mesas as $m)
        <tr>
            <td>{{ $m->id_mesa }}</td>
            <td>{{ $m->numero_mesa }}</td>
            <td>{{ $m->capacidad }}</td>
            <td>{{ $m->ubicacion }}</td>
            <td>{{ $m->estado }}</td>
            <td>
                <a href="{{ url('mesa/'.$m->id_mesa.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ url('mesa/'.$m->id_mesa) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $mesas->links() }}
</div>
@endsection
