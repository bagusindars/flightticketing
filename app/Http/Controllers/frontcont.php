<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rute;
use App\Models\Kota;
use Illuminate\Support\Facades\DB;
use App\Models\Transportations;
use Carbon\Carbon;

class frontcont extends Controller
{
    public function index(){
    	$kota = Kota::all();
    	return view('index',compact('kota'));
    }

    public function jadwal(Request $request){
    	// $cari = urlencode($request->input('search'));
    	
        $rute = new Rute;
        $kota = Kota::orderBy('nama')->get();

    	$rt = $request->rute_to;
    	$rf = $request->rute_from;
    	$penumpang = $request->penumpang;

        $hasilrt = str_replace("+", " " , $rt);
        $hasilrf = str_replace("+", " " , $rf);

        $hasildepart = date("Y-m-d",strtotime($request->depart_at));
        if( !empty($hasilrf) && !empty($hasilrt) &&  !empty($hasildepart) ){

            $rute = Rute::where('rute_to','like','%'.$hasilrt.'%')
                            ->Where('rute_from','like','%'.$hasilrf.'%')
                            ->Where('depart_at','like','%'.$hasildepart.'%')
                            ->whereRaw('(kursi-'.$penumpang.') > 0')
                            ->orderBy('depart_at')->get();

           
        }	

        else
             // $rute = Rute::whereDate('depart_at','>=' , DB::raw('CURDATE()'))->get();
        	$rute = Rute::where('rute_from',15)->where('rute_to',10)->whereRaw('(kursi-1) > 0' )->whereDate('depart_at','=' , DB::raw('CURDATE()'))->orderBy('depart_at')->get();
    	return view('ui.jadwal',compact('rute','ruteto','rutefrom','rutedes','kota'));
    }



    public function pemesanan(Request $request,$id){
    	$penumpang = $request->penumpang;

    	if($penumpang > 7 ){
    		$penumpang = 1;
    		$rute = Rute::whereRaw('kursi - '.$penumpang.' > 0')->find($id);
    		return redirect('/pemesanan/'.$id.'?penumpang='.$penumpang);
    	}
    	
    	$rute = Rute::whereRaw('kursi - '.$penumpang.' > 0')->find($id);

    	return view('UI.pemesanan',compact('rute'));
    }




}
