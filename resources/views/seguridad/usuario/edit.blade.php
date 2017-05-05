@extends('layouts.admin')
@section('content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-1 col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Usuario: 
                    <strong style="color:green">"{{$usuario->name}}"</strong>
                </div>
                <div class="panel-body">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                               <li>{{$error}}</li>
                            @endforeach 
                            </ul>
                        </div>
                    @endif

                    {!!Form::model($usuario,['method'=>'PATCH','route'=>['usuario.update',$usuario->id],'autocomplete'=>'off','files'=> true]) !!}
                    {{Form::token()}}

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label  for="cedula">Cedula</label>
                                    <input type="text" name="cedula" class="form-control cedula" value="{{$usuario->cedula}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label  for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" value="{{$usuario->name}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label  for="telefono">Telefono</label>
                                    <input type="text" name="telefono" class="form-control telefono" value="{{$usuario->telefono}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label  for="correo">Correo</label>
                                    <input type="text" name="correo" class="form-control" value="{{$usuario->email}}" placeholder="user@example.com">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label  for="password">Password</label>
                                    <input id="password" type="password" name="password" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label  for="confirmpassword">Confirm Password</label>
                                    <input id="confirmpassword" type="password" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label  for="direccion">Direccion</label>
                                    <input type="text" name="direccion" class="form-control" value="{{$usuario->direccion}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label>Cargo</label>
                                <select name="idcargo" class="form-control selectpicker" data-style="btn-warning">
                                @foreach($cargos as $cargo)
                                    @if($cargo->idcargo == $usuario->idcargo)
                                        <option value="{{$cargo->idcargo}}" selected>{{$cargo->nombre}}</option>
                                    @else
                                        <option value="{{$cargo->idcargo}}">{{$cargo->nombre}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="imagen">Imagen</label>
                                <input name="imagen" type="file" class="filestyle form-control" data-buttonName="btn-primary">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            @if($usuario->imagen != "")
                                <img src="{{asset('pictures/usuarios/'. $usuario->imagen)}}" height="100px" width="100px" alt="{{$usuario->nombre}}" class="img-thumbnail"> 
                            @endif
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top:25px">
                                <button class="btn" style="background-color:#398439;color:white" type="submit">Guardar</button>
                                <a href="{{url('seguridad/usuario')}}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
                    {!!Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@include('seguridad.usuario.script')
@endsection