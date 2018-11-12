<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Pelanggan;
use App\Barang;
use App\Supplier;
use App\Penjualan_barang;
//use Surat_jalan;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
    	$acc = Transaksi::paginate(25);
    	return view('Transaksi',['acc'=>$acc])->with('nav','transaksi');
    }
    public function tambah()
    {	
    	$pel = Pelanggan::all();
    	$bar = Barang::all();
    	return view('tambahtransaksi',['pel'=>$pel],['bar'=>$bar])->with('nav','transaksi');
    }
    public function simpan(Request $req)
    {   
        dd($req);
        //dd(date('Y-m-d H:i:s'));
        $transaksi  = new Transaksi;
        $transaksi->id_user = Auth::user()->id;
        $transaksi->id_pelanggan = $req->input('id_pelanggan');
        $transaksi->waktu_transaksi = date('Y-m-d H:i:s');
        $transaksi->id_surat = null;
        $transaksi->jumlah = 
        $j_barang = count($req->input('id_barang'));
        for($i = 0; $i<$j_barang; $i++)
        {
            $penjualan_barang = new Penjualan_barang;
            $bar_now = Barang::where('id',$req->input('id_barang.'.$i.''))->first();
            $penjualan_barang->id_barang = $bar_now->id;
            $penjualan_barang->id_transaksi =    
        }    
    }
}
