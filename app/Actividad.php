<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table='actividad';
    protected $primaryKey='id';
    protected $fillable=[
        'nombre',
        'codigo',
        'descripcion',
        'fecha_reg',
        'fecha_mod',
        'estado'
    ];
    public $timestamps=false;
}
