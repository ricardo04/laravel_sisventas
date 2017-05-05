@extends('layouts.admin')
@section ('content')
@include('sweet::alert')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado de Proveedores
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6" style="margin-bottom: 20px">
                            <a href="{{url('exportproveedor')}}"class="btn bg-green waves-effect btn-xs"><i class="material-icons" aria-hidden="true">print</i>  Exportar</a>
                        </div>
                        <div class="col-lg-2 col-lg-offset-8 col-md-2 col-md-offset-6 col-sm-2 col-sm-offset-6 col-xs-6" style="margin-bottom: 20px">
                            <a data-target="#modal-agregarproveedor" data-toggle="modal">
                               <button class="btn bg-purple waves-effect btn-xs">
                                   <i class="material-icons" aria-hidden="true">add</i> Nuevo Proveedor
                                </button>
                            </a>
                            @include('compra.proveedor.create')
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                        <table id="tableproveedor" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <th>RUC</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>telefono</th>
                                <th>correo</th>
                                <th>Opcion</th>
                            </thead>
                            <tbody>
                                @foreach($proveedores as $pro)
                                <tr>
                                    <td>{{$pro->ruc}}</td>
                                    <td>{{$pro->nombre}}</td>
                                    <td>{{$pro->direccion}}</td>
                                    <td>{{$pro->telefono}}</td>
                                    <td>{{$pro->correo}}</td>
                                    <td>
                                       <a href="{{url('compra/contacto/' . $pro->idproveedor)}}">
                                            <button class="btn btn-success btn-xs" data-toggle="tooltip" title="Contactos"><i class="material-icons">remove_red_eye</i></button>
                                        </a>
                                       <a data-target="#modal-editproveedor-{{$pro->idproveedor}}" data-toggle="modal">
                                            <button class="btn btn-warning btn-xs"><i class="material-icons" aria-hidden="true">edit</i></button>
                                        </a>
                                        @if($pro->condicion)
                                        <a data-target="#modal-delete-{{$pro->idproveedor}}" data-toggle="modal">
                                            <button class="btn btn-info btn-xs"><i class="material-icons" aria-hidden="true">delete</i></button>
                                            <p style="visibility:hidden;margin:-10px">habilitado</p>
                                        </a>
                                        @else
                                        <a data-target="#modal-delete-{{$pro->idproveedor}}" data-toggle="modal">
                                            <button class="btn btn-danger btn-xs"><i class="material-icons" aria-hidden="true">restore</i></button>
                                            <p style="visibility:hidden;margin:-10px">desabilitado</p>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @include('compra.proveedor.modal')
                                @include('compra.proveedor.edit')
                                @endforeach
                            </tbody>
                        </table>
                        @include('compra.proveedor.script')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection