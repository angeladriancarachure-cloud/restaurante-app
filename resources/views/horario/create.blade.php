@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Nuevo Horario</h2>
    <form action="{{ url('horario') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Empleado</label>
            <select name="id_empleado" class="form-control">
                @foreach($empleados as $e)
                <option value="{{ $e->id_empleado }}">{{ $e->nombre }} {{ $e->apellido }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Día</label>
            <select name="dia_semana" class="form-control">
                @foreach(['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'] as $d)
                <option value="{{ $d }}">{{ $d }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Hora Entrada</label><input type="time" name="hora_entrada" class="form-control"></div>
        <div class="mb-3"><label>Hora Salida</label><input type="time" name="hora_salida" class="form-control"></div>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ url('horario') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
