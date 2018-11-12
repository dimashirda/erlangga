<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;

class ViewController extends Controller
{
    public function index()
    {
    	$acc = Supplier::paginate(25);
    	return view('supplier',['acc'=>$acc])->with('nav','supplier');
    }
    public function tambah()
    {
    	return view('tambahsupplier')->with('nav','supplier');
    }
}
