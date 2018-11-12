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
    return view('auth.login');
});
Auth::routes();
Route::middleware(['auth'])->group(function(){
	Route::get('/home','HomeController@index');
	
	Route::get('/barang','Barang\ViewController@index');
	Route::get('/barang/tambah','Barang\ViewController@tambah');
	Route::post('/barang/simpan','Barang\CreateController@simpan');
	Route::post('/barang/edit/{id_barang}','Barang\CreateController@edit');
	Route::get('/barang/delete/{id_barang}','Barang\DeleteController@delete');

	Route::get('/pelanggan','PelangganController@index');
	Route::get('/pelanggan/tambah','PelangganController@tambah');
	Route::post('/pelanggan/simpan','PelangganController@simpan');
	Route::post('/pelanggan/edit/{id_pelanggan}','PelangganController@edit');
	Route::get('/pelanggan/delete/{id_pelanggan}','PelangganController@delete');

	Route::get('/supplier','Supplier\ViewController@index');
	Route::get('/supplier/tambah','Supplier\ViewController@tambah');
	Route::post('/supplier/simpan','Supplier\CreateController@simpan');
	Route::post('/supplier/edit/{id_supplier}','Supplier\CreateController@edit');
	Route::get('/supplier/delete/{id_supplier}','Supplier\DeleteController@delete');

	Route::get('/transaksi','TransaksiController@index');
	Route::get('/transaksi/tambah','TransaksiController@tambah');
	Route::post('/transaksi/simpan','TransaksiController@simpan');
	Route::post('/transaksi/edit/{transaksi}','TransaksiController@edit');
	Route::get('/transaksi/delete/{transaksi}','TransaksiController@delete');

	Route::get('/search/barang','SearchController@barang');
	Route::get('/search/pelanggan','SearchController@pelanggan');
	Route::get('/search/supplier','SearchController@supplier');
});