<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Solicitud extends Model implements Searchable
{
    //
    protected $table='solicitud';
    public $timestamps = false;

    protected $fillable = [
        'actividad_id',
        'cliente_id',
        'registrador_id',
        'ubicacion_id',
        'tipo_solicitud',
        'nro_orden',
        'gestion',
        'nro_hectareas',
        'fecha_solicitud',
        'fecha_finalizacion',
        'estado'
    ];

    public function scopeActive($consulta){
        return $consulta->where('estado', 1);
    }

    public function scopeSearch($consulta, $texto){
        $consulta->where('nro_orden','ilike','%'.$texto.'%');
    }

    public function getSearchResult(): SearchResult
    {
        //$url = route('cliente.index',$this->nombre);
        $url=route('solicitud.buscar',$this->id);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->descripcion,
            $url
        );
    }
    public function cliente(){
        return $this->belongsTo('App\Persona','cliente_id','id');
    }
    public function actividad(){
        return $this->belongsTo('App\Actividad','actividad_id','id');
    }

    public function titulo(){
        return $this->hasOne(Titulo::class);
    }
    public function personal(){
        return $this->belongsTo('App\Personal','registrador_id','id');
    }
    public function ubicacion(){
        return $this->belongsTo('App\Ubicacion','ubicacion_id','id');
    }

    public function solicitud280(){
        return $this->hasOne('App\Solicitud280','ubicacion_id','id');
    }

}
