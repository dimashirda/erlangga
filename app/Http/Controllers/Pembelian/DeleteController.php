<?php

namespace App\Http\Controllers\Pembelian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pembelian;
use App\Pembelian_detail;
class DeleteController extends Controller
{
    public function delete($data)
    {   
        // dd($data);
        $Pembelian = Pembelian::where('id',$data['id'])->first();
        $this->deletedetail($Pembelian->id);
        $Pembelian->delete();
        return;
    }

    public function deletedetail($id)
    {
        $detail = Pembelian_detail::where('pembelian_id',$id)->get();
        // dd($detail);
        foreach ($detail as $item) 
        {   
            app('App\Http\Controllers\LogController')->rollBack($item,1);
            $item->delete();
        }
        return;
    }
}
