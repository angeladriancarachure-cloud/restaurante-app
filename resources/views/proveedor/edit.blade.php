@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Editar Proveedor</h2>
    <form action="{{ url('proveedor/'.$proveedor->id_proveedor) }}" method="POST">
        @csrf @method('PATCH')
        <div class="mb-3"><label>Nombre Empresa</label><input type="text" name="nombre_empresa" class="form-control" value="{{ $proveedor->nombre_empresa }}">@error('nombre_empresa')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Contacto</label><input type="text" name="contacto" class="form-control" value="{{ $proveedor->contacto }}"></div>
        <div class="mb-3"><label>Teléfono</label><input type="text" name="telefono" class="form-control" value="{{ $proveedor->telefono }}"></div>
        <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="{{ $proveedor->email }}"></div>
        <div class="mb-3"><label>Dirección</label><textarea name="direccion" class="form-control">{{ $proveedor->direccion }}</textarea></div>
        <div class="mb-3"><label>RFC</label><input type="text" name="rfc" class="form-control" value="{{ $proveedor->rfc }}"></div>
        <button class="btn btn-success">Actualizar</button>
        <a href="{{ url('proveedor') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
