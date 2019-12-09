<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Actividad extends Model implements Searchable
{
    protected $table='actividad';
    public $timestamps = false;
    protected $primaryKey='id';
    protected $fillable=[
        'nombre',
        'codigo',
        'descripcion',
        'fecha_reg',
        'fecha_mod',
        'estado'
    ];

    public function getSearchResult(): SearchResult
    {
        $url=route('actividad.buscar',$this->nombre);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->nombre,
            $url
        );
    }
}
