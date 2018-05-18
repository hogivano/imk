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

Route::get('/', 'HomeController@index')->name('index');
Route::post('/', [ 'as' => 'login', 'uses' => 'LoginController@login']);

Route::get('/menu', function (){
    return view('menus');
});

Route::get('/daftaradmin', 'HomeController@daftarAdmin')->name('daftarAdmin');
Route::post('/daftaradmin', 'DaftarController@daftarAdmin')->name('daftarAdmin.submit');
Route::post('/daftar', 'DaftarController@daftar')->name('daftar');


Route::group(['prefix' => 'users'], function () {
    Route::get('/dashboard', function(){
        return view('/users/dashboard');
    })->name('users.dashboard');

    Route::get('soal', 'UsersController@indexSoal')->name('users.soal');

    Route::get('detailsoal/{id}', 'UsersController@detailSoal')->name('users.detailsoal');
    Route::post('detailsoal/{id}', 'UsersController@submitSoal')->name('users.soal.submit');

    Route::get('peringkat', 'UsersController@peringkat')->name('users.peringkat');

    Route::get('keluar', 'UsersController@keluar')->name('users.keluar');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/soal', 'AdminController@indexSoal')->name('admin.soal');
    Route::get('/soal/baru', 'AdminController@baruSoalShow')->name('admin.soal.baru');
    Route::get('/soal/delete/{id}', 'AdminController@soalDelete')->name('admin.soal.delete');
    Route::get('/soal/edit/{id}', 'AdminController@soalEditShow')->name('admin.soal.edit.show');
    Route::post('/soal/update', 'AdminController@soalEditUpdate')->name('admin.soal.edit.update');
    Route::post('/soal/baru', 'AdminController@soalCreate')->name('admin.soal.create');

    Route::get('/warna', 'AdminController@indexWarna')->name('admin.warna');
    Route::get('/warna/baru', 'AdminController@baruWarnaShow')->name('admin.warna.baru');
    Route::get('/warna/delete/{id}', 'AdminController@warnaDelete')->name('admin.warna.delete');
    Route::get('/warna/edit/{id}', 'AdminController@warnaEditShow')->name('admin.warna.edit.show');
    Route::post('/warna/update', 'AdminController@warnaEditUpdate')->name('admin.warna.edit.update');
    Route::post('/warna/baru', 'AdminController@warnaCreate')->name('admin.warna.create');

    Route::get('/bentuk', 'AdminController@indexBentuk')->name('admin.bentuk');
    Route::get('/bentuk/baru', 'AdminController@baruBentukShow')->name('admin.bentuk.baru');
    Route::get('/bentuk/delete/{id}', 'AdminController@bentukDelete')->name('admin.bentuk.delete');
    Route::get('/bentuk/edit/{id}', 'AdminController@bentukEditShow')->name('admin.bentuk.edit.show');
    Route::post('/bentuk/update', 'AdminController@bentukEditUpdate')->name('admin.bentuk.edit.update');
    Route::post('/bentuk/baru', 'AdminController@bentukCreate')->name('admin.bentuk.create');

    Route::get('keluar', 'AdminController@keluar')->name('admin.keluar');
});
