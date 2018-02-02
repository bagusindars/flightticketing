<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bandara extends Model
{
     protected $fillable = [
     	'nama_bandara' ,'iso', 'kota_id'
     ];

     public function kotas(){
     	 return $this->hasOne('App\Models\Kota','id','kota_id');
     }

    
}

