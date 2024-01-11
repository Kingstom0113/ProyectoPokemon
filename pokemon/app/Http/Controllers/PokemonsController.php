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



}
