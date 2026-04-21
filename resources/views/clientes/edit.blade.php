@extends('layouts.app')

@section('content')

<div class="card card-custom p-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Editar Cliente #{{ $cliente->id }}</h3>
        <a href="{{ route('clientes.index') }}" class="btn btn-outline-dark rounded-3">
            Volver
        </a>
    </div>

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-4">

            <div class="col-md-6">
                <label class="form-label fw-semibold">Nombre</label>
                <input type="text" name="nombre"
                       class="form-control rounded-3 @error('nombre') is-invalid @enderror"
                       value="{{ old('nombre', $cliente->nombre) }}">
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Apellido</label>
                <input type="text" name="apellido"
                       class="form-control rounded-3 @error('apellido') is-invalid @enderror"
                       value="{{ old('apellido', $cliente->apellido) }}">
                @error('apellido')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Documento</label>
                <input type="text" name="documento"
                       class="form-control rounded-3 @error('documento') is-invalid @enderror"
                       value="{{ old('documento', $cliente->documento) }}">
                @error('documento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email"
                       class="form-control rounded-3 @error('email') is-invalid @enderror"
                       value="{{ old('email', $cliente->email) }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Teléfono</label>
                <input type="text" name="telefono"
                       class="form-control rounded-3 @error('telefono') is-invalid @enderror"
                       value="{{ old('telefono', $cliente->telefono) }}">
                @error('telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="mt-5">
            <button type="submit" class="btn btn-dark px-4 rounded-3">
                Actualizar Cliente
            </button>
        </div>

    </form>
</div>

@endsection