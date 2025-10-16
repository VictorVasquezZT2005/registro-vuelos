@extends('layouts.app')

@section('title', 'Ver Usuario')

@section('content')
<h2>Usuario: {{ $user->name }}</h2>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>ID:</strong> {{ $user->id }}</li>
    <li class="list-group-item"><strong>Nombre:</strong> {{ $user->name }}</li>
    <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
    <li class="list-group-item">
        <strong>Rol:</strong> {{ $user->roles->first()?->name ?? $user->rol ?? 'N/A' }}
    </li>
    <li class="list-group-item"><strong>Miembro desde:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</li>
</ul>

<a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Editar</a>
<a href="{{ route('users.index') }}" class="btn btn-secondary">Volver al listado</a>
@endsection