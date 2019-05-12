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
        $nama = Pelanggan::select('nama')->get();
        $result = Pelanggan::select('id','telepon','limit','kredit')->get();
        return json_encode(['nama'=>$nama,'result'=>$result]);
    }

    public function barang()
    {
    	$nama = Barang::select('nama')->get()->toArray();
    	$result = Barang::select('id','satuan','harga_jual')->get();
        $barang = Barang::all();
        $stok = [];
        $jumlah_barang = 0;
        foreach ($barang as $key => $item) {
            $jumlah_barang = 0;
            foreach ($item->barang_detail as $detail) {
                $jumlah_barang += $detail->jumlah;
            }
            array_push($stok,$jumlah_barang);
            // dd($jumlah_barang,$nama[$key]);
            $nama[$key]['nama'] .= ' - '.$jumlah_barang;
        }
        // dd($nama);
    	return json_encode(['result'=>$result, 'nama'=>$nama, 'stok'=>$stok]);
    }

    public function supplier()
    {
        $nama = Supplier::select('nama')->get();
        $result = Pelanggan::select('id','telepon','alamat')->get();
        return json_encode(['result'=>$result,'nama'=>$nama]);
    }
}
