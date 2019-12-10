@extends('layouts.master')
@section('title', 'Planos')
    @section('header-title','Listado de Planos')
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
        <table id="planoTable" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>
                    NRO. 
                    <br>
                    SOLICITUD
                </th>
                <th>IMAGEN</th>
                <th>DESCRIPCION</th>
                <th>OPERACIONES</th>
            </tr>
            </thead>
            <tbody>
                @foreach($planos as $plano)
                <tr>
                    <td>{{$plano->id}}</td>
                    <td>{{$plano->solicitud->id}}</td>
                    <td> 
                        <a href="plano/img/{{ $plano->id }}" target="_blank"><img src="data:{{$plano->mime}};base64, {{$plano->data}}" width="100"> </td></a>
                    <td>{{$plano->descripcion}}</td>
                    <td >
                        <a class="btn btn-info"
                           onclick='editar({{ json_encode($plano) }})'>
                            Edit
                        </a>
                        {!! Form::open(['route' => ['planos.destroy',$plano->id],'method'=>'DELETE','style'=>'display: inline']) !!}
                        {{Form::token()}}
                        <button onclick="return confirm('¿Estas seguro?')" type="submit" class="btn btn-danger">Delete</button>
                        {!! Form::close() !!}
                    </td>
                @endforeach
                </tr>
            </tbody>
        </table>
    <div id="edit" class="modal fade" role="dialog">
        {!! Form::open(['route' => ['planos.update','0'],'method'=>'PUT','id'=>"userForm"]) !!}
        {{Form::token()}}
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="htitle">Editar plano</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    @include('plano.form')
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @push('scripts')
        @include('plano.modal')
    @endpush

@endsection