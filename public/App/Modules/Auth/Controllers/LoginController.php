<?php
namespace App\Modules\Auth\Controllers;

use App\Modules\Usuario\Models\UsuarioModel;
use App\Services\GeneralServices;


class LoginController {

    public function procesar() {
        $user = $_POST['email'];
        $password = $_POST['password'];

        $usuarioModel = new UsuarioModel();
        extract($usuarioModel->comprobar_usuario($user));
        var_dump($usuarioModel->comprobar_usuario($user));

        if ($resultado && $datos['usuario_password'] != null){
            echo "Fumcion VerificatePasswordHash " . GeneralServices::VerificatePasswordHash($password, $datos['usuario_password']);

            echo "Varaible de session: " . $_SESSION['id_global'];
            if(password_verify($password, $datos['usuario_password'])){

            }else{

            }

        }else {
        }
        echo "Estoy en procesar";
        $_POST['eamil'] = "";
        $_POST['password'] = "";
    }

    public function usuarioview(){

        $usuarioModel = new UsuarioModel();
        $usuarioModel->usuario_name = $_POST['nombre'];
        $usuarioModel->usuario_paterno = $_POST['paterno'];
        $usuarioModel->usuario_materno = $_POST['materno'];
        $usuarioModel->usuario_correo = $_POST['email'];
        $usuarioModel->usuario_password = GeneralServices::PasswordHash($_POST['password']);
        $usuarioModel->usuario_localidad = $_POST['localidad'];
        $usuarioModel->usuario_colonia = $_POST['colonia'];
        $usuarioModel->usuario_cp = $_POST['codigoPostal'];
        $usuarioModel->usuario_municipio = $_POST['municipio'];
        $usuarioModel->usuario_calle_principal = $_POST['callePrincipal'];
        $usuarioModel->usuario_calle_izquierda = $_POST['calleUno'];
        $usuarioModel->usuario_calle_derecha = $_POST['calleDos'];
        $usuarioModel->usuario_num_exterior = $_POST['numEx'];
        $usuarioModel->usuario_num_interior = $_POST['numInt'];
        $usuarioModel->id_estado= 1;
        $usuarioModel->id_tipo_usuario = 1;
        extract($usuarioModel->insertarusuario());
        if($resultado){
        }
        else{
        }
    }


}


