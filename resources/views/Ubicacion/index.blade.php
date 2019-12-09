@extends('layouts.master')
@section('title', 'Ubicaciones')
@section('header-title','Listado de ubicaicones')
@section('vistas')
<div class="row">
    <div class="col-md-3 col-sm-6 col-12 float-sm-right">
        <div class="info-box bg-success">
            <span class="info-box-icon"><i class="far fa-flag"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Visitas</span>
                {{-- <span class="info-box-number">{{$view->vistas}}</span> --}}
                <span class="info-box-number">{{$view->vistas}}</span>
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
<table id="ubicacionTable" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>UBICACION_ID</th>
        <th>NOMBRE</th>
        <th>TIPO</th>
        <th>OPERACIONES</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ubicaciones as $ubicacion)
    <tr>
        <td>{{$ubicacion->id}}</td>
        <td>{{$ubicacion->ubicacion_id}}</td>
        <td>{{$ubicacion->nombre}}</td>
        <td>{{$ubicacion->tipo}}</td>
        <td >
            <a class="btn btn-info"
               onclick='editar({{ json_encode($ubicacion) }})'>
                Edit
            </a>
            {!! Form::open(['route' => ['ubicacion.destroy',$ubicacion->id],'method'=>'DELETE','style'=>'display: inline']) !!}
            {{Form::token()}}
            <button onclick="return confirm('¿Estas seguro?')" type="submit" class="btn btn-danger">Delete</button>
            {!! Form::close() !!}
        </td>
        @endforeach
    </tr>
    </tbody>
</table>
<div id="edit" class="modal fade" role="dialog">
    {!! Form::open(['route' => ['ubicacion.update','0'],'method'=>'PUT','id'=>"ubicacionForm"]) !!}
    {{Form::token()}}
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="htitle">Editar Ubicacion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @include('Ubicacion.form')
        </div>
    </div>
    {!! Form::close() !!}
</div>
@push('scripts')
    @include('Ubicacion.modal')
@endpush

@endsection
