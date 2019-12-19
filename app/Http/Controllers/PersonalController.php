<?php

namespace App\Http\Controllers;

use App\Configuracion;
use App\Persona;
use App\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Vista;
use SebastianBergmann\Environment\Console;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view=Vista::where('nombre','=','personal')->first();
        $view->vistas=$view->vistas+1;
        $view->update();
        $personales=Personal::all()->where('estado',1);
        $configuracion=Configuracion::where('personal_id','=',Auth::user()->id)->where('estado',1)->first();
        if ($configuracion == null) {
            $configuracion = Configuracion::where('personal_id', '=', 0)->first();
        }
        return view('Persona.personal.index',compact('personales','view','configuracion'));
    }

    public function buscar($texto)
    {
        $view=Vista::where('nombre','=','personal')->first();
        $personales=Personal::where('estado',1)->where('nick', 'ilike', '%' . $texto . '%')->get();
        $configuracion=Configuracion::tema()->first();
        if ($configuracion == null) {
            $configuracion = Configuracion::default()->first();
        }
        return view('Persona.personal.index', compact('personales','personas','view','configuracion'));
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
        try {
            DB::beginTransaction();
            $persona=new Persona($request->all());
            $persona->tipo_persona='PER';
            $persona->save();
            $personal=new Personal();
            $personal->nick=$request->nick;
            $personal->rol=$request->rol;
            $personal->password=$request->password;
            $personal->personaid=$persona->id;
            $personal->tipo_personal='Auxilidar';
            $personal->save();
            Session::put('success','Usuario '.$personal->nick.' creado correctamente');
            DB::commit();
        }catch (\Exception $exception) {
            dd($exception);
            Session::put('danger','Ocurrio un problema al crear el usuario '.$personal->nick);
            DB::rollBack();
        }
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            DB::beginTransaction();
            $personal=Personal::findOrFail($request->id);
            $persona=Persona::where('id','=',$personal->personaid)->first();
            $persona->ci=$request->ci;
            $persona->nombre=$request->nombre;
            $persona->apellido_pat=$request->apellido_pat;
            $persona->apellido_mat=$request->apellido_mat;
            $persona->telefono=$request->telefono;
            $persona->email=$request->email;
            $persona->update();
            $personal->nick=$request->nick;
            $personal->password=$request->password;
            $personal->tipo_personal='Auxilidar';
            $personal->rol=$request->rol;
            $personal->update();
            Session::put('success','Usuario '.$personal->nick.' actualizado correctamente');
            DB::commit();
        }catch (\Exception $exception){
            Session::put('danger','Ocurrio un problema al actualizar al usuario '.$personal->nick);
            DB::rollBack();
        }
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $personal=Personal::findOrFail($id);
            $persona=Persona::findOrFail($personal->personaid);
            $persona->estado=0;
            $persona->update();
            $personal->estado=0;
            $personal->update();
            Session::put('success','Usuario '.$personal->nick.' eliminado correctamente');
            DB::commit();
        }catch (\Exception $exception){
            Session::put('danger','Ocurrio un problema al actualizar al usuario '.$personal->nick);
            DB::rollBack();
        }
        return redirect()->route('users.index');
    }

    public function login(Request $request) {
        $personal=Personal::all()->where('nick','like',trim($request->nick))->first();
        if($personal!=null){
            if($personal->password===$request->password){
                Auth::login($personal);
                return redirect()->route('home.index');
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
