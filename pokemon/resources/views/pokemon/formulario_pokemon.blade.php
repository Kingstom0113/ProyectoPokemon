<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js', 'resources/css/app.css', 'resources/css/app.scss'])
    <title>Document</title>
</head>

<body>
    <main>
        @if (session('mensaje'))
            <div>
                {{ session('mensaje') }}<br><br>
            </div>
        @endif

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <h1>Añadir Pokemon</h1>

                                <form method="post" id="#formulario_pokemon" action="{{ route('guardar_pokemon') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="id" class="form-label">Número de la Pokedex</label>
                                        <input type="number" class="form-control" id="id" name="id"
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
                                    <a href="{{ url('/home') }}" class="btn btn-secondary mt-3 float-end">Volver al PC</a>
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
</body>

</html>
