<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Responden
Route::get('/responden', 'RespondenController@index');
Route::get('/responden/tambah', 'RespondenController@create');
Route::post('/responden/tambah', 'RespondenController@store');
Route::get('/responden/edit/{id_responden}', 'RespondenController@edit');
Route::patch('/responden/edit/{id_responden}', 'RespondenController@update');
Route::get('/responden/lihat/{id_responden}', 'RespondenController@detail');