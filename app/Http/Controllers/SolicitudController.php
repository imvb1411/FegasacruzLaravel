<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
use App\solicitud280;
use App\solicitud701;
use App\Vista;

class SolicitudController extends Controller
{
    //
    public function index(Request $request)
    {       $view=Vista::where('nombre','=','solicitud')->first();
            $view->vistas=$view->vistas+1;
            $view->update();
            $solicitudes=Solicitud::all()->where('estado',1);
            // return $solicitudes;
            return view('solicitud.index',compact('solicitudes','view'));
    }

    public function buscar($texto){
        $solicitude=Solicitud::where('estado',1)->where('nro_orden','ilike','%'.$texto.'%')->get();
        return view('solicitud.index',compact('solicitudes'));
    }
}
