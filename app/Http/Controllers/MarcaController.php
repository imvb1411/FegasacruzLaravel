<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use App\Solicitud;
use App\Vista;
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
        $solicitudes=Solicitud::all()->where('estado',1);
        // return $solicitudes;
        return view('marca.index',compact('marcas','solicitudes','view'));
    }

    public function buscar($texto){
        $marcas=Marca::where('estado',1)->where('descripcion','ilike','%'.$texto.'%')->get();
        return view('marca.index',compact('marcas'));
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
            }else{
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
