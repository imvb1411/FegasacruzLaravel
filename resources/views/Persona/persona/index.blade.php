@extends('layouts.master')
@section('title', 'Clientes')
    @section('header-title','Listado de clientes')
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
            <button class="btn btn-primary btn-lg" id="new" data-toggle="modal" data-target="#edit">Nuevo</button>
        </div>
    </div>
@endsection
@section('content')
        <table id="clientTable" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>CI</th>
                <th>NOMBRE</th>
                <th>APELLIDOS</th>
                <th>TELEFONO</th>
                <th>EMAIL</th>
                <th>OPERACIONES</th>
            </tr>
            </thead>
            <tbody>
                @foreach($clientes as $person)
                <tr>
                    <td>{{$person->id}}</td>
                    <td>{{$person->ci}}</td>
                    <td>{{$person->nombre}}</td>
                    <td>{{$person->apellido_pat}} {{$person->apellido_mat}}</td>
                    <td>{{$person->telefono}}</td>
                    <td>{{$person->email}}</td>
                    <td >
                        <a class="btn btn-info"
                        {{--data-idcliente="{{$person->id}}"--}}
                        {{--data-ci="{{$person->ci}}" --}}
                        {{--data-nombre="{{$person->nombre}}"--}}
                        {{--data-apellido_pat="{{$person->apellido_pat}}"--}}
                        {{--data-apellido_mat="{{$person->apellido_mat}}"--}}
                        {{--data-telefono="{{$person->telefono}}"--}}
                        {{--data-email="{{$person->email}}"--}}
                        {{--data-toggle="modal" id="btnedit" data-target="#edit" --}}
                           onclick='editar({{ json_encode($person) }})'>
                            Edit
                        </a>
                        {!! Form::open(['route' => ['clientes.destroy',$person->id],'method'=>'DELETE','style'=>'display: inline']) !!}
                        {{Form::token()}}
                        <button onclick="return confirm('¿Estas seguro?')" type="submit" class="btn btn-danger">Delete</button>
                        {!! Form::close() !!}
                    </td>
                @endforeach
                </tr>
            </tbody>
        </table>
        {{-- {{$clientes->render()}} --}}
    <div id="edit" class="modal fade" role="dialog">
        {!! Form::open(['route' => ['clientes.update','0'],'method'=>'PUT','id'=>"userForm"]) !!}
        {{Form::token()}}
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="htitle">Editar Cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    @include('Persona.persona.form')
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @push('scripts')
        @include('Persona.persona.modal')
    @endpush

@endsection