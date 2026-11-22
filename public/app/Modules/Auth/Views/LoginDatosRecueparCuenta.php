<?php 
require_once __DIR__ . '/../../../../vendor/autoload.php';
use App\Services\ViewService;

$correo = $_GET['email']
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Mandando correo de verificación</h1>
    <br>
    <p>En breve se te llegara un correo a la siguiente dirección <?= $correo ?> para que puedas recuepara tu cuenta</p>
    <br>
    <a href="./LoginView.php"> Regresar a el inicio de sesión </a>
    <br>
</body>
</html>
