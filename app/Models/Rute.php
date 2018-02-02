<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transportation;
use App\Models\Bandara;
use App\Models\Kota;
use Carbon\Carbon;

class Rute extends Model
{
    protected $fillable = [
        'depart_at', 'rute_from','bandara1','rute_to','bandara2','harga','transport_id','arrive_at','kursi',
    ];

    public function bandara(){
        return $this->hasMany('App\Models\Bandara','id');
    }

    public function plane(){
        return $this->belongsTo('App\Models\Transportation','transport_id');
    }

    public function from(){
        return $this->belongsTo('App\Models\Kota','rute_from');
    }

    public function to(){
        return $this->belongsTo('App\Models\Kota','rute_to');
    }

    public function band1(){
        return $this->belongsTo('App\Models\Bandara','bandara1');
    }

    public function band2(){
        return $this->belongsTo('App\Models\Bandara','bandara2');
    }


  
   
}
