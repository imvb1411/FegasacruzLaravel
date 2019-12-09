<?php

namespace App\Http\Controllers;

use App\Vista;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Actividad;

use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function index()
    {
        $view=Vista::where('nombre','=','ubicacion')->first();
        $view->vistas=$view->vistas+1;
        $view->update();
        $actividades=Actividad::all()->where('estado',1)->sortBy("id");
        return view('actividad.index',compact('actividades','view'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $actividad=new Actividad();
            $actividad->codigo = $request->codigo;
            $actividad->nombre = $request->nombre;
            $actividad->descripcion = $request->descripcion;
            $actividad->save();
            Session::put('success','Actividad '.$actividad->nombre.' creado correctamente');
            DB::commit();
        }catch (\Exception $exception) {
            Session::put('danger','Ocurrio un problema al crear la actividad '.$request->nombre);
            DB::rollBack();
        }
        return redirect()->route('actividad.index');
    }

    public function update(Request $request)
    {
        try{
            DB::beginTransaction();
            $actividad=Actividad::findOrFail($request->id);
            $actividad->codigo = $request->codigo;
            $actividad->nombre = $request->nombre;
            $actividad->descripcion = $request->descripcion;
            $actividad->save();
            Session::put('success','Actividad '.$actividad->nombre.' actualizado correctamente');
            DB::commit();
        }catch (\Exception $exception){
            Session::put('danger','Ocurrio un problema al actualizar la actividad '.$request->nombre);
            DB::rollBack();
        }
        return redirect()->route('actividad.index');
    }
    public function destroy($id)
    {
        //
        try{
            DB::beginTransaction();
            $actividad=Actividad::findOrFail($id);
            $actividad->estado=0;
            $actividad->update();
            Session::put('success','Actividad '.$actividad->nombre.' eliminado correctamente');
            DB::commit();
        }catch (\Exception $exception){
            Session::put('danger','Ocurrio un problema al eliminar la Actividad nro:'.$id);
            DB::rollBack();
        }
        return redirect()->route('actividad.index');
    }
}
