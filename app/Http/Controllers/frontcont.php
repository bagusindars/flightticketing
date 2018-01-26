<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rute;
use Illuminate\Support\Facades\DB;
use App\Models\Transportations;

class frontcont extends Controller
{
    public function index(){
    	$ruteto = Rute::groupBy('rute_to')->get(['rute_to']);
    	$rutefrom = Rute::groupBy('rute_from')->get(['rute_from']);
    	return view('index',compact('ruteto','rutefrom'));
    }

    public function jadwal(Request $request){
    	// $cari = urlencode($request->input('search'));
    	
        $rute = new Rute;
        $ruteto = Rute::groupBy('rute_to')->get(['rute_to']);
    	$rutefrom = Rute::groupBy('rute_from')->get(['rute_from']);

    	$rt = $request->rute_to;
    	$rf = $request->rute_from;
    	
        $hasilrt = str_replace("+", " " , $rt);
        $hasilrf = str_replace("+", " " , $rf);

        $hasildepart = date("Y-m-d",strtotime($request->depart_at));
        if( !empty($hasilrf) && !empty($hasilrt) &&  !empty($hasildepart) ){

        	
            $rute = Rute::where('rute_to','like','%'.$hasilrt.'%')
                            ->Where('rute_from','like','%'.$hasilrf.'%')
                            ->Where('depart_at','like','%'.$hasildepart.'%')
                            ->get();

        }

        else
             $rute = Rute::get();
 
    	return view('ui.jadwal',compact('rute','ruteto','rutefrom'));
    }

}
