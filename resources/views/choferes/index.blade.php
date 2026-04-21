@extends('layouts.app')

@section('content')

<div class="card card-custom p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Listado de Choferes</h3>
        <a href="{{ route('choferes.create') }}" class="btn btn-dark rounded-3">
            Nuevo Chofer
        </a>
    </div>

    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Documento</th>
                <th>Teléfono</th>
                <th width="160">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($choferes as $chofer)
                <tr>
                    <td>{{ $chofer->id }}</td>
                    <td>{{ $chofer->nombre }}</td>
                    <td>{{ $chofer->apellido }}</td>
                    <td>{{ $chofer->documento }}</td>
                    <td>{{ $chofer->telefono }}</td>
                    <td>
                        <a href="{{ route('choferes.edit', $chofer->id) }}"
                           class="btn btn-sm btn-outline-primary rounded-3">
                            Editar
                        </a>

                        <form action="{{ route('choferes.destroy', $chofer->id) }}"
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
                        No hay choferes registrados.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection