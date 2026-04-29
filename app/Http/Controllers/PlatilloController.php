<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Platillo;
use App\Models\CategoriaPlatillo;

class PlatilloController extends Controller {
    public function index() {
        $datos['platillos'] = Platillo::paginate(10);
        return view('platillo.index', $datos);
    }
    public function create() {
        $categorias = CategoriaPlatillo::all();
        return view('platillo.create', compact('categorias'));
    }
    public function store(Request $request) {
        $request->validate(['nombre_platillo' => 'required|max:100', 'precio' => 'required|numeric']);
        Platillo::insert($request->except('_token'));
        return redirect('platillo')->with('mensaje', 'Platillo agregado ✅');
    }
    public function edit(string $id) {
        $platillo = Platillo::findOrFail($id);
        $categorias = CategoriaPlatillo::all();
        return view('platillo.edit', compact('platillo', 'categorias'));
    }
    public function update(Request $request, string $id) {
        $request->validate(['nombre_platillo' => 'required|max:100', 'precio' => 'required|numeric']);
        Platillo::where('id_platillo', $id)->update($request->except(['_token','_method']));
        return redirect('platillo')->with('mensaje', 'Platillo actualizado ✅');
    }
    public function destroy(string $id) {
        Platillo::destroy($id);
        return redirect('platillo')->with('mensaje', 'Platillo eliminado ✅');
    }
    public function show(string $id) {}
}
