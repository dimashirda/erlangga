<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class Generator extends Controller
{
    public function generate()
    {   
        // Carbon::setLocale('id');
        setlocale(LC_TIME,'id');
        // dd(Carbon::now()->formatLocalized('%A, %d %B %Y'));
        $start = Carbon::createFromFormat('d/m/Y','1/1/2018');
        $end = Carbon::createFromFormat('d/m/Y','1/12/2018');
        $awal = $start->startOfMonth();
        $akhir = $end->endOfMonth();
        // dd($awal,$akhir);
        $period = CarbonPeriod::create($start,$end);
        $result = [];
        $mt = '';
        $mn = '';
        foreach ($period as $date) 
        {   
            $temp = $date->format('d/m/Y');
            $tanggal = Carbon::createFromFormat('d/m/Y',$temp)->formatLocalized('%A, %d %B %Y');
            $hari = Carbon::createFromFormat('d/m/Y',$temp)->formatLocalized('%A');
            if($hari == 'Minggu')
            continue;
            $mn = Carbon::createFromFormat('d/m/Y',$temp)->formatLocalized('%B');
            if($mn != $mt)
            {
                $mt = $mn;
                echo nl2br("\n");
            }
            // dd($tanggal);
            echo nl2br($tanggal."\n");
            // array_push($result,$tanggal);
        }
        // dd($result); 
    }
}
