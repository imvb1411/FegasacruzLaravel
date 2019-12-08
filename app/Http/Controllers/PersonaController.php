<?php

namespace App\Http\Controllers;
use App\Persona;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    //
    public function index(){
        $persona = Persona::all()->where('estado',1);
        return $persona;
    }
}
