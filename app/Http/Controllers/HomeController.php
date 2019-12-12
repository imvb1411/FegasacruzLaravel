<?php

namespace App\Http\Controllers;

use App\Configuracion;
use App\Vista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(){
        $v=Vista::where('nombre','ilike','principal')->first();
        $v->vistas=$v->vistas+1;
        $v->save();
        $configuracion=Configuracion::where('personal_id','=',Auth::user()->id)->where('estado',1)->first();
        if($configuracion==null){
            $configuracion=Configuracion::where('personal_id','=',0)->first();
        }
        return view('layouts.master',compact('v','configuracion'));
//        return view('layouts.master',compact('vistas','configuracion'))->with('sidebar', 'brand-link navbar-orange')->with('navbar','main-header navbar navbar-expand border-bottom navbar-light navbar-orange');;
    }
}
