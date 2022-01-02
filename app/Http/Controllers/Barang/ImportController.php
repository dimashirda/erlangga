<?php

namespace App\Http\Controllers\Barang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang;
use App\BarangDetail;
use App\Pelanggan;
use App\Supplier;
use App\Jenis;
use DB;
class ImportController extends Controller
{
    public function importBarang()
    {   
        ini_set('max_execution_time', 0);
        $file = fopen("stock-baru.csv","r");
        $data = fgetcsv($file);
        while(!feof($file))
        {
        	$data = fgetcsv($file);
            dd($data);
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
    public function updateImport()
    {
        DB::beginTransaction();
        try {
            $file = fopen("stock-baru.csv","r");
            $data = fgetcsv($file);
            $nama_kosong = [];
            while(!feof($file))
            {
                $data = fgetcsv($file);
                $barang = Barang::where('nama',$data[0])->first();
                if (empty($barang)) {
                    array_push($nama_kosong,$data[0]);
                }
                else
                {
                    $detail = new BarangDetail;
                    $detail->barang_id = $barang->id;
                    $detail->jumlah = $data[4];
                    $detail->harga_beli = $data[3];
                    $detail->save();    
                }
            }
            DB::commit();
            dd($nama_kosong);
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

    public function importJenis()
    {
        DB::beginTransaction();
        try {
            $file = fopen("barang_jenis.csv","r");
            //$data = fgetcsv($file);
            $nama_kosong = [];
            while(!feof($file))
            {
                $data = fgetcsv($file);
                // dd($data);
                $barang = Barang::where('nama',$data[0])->first();
                // dd($barang);
                if (empty($barang)) {
                    array_push($nama_kosong,$data[0]);
                }
                else
                {   
                    $jenis = Jenis::where('nama',$data[2])->first();
                    // dd($jenis);
                    $barang->jenis = $jenis->id;
                    $barang->save();
                }
            }
            DB::commit();
            dd($nama_kosong);
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

    public function importPelanggan()
    {
        DB::beginTransaction();
        try {
            $file = fopen('data-pelanggan.csv','r');
            $data = fgetcsv($file);
            $flag = 0;
            while (!feof($file)) 
            {
                if($flag == 0)
                {
                    $flag ++;
                    continue;
                }
                $data = fgetcsv($file);
                dd($data);
                $pelanggan = new Pelanggan;          
                $pelanggan->nama = $data[0];
                $pelanggan->alamat = $data[1];
                $pelanggan->telepon = $data[2];
                $pelanggan->kota = $data[3];
                $pelanggan->limit = $data[4];
                $pelanggan->save();
            }
            DB::commit();
            echo "success";
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

    public function importSuplier()
    {
        DB::beginTransaction();
        try {
            $file = fopen('data-suplier.csv','r');
            $data = fgetcsv($file);
            $flag = 0;
            while (!feof($file)) 
            {
                if($flag == 0)
                {
                    $flag ++;
                    continue;
                }
                $data = fgetcsv($file);
                $suplier = new Supplier;
                $suplier->nama = $data[0];
                $suplier->alamat = $data[1];
                $suplier->telepon = $data[2];
                $suplier->kota = $data[3];
                $suplier->save();
            }
            DB::commit();
            echo "success";
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

    public function stokOpname()
    {
        DB::beginTransaction();
        try {
            $file = fopen('stok2021.csv','r');
            $data = fgetcsv($file);
            while (!feof($file)) 
            {   
                $data = fgetcsv($file);
                if(empty($data))
                {
                    break;
                }
                $barang = Barang::where('id',$data[0])->first();
                if(!empty($barang))
                {
                    $detail = BarangDetail::where('barang_id',$barang->id)->get();
                    if(!empty($detail))
                    {
                        foreach ($detail as $d) {
                            $d->jumlah = 0;
                            $d->save();
                        }
                        $detail = BarangDetail::where('barang_id',$barang->id)->orderBy('harga_beli','DESC')->first();
                        $detail->jumlah = $data[5];
                        $detail->save();    
                    }
                    else
                    {
                        continue;
                    }
                }
                else
                {
                    continue;
                }
                          
            }
            DB::commit();
            echo "done";    
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }
}
