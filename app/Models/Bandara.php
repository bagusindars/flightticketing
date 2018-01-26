<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bandara extends Model
{
     protected $fillable = [
     	'nama_bandara' , 'kota_id'
     ];

     public function kota(){
     	 return $this->hasOne('App\Models\Kota','id');
     }
}
