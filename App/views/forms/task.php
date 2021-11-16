<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <form action="" method="post">
        <h1>Formulario de tarea</h1>

        <p> Persona de contacto: <input type="text" name="persona" value="<?=ShowTaskData("persona")?>"/> <?=VerError('persona');?> </p>
        <p> Teléfono/s contacto: <input type="text" name="telefono" value="<?=ShowTaskData("telefono")?>"/> <?=VerError('telefono');?> </p>
        <p> Descripción: <input type="text" name="descripcion" value="<?=ShowTaskData("descripcion")?>"/> <?=VerError('descripcion');?> </p>
        <p> Correo electrónico: <input type="text" name="correo" value="<?=ShowTaskData("correo")?>"/> <?=VerError('correo');?> </p>
        <p> Direccion: <input type="text" name="direccion" value="<?=ShowTaskData("direccion")?>"/> <?=VerError('direccion');?> </p>
        <p> Poblacion: <input type="text" name="poblacion" value="<?=ShowTaskData("poblacion")?>"/> <?=VerError('poblacion');?>  </p>
        <p> Codigo Postal: <input type="text" name="cp" value="<?=ShowTaskData("cp")?>"/> <?=VerError('cp');?> </p>
        <p>
            Provincia:
            <select name="provincia">
                <!-- <option value="value1">Value 1</option> -->
            </select>
        </p>
        <p>
            Estado:
            <label><INPUT TYPE="radio" NAME="estado" VALUE="P" checked>Pendiente</label>
            <label><INPUT TYPE="radio" NAME="estado" VALUE="R">Realizada</label>
            <label><INPUT TYPE="radio" NAME="estado" VALUE="C">Cancelada</label>
        </p>
        <p> Fecha de creacion de la tarea: "Fecha obtenida del sistema" </p>
        <p> Operario encargado: <input type="text" name="operario" value="<?=ShowTaskData("operario")?>"/> <?=VerError('operario');?> </p>
        <p> Fecha de realización: <input type="text" name="fechaR" value="<?=ShowTaskData("fechaR")?>"/> <?=VerError('fechaR');?> </p>
        <p> Anotaciones anteriores: <input type="text" name="aa" value="<?=ShowTaskData("aa")?>"/> <?=VerError('aa');?> </p>
        <p> Anotaciones posteriores: <input type="text" name="ap" value="<?=ShowTaskData("ap")?>"/> <?=VerError('ap');?> </p>

        <input type="submit" value="Guardar">

    </form>
</body>

</html>