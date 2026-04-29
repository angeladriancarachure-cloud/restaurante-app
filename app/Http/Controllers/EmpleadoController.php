<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Rol;

class EmpleadoController extends Controller {
    public function index() {
        $datos['empleados'] = Empleado::paginate(5);
        return view('empleados.index', $datos);
    }
    public function create() {
        $roles = Rol::all();
        return view('empleados.create', compact('roles'));
    }
    public function store(Request $request) {
        $request->validate([
            'nombre'   => 'required|max:100',
            'apellido' => 'required|max:100',
            'email'    => 'required|email|unique:empleados,email',
            'id_rol'   => 'required',
            'salario'  => 'required|numeric',
            'foto'     => 'nullable|image|max:2048',
        ]);
        $datos = $request->except(['_token','foto']);
        if ($request->hasFile('foto')) {
            $archivo = $request->file('foto');
            $nombre = time().'_'.$archivo->getClientOriginalName();
            $archivo->move(public_path('fotos'), $nombre);
            $datos['foto'] = $nombre;
        }
        Empleado::insert($datos);
        return redirect('empleado')->with('mensaje', 'Empleado agregado ✅');
    }
    public function edit(string $id) {
        $empleado = Empleado::findOrFail($id);
        $roles = Rol::all();
        return view('empleados.edit', compact('empleado','roles'));
    }
    public function update(Request $request, string $id) {
        $request->validate([
            'nombre'   => 'required|max:100',
            'apellido' => 'required|max:100',
            'email'    => 'required|email|unique:empleados,email,'.$id.',id_empleado',
            'id_rol'   => 'required',
            'salario'  => 'required|numeric',
            'foto'     => 'nullable|image|max:2048',
        ]);
        $datos = $request->except(['_token','_method','foto']);
        if ($request->hasFile('foto')) {
            $archivo = $request->file('foto');
            $nombre = time().'_'.$archivo->getClientOriginalName();
            $archivo->move(public_path('fotos'), $nombre);
            $datos['foto'] = $nombre;
        }
        Empleado::where('id_empleado', $id)->update($datos);
        return redirect('empleado')->with('mensaje', 'Empleado modificado ✅');
    }
    public function destroy(string $id) {
        Empleado::destroy($id);
        return redirect('empleado')->with('mensaje', 'Empleado eliminado ✅');
    }
    public function show(string $id) {}
}
