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
        $view=Vista::where('nombre','=','rubro')->first();
        $view->vistas=$view->vistas+1;
        $view->update();
        $rubros = Rubro::all()->where('estado', 1);
        $configuracion = Configuracion::where('personal_id', '=', Auth::user()->id)->first();
        if ($configuracion == null) {
            $configuracion = Configuracion::where('personal_id', '=', 0)->first();
        }
        return view('rubro.index', compact('rubros','configuracion','view'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $rubro = new Rubro();
            $rubro->nombre = $request->nombre;
            $rubro->descripcion = $request->descripcion;
            $rubro->estado = 1;
            $rubro->save();
            Session::put('success', 'Rubro ' . $rubro->nombre . ' creado correctamente');
            DB::commit();
        } catch (\Exception $exception) {
            Session::put('danger', 'Ocurrio un problema al crear el rubro ' . $request->nombre);
            DB::rollBack();
        }
        return redirect()->route('rubros.index');
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $rubro = Rubro::findOrFail($request->id);
            $rubro->nombre = $request->nombre;
            $rubro->descripcion = $request->descripcion;
            $rubro->save();
            Session::put('success', 'Rubro ' . $rubro->nombre . ' actualizado correctamente');
            DB::commit();
        } catch (\Exception $exception) {
            Session::put('danger', 'Ocurrio un problema al actualizar el rubro ' . $request->nombre);
            DB::rollBack();
        }
        return redirect()->route('rubros.index');
    }

    public function destroy($id)
    {
        //
        try {
            DB::beginTransaction();
            $rubro = Rubro::findOrFail($id);
            $rubro->estado = 0;
            $rubro->update();
            Session::put('success', 'Rubro ' . $rubro->nombre . ' eliminado correctamente');
            DB::commit();
        } catch (\Exception $exception) {
            Session::put('danger', 'Ocurrio un problema al eliminar el rubro nro:' . $id);
            DB::rollBack();
        }
        return redirect()->route('rubros.index');
    }
}
