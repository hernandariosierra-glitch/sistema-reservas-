@extends('layouts.app')

@section('content')

<div class="card card-custom p-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Editar Vehículo #{{ $vehiculo->id }}</h3>
        <a href="{{ route('vehiculos.index') }}" class="btn btn-outline-dark rounded-3">
            Volver
        </a>
    </div>

    <form action="{{ route('vehiculos.update', $vehiculo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-4">

            <div class="col-md-4">
                <label class="form-label fw-semibold">Marca</label>
                <input type="text" name="marca"
                       class="form-control rounded-3 @error('marca') is-invalid @enderror"
                       value="{{ old('marca', $vehiculo->marca) }}">
                @error('marca')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Modelo</label>
                <input type="text" name="modelo"
                       class="form-control rounded-3 @error('modelo') is-invalid @enderror"
                       value="{{ old('modelo', $vehiculo->modelo) }}">
                @error('modelo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Matrícula</label>
                <input type="text" name="matricula"
                       class="form-control rounded-3 @error('matricula') is-invalid @enderror"
                       value="{{ old('matricula', $vehiculo->matricula) }}">
                @error('matricula')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Año</label>
                <input type="number" name="anio"
                       class="form-control rounded-3 @error('anio') is-invalid @enderror"
                       value="{{ old('anio', $vehiculo->anio) }}">
                @error('anio')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="mt-5">
            <button type="submit" class="btn btn-dark px-4 rounded-3">
                Actualizar Vehículo
            </button>
        </div>

    </form>
</div>

@endsection