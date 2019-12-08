@extends('layouts.master')
@section('title','Clientes')
@section('header-title','Listado de Clientes')
@section('vistas')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12 float-sm-right">
            <div class="info-box bg-success">
                <span class="info-box-icon"><i class="far fa-flag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Visitas</span>
                    {{-- <span class="info-box-number">{{$view->views}}</span> --}}
                    <span class="info-box-number">total</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('header-content')
    <div class="row">
        <div class="col-3">
            <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                    <i class="fa fa-plus fa-1x"></i>&nbsp;&nbsp;Agregar
                </button>
        </div>

    </div>
@endsection

@section('content')
    {{--<div class="form-group row">--}}
        {{--<div class="col-md-6">--}}
        {{--{!!Form::open(array('url'=>'cliente','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!} --}}
            {{--<div class="input-group">--}}
            {{----}}
                {{--<input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">--}}
                {{--<button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>--}}
            {{--</div>--}}
        {{--{{Form::close()}}--}}
        {{--</div>--}}
    {{--</div>--}}
    <table id="userTable" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>CI</th>
                <th>NOMBRE</th>
                <th>APELLIDOS</th>
                <th>TELEFONO</th>
                <th>ACCIONES</th>
            </tr>
            </thead>
            <tbody>
            @foreach($personas as $person)
                <tr>
                <td>{{$person->id}}</td>
                <td>{{$person->ci}}</td>
                <td>{{$person->nombre}}</td>
                <td>{{$person->apellido_pat}}{{$person->apellido_mat}}</td>
                <td>{{$person->telefono}}</td>
                <td >
                    boton visualizar
                    {{-- <a href="{{URL::action('PersonaController@show', $person->id)}}">
                        <button type="button" class="btn btn-warning btn-md">
                            <i class="fa fa-eye fa-2x"></i> Ver detalle
                        </button> &nbsp;
                    </a> --}}

                    <button type="button" class="btn btn-info btn-md" 
                        data-id="{{$person->id}}"
                        data-ci="{{$person->ci}}" 
                        data-nombre="{{$person->nombre}}"
                        data-apellido_pat="{{$person->apellido_pat}}"
                        data-apellido_mat="{{$person->apellido_mat}}"
                        data-telefono="{{$person->telefono}}"
                        data-email="{{$person->email}}"
                        data-toggle="modal" 
                        data-target="#abrirmodalEditar">
                            <i class="fa fa-edit fa-2x"></i> Editar
                    </button> &nbsp;
{{-- -------------- --}}
                    {{-- <a class="btn btn-info"
                       data-iduser="{{$user->iduser}}"
                       data-personid="{{$user->personid}}"
                       data-nick="{{$user->nick}}"
                       data-password="{{$user->password}}"
                       data-name="{{$user->person->firstname}} {{$user->person->lastname}}"
                       data-toggle="modal" id="btnedit" data-target="#edit" onclick="editClick();">
                        Edit
                    </a>
                    {!! Form::open(['route' => ['users.destroy',$user->iduser],'method'=>'DELETE','style'=>'display: inline']) !!}
                    {{Form::token()}}
                    <button onclick="return confirm('¿Are you sure?')" type="submit" class="btn btn-danger">Delete</button>
                    {!! Form::close() !!} --}}
                </td>
            @endforeach
                </tr>
            </tbody>
        </table>
        {{--{{$personas->render()}}--}}
    @push('scripts')
    <script>
        $(function () {
            $("#userTable").DataTable();
        });
    </script>
    @endpush
        @include('cliente.add')
        @include('cliente.update')

@endsection
