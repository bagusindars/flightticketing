<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesan extends Model
{
     protected $fillable = [
     	'nama' ,'email','alamat','phone' , 'gender','token','kode','rute_id'
     ]; 

     public function rutes(){
        return $this->hasOne('App\Models\Rute','id','rute_id');
     }

     public function customers(){
        return $this->hasMany('App\Models\Customer','pemesan_id');
     }
}

