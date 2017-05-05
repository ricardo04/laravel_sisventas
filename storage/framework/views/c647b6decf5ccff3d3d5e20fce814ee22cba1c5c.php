 
<?php $__env->startSection('content'); ?>

<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nuevo Producto
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
                    <?php endif; ?> <?php echo Form::open(array('url'=>'almacen/producto','method'=>'POST','autocomplete'=>'off','files'=> true,'onkeypress'=>'return event.keyCode != 13')); ?> <?php echo e(Form::token()); ?>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label  for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" value="<?php echo e(old('nombre')); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label for="descripcion">Descripcion</label>
                                    <input type="text" name="descripcion" class="form-control" value="<?php echo e(old('descripcion')); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="idcategoria">Categoria</label>
                                <select name="idcategoria" class="form-control selectpicker" data-style="btn-success">
                                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($categoria->idcategoria); ?>"> <?php echo e($categoria->nombre); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label>Marca</label>
                                <select name="idmarca" class="form-control selectpicker" data-style="btn-warning">
                                    <?php $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($marca->idmarca); ?>"> <?php echo e($marca->nombre); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-line">
                                    <label for="codigobarra">Codigo Barra</label>
                                    <input type="text" name="codigobarra" class="form-control" value="<?php echo e(old('codigobarra')); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <label class="form-group" for="imagen">Imagen</label>
                                    <input name="imagen" type="file" class="filestyle" data-buttonName="btn-primary">   
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <a href="<?php echo e(url('almacen/producto')); ?>" class="btn btn-danger" type="reset">Cancelar</a>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.selectpicker').selectpicker();
        $(".numeric").numeric();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>