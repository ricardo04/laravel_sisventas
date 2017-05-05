<div class="modal fade modal-slide-in-right" role="dialog" tabindex="-1" id="modal-agregarproveedor">
    <?php echo Form::open(array('url'=>'compra/proveedor','method'=>'POST','autocomplete'=>'off')); ?> 
    <?php echo e(Form::token()); ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#3c8dbc">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title" style="color:white">Agregar Proveedor</h4>
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
                                <label  for="ruc">RUC</label>
                                <input type="text" name="ruc" class="ruc form-control" value="<?php echo e(old('ruc')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="nombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="<?php echo e(old('nombre')); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="telefono">Telefono</label>
                                <input type="text" name="telefono" class="form-control telefono" value="<?php echo e(old('telefono')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="direccion">Direccion</label>
                                <input type="text" name="direccion" class="form-control" value="<?php echo e(old('direccion')); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="correo">Correo</label>
                                <input type="email" name="correo" class="form-control" value="<?php echo e(old('correo')); ?>">
                            </div>
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
<?php echo Form::close(); ?>

</div>
