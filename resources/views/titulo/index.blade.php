@extends('layouts.master')
@section('title', 'Titulos')
    @section('header-title','Listado de Titulos')
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
        <table id="tituloTable" class="table table-bordered table-hover">
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
                @foreach($titulos as $titulo)
                <tr>
                    <td>{{$titulo->id}}</td>
                    <td>{{$titulo->solicitud->id}}</td>
                    <td> 
                        <a href="titulo/img/{{ $titulo->id }}" target="_blank"><img src="data:{{$titulo->mime}};base64, {{$titulo->data}}" width="100"> </td></a>
                    <td>{{$titulo->descripcion}}</td>
                    <td >
                        <a class="btn btn-info"
                           onclick='editar({{ json_encode($titulo) }})'>
                            Edit
                        </a>
                        {!! Form::open(['route' => ['titulos.destroy',$titulo->id],'method'=>'DELETE','style'=>'display: inline']) !!}
                        {{Form::token()}}
                        <button onclick="return confirm('¿Estas seguro?')" type="submit" class="btn btn-danger">Delete</button>
                        {!! Form::close() !!}
                    </td>
                @endforeach
                </tr>
            </tbody>
        </table>
    <div id="edit" class="modal fade" role="dialog">
        {!! Form::open(['route' => ['titulos.update','0'],'method'=>'PUT','id'=>"userForm"]) !!}
        {{Form::token()}}
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="htitle">Editar titulo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    @include('titulo.form')
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @push('scripts')
        @include('titulo.modal')
    @endpush

@endsection