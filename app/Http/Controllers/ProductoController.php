<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\CategoriaProducto;
use App\Models\Proveedor;

class ProductoController extends Controller {
    public function index() {
        $datos['productos'] = Producto::paginate(10);
        return view('producto.index', $datos);
    }
    public function create() {
        $categorias = CategoriaProducto::all();
        $proveedores = Proveedor::all();
        return view('producto.create', compact('categorias', 'proveedores'));
    }
    public function store(Request $request) {
        $request->validate(['nombre_producto' => 'required|max:100', 'unidad_medida' => 'required']);
        Producto::insert($request->except('_token'));
        return redirect('producto')->with('mensaje', 'Producto agregado ✅');
    }
    public function edit(string $id) {
        $producto = Producto::findOrFail($id);
        $categorias = CategoriaProducto::all();
        $proveedores = Proveedor::all();
        return view('producto.edit', compact('producto', 'categorias', 'proveedores'));
    }
    public function update(Request $request, string $id) {
        $request->validate(['nombre_producto' => 'required|max:100', 'unidad_medida' => 'required']);
        Producto::where('id_producto', $id)->update($request->except(['_token','_method']));
        return redirect('producto')->with('mensaje', 'Producto actualizado ✅');
    }
    public function destroy(string $id) {
        Producto::destroy($id);
        return redirect('producto')->with('mensaje', 'Producto eliminado ✅');
    }
    public function show(string $id) {}
}
