<?php
use Illuminate\Support\Facades\Route;
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
<<<<<<< HEAD
    return view('layouts.master');
});

Route::resource('persona', 'PersonaController');
=======
    return view('layouts.login');
})->name('login');
Route::get('/home', function () {
        return view('layouts.master');
})->middleware('auth')->name('home');
Route::resource('users','PersonalController');
Route::post('personal_login','PersonalController@login')->name('personal.login');
Route::get('personal_logout','PersonalController@logout')->name('personal.logout');
>>>>>>> 907a82a64ae90e6d061bb02678739158b2c837c7
