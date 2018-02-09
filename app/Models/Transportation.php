<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    protected $fillable = [
        'logo','code', 'name', 'description','seat_qty',
    ];


     public function rutes(){
        return $this->hasMany('App\Models\Rute');
    }
}
