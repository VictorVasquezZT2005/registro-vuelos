@extends('layouts.app')

@section('title', 'Ver reservación')

@section('content')
<h2>Reservación de {{ $reservacion->cliente->nombre }}</h2>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Cliente:</strong> {{ $reservacion->cliente->nombre }}</li>
    <li class="list-group-item"><strong>Vuelo:</strong> {{ $reservacion->vuelo->codigo }} | {{ $reservacion->vuelo->origen }} → {{ $reservacion->vuelo->destino }}</li>
    <li class="list-group-item"><strong>Fecha de reserva:</strong> {{ $reservacion->fecha_reserva }}</li>
    <li class="list-group-item"><strong>Asientos:</strong> {{ $reservacion->asientos }}</li>
    <li class="list-group-item"><small>Creado: {{ $reservacion->created_at }}</small></li>
</ul>

<a href="{{ route('reservaciones.edit', $reservacion) }}" class="btn btn-warning">Editar</a>
<a href="{{ route('reservaciones.index') }}" class="btn btn-secondary">Volver</a>
@endsection
