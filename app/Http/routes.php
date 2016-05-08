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

// PEMBUDIDAYA IKAN
// Informasi Umum
Route::get('/budidaya-keramba/info', 'BudidayaKerambaInfoController@index');
Route::get('/budidaya-keramba/info/tambah', 'BudidayaKerambaInfoController@create');
Route::post('/budidaya-keramba/info/tambah', 'BudidayaKerambaInfoController@store');
Route::get('/budidaya-keramba/info/edit/{id_responden}', 'BudidayaKerambaInfoController@edit');
Route::patch('/budidaya-keramba/info/edit/{id_responden}', 'BudidayaKerambaInfoController@update');
Route::get('/budidaya-keramba/info/lihat/{id_responden}', 'BudidayaKerambaInfoController@detail');

// Tambak
Route::get('/tambak', 'TambakController@index');
Route::get('/tambak/tambah', 'TambakController@create');
Route::post('/tambak/tambah', 'TambakController@store');
Route::get('/tambak/edit/{id_responden}', 'TambakController@edit');
Route::patch('/tambak/edit/{id_responden}', 'TambakController@update');
Route::get('/tambak/lihat/{id_responden}', 'TambakController@detail');