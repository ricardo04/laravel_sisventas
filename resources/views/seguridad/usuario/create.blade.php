<div class="modal fade modal-slide-in-right" role="dialog" tabindex="-1" id="modal-agregarusuario">
    {!!Form::open(array('url'=>'seguridad/usuario','method'=>'POST','autocomplete'=>'off','files'=>true,'onkeypress'=>'return event.keyCode != 13')) !!} {{Form::token()}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#3c8dbc">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title" style="color:white">Agregar Usuario</h4>
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
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="cedula">Cedula</label>
                                <input type="text" name="cedula" class="form-control cedula" value="{{old('cedula')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="nombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="telefono">Telefono</label>
                                <input type="text" name="telefono" class="form-control telefono" value="{{old('telefono')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="correo">Correo</label>
                                <input type="text" name="correo" class="form-control" value="{{old('correo')}}" placeholder="user@example.com">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="password">Password</label>
                                <input id="password" type="password" name="password" class="form-control" value="{{old('password')}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="confirmpassword">Confirm Password</label>
                                <input id="confirmpassword" type="password" class="form-control" value="{{old('password')}}">
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-line">
                            <label  for="direccion">Direccion</label>
                            <input type="text" name="direccion" class="form-control" value="{{old('direccion')}}">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <label>Cargo</label>
                        <select name="cargo" class="form-control selectpicker" data-style="btn-warning">
                            @foreach($cargos as $cargo)
                            <option value="{{$cargo->idcargo}}"> {{$cargo->nombre}} </option>
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
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top:25px">
                        <button class="btn" style="background-color:#398439;color:white" type="submit">Guardar</button>
                        <a data-dismiss="modal" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!!Form::close() !!}
</div>