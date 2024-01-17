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
                     <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete-modal-{{ $pokemon->id }}">Eliminar</button>
                      <!-- Modal -->
                    <div class="modal fade" id="confirm-delete-modal-{{ $pokemon->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Confirmar eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que quieres eliminar a {{ $pokemon->name }}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <a href="{{ route('eliminar_pokemon', ['id' => $pokemon->id]) }}" class="btn btn-danger">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('formulario_pokemon') }}" class="btn btn-primary center">Añadir Pokemon</a>
@endsection
