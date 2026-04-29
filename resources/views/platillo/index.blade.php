@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Platillos</h2>
    @if(session('mensaje'))<div class="alert alert-success">{{ session('mensaje') }}</div>@endif
    <a href="{{ url('platillo/create') }}" class="btn btn-success mb-3">Nuevo Platillo</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Disponible</th><th>Acciones</th></tr></thead>
        <tbody>
        @foreach($platillos as $p)
        <tr>
            <td>{{ $p->id_platillo }}</td>
            <td>{{ $p->nombre_platillo }}</td>
            <td>${{ $p->precio }}</td>
            <td>{{ $p->disponible ? 'Sí' : 'No' }}</td>
            <td>
                <a href="{{ url('platillo/'.$p->id_platillo.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ url('platillo/'.$p->id_platillo) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $platillos->links() }}
</div>
@endsection
