<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Marca extends Model implements Searchable
{
    //
    protected $table='marca';

    public $timestamps = false;

    public function solicitud(){
        return $this->belongsTo('\App\Solicitud','solicitud_id','id');
    }

    public function getSearchResult(): SearchResult
    {
    $url=route('marca.buscar',$this->descripcion);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->descripcion,
            $url
        );
    }


}
