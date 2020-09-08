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

Route::get('/','OmdbController@index');
Route::get('/search','OmdbController@search');

Route::get('/movies','MovieController@index');
Route::get('/movies/reset','MovieController@reset');
Route::get('/movies/{id}', 'MovieController@add');
Route::delete('/movies/{id}', 'MovieController@delete');

Route::get('/nominations', 'NominationController@index');
Route::get('/nominations/add', 'NominationController@add');
Route::get('/nominations/{id}', 'NominationController@show');
Route::delete('/nominations/{id}', 'NominationController@delete');