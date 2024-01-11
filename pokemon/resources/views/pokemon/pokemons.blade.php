<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Pokemons en la base de datos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nº Pokedex</th>
                    <th scope="col">Pokemon</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Subtipo</th>
                    <th scope="col">Region</th>
                </tr>
            </thead>
            @foreach ($pokemons as $pokemon)
                <tr>
                    <td>{{ $pokemon->id }}</td>
                    <td>{{ $pokemon->name }}</td>
                    <td>{{ $pokemon->type }}</td>
                    <td>{{ $pokemon->subtype }}</td>
                    <td>{{ $pokemon->region }}</td>
                </tr>
            @endforeach
        </table>
        <a href="{{ route('formulario_pokemon') }}" class="btn btn-primary">Añadir Pokemon</a>

    </main>
</body>

</html>
