@extends('layouts.app')

@section('title', 'Crear')

@section('content')
<h2>Crear cliente</h2>
<form action="{{ route('clientes.store') }}" method="POST">
    @include('clientes._form', ['buttonText' => 'Crear'])
</form>
@endsection
