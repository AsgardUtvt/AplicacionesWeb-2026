<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesion</title>
    <h1>Un grano de mostaza</h1>
</head>
<body>
    <div>
        <label>Este sera el contenedor de la imagen.</label>
    </div>
    <form action="menu/" method="post">
        <input type="text" placeholder="Usuario" name="nombre"/>
        <br>
        <input type="password" placeholder="Contraseña" name="password"/>
        <br>
        <input type="submit" value="Iniciar sesion" />
        <br>
        <a href="usuario/">Generar cuenta</a>
        <br>
        <a href="../app/login/recuperar-cuenta.php">Olvide mi contraseña</a>
    </form>
</body>
</html>
