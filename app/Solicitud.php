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
}
