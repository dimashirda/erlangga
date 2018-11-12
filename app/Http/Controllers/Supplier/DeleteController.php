<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;

class DeleteController extends Controller
{
    public function delete(Request $data, $id_supplier)
    {
        $del = Supplier::where('id',$id_supplier);
        if($del->delete()){        
            $data->session()->flash('alert-success', 'Data supplier berhasil dihapus.');
            return redirect ('/supplier');
        }
        else{
            $data->session()->flash('alert-danger', 'Data supplier gagal dihapus.');
            return redirect ('/supplier');
        }
    }
}
