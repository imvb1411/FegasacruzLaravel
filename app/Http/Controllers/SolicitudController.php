<?php

namespace App\Http\Controllers;

use App\cliente_solicitud;
use App\Configuracion;
use App\Rubro;
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
    {
        $view = Vista::where('nombre', '=', 'solicitud')->first();
        $view->vistas = $view->vistas + 1;
        $view->update();
        $solicitudes = Solicitud::active()->get();
        $clientes = Persona::all()->where('estado', 1)->where('tipo_persona', 'CLI');
        $personales = Personal::all()->where('estado', 1);
        $ubicaciones = Ubicacion::all()->where('estado', 1)->where('tipo', 1);
        $actividades = Actividad::all()->where('estado', 1);
        $rubros = Rubro::where('estado', 1)->orderBy('id', 'asc')->get();
        //dd($rubros[0]->detalle);
        $configuracion = Configuracion::tema()->first();
        if ($configuracion == null) {
            $configuracion = Configuracion::default()->first();
        }
        return view('solicitud.index', compact('solicitudes', 'view', 'clientes', 'personales', 'ubicaciones', 'actividades', 'rubros', 'configuracion'));
    }

    public function buscar($texto)
    {
        $view = Vista::where('nombre', '=', 'solicitud')->first();
        $solicitudes = Solicitud::active()->search($texto)->get();
        $clientes = Persona::all()->where('estado', 1)->where('tipo_persona', 'CLI');
        $personales = Personal::all()->where('estado', 1);
        $ubicaciones = Ubicacion::all()->where('estado', 1)->where('tipo', 1);
        $actividades = Actividad::all()->where('estado', 1);
        $rubros = Rubro::where('estado', 1)->orderBy('id', 'asc')->get();
        $configuracion = Configuracion::tema()->first();
        if ($configuracion == null) {
            $configuracion = Configuracion::default()->first();
        }
        return view('solicitud.index', compact('solicitudes', 'view', 'clientes', 'personales', 'ubicaciones', 'actividades', 'rubros','configuracion'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $solicitud = new Solicitud();
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

                Session::put('success', 'Solicitud creada correctamente');
                DB::commit();

            } elseif ($request->tipo_solicitud === 'form701') {
                $solicitud->tipo_solicitud = 701;
                $solicitud->save();
                $form701 = new Solicitud701($request->all());
                $form701->solicitud_id = $solicitud->id;
                $form701->save();
                $detalles = $request->detalle;
                for ($i = 1; $i <= count($detalles); $i++) {
                    $cliente_sol = new cliente_solicitud();
                    $cliente_sol->solicitud701_id = $form701->id;
                    $cliente_sol->detallerubro_id = $i;
                    if ($detalles[$i] != null && $detalles[$i] > 0) {
                        $cliente_sol->valor = $detalles[$i];
                    } else {
                        $cliente_sol->valor = 0;
                    }
                    $cliente_sol->save();
                }
                Session::put('success', 'Solicitud creada correctamente');
                DB::commit();
            } else {
                throw new \Exception;
            }
        } catch (\Exception $exception) {
            Session::put('danger', 'Ocurrio un problema al crear la Solicitud ');
            DB::rollBack();
        }
        return redirect('solicitudes');
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $solicitud = Solicitud::findOrFail($request->id);
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
                Session::put('success', 'Solicitud actualizada correctamente');
                DB::commit();
            } elseif ($request->tipo_solicitud === '701') {
                $solicitud->ubicacion_id=$request->zona_id;
                $solicitud->save();
                $form701 = new Solicitud701($request->all());
                $form701->solicitud_id = $solicitud->id;
                $form701->save();
                Session::put('success', 'Solicitud actualizada correctamente');
                DB::commit();
            } else {
                throw new \Exception;
            }
        } catch (\Exception $exception) {
            Session::put('danger', 'Ocurrio un problema al crear la Solicitud ');
            DB::rollBack();
        }
        return redirect('solicitudes');
    }

    public function destroy($id)
    {
        //
        try {
            DB::beginTransaction();
            $solicitud = Solicitud::findOrFail($id);
            $solicitud->estado = 0;
            $solicitud->update();
            Session::put('success', 'Solicitud eliminado correctamente');
            DB::commit();
        } catch (\Exception $exception) {
            Session::put('danger', 'Ocurrio un problema al eliminar la Solicitud nro:' . $id);
            DB::rollBack();
        }
        return redirect('solicitudes');
    }

    public function show($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $configuracion = Configuracion::tema()->first();
        if ($configuracion == null) {
            $configuracion = Configuracion::default()->first();
        }
        if ($solicitud->tipo_solicitud == '280') {
            $solicitud280 = Solicitud280::where('solicitud_id', $id)->first();
            return view('solicitud.show280', compact('solicitud', 'solicitud280', 'configuracion'));
        } else {
            $solicitud701 = Solicitud701::all()->where('solicitud_id', $id)->first();
            return view('solicitud.show701', compact('solicitud', 'solicitud701', 'configuracion'));
        }
    }

    public function print($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $configuracion = Configuracion::tema()->first();
        if ($configuracion == null) {
            $configuracion = Configuracion::default()->first();
        }
        if ($solicitud->tipo_solicitud == '280') {
            $solicitud280 = Solicitud280::where('solicitud_id', $id)->first();
            $pdf = PDF::loadView('solicitud.solicitudimpresion', compact('solicitud', 'solicitud280', 'configuracion'));
            return $pdf->stream();
        }else{
            $solicitud701 = Solicitud701::all()->where('solicitud_id', $id)->first();          
            $pdf=PDF::loadView('solicitud.solicitudimpresion701',compact('solicitud', 'solicitud701','configuracion'))->setPaper('legal', 'portrait');;            
            return $pdf->stream();
        }
    }
}
