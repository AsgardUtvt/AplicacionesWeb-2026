<?php
namespace App\Core\Modules\Auth\Views\LoginView;

use App\Services\ViewService;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
echo ViewService::string_path('generar_cuenta');

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
            <a href="<?= ViewService::string_path('generar_cuenta') ?>">Generar cuenta</a>
            <a href="<?= ViewService::string_path('recuperar_cuenta') ?>">Olvide mi contraseña</a>
        </form>
</div>
</body>
</html>
