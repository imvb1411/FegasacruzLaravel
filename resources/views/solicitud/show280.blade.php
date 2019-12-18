@extends('layouts.master')
@section('title', 'Solicitudes')
    @section('header-title','Listado de Solicitudes')
    @section('header-content')
    <div class="row">
        <div class="col-3">
        <a href="{{URL::action('SolicitudController@print',$solicitud->id)}}" class="btn btn-warning">Imprimir</a>
        </div>
    </div>
@endsection
@section('vistas')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12 float-sm-right">
            <div class="info-box bg-success">
                <span class="info-box-icon"><i class="far fa-flag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Visitas</span>
                    {{-- <span class="info-box-number">{{$view->vistas}}</span> --}}
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
<div >
    <input type="hidden" name="id" id="id" class="form-control">
    <h2 class="text-center">FORMULARIO 280V.3 SOLICITUD DE CERTIFICADO DE NO IMPONIBILIDAD RAU</h2><br/>
    <h3 class="text-center">DECLARACION JURADA</h3><br/>
    <h4 class="text-center">FORMULARIO 280V.3 SOLICITUD DE CERTIFICADO DE NO IMPONIBILIDAD RAU</h4><br/><br/><br/>
    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="cliente_id">NRO DE ORDEN: </label>
            <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="{{$solicitud->nro_orden}}" disabled="">
        </div>
        <div class="col-md-6">
                <label class="form-control-label" for="registrador_id">NIT - DEPENDENCIA OPERATIVA: </label>
                <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="{{$solicitud280->nit_dependencia}}" disabled="">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="cliente_id">NRO DE DOCUMENTO IDENTIFICACION: </label>
            <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="{{$solicitud280->nro_documento}}" disabled="">
        </div>
        <div class="col-md-6">
                <label class="form-control-label" for="registrador_id">GESTION: </label>
                <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="{{$solicitud->gestion}}" disabled="">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <label class="form-control-label" for="cliente_id">NOMBRES Y APELLIDOS: </label>
            <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="{{$solicitud->cliente->nombre}} {{$solicitud->cliente->apellido_pat}} {{$solicitud->cliente->apellido_mat}}" disabled="">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="cliente_id">NRO DE TELEFONO FIJO: </label>
            <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="{{$solicitud->cliente->telefono}}" disabled="">
        </div>
        <div class="col-md-6">
                <label class="form-control-label" for="registrador_id">GESTION: </label>
                <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="{{$solicitud->cliente->email}}" disabled="">
        </div>
    </div>
    <br>
    <h3 class="text-center">DECLARACION JURADA</h3><br/><br>
    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="cliente_id">DEPARTAMENTO: </label>
            <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="SANTA CRUZ" disabled="">
        </div>
        <div class="col-md-6">
                <label class="form-control-label" for="registrador_id">N° TITULO DE PROPIEDAD/ OTRO DOCUMENTO: </label>
                <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="{{$solicitud280->nro_titulopropiedad}}" disabled="">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="cliente_id">PROVINCIA: </label>
            <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="WARENES" disabled="">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="cliente_id">MUNICIPIO: </label>
            <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="WARENES" disabled="">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <label class="form-control-label" for="cliente_id">DOCUMENTO PRESENTADO A LA EMPRESA: </label>
            <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="{{$solicitud280->documento_empresa}}" disabled="">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="cliente_id">ZONA: </label>
            <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="SUBTROPICAL" disabled="">
        </div>
        <div class="col-md-6">
                <label class="form-control-label" for="registrador_id">ACTIVIDAD: </label>
                <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="{{$solicitud->actividad->nombre}}" disabled="">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="cliente_id">SUBZONA: </label>
            <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="SUBTROPICAL" disabled="">
        </div>
        <div class="col-md-6">
                <label class="form-control-label" for="registrador_id">ACTIVIDAD: </label>
                <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="{{$solicitud->actividad->descripcion}}" disabled="">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="cliente_id">SITIO: </label>
            <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="SANTA CRUZ" disabled="">
        </div>
        <div class="col-md-6">
                <label class="form-control-label" for="registrador_id">EXTENSION HECTAREAS DE NO IMPONIBILIDAD: </label>
                <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="{{$solicitud->nro_hectareas}}" disabled="">
        </div>
    </div>
    <br>
    <h2>PRESENTE DECLARACION</h2>
    <br>
    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="cliente_id">LUGAR Y FECHA DE SOLICITUD: </label>
            <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="SANTA CRUZ, {{$solicitud->fecha_solicitud}}" disabled="">
        </div>
        <div class="col-md-6">
                <label class="form-control-label" for="registrador_id">N° ORDEN DE BOLETA DE PAGO: </label>
                <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="{{$solicitud280->nro_boletapago}}" disabled="">
        </div>
    </div>
</div>
@endsection