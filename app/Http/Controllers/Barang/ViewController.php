<?php

namespace App\Http\Controllers\Barang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang;
use App\BarangDetail;
use DOMPDF;
use Carbon\Carbon;
class ViewController extends Controller
{
    public function index()
    {	
        $acc = Barang::all();
    	return view('barang',['acc'=>$acc])->with('nav','barang');
    }

    public function tambah()
    {
    	return view('tambahbarang')->with('nav','barang');
    }

    public function tambahDetail($id)
    {   
        $data['id'] = $id;
        return view('tambahdetailbarang',$data)->with('nav','barang');
    }

    public function detail($id)
    {
    	$data['detail'] = BarangDetail::where('barang_id',$id)->get();
        $data['id'] = $id;
    	return view('barangdetail',$data)->with('nav','barang');
    }

    public function printStok()
    {   
        $data['barang'] = Barang::all();
        $data['tanggal'] = Carbon::now()->format('d-M-Y');
        $pdf = DOMPDF::loadView('amik.print-stok',['data'=>$data]);
        return $pdf->stream('print.pdf'); 
    }
}
