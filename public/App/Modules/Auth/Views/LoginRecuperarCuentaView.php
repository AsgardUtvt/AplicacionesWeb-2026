<?php

use App\GlobalSingleton\GlobalSingleton;
use App\Services\MessageService;
use App\Services\ViewService;

$link = "localhost:8000/auth/cambiar-contrasena";
$message = "
<div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;'>
    <p>Hola, te enviamos este correo para recuperar tu cuenta. Si no pediste un cambio de contraseña, ignora este mensaje.</p>
    <p>Da clic en el siguiente botón para cambiar tu contraseña:</p>
    <p>
        <a href='$link' style='background-color: #007bff; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 4px; display: inline-block;'>
            Cambiar contraseña
        </a>
    </p>
    <p style='color: #666; font-size: 12px;'>Si el botón no funciona, copia y pega este enlace en tu navegador:<br>$link</p>
</div>
";
$email_recuperar = $_GET['email_recuperar'] ?? '';
$singleton = GlobalSingleton::getInstance();
if(isset($_GET['recupurar'])){
    if(empty(trim($email_recuperar))){
        ViewService::redireccionarScript("Falta el correo", "/auth/recuperar-cuenta");
    }
    else
    {
        $singleton->setSession('email_recuperar', $email_recuperar);

        MessageService::generarMessageAndSend( "unganodemostazaajua@gmail.com", $email_recuperar, "Restaurar contraseña", $message);
    }
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuepar cuenta</title>
</head>
<body>
<form method="get">
        <label> Ingresa tu correo electronico </label>
        <br>
        <input type="email" placeholder="Email: ej. ajemplo@gmail.com" name="email_recuperar" required >
        <br>
        <input type="submit" value="Recuepar Contraseña" name="recupurar" >
    </form>
</body>
</html>
<?php
}
