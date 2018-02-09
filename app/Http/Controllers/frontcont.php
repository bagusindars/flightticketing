<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rute;
use App\Models\Kota;
use App\Models\Customer;
use App\Models\Pemesan;
use Illuminate\Support\Facades\DB;
use App\Models\Transportations;
use App\Models\Reservasi;
use App\Models\Transaksi;
use Carbon\Carbon;
use Session;
use Auth;

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
                            ->whereDate('depart_at','>=' , DB::raw('CURDATE()'))
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
    	$rute = Rute::whereDate('depart_at','>=' , DB::raw('CURDATE()'))->findOrFail($id);
    	if($penumpang > 7){
    		$penumpang = 1;
    		$rute = Rute::whereDate('depart_at','>=' , DB::raw('CURDATE()'))->whereRaw('kursi - '.$penumpang.' > 0')->find($id);
    		return redirect('/pemesanan/'.$id.'?penumpang='.$penumpang);
    	}
    	
    	$rute = Rute::whereRaw('kursi - '.$penumpang.' > 0')->find($id);
    	
    	return view('UI.pemesanan',compact('rute'));
    }


    public function pemesananreg(Request $request,$id){
 
    	$penumpang = $request->penumpang;
    	$rute = Rute::whereDate('depart_at','>=' , DB::raw('CURDATE()'))->whereRaw('kursi - '.$penumpang.' > 0')->findOrFail($id);
    	if($penumpang > 7){
    		$penumpang = 1;
    		$rute = Rute::whereDate('depart_at','>=' , DB::raw('CURDATE()'))->whereRaw('kursi - '.$penumpang.' > 0')->find($id);
    		return redirect('/pemesanan/'.$id.'/detail?penumpang='.$penumpang);
    	}

    	
    	return view('UI.pemesananreg1',compact('rute'));


    }


    public function inputcustomer(Request $request,$id){
    	Session::put('reservasi', 1);

    	$penumpang = $request->penumpang;
    	if(Auth::guest()){
	    	$pemesan = Pemesan::create([
	    		'nama' => $request->namapemesan,
	    		'email' => $request->emailpemesan,
	    		'gender' => $request->genderpemesan,
	    		'alamat' => $request->alamatpemesan,
	    		'phone' => $request->phonepemesan,
	    		'token' => $request->_token,
	    		'kode' => $request->kode,
	    		'rute_id' => $id,
	    	]);
	    	
	    }else{
	    	$pemesan = Pemesan::create([
	    		'nama' => Auth::user()->name,
	    		'email' => Auth::user()->email,
	    		'gender' => Auth::user()->gender,
	    		'alamat' => Auth::user()->alamat,
	    		'phone' => Auth::user()->phone,
	    		'token' => $request->_token,
	    		'kode' => $request->kodepemesanuser,
	    		'rute_id' => $id,
	    	]);
	    }
	    if(Auth::guest())
	    	$orang = Pemesan::where('token'	,$request->_token)->where('email',$request->emailpemesan)->first();
	    else
	    	$orang = Pemesan::where('token'	,$request->_token)->where('email',Auth::user()->email)->first();
    	for ($i=1; $i <= $request->penumpang ; $i++) { 
    		Customer::create([
    			'nama' => $request->namacustomer[$i],
    			'pemesan_id' => $orang->id,
    			'token' => $request->_token,
    			'gender' => $request->gendercustomer[$i],
                'rute_id' => $orang->rute_id,
    		]);
    	}

    	return redirect('/pemesanan/'.$orang->rute_id.'/detailstp2?rute='.$orang->rute_id);
    }

    public function cekcustomer(Request $request,$id){

    	$emailpemesan = $request->emailpemesan;
    	$kodepemesan = $request->kodepemesan;
    	$allcus = Customer::where('rute_id',$id)->get();


    	//  if(!Session::has('reservasi') || Session::get('reservasi') != 1 || empty($request)) {
    	// 	return redirect('/jadwal');
    	// }else
    		$penumpang = $request->penumpang;
    		$rute = Rute::whereDate('depart_at','>=' , DB::raw('CURDATE()'))->findOrFail($id);
	    	if($penumpang > 7){
	    		$penumpang = 1;
	    		$rute = Rute::whereDate('depart_at','>=' , DB::raw('CURDATE()'))->whereRaw('kursi - '.$penumpang.' > 0')->find($id);
	    		return redirect('/jadwal');
	    	}else
                
	    		if(!empty($emailpemesan) || !empty('kodepemesan')){
                    $pemesan = Pemesan::where('email',$emailpemesan)->where('kode',$kodepemesan)->where('rute_id',$id)->first();
		    		if(!empty($pemesan)){

		    			$customer = Customer::where('pemesan_id',$pemesan->id)->where('token',$pemesan->token)->get();}
		    		else
		    			$pesan = "Email / Kode tidak terdaftar";
		    		return view('ui.pemesananreg2',compact('rute','pemesan','customer','pesan','allcus'));
		    	}else
	    			return view('ui.pemesananreg2',compact('rute'));

    }
   

   public function pilihkursi(Request $request,$id){
   		$pemesan = Pemesan::where('email',$request->emailpemesan)->where('kode',$request->kodepemesan)->first();
   		$kursi = $request->seat;
   		$customer = Customer::where('token',$pemesan->token)->where('pemesan_id',$pemesan->id)->get();
   		$count = 0;
        if($customer->kursi = null){
            $rute->update([
                'kursi' => $rute->kursi - count($customer->where('kursi','!=',null)),
            ]);
        }
   		foreach ($customer as $cus) {
   			$cus->update([
   				'kursi' => $kursi[$count],
   			]);
   			$count++;
   		}

        $rute = Rute::where('id',$id)->first();


        Session::put('reservasi', 2);
   		return redirect('/pemesanan/'.$id.'/detailstp3?emailpemesan='.$pemesan->email.'&kodepemesan='.$pemesan->kode);
   }


   public function konfirmasi(Request $request,$id){
        // if(!Session::has('reservasi') || Session::get('reservasi') != 2 || empty($request)) {
        //     return redirect('/jadwal');
        // }else{

            $pemesan = Pemesan::where('email',$request->emailpemesan)->where('kode',$request->kodepemesan)->where('rute_id',$id)->first();

            $customer = Customer::where('token',$pemesan->token)->where('pemesan_id',$pemesan->id)->get();
            $allcus = Customer::where('rute_id',$id)->get();
            $rute = Rute::whereDate('depart_at','>=' , DB::raw('CURDATE()'))->whereRaw('kursi - '.count($customer).' > 0')->find($id);
            return view('ui.pemesananreg3',compact('pemesan','customer','rute','allcus'));
        // }

   }

   public function pembayaran(Request $request, $id){
        $pemesan = Pemesan::where('email',$request->emailpemesan)->where('kode',$request->kodepemesan)->where('rute_id',$id)->first();
        $customer = Customer::where('token',$pemesan->token)->where('pemesan_id',$pemesan->id)->get();
        $rute = Rute::whereDate('depart_at','>=' , DB::raw('CURDATE()'))->whereRaw('kursi - '.count($customer).' > 0')->find($id);
        return view('ui.pembayaran',compact('pemesan','customer','rute'));
   }


   public function konfirmasipembayaraninput(Request $request,$id){

     
     $pemesan = Pemesan::where('email',$request->emailpemesan)->where('kode',$request->kodepemesan)->where('rute_id',$id)->first();
     $customer = Customer::where('token',$pemesan->token)->where('pemesan_id',$pemesan->id)->get();
     $rute = Rute::whereDate('depart_at','>=' , DB::raw('CURDATE()'))->whereRaw('kursi - '.count($customer).' > 0')->find($id);
     $reservasi = new Reservasi;
     $reservasi->create([
        'kode' => $request->kode,
        'pemesan_id' => $pemesan->id,
        'rute_id' => $id,
        'price' => ($rute->harga*count($customer)),
        'bank' => $request->bank

     ]);
     return redirect('/konfirmasi')->with('berhasil','Pemesanan tiket berhasil. Silahkan konfirmasi pembayaran');

   }


   public function konfirmasipembayaran(Request $request){
        if(empty($request))
            return redirect('/konfirmasi');
        else
            $email = $request->email;
            $kode = $request->kode;
            $pemesan = Pemesan::where('email',$email)->get();
            $orang = array();

            foreach ($pemesan as $pes) {
                $orang[] = $pes->id;
            }


            $reservasi = Reservasi::where('kode',$kode)->whereHas('pemesans',function($query) use ($email){
                $query->where('email',$email);
            })->first();
            
            if($reservasi == null){
                $pesan = 'Tidak terdaftar';
            }
        return view('ui.konfirmasi',compact('reservasi','pesan'));
   }

   public function inputtransaksi(Request $request){
         $email = $request->email;
            $kode = $request->kode;
         $reservasi = Reservasi::where('kode',$kode)->whereHas('pemesans',function($query) use ($email){
                $query->where('email',$email);
            })->first();
            
        $file = $request->file('bukti');
        $filenames = $file->getClientOriginalName();
                    $filenames = $string = preg_replace('/\s+/', '', $filenames);
                    $extension = $file->getClientOriginalExtension();
                    $picture = date('His').$filenames;
                    $destinationPath = public_path('img/');
                    $file->move($destinationPath, $picture);
        $transaksi = new Transaksi;
        $transaksi->create([
            'pemesan_id' => $reservasi->pemesans->id,
            'tanggal' => $request->tgl,
            'bukti' => $picture,
            'rekening' => $request->rekening,
            'reservasi_id' => $reservasi->id,
        ]);
        if($transaksi){
            $pesanber = "Berhasil mengirim bukti pembayaran. Menunggu admin konfirmasi";
        }else{
            $pesangal = "Gagal mengirim bukti pembayaran";
        }
        return view('ui.konfirmasi',compact('pesanber','pesangal','reservasi'));
   }

}
