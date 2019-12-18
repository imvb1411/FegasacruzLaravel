<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class solicitud280 extends Model
{
    //
    protected $table='solicitud280';
    public $timestamps = false;

    public function Solicitud(){
        return $this->hasOne('App\Solicitud','id','id');
    }
}
