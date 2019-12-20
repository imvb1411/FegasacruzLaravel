<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle_rubro extends Model
{
    protected $table='detalle_rubro';
    protected $fillable=[
        'id',
        'rubro_id',
        'codigo',
        'nombre'
    ];
    public $timestamps=false;
}
