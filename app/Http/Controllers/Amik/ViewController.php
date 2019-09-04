<?php

namespace App\Http\Controllers\Amik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DOMPDF;

class ViewController extends Controller
{
	public function printSuratJalan()
	{
		$pdf = DOMPDF::loadView('amik.print-surjal');
		return $pdf->stream('print.pdf');    	
	}

	public function printFaktur()
	{
		$pdf = DOMPDF::loadView('amik.print-faktur');
		return $pdf->stream('print.pdf');    	
	}

	public function printLaporanStok()
	{
		$pdf = DOMPDF::loadView('amik.print-stok');
		return $pdf->stream('print.pdf');    	
	}
}
