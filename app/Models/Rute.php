<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transportation;

class Rute extends Model
{
    protected $fillable = [
        'depart_at', 'rute_from', 'rute_to','harga','transport_id','arrive_at',
    ];

     public function plane(){
        return $this->belongsTo('App\Models\Transportation','transport_id');
    }

}
