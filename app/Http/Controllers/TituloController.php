<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Titulo;
use Illuminate\Support\Facades\Session;
use App\Vista;
class TituloController extends Controller
{
    public function index(Request $request)
    {    
        $view=Vista::where('nombre','=','titulo')->first();
        $view->vistas=$view->vistas+1;
        $view->update();
        $titulos=Titulo::all()->where('estado',1);
        return view('titulo.index',compact('titulos','view'));
    }

    public function buscar($texto){
        $titulos=Titulo::where('estado',1)->where('descripcion','ilike','%'.$texto.'%')->get();
        return view('titulo.index',compact('titulos'));
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $titulo=new Titulo();
            $titulo->descripcion = $request->descripcion;
            $titulo->estado = 1;
            $titulo->save();
            Session::put('success','Titulo creado correctamente');
            DB::commit();
        }catch (\Exception $exception) {
            Session::put('danger','Ocurrio un problema al crear el titulo ');
            DB::rollBack();
        }
        return redirect()->route('titulos.index');
    }

    public function update(Request $request)
    {
        try{
            DB::beginTransaction();
            $titulo=Titulo::findOrFail($request->id);
            $titulo->descripcion = $request->descripcion;
            $titulo->save();
            Session::put('success','Titulo actualizado correctamente');
            DB::commit();
        }catch (\Exception $exception){
            Session::put('danger','Ocurrio un problema al actualizar el titulo');
            DB::rollBack();
        }
        return redirect()->route('titulos.index');
    }
    public function destroy($id)
    {
        //
        try{
            DB::beginTransaction();
            $titulo=Titulo::findOrFail($id);
            $titulo->estado=0;
            $titulo->update();
            Session::put('success','Titulo eliminado correctamente');
            DB::commit();
        }catch (\Exception $exception){
            Session::put('danger','Ocurrio un problema al eliminar el titulo nro:'.$id);
            DB::rollBack();
        }
        return redirect()->route('titulos.index');
    }
}
