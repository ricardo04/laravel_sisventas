<div class="modal fade modal-slide-in-right" role="dialog" tabindex="-1" id="modal-delete-<?php echo e($mar->idmarca); ?>">
    <?php echo e(Form::Open(array('action'=>array('MarcaController@destroy',$mar->idmarca),'method'=>'delete'))); ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <?php if($mar->condicion == 1): ?>

            <div class="modal-header" style="background-color:#d9534f">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title" style="color:white">Eliminar Marca</h4> 
            </div>
            <?php else: ?>
                <div class="modal-header" style="background-color:#5bc0de">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title" style="color:white">Reanudar Marca</h4> 
            </div>        
            <?php endif; ?>
            
            
            <div class="modal-body">
                <?php if($mar->condicion == 1): ?>
                <p>Esta seguro que desea Eliminar esta Marca? </p>
                <?php else: ?>
                <p>Esta seguro que desea Reanudar esta Marca ? </p>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    </div>
    <?php echo e(Form::Close()); ?>

</div>