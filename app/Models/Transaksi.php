<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
       'pemesan_id','tanggal' ,'rekening','bukti','reservasi_id'
    ];

    public function reservasis(){
    	return $this->hasOne('App\Models\Reservasi','id','reservasi_id');
    }

}
