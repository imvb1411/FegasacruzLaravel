<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table='configuracion';
    public $timestamps=false;

    public function ui(){
        return $this->hasOne('\App\UI','id','ui_id');
    }
}
