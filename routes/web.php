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
Route::post('/', [ 'as' => 'login', 'uses' => 'LoginController@login']);

Route::get('/menu', function (){
    return view('menus');
});

Route::post('/daftar', 'DaftarController@daftar')->name('daftar');


Route::group(['prefix' => 'users'], function () {
    Route::get('/dashboard', function(){
        return view('/users/dashboard');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/soal', 'AdminController@indexSoal')->name('admin.soal');
    Route::get('/soal/baru', 'AdminController@baruSoalShow')->name('admin.soal.baru');

    Route::get('/warna', 'AdminController@indexWarna')->name('admin.warna');
    Route::get('/warna/baru', 'AdminController@baruWarnaShow')->name('admin.warna.baru');
    Route::post('/warna/baru', 'AdminController@warnaCreate')->name('admin.warna.create');

    Route::get('/bentuk', 'AdminController@indexBentuk')->name('admin.bentuk');
    Route::get('/bentuk/baru', 'AdminController@baruBentukShow')->name('admin.bentuk.baru');
    Route::post('/bentuk/baru', 'AdminController@bentukCreate')->name('admin.bentuk.create');
});
