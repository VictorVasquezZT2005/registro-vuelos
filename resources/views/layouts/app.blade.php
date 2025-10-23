<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Sistema de Vuelos</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        html, body { height: 100%; }
        body { display: flex; flex-direction: column; background-color: #f4f6f9; }
        .navbar-brand { font-weight: 600; }
        main { flex: 1 0 auto; }
        footer { flex-shrink: 0; padding: 15px 0; text-align: center; background-color: #343a40; color: #fff; }
        .alert { margin-top: 15px; }
        .btn-link-nav { color: rgba(255,255,255,.55); text-decoration: none; padding: 0.5rem 1rem; background: none; border: none; }
        .btn-link-nav:hover { color: rgba(255,255,255,.75); }

        /* --- Paginación --- */
        .pagination { justify-content: center; margin-top: 20px; }
        .pagination .page-link { color: #343a40; }
        .pagination .page-item.active .page-link { background-color: #007bff; border-color: #007bff; color: #fff; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <i class="fas fa-plane-departure"></i> Sistema de Vuelos
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <!-- ADMIN -->
                    @role('admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('clientes.index') }}"><i class="fas fa-users"></i> Clientes</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('vuelos.index') }}"><i class="fas fa-plane"></i> Vuelos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('reservaciones.index') }}"><i class="fas fa-ticket-alt"></i> Reservaciones</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user-cog"></i> Usuarios</a></li>
                    @endrole

                    <!-- GESTOR DE VUELOS -->
                    @role('gestor_vuelos')
                        <li class="nav-item"><a class="nav-link" href="{{ route('vuelos.index') }}"><i class="fas fa-plane"></i> Vuelos</a></li>
                    @endrole

                    <!-- GESTOR DE RESERVACIONES -->
                    @role('gestor_reservaciones')
                        <li class="nav-item"><a class="nav-link" href="{{ route('reservaciones.index') }}"><i class="fas fa-ticket-alt"></i> Reservaciones</a></li>
                    @endrole

                    <!-- AGENTE -->
                    @role('agente')
                        <li class="nav-item"><a class="nav-link" href="{{ route('clientes.index') }}"><i class="fas fa-users"></i> Clientes</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('vuelos.index') }}"><i class="fas fa-plane"></i> Vuelos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('reservaciones.index') }}"><i class="fas fa-ticket-alt"></i> Reservaciones</a></li>
                    @endrole

                    <!-- CONTABILIDAD, SOPORTE, MODERADOR (por ahora sin vistas) -->
                    @hasanyrole('contabilidad|soporte|moderador')
                        {{-- En el futuro aquí se agregarán enlaces específicos --}}
                    @endhasanyrole
                @endauth
            </ul>
        </div>
    </div>
</nav>

<main class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fas fa-exclamation-triangle"></i> Por favor corrige los errores:
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    @yield('content')
</main>

<footer>
    &copy; {{ date('Y') }} Sistema de Registro de Vuelos. Todos los derechos reservados.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
