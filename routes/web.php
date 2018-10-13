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
	
	Route::get('/barang','BarangController@index');
	Route::get('/barang/tambah','BarangController@tambah');
	Route::post('/barang/simpan','BarangController@simpan');
	Route::post('/barang/edit/{id_barang}','BarangController@edit');
	Route::get('/barang/delete/{id_barang}','BarangController@delete');

	Route::get('/pelanggan','PelangganController@index');
	Route::get('/pelanggan/tambah','PelangganController@tambah');
	Route::post('/pelanggan/simpan','PelangganController@simpan');
	Route::post('/pelanggan/edit/{id_pelanggan}','PelangganController@edit');
	Route::get('/pelanggan/delete/{id_pelanggan}','PelangganController@delete');

	Route::get('/supplier','SupplierController@index');
	Route::get('/supplier/tambah','SupplierController@tambah');
	Route::post('/supplier/simpan','SupplierController@simpan');
	Route::post('/supplier/edit/{id_supplier}','SupplierController@edit');
	Route::get('/supplier/delete/{id_supplier}','SupplierController@delete');

	Route::get('/transaksi','TransaksiController@index');
	Route::get('/transaksi/tambah','TransaksiController@tambah');
	Route::post('/transaksi/simpan','TransaksiController@simpan');
	Route::post('/transaksi/edit/{transaksi}','TransaksiController@edit');
	Route::get('/transaksi/delete/{transaksi}','TransaksiController@delete');

	Route::get('/search/barang','SearchController@barang');
	Route::get('/search/pelanggan','SearchController@pelanggan');
	Route::get('/search/supplier','SearchController@supplier');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
