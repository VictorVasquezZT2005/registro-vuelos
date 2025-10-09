@extends('layouts.app')

@section('title', 'Lista')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Clientes</h1>
    <a href="{{ route('clientes.create') }}" class="btn btn-primary align-self-center">Nuevo cliente</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Contraseña</th> <!-- agregado -->
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->nombre }}</td>
            <td>{{ $c->correo }}</td>
            <td>{{ $c->telefono }}</td>
            <td>{{ $c->password }}</td> <!-- agregado -->
            <td>
                <a href="{{ route('clientes.show', $c) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('clientes.edit', $c) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('clientes.destroy', $c) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Eliminar cliente?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $clientes->links() }}
@endsection
