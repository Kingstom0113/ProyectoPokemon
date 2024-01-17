<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokémon Landing Page</title>
    @vite(['resources/js/app.js','resources/css/app.css', 'resources/css/app.scss'])
</head>
<body>
    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                @if (Route::has('login'))
    <div class="fixed-top p-3 text-end">
        @auth
            <a href="{{ url('/home') }}" class="btn btn-outline-secondary">PC</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-primary">Iniciar sesión</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-primary ms-2">Registrarse</a>
            @endif
        @endauth
    </div>
@endif

            </div>
        </div>
    </nav>
    <footer class="bg-dark text-center p-3 text-light">
        <p>&copy; {{ date('Y') }} Pokémon. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
