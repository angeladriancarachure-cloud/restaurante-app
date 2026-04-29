<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CategoriaProducto;

class CategoriaProductoController extends Controller {
    public function index() {
        $datos['categorias'] = CategoriaProducto::paginate(10);
        return view('categoria-producto.index', $datos);
    }
    public function create() { return view('categoria-producto.create'); }
    public function store(Request $request) {
        $request->validate(['nombre_categoria' => 'required|max:100']);
        CategoriaProducto::insert($request->except('_token'));
        return redirect('categoria-producto')->with('mensaje', 'Categoría agregada ✅');
    }
    public function edit(string $id) {
        $categoria = CategoriaProducto::findOrFail($id);
        return view('categoria-producto.edit', compact('categoria'));
    }
    public function update(Request $request, string $id) {
        $request->validate(['nombre_categoria' => 'required|max:100']);
        CategoriaProducto::where('id_categoria', $id)->update($request->except(['_token','_method']));
        return redirect('categoria-producto')->with('mensaje', 'Categoría actualizada ✅');
    }
    public function destroy(string $id) {
        CategoriaProducto::destroy($id);
        return redirect('categoria-producto')->with('mensaje', 'Categoría eliminada ✅');
    }
    public function show(string $id) {}
}
