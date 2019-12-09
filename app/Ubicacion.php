<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Ubicacion extends Model implements Searchable
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

    public function getSearchResult(): SearchResult
    {
        $url=route('ubicacion.buscar',$this->nombre);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->nombre,
            $url
        );
    }
}
