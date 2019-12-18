<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Configuracion extends Model
{
    protected $table='configuracion';
    public $timestamps=false;

    public function ui(){
        return $this->hasOne('\App\UI','id','ui_id');

    }

    public function scopeTema($consulta){
        $consulta->where('personal_id', '=', Auth::user()->id)->where('estado', 1);
    }

    public function scopeDefault($consulta){
        $consulta->where('personal_id', '=', 0);
    }
}
