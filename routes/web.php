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


Route::get('/scenario/{id}', 'ScenarioController@show')->middleware('auth');

Route::get('/scenario/create', 'ScenarioController@create')->middleware('auth');

Route::get('/scenario', 'ScenarioController@index')->middleware('auth');

Route::post('/scenario', 'ScenarioController@store')->middleware('auth');

Route::post('/scenario/{id}/attribute', 'AttributeController@store')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');



Auth::routes();

Route::get('/logout', function () {

    Auth::logout();

    return Redirect::to('/');

});

Route::get('/home', 'ScenarioController@index')->name('home')->middleware('auth');
