<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transportation;
use App\Models\Rute;
use App\Models\User;
use App\Models\Kota;
use App\Models\Bandara;
use Carbon\Carbon;

class AdminController extends Controller
{

    // ============================================================================ AIR LIST
    public function create(){
    	return view('admin.create.al');
    }

    public function viewallAL(){
    	$kendaraan = Transportation::all();
    	return view('admin.manage.airlist',compact('kendaraan'));
    }

    public function store(Request $request){

    	Transportation::create([
    		'code' => $request->code,
    		'name' => $request->name,
    		'description' => $request->deskripsi,
    		'seat_qty' => $request->total_seat,
    	]);

    	return redirect()->back()->with('berhasil','Berhasil mendaftarkan pesawat');

    }

    public function edit($id){
    	$plane = Transportation::findOrFail($id);
    	return view('admin.manage.airlist_u',compact('plane'));
    }

    public function show(Request $request,$id){

        $plane = Transportation::find($id);
    
        $plane->update([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->deskripsi,
            'seat_qty' => $request->total_seat,
        ]);

        $plane->save();
        return redirect('admin/mairlist/')->with('berhasil','Berhasil update daftar pesawat');
    }

   public function delete($id){

         $plane = Transportation::find($id);
         $plane->delete();
         return redirect()->back();
   }




   // ==================================================================== RUTE

   public function createrute(){
        $planes = Transportation::all();
        $kotas = Kota::with('bandara')->get();
        $bandaras = Bandara::get();

        return view('admin.create.rt',compact('planes','kotas','bandaras'));
    }
    public function getBandara1($id) {
        $bandaras = Bandara::where("kota_id",$id)->pluck("id","nama_bandara","iso");
        return json_encode($bandaras);
    }
    public function getBandara2($id) {
        $bandaras = Bandara::where("kota_id",$id)->pluck("id","nama_bandara","iso");
        return json_encode($bandaras);
    }
    public function getKursi($id) {
        $kursi = Transportation::where("id",$id)->pluck("seat_qty","name");
        return json_encode($kursi);
    }


    public function viewallRute(){

        $rutes  = Rute::with('plane')->orderBy('depart_at')->get();
        return view('admin.manage.rute',compact('rutes'));
    }


    public function storerute(Request $request){

        Rute::create([
            'depart_at' => $request->depart_at,
            'arrive_at' => $request->arrive_at,
            'rute_from' => $request->rute_from,
            'bandara1' => $request->bandara1,
            'rute_to' => $request->rute_to,
            'bandara2' => $request->bandara2,
            'harga' => $request->price,
            'kursi' => $request->kursi,
            'transport_id' => $request->plane,
        ]);

        return redirect()->back()->with('berhasil','Berhasil mendaftarkan rute');

    }

    public function editrute($id){
        $rute = Rute::findOrFail($id);
        $kotas = Kota::with('bandara')->get();
        $plane = Transportation::all();
        return view('admin.manage.rute_u',compact('rute','plane','kotas'));
    }

    public function showrute(Request $request,$id){

        $plane = Rute::find($id);
        $tgltiba = date("Y-m-d H:i:s",strtotime($request->arrive_at));
  
        $plane->update([
            'depart_at' => $request->depart_at,
            'arrive_at' => $tgltiba,
            'rute_from' => $request->rute_from,
            'bandara1' => $request->bandara1,
            'rute_to' => $request->rute_to,
            'bandara2' => $request->bandara2,
            'harga' => $request->harga,
            'kursi' => $request->kursi,
            'transport_id' => $request->plane,
        ]);

        $plane->save();
        return redirect('admin/mrute/')->with('berhasil','Berhasil update daftar pesawat');
    }

   public function deleterute($id){

         $rute = Rute::find($id);
         $rute->delete();
         return redirect()->back();
   }




   // ========================================================================================= USER
   public function viewallUser(){
        $users = User::get();
        return view('admin.manage.user',compact('users'));
   }

    public function deleteuser($id){

         $user = User::find($id);

         if($user->role == 'user')
             $user->delete();
         else
             return redirect()->back();
   }




   // =========================================================================================== KOTA
   public function createkota(){
        return view('admin.create.kt');
    }

    public function viewallKota(){

        $kotas  = Kota::with('bandara')->orderBy('nama')->get();
        return view('admin.manage.kota',compact('kotas'));
    }

    public function storekota(Request $request){

        
        if(Kota::where('nama',$request->nama)->exists()){
            return redirect()->back()->with('gagal','Kota sudah terdaftar');
        }else{
            Kota::create([
                'nama' => $request->nama,
            ]);
            return redirect()->back()->with('berhasil','Berhasil mendaftarkan kota');
        }
    }

    public function editkota($id){
        $kota = Kota::findOrFail($id);
        
        return view('admin.manage.kota_u',compact('kota'));
    }

    public function showkota(Request $request,$id){

        $kota = Kota::find($id);
    

        $kota->update([
            'nama' => $request->nama,
        ]);

        $kota->save();
        return redirect('admin/mkota/')->with('berhasil','Berhasil update daftar kota');
    }

   public function deletekota($id){

         $kota = Kota::find($id);
         $kota->delete();
         return redirect()->back();
   }




   // ========================================================================================== BANDARA
    public function createbandara(){
        $kotas = Kota::get();
        return view('admin.create.bd',compact('kotas'));
    }

    public function viewallbandara(){

        $bandaras  = Bandara::with('kotas')->orderBy('nama_bandara')->get();
        return view('admin.manage.bandara',compact('bandaras'));
    }

    public function storebandara(Request $request){

        Bandara::create([
            'nama_bandara' => $request->nama,
            'iso' => $request->iso,
            'kota_id' => $request->kota,
        ]);

        return redirect()->back()->with('berhasil','Berhasil mendaftarkan bandara');

    }

    public function editbandara($id){
        $bandara = Bandara::findOrFail($id);
        $kotas = Kota::get();
        return view('admin.manage.bandara_u',compact('bandara','kotas'));
    }

    public function showbandara(Request $request,$id){

        $bandara = Bandara::find($id);

        $bandara->update([
            'nama_bandara' => $request->nama,
            'iso' => $request->iso,
            'kota_id' => $request->kota,
        ]);

        $bandara->save();
        return redirect('admin/mbandara/')->with('berhasil','Berhasil update daftar bandara');
    }

   public function deletebandara($id){

         $bandara = Bandara::find($id);
         $bandara->delete();
         return redirect()->back();
   }



}


