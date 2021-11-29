<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Eliminacion de la tarea</h1>
    <p>¿Esta segur@ de que desea eliminar la tarea?
    <button><a href="?c=task&a=Eliminar&id=<?php echo $_REQUEST['id']; ?>">Eliminar</a></button>
    <button><a href="?c=task&a=Index&id=1">Volver Atras</a></button>
    </p>
</body>
</html>