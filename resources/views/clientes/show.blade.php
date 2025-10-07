@extends('layouts.app')

@section('title', 'Ver')

@section('content')
<h2>Cliente #{{ $cliente->id }}</h2>

<ul class="list-group">
    <li class="list-group-item"><strong>Nombre:</strong> {{ $cliente->nombre }}</li>
    <li class="list-group-item"><strong>Correo:</strong> {{ $cliente->correo }}</li>
    <li class="list-group-item"><strong>Teléfono:</strong> {{ $cliente->telefono }}</li>
    <li class="list-group-item"><small>Creado: {{ $cliente->created_at }}</small></li>
</ul>

<a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning mt-3">Editar</a>
<a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
