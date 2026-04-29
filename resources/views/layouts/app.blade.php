<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Restaurante') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">🍽️ Restaurante</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('empleado') }}">Empleados</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('cliente') }}">Clientes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('mesa') }}">Mesas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('platillo') }}">Platillos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('producto') }}">Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('proveedor') }}">Proveedores</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('orden') }}">Órdenes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('reservacion') }}">Reservaciones</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('gasto') }}">Gastos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('horario') }}">Horarios</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('compra') }}">Compras</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-4">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
