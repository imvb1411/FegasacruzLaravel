<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rubro;
use Illuminate\Support\Facades\Session;


class RubroController extends Controller
{
    public function index(Request $request)
    {       
            if($request){
                $sql=trim($request->get('buscarTexto'));
                $rubros=DB::table('rubro')
                ->where('nombre','LIKE','%'.$sql.'%')
                ->where('estado',1)
                ->orderBy('id','asc')
                ->paginate(5);
                return view('rubro.index',["rubros"=>$rubros,"buscarTexto"=>$sql]);
                // return $rubros;
            }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $rubro=new Rubro();
            $rubro->nombre = $request->nombre;
            $rubro->descripcion = $request->descripcion;
            $rubro->save();
            Session::put('success','Rubro '.$rubro->nombre.' creado correctamente');
            DB::commit();
        }catch (\Exception $exception) {
            Session::put('danger','Ocurrio un problema al crear el rubro '.$request->nombre);
            DB::rollBack();
        }
        return redirect()->route('rubros.index');
    }

    public function update(Request $request)
    {
        try{
            DB::beginTransaction();
            $rubro=Rubro::findOrFail($request->id);
            $rubro->nombre = $request->nombre;
            $rubro->descripcion = $request->descripcion;
            Session::put('success','Rubro '.$rubro->nombre.' actualizado correctamente');
            DB::commit();
        }catch (\Exception $exception){
            Session::put('danger','Ocurrio un problema al actualizar el rubro '.$request->nombre);
            DB::rollBack();
        }
        // return redirect()->route('clientes.index');
        return $request;
    }
}
