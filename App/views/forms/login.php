<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ACCESO DE USUARIO</h1>
    <form action="" method="post"></form>
    <p> Usuario: <input type="text" name="user" value="<?= ValorPost('user') ?>" /> <?=VerError('user');?> </p>
    <p> Contraseña: <input type="password" name="password" value="" /> <?=VerError('password');?> </p>
    <input type="submit" value="Acceder">

</body>
</html>