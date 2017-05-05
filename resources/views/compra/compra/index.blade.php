@extends('layouts.admin')
@section('content')
@include('sweet::alert')
<div class="row">
	<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
	</div>
	<div class="col-lg-3 - col-md-3 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-red align-center">
				<h2 style="font-size: 30px"> C$ 0.00 </h2>
			</div>
			<div class="body">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-line">
                				<label  for="numerofactura">N. Compra</label>
                            	<input type="numerocompra" name="numerofactura" class="form-control" value="{{old('numberofactura')}}">        
                            </div>
                        </div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
                                <label for="tipopago">Tipo Pago</label>
                                <select name="tipopago" class="form-control selectpicker" data-style="btn-success">
                                    <option value="0"> Contado </option>
                                    <option value="1"> Credito </option>
                                </select>
                            </div>
                        </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: -30px">
						<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
                                <label for="idproveedor">Proveedor</label>
                                <select name="idproveedor" class="form-control selectpicker" data-style="btn-info">
                                    @foreach ($proveedores as $pro)
                                    <option value="{{$pro->idproveedor}}"> {{$pro->nombre}} </option>
                                	@endforeach
                                </select>
                            </div>
                        </div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: -30px">
						<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
                                <label for="idcontacto">Contacto</label>
                                <select name="idcontacto" class="form-control selectpicker" data-style="btn-warning">
                                	<option> --------- </option>
                                </select>
                            </div>
                        </div>
					</div>	
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: -30px">
						<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-line">
                				<label  for="descuento"> Descuento C$ </label>
                            	<input type="text" name="descuento" class="form-control" value="0.00" style="text-align: center">  
                            </div>
                        </div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: -30px">
						<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-line">
                				<label  for="descuento"> Anticipo C$ </label>
                            	<input type="text" name="descuento" class="form-control" value="0.00" style="text-align: center" disabled="true">  
                            </div>
                        </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: -10px">
						<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-line">
                				<label  for="fecha"> Fecha </label>
                            	<input id="fecha" type="date" name="fecha" class="datepicker form-control">  
                            </div>
                        </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: -10px">
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection