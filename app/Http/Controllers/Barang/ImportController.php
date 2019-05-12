<?php

namespace App\Http\Controllers\Barang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang;
use App\BarangDetail;
class ImportController extends Controller
{
    public function importBarang()
    {   
        ini_set('max_execution_time', 0);
        $file = fopen("stock.csv","r");
        $data = fgetcsv($file);
        while(!feof($file))
        {
        	$data = fgetcsv($file);
        	$barang = new Barang;
        	$barang->nama = $data[0];
        	$barang->satuan = $data[1];
        	$barang->harga_jual = $data[2];
        	$barang->save();
        	// dd($barang);
        	$detail = new BarangDetail;
        	$detail->barang_id = $barang->id;
        	$detail->jumlah = $data[4];
        	$detail->harga_beli = $data[3];
        	$detail->save();
        }
        fclose($file);
        dd('done');
    }
}
