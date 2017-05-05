<div class="modal fade modal-slide-in-right" role="dialog" tabindex="-1" id="modal-agregarcontacto">
    <?php echo Form::open(array('url'=>'compra/contacto','method'=>'POST','autocomplete'=>'off')); ?> 
  
    <?php echo e(Form::token()); ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#3c8dbc">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title" style="color:white">Agregar Contacto</h4>
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
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="cedula">Cedula</label>
                                <input type="text" name="cedula" class="cedula form-control" value="<?php echo e(old('cedula')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="nombre1">Primer Nombre</label>
                                <input type="text" name="nombre1" class="form-control" value="<?php echo e(old('nombre1')); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="nombre2">Segundo Nombre</label>
                                <input type="text" name="nombre2" class="form-control" value="<?php echo e(old('nombre2')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="apellido1">Primer Apellido</label>
                                <input type="text" name="apellido1" class="form-control" value="<?php echo e(old('apellido1')); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="apellido2">Segundo Apellido</label>
                                <input type="text" name="apellido2" class="form-control" value="<?php echo e(old('apellido2')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="telefono">Telefono</label>
                                <input type="text" name="telefono" class="telefono form-control" value="<?php echo e(old('telefono')); ?>">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="idproveedor" value="<?php echo e($idproveedor); ?>">
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top:25px">
                        <button class="btn" style="background-color:#398439;color:white" type="submit">Guardar</button>
                        <a data-dismiss="modal" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo Form::close(); ?>

</div>
