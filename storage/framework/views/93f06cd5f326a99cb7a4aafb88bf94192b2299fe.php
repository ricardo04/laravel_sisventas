<?php $__env->startSection('content'); ?>
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-1 col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Usuario: 
                    <strong style="color:green">"<?php echo e($usuario->name); ?>"</strong>
                </div>
                <div class="panel-body">
                    <?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php echo Form::model($usuario,['method'=>'PATCH','route'=>['usuario.update',$usuario->id],'autocomplete'=>'off','files'=> true]); ?>

                    <?php echo e(Form::token()); ?>


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label  for="cedula">Cedula</label>
                                    <input type="text" name="cedula" class="form-control cedula" value="<?php echo e($usuario->cedula); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label  for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" value="<?php echo e($usuario->name); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label  for="telefono">Telefono</label>
                                    <input type="text" name="telefono" class="form-control telefono" value="<?php echo e($usuario->telefono); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label  for="correo">Correo</label>
                                    <input type="text" name="correo" class="form-control" value="<?php echo e($usuario->email); ?>" placeholder="user@example.com">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label  for="password">Password</label>
                                    <input id="password" type="password" name="password" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label  for="confirmpassword">Confirm Password</label>
                                    <input id="confirmpassword" type="password" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label  for="direccion">Direccion</label>
                                    <input type="text" name="direccion" class="form-control" value="<?php echo e($usuario->direccion); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label>Cargo</label>
                                <select name="idcargo" class="form-control selectpicker" data-style="btn-warning">
                                <?php $__currentLoopData = $cargos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cargo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cargo->idcargo == $usuario->idcargo): ?>
                                        <option value="<?php echo e($cargo->idcargo); ?>" selected><?php echo e($cargo->nombre); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($cargo->idcargo); ?>"><?php echo e($cargo->nombre); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="imagen">Imagen</label>
                                <input name="imagen" type="file" class="filestyle form-control" data-buttonName="btn-primary">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <?php if($usuario->imagen != ""): ?>
                                <img src="<?php echo e(asset('pictures/usuarios/'. $usuario->imagen)); ?>" height="100px" width="100px" alt="<?php echo e($usuario->nombre); ?>" class="img-thumbnail"> 
                            <?php endif; ?>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top:25px">
                                <button class="btn" style="background-color:#398439;color:white" type="submit">Guardar</button>
                                <a href="<?php echo e(url('seguridad/usuario')); ?>" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('seguridad.usuario.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>