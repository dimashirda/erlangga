<?php

namespace App\Http\Controllers\Pembelian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PostController extends Controller
{
    public function beli(Request $request)
    {
    	$data = $request->all();
    	//dd($data);
    	$pembelian = app('App\Http\Controllers\Pembelian\CreateController')->create($data);
    	return redirect('/pembelian/detail/'.$pembelian->id.'');
    }
}
