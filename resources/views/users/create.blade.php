@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
<h2>Crear Nuevo Usuario</h2>

<form action="{{ route('users.store') }}" method="POST">
    @include('users._form', ['buttonText' => 'Crear Usuario'])
</form>
@endsection