@extends('layouts.admin') 
@section ('content')
@include('sweet::alert')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Usuarios del Sistema
                </div>
                <div class="panel-body">
                    <div class="row">
                         <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" style="margin-bottom:20px">
                            <a href="{{url('exportusuarios')}}" class="btn bg-green waves-effect btn-xs"><i class="material-icons" aria-hidden="true">print</i> Exportar</a>
                        </div>
                        <div class="col-lg-2 col-lg-offset-8 col-md-2 col-md-offset-6 col-sm-2 col-sm-offset-6 col-xs-12" style="margin-bottom:20px">
                            <a data-target="#modal-agregarusuario" data-toggle="modal">
                                <button class="btn bg-purple waves-effect btn-xs">
                                   <i class="material-icons" aria-hidden="true">add</i> Nuevo Usuario
                                </button>
                            </a>
                            @include('seguridad.usuario.create')
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                        <table id="tableusuario" class="table table-striped table-bordered table-condensed table-hover nowrap" cellspacing="0">
                            <thead>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>Cargo</th>
                                <th>Opcion</th>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $user)
                                <tr>
                                    <td>{{$user->cedula}}</td>
                                    <td>{{$user->nombre}}</td>
                                    <td>{{$user->correo}}</td>
                                    <td>{{$user->telefono}}</td>
                                    <td>{{$user->direccion}}</td>
                                    <td>{{$user->cargo}}</td>
                                    <td>
                                       <a href="{{URL::action('UsuarioController@edit',$user->id)}}">
                                            <button class="btn btn-warning btn-xs"><i class="material-icons">edit</i></button>
                                        </a>
                                        @if($user->condicion)
                                        <a data-target="#modal-delete-{{$user->id}}" data-toggle="modal">
                                            <button class="btn btn-info btn-xs"><i class="material-icons">delete</i></button>
                                            <p style="visibility:hidden;margin:-10px">habilitado</p>
                                        </a>
                                        @else
                                        <a data-target="#modal-delete-{{$user->id}}" data-toggle="modal">
                                            <button class="btn btn-danger btn-xs"><i class="material-icons">restore</i></button>
                                            <p style="visibility:hidden;margin:-10px">desabilitado</p>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @include('seguridad.usuario.modal')
                                @endforeach
                            </tbody>
                        </table>
                        @include('seguridad.usuario.script')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection