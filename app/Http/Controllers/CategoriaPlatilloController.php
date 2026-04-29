<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CategoriaPlatillo;

class CategoriaPlatilloController extends Controller {
    public function index() {
        $datos['categorias'] = CategoriaPlatillo::paginate(10);
        return view('categoria-platillo.index', $datos);
    }
    public function create() { return view('categoria-platillo.create'); }
    public function store(Request $request) {
        $request->validate(['nombre_categoria' => 'required|max:100']);
        CategoriaPlatillo::insert($request->except('_token'));
        return redirect('categoria-platillo')->with('mensaje', 'Categoría agregada ✅');
    }
    public function edit(string $id) {
        $categoria = CategoriaPlatillo::findOrFail($id);
        return view('categoria-platillo.edit', compact('categoria'));
    }
    public function update(Request $request, string $id) {
        $request->validate(['nombre_categoria' => 'required|max:100']);
        CategoriaPlatillo::where('id_categoria_platillo', $id)->update($request->except(['_token','_method']));
        return redirect('categoria-platillo')->with('mensaje', 'Categoría actualizada ✅');
    }
    public function destroy(string $id) {
        CategoriaPlatillo::destroy($id);
        return redirect('categoria-platillo')->with('mensaje', 'Categoría eliminada ✅');
    }
    public function show(string $id) {}
}
