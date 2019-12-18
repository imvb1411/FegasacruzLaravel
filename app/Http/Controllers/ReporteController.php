<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vista;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Solicitud;
use App\Configuracion;
use App\Charts\BarChart;
class ReporteController extends Controller
{ 
    public function solicitudcliente(Request $request)
    { 
    $view=Vista::where('nombre','=','solicitud')->first();
    $view->vistas=$view->vistas+1;
    $view->update();
    $solicitudes=Solicitud::active()->orderBy('cliente_id')->get();
    $configuracion = Configuracion::tema()->first();
    if ($configuracion == null) {
        $configuracion = Configuracion::default()->first();
    }
    return view('reportes.rpt_cliente_solicitud', compact('solicitudes','view','configuracion'));
    }

    public function topactividad(Request $request)
    { 
        
        $configuracion=Configuracion::tema()->first();
        if ($configuracion == null) {
            $configuracion = Configuracion::default()->first();
        }
        $actividades=DB::table('solicitud')
            ->join('actividad','solicitud.actividad_id','=','actividad.id')
            ->select(DB::raw('actividad.nombre, count(actividad.nombre) as cantidad'))
            ->groupBy('solicitud.actividad_id','actividad.nombre')
            ->get();
                            //dd($actividades);
        if(count($actividades)>0 ){
            $array=array();
            $array1=array();
        foreach ($actividades as $actividade){
            array_push($array, $actividade->nombre);
            array_push($array1, $actividade->cantidad);
        }
        $chart = new BarChart;
        //$chart->type('bar');
        $chart->labels($array);
        //$chart->dataset('Cantidad', 'bar', $array1);    
        $dataset = $chart->dataset('Cantidad', 'bar', $array1);
        $dataset->backgroundColor(collect(['#CD6155','#229954', '#7D3C98']));
        $dataset->color(collect(['#CD6155','#229954', '#7D3C98']));
       // dd($chart);
        return view('reportes.rpt_top_actividades', compact('chart'),compact('configuracion'));
        }
    }
}
