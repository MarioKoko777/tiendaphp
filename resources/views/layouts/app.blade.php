<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ Auth::check() && Auth::user()->rol === 'admin' ? 'KioskoAdmin' : 'Kiosko' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Logo o nombre de la tienda -->
            <a class="navbar-brand" href="{{ Auth::check() && Auth::user()->rol === 'admin' ? route('admin.index') : route('tienda.index') }}">
                {{ Auth::check() && Auth::user()->rol === 'admin' ? 'KioskoAdmin' : 'Kiosko' }}
            </a>

            <!-- Botón para dispositivos móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú de navegación -->
            <div class="collapse navbar-collapse" id="navbarNav">
                @auth
                    @if(Auth::user()->rol === 'admin')
                        <!-- Menú para administradores -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.usuarios') }}">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.productos') }}">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.categorias') }}">Categorías</a>
                            </li>
                        </ul>
                    @else
                        <!-- Categorías para usuarios normales -->
                        <ul class="navbar-nav">
                            @foreach($categorias as $categoria)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('tienda.categoria', $categoria->id) }}">{{ $categoria->nombre }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                @else
                    <!-- Categorías para usuarios no autenticados -->
                    <ul class="navbar-nav">
                        @foreach($categorias as $categoria)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('tienda.categoria', $categoria->id) }}">{{ $categoria->nombre }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endauth

                <!-- Botones de Login, Registro y Carrito -->
                <ul class="navbar-nav ms-auto">
                    @auth
                        <!-- Si el usuario está autenticado -->
                        @if(Auth::user()->rol !== 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('carrito.ver') }}">Carrito</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">Cerrar Sesión</button>
                            </form>
                        </li>
                    @else
                        <!-- Si el usuario no está autenticado -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Contenido principal -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>