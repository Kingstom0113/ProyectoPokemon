<?php

use App\Http\Controllers\PokemonsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//LISTADO DE POKEMONS
Route::get('pokemons',[PokemonsController::class, 'pokemons']);

//AGREGAR POKEMONS
Route::get('formulario_pokemon', [PokemonsController::class, 'mostrarFormularioPokemon'])->name('formulario_pokemon');
Route::post('guardar_pokemon', [PokemonsController::class, 'guardarPokemon'])->name('guardar_pokemon');

