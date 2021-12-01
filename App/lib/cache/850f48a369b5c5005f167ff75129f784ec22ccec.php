;
<?php $__env->startSection("cuerpo"); ?>
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
    <div class="form-group">
        <p> ID Tarea: <input type="text" name="id_task" class="form-control" value="<?php echo e($id); ?>" placeholder="Campo cargado por el sistema"  readonly/> </p>
    </div>

    <div class="form-group">
        <p> Persona de contacto: <?php echo $e_persona; ?> <input type="text" name="persona" class="form-control" value="<?php echo e($persona); ?>" placeholder="Nombre del contratante" /> </p>
    </div>

    <div class="form-group">
        <p> Teléfono/s contacto: <?php echo $e_telefono; ?> <input type="text" name="telefono" class="form-control" value="<?php echo e($telefono); ?>" placeholder="Telefono del contratante"/> </p>
    </div>

    <div class="form-group">
        <p> Descripción: <?php echo $e_desc; ?> <input type="text" name="descripcion" class="form-control" value="<?php echo e($desc); ?>" placeholder="Descripcion de la tarea"/> </p>
    </div>

    <div class="form-group">
        <p> Correo electrónico: <?php echo $e_correo; ?> <input type="text" name="correo" class="form-control" value="<?php echo e($correo); ?>" placeholder="Correo del contratante"/> </p>
    </div>

    <div class="form-group">
        <p> Direccion: <?php echo $e_direccion; ?> <input type="text" name="direccion" class="form-control" value="<?php echo e($direccion); ?>" placeholder="Direccion de la tarea a realizar"/>  </p>
    </div>

    <div class="form-group">
        <p> Poblacion: <?php echo $e_poblacion; ?> <input type="text" name="poblacion" class="form-control" value="<?php echo e($poblacion); ?>" placeholder="Poblacion de la tarea a realizar"/> </p>
    </div>

    <div class="form-group">
        <p> Codigo Postal: <?php echo $e_cp; ?> <input type="text" name="cp" class="form-control" value="<?php echo e($cp); ?>" placeholder="Codigo Postal de la tarea a realizar"/> </p>
    </div>

    <div class="form-group">
        <p>
            Provincia:
            <select name="provincia">
                <!-- <option value="value1">Value 1</option> -->
            </select>
        </p>
    </div>

    <div class="form-group">
        <p>
            Estado: <br>
            <label><INPUT TYPE="radio" NAME="estado" VALUE="P" checked>Pendiente</label>
            <label><INPUT TYPE="radio" NAME="estado" VALUE="R">Realizada</label>
            <label><INPUT TYPE="radio" NAME="estado" VALUE="C">Cancelada</label>
        </p>
    </div>

    <div class="form-group">
        <p> Fecha de creacion de la tarea: <?php echo $e_fcreacion; ?> <input type="text" name="fcreacion" class="form-control" value="<?php echo e($fcreacion); ?>" placeholder="Fecha obtenida del sistema" readonly />  </p>
    </div>

    <div class="form-group">
        <p> Operario encargado: <?php echo $e_operario; ?> <input type="text" name="operario" class="form-control" value="<?php echo e($operario); ?>" placeholder="Operario encargado de la tarea"/> </p>
    </div>

    <div class="form-group">
        <p> Fecha de realización: <?php echo $e_frealizacion; ?> <input type="text" name="fechaR" value="<?php echo e($frealizacion); ?>" class="form-control datepicker" placeholder="Fecha de realizacion de la tarea"/> </p>
    </div>

    <div class="form-group">
        <p> Anotaciones anteriores: <?php echo $e_aa; ?> <input type="text" name="aa" class="form-control" value="<?php echo e($aa); ?>" placeholder="Anotacion anterior a la realizacion de la tarea"/> </p>
    </div>

    <div class="form-group">
        <p> Anotaciones posteriores: <?php echo $e_ap; ?> <input type="text" name="ap" class="form-control" value="<?php echo e($ap); ?>" placeholder="Anotacion anterior a la realizacion de la tarea"/> </p>
    </div>

    <div class="text-right">
        <input type="submit" class="btn btn-success" value="Guardar">
    </div>

</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programas\DB\htdocs\PHP\NoSeCaenSL\App\views/task/add_upd_error.blade.php ENDPATH**/ ?>