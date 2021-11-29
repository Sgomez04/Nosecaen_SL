<h1 class="page-header">
    <?php echo ValorPost("id_task") != null ? 'Modificacion de la Tarea '.ValorPost("id_task")  : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=task">Tareas</a></li>
    <li class="active"><?php ValorPost("id_task") != null ? 'Tarea '.ValorPost("id_task") : 'Nueva Tarea'; ?></li>
</ol>

<form id="frm-tarea" action="?c=task&a=Guardar&id=<?php ValorPost("id_task")?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <p> ID Tarea:  <input type="text" name="id_task" class="form-control" value="<?=ValorPost("id_task");?>" placeholder="Campo cargado por el sistema"  readonly/> 
        <input type="hidden" name="id" class="form-control" value="<?=ValorPost("id_task");?>"/>
</p>
    </div>

    <div class="form-group">
        <p> Persona de contacto: <?= $error->ErrorFormateado("persona");?> <input type="text" name="persona" class="form-control" value="<?=ValorPost("persona");?>" placeholder="Nombre del contratante" /> </p>
    </div>

    <div class="form-group">
        <p> Teléfono/s contacto: <?= $error->ErrorFormateado("telefono");?> <input type="text" name="telefono" class="form-control" value="<?=ValorPost("telefono");?>" placeholder="Telefono del contratante"/> </p>
    </div>

    <div class="form-group">
        <p> Descripción: <?= $error->ErrorFormateado("descripcion");?> <input type="text" name="descripcion" class="form-control" value="<?=ValorPost("descripcion");?>" placeholder="Descripcion de la tarea"/> </p>
    </div>

    <div class="form-group">
        <p> Correo electrónico: <?= $error->ErrorFormateado("correo");?> <input type="text" name="correo" class="form-control" value="<?=ValorPost("correo");?>" placeholder="Correo del contratante"/> </p>
    </div>

    <div class="form-group">
        <p> Direccion: <?= $error->ErrorFormateado("direccion");?> <input type="text" name="direccion" class="form-control" value="<?=ValorPost("direccion");?>" placeholder="Direccion de la tarea a realizar"/>  </p>
    </div>

    <div class="form-group">
        <p> Poblacion: <?= $error->ErrorFormateado("poblacion");?> <input type="text" name="poblacion" class="form-control" value="<?=ValorPost("poblacion");?>" placeholder="Poblacion de la tarea a realizar"/> </p>
    </div>

    <div class="form-group">
        <p> Codigo Postal: <?= $error->ErrorFormateado("cp");?> <input type="text" name="cp" class="form-control" value="<?=ValorPost("cp");?>" placeholder="Codigo Postal de la tarea a realizar"/> </p>
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
        <p> Fecha de creacion de la tarea: <?= $error->ErrorFormateado("fcreacion");?> <input type="text" name="fcreacion" class="form-control" value="<?=ValorPost("fcreacion");?>" placeholder="Fecha obtenida del sistema" readonly />  </p>
    </div>

    <div class="form-group">
        <p> Operario encargado: <?= $error->ErrorFormateado("operario");?> <input type="text" name="operario" class="form-control" value="<?=ValorPost("operario");?>" placeholder="Operario encargado de la tarea"/> </p>
    </div>

    <div class="form-group">
        <p> Fecha de realización: <?= $error->ErrorFormateado("fechaR");?> <input type="text" name="fechaR" value="<?=ValorPost("fechaR");?>" class="form-control datepicker" placeholder="Fecha de realizacion de la tarea"/> </p>
    </div>

    <div class="form-group">
        <p> Anotaciones anteriores: <?= $error->ErrorFormateado("aa");?> <input type="text" name="aa" class="form-control" value="<?=ValorPost("aa");?>" placeholder="Anotacion anterior a la realizacion de la tarea"/> </p>
    </div>

    <div class="form-group">
        <p> Anotaciones posteriores: <?= $error->ErrorFormateado("ap");?> <input type="text" name="ap" class="form-control" value="<?=ValorPost("ap");?>" placeholder="Anotacion anterior a la realizacion de la tarea"/> </p>
    </div>

    <div class="text-right">
        <input type="submit" class="btn btn-success" value="Guardar"></input>
    </div>

</form>