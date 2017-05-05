<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Contactos
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <a href="<?php echo e(url('compra/proveedor')); ?>" style="margin-bottom:20px" class="btn bg-red waves-effect btn-xs"><i class="material-icons">keyboard_arrow_left</i> Salir</a>
                        </div>
                        <div class="col-lg-2 col-lg-offset-8 col-md-2 col-md-offset-6 col-sm-2 col-sm-offset-6 col-xs-6">
                            <a data-target="#modal-agregarcontacto" data-toggle="modal">
                                <button class="btn bg-purple waves-effect btn-xs" style="margin-bottom:10px">
                                    <i class="material-icons" aria-hidden="true">add</i> Contacto
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                        <table id="tablecontacto" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Opciones</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $contactos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($contact->cedula); ?></td>
                                    <td><?php echo e($contact->nombre1 . ' ' . $contact->nombre2 . ' '. $contact->apellido1. ' '. $contact->apellido2); ?></td>
                                    <td><?php echo e($contact->telefono); ?></td>
                                    <td>
                                        <a data-target="#modal-editcontacto-<?php echo e($contact->idcontacto); ?>" data-toggle="modal">
                                           <button class="btn btn-warning btn-xs"><i class="material-icons" aria-hidden="true">edit</i></button
                                        </a>
                                        <?php if($contact->condicion): ?>
                                        <a data-target="#modal-delete-<?php echo e($contact->idcontacto); ?>" data-toggle="modal">
                                            <button class="btn btn-info btn-xs"><i class="material-icons" aria-hidden="true">delete</i></button>
                                            <p style="visibility:hidden;margin:-10px">habilitado</p>
                                        </a>
                                        <?php else: ?>
                                        <a data-target="#modal-delete-<?php echo e($contact->idcontacto); ?>" data-toggle="modal">
                                            <button class="btn btn-danger btn-xs"><i class="material-icons" aria-hidden="true">restore</i></button>
                                            <p style="visibility:hidden;margin:-10px">desabilitado</p>
                                        </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php echo $__env->make('compra.contacto.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
                                <?php echo $__env->make('compra.contacto.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('compra.contacto.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('compra.contacto.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>