<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller {
    public function index() {
        $datos['clientes'] = Cliente::paginate(10);
        return view('cliente.index', $datos);
    }
    public function create() { return view('cliente.create'); }
    public function store(Request $request) {
        $request->validate(['nombre' => 'required|max:100', 'email' => 'nullable|email|unique:clientes,email']);
        Cliente::insert($request->except('_token'));
        return redirect('cliente')->with('mensaje', 'Cliente agregado ✅');
    }
    public function edit(string $id) {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.edit', compact('cliente'));
    }
    public function update(Request $request, string $id) {
        $request->validate(['nombre' => 'required|max:100', 'email' => 'nullable|email|unique:clientes,email,'.$id.',id_cliente']);
        Cliente::where('id_cliente', $id)->update($request->except(['_token','_method']));
        return redirect('cliente')->with('mensaje', 'Cliente actualizado ✅');
    }
    public function destroy(string $id) {
        Cliente::destroy($id);
        return redirect('cliente')->with('mensaje', 'Cliente eliminado ✅');
    }
    public function show(string $id) {}

    public function rapido(Request $request) {
    $cliente = Cliente::create([
        'nombre'   => $request->nombre,
        'apellido' => $request->apellido,
        'telefono' => $request->telefono,
        'email'    => $request->email ?: null,
    ]);
    return response()->json(['id' => $cliente->id_cliente]);
}

public function cobrar(string $id) {
    $orden = Orden::findOrFail($id);
    $detalles = DetalleOrden::where('id_orden', $id)->get();
    return view('orden.pagar', compact('orden', 'detalles'));
}

public function confirmarPago(Request $request, string $id) {
    Orden::where('id_orden', $id)->update([
        'pagado'      => 1,
        'estado'      => 'Entregada',
        'metodo_pago' => $request->metodo_pago,
    ]);
    return redirect('orden')->with('mensaje', '💰 Pago confirmado con '.$request->metodo_pago.' ✅');
}

}
// ESTE BLOQUE VA DENTRO DE LA CLASE - agrégalo manualmente en VSCode antes del último }
