<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vista;
use App\Solicitud;
use App\Configuracion;
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
}
