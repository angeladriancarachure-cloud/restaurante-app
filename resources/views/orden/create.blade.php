@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Nueva Orden</h2>
    <form action="{{ url('orden') }}" method="POST" id="formOrden">
        @csrf
        <div class="row">
            <div class="col-md-6">

                <div class="mb-3">
                    <label>Tipo de Orden</label>
                    <select name="tipo_orden" class="form-control" id="tipoOrden" onchange="toggleMesa()">
                        <option value="Para comer aquí">Para comer aquí</option>
                        <option value="Para llevar">Para llevar</option>
                        <option value="Delivery">Delivery</option>
                    </select>
                </div>

                <div class="mb-3" id="campoMesa">
                    <label>Mesa <span class="text-danger">*</span></label>
                    <select name="id_mesa" class="form-control">
                        <option value="">-- Selecciona mesa libre --</option>
                        @foreach($mesas as $m)
                        <option value="{{ $m->id_mesa }}">Mesa {{ $m->numero_mesa }} - {{ $m->ubicacion }} (Cap. {{ $m->capacidad }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Cliente</label>
                    <div class="input-group">
                        <select name="id_cliente" class="form-control" id="selectCliente">
                            <option value="">-- Sin cliente / Anónimo --</option>
                            @foreach($clientes as $c)
                            <option value="{{ $c->id_cliente }}">{{ $c->nombre }} {{ $c->apellido }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-outline-primary" onclick="toggleNuevoCliente()">+ Nuevo</button>
                    </div>
                </div>

                <div id="nuevoClienteForm" style="display:none" class="border rounded p-3 mb-3 bg-light">
                    <h6>Registrar Cliente Rápido</h6>
                    <div class="mb-2"><input type="text" id="ncNombre" class="form-control" placeholder="Nombre *"></div>
                    <div class="mb-2"><input type="text" id="ncApellido" class="form-control" placeholder="Apellido"></div>
                    <div class="mb-2"><input type="text" id="ncTelefono" class="form-control" placeholder="Teléfono"></div>
                    <div class="mb-2"><input type="email" id="ncEmail" class="form-control" placeholder="Email"></div>
                    <button type="button" class="btn btn-success btn-sm" onclick="guardarClienteRapido()">Guardar Cliente</button>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="toggleNuevoCliente()">Cancelar</button>
                    <div id="msgCliente" class="mt-2"></div>
                </div>

                <div class="mb-3">
                    <label>Método de Pago</label>
                    <select name="metodo_pago" class="form-control">
                        <option value="">-- Pendiente --</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="Tarjeta">Tarjeta</option>
                        <option value="Transferencia">Transferencia</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Notas</label>
                    <textarea name="notas" class="form-control" rows="2" placeholder="Alergias, preferencias..."></textarea>
                </div>

            </div>
            <div class="col-md-6">
                <h5>🍽️ Agregar Platillos</h5>
                <div class="input-group mb-3">
                    <select id="selectPlatillo" class="form-control">
                        <option value="">-- Selecciona platillo --</option>
                        @foreach($platillos as $p)
                        <option value="{{ $p->id_platillo }}" data-precio="{{ $p->precio }}" data-nombre="{{ $p->nombre_platillo }}">
                            {{ $p->nombre_platillo }} - ${{ $p->precio }}
                        </option>
                        @endforeach
                    </select>
                    <input type="number" id="cantidadPlatillo" class="form-control" value="1" min="1" style="max-width:80px">
                    <button type="button" class="btn btn-primary" onclick="agregarPlatillo()">Agregar</button>
                </div>

                <table class="table table-sm table-bordered">
                    <thead class="table-dark"><tr><th>Platillo</th><th>Cant</th><th>Precio</th><th>Subtotal</th><th></th></tr></thead>
                    <tbody id="cuerpoTabla"></tbody>
                    <tfoot>
                        <tr class="table-light"><td colspan="3" class="text-end">Subtotal:</td><td id="subtotalMostrar">$0.00</td><td></td></tr>
                        <tr class="table-light"><td colspan="3" class="text-end">IVA (16%):</td><td id="ivaMostrar">$0.00</td><td></td></tr>
                        <tr class="table-success"><td colspan="3" class="text-end"><strong>Total:</strong></td><td><strong id="totalMostrar">$0.00</strong></td><td></td></tr>
                    </tfoot>
                </table>

                <input type="hidden" name="subtotal" id="subtotalInput">
                <input type="hidden" name="total" id="totalInput">
                <input type="hidden" name="impuestos" id="impuestosInput">
                <input type="hidden" name="estado" value="En preparación">
                <input type="hidden" name="pagado" value="0">
                <div id="platillosContainer"></div>
            </div>
        </div>
        <hr>
        <button class="btn btn-success btn-lg">✅ Crear Orden</button>
        <a href="{{ url('orden') }}" class="btn btn-secondary btn-lg">Cancelar</a>
    </form>
</div>

<script>
let platillos = [];

function toggleMesa() {
    const tipo = document.getElementById('tipoOrden').value;
    const campo = document.getElementById('campoMesa');
    campo.style.display = (tipo === 'Para comer aquí') ? 'block' : 'none';
}

function toggleNuevoCliente() {
    const form = document.getElementById('nuevoClienteForm');
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
}

async function guardarClienteRapido() {
    const nombre = document.getElementById('ncNombre').value;
    if (!nombre) { alert('El nombre es obligatorio'); return; }

    const res = await fetch('{{ url("cliente/rapido") }}', {
        method: 'POST',
        headers: {'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},
        body: JSON.stringify({
            nombre: nombre,
            apellido: document.getElementById('ncApellido').value,
            telefono: document.getElementById('ncTelefono').value,
            email: document.getElementById('ncEmail').value,
        })
    });
    const data = await res.json();
    if (data.id) {
        const select = document.getElementById('selectCliente');
        const option = new Option(nombre + ' ' + document.getElementById('ncApellido').value, data.id, true, true);
        select.add(option);
        document.getElementById('msgCliente').innerHTML = '<div class="alert alert-success py-1">Cliente guardado ✅</div>';
        setTimeout(() => toggleNuevoCliente(), 1500);
    }
}

function agregarPlatillo() {
    const select = document.getElementById('selectPlatillo');
    const cantidad = parseInt(document.getElementById('cantidadPlatillo').value);
    const id = select.value;
    const precio = parseFloat(select.options[select.selectedIndex].dataset.precio);
    const nombre = select.options[select.selectedIndex].dataset.nombre;
    if (!id) return alert('Selecciona un platillo');
    const existe = platillos.find(p => p.id == id);
    if (existe) { existe.cantidad += cantidad; existe.subtotal = existe.cantidad * existe.precio; }
    else { platillos.push({ id, nombre, precio, cantidad, subtotal: precio * cantidad }); }
    renderTabla();
}

function eliminarPlatillo(id) {
    platillos = platillos.filter(p => p.id != id);
    renderTabla();
}

function renderTabla() {
    const tbody = document.getElementById('cuerpoTabla');
    const container = document.getElementById('platillosContainer');
    tbody.innerHTML = ''; container.innerHTML = '';
    let subtotal = 0;
    platillos.forEach(p => {
        subtotal += p.subtotal;
        tbody.innerHTML += `<tr>
            <td>${p.nombre}</td><td>${p.cantidad}</td>
            <td>$${p.precio.toFixed(2)}</td><td>$${p.subtotal.toFixed(2)}</td>
            <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminarPlatillo('${p.id}')">✕</button></td>
        </tr>`;
        container.innerHTML += `
            <input type="hidden" name="platillos[]" value="${p.id}">
            <input type="hidden" name="cantidades[]" value="${p.cantidad}">
            <input type="hidden" name="precios[]" value="${p.precio}">
            <input type="hidden" name="subtotales[]" value="${p.subtotal}">`;
    });
    const iva = subtotal * 0.16;
    const total = subtotal + iva;
    document.getElementById('subtotalMostrar').textContent = '$' + subtotal.toFixed(2);
    document.getElementById('ivaMostrar').textContent = '$' + iva.toFixed(2);
    document.getElementById('totalMostrar').textContent = '$' + total.toFixed(2);
    document.getElementById('subtotalInput').value = subtotal.toFixed(2);
    document.getElementById('impuestosInput').value = iva.toFixed(2);
    document.getElementById('totalInput').value = total.toFixed(2);
}

toggleMesa();
</script>
@endsection
