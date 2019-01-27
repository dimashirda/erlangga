<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembelian;
use App\Penjualan;
use App\LogTransaksi;
use Carbon\Carbon;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $start = Carbon::now("Asia/Bangkok")->startOfDay();
        $end = Carbon::now("Asia/Bangkok")->endOfDay();
        $data['penjualan'] = Penjualan::whereBetween("tanggal_transaksi",[$start,$end])->get();
        $data['pembelian'] = Pembelian::whereBetween("tanggal_transaksi",[$start,$end])->get();
        $log_jual = LogTransaksi::where('tipe',2)
                                ->whereBetween('created_at',[$start,$end])->get();
        $data['untung'] = 0;
        foreach ($log_jual as $jual) 
        {
            $harga_beli = $jual->barangDetail->harga_beli;
            $data['untung'] += ($jual->harga_satuan - $harga_beli) * $jual->jumlah;
        }
        
        return view('home',$data);
    }
}
