<?php

use App\Actividad;
use App\Persona;
use App\Ubicacion;
use Illuminate\Support\Facades\Route;
use Spatie\Searchable\Search;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.login');
})->name('login');
Route::get('/home', function () {
        return view('layouts.master');
})->middleware('auth')->name('home');
Route::resource('users','PersonalController');
Route::post('personal_login','PersonalController@login')->name('personal.login');
Route::get('personal_logout','PersonalController@logout')->name('personal.logout');

Route::resource('clientes', 'PersonaController');
Route::get('/buscar_cliente/{t}','PersonaController@buscar')->name('cliente.buscar');

Route::resource('rubros', 'RubroController');

Route::resource('ubicacion', 'UbicacionController');
Route::get('/buscar_ubicacion/{t}','UbicacionController@buscar')->name('ubicacion.buscar');

Route::resource('actividad', 'ActividadController');
Route::get('/buscar_actividad/{t}','ActividadController@buscar')->name('actividad.buscar');

Route::get('/search/{s}',function($s){
    $searchResults = (new Search())
            ->registerModel(Persona::class, 'nombre')
            ->registerModel(Ubicacion::class, 'nombre')
            ->search($s);
    //dd(Response::json($searchResults));
        return Response::json($searchResults);;
})->name('search');
