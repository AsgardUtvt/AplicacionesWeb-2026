<?php
use App\Services\ViewService;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
echo ViewService::string_path('login');
echo "<br>";
echo ViewService::string_path('recuperar_cuenta');
echo "<br>";
echo ViewService::string_path('generar_cuenta');
echo "<br>";
echo ViewService::string_path('generar_donacion');
echo "<br>";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test rutas</title>
</head>
<body>
<br>
<a href="<?= ViewService::string_path('login')?>">Login</a>  
<br>
<a href="<?= ViewService::string_path('recuperar_cuenta')?>">Recuperar cuenta</a>  
<br>
<a href="<?= ViewService::string_path('generar_cuenta')?>">Generar cuenta</a>  
<br>
<a href="<?= ViewService::string_path('generar_donacion')?>">Generar donanación</a>  
<br>
</body>
</html>

