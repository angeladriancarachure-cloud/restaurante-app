@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Nueva Reservación</h2>
    <form action="{{ url('reservacion') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Cliente</label>
            <select name="id_cliente" class="form-control">
                @foreach($clientes as $c)
                <option value="{{ $c->id_cliente }}">{{ $c->nombre }} {{ $c->apellido }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Mesa</label>
            <select name="id_mesa" class="form-control">
                <option value="">-- Sin mesa --</option>
                @foreach($mesas as $m)
                <option value="{{ $m->id_mesa }}">Mesa {{ $m->numero_mesa }} ({{ $m->ubicacion }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Fecha</label><input type="date" name="fecha_reservacion" class="form-control">@error('fecha_reservacion')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Hora</label><input type="time" name="hora_reservacion" class="form-control">@error('hora_reservacion')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Número de Personas</label><input type="number" name="numero_personas" class="form-control">@error('numero_personas')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Estado</label>
            <select name="estado" class="form-control">
                @foreach(['Confirmada','Cancelada','Completada','No Show'] as $e)
                <option value="{{ $e }}">{{ $e }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ url('reservacion') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
