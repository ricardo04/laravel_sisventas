@extends('layouts.admin') 
@section ('content')
@include('sweet::alert')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-xs-12 col-md-12  col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado de Categorias
                </div>
                <div class="panel-body">

                    <!--Buttons import to excel and new category -->
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" style="margin-bottom:20px">
                            <a href="{{url('export')}}" class="btn bg-green waves-effect btn-xs"><i class="material-icons" aria-hidden="true">print</i> Exportar</a>
                        </div>
                        <div class="col-lg-2 col-lg-offset-8 col-md-2 col-md-offset-6 col-sm-2 col-sm-offset-6 col-xs-12" style="margin-bottom:20px">
                            <a href="categoria/create">
                                <button class="btn bg-purple waves-effect btn-xs">
                                   <i class="material-icons" aria-hidden="true">add</i> Nueva Categoria
                                </button>
                            </a>
                        </div>
                    </div>

                    <!--Table where show elements -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                        <table id="tablecategoria" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Utilidad</th>
                                <th>Opciones</th>
                            </thead>
                            <tbody>
                                @foreach ($category as $cat)
                                <tr>
                                    <td>{{ $cat->idcategoria }}</td>
                                    <td>{{ $cat->nombre }}</td>
                                    <td>{{ $cat->descripcion }}</td>
                                    <td>{{ $cat->utilidad}} %</td>
                                    <td>
                                        <a href="{{URL::action('CategoriaController@edit',$cat->idcategoria)}}">
                                            <button class="btn btn-warning btn-xs"><i class="material-icons" aria-hidden="true">edit</i></button>
                                        </a>
                                        @if($cat->condicion)
                                        <a data-target="#modal-delete-{{$cat->idcategoria}}" data-toggle="modal">
                                            <button class="btn btn-info btn-xs"><i class="material-icons" aria-hidden="true">delete</i></button><p style="visibility:hidden;margin:-10px">habilitados</p>
                                            
                                        </a>
                                        @else
                                        <a data-target="#modal-delete-{{$cat->idcategoria}}" data-toggle="modal">
                                            <button class="btn btn-danger btn-xs"><i class="material-icons" aria-hidden="true">restore</i></button> <p style="visibility:hidden;margin:-10px">Desabilitado</p>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @include('almacen.categoria.modal') 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @include('almacen.categoria.script')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection