<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mesa;

class MesaController extends Controller {
    public function index() {
        $datos['mesas'] = Mesa::paginate(10);
        return view('mesa.index', $datos);
    }
    public function create() { return view('mesa.create'); }
    public function store(Request $request) {
        $request->validate(['numero_mesa' => 'required|integer', 'capacidad' => 'required|integer']);
        Mesa::insert($request->except('_token'));
        return redirect('mesa')->with('mensaje', 'Mesa agregada ✅');
    }
    public function edit(string $id) {
        $mesa = Mesa::findOrFail($id);
        return view('mesa.edit', compact('mesa'));
    }
    public function update(Request $request, string $id) {
        $request->validate(['numero_mesa' => 'required|integer', 'capacidad' => 'required|integer']);
        Mesa::where('id_mesa', $id)->update($request->except(['_token','_method']));
        return redirect('mesa')->with('mensaje', 'Mesa actualizada ✅');
    }
    public function destroy(string $id) {
        Mesa::destroy($id);
        return redirect('mesa')->with('mensaje', 'Mesa eliminada ✅');
    }
    public function show(string $id) {}
}
