
<?php $__env->startSection('cuerpo'); ?>
    <h1 class="page-header">
        <?php if($id != null): ?>
            Modificacion de la Tarea <?php echo e($id); ?>

        <?php else: ?>
            Nuevo Registro
        <?php endif; ?>
    </h1>

    <ol class="breadcrumb">
        <li><a href="list">Tareas</a></li>
        <li class="active">
            <?php if($id != null): ?>
                Tarea <?php echo e($id); ?>

            <?php else: ?>
                Nuevo Registro
            <?php endif; ?>

    </ol>

    <form id="frm-tarea" action="add?id=<?php echo e($id); ?>" method="post" enctype="multipart/form-data">

        <?php if($type == 'admin'): ?>
            <div class="form-group">
                <p> ID Tarea: <input type="text" name="id_task" class="form-control" value="<?php echo e($id); ?>"
                        placeholder="Campo cargado por el sistema" readonly /> </p>
            </div>

            <div class="form-group">
                <label class="control-label" for="persona">Persona de contacto: <?php echo ErrorShow('persona', $error); ?></label>
                <input type="text" name="persona" class="form-control" value="<?php echo e($persona); ?>"
                    placeholder="Nombre del contratante" />

            </div>

            <div class="form-group">
                <label class="control-label" for="telefono"> Teléfono/s contacto: <?php echo ErrorShow('telefono', $error); ?></label>
                <input type="text" name="telefono" class="form-control" value="<?php echo e($telefono); ?>"
                    placeholder="Telefono del contratante" />
            </div>

            <div class="form-group">
                <label class="control-label" for="descripcion"> Descripción: <?php echo ErrorShow('descripcion', $error); ?></label>
                <input type="text" name="descripcion" class="form-control" value="<?php echo e($desc); ?>"
                    placeholder="Descripcion de la tarea" />

            </div>

            <div class="form-group">
                <label class="control-label" for="correo"> Correo electrónico: <?php echo ErrorShow('correo', $error); ?></label>
                <input type="text" name="correo" class="form-control" value="<?php echo e($correo); ?>"
                    placeholder="Correo del contratante" />

            </div>

            <div class="form-group">
                <label class="control-label" for="direccion"> Direccion: <?php echo ErrorShow('direccion', $error); ?></label>
                <input type="text" name="direccion" class="form-control" value="<?php echo e($direccion); ?>"
                    placeholder="Direccion de la tarea a realizar" />

            </div>

            <div class="form-group">
                <label class="control-label" for="poblacion"> Poblacion: <?php echo ErrorShow('poblacion', $error); ?></label>
                <input type="text" name="poblacion" class="form-control" value="<?php echo e($poblacion); ?>"
                    placeholder="Poblacion de la tarea a realizar" />

            </div>

            <div class="form-group">
                <label class="control-label" for="cp"> Codigo Postal: <?php echo ErrorShow('cp', $error); ?></label>
                <input type="text" name="cp" class="form-control" value="<?php echo e($cp); ?>"
                    placeholder="Codigo Postal de la tarea a realizar" />

            </div>

            <div class="form-group">
                <label class="control-label" for="provincia"> Provincia: <?php echo ErrorShow('provincia', $error); ?></label>
                <br>
                <select name="provincia">
                    <option value="" selected></option>
                    <?php $__currentLoopData = TaskController::getInstance()->listarProv(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($p['nombre'] == " <?php echo e($provincia); ?>"): ?>
                            <option value="<?php echo e($p['nombre']); ?>" selected><?php echo e($p['nombre']); ?></option>
                        <?php else: ?>
                            <option value="<?php echo e($p['nombre']); ?>"><?php echo e($p['nombre']); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label class="control-label" for="persona"> Estado: </label>
                <br>
                <label><INPUT TYPE="radio" NAME="estado" VALUE="P" checked> Pendiente</label>
                <label><INPUT TYPE="radio" NAME="estado" VALUE="R"> Realizada</label>
                <label><INPUT TYPE="radio" NAME="estado" VALUE="C"> Cancelada</label>
                </p>
            </div>

            <div class="form-group">
                <label class="control-label" for="fcreacion"> Fecha de creacion de la tarea:
                    <?php echo ErrorShow('fcreacion', $error); ?></label>
                <input type="text" name="fcreacion" class="form-control" value="<?php echo e($fcreacion); ?>"
                    placeholder="Fecha obtenida del sistema" readonly />
            </div>

            <div class="form-group">
                <label class="control-label" for="operario"> Operario encargado: <?php echo ErrorShow('operario', $error); ?></label>
                <br>
                <select name="operario">
                    <option value="" selected></option>
                    <?php $__currentLoopData = UserController::getInstance()->listarUsuarios(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($u['user'] == $operario): ?>
                            <option value="<?php echo e($u['user']); ?>" selected><?php echo e($u['user']); ?></option>
                        <?php else: ?>
                            <option value="<?php echo e($u['user']); ?>"><?php echo e($u['user']); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label class="control-label" for="fechaR"> Fecha de realización: <?php echo ErrorShow('fechaR', $error); ?></label>
                <input type="text" name="fechaR" value="<?php echo e($frealizacion); ?>" class="form-control datepicker"
                    placeholder="Fecha de realizacion de la tarea" />
            </div>

        <?php elseif($type == "operator"): ?>
            <div class="form-group">
                <label class="control-label" for="aa"> Anotaciones anteriores: <?php echo ErrorShow('aa', $error); ?></label>
                <input type="text" name="aa" class="form-control" value="<?php echo e($aa); ?>"
                    placeholder="Anotacion anterior a la realizacion de la tarea" />
            </div>

            <div class="form-group">
                <label class="control-label" for="ap"> Anotaciones posteriores: <?php echo ErrorShow('ap', $error); ?></label>
                <input type="text" name="ap" class="form-control" value="<?php echo e($ap); ?>"
                    placeholder="Anotacion anterior a la realizacion de la tarea" />
            </div>
        <?php endif; ?>
        <div class="text-right">
            <input type="submit" class="btn btn-success" value="Guardar">
        </div>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programas\DB\htdocs\PHP\NoSeCaenSL\App\views/task/add_upd.blade.php ENDPATH**/ ?>