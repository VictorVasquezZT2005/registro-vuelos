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
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
            background-color: #f4f6f9;
        }
        .navbar-brand {
            font-weight: 600;
        }
        main {
            flex: 1 0 auto; /* hace que main ocupe el espacio disponible */
        }
        footer {
            flex-shrink: 0; /* evita que el footer se comprima */
            padding: 15px 0;
            text-align: center;
            background-color: #343a40;
            color: #fff;
        }
        .alert {
            margin-top: 15px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="fas fa-plane-departure"></i> Sistema de Vuelos
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('vuelos.index') }}">Vuelos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('reservaciones.index') }}">Reservaciones</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="container mt-4">
    <!-- Mensajes de éxito -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <!-- Mensajes de error -->
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
