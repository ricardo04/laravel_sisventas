@extends('layouts.admin')
@section ('content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong style="color:green">Editar Producto</strong>
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
                    @endif {!!Form::model($producto,['method'=>'PATCH','route'=>['producto.update',$producto->idproducto],'autocomplete'=>'off','files'=> true,'onkeypress'=>'return event.keyCode != 13']) !!} {{Form::token()}}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label  for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" value="{{$producto->nombre}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label for="descripcion">Descripcion</label>
                                    <input type="text" name="descripcion" class="form-control" value="{{$producto->descripcion}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="idcategoria">Categoria</label>
                                <select name="idcategoria" class="form-control selectpicker" data-style="btn-success">
                                    @foreach($categorias as $categoria) @if($categoria->idcategoria == $producto->idcategoria)
                                    <option value="{{$categoria->idcategoria}}" selected> {{$categoria->nombre}} </option>
                                    @else
                                    <option value="{{$categoria->idcategoria}}"> {{$categoria->nombre}} </option>
                                    @endif 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label>Marca</label>
                                <select name="idmarca" class="form-control selectpicker" data-style="btn-warning">
                                    @foreach($marcas as $marca) @if($marca->idmarca == $producto->idmarca)
                                    <option value="{{$marca->idmarca}}" selected> {{$marca->nombre}} </option>
                                    @else
                                    <option value="{{$marca->idmarca}}"> {{$marca->nombre}} </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label for="codigobarra">Codigo Barra</label>
                                    <input type="text" name="codigobarra" class="form-control" value="{{$producto->codigobarra}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <label class="form-group" for="imagen">Imagen</label>
                                    <input name="imagen" type="file" class="filestyle" data-buttonName="btn-primary">   
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <a href="{{url('almacen/producto')}}" class="btn btn-danger" type="reset">Cancelar</a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            @if($producto->imagen != "")
                            <img src="{{asset('pictures/productos/'. $producto->imagen)}}" height="100px" width="100px" alt="{{$producto->nombre}}" class="img-thumbnail"> @endif
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection