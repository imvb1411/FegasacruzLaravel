<?php

namespace App;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Titulo extends Model implements Searchable
{
    //
    protected $table='titulo';

    public $timestamps = false;

    public function getSearchResult(): SearchResult
    {
        //$url = route('cliente.index',$this->nombre);
        $url=route('titulo.buscar',$this->descripcion);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->descripcion,
            $url
        );
    }

    public function solicitud(){
        return $this->belongsTo('App\Solicitud','solicitud_id','id');
    }
}
