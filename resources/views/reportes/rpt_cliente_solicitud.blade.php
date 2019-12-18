@extends('layouts.master')
@section('title', 'Reporte solicitudes')
@section('header-title','')
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
@section('content')
        <table id="solicitudTable" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>CLIENTE</th>
                <th>NRO SOLICITUD</th>
                <th>ACTIVIDAD</th>
            </tr>
            </thead>
            <tbody>
                @foreach($solicitudes as $solicitud)
                <tr>
                    <td>{{$solicitud->cliente->nombre}} {{$solicitud->cliente->apellido_pat}} {{$solicitud->cliente->apellido_mat}}</td>
                    <td>{{$solicitud->nro_orden}}</td>
                    <td>{{$solicitud->actividad->nombre}}</td>
                @endforeach
                </tr>
            </tbody>
        </table>
@endsection