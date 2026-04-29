@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Editar Platillo</h2>
    <form action="{{ url('platillo/'.$platillo->id_platillo) }}" method="POST">
        @csrf @method('PATCH')
        <div class="mb-3"><label>Nombre</label><input type="text" name="nombre_platillo" class="form-control" value="{{ $platillo->nombre_platillo }}">@error('nombre_platillo')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Descripción</label><textarea name="descripcion" class="form-control">{{ $platillo->descripcion }}</textarea></div>
        <div class="mb-3"><label>Categoría</label>
            <select name="id_categoria_platillo" class="form-control">
                <option value="">-- Sin categoría --</option>
                @foreach($categorias as $c)
                <option value="{{ $c->id_categoria_platillo }}" {{ $platillo->id_categoria_platillo == $c->id_categoria_platillo ? 'selected' : '' }}>{{ $c->nombre_categoria }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Precio</label><input type="number" step="0.01" name="precio" class="form-control" value="{{ $platillo->precio }}">@error('precio')<div class="text-danger">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label>Tiempo Preparación (min)</label><input type="number" name="tiempo_preparacion" class="form-control" value="{{ $platillo->tiempo_preparacion }}"></div>
        <div class="mb-3"><label>Disponible</label>
            <select name="disponible" class="form-control">
                <option value="1" {{ $platillo->disponible ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$platillo->disponible ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <button class="btn btn-success">Actualizar</button>
        <a href="{{ url('platillo') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
