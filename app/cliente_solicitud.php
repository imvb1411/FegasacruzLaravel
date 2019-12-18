<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente_solicitud extends Model
{
    //
    protected $table='cliente_solicitud';
    public $timestamps = false;

    protected $fillable = [
        'solicitud701_id',
        'detallerubro_id',
        'registrador_id',
        'valor',
        'estado'
    ];

    public function detalleRubro(){
        $this->belongsTo('App\Detalle_rubro', 'detallerubro_id', 'id');
    }

    public function solicitud280(){
        $this->belongsTo('App\Solicitud701', 'solicitud701_id', 'id');
    }
}
