<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vista;
use App\Plano;
use Illuminate\Support\Facades\Session;
use App\Solicitud;
use Illuminate\Support\Facades\DB;

class PlanoController extends Controller
{
    //
    public function index(Request $request)
    {    
        $view=Vista::where('nombre','=','plano')->first();
        $view->vistas=$view->vistas+1;
        $view->update();
        $planos=Plano::all()->where('estado',1);
        $solicitudes=Solicitud::all()->where('estado',1);
        // return $solicitudes;
        return view('plano.index',compact('planos','solicitudes','view'));
    }

    public function buscar($texto){
        $planos=Plano::where('estado',1)->where('descripcion','ilike','%'.$texto.'%')->get();
        return view('plano.index',compact('planos'));
    }

    public function showImg($id)
    {
        $plano = Plano::find($id);

        $data = base64_decode($plano->data);
        return response($data)->header('Content-Type', $plano->mime); // thanks to Devon
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $name = $_FILES['imagen']['name'];
            $mime = $_FILES['imagen']['type'];
            if ($mime === 'image/jpeg' || $mime === 'image/png') {
                $data = base64_encode(file_get_contents($_FILES['imagen']['tmp_name']));
                $plano=new Plano();
                $plano->descripcion = $request->descripcion;
                $plano->name = $name;
                $plano->mime = $mime;
                $plano->data = $data;
                $plano->solicitud_id = $request->solicitud_id;
                $plano->estado = 1;
                $plano->save();
                Session::put('success','Plano creado correctamente');
                DB::commit();
            }else{
                throw new \Exception;
            }
        }catch (\Exception $exception) {
            Session::put('danger','Ocurrio un problema al crear el plano ');
            DB::rollBack();
        }
        return redirect()->route('planos.index');
    }

    public function update(Request $request)
    {
        try{
            DB::beginTransaction();
            $name = $_FILES['imagen']['name'];
            $mime = $_FILES['imagen']['type'];
            if ($mime === 'image/jpeg' || $mime === 'image/png') {
                $data = base64_encode(file_get_contents($_FILES['imagen']['tmp_name']));
                $plano=Plano::findOrFail($request->id);
                $plano->descripcion = $request->descripcion;
                $plano->name = $name;
                $plano->mime = $mime;
                $plano->data = $data;
                $plano->solicitud_id = $request->solicitud_id;
                $plano->save();
                Session::put('success','Plano actualizado correctamente');
                DB::commit();
            }else{
                throw new \Exception;
            }
        }catch (\Exception $exception){
            Session::put('danger','Ocurrio un problema al actualizar el plano');
            DB::rollBack();
        }
        return redirect()->route('planos.index');
    }
    public function destroy($id)
    {
        //
        try{
            DB::beginTransaction();
            $plano=Plano::findOrFail($id);
            $plano->estado=0;
            $plano->update();
            Session::put('success','Plano eliminado correctamente');
            DB::commit();
        }catch (\Exception $exception){
            Session::put('danger','Ocurrio un problema al eliminar el plano nro:'.$id);
            DB::rollBack();
        }
        return redirect()->route('planos.index');
    }
}