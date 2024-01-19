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

    //controlador para guardar pokemons donde valido a nuvel de servidor los datos que entran
    public function guardarPokemon(Request $request)
    {
        $request->validate([
            'pokedex' => 'required|integer|between:0,1025',
            'name' => 'required|max:16',
            'type' => 'required',
            'subtype' => 'nullable',
            'region' => 'required',
        ]);

        if (strlen($request->name) > 16) {
            return back()->withErrors(['name' => 'El nombre no puede tener más de 16 caracteres.'])->withInput();
        }

        if ($request->type === $request->subtype) {
            return back()->withErrors(['subtype' => 'El tipo y el subtipo no pueden ser iguales.'])->withInput();
        }

        $pokemonNuevo = new Pokemon;
        
        $pokemonNuevo->pokedex = $request->pokedex;
        $pokemonNuevo->name = $request->name;
        $pokemonNuevo->type = $request->type;
        $pokemonNuevo->subtype = $request->subtype;
        $pokemonNuevo->region = $request->region;

        $pokemonNuevo->user_id = auth()->id();

        $pokemonNuevo->save();

        return back()->with('mensaje', 'Pokemon registrado correctamente');
    }


    

    //funcion para que aparezca el formulario para añadir pokemons al pc
    public function mostrarFormularioPokemon()
    {
        return view('pokemon.formulario_pokemon');
    }

    //funcion para poder eliminar un pokemon con su id
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
            'pokedex' => 'required',
            'name' => 'required',
            'type' => 'required',
            'subtype' => 'nullable',
            'region' => 'required',
        ]);

        if (strlen($request->name) > 16) {
            return back()->withErrors(['name' => 'El nombre no puede tener más de 16 caracteres.'])->withInput();
        }

        if ($request->type === $request->subtype) {
            return back()->withErrors(['subtype' => 'El tipo y el subtipo no pueden ser iguales.'])->withInput();
        }

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
