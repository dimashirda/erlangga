<?php

namespace App\Http\Controllers;

use App\Penjualan;
use App\Pelanggan;
use App\Barang;
use App\Supplier;
//use Surat_jalan;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
    	$acc = Penjualan::paginate(25);
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
        $penjualan  = new Penjualan;
        $penjualan->users_id = Auth::user()->id;
        $penjualan->pelanggan_id = $req->input('id_pelanggan');
        $penjualan->tanggal_transaksi = date('Y-m-d H:i:s');
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
