@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="mb-4">🍽️ Dashboard - Restaurante</h2>
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body text-center">
                    <h1>{{ $empleados }}</h1>
                    <p class="mb-0">Empleados</p>
                </div>
                <div class="card-footer text-center"><a href="{{ url('empleado') }}" class="text-white">Ver todos</a></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body text-center">
                    <h1>{{ $clientes }}</h1>
                    <p class="mb-0">Clientes</p>
                </div>
                <div class="card-footer text-center"><a href="{{ url('cliente') }}" class="text-white">Ver todos</a></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning">
                <div class="card-body text-center">
                    <h1>{{ $platillos }}</h1>
                    <p class="mb-0">Platillos</p>
                </div>
                <div class="card-footer text-center"><a href="{{ url('platillo') }}" class="text-white">Ver todos</a></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-danger">
                <div class="card-body text-center">
                    <h1>{{ $mesas }}</h1>
                    <p class="mb-0">Mesas</p>
                </div>
                <div class="card-footer text-center"><a href="{{ url('mesa') }}" class="text-white">Ver todos</a></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-info">
                <div class="card-body text-center">
                    <h1>{{ $productos }}</h1>
                    <p class="mb-0">Productos</p>
                </div>
                <div class="card-footer text-center"><a href="{{ url('producto') }}" class="text-white">Ver todos</a></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-secondary">
                <div class="card-body text-center">
                    <h1>{{ $proveedores }}</h1>
                    <p class="mb-0">Proveedores</p>
                </div>
                <div class="card-footer text-center"><a href="{{ url('proveedor') }}" class="text-white">Ver todos</a></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-dark">
                <div class="card-body text-center">
                    <h1>{{ $ordenes }}</h1>
                    <p class="mb-0">Órdenes</p>
                </div>
                <div class="card-footer text-center"><a href="{{ url('orden') }}" class="text-white">Ver todos</a></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white" style="background-color:#6f42c1">
                <div class="card-body text-center">
                    <h1>{{ $reservaciones }}</h1>
                    <p class="mb-0">Reservaciones</p>
                </div>
                <div class="card-footer text-center"><a href="{{ url('reservacion') }}" class="text-white">Ver todos</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
