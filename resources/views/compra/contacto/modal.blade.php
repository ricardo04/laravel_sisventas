
<div class="modal fade modal-slide-in-right" role="dialog" tabindex="-1" id="modal-delete-{{$contact->idcontacto}}">
    {{Form::Open(array('action'=>array('ContactoController@destroy',$contact->idcontacto),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            @if($contact->condicion == 1)
            <div class="modal-header" style="background-color:#d9534f">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title" style="color:white">Eliminar Contacto</h4>
            </div>
            @else
            <div class="modal-header" style="background-color:#5bc0de">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title" style="color:white">Reanudar Contacto</h4>
            </div>
            @endif


            <div class="modal-body">
                @if($contact->condicion == 1)
                <p>Esta seguro que desea Eliminar ha este Contacto? </p>
                @else
                <p>Esta seguro que desea Reanudar ha este Contacto ? </p>
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
