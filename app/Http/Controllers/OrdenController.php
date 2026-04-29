<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Orden;
use App\Models\Mesa;
use App\Models\Cliente;
use App\Models\Platillo;
use App\Models\DetalleOrden;

class OrdenController extends Controller {
    public function index() {
        $datos['ordenes'] = Orden::paginate(10);
        return view('orden.index', $datos);
    }
    public function create() {
        $mesas = Mesa::all();
        $clientes = Cliente::all();
        $platillos = Platillo::where('disponible', 1)->get();
        return view('orden.create', compact('mesas', 'clientes', 'platillos'));
    }
    public function store(Request $request) {
        $request->validate(['tipo_orden' => 'required']);
        $orden = Orden::create([
            'id_mesa'     => $request->id_mesa ?: null,
            'id_cliente'  => $request->id_cliente ?: null,
            'tipo_orden'  => $request->tipo_orden,
            'estado'      => 'En preparacion',
            'subtotal'    => $request->subtotal ?: 0,
            'impuestos'   => $request->impuestos ?: 0,
            'total'       => $request->total ?: 0,
            'metodo_pago' => $request->metodo_pago ?: null,
            'pagado'      => 0,
            'notas'       => $request->notas,
        ]);
        if ($request->platillos) {
            foreach ($request->platillos as $i => $id_platillo) {
                DetalleOrden::create([
                    'id_orden'        => $orden->id_orden,
                    'id_platillo'     => $id_platillo,
                    'cantidad'        => $request->cantidades[$i],
                    'precio_unitario' => $request->precios[$i],
                    'subtotal'        => $request->subtotales[$i],
                ]);
            }
        }
        return redirect('orden')->with('mensaje', 'Orden creada');
    }
    public function edit(string $id) {
        $orden = Orden::findOrFail($id);
        $mesas = Mesa::all();
        $clientes = Cliente::all();
        return view('orden.edit', compact('orden', 'mesas', 'clientes'));
    }
    public function update(Request $request, string $id) {
        Orden::where('id_orden', $id)->update($request->except(['_token','_method']));
        return redirect('orden')->with('mensaje', 'Orden actualizada');
    }
    public function destroy(string $id) {
        Orden::destroy($id);
        return redirect('orden')->with('mensaje', 'Orden eliminada');
    }
    public function show(string $id) {}
    public function pagar(string $id) {
        Orden::where('id_orden', $id)->update(['pagado' => 1, 'estado' => 'Entregada']);
        return redirect('orden')->with('mensaje', 'Orden pagada');
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
        return redirect('orden')->with('mensaje', 'Pago confirmado con '.$request->metodo_pago);
    }
}
