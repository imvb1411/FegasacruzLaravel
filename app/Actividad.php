<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
<<<<<<< HEAD
    //
    protected $table='actividad';

    public $timestamps = false;
=======
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
>>>>>>> 620bfe4c4c6c479abc7048de253d9ee031eb563a
}
