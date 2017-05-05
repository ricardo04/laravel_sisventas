<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Gestionar Permisos
                </div>
                <div class="panel-body">
                	<div class="row">
                		<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-3 ">
                			<select class = "selectpicker" name ="idcargo" data-style = "btn-warning">
                				<?php $__currentLoopData = $cargos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cargo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                					<option value="<?php echo e($cargo->idcargo); ?>"><?php echo e($cargo->nombre); ?></option>
                				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                			</select>
                		</div>
                	</div>
                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive" style="margin-top:30px">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                             	<th>Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Opciones</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>         
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>