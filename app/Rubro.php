<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Rubro extends Model implements Searchable
{
    //
    protected $table='rubro';

    public $timestamps = false;

    public function getSearchResult(): SearchResult
    {
        //$url = route('cliente.index',$this->nombre);
        $url=route('rubro.buscar',$this->nombre);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->nombre,
            $url
        );
    }

    public function detalle(){
        return $this->hasMany('App\detalle_rubro','rubro_id','id')->orderBy('id','asc');
    }
}
