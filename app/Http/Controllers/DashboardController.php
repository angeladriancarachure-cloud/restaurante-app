<?php
namespace App\Http\Controllers;
use App\Models\Empleado;
use App\Models\Cliente;
use App\Models\Platillo;
use App\Models\Mesa;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Orden;
use App\Models\Reservacion;

class DashboardController extends Controller {
    public function index() {
        return view('dashboard', [
            'empleados'    => Empleado::count(),
            'clientes'     => Cliente::count(),
            'platillos'    => Platillo::count(),
            'mesas'        => Mesa::count(),
            'productos'    => Producto::count(),
            'proveedores'  => Proveedor::count(),
            'ordenes'      => Orden::count(),
            'reservaciones'=> Reservacion::count(),
        ]);
    }
}
