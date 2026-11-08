<?php
namespace App\Modules\Auth\Controllers;

use App\Core\Controller;
use App\Modules\Usuario\Models\UsuarioModel;
use App\Services\GeneralServices;

const RECUPERAR = "LoginRecuperarCuentaView";
const LOGIN = "LoginView";
const GENERAR = "LoginGenerarCuentaView";
const USUARIO = "UsuarioView";
const MENU = "Menu\MenuView";

const VACIO = [ "nada" => null];
class LoginController extends Controller {

    public function index(){
        $this->view(LOGIN, ['titulo' => 'Iniciar Sesión']);
    }

    public function procesar() {
        $user = $_POST['email'];
        $password = $_POST['password'];

        $usuarioModel = new UsuarioModel();
        extract($usuarioModel->comprobar_usuario($user));

        if ($resultado && $datos['usuario_password'] != null){
            if(GeneralServices::VerificatePasswordHash($password, $datos['usuario_password']))
            $this->view(MENU, VACIO, 0);

        }else {
            $this->view('LoginView', [
                'titulo'=> 'Iniciar sesión',
                'error' => 'Usuario no encontrado'
            ]);
        }
    }

    public function recuperarCuenta(){
        $this->view( RECUPERAR, ['nada' => null]);
    }

    public function generarCuenta(){

        $this->view( GENERAR, VACIO);



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
            $this->view(MENU, ['datos_usuario' => $usuarioModel->consultar_datos($id_usuario), "id" => $id_usuario], 0);
        }
        else{
            $this->index();
        }
    }

    public function validar_usuario_pass(string $usuario, string $pass) {

        if (GeneralServices::VerificatePasswordHash($usuario, $pass))
        {
            $this->view(MENU, VACIO );
        }
        
    }

}

?>
