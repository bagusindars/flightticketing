<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $fillable = [
    	'nama' 
    ];

    public function bandara(){
    	return $this->hasMany('App\Models\Bandara','kota_id');
    }
    
   	public function rutes(){
    	return $this->belongsTp('App\Models\Rute');
    }
    
}
