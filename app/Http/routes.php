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
    return redirect('responden');
});

Route::get('bladeTest', 'HomeController@index');
Route::resource('users', 'UserController');
Route::auth();

Route::get('/home', 'HomeController@index');

// Responden
Route::get('/responden', 'RespondenController@index');
Route::get('/responden/tambah', 'RespondenController@create');
Route::post('/responden/tambah', 'RespondenController@store');
Route::get('/responden/edit/{id_responden}', 'RespondenController@edit');
Route::patch('/responden/edit/{id_responden}', 'RespondenController@update');
Route::get('/responden/lihat/{id_responden}', 'RespondenController@detail');
Route::delete('/responden/hapus/{id_responden}', 'RespondenController@destroy');
Route::get('/export', 'RespondenController@export');
Route::get('/export_to_excel/{kuesioner}', 'RespondenController@export_to_excel');

// PEMBUDIDAYA IKAN
// Informasi Umum
Route::get('/budidaya-keramba/info', 'BudidayaKerambaController@index');
Route::get('/budidaya-keramba/info/tambah', 'BudidayaKerambaController@create');
Route::post('/budidaya-keramba/info/tambah', 'BudidayaKerambaController@store');
Route::get('/budidaya-keramba/info/edit/{id_responden}', 'BudidayaKerambaController@edit');
Route::patch('/budidaya-keramba/info/edit/{id_responden}', 'BudidayaKerambaController@update');
Route::get('/budidaya-keramba/info/lihat/{id_responden}', 'BudidayaKerambaController@detail');
Route::delete('/budidaya-keramba/info/hapus/{id_responden}', 'BudidayaKerambaController@destroy');
Route::get('/budidaya-keramba/info/export', 'BudidayaKerambaController@export');

// Tambak
Route::get('/tambak', 'TambakController@index');
Route::get('/tambak/tambah', 'TambakController@create');
Route::post('/tambak/tambah', 'TambakController@store');
Route::get('/tambak/edit/{id_responden}', 'TambakController@edit');
Route::patch('/tambak/edit/{id_responden}', 'TambakController@update');
Route::get('/tambak/lihat/{id_responden}', 'TambakController@detail');
Route::delete('/tambak/hapus/{id_responden}', 'TambakController@destroy');
Route::get('/tambak/export', 'TambakController@export');

// Existence Value
Route::get('/eval', 'EvalController@index');
Route::get('/eval/tambah', 'EvalController@create');
Route::post('/eval/tambah', 'EvalController@store');
Route::get('/eval/edit/{id_responden}', 'EvalController@edit');
Route::patch('/eval/edit/{id_responden}', 'EvalController@update');
Route::get('/eval/lihat/{id_responden}', 'EvalController@detail');
Route::delete('/eval/hapus/{id_responden}', 'EvalController@destroy');
Route::get('/eval/export', 'EvalController@export');

// Pemanfaatan Kayu
Route::get('/kayu', 'KayuController@index');
Route::get('/kayu/tambah', 'KayuController@create');
Route::post('/kayu/tambah', 'KayuController@store');
Route::get('/kayu/edit/{id_responden}', 'KayuController@edit');
Route::patch('/kayu/edit/{id_responden}', 'KayuController@update');
Route::get('/kayu/lihat/{id_responden}', 'KayuController@detail');
Route::delete('/kayu/hapus/{id_responden}', 'KayuController@destroy');
Route::get('/kayu/export', 'KayuController@export');

// Pencari Satwa
Route::get('/satwa', 'PencariSatwaController@index');
Route::get('/satwa/tambah', 'PencariSatwaController@create');
Route::post('/satwa/tambah', 'PencariSatwaController@store');
Route::get('/satwa/edit/{id_responden}', 'PencariSatwaController@edit');
Route::patch('/satwa/edit/{id_responden}', 'PencariSatwaController@update');
Route::get('/satwa/lihat/{id_responden}', 'PencariSatwaController@detail');
Route::delete('/satwa/hapus/{id_responden}', 'PencariSatwaController@destroy');
Route::get('/satwa/export', 'PencariSatwaController@export');

// Nelayan
Route::get('/nelayan', 'NelayanController@index');
Route::get('/nelayan/tambah', 'NelayanController@create');
Route::post('/nelayan/tambah', 'NelayanController@store');
Route::get('/nelayan/edit/{id_responden}', 'NelayanController@edit');
Route::patch('/nelayan/edit/{id_responden}', 'NelayanController@update');
Route::get('/nelayan/lihat/{id_responden}', 'NelayanController@detail');
Route::delete('/nelayan/hapus/{id_responden}', 'NelayanController@destroy');
Route::get('/nelayan/export', 'NelayanController@export');

// Valuasi Wisata
Route::get('/wisata', 'WisataController@index');
Route::get('/wisata/tambah', 'WisataController@create');
Route::post('/wisata/tambah', 'WisataController@store');
Route::get('/wisata/edit/{id_responden}', 'WisataController@edit');
Route::patch('/wisata/edit/{id_responden}', 'WisataController@update');
Route::get('/wisata/lihat/{id_responden}', 'WisataController@detail');
Route::delete('/wisata/hapus/{id_responden}', 'WisataController@destroy');
Route::get('/wisata/export', 'WisataController@export');

// Buydidaya Rumput Laut
Route::get('/budidaya-rumput-laut', 'BudidayaRumputLautController@index');
Route::get('/budidaya-rumput-laut/tambah', 'BudidayaRumputLautController@create');
Route::post('/budidaya-rumput-laut/tambah', 'BudidayaRumputLautController@store');
Route::get('/budidaya-rumput-laut/edit/{id_responden}', 'BudidayaRumputLautController@edit');
Route::patch('/budidaya-rumput-laut/edit/{id_responden}', 'BudidayaRumputLautController@update');
Route::get('/budidaya-rumput-laut/lihat/{id_responden}', 'BudidayaRumputLautController@detail');
Route::delete('/budidaya-rumput-laut/hapus/{id_responden}', 'BudidayaRumputLautController@destroy');
Route::get('/budidaya-rumput-laut/export', 'BudidayaRumputLautController@export');

Route::controller('datatables', 'RespondenController', [
    'anyData'  => 'datatables.data',
    'getIndex' => 'responden',
]);