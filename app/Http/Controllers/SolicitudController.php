<?php

namespace App\Http\Controllers;

use App\Configuracion;
use Illuminate\Http\Request;
use App\Solicitud;
use App\solicitud280;
use App\solicitud701;
use App\Vista;
use Illuminate\Support\Facades\Auth;

class SolicitudController extends Controller
{
    //
    public function index(Request $request)
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

    public function buscar($texto)
    {
        $solicitude = Solicitud::where('estado', 1)->where('nro_orden', 'ilike', '%' . $texto . '%')->get();
        return view('solicitud.index', compact('solicitudes'));
    }
}
