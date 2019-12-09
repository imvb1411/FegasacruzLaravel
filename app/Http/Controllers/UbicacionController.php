<?php

namespace App\Http\Controllers;

use App\Ubicacion;
use App\Vista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        $ubicaciones=Ubicacion::all()->where('estado',1)->sortBy("id");;
        $departamentos=Ubicacion::all()->where('ubicacion_id',0)->where('estado',1)->sortBy("id");
        //dd($departamentos);
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
        //dd($request);
        $ubicacion=Ubicacion::findOrFail($request->id);
        $ubicacion->tipo=$request->tipo;
        if($ubicacion->tipo==1){
        $ubicacion->ubicacion_id=0;
    }else{
        $ubicacion->ubicacion_id=$request->ubicacion_id;
    }
        $ubicacion->nombre=$request->nombre;
        if($ubicacion->update()){
            Session::put('success','Ubicacion '.$ubicacion->nombre.' actualizado correctamente');
        }else{
            Session::put('danger','Ocurrio un error al actualizar la Ubicacion '.$ubicacion->nombre);
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
            Session::put('success','Ubicacion '.$ubicacion->nombre.' eliminado correctamente');
        }else{
            Session::put('danger','Ocurrio un error al eliminar la Ubicacion '.$ubicacion->nombre);
        }

        return redirect()->route('ubicacion.index');
    }
}
