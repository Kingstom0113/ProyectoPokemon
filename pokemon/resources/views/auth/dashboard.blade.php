@extends('auth.template')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>

                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    <form method="post" action="{{ route('eliminar_pokemon', ['id' => $pokemon->id]) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" data-id="1" data-toggle="modal" data-target="#confirm-delete-modal">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('formulario_pokemon') }}" class="btn btn-primary">Añadir Pokemon</a>
@endsection
