

<?php $__env->startSection('link'); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo e(ASSETS_URL); ?>css/<?php echo e($_SESSION['theme']); ?>/form.css" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav'); ?>
<a href="<?php echo e(BASE_URL); ?>list?pag=1" class="nav-item nav-link active"><i
        class="fa fa-gears"></i><span>Tareas</span></a>
<?php if($type =='admin'): ?>
        <a href="<?php echo e(BASE_URL); ?>listU?pagU=1" class="nav-item nav-link"><i
        class="fa fa-users"></i><span>Empleados</span></a>
<?php else: ?>
        <a href="#" class="nav-item nav-link"><i
        class="fa fa-users"></i><span>Empleados</span></a>
<?php endif; ?>
<a href="#" class="nav-item nav-link"><i class="fa fa-search"></i><span>Busqueda</span></a>
<a href="<?php echo e(BASE_URL); ?>profile?idU=<?php echo e($_SESSION['id']); ?>" class="nav-item nav-link"><i class="fa fa-user"></i><span> Perfil</span></a>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('cuerpo'); ?>
    <center>
        <h1 class="page-header">
            <?php if($id != null): ?>
                Modificacion de la Tarea <?php echo e($id); ?>

            <?php else: ?>
                Nuevo Registro
            <?php endif; ?>
        </h1>
    </center>
    <ol class="breadcrumb">
        <li><a href="list?pag=1">Tareas</a></li>
        <li class="active">
            <?php if($id != null): ?>
                Tarea <?php echo e($id); ?>

            <?php else: ?>
                Nuevo Registro
            <?php endif; ?>
    </ol>

    <form id="frm-tarea" action="add?id=<?php echo e($id); ?>" method="POST" enctype="multipart/form-data"
        class="form-horizontal">
        <fieldset>
            <div class="form-group" <?php echo e($hide1); ?>>
                <label class="col-md-4 control-label" for="persona">ID Tarea:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon "><i class="glyphicon glyphicon-info-sign"></i></span>
                        <?php if(!$_POST): ?>
                            <input type="text" name="id_task" class="form-control" value="<?php echo e($id); ?>"
                                placeholder="Campo cargado por el sistema" readonly /> </p>
                        <?php else: ?>
                            <input type="text" name="id_task" class="form-control is-valid" value="<?php echo e($id); ?>"
                                placeholder="Campo cargado por el sistema" readonly /> </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="form-group" <?php echo e($hide1); ?>>
                <label class="col-md-4 control-label" for="persona">Persona de contacto:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <?php if(!$_POST): ?>
                            <input type="text" name="persona" class="form-control" value="<?php echo e($persona); ?>"
                                placeholder="Nombre del contratante" />
                        <?php elseif(ErrorShow('persona', $error) == ''): ?>
                            <input type="text" name="persona" class="form-control is-valid" value="<?php echo e($persona); ?>"
                                placeholder="Nombre del contratante" />
                        <?php else: ?>
                            <input type="text" name="persona" class="form-control is-invalid" value="<?php echo e($persona); ?>"
                                placeholder="Nombre del contratante" />
                        <?php endif; ?>
                    </div>
                    <?php echo ErrorShow('persona', $error); ?>

                </div>
            </div>

            <div class="form-group" <?php echo e($hide1); ?>>
                <label class="col-md-4 control-label" for="telefono"> Teléfono/s contacto: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <?php if(!$_POST): ?>
                            <input type="text" name="telefono" class="form-control" value="<?php echo e($telefono); ?>"
                                placeholder="Telefono del contratante" />
                        <?php elseif(ErrorShow('telefono', $error) == ''): ?>
                            <input type="text" name="telefono" class="form-control is-valid" value="<?php echo e($telefono); ?>"
                                placeholder="Telefono del contratante" />
                        <?php else: ?>
                            <input type="text" name="telefono" class="form-control is-invalid" value="<?php echo e($telefono); ?>"
                                placeholder="Telefono del contratante" />
                        <?php endif; ?>
                    </div>
                    <?php echo ErrorShow('telefono', $error); ?>

                </div>
            </div>

            <div class="form-group" <?php echo e($hide1); ?>>
                <label class="col-md-4 control-label" for="descripcion"> Descripción: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <?php if(!$_POST): ?>
                            <textarea type="text" cols="20" rows="4" name="descripcion" class="form-control"
                                placeholder="Descripcion de la tarea"><?php echo e($desc); ?></textarea>
                        <?php elseif(ErrorShow('descripcion', $error) == ''): ?>
                            <textarea type="text" cols="20" rows="4" name="descripcion" class="form-control is-valid"
                                placeholder="Descripcion de la tarea"><?php echo e($desc); ?></textarea>
                        <?php else: ?>
                            <textarea type="text" cols="20" rows="4" name="descripcion" class="form-control is-invalid"
                                placeholder="Descripcion de la tarea"><?php echo e($desc); ?></textarea>
                        <?php endif; ?>
                    </div>
                    <?php echo ErrorShow('descripcion', $error); ?>

                </div>
            </div>

            <div class="form-group" <?php echo e($hide1); ?>>
                <label class="col-md-4 control-label" for="correo"> Correo electrónico: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <?php if(!$_POST): ?>
                            <input type="text" name="correo" class="form-control" value="<?php echo e($correo); ?>"
                                placeholder="Correo del contratante" />
                        <?php elseif(ErrorShow('correo', $error) == ''): ?>
                            <input type="text" name="correo" class="form-control is-valid" value="<?php echo e($correo); ?>"
                                placeholder="Correo del contratante" />
                        <?php else: ?>
                            <input type="text" name="correo" class="form-control is-invalid" value="<?php echo e($correo); ?>"
                                placeholder="Correo del contratante" />
                        <?php endif; ?>
                    </div>
                    <?php echo ErrorShow('correo', $error); ?>

                </div>
            </div>

            <div class="form-group" <?php echo e($hide1); ?>>
                <label class="col-md-4 control-label" for="direccion"> Direccion: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <?php if(!$_POST): ?>
                            <input type="text" name="direccion" class="form-control" value="<?php echo e($direccion); ?>"
                                placeholder="Direccion de la tarea a realizar" />
                        <?php elseif(ErrorShow('direccion', $error) == ''): ?>
                            <input type="text" name="direccion" class="form-control is-valid" value="<?php echo e($direccion); ?>"
                                placeholder="Direccion de la tarea a realizar" />
                        <?php else: ?>
                            <input type="text" name="direccion" class="form-control is-invalid" value="<?php echo e($direccion); ?>"
                                placeholder="Direccion de la tarea a realizar" />
                        <?php endif; ?>
                    </div>
                    <?php echo ErrorShow('direccion', $error); ?>

                </div>
            </div>

            <div class="form-group" <?php echo e($hide1); ?>>
                <label class="col-md-4 control-label" for="poblacion"> Poblacion: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <?php if(!$_POST): ?>
                            <input type="text" name="poblacion" class="form-control" value="<?php echo e($poblacion); ?>"
                                placeholder="Poblacion de la tarea a realizar" />
                        <?php elseif(ErrorShow('poblacion', $error) == ''): ?>
                            <input type="text" name="poblacion" class="form-control is-valid" value="<?php echo e($poblacion); ?>"
                                placeholder="Poblacion de la tarea a realizar" />
                        <?php else: ?>
                            <input type="text" name="poblacion" class="form-control is-invalid" value="<?php echo e($poblacion); ?>"
                                placeholder="Poblacion de la tarea a realizar" />
                        <?php endif; ?>
                    </div>
                    <?php echo ErrorShow('poblacion', $error); ?>

                </div>
            </div>

            <div class="form-group" <?php echo e($hide1); ?>>
                <label class="col-md-4 control-label" for="cp"> Codigo Postal: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-inbox"></i></span>
                        <?php if(!$_POST): ?>
                            <input type="text" name="cp" class="form-control" value="<?php echo e($cp); ?>"
                                placeholder="Codigo Postal de la tarea a realizar" />
                        <?php elseif(ErrorShow('cp', $error) == ''): ?>
                            <input type="text" name="cp" class="form-control is-valid" value="<?php echo e($cp); ?>"
                                placeholder="Codigo Postal de la tarea a realizar" />
                        <?php else: ?>
                            <input type="text" name="cp" class="form-control is-invalid" value="<?php echo e($cp); ?>"
                                placeholder="Codigo Postal de la tarea a realizar" />
                        <?php endif; ?>
                    </div>
                    <?php echo ErrorShow('cp', $error); ?>

                </div>
            </div>

            <div class="form-group" <?php echo e($hide1); ?>>
                <label class="col-md-4 control-label" for="provincia"> Provincia: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                        <?php if(!$_POST): ?>
                            <select name="provincia" class="form-control selectpicker">
                            <?php elseif(ErrorShow('provincia', $error) == ''): ?>
                                <select name="provincia" class="form-control selectpicker is-valid">
                                <?php else: ?>
                                    <select name="provincia" class="form-control selectpicker is-invalid">
                        <?php endif; ?>
                        <option value="" selected></option>
                        <?php $__currentLoopData = TaskController::getInstance()->listarProv(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($p['nombre'] == $provincia): ?>
                                <option value="<?php echo e($p['nombre']); ?>" selected><?php echo e($p['nombre']); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($p['nombre']); ?>"><?php echo e($p['nombre']); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                    </div>
                    <?php echo ErrorShow('provincia', $error); ?>

                </div>
            </div>


            <div class="form-group" <?php echo e($hide2); ?>>
                <label class="col-md-4 control-label" for="estado"> Estado: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
                        <?php if($estado == 'P'): ?>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="P" checked> Pendiente</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="R"> Realizada</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="C"> Cancelada</label>
                        <?php elseif($estado == "R"): ?>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="P"> Pendiente</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="R" checked> Realizada</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="C"> Cancelada</label>
                        <?php else: ?>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="P"> Pendiente</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="R"> Realizada</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="C" checked> Cancelada</label>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-group" <?php echo e($hide1); ?>>
                <label class="col-md-4 control-label" for="fcreacion"> Fecha de creacion de la tarea:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <?php if(!$_POST): ?>
                            <input type="text" name="fcreacion" class="form-control" value="<?php echo e($fcreacion); ?>"
                                placeholder="Fecha obtenida del sistema" readonly />
                        <?php elseif(ErrorShow('fcreacion', $error) == ''): ?>
                            <input type="text" name="fcreacion" class="form-control is-valid" value="<?php echo e($fcreacion); ?>"
                                placeholder="Fecha obtenida del sistema" readonly />
                        <?php else: ?>
                            <input type="text" name="fcreacion" class="form-control is-invalid"
                                value="<?php echo e($fcreacion); ?>" placeholder="Fecha obtenida del sistema" readonly />
                        <?php endif; ?>
                    </div>
                    <?php echo ErrorShow('fcreacion', $error); ?>

                </div>
            </div>

            <div class="form-group" <?php echo e($hide1); ?>>
                <label class="col-md-4 control-label" for="operario"> Operario encargado:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <?php if(!$_POST): ?>
                            <select name="operario" class="form-control selectpicker">
                            <?php elseif(ErrorShow('operario', $error) == ''): ?>
                                <select name="operario" class="form-control selectpicker is-valid">
                                <?php else: ?>
                                    <select name="operario" class="form-control selectpicker is-invalid">
                        <?php endif; ?>
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
                    <?php echo ErrorShow('operario', $error); ?>

                </div>
            </div>

            <div class="form-group" <?php echo e($hide1); ?>>
                <label class="col-md-4 control-label" for="fechaR"> Fecha de realización:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <?php if(!$_POST): ?>
                            <input type="date" name="fechaR" value="<?php echo e($frealizacion); ?>" class="form-control datepicker"
                                placeholder="Fecha de realizacion de la tarea" />
                        <?php elseif(ErrorShow('fechaR', $error) == ''): ?>
                            <input type="date" name="fechaR" value="<?php echo e($frealizacion); ?>"
                                class="form-control datepicker is-valid" placeholder="Fecha de realizacion de la tarea" />
                        <?php else: ?>
                            <input type="date" name="fechaR" value="<?php echo e($frealizacion); ?>"
                                class="form-control datepicker is-invalid"
                                placeholder="Fecha de realizacion de la tarea" />
                        <?php endif; ?>
                    </div>
                    <?php echo ErrorShow('fechaR', $error); ?>

                </div>
            </div>

            <div class="form-group" <?php echo e($hide2); ?>>
                <label class="col-md-4 control-label" for="aa"> Anotaciones anteriores: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <?php if(!$_POST): ?>
                            <textarea type="text" cols="20" rows="4" name="aa" class="form-control"
                                placeholder="Anotacion anterior a la realizacion de la tarea"><?php echo e($aa); ?></textarea>
                        <?php elseif(ErrorShow('aa', $error) == ''): ?>
                            <textarea type="text" cols="20" rows="4" name="aa" class="form-control is-valid"
                                placeholder="Anotacion anterior a la realizacion de la tarea"><?php echo e($aa); ?></textarea>
                        <?php else: ?>
                            <textarea type="text" cols="20" rows="4" name="aa" class="form-control is-invalid"
                                placeholder="Anotacion anterior a la realizacion de la tarea"><?php echo e($aa); ?></textarea>
                        <?php endif; ?>
                    </div>
                    <?php echo ErrorShow('aa', $error); ?>

                </div>
            </div>

            <div class="form-group" <?php echo e($hide2); ?>>
                <label class="col-md-4 control-label" for="ap"> Anotaciones posteriores: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <?php if(!$_POST): ?>
                            <textarea type="text" cols="20" rows="4" name="ap" class="form-control"
                                placeholder="Anotacion posterior a la realizacion de la tarea"><?php echo e($ap); ?></textarea>
                        <?php elseif(ErrorShow('ap', $error) == ''): ?>
                            <textarea type="text" cols="20" rows="4" name="ap" class="form-control is-valid"
                                placeholder="Anotacion posterior a la realizacion de la tarea"><?php echo e($ap); ?></textarea>
                        <?php else: ?>
                            <textarea type="text" cols="20" rows="4" name="ap" class="form-control is-invalid"
                                placeholder="Anotacion posterior a la realizacion de la tarea"><?php echo e($ap); ?></textarea>
                        <?php endif; ?>
                    </div>
                    <?php echo ErrorShow('ap', $error); ?>

                </div>
            </div>

            <div class="form-group" <?php echo e($hide2); ?>>
                <label class="col-md-4 control-label" for="fichero"> Fichero:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group file">
                        <div>
                            <label for="image_uploads" id="labelFile">Selecciona un archivo (DOC, DOCX, PDF..)</label>
                            <input type="file" id="image_uploads" name="fichero" accept=".doc, .docx, .pdf"
                                class="form-control">
                        </div>
                        <div class="preview">
                            <?php if(isset($fichero)): ?>
                                <p id="pfile">ARCHIVO: <?php echo e($fichero); ?></p>
                            <?php else: ?>
                                <p id="pfile">No hay ningun archivo seleccionado</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center bton">
                <input type="submit" class="btn btn-success" value="Guardar">
            </div>
        </fieldset>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?= ASSETS_URL ?>js/file_doc.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programas\DB\htdocs\PHP\NoSeCaenSL\App\views/task/add_upd.blade.php ENDPATH**/ ?>