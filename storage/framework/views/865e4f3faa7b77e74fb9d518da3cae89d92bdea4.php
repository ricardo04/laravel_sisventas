<div class="modal fade modal-slide-in-right" role="dialog" tabindex="-1" id="modal-editcontacto-<?php echo e($contact->idcontacto); ?>">
    <?php echo Form::model($contact,['method'=>'PATCH','route'=>['contacto.update',$contact->idcontacto],'autocomplete'=>'off']); ?>

    <?php echo e(Form::token()); ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#d58512">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title" style="color:white">Editar Contacto</h4>
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
                                <input type="text" name="cedula" class="cedula form-control" value="<?php echo e($contact->cedula); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="nombre1">Primer Nombre</label>
                                <input type="text" name="nombre1" class="form-control" value="<?php echo e($contact->nombre1); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="nombre2">Segundo Nombre</label>
                                <input type="text" name="nombre2" class="form-control" value="<?php echo e($contact->nombre2); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="apellido1">Primer Apellido</label>
                                <input type="text" name="apellido1" class="form-control" value="<?php echo e($contact->apellido1); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="apellido2">Segundo Apellido</label>
                                <input type="text" name="apellido2" class="form-control" value="<?php echo e($contact->apellido2); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label  for="telefono">Telefono</label>
                                <input type="text" name="telefono" class="telefono form-control" value="<?php echo e($contact->telefono); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label>Proveedor</label>
                            <select name="idproveedor" class="selectpicker" data-style="btn-success">
                                <?php $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prove): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($prove->idproveedor == $contact->idproveedor): ?>
                                        <option value="<?php echo e($prove->idproveedor); ?>" selected> <?php echo e($prove->nombre); ?> </option>
                                    <?php else: ?>
                                        <option value="<?php echo e($prove->idproveedor); ?>"> <?php echo e($prove->nombre); ?> </option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top:25px">
                            <button class="btn bg-blue" type="submit">Guardar</button>
                            <a data-dismiss="modal" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo Form::close(); ?>

</div>
