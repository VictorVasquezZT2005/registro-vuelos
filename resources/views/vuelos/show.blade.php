@extends('layouts.app')

@section('title', 'Ver vuelo')

@section('content')
<h2>Vuelo {{ $vuelo->codigo }}</h2>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Origen:</strong> {{ $vuelo->origen }}</li>
    <li class="list-group-item"><strong>Destino:</strong> {{ $vuelo->destino }}</li>
    <li class="list-group-item"><strong>Salida:</strong> {{ $vuelo->fecha_salida }}</li>
    <li class="list-group-item"><strong>Llegada:</strong> {{ $vuelo->fecha_llegada }}</li>
    <li class="list-group-item"><strong>Precio:</strong> ${{ number_format($vuelo->precio, 2) }}</li>
</ul>

<a href="{{ route('vuelos.edit', $vuelo) }}" class="btn btn-warning">Editar</a>
<a href="{{ route('vuelos.index') }}" class="btn btn-secondary">Volver</a>
@endsection
