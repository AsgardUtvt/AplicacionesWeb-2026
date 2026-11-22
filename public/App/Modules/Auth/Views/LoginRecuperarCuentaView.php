<?php
require_once __DIR__ . '/../../../../vendor/autoload.php';
use App\Services\ViewService;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

echo ViewService::string_path('recuperar_cuenta');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuepar cuenta</title>
</head>
<body>
<form action="./LoginDatosRecueparCuenta.php" method="get">
        <label> Ingresa tu correo electronico </label>
        <br>
        <input type="email" placeholder="Email: ej. ajemplo@gmail.com" name="email" required >
        <br>
        <input type="submit" value="Recuepar Contraseña" >
    </form>
</body>
</html>
