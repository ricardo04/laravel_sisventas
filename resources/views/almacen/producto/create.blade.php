@extends('layouts.admin') 
@section ('content')

<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nuevo Producto
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
                    @endif {!!Form::open(array('url'=>'almacen/producto','method'=>'POST','autocomplete'=>'off','files'=> true,'onkeypress'=>'return event.keyCode != 13'))!!} {{Form::token()}}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label  for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label for="descripcion">Descripcion</label>
                                    <input type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="idcategoria">Categoria</label>
                                <select name="idcategoria" class="form-control selectpicker" data-style="btn-success">
                                    @foreach($categorias as $categoria)
                                    <option value="{{$categoria->idcategoria}}"> {{$categoria->nombre}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label>Marca</label>
                                <select name="idmarca" class="form-control selectpicker" data-style="btn-warning">
                                    @foreach($marcas as $marca)
                                    <option value="{{$marca->idmarca}}"> {{$marca->nombre}} </option>
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
                                    <input type="text" name="codigobarra" class="form-control" value="{{old('codigobarra')}}">
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

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <a href="{{url('almacen/producto')}}" class="btn btn-danger" type="reset">Cancelar</a>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.selectpicker').selectpicker();
        $(".numeric").numeric();
    });
</script>
@endsection