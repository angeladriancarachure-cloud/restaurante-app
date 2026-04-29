<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
Route::get('/', [DashboardController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


use App\Http\Controllers\EmpleadoController;

// Esta línea crea las 7 rutas del CRUD automáticamente
Route::resource('empleado', EmpleadoController::class);

use App\Http\Controllers\CategoriaPlatilloController;
use App\Http\Controllers\CategoriaProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\PlatilloController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ReservacionController;

Route::resource('categoria-platillo', CategoriaPlatilloController::class);
Route::resource('categoria-producto', CategoriaProductoController::class);
Route::resource('cliente', ClienteController::class);
Route::resource('compra', CompraController::class);
Route::resource('gasto', GastoController::class);
Route::resource('horario', HorarioController::class);
Route::resource('mesa', MesaController::class);
Route::resource('orden', OrdenController::class);
Route::resource('platillo', PlatilloController::class);
Route::resource('producto', ProductoController::class);
Route::resource('proveedor', ProveedorController::class);
Route::resource('reservacion', ReservacionController::class);
Route::get('orden/{id}/pagar', [App\Http\Controllers\OrdenController::class, 'pagar'])->name('orden.pagar');
Route::post('cliente/rapido', [App\Http\Controllers\ClienteController::class, 'rapido']);
Route::get('orden/{id}/cobrar', [App\Http\Controllers\OrdenController::class, 'cobrar'])->name('orden.cobrar');
Route::post('orden/{id}/confirmar-pago', [App\Http\Controllers\OrdenController::class, 'confirmarPago'])->name('orden.confirmarPago');
