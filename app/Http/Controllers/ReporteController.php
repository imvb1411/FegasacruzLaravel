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
use App;
use PDF;
class ReporteController extends Controller
{ 
    public function solicitudcliente(Request $request)
    { 
    $view=Vista::where('nombre','=','reportes')->first();
    $view->vistas=$view->vistas+1;
    $view->update();
    $solicitudes=Solicitud::active()->orderBy('cliente_id')->get();
    $configuracion = Configuracion::tema()->first();
    if ($configuracion == null) {
        $configuracion = Configuracion::default()->first();
    }
    return view('reportes.rpt_cliente_solicitud', compact('solicitudes','view','configuracion'));
    }
    public function printsolicitud(Request $request)
    { 
    $view=Vista::where('nombre','=','reportes')->first();
    $view->vistas=$view->vistas+1;
    $view->update();
    $solicitudes=Solicitud::active()->orderBy('cliente_id')->get();
    $configuracion = Configuracion::tema()->first();
    if ($configuracion == null) {
        $configuracion = Configuracion::default()->first();
    }
            $pdf = PDF::loadView('reportes.impresion_rpt_cliente_solicitud', compact('solicitudes','view','configuracion'));
            return $pdf->stream();
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
        $chart->labels($array);
        //$chart->dataset('Cantidad', 'bar', $array1);    
        $dataset = $chart->dataset('Cantidad', 'bar', $array1);
        $dataset->backgroundColor(collect(['#CD6155','#229954', '#7D3C98','#0042FF','#23FF00','#FF8300']));
        $dataset->color(collect(['#CD6155','#229954', '#7D3C98','#0042FF','#23FF00','#FF8300']));
       // dd($chart);
        return view('reportes.rpt_top_actividades', compact('chart'),compact('configuracion'));
        }
    }
    public function topsolicitudes(Request $request)
    { 
        
        $configuracion=Configuracion::tema()->first();
        if ($configuracion == null) {
            $configuracion = Configuracion::default()->first();
        }
        $solicituds = collect(['Solicitud 280','Solicitud 701']);
        $solicitud280=DB::table('solicitud280')->where('estado', 1)->count();
        $solicitud701=DB::table('solicitud701')->where('estado', 1)->count();
       // dd($solicitud280);

        $array=array();
        $array1=array();
        array_push($array, 'Solicitud 280');
        array_push($array, 'Solicitud 701');
        array_push($array1, $solicitud280);
        array_push($array1, $solicitud701);
        //dd($array);        
        $chart = new BarChart;        
        $chart->minimalist(true);
        $chart->displayLegend(true);
        $chart->labels($array);        
        $dataset = $chart->dataset('Cantidad', 'pie', $array1)->fill(true)
        ->linetension(0.3);
        $dataset->backgroundColor(collect(['#CD6155','#229954', '#0042FF']));
        $dataset->color(collect(['#CD6155','#229954', '#7D3C98','#0042FF']));
       // dd($chart);
        return view('reportes.rpt_top_solicitud', compact('chart'),compact('configuracion','array','array1'));
        }    
}
