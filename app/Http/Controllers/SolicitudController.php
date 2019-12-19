<?php

namespace App\Http\Controllers;

use App\Configuracion;
use Illuminate\Http\Request;
use App\Solicitud;
use App\Solicitud280;
use App\Solicitud701;
use App\Vista;
use App\Persona;
use App\Personal;
use App\Ubicacion;
use App\Actividad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App;
use PDF;
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
        $view=Vista::where('nombre','=','solicitud')->first();
        $solicitudes=Solicitud::active()->search($texto)->get();
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
                $form280->nro_titulopropiedad = $request->nro_titulopropiedad1;
                $form280->documento_empresa = $request->documento_empresa;
                $form280->save();

                Session::put('success','Solicitud creada correctamente');
                DB::commit();
                
            }elseif ($request->tipo_solicitud === 'form701') {
                $solicitud->tipo_solicitud = 701;
                $solicitud->save();
                $form701 = new Solicitud701($request->all());
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
                $form280->nro_titulopropiedad = $request->nro_titulopropiedad1;
                $form280->documento_empresa = $request->documento_empresa;
                $form280->save();
                Session::put('success','Solicitud actualizada correctamente');
                DB::commit();
            }elseif ($request->tipo_solicitud === '701') {
                $solicitud->save();
                $form701 = new Solicitud701($request->all());
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
        $solicitud=Solicitud::findOrFail($id);
        $configuracion = Configuracion::tema()->first();
        if ($configuracion == null) {
            $configuracion = Configuracion::default()->first();
        }
        if($solicitud->tipo_solicitud == '280')
        {
            $solicitud280=Solicitud280::where('solicitud_id',$id)->first();
            // $titulo=Titulo::where('solicitud_')
            // return $solicitud;
            return view('solicitud.show280', compact('solicitud', 'solicitud280','configuracion'));
            // return $solicitudes280;
        }else{
            $solicitudes701=Solicitud701::all()->where('solicitud_id',$id);
            return $solicitudes701;
        }
    }
    public function print($id){
        $solicitud=Solicitud::findOrFail($id);
        $configuracion = Configuracion::tema()->first();
        if ($configuracion == null) {
            $configuracion = Configuracion::default()->first();
        }
        if($solicitud->tipo_solicitud == '280')
        {
            $solicitud280=Solicitud280::where('solicitud_id',$id)->first();            
            $pdf=PDF::loadView('solicitud.solicitudimpresion',compact('solicitud', 'solicitud280','configuracion'));            
            return $pdf->stream();
        }else{
            $solicitudes701=Solicitud701::all()->where('solicitud_id',$id);
            return $solicitudes701;
        }
    }
}
