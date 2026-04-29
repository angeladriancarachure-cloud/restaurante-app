@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Editar Orden</h2>
    <form action="{{ url('orden/'.$orden->id_orden) }}" method="POST">
        @csrf @method('PATCH')
        <div class="mb-3"><label>Mesa</label>
            <select name="id_mesa" class="form-control">
                <option value="">-- Sin mesa --</option>
                @foreach($mesas as $m)
                <option value="{{ $m->id_mesa }}" {{ $orden->id_mesa == $m->id_mesa ? 'selected' : '' }}>Mesa {{ $m->numero_mesa }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Tipo de Orden</label>
            <select name="tipo_orden" class="form-control">
                @foreach(['Para comer aquí','Para llevar','Delivery'] as $t)
                <option value="{{ $t }}" {{ $orden->tipo_orden == $t ? 'selected' : '' }}>{{ $t }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Estado</label>
            <select name="estado" class="form-control">
                @foreach(['En preparación','Lista','Entregada','Cancelada'] as $e)
                <option value="{{ $e }}" {{ $orden->estado == $e ? 'selected' : '' }}>{{ $e }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Total</label><input type="number" step="0.01" name="total" class="form-control" value="{{ $orden->total }}"></div>
        <div class="mb-3"><label>Método de Pago</label>
            <select name="metodo_pago" class="form-control">
                <option value="">-- Sin pago --</option>
                @foreach(['Efectivo','Tarjeta','Transferencia'] as $mp)
                <option value="{{ $mp }}" {{ $orden->metodo_pago == $mp ? 'selected' : '' }}>{{ $mp }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Actualizar</button>
        <a href="{{ url('orden') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
