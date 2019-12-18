<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Persona extends Model implements Searchable
{

    protected $table='persona';

    public $timestamps = false;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('tipo_persona','LIKE','CLI');
    }

    public function getSearchResult(): SearchResult
    {
        //$url = route('cliente.index',$this->nombre);
        $url=route('cliente.buscar',$this->nombre);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->nombre,
            $url
        );
    }
}
