<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Pelanggan;
use App\Supplier;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function pelanggan(){
        //$query = Input::get('q');
        $nama = Pelanggan::select('nama_pelanggan')->get();
        $result = Pelanggan::select('id','no_telepon','limit','kredit')->get();
        return json_encode(['nama'=>$nama,'result'=>$result]);
    }

    public function barang()
    {
    	$nama = Barang::select('nama_barang')->get();
    	$result = Barang::select('id','satuan','harga_jual','stok_barang')->get();
    	return json_encode(['result'=>$result, 'nama'=>$nama]);
    }
}
