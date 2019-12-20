<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class solicitud701 extends Model
{
    //
    protected $table='solicitud701';
    public $timestamps = false;

    protected $fillable = [
        'ddjj_original',
        'folio',
        'nro_titulopropiedad',
        'estado',
        'solicitud_id',
    ];
    
    public function clienteSolicitud(){
        return $this->hasMany('App\Cliente_solicitud')->orderBy('detallerubro_id','asc');
    }
}
