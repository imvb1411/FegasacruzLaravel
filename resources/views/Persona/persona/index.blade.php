@extends('layouts.master')
@section('title', 'Usuarios')
    @section('header-title','Listado de usuarios')
@section('header-content')
    <div class="row">
        <div class="col-3">
            <button class="btn btn-primary btn-lg" id="new" data-toggle="modal" data-target="#edit">Nuevo</button>
        </div>
        <div class="col-9">
            <div class="col-md-3 col-sm-6 col-12 float-sm-right">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="far fa-flag"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Visitas</span>
                        <span class="info-box-number">{{$view->views}}</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
        <table id="userTable" class="table table-bordered table-hover">
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
            @foreach($users as $user)
                <tr>
                <td>{{$user->iduser}}</td>
                <td>{{$user->nick}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->person->firstname}} {{$user->person->lastname}}</td>
                <td >
                    <a class="btn btn-info"
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
                    {!! Form::close() !!}
                </td>
            @endforeach
                </tr>
            </tbody>
        </table>

    <div id="edit" class="modal fade" role="dialog">
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
                    <div class="modal-body">
                        <input type="hidden" name="iduser" id="iduser" class="form-control">
                        <div class="row">
                            <div class="col-4">
                                <label for="personid">EMPLEADO</label>
                                <select name="personid" id="personid" class="form-control">
                                    @foreach($people as $person)
                                        <option value="{{$person->person->idperson}}">{{$person->person->firstname}} {{$person->person->lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="role">ROL</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="ADMINISTRADOR">Administrador</option>
                                    <option value="ASISTENTE">Asistente</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="packing">NICK</label>
                                <input type="text" name="nick" id="nick" class="form-control" placeholder="Ingrese el nick" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="packing">CONTRASEÑA</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese la contraseña" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn">Editar</button>
                    </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @push('scripts')
        {{--<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>--}}
        {{--{!! JsValidator::formRequest('App\Http\Requests\UserRequest', '#userForm'); !!}--}}
        @include('Persona.persona.modal')
    @endpush
@endsection