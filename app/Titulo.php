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
        $url=route('titulo.buscar',$this->nombre);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->descripcion,
            $url
        );
    }
}
