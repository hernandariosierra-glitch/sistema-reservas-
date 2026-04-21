@extends('layouts.app')

@section('content')

<div class="card card-custom p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Listado de Vehículos</h3>
        <a href="{{ route('vehiculos.create') }}" class="btn btn-dark rounded-3">
            Nuevo Vehículo
        </a>
    </div>

    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Matrícula</th>
                <th>Año</th>
                <th width="160">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->id }}</td>
                    <td>{{ $vehiculo->marca }}</td>
                    <td>{{ $vehiculo->modelo }}</td>
                    <td>{{ $vehiculo->matricula }}</td>
                    <td>{{ $vehiculo->anio }}</td>
                    <td>
                        <a href="{{ route('vehiculos.edit', $vehiculo->id) }}"
                           class="btn btn-sm btn-outline-primary rounded-3">
                            Editar
                        </a>

                        <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger rounded-3">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        No hay vehículos registrados.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection