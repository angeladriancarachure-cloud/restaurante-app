@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Gastos</h2>
    @if(session('mensaje'))<div class="alert alert-success">{{ session('mensaje') }}</div>@endif
    <a href="{{ url('gasto/create') }}" class="btn btn-success mb-3">Nuevo Gasto</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Concepto</th><th>Monto</th><th>Categoría</th><th>Fecha</th><th>Acciones</th></tr></thead>
        <tbody>
        @foreach($gastos as $g)
        <tr>
            <td>{{ $g->id_gasto }}</td>
            <td>{{ $g->concepto }}</td>
            <td>${{ $g->monto }}</td>
            <td>{{ $g->categoria }}</td>
            <td>{{ $g->fecha_gasto }}</td>
            <td>
                <a href="{{ url('gasto/'.$g->id_gasto.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ url('gasto/'.$g->id_gasto) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $gastos->links() }}
</div>
@endsection
