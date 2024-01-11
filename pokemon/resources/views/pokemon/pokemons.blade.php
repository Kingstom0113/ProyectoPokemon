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
              <th scope="col">#</th>
              <th scope="col">Pokemon</th>
              <th scope="col">Tipo</th>
              <th scope="col">Subtipo</th>
              <th scope="col">Region</th>
            </tr>
          </thead>
          @foreach ($pokemons as $pokemon)
            <tr>
                <td>{{$pokemon->name}}</td>
                <td>{{$pokemon->type}}</td>
                <td>{{$pokemon->subtype}}</td>
                <td>{{$pokemon->region}}</td>
                <td><a href=""></a></td>
            </tr>
            @endforeach
        </table>
    </main>
</body>
</html>