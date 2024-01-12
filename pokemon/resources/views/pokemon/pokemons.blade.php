<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Tu PC de pokemons</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Pokedex</th>
                    <th scope="col">Pokemon</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Subtipo</th>
                    <th scope="col">Region</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            @foreach ($pokemons as $pokemon)
                <tr data-id="1">
                    <td>{{ $pokemon->id }}</td>
                    <td>{{ $pokemon->name }}</td>
                    <td>{{ $pokemon->type }}</td>
                    <td>{{ $pokemon->subtype }}</td>
                    <td>{{ $pokemon->region }}</td>
                    <td>
                        <a href="{{ route('editar_pokemon', ['id' => $pokemon->id]) }}"
                            class="btn btn-primary">Editar</a>
                        <form method="post" action="{{ route('eliminar_pokemon', ['id' => $pokemon->id]) }}"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" data-id="1" data-toggle="modal" data-target="#confirm-delete-modal">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="{{ route('formulario_pokemon') }}" class="btn btn-primary">Añadir Pokemon</a>
    </main>
</body>
</html>
