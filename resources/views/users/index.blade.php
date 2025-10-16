@extends('layouts.app')

@section('title', 'Gestionar Usuarios')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Usuarios</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary align-self-center">Nuevo Usuario</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                {{ $user->roles->first()?->name ?? $user->rol ?? 'N/A' }}
            </td>
            <td>
                <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Seguro que deseas eliminar a este usuario?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" {{ $user->id == auth()->id() ? 'disabled' : '' }}>Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links() }}
@endsection