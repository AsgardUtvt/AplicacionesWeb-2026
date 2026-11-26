<?php
namespace App\Modules\Auth\Views\LoginView;
use App\Modules\Usuario\Models\UsuarioModel;
use App\Services\ViewService;
use App\Services\GeneralServices;

$userM = new UsuarioModel();

$email = $_POST['email'] ?? "";
$pass = $_POST['password'] ?? "";
const BASE_URL = '/auth/login';
if(isset($_POST['inciar-sesion']))
{
    if(empty(trim($email)) || empty(trim($pass))){
        ViewService::redireccionarScript("Faltan datos", BASE_URL);
    }
    else
    {
        $datos=$userM->comprobar_usuario($email);
        print_r($datos);
        extract($datos, EXTR_SKIP);
        if($resultado)
        {
            if(GeneralServices::VerificatePasswordHash($pass, $datos['datos']['pass']))
            {
                $_POST = [];
                ViewService::url('/menu/menu-view');
            }
            else
            {
                ViewService::redireccionarScript("Usuario o comtraseña no encontrada", BASE_URL);
            }
        }
        else
        {
            ViewService::redireccionarScript("Usuario o comtraseña no encontrada", BASE_URL);
        }  

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
    <title>Inicio sesion</title>
    <link rel="stylesheet" href="../../../../css/style-general.css" />
    <link rel="stylesheet" href="../../../../css/login-style.css" />
</head>
<body>
<div class="padre">
    <h1>Un grano de mostaza</h1>
    <img src="../../../../assest/img/logo/UnGranoDeMostazavm.min.svg" width="200" height="200" />
        <form method="post">
            <input type="email" placeholder="Correo" name="email"/>
            <br>
            <input type="password" placeholder="Contraseña" name="password"/>
            <br>
            <input type="submit" value="Iniciar sesion" name="inciar-sesion"/>
            <br>
            <a href="/auth/generar-cuenta" ?>">Generar cuenta</a>
            <a href="/auth/recuperar-cuenta">Olvide mi contraseña</a>
        </form>
</div>
</body>
</html>
<?php
}
