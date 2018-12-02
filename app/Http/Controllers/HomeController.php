<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembelian;
use App\Penjualan;
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
        return view('home',$data);
    }
}
