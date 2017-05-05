<div class="modal fade modal-slide-in-right" role="dialog" tabindex="-1" id="modal-editproveedor-{{$pro->idproveedor}}">
    {!! Form::model(null,['method'=>'PATCH','route'=>['proveedor.update',$pro->idproveedor],'autocomplete'=>'off']) !!} {{Form::token()}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#d58512">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title" style="color:white">Modificar Proveedor</h4>
            </div>
            <div class="modal-body">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-line">
                            <label  for="ruc">RUC</label>
                            <input type="text" name="ruc" class="ruc form-control" value="{{$pro->ruc}}">
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="nombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="{{$pro->nombre}}">
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-line">
                            <label  for="telefono">Telefono</label>
                            <input type="text" name="telefono" class="form-control telefono" value="{{$pro->telefono}}">
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-line">
                            <label  for="direccion">Direccion</label>
                            <input type="text" name="direccion" class="form-control" value="{{$pro->direccion}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-line">
                            <label  for="correo">Correo</label>
                            <input type="email" name="correo" class="form-control" value="{{$pro->correo}}">
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top:25px">
                        <button class="btn btn-primary" type="submit">Actualizar</button>
                        <a data-dismiss="modal" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>