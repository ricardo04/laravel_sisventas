<div class="modal fade modal-slide-in-right" role="dialog" tabindex="-1" id="modal-delete-<?php echo e($user->id); ?>">
    <?php echo e(Form::Open(array('action'=>array('UsuarioController@destroy',$user->id),'method'=>'delete'))); ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <?php if($user->condicion == 1): ?>

            <div class="modal-header" style="background-color:#d9534f">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title" style="color:white">Eliminar Usuario</h4> 
            </div>
            <?php else: ?>
                <div class="modal-header" style="background-color:#5bc0de">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title" style="color:white">Reanudar Usuario</h4> 
            </div>        
            <?php endif; ?>
            
            
            <div class="modal-body">
                <?php if($user->condicion == 1): ?>
                <p>Esta seguro que desea Eliminar ha este Usuario ? </p>
                <?php else: ?>
                <p>Esta seguro que desea Reanudar ha este Usuario? </p>
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