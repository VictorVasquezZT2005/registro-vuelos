@extends('public.layouts.main')

@section('title', 'Inicio - Mi Aerolínea')

@section('content')
<div class="text-center">
    <h1>Bienvenido a Mi Aerolínea</h1>
    <p>Viaja seguro y cómodo a tus destinos favoritos.</p>
    <a href="{{ route('public.vuelos') }}" class="btn btn-primary btn-lg">Buscar vuelos</a>
</div>
@endsection
