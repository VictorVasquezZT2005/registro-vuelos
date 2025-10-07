@extends('layouts.app')

@section('title', 'Editar')

@section('content')
<h2>Editar cliente</h2>
<form action="{{ route('clientes.update', $cliente) }}" method="POST">
    @method('PUT')
    @include('clientes._form', ['buttonText' => 'Actualizar'])
</form>
@endsection
