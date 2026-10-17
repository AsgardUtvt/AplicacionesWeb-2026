<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesion</title>
    <h1>Un grano de mostaza</h1>
    <link rel="stylesheet" href="style/style-login/style.css"
</head>
<body>
    <div class="container">
    <div class="div-imagen">
        Imagen
    </div>
    <div class="div-form">
        <form action="menu/" method="post">
            <input type="text" placeholder="Usuario" name="nombre"/>
            <br>
            <input type="password" placeholder="Contraseña" name="password"/>
            <br>
            <input type="submit" value="Iniciar sesion"/>
        </form>
    </div>
        <div class="bottomBtnLeft">
            <a href="usuario/">Generar cuenta</a>
        </div>
        <div class="bottomBtnRight">
            <a href="../app/login/recuperar-cuenta.php">Olvide mi contraseña</a>
        </div>
    </div>
</body>
</html>
