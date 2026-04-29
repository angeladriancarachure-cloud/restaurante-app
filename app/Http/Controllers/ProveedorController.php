<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller {
    public function index() {
        $datos['proveedores'] = Proveedor::paginate(10);
        return view('proveedor.index', $datos);
    }
    public function create() { return view('proveedor.create'); }
    public function store(Request $request) {
        $request->validate(['nombre_empresa' => 'required|max:100']);
        Proveedor::insert($request->except('_token'));
        return redirect('proveedor')->with('mensaje', 'Proveedor agregado ✅');
    }
    public function edit(string $id) {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedor.edit', compact('proveedor'));
    }
    public function update(Request $request, string $id) {
        $request->validate(['nombre_empresa' => 'required|max:100']);
        Proveedor::where('id_proveedor', $id)->update($request->except(['_token','_method']));
        return redirect('proveedor')->with('mensaje', 'Proveedor actualizado ✅');
    }
    public function destroy(string $id) {
        Proveedor::destroy($id);
        return redirect('proveedor')->with('mensaje', 'Proveedor eliminado ✅');
    }
    public function show(string $id) {}
}
