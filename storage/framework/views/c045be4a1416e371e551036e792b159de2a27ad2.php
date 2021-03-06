 
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado de Marcas
                </div>
                <div class="panel-body">

                    <!--Buttons import to excel and new category -->
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" style="margin-bottom:20px">
                            <a href="<?php echo e(url('exportmarcas')); ?>" class="btn bg-green waves-effect btn-xs"><i class="material-icons" aria-hidden="true">print</i> Exportar</a>
                        </div>
                        <div class="col-lg-2 col-lg-offset-8 col-md-2 col-md-offset-6 col-sm-2 col-sm-offset-6 col-xs-12" style="margin-bottom:20px">
                            <a href="marca/create">
                                <button class="btn bg-purple waves-effect btn-xs" style="margin-bottom:20px">
                                    <i class="material-icons" aria-hidden="true">add</i> Nueva Marca
                                </button>
                            </a>
                        </div>
                    </div>

                    <!--Table where show elements -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                                <table id="tablemarca" class="table table-striped table-bordered table-condensed table-hover">
                                    <thead>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Opciones</th>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $marca; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($mar->idmarca); ?></td>
                                            <td><?php echo e($mar->nombre); ?></td>
                                            <td><?php echo e($mar->descripcion); ?></td>
                                            <td>
                                                <a href="<?php echo e(URL::action('MarcaController@edit',$mar->idmarca)); ?>">
                                                    <button class="btn btn-warning btn-xs"><i class="material-icons" aria-hidden="true">edit</i></button>
                                                </a>
                                                
                                                <?php if($mar->condicion): ?>
                                                <a data-target="#modal-delete-<?php echo e($mar->idmarca); ?>" data-toggle="modal">
                                                    <button class="btn btn-info btn-xs"><i class="material-icons" aria-hidden="true">delete</i></button> <p style="visibility:hidden;margin:-10px">habilitados</p>
                                                </a>
                                                <?php else: ?>
                                                <a data-target="#modal-delete-<?php echo e($mar->idmarca); ?>" data-toggle="modal">
                                                    <button class="btn btn-danger btn-xs"><i class="material-icons" aria-hidden="true">restore</i></button> <p style="visibility:hidden;margin:-10px">desabilitado</p>
                                                </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php echo $__env->make('almacen.marca.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('almacen.marca.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>