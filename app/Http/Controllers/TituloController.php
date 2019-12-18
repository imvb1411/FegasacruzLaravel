<?php

namespace App\Http\Controllers;

use App\Configuracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Titulo;
use Illuminate\Support\Facades\Session;
use App\Vista;
use App\Solicitud;
class TituloController extends Controller
{
    public function index(Request $request)
    {    
        $view=Vista::where('nombre','=','titulo')->first();
        $view->vistas=$view->vistas+1;
        $view->update();
        $titulos=Titulo::all()->where('estado',1);
        $solicitudes=Solicitud::all()->where('estado',1);
        $configuracion=Configuracion::where('personal_id','=',Auth::user()->id)->where('estado',1)->first();
        if($configuracion==null){
            $configuracion=Configuracion::where('personal_id','=',0)->first();
        }
        // return $solicitudes;
        return view('titulo.index',compact('titulos','solicitudes','view','configuracion'));
    }

    public function buscar($texto){
        $titulos=Titulo::where('estado',1)->where('descripcion','ilike','%'.$texto.'%')->get();
        return view('titulo.index',compact('titulos'));
    }

    public function showImg($id)
    {
        $titulo = Titulo::find($id);

        $data = base64_decode($titulo->data);
        return response($data)->header('Content-Type', $titulo->mime); // thanks to Devon
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $name = $_FILES['imagen']['name'];
            $mime = $_FILES['imagen']['type'];
            if ($mime === 'image/jpeg' || $mime === 'image/png') {
                $data = base64_encode(file_get_contents($_FILES['imagen']['tmp_name']));
                $titulo=new Titulo();
                $titulo->descripcion = $request->descripcion;
                $titulo->name = $name;
                $titulo->mime = $mime;
                $titulo->data = $data;
                $titulo->solicitud_id = $request->solicitud_id;
                $titulo->estado = 1;
                $titulo->save();
                Session::put('success','Titulo creado correctamente');
                DB::commit();
            }else{
                throw new \Exception;
            }
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
            $name = $_FILES['imagen']['name'];
            $mime = $_FILES['imagen']['type'];
            if ($mime === 'image/jpeg' || $mime === 'image/png') {
                $data = base64_encode(file_get_contents($_FILES['imagen']['tmp_name']));
                $titulo=Titulo::findOrFail($request->id);
                $titulo->descripcion = $request->descripcion;
                $titulo->name = $name;
                $titulo->mime = $mime;
                $titulo->data = $data;
                $titulo->solicitud_id = $request->solicitud_id;
                $titulo->save();
                Session::put('success','Titulo actualizado correctamente');
                DB::commit();
            }else{
                throw new \Exception;
            }
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
