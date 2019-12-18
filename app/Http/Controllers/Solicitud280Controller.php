<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\solicitud280;
class Solicitud280Controller extends Controller
{
    //
    public function index(Request $request)
    {
    //         $view=Vista::where('nombre','=','solicitud')->first();
    //         $view->vistas=$view->vistas+1;
    //         $view->update();

    //         $configuracion=Configuracion::where('personal_id','=',Auth::user()->id)->where('estado',1)->first();
    //         if ($configuracion == null) {
    //             $configuracion = Configuracion::where('personal_id', '=', 0)->first();
    //         }
            $solicitudes=Solicitud280::all()->where('estado',1);
            return $solicitudes;
            return view('solicitud.index',compact('solicitudes','view','clientes','personales','ubicaciones','actividades', 'configuracion'));
    }

    public function show($id){
        $solicitudes=Solicitud280::all()->where('estado',1)->where('id',$id);
        return $solicitudes;
    }
}
