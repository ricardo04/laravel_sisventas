{!! Form::open(array('url'=>'almacen/getproductos', 'onkeypress'=>'return event.keyCode != 13','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

<div class="col-lg-4 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-5 col-sm-offset-1 col-xs-12">
    <div class="form-group">
        <div class="input-group">
            <input id="searchtxt" type="text" name="searchText" class="form-control" placeholder="Buscar ..">
            <span class="input-group-btn">
				<label class="btn btn-primary">Buscar</label>
			</span>
        </div>
    </div>
</div>
{{Form::close()}}



