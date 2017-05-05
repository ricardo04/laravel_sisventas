@extends('layouts.admin') @section ('content')

<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nueva Categoria
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
                    {!!Form::open(array('url'=>'almacen/categoria','method'=>'POST','autocomplete'=>'off')) !!} {{Form::token()}}
                    <div class="row">
                        <div class="form-group form-float col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label class="form-label" for="nombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}">
                            </div>
                        </div>
                        <div class="form-group form-float col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label class="form-label" for="descripcion">Descripcion</label>
                                <input type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       <div class="form-group form-float col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label class="form-label" for="utilidad">Utilidad (%)</label>
                                <input type="text" name="utilidad" class="form-control number" value="{{old('utilidad')}}">
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top:25px">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <a href="{{url('almacen/categoria')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                    {!!Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@include('almacen.categoria.script')
@endsection