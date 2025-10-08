@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container py-4">

    <!-- Bienvenida -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Bienvenido, {{ auth()->user()->name }}!</h1>
        <!-- Botón de cerrar sesión -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </button>
        </form>
    </div>

    <!-- Tarjetas de conteo -->
    <div class="row g-4">
        <!-- Clientes -->
        <div class="col-md-4">
            <div class="card text-white bg-primary h-100 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title"><i class="fas fa-users"></i> Clientes</h5>
                        <p class="card-text fs-4">{{ \App\Models\Cliente::count() }}</p>
                    </div>
                    <div>
                        <a href="{{ route('clientes.index') }}" class="btn btn-light btn-sm">Ver</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vuelos -->
        <div class="col-md-4">
            <div class="card text-white bg-success h-100 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title"><i class="fas fa-plane"></i> Vuelos</h5>
                        <p class="card-text fs-4">{{ \App\Models\Vuelo::count() }}</p>
                    </div>
                    <div>
                        <a href="{{ route('vuelos.index') }}" class="btn btn-light btn-sm">Ver</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reservaciones -->
        <div class="col-md-4">
            <div class="card text-white bg-warning h-100 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title"><i class="fas fa-ticket-alt"></i> Reservaciones</h5>
                        <p class="card-text fs-4">{{ \App\Models\Reservacion::count() }}</p>
                    </div>
                    <div>
                        <a href="{{ route('reservaciones.index') }}" class="btn btn-light btn-sm">Ver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de acciones rápidas -->
    <div class="mt-5">
        <h4>Acciones rápidas</h4>
        <div class="d-flex gap-3 flex-wrap">
            <a href="{{ route('clientes.create') }}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Nuevo Cliente</a>
            <a href="{{ route('vuelos.create') }}" class="btn btn-success"><i class="fas fa-plane-departure"></i> Nuevo Vuelo</a>
            <a href="{{ route('reservaciones.create') }}" class="btn btn-warning"><i class="fas fa-ticket-alt"></i> Nueva Reservación</a>
        </div>
    </div>

</div>
@endsection
