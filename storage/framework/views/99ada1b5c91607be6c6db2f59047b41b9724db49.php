<?php $__env->startSection('content'); ?>

<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
				<div class="panel panel-default">
					<div class="panel-heading"> 
						Editar Categoria: <strong style="color:green">"<?php echo e($categoria->nombre); ?>"</strong>
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
					
					<?php echo Form::model($categoria,['method'=>'PATCH','route'=>['categoria.update',$categoria->idcategoria],'autocomplete'=>'off']); ?>

					<?php echo e(Form::token()); ?>

					    <div class="form-group form-float col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label class="form-label" for="nombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="<?php echo e($categoria->nombre); ?>">
                            </div>
                        </div>
					    <div class="form-group form-float col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label class="form-label" for="descripcion">Descripcion</label>
                                <input type="text" name="descripcion" class="form-control" value="<?php echo e($categoria->descripcion); ?>">
                            </div>
                        </div>
					    <div class="form-group form-float col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-line">
                                <label class="form-label" for="utilidad">Utilidad (%)</label>
                                <input type="text" name="utilidad" class="form-control number" value="<?php echo e($categoria->utilidad); ?>">
                            </div>
                        </div>
					    <div class="form-group">
					        <button class="btn btn-primary" type="submit">Guardar</button>
					        <a class="btn btn-danger" href="<?php echo e(url('almacen/categoria')); ?>">Cancelar</a>
					    </div>
					<?php echo Form::close(); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
<?php echo $__env->make('almacen.categoria.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>