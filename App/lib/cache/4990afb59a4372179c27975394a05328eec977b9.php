

<?php $__env->startSection('link'); ?>
    <!-- Modal library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo e(ASSETS_URL); ?>css/<?php echo e($_SESSION['theme']); ?>/list.css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav'); ?>
    <a href="<?php echo e(BASE_URL); ?>list?pag=1" class="nav-item nav-link active"><i
            class="fa fa-gears"></i><span>Tareas</span></a>
    <?php if($type == 'admin'): ?>
        <a href="<?php echo e(BASE_URL); ?>listU?pag=1" class="nav-item nav-link"><i
                class="fa fa-users"></i><span>Empleados</span></a>
    <?php else: ?>
        <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#notEmployers"><i
                class="fa fa-users"></i><span>Empleados</span></a>
    <?php endif; ?>
    <a href="<?php echo e(BASE_URL); ?>profile?idU=<?php echo e($_SESSION['id']); ?>" class="nav-item nav-link"><i
            class="fa fa-user"></i><span> Perfil</span></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('cuerpo'); ?>
    <div class="container-xl">
        <div class="row table-title">
            <div class="col-sm-6">
                <h2>Gestion <b>Tareas</b></h2>
            </div>
            <div class="col-sm-6">
                <?php if($type == 'admin'): ?>
                    <a href="<?php echo e(BASE_URL); ?>form" class="btn btn-success"><i class="material-icons">&#xE147;</i>
                        <span>Añadir nueva Tarea</span></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td scope="col"><b> # </b></td>
                        <th scope="col">Tarea</th>
                        <th scope="col">Persona</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Poblacion</th>
                        <th scope="col">C.Postal</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Estado</th>
                        <th scope="col">F.Creacion</th>
                        <th scope="col">Operario</th>
                        <th scope="col">F.Realizacion</th>
                        <th scope="col">A.Anterior</th>
                        <th scope="col">A.Posterior</th>
                        <th scope="col">Fichero</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = TaskController::getInstance()->listar(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="list">
                            <td>
                                <a href="<?php echo e(BASE_URL); ?>form?id=<?php echo e($t['id_task']); ?>" class="edit"><i
                                        class="material-icons" title="Editar Tarea">&#xE254;</i></a>
                                <br>
                                <br>
                                <?php if($type == 'admin'): ?>
                                    <a href="<?php echo e(BASE_URL); ?>cdel?id=<?php echo e($t['id_task']); ?>" class="delete"><i
                                            class="material-icons" title="Eliminar Tarea">&#xE872;</i></a>
                                <?php endif; ?>
                            </td>
                            <td scope="row"><b><?php echo e($t['id_task']); ?></b></th>
                            <td><?php echo e($t['persona']); ?> </td>
                            <td><?php echo e($t['telefono']); ?> </td>
                            <td><textarea cols="20" rows="5" readonly><?php echo e($t['descripcion']); ?> </textarea></td>
                            <td><?php echo e($t['correo']); ?></td>
                            <td><?php echo e($t['direccion']); ?></td>
                            <td><?php echo e($t['poblacion']); ?></td>
                            <td><?php echo e($t['cp']); ?></td>
                            <td><?php echo e($t['provincia']); ?></td>
                            <td><?php echo e($t['estado']); ?></td>
                            <td><?php echo e($t['fecha_creacion']); ?></td>
                            <td><?php echo e($t['operario']); ?></td>
                            <td><?php echo e($t['fecha_realizacion']); ?></td>
                            <td><textarea cols="20" rows="5" readonly><?php echo e($t['anot_anterior']); ?></textarea></td>
                            <td><textarea cols="20" rows="5" readonly><?php echo e($t['anot_posterior']); ?></textarea></td>
                            <?php if($t['fichero'] != ''): ?>
                                <td><a target="_blank" href="<?php echo e(ASSETS_URL); ?>files/<?php echo e($t['fichero']); ?>">Ver
                                        archivo</a></td>
                            <?php else: ?>
                                <td>Sin archivo</td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="clearfix">
            <div class="hint-text">Mostrando <b><?php echo e($_SESSION['listT']); ?></b> de
                <b><?php echo e(TaskController::getInstance()->tResultados()); ?></b> registros
            </div>

            <b class="pagination"> <?php echo e(TaskController::getInstance()->paginacion()); ?></b>
        </div>
    </div>

    
    <div class="modal fade" id="notEmployers" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-confirm">
                <div class="modal-header flex-column">
                    <div class="icon-box">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>
                    <h4 class="modal-title w-100">Acceso Denegado</h4>
                </div>
                <div class="modal-body">
                    <br>
                    <p>No tienes los permisos suficientes para visualizar esta seccion</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="#" class="bton btn-danger" data-dismiss="modal">Cerrar</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(ASSETS_URL); ?>js/orderby.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programas\DB\htdocs\PHP\NoSeCaenSL\App\views/task/list.blade.php ENDPATH**/ ?>