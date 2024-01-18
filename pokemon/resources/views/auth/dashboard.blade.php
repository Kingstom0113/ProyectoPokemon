@extends('auth.template')

@section('content')
    <h1>Tu PC de pokemons</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pokemon</th>
                <th scope="col">Tipo</th>
                <th scope="col">Subtipo</th>
                <th scope="col">Region</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        @foreach (Auth::user()->pokemons as $pokemon)
            <tr data-id="{{ $pokemon->id }}">
                <td>{{ $pokemon->id }}</td>
                <td>{{ $pokemon->name }}</td>
                <td>{{ $pokemon->type }}</td>
                <td>{{ $pokemon->subtype }}</td>
                <td>{{ $pokemon->region }}</td>
                <td>
                    <a href="{{ route('editar_pokemon', ['id' => $pokemon->id]) }}" class="btn btn-primary">Editar</a>
                    <form method="post" action="{{ route('eliminar_pokemon', ['id' => $pokemon->id]) }}"
                        style="display:inline;">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>


                </td>
            </tr>
        @endforeach
    </table>
    </div>
    <a href="{{ route('formulario_pokemon') }}" class="btn btn-primary center">Añadir Pokemon</a>
@endsection
