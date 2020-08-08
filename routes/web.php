<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('home');
});

Route::resource('peliculas', 'peliculasController');
Auth::routes(['register'=>false,'password.reset'=>false,'reset'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/peliculas','peliculasController@index')->name('pelicula');


