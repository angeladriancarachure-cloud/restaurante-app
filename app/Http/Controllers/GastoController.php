<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Gasto;

class GastoController extends Controller {
    public function index() {
        $datos['gastos'] = Gasto::paginate(10);
        return view('gasto.index', $datos);
    }
    public function create() { return view('gasto.create'); }
    public function store(Request $request) {
        $request->validate(['concepto' => 'required|max:100', 'monto' => 'required|numeric', 'fecha_gasto' => 'required|date']);
        Gasto::insert($request->except('_token'));
        return redirect('gasto')->with('mensaje', 'Gasto agregado ✅');
    }
    public function edit(string $id) {
        $gasto = Gasto::findOrFail($id);
        return view('gasto.edit', compact('gasto'));
    }
    public function update(Request $request, string $id) {
        $request->validate(['concepto' => 'required|max:100', 'monto' => 'required|numeric', 'fecha_gasto' => 'required|date']);
        Gasto::where('id_gasto', $id)->update($request->except(['_token','_method']));
        return redirect('gasto')->with('mensaje', 'Gasto actualizado ✅');
    }
    public function destroy(string $id) {
        Gasto::destroy($id);
        return redirect('gasto')->with('mensaje', 'Gasto eliminado ✅');
    }
    public function show(string $id) {}
}
