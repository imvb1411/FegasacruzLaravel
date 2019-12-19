@extends('layouts.master')
@section('title', 'Usuarios')
@section('header-title','Listado de usuarios')
@section('vistas')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12 float-sm-right">
            <div class="info-box bg-success">
                <span class="info-box-icon"><i class="far fa-flag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Visitas</span>
                    <span class="info-box-number">{{$view->vistas}}</span>
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
            <button class="btn btn-primary btn-lg" id="new" data-toggle="modal" data-target="#editPersonal">Nuevo</button>
        </div>
    </div>
@endsection

@section('content')
    <table id="personalTable" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>NICK</th>
            <th>ROL</th>
            <th>EMPLEADO</th>
            <th>OPERACIONES</th>
        </tr>
        </thead>
        <tbody>
        @foreach($personales as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->nick}}</td>
                <td>{{$user->rol}}</td>
                <td>{{$user->persona->nombre}} {{$user->persona->apellido_pat}} {{$user->persona->apellido_mat}}</td>
                <td>
                    <a class="btn btn-info"
                       id="btnedit" onclick="editPersonalClick({{json_encode($user)}});">
                        Edit
                    </a>
                    {!! Form::open(['route' => ['users.destroy',$user->id],'method'=>'DELETE','style'=>'display: inline']) !!}
                    {{Form::token()}}
                    <button onclick="return confirm('¿Are you sure?')" type="submit" class="btn btn-danger">Delete
                    </button>
                    {!! Form::close() !!}
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>

    <div id="editPersonal" class="modal fade" role="dialog">
        {!! Form::open(['route' => ['users.update','0'],'method'=>'PUT','id'=>"userForm"]) !!}
        {{Form::token()}}
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="htitle">Editar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @include('Persona.personal.form')
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @push('scripts')
        @include('Persona.personal.modal')
    @endpush
@endsection