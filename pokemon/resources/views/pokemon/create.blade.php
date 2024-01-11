<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                <div class="card-header">Crear Pokémon</div>

                <div class="card-body">
                    <form action="{{ route('pokemons.create') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="type">Tipo</label>
                            <select class="form-control" id="type" name="type">
                                <option value="normal">Normal</option>
                                <option value="fire">Fuego</option>
                                <option value="water">Agua</option>
                                <option value="grass">Hierba</option>
                                <option value="electric">Eléctrico</option>
                                <option value="ice">Hielo</option>
                                <option value="fighting">Lucha</option>
                                <option value="psychic">Psíquico</option>
                                <option value="bug">Bicho</option>
                                <option value="rock">Roca</option>
                                <option value="ghost">Fantasma</option>
                                <option value="dragon">Dragón</option>
                                <option value="dark">Oscuro</option>
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
                                <option value="grass">Hierba</option>
                                <option value="electric">Eléctrico</option>
                                <option value="ice">Hielo</option>
                                <option value="fighting">Lucha</option>
                                <option value="psychic">Psíquico</option>
                                <option value="bug">Bicho</option>
                                <option value="rock">Roca</option>
                                <option value="ghost">Fantasma</option>
                                <option value="dragon">Dragón</option>
                                <option value="dark">Oscuro</option>
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

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    </main>
</body>
</html>