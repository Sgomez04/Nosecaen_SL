
<?php $__env->startSection('cuerpo'); ?>
    <h1 class="page-header">
        <?php if($id != null): ?>
            Modificacion del Empleado <?php echo e($id); ?>

        <?php else: ?>
            Nuevo Registro
        <?php endif; ?>
    </h1>

    <ol class="breadcrumb">
        <li><a href="listU">Usuarios</a></li>
        <li class="active">
            <?php if($id != null): ?>
                Empleado <?php echo e($id); ?>

            <?php else: ?>
                Nuevo Registro
            <?php endif; ?>
    </ol>

    <form id="frm-users" action="addU?id=<?php echo e($id); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <p> ID Empleado: <input type="text" name="id_employer" class="form-control" value="<?php echo e($id); ?>"
                        placeholder="Campo cargado por el sistema" readonly /> </p>
            </div>

            <div class="form-group">
                <label class="control-label" for="user">Usuario del Empeado: <?php echo ErrorShow('user', $error); ?></label>
                <input type="text" name="user" class="form-control" value="<?php echo e($user); ?>"
                    placeholder="Nombre de usuario del empleado" />

            </div>

            <div class="form-group">
                <label class="control-label" for="password"> Contraseña del empleado: <?php echo ErrorShow('password', $error); ?></label>
                <input type="text" name="password" class="form-control" value="<?php echo e($password); ?>"
                    placeholder="Contraseña del empleado" />
            </div>

            <div class="form-group">
                <label class="control-label" for="name"> Nombre del empleado: <?php echo ErrorShow('name', $error); ?></label>
                <input type="text" name="name" class="form-control" value="<?php echo e($name); ?>"
                    placeholder="Nombre del empleado" />

            </div>

            <div class="form-group">
                <label class="control-label" for="type"> Rol del empleado: </label>
                <br>
                <label><INPUT TYPE="radio" NAME="estado" VALUE="Admin" checked> Admin</label>
                <label><INPUT TYPE="radio" NAME="estado" VALUE="Operario"> Operario</label>
                </p>
            </div>

            <div class="text-right">
                <input type="submit" class="btn btn-success" value="Guardar">
            </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programas\DB\htdocs\PHP\NoSeCaenSL\App\views/user/add_updU.blade.php ENDPATH**/ ?>