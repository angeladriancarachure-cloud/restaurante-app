<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Empleado;

class HorarioController extends Controller {
    public function index() {
        $datos['horarios'] = Horario::paginate(10);
        return view('horario.index', $datos);
    }
    public function create() {
        $empleados = Empleado::all();
        return view('horario.create', compact('empleados'));
    }
    public function store(Request $request) {
        $request->validate(['id_empleado' => 'required', 'dia_semana' => 'required', 'hora_entrada' => 'required', 'hora_salida' => 'required']);
        Horario::insert($request->except('_token'));
        return redirect('horario')->with('mensaje', 'Horario agregado ✅');
    }
    public function edit(string $id) {
        $horario = Horario::findOrFail($id);
        $empleados = Empleado::all();
        return view('horario.edit', compact('horario', 'empleados'));
    }
    public function update(Request $request, string $id) {
        $request->validate(['id_empleado' => 'required', 'dia_semana' => 'required', 'hora_entrada' => 'required', 'hora_salida' => 'required']);
        Horario::where('id_horario', $id)->update($request->except(['_token','_method']));
        return redirect('horario')->with('mensaje', 'Horario actualizado ✅');
    }
    public function destroy(string $id) {
        Horario::destroy($id);
        return redirect('horario')->with('mensaje', 'Horario eliminado ✅');
    }
    public function show(string $id) {}
}
