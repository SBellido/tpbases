<?php

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

Route::get('/', 'HomeController@index');
Route::get('/instituciones', 'HomeController@instituciones');


Route::get('/posiciones-libres', 'PosicionesLibresController@showDate');

Route::post('/posiciones-libres', 'PosicionesLibresController@showDate');

Route::get('/posiciones-usuario', 'PosicionesLibresController@showByUser');

Route::post('/posiciones-usuario', 'PosicionesLibresController@showByUser');

