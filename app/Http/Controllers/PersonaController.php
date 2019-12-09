<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            // $persona = Persona::all()->where('estado',1);
            
            //  if($request){
            //      $sql=trim($request->get('buscarTexto'));
            //      $clientes=DB::table('persona')
            //      ->where('nombre','LIKE','%'.$sql.'%')
            //      ->where('tipo_persona','CLI')
            //      ->orderBy('id','desc')
            //      ->paginate(3);
            //      return view('Persona.persona.index',["clientes"=>$clientes,"buscarTexto"=>$sql]);
            //  }

           $clientes=Persona::all()->where('estado',1)->where('tipo_persona','CLI');
           return view('Persona.persona.index',compact('clientes'));

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
        DB::beginTransaction();
        try {
            $persona=new Persona();
            $persona->ci = $request->ci;
            $persona->nombre = $request->nombre;
            $persona->apellido_pat = $request->apellido_pat;
            $persona->apellido_mat = $request->apellido_mat;
            $persona->telefono = $request->telefono;
            $persona->email = $request->email;
            $persona->tipo_persona = 'CLI';
            $persona->save();
            Session::put('success','Cliente '.$persona->nombre.' creado correctamente');
            DB::commit();
        }catch (\Exception $exception) {
            Session::put('danger','Ocurrio un problema al crear el cliente '.$request->nombre);
            DB::rollBack();
        }
        return redirect()->route('clientes.index');
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $persona= Persona::findOrFail($request->id);
        // $persona->ci = $request->ci;
        // $persona->nombre = $request->nombre;
        // $persona->apellido_pat = $request->apellido_pat;
        // $persona->apellido_mat = $request->apellido_mat;
        // $persona->telefono = $request->telefono;
        // $persona->email = $request->email;
        // $persona->save();
        // return Redirect::to("cliente");
        try{
            DB::beginTransaction();
            $persona=Persona::findOrFail($request->id);
            $persona->ci = $request->ci;
            $persona->nombre = $request->nombre;
            $persona->apellido_pat = $request->apellido_pat;
            $persona->apellido_mat = $request->apellido_mat;
            $persona->telefono = $request->telefono;
            $persona->email = $request->email;
            $persona->save();
            Session::put('success','Cliente '.$persona->nombre.' actualizado correctamente');
            DB::commit();
        }catch (\Exception $exception){
            Session::put('danger','Ocurrio un problema al actualizar al cliente '.$request->nombre);
            DB::rollBack();
        }
        // return redirect()->route('clientes.index');
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
            DB::beginTransaction();
            $persona=Persona::findOrFail($id);
            $persona->estado=0;
            $persona->update();
            Session::put('success','Cliente '.$persona->nombre.' eliminado correctamente');
            DB::commit();
        }catch (\Exception $exception){
            Session::put('danger','Ocurrio un problema al eliminar al cliente con id '.$id);
            DB::rollBack();
        }
        return redirect()->route('clientes.index');
    }
}
