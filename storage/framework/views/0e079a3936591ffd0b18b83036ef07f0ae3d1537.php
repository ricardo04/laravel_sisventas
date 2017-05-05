<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cargos del Sistema
                </div>
                <div class="panel-body">
                    <div class="row">
                         <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" style="margin-bottom:20px">
                            <a href="<?php echo e(url('exportcargo')); ?>" class="btn bg-green waves-effect btn-xs"><i class="material-icons" aria-hidden="true">print</i> Exportar</a>
                        </div>
                        <div class="col-lg-2 col-lg-offset-8 col-md-2 col-md-offset-6 col-sm-2 col-sm-offset-6 col-xs-12" style="margin-bottom:20px">
                            <a data-target="#modal-agregarcargo" data-toggle="modal">
                                <button class="btn bg-purple waves-effect btn-xs">
                                   <i class="material-icons" aria-hidden="true">add</i> Nuevo Cargo
                                </button>
                            </a>
                            <?php echo $__env->make('seguridad.cargo.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                        <table id="tablecargo" class="table table-striped table-bordered table-condensed table-hover nowrap" cellspacing="0">
                            <thead>
                                <th>Cargo</th>
                                <th>Descripcion</th>
                                <th>opcion</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $cargos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cargo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($cargo->nombre); ?></td>
                                    <td><?php echo e($cargo->descripcion); ?></td>
                                    <td>
                                       <a data-target="#modal-editcargo-<?php echo e($cargo->idcargo); ?>" data-toggle="modal">
                                            <button class="btn btn-warning btn-xs"><i class="material-icons">edit</i></button>
                                        </a>
                                        <?php if($cargo->condicion == 1): ?>
                                        <a data-target="#modal-delete-<?php echo e($cargo->idcargo); ?>" data-toggle="modal">
                                            <button class="btn btn-info btn-xs"><i class="material-icons">delete</i></button>
                                            <p style="visibility:hidden;margin:-10px">habilitado</p>
                                        </a>
                                        <?php else: ?>
                                        <a data-target="#modal-delete-<?php echo e($cargo->idcargo); ?>" data-toggle="modal">
                                            <button class="btn btn-danger btn-xs"><i class="material-icons">restore</i></button>
                                            <p style="visibility:hidden;margin:-10px">desabilitado</p>
                                        </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php echo $__env->make('seguridad.cargo.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php echo $__env->make('seguridad.cargo.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                       <?php echo $__env->make('seguridad.cargo.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>