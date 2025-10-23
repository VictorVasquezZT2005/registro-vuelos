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

        <!-- Clientes: admin o agente -->
        @hasanyrole('admin|agente')
        <div class="col-md-3">
            <div class="card text-white bg-primary h-100 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">
                            <i class="fas fa-users"></i> Clientes
                        </h5>
                        <p class="card-text fs-4">{{ \App\Models\Cliente::count() }}</p>
                    </div>
                    <div>
                        <a href="{{ route('clientes.index') }}" class="btn btn-light btn-sm">Ver</a>
                    </div>
                </div>
            </div>
        </div>
        @endhasanyrole

        <!-- Vuelos: admin, gestor_vuelos o agente -->
        @hasanyrole('admin|gestor_vuelos|agente')
        <div class="col-md-3">
            <div class="card text-white bg-success h-100 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">
                            <i class="fas fa-plane"></i> Vuelos
                        </h5>
                        <p class="card-text fs-4">{{ \App\Models\Vuelo::count() }}</p>
                    </div>
                    <div>
                        <a href="{{ route('vuelos.index') }}" class="btn btn-light btn-sm">Ver</a>
                    </div>
                </div>
            </div>
        </div>
        @endhasanyrole

        <!-- Reservaciones: admin, gestor_reservaciones o agente -->
        @hasanyrole('admin|gestor_reservaciones|agente')
        <div class="col-md-3">
            <div class="card text-white bg-warning h-100 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">
                            <i class="fas fa-ticket-alt"></i> Reservaciones
                        </h5>
                        <p class="card-text fs-4">{{ \App\Models\Reservacion::count() }}</p>
                    </div>
                    <div>
                        <a href="{{ route('reservaciones.index') }}" class="btn btn-light btn-sm">Ver</a>
                    </div>
                </div>
            </div>
        </div>
        @endhasanyrole

        <!-- Usuarios: solo admin -->
        @role('admin')
        <div class="col-md-3">
            <div class="card text-white bg-info h-100 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">
                            <i class="fas fa-user-cog"></i> Usuarios
                        </h5>
                        <p class="card-text fs-4">{{ \App\Models\User::count() }}</p>
                    </div>
                    <div>
                        <a href="{{ route('users.index') }}" class="btn btn-light btn-sm">Ver</a>
                    </div>
                </div>
            </div>
        </div>
        @endrole
    </div>

    <!-- Sección de acciones rápidas -->
    <div class="mt-5">
        <h4>Acciones rápidas</h4>
        <div class="d-flex gap-3 flex-wrap">

            <!-- Admin -->
            @role('admin')
            <a href="{{ route('clientes.create') }}" class="btn btn-primary">
                <i class="fas fa-user-plus"></i> Nuevo Cliente
            </a>
            <a href="{{ route('reservaciones.create') }}" class="btn btn-warning">
                <i class="fas fa-ticket-alt"></i> Nueva Reservación
            </a>
            <a href="{{ route('users.create') }}" class="btn btn-info">
                <i class="fas fa-user-plus"></i> Nuevo Usuario
            </a>
            <a href="{{ route('vuelos.create') }}" class="btn btn-success">
                <i class="fas fa-plane-departure"></i> Nuevo Vuelo
            </a>
            @endrole

            <!-- Gestor de vuelos -->
            @role('gestor_vuelos')
            <a href="{{ route('vuelos.create') }}" class="btn btn-success">
                <i class="fas fa-plane-departure"></i> Nuevo Vuelo
            </a>
            @endrole

            <!-- Gestor de reservaciones -->
            @role('gestor_reservaciones')
            <a href="{{ route('reservaciones.create') }}" class="btn btn-warning">
                <i class="fas fa-ticket-alt"></i> Nueva Reservación
            </a>
            @endrole

            <!-- Agente -->
            @role('agente')
            <a href="{{ route('clientes.create') }}" class="btn btn-primary">
                <i class="fas fa-user-plus"></i> Registrar Cliente
            </a>
            <a href="{{ route('reservaciones.create') }}" class="btn btn-warning">
                <i class="fas fa-ticket-alt"></i> Crear Reservación
            </a>
            @endrole

        </div>
    </div>

</div>
@endsection
