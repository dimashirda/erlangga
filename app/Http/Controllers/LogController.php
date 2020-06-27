<?php

namespace App\Http\Controllers;

use DB;
use App\LogTransaksi;
use Illuminate\Http\Request;
use App\LogBarang;
use App\BarangDetail;
class LogController extends Controller
{
    public function create($data,$flag,$detail_id,$temp_jumlah=null) //2 penjualan, 1 pembelian;
    {	
        $log = new LogTransaksi;
        if($flag == 1)
        {
            $log->pembelian_id = $data->pembelian_id;
            $log->jumlah = $data->jumlah;
        }
        else
        {
            $log->penjualan_id = $data->penjualan_id;
            $log->jumlah = $temp_jumlah;
        }
        $log->tipe = $flag;
        $log->barang_detail_id = $detail_id;
        $log->harga_satuan = $data->harga_satuan;
        $log->total_satuan = $data->total_satuan;
        $log->save();
        return;
    }

    public function logBarangPotong($barang,$jumlah,$pemotongan)
    {
        $log = new LogBarang;
        $log->barang_detail_id = $barang;
        $log->jumlah = $jumlah;
        $log->flag = 3;
        $log->pemotongan_detail_id = $pemotongan;
        $log->save();
        return;
    }

    public function rollBack($detail,$tipe)
    {   
        // dd($detail);
        if($tipe == 2)
        {
            $log = LogTransaksi::where('penjualan_id',$detail->penjualan_id)->get();
            foreach ($log as $item) 
            {
                $barang_detail = BarangDetail::where('id',$item->barang_detail_id)->get();
                $barang_detail->jumlah += $item->jumlah;
                $barang_detail->save();
            }
        }
        else
        {
            $log = LogTransaksi::where('penjualan_id',$detail->penjualan_id)->get();
            foreach ($log as $item) 
            {
                $barang_detail = BarangDetail::where('id',$item->barang_detail_id)->get();
                $barang_detail->jumlah -= $item->jumlah;
                $barang_detail->save();
            }
        }
        return;
    }
}
