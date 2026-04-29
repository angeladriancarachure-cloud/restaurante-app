<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\Empleado;

class CompraController extends Controller {
    public function index() {
        $datos['compras'] = Compra::paginate(10);
        return view('compra.index', $datos);
    }
    public function create() {
        $proveedores = Proveedor::all();
        $empleados = Empleado::all();
        return view('compra.create', compact('proveedores', 'empleados'));
    }
    public function store(Request $request) {
        $request->validate(['id_proveedor' => 'required', 'fecha_compra' => 'required|date', 'total' => 'required|numeric']);
        Compra::insert($request->except('_token'));
        return redirect('compra')->with('mensaje', 'Compra agregada ✅');
    }
    public function edit(string $id) {
        $compra = Compra::findOrFail($id);
        $proveedores = Proveedor::all();
        $empleados = Empleado::all();
        return view('compra.edit', compact('compra', 'proveedores', 'empleados'));
    }
    public function update(Request $request, string $id) {
        $request->validate(['id_proveedor' => 'required', 'fecha_compra' => 'required|date', 'total' => 'required|numeric']);
        Compra::where('id_compra', $id)->update($request->except(['_token','_method']));
        return redirect('compra')->with('mensaje', 'Compra actualizada ✅');
    }
    public function destroy(string $id) {
        Compra::destroy($id);
        return redirect('compra')->with('mensaje', 'Compra eliminada ✅');
    }
    public function show(string $id) {}
}
