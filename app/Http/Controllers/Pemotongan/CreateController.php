<?php

namespace App\Http\Controllers\Pemotongan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang;
use App\Pemotongan;
use App\BarangDetail;
use App\LogBarang;
use App\PemotonganDetail;
class CreateController extends Controller
{
    public function tambahStok($data)
    {
    	$pemotongan = new Pemotongan;
    	$pemotongan->barang_awal_id = $data['barang_awal'];
    	$pemotongan->barang_akhir_id = $data['barang_akhir'];
    	$pemotongan->jumlah_barang_akhir = $data['kuantitas_akhir'];
    	$pemotongan->jumlah_barang_awal = $data['kuantitas_awal'];
    	$pemotongan->save();

    	/*$log_awal = $this->log($data['barang_awal'],$data['kuantitas_awal'],$pemotongan);
    	$log_akhir = $this->log($data['barang_akhir'],$data['kuantitas_awal'],$pemotongan);*/
    	$detail = $this->createDetail($pemotongan);

    	return $detail;
    }
    private function createDetail($pemotongan)
    {
    	$data = [];
		
		$barang_awal = BarangDetail::where('barang_id',$pemotongan->barang_awal_id)
							->where('jumlah','>=',$pemotongan->jumlah_barang_awal)
							->orderBy('harga_beli','asc')->first();
		$barang_awal->jumlah -= $pemotongan->jumlah_barang_awal;
		$barang_awal->save();
		
		$detail_awal = new PemotonganDetail;
		$detail_awal->pemotongan_id = $pemotongan->id;
		$detail_awal->barang_detail_id = $barang_awal->id;
		$detail_awal->jumlah = $pemotongan->jumlah_barang_awal;
		$detail_awal->flag = 0;
		$detail_awal->save();

		app('App\Http\Controllers\LogController')->logBarangPotong($barang_awal->id,$detail_awal->jumlah,$detail_awal->id);

		array_push($data,$detail_awal);
		
		$harga_beli = ($barang_awal->harga_beli * $pemotongan->jumlah_barang_awal) / $pemotongan->jumlah_barang_akhir;
		$barang_akhir = BarangDetail::where('barang_id',$pemotongan->barang_akhir_id)
							->where('harga_beli',$harga_beli)->first();
		if(empty($barang_akhir))
		{
			$barang_baru = new BarangDetail;
			$barang_baru->barang_id = $pemotongan->barang_akhir_id;
			$barang_baru->jumlah = $pemotongan->jumlah_barang_akhir;
			$barang_baru->harga_beli = $harga_beli;
			$barang_baru->save();

			$detail_akhir = new PemotonganDetail;
			$detail_akhir->pemotongan_id = $pemotongan->id;
			$detail_akhir->barang_detail_id = $barang_baru->id;
			$detail_akhir->jumlah = $pemotongan->jumlah_barang_akhir;
			$detail_akhir->flag = 1;
			$detail_akhir->save();

			app('App\Http\Controllers\LogController')->logBarangPotong($barang_baru->id,$detail_akhir->jumlah,$detail_akhir->id);
		}
		else
		{
			$barang_akhir->jumlah += $pemotongan->jumlah_barang_akhir;
			$barang_akhir->save();

			$detail_akhir = new PemotonganDetail;
			$detail_akhir->pemotongan_id = $pemotongan->id;
			$detail_akhir->barang_detail_id = $barang_akhir->id;
			$detail_akhir->jumlah = $pemotongan->jumlah_barang_akhir;
			$detail_akhir->flag = 1;
			$detail_akhir->save();

			app('App\Http\Controllers\LogController')->logBarangPotong($barang_akhir->id,$detail_akhir->jumlah,$detail_akhir->id);
		}

		

		array_push($data,$detail_akhir);
		
		return $data;
    }

    /*private function log($barang,$kuantitas,$pemotongan)
    {	
    	$detail = BarangDetail::where('id',$barang)->orderBy('harga_beli','asc')->first();
    	$log = new LogBarang;
    	$log->barang_detail_id = $detail->id;
    	$log->jumlah = $kuantitas;
    	$log->flag = 3;
    	$log->pemotongan_id = $pemotongan->id;
    	$log->save();
    	return $log;
    }*/
}
