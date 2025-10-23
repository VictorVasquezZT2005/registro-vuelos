@extends('layouts.app')

@section('title', 'Reservaciones')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Reservaciones</h1>

    {{-- Admin, gestor_reservaciones y agente pueden crear --}}
    @hasanyrole('admin|gestor_reservaciones|agente')
        <a href="{{ route('reservaciones.create') }}" class="btn btn-primary align-self-center">
            <i class="fas fa-plus-circle"></i> Nueva reservación
        </a>
    @endhasanyrole
</div>

<table class="table table-striped align-middle">
    <thead class="table-dark">
        <tr>
            <th>Cliente</th>
            <th>Vuelo</th>
            <th>Fecha de reserva</th>
            <th>Asientos</th>
            <th>Método de Pago</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($reservaciones as $r)
            <tr>
                <td>{{ $r?->cliente?->nombre ?? 'Cliente no encontrado' }}</td>
                <td>
                    @if($r?->vuelo)
                        {{ $r->vuelo->codigo }} | {{ $r->vuelo->origen }} → {{ $r->vuelo->destino }}
                    @else
                        Vuelo no encontrado
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($r->fecha_reserva)->format('d/m/Y H:i') }}</td>
                <td>{{ $r->asientos }}</td>
                <td>{{ $r->metodo_pago ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('reservaciones.show', $r->id) }}" class="btn btn-sm btn-info">
                        <i class="fas fa-eye"></i> Ver
                    </a>

                    {{-- Editar disponible para admin, gestor_reservaciones y agente --}}
                    @hasanyrole('admin|gestor_reservaciones|agente')
                        <a href="{{ route('reservaciones.edit', $r->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                    @endhasanyrole

                    {{-- Eliminar solo para admin --}}
                    @role('admin')
                        <form action="{{ route('reservaciones.destroy', $r->id) }}" method="POST" style="display:inline-block"
                              onsubmit="return confirm('¿Eliminar esta reservación?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </form>
                    @endrole
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted">No hay reservaciones registradas.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {{ $reservaciones->links() }}
</div>
@endsection
