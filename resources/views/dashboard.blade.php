@extends('layouts.app')

@section('content')

<h2 class="mb-4">Panel de Control</h2>

<div class="row mb-4">

    <div class="col-md-3">
        <div class="card p-3 shadow-sm text-center">
            <h5>Clientes</h5>
            <h2>{{ $totalClientes }}</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 shadow-sm text-center">
            <h5>Vehículos</h5>
            <h2>{{ $totalVehiculos }}</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 shadow-sm text-center">
            <h5>Choferes</h5>
            <h2>{{ $totalChoferes }}</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 shadow-sm text-center">
            <h5>Reservas Activas</h5>
            <h2>{{ $reservasActivas }}</h2>
        </div>
    </div>

</div>

<div class="row mb-4">

    <div class="col-md-4">
        <div class="card p-3 shadow-sm text-center">
            <h5>Pendientes</h5>
            <h2 class="text-warning">{{ $reservasPendientes }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 shadow-sm text-center">
            <h5>Confirmadas</h5>
            <h2 class="text-success">{{ $reservasConfirmadas }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 shadow-sm text-center">
            <h5>Canceladas</h5>
            <h2 class="text-danger">{{ $reservasCanceladas }}</h2>
        </div>
    </div>

</div>

<div class="card p-4 shadow-sm">
    <h4 class="mb-3">Últimas Reservas</h4>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Vehículo</th>
                <th>Desde</th>
                <th>Hasta</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ultimasReservas as $reserva)
            <tr>
                <td>{{ $reserva->id }}</td>
                <td>{{ $reserva->cliente->nombre }} {{ $reserva->cliente->apellido }}</td>
                <td>{{ $reserva->vehiculo->marca }} {{ $reserva->vehiculo->modelo }}</td>
                <td>{{ \Carbon\Carbon::parse($reserva->fecha_inicio)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($reserva->fecha_fin)->format('d/m/Y') }}</td>
                <td>{{ ucfirst($reserva->estado) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection