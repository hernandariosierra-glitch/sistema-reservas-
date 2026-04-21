@extends('layouts.app')

@section('content')

<div class="card card-custom p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Listado de Reservas</h3>
        <a href="{{ route('reservas.create') }}" class="btn btn-dark rounded-3">
            Nueva Reserva
        </a>
    </div>

    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Vehículo</th>
                <th>Chofer</th>
                <th>Desde</th>
                <th>Hasta</th>
                <th>Estado</th>
                <th width="220">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->cliente->nombre }} {{ $reserva->cliente->apellido }}</td>
                    <td>{{ $reserva->vehiculo->marca }} {{ $reserva->vehiculo->modelo }}</td>
                    <td>{{ $reserva->chofer?->nombre ?? 'Sin chofer' }}</td>
                    <td>{{ $reserva->fecha_inicio }}</td>
                    <td>{{ $reserva->fecha_fin }}</td>

                    <!-- Estado visual -->
                    <td>
                        @if($reserva->estado == 'confirmada')
                            <span class="badge badge-confirmada">CONFIRMADA</span>
                        @elseif($reserva->estado == 'pendiente')
                            <span class="badge badge-pendiente">PENDIENTE</span>
                        @else
                            <span class="badge badge-cancelada">CANCELADA</span>
                        @endif
                    </td>

                    <!-- Acciones -->
                    <td>
                        <a href="{{ route('reservas.edit', $reserva->id) }}" 
                           class="btn btn-sm btn-outline-primary rounded-3">
                            Editar
                        </a>

                        <form action="{{ route('reservas.destroy', $reserva->id) }}" 
                              method="POST" 
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-sm btn-outline-danger rounded-3">
                                Eliminar
                            </button>
                        </form>

                        @if($reserva->estado == 'pendiente')
                            <form action="{{ route('reservas.confirmar', $reserva->id) }}" 
                                  method="POST" 
                                  class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-success rounded-3">
                                    Confirmar
                                </button>
                            </form>

                            <form action="{{ route('reservas.cancelar', $reserva->id) }}" 
                                  method="POST" 
                                  class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-secondary rounded-3">
                                    Cancelar
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">
                        No hay reservas registradas.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection