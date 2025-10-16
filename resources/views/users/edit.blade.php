@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<h2>Editar Usuario: {{ $user->name }}</h2>

<form action="{{ route('users.update', $user) }}" method="POST">
    @method('PUT')
    @include('users._form', ['buttonText' => 'Actualizar Usuario'])
</form>
@endsection