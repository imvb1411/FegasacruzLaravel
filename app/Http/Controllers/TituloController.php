<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Titulo;
use Illuminate\Support\Facades\Session;
class TituloController extends Controller
{
    public function index(Request $request)
    {       
        if($request){    
            $sql=trim($request->get('buscarTexto'));
            $titulos=DB::table('titulo')
            ->where('descripcion','LIKE','%'.$sql.'%')
            ->where('estado',1)
            ->orderBy('id','desc')
            ->paginate();
            return view('titulo.index',["titulos"=>$titulos,"buscarTexto"=>$sql]);
        }
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
