<div class="modal fade modal-slide-in-right" role="dialog" tabindex="-1" id="modal-editcargo-<?php echo e($cargo->idcargo); ?>">
    {<?php echo Form::model($cargo,['method'=>'PATCH','route'=>['cargo.update',$cargo->idcargo],'autocomplete'=>'off']); ?>}
    <?php echo e(Form::token()); ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#3c8dbc">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title" style="color:white">Create Role</h4>
            </div>
            <div class="modal-body">
                <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-line">
                            <label  for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo e($cargo->nombre); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-line">
                            <label  for="descripcion">Descripcion</label>
                            <input type="text" name="descripcion" class="form-control" value="<?php echo e($cargo->descripcion); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top:25px">
                            <button class="btn" style="background-color:#398439;color:white" type="submit">Guardar</button>
                            <a data-dismiss="modal" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>

