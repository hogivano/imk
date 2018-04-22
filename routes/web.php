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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', function (){
    return view('menus');
});

Route::post('/daftar', 'DaftarController@daftar')->name('daftar');
Route::post('/masuk', 'MasukController@masuk')->name('masuk');

Route::group(['prefix' => 'users'], function () {
    Route::get('/dashboard', function(){
        return view('/users/dashboard');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
});
