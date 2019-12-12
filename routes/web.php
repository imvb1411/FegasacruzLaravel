<?php

use App\Actividad;
use App\Persona;
use App\Ubicacion;
use App\Rubro;
use Illuminate\Support\Facades\Route;
use Spatie\Searchable\Search;
use Illuminate\Http\Response;

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

Route::resource('home', 'HomeController')->middleware('auth');

Route::resource('users','PersonalController');

Route::post('personal_login','PersonalController@login')->name('personal.login');

Route::resource('configuracion','ConfiguracionController');

Route::get('personal_logout','PersonalController@logout')->name('personal.logout');

Route::resource('clientes', 'PersonaController');
Route::get('/buscar_cliente/{t}','PersonaController@buscar')->name('cliente.buscar');

Route::resource('rubros', 'RubroController');
Route::get('/buscar_rubro/{t}','RubroController@buscar')->name('rubro.buscar');

Route::resource('titulos', 'TituloController');
Route::get('/titulo/img/{t}','TituloController@showImg')->name('titulo.imagen');
Route::get('/buscar_titulo/{t}','TituloController@buscar')->name('titulo.buscar');

Route::resource('planos', 'PlanoController');
Route::get('/plano/img/{t}','PlanoController@showImg')->name('plano.imagen');
Route::get('/buscar_plano/{t}','PlanoController@buscar')->name('plano.buscar');

Route::resource('marcas', 'MarcaController');
Route::get('/marca/img/{t}','MarcaController@showImg')->name('marca.imagen');
Route::get('/buscar_marca/{t}','PlanoController@buscar')->name('marca.buscar');

Route::resource('ubicacion', 'UbicacionController');
Route::get('/buscar_ubicacion/{t}','UbicacionController@buscar')->name('ubicacion.buscar');

Route::resource('actividad', 'ActividadController');
Route::get('/buscar_actividad/{t}','ActividadController@buscar')->name('actividad.buscar');

Route::resource('solicitudes', 'SolicitudController');
Route::get('/buscar_solicitud/{t}','SolicitudController@buscar')->name('solicitud.buscar');

Route::get('/search/{s}',function($s){
    $searchResults = (new Search())
            ->registerModel(Persona::class, 'nombre')
            ->registerModel(Ubicacion::class, 'nombre')
            ->registerModel(Rubro::class, 'nombre')
            ->search($s);
    //dd(Response::json($searchResults));
        return Response::json($searchResults);;
})->name('search');
