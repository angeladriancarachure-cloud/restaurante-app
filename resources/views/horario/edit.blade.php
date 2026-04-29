@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Editar Horario</h2>
    <form action="{{ url('horario/'.$horario->id_horario) }}" method="POST">
        @csrf @method('PATCH')
        <div class="mb-3"><label>Empleado</label>
            <select name="id_empleado" class="form-control">
                @foreach($empleados as $e)
                <option value="{{ $e->id_empleado }}" {{ $horario->id_empleado == $e->id_empleado ? 'selected' : '' }}>{{ $e->nombre }} {{ $e->apellido }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Día</label>
            <select name="dia_semana" class="form-control">
                @foreach(['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'] as $d)
                <option value="{{ $d }}" {{ $horario->dia_semana == $d ? 'selected' : '' }}>{{ $d }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Hora Entrada</label><input type="time" name="hora_entrada" class="form-control" value="{{ $horario->hora_entrada }}"></div>
        <div class="mb-3"><label>Hora Salida</label><input type="time" name="hora_salida" class="form-control" value="{{ $horario->hora_salida }}"></div>
        <button class="btn btn-success">Actualizar</button>
        <a href="{{ url('horario') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
