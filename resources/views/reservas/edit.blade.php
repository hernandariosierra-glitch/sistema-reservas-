@extends('layouts.app')

@section('content')

<div class="card card-custom p-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Editar Reserva #{{ $reserva->id }}</h3>
        <a href="{{ route('reservas.index') }}" class="btn btn-outline-dark rounded-3">
            Volver
        </a>
    </div>

    <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-4">

            <!-- Cliente -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">Cliente</label>
                <select name="cliente_id" class="form-select rounded-3 @error('cliente_id') is-invalid @enderror">
                    <option value="">Seleccione un cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}"
                            {{ old('cliente_id', $reserva->cliente_id) == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nombre }} {{ $cliente->apellido }}
                        </option>
                    @endforeach
                </select>
                @error('cliente_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Vehículo -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">Vehículo</label>
                <select name="vehiculo_id" class="form-select rounded-3 @error('vehiculo_id') is-invalid @enderror">
                    <option value="">Seleccione un vehículo</option>
                    @foreach($vehiculos as $vehiculo)
                        <option value="{{ $vehiculo->id }}"
                            {{ old('vehiculo_id', $reserva->vehiculo_id) == $vehiculo->id ? 'selected' : '' }}>
                            {{ $vehiculo->marca }} {{ $vehiculo->modelo }}
                        </option>
                    @endforeach
                </select>
                @error('vehiculo_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Chofer -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">Chofer (opcional)</label>
                <select name="chofer_id" class="form-select rounded-3">
                    <option value="">Sin chofer</option>
                    @foreach($choferes as $chofer)
                        <option value="{{ $chofer->id }}"
                            {{ old('chofer_id', $reserva->chofer_id) == $chofer->id ? 'selected' : '' }}>
                            {{ $chofer->nombre }} {{ $chofer->apellido }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Fecha inicio -->
            <div class="col-md-3">
                <label class="form-label fw-semibold">Fecha inicio</label>
                <input type="date"
                       name="fecha_inicio"
                       class="form-control rounded-3 @error('fecha_inicio') is-invalid @enderror"
                       value="{{ old('fecha_inicio', $reserva->fecha_inicio) }}">
                @error('fecha_inicio')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Fecha fin -->
            <div class="col-md-3">
                <label class="form-label fw-semibold">Fecha fin</label>
                <input type="date"
                       name="fecha_fin"
                       class="form-control rounded-3 @error('fecha_fin') is-invalid @enderror"
                       value="{{ old('fecha_fin', $reserva->fecha_fin) }}">
                @error('fecha_fin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="mt-5">
            <button type="submit" class="btn btn-dark px-4 rounded-3">
                Actualizar Reserva
            </button>
        </div>

    </form>
</div>

@endsection