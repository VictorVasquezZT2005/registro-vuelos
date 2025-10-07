@extends('layouts.app')

@section('title', 'Crear vuelo')

@section('content')
<h2>Registrar vuelo</h2>
<form action="{{ route('vuelos.store') }}" method="POST">
    @include('vuelos._form', ['buttonText' => 'Registrar'])
</form>
@endsection
