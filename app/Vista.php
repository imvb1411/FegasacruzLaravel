<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vista extends Model
{
    protected $table='vistas';
    protected $primaryKey='id';
    protected $fillable=[
        'nombre',
        'vistas',
        'fecha_reg',
        'fecha_mod',
        'estado'
    ];
    public $timestamps=false;
}
