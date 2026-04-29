<div class="mb-3">
    <label>Nombre</label>
    <input type="text" name="nombre" class="form-control" value="{{ isset($empleado) ? $empleado->nombre : old('nombre') }}">
    @error('nombre')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label>Apellido</label>
    <input type="text" name="apellido" class="form-control" value="{{ isset($empleado) ? $empleado->apellido : old('apellido') }}">
    @error('apellido')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ isset($empleado) ? $empleado->email : old('email') }}">
    @error('email')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label>Teléfono</label>
    <input type="text" name="telefono" class="form-control" value="{{ isset($empleado) ? $empleado->telefono : old('telefono') }}">
</div>
<div class="mb-3">
    <label>Fecha Contratación</label>
    <input type="date" name="fecha_contratacion" class="form-control" value="{{ isset($empleado) ? $empleado->fecha_contratacion : old('fecha_contratacion') }}">
</div>
<div class="mb-3">
    <label>Salario</label>
    <input type="number" step="0.01" name="salario" class="form-control" value="{{ isset($empleado) ? $empleado->salario : old('salario') }}">
    @error('salario')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label>Rol</label>
    <select name="id_rol" class="form-control">
        @foreach($roles as $r)
        <option value="{{ $r->id_rol }}" {{ isset($empleado) && $empleado->id_rol == $r->id_rol ? 'selected' : '' }}>{{ $r->nombre_rol }}</option>
        @endforeach
    </select>
    @error('id_rol')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label>Foto</label>
    @if(isset($empleado) && $empleado->foto)
        <div class="mb-2">
            <img src="{{ asset('fotos/'.$empleado->foto) }}" width="100" class="rounded">
        </div>
    @endif
    <input type="file" name="foto" class="form-control" accept="image/*">
    @error('foto')<div class="text-danger">{{ $message }}</div>@enderror
</div>
