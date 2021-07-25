<?php

namespace App\Http\Controllers\Barang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang;
use App\BarangDetail;
use App\Jenis;
use DOMPDF;
use Carbon\Carbon;
class ViewController extends Controller
{
    public function index()
    {	
        $acc = Barang::all();
        $jenis_barang = Jenis::all();
    	return view('barang',['acc'=>$acc,'jenis_barang'=>$jenis_barang])->with('nav','barang');
    }

    public function tambah()
    {   
        $data['jenis'] = Jenis::all();
    	return view('tambahbarang',$data)->with('nav','barang');
    }

    public function tambahDetail($id)
    {   
        $data['id'] = $id;
        return view('tambahdetailbarang',$data)->with('nav','barang');
    }

    public function detail($id)
    {   
        $barang = Barang::where('id',$id)->first();
    	$data['detail'] = BarangDetail::where('barang_id',$id)->get();
        $data['id'] = $id;
        // dd($data);
    	return view('barangdetail',$data)->with('nav','barang');
    }

    public function printStok(Request $request)
    {   
        if(!empty($request->flag)) 
        {
            $data['flag'] = $request->flag;
        }
        $data['barang'] = Barang::all();
        $data['tanggal'] = Carbon::now()->format('d-M-Y');
        // dd($data);
        $pdf = DOMPDF::loadView('amik.print-stok',['data'=>$data]);
        return $pdf->stream('print.pdf'); 
    }
}
