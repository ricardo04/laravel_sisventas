<div class="modal fade modal-slide-in-right" role="dialog" tabindex="-1" id="modal-delete-{{$cat->idcategoria}}">
    {{Form::Open(array('action'=>array('CategoriaController@destroy',$cat->idcategoria),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            @if($cat->condicion == 1)

            <div class="modal-header" style="background-color:#d9534f">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title" style="color:white">Eliminar Categoria</h4> 
            </div>
            @else
                <div class="modal-header" style="background-color:#5bc0de">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title" style="color:white">Reanudar Categoria</h4> 
            </div>        
            @endif
            
            
            <div class="modal-body">
                @if($cat->condicion == 1)
                <p>Esta seguro que desea Eliminar esta categoria? </p>
                @else
                <p>Esta seguro que desea Reanudar esta categoria ? </p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
</div>