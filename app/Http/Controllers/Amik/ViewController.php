<?php

namespace App\Http\Controllers\Amik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DOMPDF;

class ViewController extends Controller
{
	public function printSuratJalan()
	{
		$data = null;
		$pdf = DOMPDF::loadView('amik.print-surjal');
		return $pdf->stream('print.pdf',['data'=>$data]);    	
	}

	public function printFaktur()
	{
		$data = null;
		$pdf = DOMPDF::loadView('amik.print-faktur',['data'=>$data]);
		return $pdf->stream('print.pdf');    	
	}

	public function printLaporanStok()
	{
		$data = null;
		$pdf = DOMPDF::loadView('amik.print-stok',['data'=>$data]);
		return $pdf->stream('print.pdf');    	
	}
}
