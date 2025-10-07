@extends('layouts.app')

@section('title', 'Crear reservación')

@section('content')
<h2>Registrar reservación</h2>
<form action="{{ route('reservaciones.store') }}" method="POST">
    @include('reservaciones._form', ['buttonText' => 'Registrar'])
</form>
@endsection
