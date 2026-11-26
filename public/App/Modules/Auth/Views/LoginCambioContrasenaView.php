<?php

use App\GlobalSingleton\GlobalSingleton;
use App\Modules\Usuario\Models\UsuarioModel;
use App\Services\ViewService;

$pass = $_POST['password'] ?? '';
$pass_ver = $_POST['password-ver'] ?? '';
$singleton = GlobalSingleton::getInstance();
$userM = new UsuarioModel();
if($singleton->has('email_recuperar'))
{
    if(isset($_POST['cambiar_contrasena']))
    {
        if(empty(trim($pass)) || empty(trim($pass_ver)))
        {
            ViewService::redireccionarScript("Faltan datos", "/auth/cambiar-contrasena");
        }
        else
        {
            if($pass == $pass_ver)
            {
                if($userM->cambiarContrasena($pass, $singleton->getSession("email_recuperar")))
                {
                    ViewService::redireccionarScript("La contraseña fue cambiada con exito", "/auth/login");
                }else
                {
                    ViewService::soloAlerta("Hubo un error al intentar cambair la contraseña");
                }
            }
            else 
            {
                ViewService::soloAlerta("Las contraseñas no coinciden");
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
</head>
<body>
    <form method="post">
        <input type="password" name="password" required />
        <br>
        <input type="password" name="password-ver" required />
        <br>
        <input type="submit" name="cambiar_contrasena" />
    </form>
</body>
</html>
<?php

}
else
{
    http_response_code(404);
    die("No deberias de estar en esta vista");
}

