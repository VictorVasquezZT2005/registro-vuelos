@extends('layouts.app')

@section('title', 'Ver reservación')

@section('content')
<h2>Reservación de {{ $reservacion->cliente?->nombre ?? 'Cliente no encontrado' }}</h2>

<ul class="list-group mb-3">
    <li class="list-group-item">
        <strong>Cliente:</strong> {{ $reservacion->cliente?->nombre ?? 'Cliente no encontrado' }}
    </li>
    <li class="list-group-item">
        <strong>Vuelo:</strong>
        @if($reservacion->vuelo)
            {{ $reservacion->vuelo->codigo }} | {{ $reservacion->vuelo->origen }} → {{ $reservacion->vuelo->destino }}
        @else
            Vuelo no encontrado
        @endif
    </li>
    <li class="list-group-item">
        <strong>Fecha de reserva:</strong> {{ $reservacion->fecha_reserva ? $reservacion->fecha_reserva->format('d/m/Y H:i') : 'No disponible' }}
    </li>
    <li class="list-group-item">
        <strong>Cantidad de Asientos:</strong> {{ $reservacion->asientos ?? 'No disponible' }}
    </li>

    <li class="list-group-item">
        <strong>Números de Asiento:</strong> 
        {{ (is_array($reservacion->numeros_asiento) && !empty($reservacion->numeros_asiento)) ? implode(', ', $reservacion->numeros_asiento) : 'No especificados' }}
    </li>
    <li class="list-group-item">
        <strong>Método de Pago:</strong> {{ $reservacion->metodo_pago ?? 'No especificado' }}
    </li>
    @if($reservacion->metodo_pago == 'paypal')
    <li class="list-group-item">
        <strong>Email PayPal:</strong> {{ $reservacion->paypal_email ?? 'No especificado' }}
    </li>
    @endif
    <li class="list-group-item">
        <small>Creado: {{ $reservacion->created_at ? $reservacion->created_at->format('d/m/Y H:i') : 'No disponible' }}</small>
    </li>
</ul>

<a href="{{ route('reservaciones.edit', $reservacion) }}" class="btn btn-warning">Editar</a>
<a href="{{ route('reservaciones.index') }}" class="btn btn-secondary">Volver</a>
@endsection