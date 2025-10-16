@extends('layouts.app')

@section('title', 'Vuelos')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Vuelos</h1>
    <a href="{{ route('vuelos.create') }}" class="btn btn-primary align-self-center">Nuevo vuelo</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Código</th>
            <th>Origen</th>
            <th>Destino</th>
            <th>Salida</th>
            <th>Llegada</th>
            <th>Precio</th>
            <th>Disponibles</th> <th>Ocupados</th>   <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vuelos as $v)
        <tr>
            <td>{{ $v->codigo }}</td>
            <td>{{ $v->origen }}</td>
            <td>{{ $v->destino }}</td>
            <td>{{ $v->fecha_salida }}</td>
            <td>{{ $v->fecha_llegada }}</td>
            <td>${{ number_format($v->precio, 2) }}</td>
            <td>{{ $v->asientos_disponibles }}</td> <td>{{ $v->asientos_ocupados }}</td>   <td>
                <a href="{{ route('vuelos.show', $v) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('vuelos.edit', $v) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('vuelos.destroy', $v) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Eliminar vuelo?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $vuelos->links() }}
@endsection