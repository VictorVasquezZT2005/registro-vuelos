@extends('layouts.app')

@section('title', 'Reservaciones')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Reservaciones</h1>
    <a href="{{ route('reservaciones.create') }}" class="btn btn-primary">Nueva reservación</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Vuelo</th>
            <th>Fecha de reserva</th>
            <th>Asientos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservaciones as $r)
        <tr>
            <td>{{ $r->cliente->nombre }}</td>
            <td>{{ $r->vuelo->codigo }} | {{ $r->vuelo->origen }} → {{ $r->vuelo->destino }}</td>
            <td>{{ $r->fecha_reserva }}</td>
            <td>{{ $r->asientos }}</td>
            <td>
                <a href="{{ route('reservaciones.show', $r) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('reservaciones.edit', $r) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('reservaciones.destroy', $r) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Eliminar reservación?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $reservaciones->links() }}
@endsection
