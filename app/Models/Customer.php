<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     protected $fillable = [
     	'nama' ,'pemesan_id' ,'token' , 'gender','kursi','rute_id',
     ];

     public function pemesans(){
     	return $this->hasOne('App\Models\Pemesan','id');
     }

    
    
}

