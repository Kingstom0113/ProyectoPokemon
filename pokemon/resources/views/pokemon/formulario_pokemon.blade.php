<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/validadCreacion.js', 'resources/css/app.css', 'resources/css/app.scss'])
    <title>Pokemon</title>
</head>

<!--Aqui aparece un formulario donde puedes añadir un pokemon a tu pc como entrenador-->
<body class="body-template">
    <main>
        @if (session('mensaje'))
            <div>
                {{ session('mensaje') }}<br><br>
            </div>
        @endif

        <nav class="navbar navbar-expand-md navbar-light bg-warning shadow-sm">
            <div class="container ">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('Usuario', 'Home') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    </li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container p-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <h1 class="text-center">Añadir Pokemon</h1>

                                <form method="post" id="formulario_pokemon" action="{{ route('guardar_pokemon') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="pokedex" class="form-label">Número de la Pokedex</label>
                                        <input type="number" class="form-control" id="pokedex" name="pokedex"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="type" class="form-label">Tipo</label>
                                        <select class="form-select" id="type" name="type" required>
                                            <option value="normal">Normal</option>
                                            <option value="fire">Fuego</option>
                                            <option value="water">Agua</option>
                                            <option value="grass">Planta</option>
                                            <option value="electric">Eléctrico</option>
                                            <option value="flying">Volador</option>
                                            <option value="ground">Tierra</option>
                                            <option value="poison">Veneno</option>
                                            <option value="ice">Hielo</option>
                                            <option value="fighting">Lucha</option>
                                            <option value="psychic">Psíquico</option>
                                            <option value="bug">Bicho</option>
                                            <option value="rock">Roca</option>
                                            <option value="ghost">Fantasma</option>
                                            <option value="dragon">Dragón</option>
                                            <option value="dark">Siniestro</option>
                                            <option value="steel">Acero</option>
                                            <option value="fairy">Hada</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="subtype">Subtipo</label>
                                        <select class="form-control" id="subtype" name="subtype">
                                            <option value="">Ninguno</option>
                                            <option value="normal">Normal</option>
                                            <option value="fire">Fuego</option>
                                            <option value="water">Agua</option>
                                            <option value="grass">Planta</option>
                                            <option value="electric">Eléctrico</option>
                                            <option value="flying">Volador</option>
                                            <option value="ground">Tierra</option>
                                            <option value="poison">Veneno</option>
                                            <option value="ice">Hielo</option>
                                            <option value="fighting">Lucha</option>
                                            <option value="psychic">Psíquico</option>
                                            <option value="bug">Bicho</option>
                                            <option value="rock">Roca</option>
                                            <option value="ghost">Fantasma</option>
                                            <option value="dragon">Dragón</option>
                                            <option value="dark">Siniestro</option>
                                            <option value="steel">Acero</option>
                                            <option value="fairy">Hada</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="region">Región</label>
                                        <select class="form-control" id="region" name="region">
                                            <option value="kanto">Kanto</option>
                                            <option value="johto">Johto</option>
                                            <option value="hoenn">Hoenn</option>
                                            <option value="sinnoh">Sinnoh</option>
                                            <option value="teselia">Teselia</option>
                                            <option value="kalos">Kalos</option>
                                            <option value="alola">Alola</option>
                                            <option value="galar">Galar</option>
                                            <option value="paldea">Paldea</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Guardar Pokemon</button>
                                    <a href="{{ url('/home') }}" class="btn btn-secondary mt-3 float-end">Volver al
                                        PC</a>
                                </form>
                                @if (session('mensaje'))
                                    <div class="alert alert-success mt-3">
                                        {{ session('mensaje') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
    </main>
    <footer class="bg-dark text-center p-3 text-light">
        <p>&copy; {{ date('Y') }} Pokémon. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
