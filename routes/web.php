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
	Route::get('/barang/detail/{id}','Barang\ViewController@detail');
	Route::get('/barang/tambah','Barang\ViewController@tambah');
	Route::get('/barang/tambahdetail/{id}','Barang\ViewController@tambahDetail');
	Route::post('/barang/simpan','Barang\CreateController@simpan');
	Route::post('/barang/simpandetail','Barang\CreateController@simpanDetail');
	Route::post('/barang/edit/{id_barang}','Barang\CreateController@edit');
	Route::get('/barang/delete/{id_barang}','Barang\DeleteController@delete');
	Route::post('/barangdetail/edit/{id_barang}','Barang\CreateController@editDetail');
	Route::post('/barangdetail/delete/{id_barang}','Barang\CreateController@deleteDetail');

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
	Route::get('/transaksi/detail/{id}', 'TransaksiController@detail');
	Route::post('/transaksi/edit/simpan','TransaksiController@editsimpan');
	Route::get('/transaksi/edit/{id}','TransaksiController@edit');
	Route::get('/transaksi/delete','TransaksiController@delete');
	Route::get('/transaksi/cari','TransaksiController@search');
	Route::get('/transaksi/print/{id}','TransaksiController@print');
	Route::get('/transaksi/pelunasan/{id}','TransaksiController@pelunasan');
	Route::post('/transaksi/pelunasan/{id}/bayar','TransaksiController@pelunasanBayar');

	Route::get('/search/barang','SearchController@barang');
	Route::get('/search/pelanggan','SearchController@pelanggan');
	Route::get('/search/supplier','SearchController@supplier');

	Route::get('/pembelian','Pembelian\ViewController@index');
	Route::get('/pembelian/tambah','Pembelian\ViewController@tambah');
	Route::get('/pembelian/detail/{id}','Pembelian\ViewController@detail');
	Route::post('/pembelian/simpan','Pembelian\PostController@beli');

	Route::get('/pemotongan-stok','Pemotongan\ViewController@potongStok');
	Route::post('/pemotongan-stok/tambah','Pemotongan\PostController@tambahStok');
	Route::get('/pemotongan-klien','Pemotongan\ViewController@potongKlien');

	Route::get('/laporan','Lapran\ViewController@index');

	Route::get('/pelanggan/detail/{id}','PelangganController@historiBelanja');
	Route::get('/pelanggan/detail/{id}/{flag}','PelangganController@historiBelanja');
});