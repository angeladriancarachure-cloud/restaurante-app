@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Editar Categoría de Platillo</h2>
    <form action="{{ url('categoria-platillo/'.$categoria->id_categoria_platillo) }}" method="POST">
        @csrf @method('PATCH')
        <div class="mb-3"><label>Nombre</label><input type="text" name="nombre_categoria" class="form-control" value="{{ $categoria->nombre_categoria }}">@error('nombre_categoria')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Descripción</label><textarea name="descripcion" class="form-control">{{ $categoria->descripcion }}</textarea></div>
        <button class="btn btn-success">Actualizar</button>
        <a href="{{ url('categoria-platillo') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
