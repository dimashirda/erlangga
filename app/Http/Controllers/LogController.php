<?php

namespace App\Http\Controllers;

use DB;
use App\LogTransaksi;
use Illuminate\Http\Request;
use App\LogBarang;
class LogController extends Controller
{
    public function create($data,$flag,$detail_id,$temp_jumlah=null)
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
}
