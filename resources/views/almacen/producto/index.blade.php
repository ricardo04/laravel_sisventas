@extends('layouts.admin')
@section ('content')
@include('sweet::alert')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado de Productos
                </div>
                <div class="panel-body">

                    <!--Buttons import to excel and new category -->
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6" style="margin-bottom:20px">
                            <a href="{{url('exportproductos')}}" class="btn bg-green waves-effect btn-xs"><i class="material-icons" aria-hidden="true">print</i> Exportar</a>
                        </div>
                        <div class="col-lg-2 col-lg-offset-8 col-md-2 col-md-offset-7 col-sm-2 col-sm-offset-6 col-xs-6">
                            <a href="producto/create">
                                <button class="btn bg-purple waves-effect btn-xs" style="margin-bottom:20px">
                                    <i class="material-icons" aria-hidden="true">add</i> Producto
                                </button>
                            </a>
                        </div>
                    </div>
                   

                    <!--Table where show elements -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                        <table id="tableproducto" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <th>Codigo Barra</th>
                                <th>Categoria</th>
                                <th>Nombre</th>
                                <th>Marca</th>
                                <th>Imagen</th>
                                <th>Descripcion</th>
                                <th>Options</th>
                            </thead>
                            <tbody>
                                @foreach ($product as $prod)
                                <tr>
                                    <td>{{ $prod->codigobarra }}</td>
                                    <td>{{ $prod->categoria }}</td>
                                    <td>{{ $prod->nombre}}</td>
                                    <td>{{ $prod->marca }}</td>
                                    <td>
                                        <img src="{{asset('pictures/productos/'. $prod->imagen)}}" alt="{{$prod->nombre}}" height="60px" width="60px" class="img-thumbnail">
                                    </td>
                                    <td>{{ $prod->descripcion}}</td>
                                    <td>
                                        <a href="" data-target="#modal-barcode-{{$prod->idproducto}}" data-toggle="modal">
                                            <button class="btn btn-success btn-xs"><i class="material-icons">view_column</i>
                                            </button>
                                        </a>
                                        <a href="{{URL::action('ProductoController@edit',$prod->idproducto)}}">
                                            <button class="btn btn-warning btn-xs"><i class="material-icons">edit</i></button>
                                        </a>
                                        @if($prod->condicion)
                                        <a href="" data-target="#modal-delete-{{$prod->idproducto}}" data-toggle="modal">
                                            <button class="btn btn-info btn-xs"><i class="material-icons">delete</i></button>
                                            <p style="visibility:hidden;margin:-10px">habilitado</p>
                                        </a>
                                        @else
                                        <a href="" data-target="#modal-delete-{{$prod->idproducto}}" data-toggle="modal">
                                            <button class="btn btn-danger btn-xs"><i class="material-icons">restore</i></button>
                                            <p style="visibility:hidden;margin:-10px">desabilitado</p>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @include('almacen.producto.modalbarcode') 
                                @include('almacen.producto.modal')
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('almacen.producto.script')
    @endsection