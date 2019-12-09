<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table='ubicacion';
    protected $primaryKey='id';
    protected $fillable=[
        'ubicacion_id',
        'nombre',
        'tipo',
        'fecha_reg',
        'fecha_mod',
        'estado'
    ];
    public $timestamps=false;

}
