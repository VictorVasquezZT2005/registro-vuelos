@extends('layouts.app')

@section('title', 'Editar reservación')

@section('content')
<h2>Editar reservación</h2>
<form action="{{ route('reservaciones.update', $reservacion) }}" method="POST">
    @method('PUT')
    @include('reservaciones._form', ['buttonText' => 'Actualizar'])
</form>
@endsection
