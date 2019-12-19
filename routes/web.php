<?php

use App\Actividad;
use App\Marca;
use App\Persona;
use App\Personal;
use App\Plano;
use App\Solicitud;
use App\Titulo;
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

Route::post('personal_login', 'PersonalController@login')->name('personal.login');

Route::middleware('auth')->group(function () {
    Route::resource('home', 'HomeController');

    Route::resource('users', 'PersonalController');
    Route::get('/buscar_personale/{t}', 'PersonalController@buscar')->name('user.buscar');

    Route::resource('configuracion', 'ConfiguracionController');

    Route::get('personal_logout', 'PersonalController@logout')->name('personal.logout');

    Route::resource('clientes', 'PersonaController');
    Route::get('/buscar_cliente/{t}', 'PersonaController@buscar')->name('cliente.buscar');

    Route::resource('rubros', 'RubroController');
    Route::get('/buscar_rubro/{t}', 'RubroController@buscar')->name('rubro.buscar');

    Route::resource('titulos', 'TituloController');
    Route::get('/titulo/img/{t}', 'TituloController@showImg')->name('titulo.imagen');
    Route::get('/buscar_titulo/{t}', 'TituloController@buscar')->name('titulo.buscar');

    Route::resource('planos', 'PlanoController');
    Route::get('/plano/img/{t}', 'PlanoController@showImg')->name('plano.imagen');
    Route::get('/buscar_plano/{t}', 'PlanoController@buscar')->name('plano.buscar');

    Route::resource('marcas', 'MarcaController');
    Route::get('/marca/img/{t}', 'MarcaController@showImg')->name('marca.imagen');
    Route::get('/buscar_marca/{t}', 'MarcaController@buscar')->name('marca.buscar');

    Route::resource('ubicacion', 'UbicacionController');
    Route::get('/buscar_ubicacion/{t}', 'UbicacionController@buscar')->name('ubicacion.buscar');

    Route::resource('actividad', 'ActividadController');
    Route::get('/buscar_actividad/{t}', 'ActividadController@buscar')->name('actividad.buscar');

    Route::resource('solicitudes', 'SolicitudController');
    Route::get('/buscar_solicitud/{t}', 'SolicitudController@buscar')->name('solicitud.buscar');
    Route::get('/imprimir/{t}', 'SolicitudController@print')->name('solicitud.imprimir');

    Route::name('rpt_cliente_solicitud')->get('/rpt_cliente_solicitud', 'ReporteController@solicitudcliente');
    Route::name('rpt_top_actividades')->get('/rpt_top_actividades', 'ReporteController@topactividad');

    Route::get('/getUbicaciones/{dep}', function ($dep) {
        $provincias = Ubicacion::where('estado', 1)->where('ubicacion_id', $dep)->get();
        return response()->json($provincias);
    });

    Route::get('/search/{s}', function ($s) {

        $searchResults = (new Search())
            ->registerModel(Actividad::class, 'nombre')
            ->registerModel(Marca::class, 'descripcion')
            ->registerModel(Persona::class, 'nombre')
            ->registerModel(Personal::class, 'nick')
            ->registerModel(Plano::class, 'descripcion')
            ->registerModel(Rubro::class, 'nombre')
            ->registerModel(Solicitud::class, 'nro_orden')
            ->registerModel(Titulo::class, 'descripcion')
            ->registerModel(Ubicacion::class, 'nombre')
            ->registerModel(Plano::class, 'descripcion')
            ->search($s);
        //dd(response()->json($searchResults));
        return response()->json($searchResults);
    })->name('search');
});

