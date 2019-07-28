<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Pelanggan;
use Illuminate\Http\Request;
use App\Penjualan;
use DataTables;
class PelangganController extends Controller
{
    public function index()
    {
    	$acc = Pelanggan::paginate(25);
    	return view('pelanggan',['acc'=>$acc])->with('nav','pelanggan');
    }
    public function tambah()
    {
    	/*if(Auth::User()->name == 'dimas')
    	{*/
    		return view('tambahpelanggan')->with('nav','pelanggan');	
    	/*}
    	else
    	{
    		return redirect('/home');
    	}*/
    }
     public function simpan(request $req)
    {   
        //dd($req);
        $cek = Pelanggan::where('id',$req->input('id_pelanggan'))->count();
        //dd($cek);
        if($cek > 0){
            $req->session()->flash('alert-danger', 'Data barang gagal ditambahkan. ID Pelanggan sudah digunakan!!.');
            return redirect ('/pelanggan');
        }
        else
        {   
            //dd($req); 
            $a = new Pelanggan();
            //$a->id = $req->input('id_pelanggan');
            $a->nama = $req->input('nama_pelanggan');
            $a->alamat = $req->input('alamat');
            $a->kota = $req->input('kota');
            $a->telepon = $req->input('nomor');
            $a->kredit = $req->input('kredit');
            $a->limit = $req->input('limit');

            if($a->save())
            {
                $req->session()->flash('alert-success', 'Data pelanggan telah ditambahkan.');
                return redirect ('/pelanggan');
            }
            else
            {
                $req->session()->flash('alert-danger', 'Data pelanggan gagal ditambahkan.');
                return redirect ('/pelanggan');
            }
        }
    }
    public function edit(request $data, $id_pelanggan)
    {
        $edit = Pelanggan::where('id',$id_pelanggan)->first();
        $edit->nama = $data['nama_pelanggan'];
        $edit->alamat = $data['alamat'];
        $edit->kota = $data['kota'];
        $edit->telepon = $data['nomor'];
        $edit->kredit = $data['kredit'];
        $edit->limit = $data['limit'];
        if($edit->save()){
            $data->session()->flash('alert-success', 'Data pelanggan berhasil diperbarui.');
            return redirect('/pelanggan');
        }
        else{
            $data->session()->flash('alert-danger', 'Data pelanggan gagal diperbarui.');
            return redirect('/pelanggan');
        }
    }
    public function delete(Request $data, $id_pelanggan)
    {
        $del = Pelanggan::where('id',$id_pelanggan);
        if($del->delete()){        
            $data->session()->flash('alert-success', 'Data pelanggan berhasil dihapus.');
            return redirect ('/pelanggan');
        }
        else{
            $data->session()->flash('alert-danger', 'Data pelanggan gagal dihapus.');
            return redirect ('/pelanggan');
        }
    }
    public function historiBelanja($id,$flag=1)
    {   
        if($flag == 1)
        {
            $acc = Penjualan::where('pelanggan_id',$id)
                        ->orderBy('tanggal_transaksi','desc')->paginate(10);    
        }
        else if($flag == 2)
        {   
            $acc = Penjualan::where('pelanggan_id',$id)
                        ->whereColumn('terbayar','<','total_akhir')
                        ->where('jenis_penjualan',1)
                        ->orderBy('tanggal_transaksi','desc')->paginate(10);
            //dd($acc);   
        }
        else
        {
            $acc = Penjualan::where('pelanggan_id',$id)
                        ->where('jenis_penjualan',2)
                        ->orWhereColumn('terbayar','>=','total_akhir')
                        ->orderBy('tanggal_transaksi','desc')->paginate(10);
        }
        $pelanggan_id = $id;
        return view('transaksi',['acc'=>$acc , 'flag'=>$flag , 'pelanggan_id'=>$pelanggan_id])->with('nav','pelanggan');
    }
    public function all()
    {
        $pelanggan = Pelanggan::all();
        return DataTables::of($pelanggan)
            ->addColumn('limit', function($pelanggan){
                return '<td>'.number_format($pelanggan->limit,2,",",".").'</td>';
            })
            ->addColumn('kredit', function($pelanggan){
                if(empty($pelanggan->kredit))
                        $kredit = 0;
                    else
                        $kredit = $pelanggan->kredit;
                return '<td>'.number_format($kredit,2,",",".").'</td>';
            })
            ->addColumn('detail', function($pelanggan){
                return '<td><a href="'.url('/pelanggan/detail/'.$pelanggan->id).'"><button type="button" class="btn btn-info">Detail</button></a></td>';
            })
            ->addColumn('aksi', function($pelanggan){
                if(Auth::User()->role == 1)
                {
                    if(empty($pelanggan->kredit))
                        $kredit = 0;
                    else
                        $kredit = $pelanggan->kredit;
                    return '<td align="center" width="30px">
                                <button type="button" class="btn btn-default edit-button" data-toggle="modal" data-target="#modal-default"
                                data-id="'.$pelanggan->id.'" data-name="'.$pelanggan->nama.'" data-alamat="'.$pelanggan->alamat.'" 
                                data-telpon="'.$pelanggan->telepon.'" data-kota="'.$pelanggan->kota.'" 
                                data-limit="'.$pelanggan->limit.'" data-kredit="'.$kredit.'">
                                    Edit
                                </button>
                            </td>
                            <td align="center" width="30px">
                                <button type="button" class="btn btn-danger delete-button" data-name="'.$pelanggan->nama.'" 
                                data-id="'.$pelanggan->id.'" data-toggle="modal" data-target="#modal-danger">
                                    Hapus
                                </button>
                            </td>';
                }   
                else
                    return;
            })
            ->escapeColumns([])
            ->make(true);
    }
}
