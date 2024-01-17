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
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ConfirmDelete">
                        Eliminar
                    </button>

                </td>
            </tr>
        @endforeach
    </table>
    <!-- Modal -->
    <div class="modal fade" id="ConfirmDelete" tabindex="-1" aria-labelledby="ConfirmDelete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ConfirmDelete">¿Deseas eliminar a este Pokémon?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Si se elimina, no volverá a aparecer nunca <i class="bi bi-emoji-frown-fill"></i>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                <form method="post" id="deleteForm" action="{{ route('eliminar_pokemon', ['id' => $pokemon->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <a href="{{ route('formulario_pokemon') }}" class="btn btn-primary center">Añadir Pokemon</a>
@endsection
