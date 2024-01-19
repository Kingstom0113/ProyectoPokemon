<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PokemonsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $pokemons = $user->pokemons;
    }
    public function guardarPokemon(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'subtype' => 'nullable',
            'region' => 'required',
        ]);

        $pokemonNuevo = new Pokemon;
        $pokemonNuevo->name = $request->name;
        $pokemonNuevo->type = $request->type;
        $pokemonNuevo->subtype = $request->subtype;
        $pokemonNuevo->region = $request->region;

        $pokemonNuevo->user_id = auth()->id();

        $pokemonNuevo->save();

        return back()->with('mensaje', 'Pokemon registrado correctamente');
    }

    public function newPokemon()
    {
        return view('create.blade.php');
    }

    public function mostrarFormularioPokemon()
    {
        return view('pokemon.formulario_pokemon');
    }

    public function eliminarPokemon($id)
    {
        $pokemon = Pokemon::find($id);

        if ($pokemon) {
            $pokemon->delete();
            return redirect('home')->with('success', 'Pokemon eliminado exitosamente');
        } else {
            return redirect('home')->with('error', 'No se pudo encontrar el Pokémon');
        }
    }







    public function actualizarPokemon(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:pokemon,name,' . $id,
            'type' => 'required',
            'subtype' => 'nullable|max:255',
            'region' => 'required',
        ]);

        $pokemon = Pokemon::find($id);
        $pokemon->update($validatedData);

        return redirect('home')->with('success', 'Pokemon editado exitosamente');
    }


    public function editarPokemon($id)
    {
        $pokemon = Pokemon::find($id);

        return view('pokemon.editar_pokemon', ['pokemon' => $pokemon]);
    }
}
