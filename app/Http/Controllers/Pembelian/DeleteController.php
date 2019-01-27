<?php

namespace App\Http\Controllers\Pembelian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang;

class DeleteController extends Controller
{
    public function delete(Request $data, $id_barang)
    {
        $del = Barang::where('id',$id_barang);
        if($del->delete()){        
            $data->session()->flash('alert-success', 'Data barang berhasil dihapus.');
            return redirect ('/barang');
        }
        else{
            $data->session()->flash('alert-danger', 'Data barang gagal dihapus.');
            return redirect ('/barang');
        }
    }
}
