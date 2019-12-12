<?php

namespace App\Http\Controllers;

use App\Configuracion;
use App\Ubicacion;
use App\Vista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use test\Mockery\TestIncreasedVisibilityChild;

class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view=Vista::where('nombre','=','ubicacion')->first();
        $view->vistas=$view->vistas+1;
        $view->update();
        $ubicaciones=Ubicacion::all()->where('estado',1);
        $departamentos=Ubicacion::all()->where('ubicacion_id',0)->where('estado',1);
        $configuracion=Configuracion::where('personal_id','=',Auth::user()->id)->where('estado',1)->first();
        if ($configuracion == null) {
            $configuracion = Configuracion::where('personal_id', '=', 0)->first();
        }
        return view('ubicacion.index',compact('ubicaciones','departamentos','view','configuracion'));
    }

    public function buscar($texto){
        $view=Vista::where('nombre','=','ubicacion')->first();
        $ubicaciones=Ubicacion::where('estado',1)->where('nombre','ilike','%'.$texto.'%')->get();
        $departamentos=Ubicacion::all()->where('ubicacion_id',0)->where('estado',1);
        return view('ubicacion.index',compact('ubicaciones','departamentos','view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ubicacion=new Ubicacion($request->all());
        $ubicacion->tipo=$request->tipo;
        if($ubicacion->tipo==1){
            $ubicacion->ubicacion_id=0;
        }else{
            $ubicacion->ubicacion_id=$request->ubicacion_id;
        }
        $ubicacion->nombre=$request->nombre;
        if($ubicacion->save()){
         //   Session::put('success','Producto '.$ubicacion->nombre.' creado correctamente');
        }else{
           // Session::put('danger','Ocurrio un error al crear el producto '.$ubicacion->productname);
        }
        return redirect()->route('ubicacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function show(Ubicacion $ubicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Ubicacion $ubicacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ubicacion=Ubicacion::findOrFail($request->id);
        $ubicacion->tipo=$request->tipo;
        $ubicacion->ubicacion_id=$request->ubicacion_id;
        $ubicacion->nombre=$request->nombre;
        if($ubicacion->update()){
           // Session::put('success','Producto '.$ubicacion->productname.' actualizado correctamente');
        }else{
            //Session::put('danger','Ocurrio un error al actualizar el producto '.$ubicacion->productname);
        }
        return redirect()->route('ubicacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ubicacion $ubicacion)
    {
        $ubicacion=Ubicacion::findOrFail($ubicacion->id);
        $ubicacion->estado=0;
        if($ubicacion->update()){
           // Session::put('success','Producto '.$ubicacion->productname.' eliminado correctamente');
        }else{
            //Session::put('danger','Ocurrio un error al eliminar el producto '.$ubicacion->productname);
        }

        return redirect()->route('ubicacion.index');
    }
}
