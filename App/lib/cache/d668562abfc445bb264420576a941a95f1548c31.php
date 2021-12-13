

<?php $__env->startSection('link'); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo e(ASSETS_URL); ?>css/<?php echo e($_SESSION['theme']); ?>/form.css" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav'); ?>
<a href="<?php echo e(BASE_URL); ?>list?pag=1" class="nav-item nav-link"><i
        class="fa fa-gears"></i><span>Tareas</span></a>
<?php if($type =='admin'): ?>
        <a href="<?php echo e(BASE_URL); ?>listU?pag=1" class="nav-item nav-link active"><i
        class="fa fa-users"></i><span>Empleados</span></a>
<?php else: ?>
        <a href="#" class="nav-item nav-link active"><i
        class="fa fa-users"></i><span>Empleados</span></a>
<?php endif; ?>
<a href="<?php echo e(BASE_URL); ?>profile?idU=<?php echo e($_SESSION['id']); ?>" class="nav-item nav-link"><i class="fa fa-user"></i><span> Perfil</span></a>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('cuerpo'); ?>
    <center><b>
            <h1 class="page-header">
                <?php if($id != null): ?>
                    Modificacion del Empleado "<?php echo e($user); ?>"
                <?php else: ?>
                    Nuevo Registro
                <?php endif; ?>
        </b></h1>
    </center>
    <?php if($eprofile == ''): ?>
        <ol class="breadcrumb">
            <li><a href="listU?pag=1">Usuarios</a></li>
            <li class="active">
                <?php if($id != null): ?>
                    Empleado <?php echo e($user); ?>

                <?php else: ?>
                    Nuevo Registro
                <?php endif; ?>
            </li>
        </ol>
    <?php else: ?>
        <ol class="breadcrumb">
            <li><a href="profile?idU=<?php echo e($id); ?>">Perfil</a></li>
            <li class="active">Empleado <?php echo e($user); ?></li>
        </ol>
    <?php endif; ?>

    <form id="frm-users" action="addU?id=<?php echo e($id); ?>" method="post" enctype="multipart/form-data"
        class="form-horizontal">
        <fieldset>
            <div class="form-group" <?php echo e($eprofile); ?>>
                <label class="col-md-4 control-label" for="user">ID empleado: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                        <?php if(!$_POST): ?>
                            <input type=" text" name="id_employer" class="form-control" value="<?php echo e($id); ?>"
                                placeholder="Campo cargado por el sistema" readonly />
                        <?php else: ?>
                            <input type=" text" name="id_employer" class="form-control is-valid" value="<?php echo e($id); ?>"
                                placeholder="Campo cargado por el sistema" readonly />
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="user">Usuario del empeado:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <?php if(!$_POST): ?>
                            <input type="text" name="user" class="form-control" value="<?php echo e($user); ?>"
                                placeholder="Nombre del contratante" />
                        <?php elseif(ErrorShow('user', $error) == ''): ?>
                            <input type="text" name="user" class="form-control is-valid" value="<?php echo e($user); ?>"
                                placeholder="Nombre de usuario del empleado" />
                        <?php else: ?>
                            <input type="text" name="user" class="form-control is-invalid" value="<?php echo e($user); ?>"
                                placeholder="Nombre de usuario del empleado" />
                        <?php endif; ?>
                    </div>
                    <?php echo ErrorShow('user', $error); ?>

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="password">Contraseña del empleado:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                        <?php if(!$_POST): ?>
                            <input type="text" name="password" class="form-control" value="<?php echo e($password); ?>"
                                placeholder="Nombre del contratante" />
                        <?php elseif(ErrorShow('password', $error) == ''): ?>
                            <input type="text" name="password" class="form-control is-valid" value="<?php echo e($password); ?>"
                                placeholder="Contraseña del empleado" />
                        <?php else: ?>
                            <input type="text" name="password" class="form-control is-invalid" value="<?php echo e($password); ?>"
                                placeholder="Contraseña del empleado" />
                        <?php endif; ?>
                    </div>
                    <?php echo ErrorShow('password', $error); ?>

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Nombre del empleado:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                        <?php if(!$_POST): ?>
                            <input type="text" name="name" class="form-control" value="<?php echo e($name); ?>"
                                placeholder="Nombre del contratante" />
                        <?php elseif(ErrorShow('name', $error) == ''): ?>
                            <input type="text" name="name" class="form-control is-valid" value="<?php echo e($name); ?>"
                                placeholder="Nombre personal del empleado" />
                        <?php else: ?>
                            <input type="text" name="name" class="form-control is-invalid" value="<?php echo e($name); ?>"
                                placeholder="Nombre personal del empleado" />
                        <?php endif; ?>
                    </div>
                    <?php echo ErrorShow('name', $error); ?>

                </div>
            </div>

            <div class="form-group" <?php echo e($eprofile); ?>>
                <label class="col-md-4 control-label" for="type"> Rol del empleado: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                        <?php if($type == 'admin'): ?>
                            <label>&nbsp &nbsp<INPUT TYPE="radio" NAME="type" VALUE="admin" checked> Administrador</label>
                            <label>&nbsp &nbsp<INPUT TYPE="radio" NAME="type" VALUE="operario"> Operario</label>
                        <?php else: ?>
                            <label>&nbsp &nbsp<INPUT TYPE="radio" NAME="type" VALUE="admin"> Administrador</label>
                            <label>&nbsp &nbsp<INPUT TYPE="radio" NAME="type" VALUE="operario" checked> Operario</label>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="text-center bton">
                <input type="submit" class="btn btn-success" value="Guardar">
            </div>
        </fieldset>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programas\DB\htdocs\PHP\NoSeCaenSL\App\views/user/add_updU.blade.php ENDPATH**/ ?>