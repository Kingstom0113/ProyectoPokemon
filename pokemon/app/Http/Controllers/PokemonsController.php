<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonsController extends Controller
{
   public function pokemons()
    {
        $pokemons = Pokemon::all();
        return view('pokemon.pokemons', ['pokemons' => $pokemons]);
    }

    public function create(Request $request){
        $request -> validate(['name'=> 'required', 'type' =>'required', 'subtype','region']);
        $pokemonNuevo = new Pokemon;
        $pokemonNuevo -> name = $request -> name;
        $pokemonNuevo -> type = $request -> type;
        $pokemonNuevo -> subtype = $request -> subtype;
        $pokemonNuevo -> region = $request -> region;

        $pokemonNuevo-> save();

        return back() -> with('mensaje', 'Pokemon registrado correctamente');
    }

    public function newPokemon(){
    return view('create.blade.php');
}

public function mostrarFormularioPokemon()
{
    return view('pokemon.formulario_pokemon');
}

public function guardarPokemon(Request $request)
{
    $validatedData = $request->validate([
        'id' => 'required|unique:pokemon,id',
        'name' => 'required|unique:pokemon,name',
        'type' => 'required',
        'subtype' => 'nullable',
        'region' => 'required',
    ]);

    Pokemon::create($validatedData);

    return redirect('pokemons')->with('success', 'Pokemon guardado exitosamente');
}

 public function editarPokemon($id)
    {
        $pokemon = Pokemon::find($id);
        return view('pokemon.editar_pokemon', ['pokemon' => $pokemon]);
    }

    public function eliminarPokemon($id)
    {
        $pokemon = Pokemon::find($id);
        $pokemon->delete();

        return redirect('pokemons')->with('success', 'Pokemon eliminado exitosamente');
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

        return redirect('pokemons')->with('success', 'Pokemon editado exitosamente');
    }
}
