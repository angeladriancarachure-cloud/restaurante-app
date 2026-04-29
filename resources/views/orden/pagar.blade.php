@extends('layouts.app')
@section('content')
<div class="container" style="max-width:600px">
    <h2>💰 Cobrar Orden #{{ $orden->id_orden }}</h2>
    <div class="card mb-3">
        <div class="card-header bg-dark text-white">Resumen de la Orden</div>
        <div class="card-body">
            <table class="table table-sm">
                <thead><tr><th>Platillo</th><th>Cant</th><th>Precio</th><th>Subtotal</th></tr></thead>
                <tbody>
                @foreach($detalles as $d)
                <tr>
                    <td>{{ $d->platillo->nombre_platillo ?? 'Platillo' }}</td>
                    <td>{{ $d->cantidad }}</td>
                    <td>${{ number_format($d->precio_unitario,2) }}</td>
                    <td>${{ number_format($d->subtotal,2) }}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-light"><td colspan="3" class="text-end">Subtotal:</td><td>${{ number_format($orden->subtotal,2) }}</td></tr>
                    <tr class="table-light"><td colspan="3" class="text-end">IVA (16%):</td><td>${{ number_format($orden->impuestos,2) }}</td></tr>
                    <tr class="table-success fw-bold"><td colspan="3" class="text-end">TOTAL:</td><td>${{ number_format($orden->total,2) }}</td></tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-success text-white">Método de Pago</div>
        <div class="card-body">
            <form action="{{ url('orden/'.$orden->id_orden.'/confirmar-pago') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Selecciona método</label>
                    <div class="d-flex gap-3 mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metodo_pago" value="Efectivo" id="efectivo" checked onchange="togglePago('efectivo')">
                            <label class="form-check-label" for="efectivo">💵 Efectivo</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metodo_pago" value="Tarjeta" id="tarjeta" onchange="togglePago('tarjeta')">
                            <label class="form-check-label" for="tarjeta">💳 Tarjeta</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metodo_pago" value="Transferencia" id="transferencia" onchange="togglePago('transferencia')">
                            <label class="form-check-label" for="transferencia">📱 Transferencia</label>
                        </div>
                    </div>
                </div>

                {{-- EFECTIVO --}}
                <div id="seccionEfectivo">
                    <div class="mb-3">
                        <label>¿Con cuánto paga el cliente?</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" id="montoRecibido" class="form-control" placeholder="0.00" oninput="calcularCambio()">
                        </div>
                    </div>
                    <div class="alert alert-info" id="cambioInfo" style="display:none">
                        💵 Cambio a devolver: <strong id="montoCambio">$0.00</strong>
                    </div>
                </div>

                {{-- TARJETA --}}
                <div id="seccionTarjeta" style="display:none">
                    <div class="mb-3">
                        <label>Últimos 4 dígitos de la tarjeta</label>
                        <input type="text" name="ref_tarjeta" class="form-control" maxlength="4" placeholder="1234">
                    </div>
                    <div class="alert alert-warning">💳 El cobro se realizará por terminal bancaria.</div>
                </div>

                {{-- TRANSFERENCIA --}}
                <div id="seccionTransferencia" style="display:none">
                    <div class="mb-3">
                        <label>Número de referencia / CLABE</label>
                        <input type="text" name="ref_transferencia" class="form-control" placeholder="Referencia de transferencia">
                    </div>
                    <div class="alert alert-info">📱 CLABE: <strong>012345678901234567</strong> — Banco: BBVA</div>
                </div>

                <button class="btn btn-success btn-lg w-100 mt-3">✅ Confirmar Pago</button>
                <a href="{{ url('orden') }}" class="btn btn-secondary w-100 mt-2">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<script>
function togglePago(tipo) {
    document.getElementById('seccionEfectivo').style.display = tipo === 'efectivo' ? 'block' : 'none';
    document.getElementById('seccionTarjeta').style.display = tipo === 'tarjeta' ? 'block' : 'none';
    document.getElementById('seccionTransferencia').style.display = tipo === 'transferencia' ? 'block' : 'none';
}
function calcularCambio() {
    const total = {{ $orden->total }};
    const recibido = parseFloat(document.getElementById('montoRecibido').value) || 0;
    const cambio = recibido - total;
    const info = document.getElementById('cambioInfo');
    if (recibido > 0) {
        info.style.display = 'block';
        document.getElementById('montoCambio').textContent = '$' + (cambio >= 0 ? cambio.toFixed(2) : '0.00');
        info.className = cambio >= 0 ? 'alert alert-success' : 'alert alert-danger';
        info.innerHTML = cambio >= 0
            ? '💵 Cambio a devolver: <strong>$' + cambio.toFixed(2) + '</strong>'
            : '⚠️ Monto insuficiente, faltan: <strong>$' + Math.abs(cambio).toFixed(2) + '</strong>';
    } else {
        info.style.display = 'none';
    }
}
</script>
@endsection
