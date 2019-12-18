<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Persona extends Model implements Searchable
{

    protected $table='persona';

    public $timestamps = false;

    protected $fillable = [
        'ci',
        'nombre',
        'apellido_pat',
        'apellido_mat',
        'telefono',
        'email',
        'tipo_persona',
        'estado'
    ];

    public function setNombreAttribute($value){
        $this->attributes['nombre'] = ucwords($value);
    }

    public function setApellidoPatAttribute($value){
        $this->attributes['apellido_pat'] = ucwords($value);
    }

    public function setApellidoMatAttribute($value){
        $this->attributes['apellido_mat'] = ucwords($value);
    }

    public function getApellidoMatAttribute($value){
      return strtoupper($value);
    }
    
    public function getApellidoPatAttribute($value){
        return strtoupper($value);
    }
    
    public function getNombreAttribute($value){
        return strtoupper($value);
    }

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

    public function scopeClientActive($consulta){
        $consulta->where('estado', 1)->where('tipo_persona', 'CLI');
    }
}
