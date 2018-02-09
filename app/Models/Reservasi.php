<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $fillable = [
       'kode' ,'bank' ,'pemesan_id' ,'rute_id' ,'price'
    ];


     public function rutes(){
        return $this->hasOne('App\Models\Rute','id','rute_id');
    }

    public function pemesans(){
    	return $this->hasOne('App\Models\Pemesan','id','pemesan_id');
    }

    public function transaksis(){
    	return $this->belongsTo('App\Models\Transaksi');
    }
}
