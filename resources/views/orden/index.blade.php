@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Órdenes</h2>
    @if(session('mensaje'))<div class="alert alert-success">{{ session('mensaje') }}</div>@endif
    <a href="{{ url('orden/create') }}" class="btn btn-success mb-3">Nueva Orden</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr><th>ID</th><th>Mesa</th><th>Cliente</th><th>Tipo</th><th>Estado</th><th>Total</th><th>Pagado</th><th>Acciones</th></tr>
        </thead>
        <tbody>
        @foreach($ordenes as $o)
        <tr>
            <td>{{ $o->id_orden }}</td>
            <td>{{ $o->id_mesa ? 'Mesa '.$o->id_mesa : 'Sin mesa' }}</td>
            <td>{{ $o->id_cliente ?? 'Sin cliente' }}</td>
            <td>{{ $o->tipo_orden }}</td>
            <td><span class="badge {{ $o->estado == 'Entregada' ? 'bg-success' : ($o->estado == 'En preparación' ? 'bg-warning text-dark' : 'bg-secondary') }}">{{ $o->estado }}</span></td>
            <td>${{ number_format($o->total, 2) }}</td>
            <td>
                @if($o->pagado)
                    <span class="badge bg-success">Pagado</span>
                @else
                    <span class="badge bg-danger">Pendiente</span>
                @endif
            </td>
            <td>
                @if(!$o->pagado)
                    <a href="{{ url('orden/'.$o->id_orden.'/cobrar') }}" class="btn btn-success btn-sm">💰 Cobrar</a>
                @endif
                <a href="{{ url('orden/'.$o->id_orden.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ url('orden/'.$o->id_orden) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $ordenes->links() }}
</div>
@endsection
