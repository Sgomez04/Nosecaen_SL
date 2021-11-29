<h1 class="page-header">
    <?php echo $t->id_task != null ? 'Modificacion de la Tarea '.$t->id_task  : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=task">Tareas</a></li>
    <li class="active"><?php echo $t->id_task != null ? 'Tarea '.$t->id_task : 'Nueva Tarea'; ?></li>
</ol>

<form id="frm-tarea" action="?c=task&a=Guardar&id=<?php echo $t->id_task?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <p> ID Tarea:  <input type="text" name="id_task" class="form-control" value="<?php echo $t->id_task;?>" placeholder="Campo cargado por el sistema"  readonly/> </p>
    </div>

    <div class="form-group">
        <p> Persona de contacto: <input type="text" name="persona" class="form-control" value="<?php echo $t->persona;?>" placeholder="Nombre del contratante" /> </p>
    </div>

    <div class="form-group">
        <p> Teléfono/s contacto: <input type="text" name="telefono" class="form-control" value="<?php echo $t->telefono;?>" placeholder="Telefono del contratante"/> </p>
    </div>

    <div class="form-group">
        <p> Descripción: <input type="text" name="descripcion" class="form-control" value="<?php echo $t->descripcion;?>" placeholder="Descripcion de la tarea"/> </p>
    </div>

    <div class="form-group">
        <p> Correo electrónico: <input type="text" name="correo" class="form-control" value="<?php echo $t->correo;?>" placeholder="Correo del contratante"/> </p>
    </div>

    <div class="form-group">
        <p> Direccion: <input type="text" name="direccion" class="form-control" value="<?php echo $t->direccion;?>" placeholder="Direccion de la tarea a realizar"/>  </p>
    </div>

    <div class="form-group">
        <p> Poblacion: <input type="text" name="poblacion" class="form-control" value="<?php echo $t->poblacion;?>" placeholder="Poblacion de la tarea a realizar"/> </p>
    </div>

    <div class="form-group">
        <p> Codigo Postal: <input type="text" name="cp" class="form-control" value="<?php echo $t->cp;?>" placeholder="Codigo Postal de la tarea a realizar"/> </p>
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
        <p> Fecha de creacion de la tarea: <input type="text" name="fcreacion" class="form-control" value="<?php echo $t->fecha_creacion;?>" placeholder="Fecha obtenida del sistema" readonly />  </p>
    </div>

    <div class="form-group">
        <p> Operario encargado: <input type="text" name="operario" class="form-control" value="<?php echo $t->operario;?>" placeholder="Operario encargado de la tarea"/> </p>
    </div>

    <div class="form-group">
        <p> Fecha de realización: <input type="text" name="fechaR" value="<?php echo $t->fecha_realizacion;?>" class="form-control datepicker" placeholder="Fecha de realizacion de la tarea"/> </p>
    </div>

    <div class="form-group">
        <p> Anotaciones anteriores: <input type="text" name="aa" class="form-control" value="<?php echo $t->anot_anterior;?>" placeholder="Anotacion anterior a la realizacion de la tarea"/> </p>
    </div>

    <div class="form-group">
        <p> Anotaciones posteriores: <input type="text" name="ap" class="form-control" value="<?php echo $t->anot_posterior;?>" placeholder="Anotacion anterior a la realizacion de la tarea"/> </p>
    </div>

    <div class="text-right">
        <input type="submit" class="btn btn-success" value="Guardar"></input>
    </div>

</form>