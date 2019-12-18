<?php

namespace App\Http\Controllers;

use App\Configuracion;
use Illuminate\Http\Request;
use App\Solicitud;
use App\solicitud280;
use App\solicitud701;
use App\Vista;
use App\Persona;
use App\Personal;
use App\Ubicacion;
use App\Actividad;
use Illuminate\Support\Facades\Auth;

class SolicitudController extends Controller
{
    //
    public function index(Request $request)
    {       $view=Vista::where('nombre','=','solicitud')->first();
            $view->vistas=$view->vistas+1;
            $view->update();

            $configuracion=Configuracion::where('personal_id','=',Auth::user()->id)->where('estado',1)->first();
            if ($configuracion == null) {
                $configuracion = Configuracion::where('personal_id', '=', 0)->first();
            }
            
            $solicitudes=Solicitud::all()->where('estado',1);
            $clientes = Persona::all()->where('estado', 1)->where('tipo_persona', 'CLI');
            $personales=Personal::all()->where('estado',1);
            $ubicaciones=Ubicacion::all()->where('estado',1)->where('tipo',1);
            $actividades = Actividad::all()->where('estado', 1);
            // return $solicitudes;
            return view('solicitud.index',compact('solicitudes','view','clientes','personales','ubicaciones','actividades', 'configuracion'));
    }

     public function show($id){
        $solicitudes=Solicitud::findOrFail($id);
        if($solicitudes->tipo_solicitud == '280')
        {
            $solicitudes280=Solicitud280::all()->where('solicitud_id',$id);
            return $solicitudes280;
        }else{
            $solicitudes701=Solicitud701::all()->where('solicitud_id',$id);
            return $solicitudes701;
        }
    }

    public function buscar($texto){
        $solicitude=Solicitud::where('estado',1)->where('nro_orden','ilike','%'.$texto.'%')->get();
        return view('solicitud.index',compact('solicitudes'));
    }
    public function store(Request $request)
    {
        $view = Vista::where('nombre', '=', 'solicitud')->first();
        $view->vistas = $view->vistas + 1;
        $view->update();
        $solicitudes = Solicitud::all()->where('estado', 1);
        $configuracion = Configuracion::where('personal_id', '=', Auth::user()->id)->where('estado', 1)->first();
        if ($configuracion == null) {
            $configuracion = Configuracion::where('personal_id', '=', 0)->first();
        }
        // return $solicitudes;
        return view('solicitud.index', compact('solicitudes', 'view', 'configuracion'));
    }

}
