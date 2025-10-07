@extends('layouts.app')

@section('title', 'Editar vuelo')

@section('content')
<h2>Editar vuelo</h2>
<form action="{{ route('vuelos.update', $vuelo) }}" method="POST">
    @method('PUT')
    @include('vuelos._form', ['buttonText' => 'Actualizar'])
</form>
@endsection
