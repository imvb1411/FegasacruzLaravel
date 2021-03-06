<?php

namespace App\Http\Controllers;

use App\Configuracion;
use Illuminate\Http\Request;
use App\Marca;
use App\Solicitud;
use App\Vista;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MarcaController extends Controller
{
    //
    public function index(Request $request)
    {    
        $view=Vista::where('nombre','=','marca')->first();
        $view->vistas=$view->vistas+1;
        $view->update();
        $marcas=Marca::all()->where('estado',1);
        //dd($marcas->first()->solicitud->nro_orden);
        $solicitudes=Solicitud::all()->where('estado',1);
        $configuracion=Configuracion::where('personal_id','=',Auth::user()->id)->where('estado',1)->first();
        if($configuracion==null){
            $configuracion=Configuracion::where('personal_id','=',0)->first();
        }
        // return $solicitudes;
        return view('marca.index',compact('marcas','solicitudes','view','configuracion'));
    }

    public function buscar($texto){
        $view=Vista::where('nombre','=','marca')->first();
        $marcas=Marca::where('estado',1)->where('descripcion','ilike','%'.$texto.'%')->get();
        $solicitudes=Solicitud::all()->where('estado',1);
        $configuracion=Configuracion::where('personal_id','=',Auth::user()->id)->where('estado',1)->first();
        if($configuracion==null){
            $configuracion=Configuracion::where('personal_id','=',0)->first();
        }
        return view('marca.index',compact('marcas','solicitudes','view','configuracion'));
    }

    public function showImg($id)
    {
        $marca = Marca::find($id);

        $data = base64_decode($marca->data);
        return response($data)->header('Content-Type', $marca->mime); // thanks to Devon
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $name = $_FILES['imagen']['name'];
            $mime = $_FILES['imagen']['type'];
            if ($mime === 'image/jpeg' || $mime === 'image/png') {
                $data = base64_encode(file_get_contents($_FILES['imagen']['tmp_name']));
                $marca=new Marca();
                $marca->descripcion = $request->descripcion;
                $marca->name = $name;
                $marca->mime = $mime;
                $marca->data = $data;
                $marca->solicitud_id = $request->solicitud_id;
                $marca->estado = 1;
                $marca->save();
                Session::put('success','Marca creada correctamente con id=');
                DB::commit();
            }elseif ($mime === '') {
                $marca=new Marca();
                $marca->descripcion = $request->descripcion;
                $marca->solicitud_id = $request->solicitud_id;
                $marca->estado = 1;
                $marca->save();
                Session::put('success','Marca creada correctamente con id=');
                DB::commit();
            }
            else{
                throw new \Exception;
            }
        }catch (\Exception $exception) {
            Session::put('danger','Ocurrio un problema al crear la marca ');
            DB::rollBack();
        }
        return redirect()->route('marcas.index');
    }

    public function update(Request $request)
    {
        try{
            DB::beginTransaction();
            $name = $_FILES['imagen']['name'];
            $mime = $_FILES['imagen']['type'];
            if ($mime === 'image/jpeg' || $mime === 'image/png') {
                $data = base64_encode(file_get_contents($_FILES['imagen']['tmp_name']));
                $marca=Marca::findOrFail($request->id);
                $marca->descripcion = $request->descripcion;
                $marca->name = $name;
                $marca->mime = $mime;
                $marca->data = $data;
                $marca->solicitud_id = $request->solicitud_id;
                $marca->save();
                Session::put('success','Marca actualizada correctamente');
                DB::commit();
            }else{
                throw new \Exception;
            }
        }catch (\Exception $exception){
            Session::put('danger','Ocurrio un problema al actualizar la marca');
            DB::rollBack();
        }
        return redirect()->route('marcas.index');
    }
    public function destroy($id)
    {
        //
        try{
            DB::beginTransaction();
            $marca=Marca::findOrFail($id);
            $marca->estado=0;
            $marca->update();
            Session::put('success','Marca eliminado correctamente');
            DB::commit();
        }catch (\Exception $exception){
            Session::put('danger','Ocurrio un problema al eliminar el marca nro:'.$id);
            DB::rollBack();
        }
        return redirect()->route('marcas.index');
    }
}
