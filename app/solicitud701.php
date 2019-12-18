<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class solicitud701 extends Model
{
    //
    protected $table='solicitud701';
    public $timestamps = false;

    
    public function clienteSolicitud(){
        return $this->hasMany('App\Cliente_solicitud');
    }
}
