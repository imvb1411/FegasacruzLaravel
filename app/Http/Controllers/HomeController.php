<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function search($search){
        $searchResults = (new Search())
            ->registerModel(Persona::class, 'nombre')
            ->search($search);
        return $searchResults;
    }
}
