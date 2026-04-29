@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Horarios</h2>
    @if(session('mensaje'))<div class="alert alert-success">{{ session('mensaje') }}</div>@endif
    <a href="{{ url('horario/create') }}" class="btn btn-success mb-3">Nuevo Horario</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Empleado</th><th>Día</th><th>Entrada</th><th>Salida</th><th>Acciones</th></tr></thead>
        <tbody>
        @foreach($horarios as $h)
        <tr>
            <td>{{ $h->id_horario }}</td>
            <td>{{ $h->id_empleado }}</td>
            <td>{{ $h->dia_semana }}</td>
            <td>{{ $h->hora_entrada }}</td>
            <td>{{ $h->hora_salida }}</td>
            <td>
                <a href="{{ url('horario/'.$h->id_horario.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ url('horario/'.$h->id_horario) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $horarios->links() }}
</div>
@endsection
