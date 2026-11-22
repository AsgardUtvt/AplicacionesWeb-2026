<?php
namespace App\Core\Modules\Auth\Views\LoginView;
use App\Services\ViewServic ;
use App\Services\ViewService;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesion</title>
    <link rel="stylesheet" href="../../../../css/style-general.css" />
    <link rel="stylesheet" href="../../../../css/login-style.css" />
</head>
<body>
<div class="padre">
    <h1>Un grano de mostaza</h1>
    <img src="../../../../assest/img/logo/UnGranoDeMostazavm.min.svg" width="200" height="200" />
        <form action="/auth/login/procesar" method="post">
            <input type="email" placeholder="Correo" name="email"/>
            <br>
            <input type="password" placeholder="Contraseña" name="password"/>
            <br>
            <input type="submit" value="Iniciar sesion"/>
        </form>
        <a action='<?php ViewService::require_view("Auth\LoginGenerarCuentaView") ?>'>Generar cuenta</a>
        <a href="/auth/login/recuperarCuenta">Olvide mi contraseña</a>
</div>
</body>
</html>
