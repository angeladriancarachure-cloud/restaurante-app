<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Reservacion;
use App\Models\Cliente;
use App\Models\Mesa;

class ReservacionController extends Controller {
    public function index() {
        $datos['reservaciones'] = Reservacion::paginate(10);
        return view('reservacion.index', $datos);
    }
    public function create() {
        $clientes = Cliente::all();
        $mesas = Mesa::all();
        return view('reservacion.create', compact('clientes', 'mesas'));
    }
    public function store(Request $request) {
        $request->validate(['id_cliente' => 'required', 'fecha_reservacion' => 'required|date', 'hora_reservacion' => 'required', 'numero_personas' => 'required|integer']);
        Reservacion::insert($request->except('_token'));
        return redirect('reservacion')->with('mensaje', 'Reservación agregada ✅');
    }
    public function edit(string $id) {
        $reservacion = Reservacion::findOrFail($id);
        $clientes = Cliente::all();
        $mesas = Mesa::all();
        return view('reservacion.edit', compact('reservacion', 'clientes', 'mesas'));
    }
    public function update(Request $request, string $id) {
        $request->validate(['id_cliente' => 'required', 'fecha_reservacion' => 'required|date', 'hora_reservacion' => 'required', 'numero_personas' => 'required|integer']);
        Reservacion::where('id_reservacion', $id)->update($request->except(['_token','_method']));
        return redirect('reservacion')->with('mensaje', 'Reservación actualizada ✅');
    }
    public function destroy(string $id) {
        Reservacion::destroy($id);
        return redirect('reservacion')->with('mensaje', 'Reservación eliminada ✅');
    }
    public function show(string $id) {}
}
