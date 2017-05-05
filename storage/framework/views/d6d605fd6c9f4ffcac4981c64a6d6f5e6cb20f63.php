<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado de Proveedores
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6" style="margin-bottom: 20px">
                            <a href="<?php echo e(url('exportproveedor')); ?>"class="btn bg-green waves-effect btn-xs"><i class="material-icons" aria-hidden="true">print</i>  Exportar</a>
                        </div>
                        <div class="col-lg-2 col-lg-offset-8 col-md-2 col-md-offset-6 col-sm-2 col-sm-offset-6 col-xs-6" style="margin-bottom: 20px">
                            <a data-target="#modal-agregarproveedor" data-toggle="modal">
                               <button class="btn bg-purple waves-effect btn-xs">
                                   <i class="material-icons" aria-hidden="true">add</i> Nuevo Proveedor
                                </button>
                            </a>
                            <?php echo $__env->make('compra.proveedor.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                        <table id="tableproveedor" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <th>RUC</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>telefono</th>
                                <th>correo</th>
                                <th>Opcion</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($pro->ruc); ?></td>
                                    <td><?php echo e($pro->nombre); ?></td>
                                    <td><?php echo e($pro->direccion); ?></td>
                                    <td><?php echo e($pro->telefono); ?></td>
                                    <td><?php echo e($pro->correo); ?></td>
                                    <td>
                                       <a href="<?php echo e(url('compra/contacto/' . $pro->idproveedor)); ?>">
                                            <button class="btn btn-success btn-xs" data-toggle="tooltip" title="Contactos"><i class="material-icons">remove_red_eye</i></button>
                                        </a>
                                       <a data-target="#modal-editproveedor-<?php echo e($pro->idproveedor); ?>" data-toggle="modal">
                                            <button class="btn btn-warning btn-xs"><i class="material-icons" aria-hidden="true">edit</i></button>
                                        </a>
                                        <?php if($pro->condicion): ?>
                                        <a data-target="#modal-delete-<?php echo e($pro->idproveedor); ?>" data-toggle="modal">
                                            <button class="btn btn-info btn-xs"><i class="material-icons" aria-hidden="true">delete</i></button>
                                            <p style="visibility:hidden;margin:-10px">habilitado</p>
                                        </a>
                                        <?php else: ?>
                                        <a data-target="#modal-delete-<?php echo e($pro->idproveedor); ?>" data-toggle="modal">
                                            <button class="btn btn-danger btn-xs"><i class="material-icons" aria-hidden="true">restore</i></button>
                                            <p style="visibility:hidden;margin:-10px">desabilitado</p>
                                        </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php echo $__env->make('compra.proveedor.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php echo $__env->make('compra.proveedor.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php echo $__env->make('compra.proveedor.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>