<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Pelanggan;
use Illuminate\Http\Request;

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
            $a->nama_pelanggan = $req->input('nama_pelanggan');
            $a->alamat_pelanggan = $req->input('alamat');
            $a->kota = $req->input('kota');
            $a->no_telepon = $req->input('nomor');
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
        $edit->nama_pelanggan = $data['nama_pelanggan'];
        $edit->alamat_pelanggan = $data['alamat'];
        $edit->kota = $data['kota'];
        $edit->no_telepon = $data['nomor'];
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
}
