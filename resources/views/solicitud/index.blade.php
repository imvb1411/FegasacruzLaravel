@extends('layouts.master')
@section('title', 'Solicitudes')
@section('header-title','Listado de Solicitudes')
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
            <button class="btn btn-primary btn-lg" id="new" data-toggle="modal" data-target="#edit">Nuevo</button>
        </div>
    </div>
@endsection
@section('content')
    <table id="solicitudTable" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>NRO ORDEN</th>
            <th>PRODUCTOR</th>
            <th>REGISTRADOR</th>
            <th>GESTION</th>
            <th>HECTAREAS</th>
            <th>FECHA <br> SOLICITUD</th>
            <th>TIPO <br> SOLICITUD</th>
            <th>ACCIONES</th>
        </tr>
        </thead>
        <tbody>
        @foreach($solicitudes as $solicitud)
            <tr>
                <td>{{$solicitud->id}}</td>
                <td>{{$solicitud->nro_orden}}</td>
                <td>{{$solicitud->cliente->nombre}} <br> {{$solicitud->cliente->apellido_pat}} <br> {{$solicitud->cliente->apellido_mat}}</td>
                <td>{{$solicitud->personal->nick}}</td>
                <td>{{$solicitud->gestion}}</td>
                <td>{{$solicitud->nro_hectareas}}</td>
                <td>{{$solicitud->fecha_solicitud}}</td>
                <td>{{$solicitud->tipo_solicitud}}</td>
                <td>
                    <a href="{{URL::action('SolicitudController@show',$solicitud->id)}}" class="btn btn-warning">
                        Info
                    </a>
                    <a class="btn btn-info"
                       onclick='editar({{ json_encode($solicitud) }})'>
                        Edit
                    </a>
                    @if(\Illuminate\Support\Facades\Auth::user()->getRole()==='ADMINISTRADOR')
                        {!! Form::open(['route' => ['solicitudes.destroy',$solicitud->id],'method'=>'DELETE','style'=>'display: inline']) !!}
                        {{Form::token()}}
                        <button onclick="return confirm('¿Estas seguro?')" type="submit" class="btn btn-danger">Delete
                        </button>
                        {!! Form::close() !!}
                    @endif
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
    <div id="edit" class="modal fade" role="dialog">
        {!! Form::open(['route' => ['solicitudes.update','0'],'method'=>'PUT','id'=>"userForm"]) !!}
        {{Form::token()}}
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="htitle">Editar Solicitud</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @include('solicitud.form')
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @push('scripts')
        @include('solicitud.modal')
    @endpush

@endsection