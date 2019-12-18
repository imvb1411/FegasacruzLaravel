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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SolicitudController extends Controller
{
    //
    public function index(Request $request)
    {       $view=Vista::where('nombre','=','solicitud')->first();
            $view->vistas=$view->vistas+1;
            $view->update();
            $solicitudes=Solicitud::active()->get();
            $clientes = Persona::all()->where('estado', 1)->where('tipo_persona', 'CLI');
            $personales=Personal::all()->where('estado',1);
            $ubicaciones=Ubicacion::all()->where('estado',1)->where('tipo',1);
            $actividades = Actividad::all()->where('estado', 1);
            $configuracion = Configuracion::tema()->first();
            if ($configuracion == null) {
                $configuracion = Configuracion::default()->first();
            }
            return view('solicitud.index',compact('solicitudes','view','clientes','personales','ubicaciones','actividades', 'configuracion'));
    }

    public function buscar($texto){
        $solicitude=Solicitud::active()->search($texto)->get();
        return view('solicitud.index',compact('solicitudes'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $solicitud=new Solicitud();
            $solicitud->cliente_id = $request->cliente_id;
            $solicitud->actividad_id = $request->actividad_id;
            $solicitud->nro_hectareas = $request->nro_hectareas;
            $solicitud->ubicacion_id = $request->ubicacion_id;
            $solicitud->gestion = $request->gestion;
            $solicitud->nro_orden = $request->nro_orden;
            $solicitud->estado = 1;
            $solicitud->registrador_id = Auth::user()->id;
            if ($request->tipo_solicitud === 'form280') {
                $solicitud->tipo_solicitud = 280;
                $solicitud->save();
                $form280 = new Solicitud280();
                $form280->nit_dependencia = $request->nit_dependencia;
                $form280->nro_documento = $request->nro_documento;
                $form280->nro_boletapago = $request->nro_boletapago;
                $form280->solicitud_id = $solicitud->id;
                $form280->save();
                Session::put('success','Solicitud creada correctamente');
                DB::commit();
            }elseif ($request->tipo_solicitud === 'form701') {
                $solicitud->tipo_solicitud = 701;
                $solicitud->save();
                $form701 = new Solicitud701();
                $form701->solicitud_id = $solicitud->id;
                $form701->save();
                Session::put('success','Solicitud creada correctamente');
                DB::commit();
            }else{
                throw new \Exception;
            }
        }catch (\Exception $exception) {
            Session::put('danger','Ocurrio un problema al crear la Solicitud ');
            DB::rollBack();
        }
        return redirect('solicitudes');
    }
    
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $solicitud=Solicitud::findOrFail($request->id);
            $solicitud->cliente_id = $request->cliente_id;
            $solicitud->actividad_id = $request->actividad_id;
            $solicitud->nro_hectareas = $request->nro_hectareas;
            $solicitud->ubicacion_id = $request->ubicacion_id;
            $solicitud->gestion = $request->gestion;
            $solicitud->nro_orden = $request->nro_orden;
            $solicitud->estado = 1;
            $solicitud->registrador_id = Auth::user()->id;
            if ($request->tipo_solicitud === '280') {
                $solicitud->save();
                $form280 = new Solicitud280();
                $form280->nit_dependencia = $request->nit_dependencia;
                $form280->nro_documento = $request->nro_documento;
                $form280->nro_boletapago = $request->nro_boletapago;
                $form280->solicitud_id = $solicitud->id;
                $form280->save();
                Session::put('success','Solicitud actualizada correctamente');
                DB::commit();
            }elseif ($request->tipo_solicitud === '701') {
                $solicitud->save();
                $form701 = new Solicitud701();
                $form701->solicitud_id = $solicitud->id;
                $form701->save();
                Session::put('success','Solicitud actualizada correctamente');
                DB::commit();
            }else{
                throw new \Exception;
            }
        }catch (\Exception $exception) {
            Session::put('danger','Ocurrio un problema al crear la Solicitud ');
            DB::rollBack();
        }
        return redirect('solicitudes');
    }
    public function destroy($id)
    {
        //
        try{
            DB::beginTransaction();
            $solicitud=Solicitud::findOrFail($id);
            $solicitud->estado=0;
            $solicitud->update();
            Session::put('success','Solicitud eliminado correctamente');
            DB::commit();
        }catch (\Exception $exception){
            Session::put('danger','Ocurrio un problema al eliminar la Solicitud nro:'.$id);
            DB::rollBack();
        }
        return redirect('solicitudes');
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
}
